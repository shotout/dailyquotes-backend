<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Theme;
use App\Models\User;
use App\Models\UserCategory;
use App\Models\UserTheme;
use Casperlaitw\LaravelAdmobSsv\AdMob;


class AdmobController extends Controller
{
    public function callback(Request $request) {
        return response()->json([
            'status' => 'ok',
            'data' => null
        ], 200); 
        
        // $adMob = new AdMob($request);

        // if ($adMob->validate()) {
            // success
            $user = User::find($request->user_id);

            if ($user) {
                $custom_data = explode("_", $request->custom_data);
                $flag = $custom_data[0];
                $custom_id = $custom_data[1];

                if ($flag == "quote") {
                    $user->limit = 0;
                    $user->update();
                }

                if ($flag == "theme") {
                    $theme = Theme::find($custom_id);
                    if ($theme) {
                        UserTheme::where('user_id', $user->id)->update(["theme_id" => $theme->id]);
                    }
                } 

                if($flag == "category") {
                    $category = Category::find($custom_id);
                    if ($category) {
                        $uc = UserCategory::where("user_id", $user->id)
                            ->where("category_id", $category->id)
                            ->first();

                        if (!$uc) {
                            $uc = new UserCategory;
                            $uc->user_id = $user->id;
                            $uc->category_id = $category->id;
                            $uc->save();
                        }
                    }
                }
            }
        // } else {
        //     // failed
        // }

        // return response
        return response()->json([
            'status' => 'ok',
            'data' => null
        ], 200); 
    }
}