<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Models\Quote;
use App\Models\Category;
use App\Models\UserQuote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Theme;

class UserController extends Controller
{
    public function saveQuote($id)
    {
        $quote = Quote::find($id);

        if (!$quote) {
            return response()->json([
                'status' => 'failed',
                'message' => 'data not found'
            ], 404);
        }

        $userQuote = UserQuote::where('user_id', auth('sanctum')->user()->id)
            ->where('quote_id', $id)
            ->first();

        if (!$userQuote) {
            $userQuote = new UserQuote;
            $userQuote->user_id = auth('sanctum')->user()->id;
            $userQuote->quote_id = $id;
            $userQuote->save();
        }

        return response()->json([
            'status' => 'success',
            'data' => $userQuote
        ], 200);
    }

    public function updateTheme($id)
    {
        $theme = Theme::find($id);

        if (!$theme) {
            return response()->json([
                'status' => 'failed',
                'message' => 'data not found'
            ], 404);
        }

        $user = User::find(auth('sanctum')->user()->id);
        $user->theme_id = (int)$id;
        $user->update();

        return response()->json([
            'status' => 'success',
            'data' => $user
        ], 200);
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
