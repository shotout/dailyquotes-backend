<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Quote;
use App\Models\UserQuote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserLikeController extends Controller
{
    public function index(Request $request)
    {
        // limit
        if ($request->has('length') && $request->input('length') != '') {
            $length = $request->input('length');
        } else {
            $length = 10;
        }

        // order by field
        if ($request->has('column') && $request->input('column') != '') {
            $column = $request->input('column');
        } else {
            $column = 'order';
        }

        // order direction
        if ($request->has('dir') && $request->input('dir') != '') {
            $dir = $request->input('dir');
        } else {
            $dir = 'asc';
        }

        $uq = UserQuote::where('user_id', auth('sanctum')->user()->id)
            ->where('type', 1)
            ->pluck('quote_id')
            ->toArray();

        // order by
        $query = Quote::whereIn('id', $uq)
            ->where('status', 2)
            ->orderBy($column, $dir);

        // search
        if ($request->has('search') && $request->input('search') != '') {
            $query->where(function($q) use($request) {
                $q->where('title', 'like', '%' . $request->input('search') . '%');
            });
        }

        // pagination
        $data = $query->paginate($length);

        // retun response
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
        ]);

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
        }

        $userQuote->user_id = auth('sanctum')->user()->id;
        $userQuote->quote_id = $id;
        $userQuote->type = $request->type;
        if ($request->type == 1) {
            $userQuote->flag = "like";
        } else {
            $userQuote->flag = "dislike";
        }
        $userQuote->save();

        return response()->json([
            'status' => 'success',
            'data' => $userQuote
        ], 200);
    }

    public function destroy($id)
    {
        $uq = UserQuote::where('user_id', auth('sanctum')->user()->id)
            ->where('quote_id', $id)
            ->first();

        if (!$uq) {
            return response()->json([
                'status' => 'failed',
                'message' => 'data not found'
            ], 404);
        }

        $uq->delete();

        return response()->json([
            'status' => 'success',
            'data' => $uq
        ], 200);
    }
}