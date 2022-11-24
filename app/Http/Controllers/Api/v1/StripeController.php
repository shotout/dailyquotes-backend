<?php

namespace App\Http\Controllers\Api\v1;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class StripeController extends Controller
{
    public function index()
    {
        $plans = Plan::where('is_show', true)
            ->orderBy('sequence', 'asc')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $plans
        ], 200);
    }

    public function checkout(Request $request)
    {
        // localhost test
        // stripe listen --forward-to motivation.test/api/v1/stripe/webhook

        $request->validate([
            'plan' => 'required',
            'price' => 'required',
        ]);

        $mode = 'subscription';
        if ($request->plan == 4) {
            $mode = 'payment';
        }

        $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET"));
        $checkout = $stripe->checkout->sessions->create([
            'payment_method_types'  => ['card'],
            'line_items' => [
               [
                    "price" => $request->price,
                    "quantity" => 1,
                ]
            ],
            'mode' => $mode,
            'success_url' => url('/api/v1/stripe/success'),
            'cancel_url' => url('/api/v1/stripe/cancel'),
        ]);

        Log::info('checkout');
        Log::info($checkout);

        if ($checkout) {
            $payment = new Payment;
            $payment->plan_id = $request->plan;
            $payment->user_id = auth('sanctum')->user()->id;
            // $payment->user_id = 1;
            $payment->code = $checkout->id;
            $payment->total = $checkout->amount_total / 100;
            $payment->api_checkout = $checkout;
            $payment->status = $checkout->payment_status;
            $payment->save();
        }

        return response()->json([
            'status' => 'success',
            'data' => $checkout
        ], 200);
    }

    // stripe
    public function webhook(Request $request)
    {
        $endpoint_secret = env("STRIPE_WEBHOOK");

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }

        $res = (object)$request;
        $payment = Payment::where('code', $res->data['object']['id'])->first();
        if ($payment) {
            $payment->api_webhook = $res;
            $payment->status = $res->data['object']['payment_status'];
            $payment->update();            
        }

        if ($request->type == 'checkout.session.completed') {
            if ($payment) {
                Subscription::where('user_id', $payment->user_id)->update(['status' => 1]);

                $sub = new Subscription;
                $sub->user_id = $payment->user_id;
                $sub->plan_id = $payment->plan_id;
                $sub->started = now();

                $plan = Plan::find($payment->plan_id);
                if ($plan && $plan->type == 2) {
                    $sub->renewal = Carbon::now()->addMonth(1);
                }
                if ($plan && $plan->type == 3) {
                    $sub->renewal = Carbon::now()->addYear(1);
                }

                $sub->type = $plan->type;
                $sub->save();
            }

            Log::info('ok');
            Log::info($res);
        }

        return response()->json([
            'status' => 'ok',
            'data' => null
        ], 200); 
    }

    // purchasely
    public function webhooks(Request $request)
    {
        // Subscription events attributes -----
        // event_name (SUBSCRIPTION_STARTED, SUBSCRIPTION_RENEWED, RENEWAL_DISABLED)
        // user_id
        // plan (annual-mooti-subscription)
        // product 
        // store_product_id (mooti_annual_package)

        Log::info("log purchasely");
        Log::info($request->all());

        return response()->json([
            'status' => 'ok',
            'data' => null
        ], 200); 
    }

    public function success(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'data' => null
        ], 200); 
    }

    public function cancel(Request $request)
    {
        return response()->json([
            'status' => 'cancel',
            'data' => null
        ], 200); 
    }

    public function free()
    {
        $isFree = Subscription::where('user_id', auth('sanctum')->user()->id)
            ->where('plan_id', 5)
            ->exists();

        if ($isFree) {
            return response()->json([
                'status' => 'failed',
                'message' => 'user has 1-month Premium for free!'
            ], 400); 
        }

        Subscription::where('user_id', auth('sanctum')->user()->id)->update(['status' => 1]);
        $sub = new Subscription;
        $sub->user_id = auth('sanctum')->user()->id;
        $sub->plan_id = 5;
        $sub->started = now();
        $sub->renewal = Carbon::now()->addMonth(1);
        $sub->type = 5;
        $sub->save();

        return response()->json([
            'status' => 'success',
            'data' => $sub
        ], 200); 
    }
}