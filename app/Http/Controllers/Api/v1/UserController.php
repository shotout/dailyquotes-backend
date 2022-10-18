<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Models\Theme;
use App\Models\Category;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = User::with('schedule','style','feel','ways','areas','themes', 'categories','subscription')
            ->find(auth('sanctum')->user()->id);

        return response()->json([
            'status' => 'success',
            'data' => $user
        ], 200);
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(auth('sanctum')->user()->id);

        if ($request->has('name') && $request->name != '') {
            $user->name = $request->name;
            $user->update();
        }

        if ($request->has('gender') && $request->gender != '') {
            $user->gender = $request->gender;
            $user->update();
        }

        if ($request->has('style') && $request->style != '') {
            $user->style_id = $request->style;
            $user->update();
        }

        // schedule reminder ------------
            $schedule = Schedule::where('user_id', auth('sanctum')->user()->id)->first();

            if ($request->has('often') && $request->often != '') {
                $schedule->often = $request->often;
            }
            if ($request->has('start') && $request->start != '') {
                $schedule->start = $request->start;
            }
            if ($request->has('end') && $request->end != '') {
                $schedule->end = $request->end;
            }
            if ($request->has('anytime') && $request->anytime != '') {
                $schedule->anytime = true;
            }
            
            $schedule->save();
        // -------------------------

        return response()->json([
            'status' => 'success',
            'data' => $user
        ], 200);
    }
    
    public function updateTheme(Request $request)
    {
        if ($request->has('themes') && $request->themes != '') {
            $themes = Theme::whereIn('id', $request->themes)->pluck('id')->toArray();

            $user = User::find(auth('sanctum')->user()->id);
            $user->themes()->sync($themes);

            $data = User::with('themes')->find(auth('sanctum')->user()->id);

            return response()->json([
                'status' => 'success',
                'data' => $data
            ], 200);
        }
    }

    public function updateCategory(Request $request)
    {
        if ($request->has('categories') && $request->categories != '') {
            $categories = Category::whereIn('id', $request->categories)->pluck('id')->toArray();

            $user = User::find(auth('sanctum')->user()->id);
            $user->categories()->sync($categories);

            $data = User::with('categories')->find(auth('sanctum')->user()->id);

            return response()->json([
                'status' => 'success',
                'data' => $data
            ], 200);
        }
    }
}
