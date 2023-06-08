<?php

namespace App\Http\Controllers\Api\v1;

use Carbon\Carbon;
use App\Models\Way;
use App\Models\Area;
use App\Models\User;
use App\Models\Style;
use App\Jobs\UserPool;
use App\Models\Schedule;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Jobs\GenerateTimerAds;
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
            // reset notif ads count -------
                $user->notif_ads_count = 0;
                $user->update();

                GenerateTimerAds::dispatch($user->id)->onQueue(env('SUPERVISOR'));
            // ---------

            $token = $user->createToken('auth_token')->plainTextToken;

            $data = User::with('schedule','style','feel','ways','areas','themes', 'categories','subscription')
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
        return "ok";
        
        $request->validate([
            // 'register_token' => 'required',
            'device_id' => 'required',
            'style' => 'required',
            // 'feel' => 'required',
            // 'ways' => 'required',
            'areas' => 'required',
        ]);

        // check register token
        // if ($request->register_token != "$2y$10PDvHjXbGxyaUjKwPpWPlH.14YLG3JPQRoAk/H2rSEtg/ax5FtIjcm") {
        //     return response()->json([
        //         'status' => 'failed',
        //         'message' => 'register token not valid'
        //     ], 400); 
        // }

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
                if ($request->has('fcm_token')) {
                    $user->fcm_token = $request->fcm_token;
                }
                if ($request->has('purchasely_id')) {
                    $user->purchasely_id = $request->purchasely_id;
                }

                if ($request->has('specific_goal')) {
                    if ($request->specific_goal == 'yes') {
                        $user->specific_goal = 1;
                    }
                }
                if ($request->has('important_change')) {
                    if ($request->important_change == 'yes') {
                        $user->important_change = 1;
                    }
                }
                if ($request->has('commit_goal')) {
                    $user->commit_goal = $request->commit_goal;
                }
                
                // $user->remember_token = Str::random(16);
                $user->save();
            // ------------------------------

            // subscription ---------
                $sub = new Subscription;
                $sub->user_id = $user->id;
                $sub->plan_id = 1;
                $sub->started = now();
                $sub->renewal = Carbon::now()->addDay(3);
                $sub->save();
            // ----------------------

            // schedule ------------
                $schedule = new Schedule;
                $schedule->user_id = $user->id;

                if ($request->has('timezone')) {
                    $schedule->timezone = $request->timezone;
                }
              
                if ($request->has('anytime') && $request->anytime != '') {
                    $schedule->anytime = true;
                    $schedule->often = 6;
                    $schedule->start = '08:00';
                    $schedule->end = '22:00';
                } else {
                    if ($request->has('often')) {                       
                        $schedule->often = $request->often;
                    }
                    if ($request->has('start')) {
                        $schedule->start = $request->start;
                    }
                    if ($request->has('end')) {
                        $schedule->end = $request->end;
                    }
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

            // themes ------------
                $user->themes()->sync([6]);
            // -----------------------

            // categories ------------
                $user->categories()->sync([1]);
            // -----------------------

            return $user;
        });

        if ($user) {
            // generate token
            $token = $user->createToken('auth_token')->plainTextToken;

            // data
            $data = User::with('schedule','style','feel','ways','areas','themes', 'categories','subscription')
                ->find($user->id);

            // count user pool
            if ($data->feel && count($data->ways)) {
                UserPool::dispatch($user->id)->onQueue(env('SUPERVISOR'));
            }

            // response
            return response()->json([
                'status' => 'success',
                'token' => $token,
                'data' => $data
            ], 201); 
        } 
    }
}
