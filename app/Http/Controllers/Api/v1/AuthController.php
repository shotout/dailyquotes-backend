<?php

namespace App\Http\Controllers\Api\v1;

use Carbon\Carbon;
use App\Models\Way;
use App\Models\Area;
use App\Models\User;
use App\Models\Style;
use App\Models\Schedule;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function checkDevice(Request $request)
    {
        $request->validate([
            'device_id' => 'required',
        ]);

        $user = User::where('device_id', $request->device_id)->first();
        if ($user) {
            $token = $user->createToken('auth_token')->plainTextToken;

            $data = User::with('schedule','style','feel','ways','areas','theme', 'categories','subscription')
                ->find($user->id);

            return response()->json([
                'status' => 'success',
                'token' => $token,
                'data' => $data
            ], 200); 
        }

        return response()->json([
            'status' => 'failed',
            'message' => 'device not register'
        ], 400); 
    }

    public function register(Request $request)
    {
        $request->validate([
            'device_id' => 'required',
            'style' => 'required',
            'feel' => 'required',
            'ways' => 'required',
            'areas' => 'required',
        ]);

        $isRegister = User::where('device_id', $request->device_id)->first();
        if ($isRegister) {
            return response()->json([
                'status' => 'failed',
                'message' => 'device has register'
            ], 400); 
        }

        $user = DB::transaction(function () use ($request) {

            // user --------------
                $user = new User;
                if ($request->has('name')) {
                    $user->name = $request->name;
                }
                if ($request->has('gender')) {
                    $user->gender = $request->gender;
                }
                if ($request->has('style')) {
                    $user->style_id = $request->style;
                }
                if ($request->has('feel')) {
                    $user->feel_id = $request->feel;
                }
                if ($request->has('device_id')) {
                    $user->device_id = $request->device_id;
                }
                // $user->remember_token = Str::random(16);
                $user->save();
            // ------------------------------

            // subscription ---------
                $sub = new Subscription;
                $sub->user_id = $user->id;
                $sub->started = now();
                $sub->renewal = Carbon::now()->addDay(3);
                $sub->save();
            // ----------------------

            // schedule ------------
                $schedule = new Schedule;
                $schedule->user_id = $user->id;
                if ($request->has('often')) {
                    $schedule->often = $request->often;
                }
                if ($request->has('start')) {
                    $schedule->start = $request->start;
                }
                if ($request->has('end')) {
                    $schedule->end = $request->end;
                }
                if ($request->has('anytime') && $request->anytime != '') {
                    $schedule->anytime = true;
                }
                $schedule->save();
            // -------------------------

            // ways ---------------
                if ($request->has('ways') && $request->ways != '') {
                    $ways = Way::whereIn('id', $request->ways)->pluck('id')->toArray();
                    $user->ways()->sync($ways);
                }
            // ----------------------

            // areas ---------------
                if ($request->has('areas') && $request->areas != '') {
                    $areas = Area::whereIn('id', $request->areas)->pluck('id')->toArray();
                    $user->areas()->sync($areas);
                }
            // ----------------------

            // categories ------------
                $user->categories()->sync([1]);
            // -----------------------

            return $user;
        });

        if ($user) {
            // sending email verification
            // SendConfirmEmail::dispatch($user, 'register')->onQueue('apiMotivation');

            // generate token
            $token = $user->createToken('auth_token')->plainTextToken;

            // data
            $data = User::with('schedule','style','feel','ways','areas','theme', 'categories','subscription')
                ->find($user->id);

            // response
            return response()->json([
                'status' => 'success',
                'token' => $token,
                'data' => $data
            ], 201); 
        } 
    }
}
