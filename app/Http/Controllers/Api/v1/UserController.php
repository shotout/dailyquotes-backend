<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Models\Media;
use App\Models\Quote;
use App\Models\Theme;
use App\Models\Rating;
use App\Models\Category;
use App\Models\Schedule;
use App\Models\UserNotif;
use App\Jobs\GenerateTimer;
use App\Models\CustomeTheme;
use Illuminate\Http\Request;
use App\Jobs\GenerateTimerAds;
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

        if ($request->has('name')) {
            $user->name = $request->name;
            $user->update();
        }

        if ($request->has('gender')) {
            $user->gender = $request->gender;
            $user->update();
        }

        if ($request->has('style') && $request->style != '') {
            $user->style_id = $request->style;
            $user->update();
        }

        if ($request->has('fcm_token') && $request->fcm_token != '') {
            $user->fcm_token = $request->fcm_token;
            $user->update();
        }

        if ($request->has('purchasely_id')) {
            $user->purchasely_id = $request->purchasely_id;
            $user->update();
        }

        if ($request->has('commit_goal') && $request->commit_goal != '') {
            $user->commit_goal = $request->commit_goal;
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

            if ($request->has('timezone') && $request->timezone != '') {
                $schedule->timezone = $request->timezone;
            }
            
            $schedule->save();

            if ($request->has('often') && $request->often != '' || $request->has('anytime') && $request->anytime != '') {
                GenerateTimer::dispatch($user->id)->onQueue(env('SUPERVISOR'));
            }
        // -------------------------

        // reset user notif counter
        if ($request->has('notif_count')) {
            $user->notif_count = 0;
            $user->update();
        }

        // reset user quote counter
        if ($request->has('quote_count')) {
            $user->quote_count = 0;
            $user->update();
        }

        // reset notif ads count
        if ($request->has('notif_ads_count')) {
            $user->notif_ads_count = 0;
            $user->update();

            GenerateTimerAds::dispatch($user->id)->onQueue(env('SUPERVISOR'));
        }

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

    public function getRating()
    {
        $isRating = Rating::where('user_id', auth('sanctum')->user()->id)->exists();
        return response()->json([
            'status' => 'success',
            'data' => $isRating
        ], 200);
    }

    public function postRating(Request $request)
    {
        $rating = Rating::firstOrCreate(
            ['user_id' =>  auth('sanctum')->user()->id],
            ['value' => $request->value ?? 0]
        );

        return response()->json([
            'status' => 'success',
            'data' => $rating
        ], 200);
    }

    public function notif(Request $request)
    {
        if ($request->has('length') && $request->input('length') != '') {
            $length = $request->input('length');
        } else {
            $length = 1;
        }

        $notif = UserNotif::where('user_id', auth('sanctum')->user()->id)
            ->pluck('quote_id')
            ->toArray();

        $query = Quote::whereNotIn('id', $notif)->orderBy('order', 'asc');
        $data = $query->paginate($length);

        // adding flag has notif
        foreach ($data as $quote) {
            $un = new UserNotif;
            $un->user_id = auth('sanctum')->user()->id;
            $un->quote_id = $quote->id;
            $un->save();
        }

        // check if quotes empty
        if ($data->total() == 0) {
            UserNotif::where('user_id', auth('sanctum')->user()->id)->delete();
        }

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function storeCustomeTheme(Request $request)
    {
        $customeTheme = new CustomeTheme;
        $customeTheme->user_id = auth('sanctum')->user()->id;

        if ($request->has('background_color') && $request->background_color != '') {
            $customeTheme->bg_image_color = $request->background_color;
        }
        if ($request->has('font_family') && $request->font_family != '') {
            $customeTheme->font_family = $request->font_family;
        }
        if ($request->has('text_color') && $request->text_color != '') {
            $customeTheme->text_color = $request->text_color;
        }

        if ($customeTheme->save()) {
            if ($request->has('background_image') && $request->background_image != '') {
                $bg = new Media;
                $bg->owner_id = $customeTheme->id;
                $bg->type = "custome_theme";
                $bg->url = $request->background_image;
                $bg->save();
            }

            $data = CustomeTheme::with('background')->find($customeTheme->id);

            return response()->json([
                'status' => 'success',
                'data' => $data
            ], 200);
        }
    }

    public function updateCustomeTheme(Request $request, $id)
    {
        $customeTheme = CustomeTheme::where('id', $id)
            ->where('user_id', auth('sanctum')->user()->id)
            ->first();
        if (!$customeTheme) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Custome theme not found'
            ], 404);
        }

        if ($request->has('background_color') && $request->background_color != '') {
            $customeTheme->bg_image_color = $request->background_color;
        }
        if ($request->has('font_family') && $request->font_family != '') {
            $customeTheme->font_family = $request->font_family;
        }
        if ($request->has('text_color') && $request->text_color != '') {
            $customeTheme->text_color = $request->text_color;
        }

        if ($customeTheme->update()) {
            if ($request->has('background_image') && $request->background_image != '') {
                $bg = Media::where('type', 'custome_theme')->where('owner_id', $id)->first();
                
                if (!$bg) {
                    $bg = new Media;
                }

                $bg->owner_id = $customeTheme->id;
                $bg->type = "custome_theme";
                $bg->url = $request->background_image;
                $bg->save();
            }

            $data = CustomeTheme::with('background')->find($customeTheme->id);

            return response()->json([
                'status' => 'success',
                'data' => $data
            ], 200);
        }
    }
}
