<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserQuote;

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
}
