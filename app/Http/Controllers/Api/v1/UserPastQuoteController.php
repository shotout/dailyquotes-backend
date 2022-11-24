<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Quote;
use App\Models\PastQuote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPastQuoteController extends Controller
{
    public function index(Request $request)
    {
        $pq = PastQuote::where('user_id', auth('sanctum')->user()->id)
            ->pluck('quote_id')
            ->orderBy('created_at', 'desc')
            ->toArray();

        if (auth('sanctum')->user()->subscription->type == 1) {
            $quotes = Quote::with('like')->whereIn('id', $pq)
                ->where('status', 2)
                ->orderBy('order', 'asc')
                ->limit(5)
                ->get();

            return response()->json([
                'status' => 'success',
                'data' => $quotes
            ], 200);
        } else {
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

            // order by
            $query = Quote::with('like')->whereIn('id', $pq)
                ->where('status', 2)
                ->orderBy($column, $dir);

            // pagination
            if ($request->has('all')) {
                $quotes = $query->get();
            } else {
                $quotes = $query->paginate($length);
            }

            return response()->json([
                'status' => 'success',
                'data' => $quotes
            ], 200);
        }
    }

    public function store($id)
    {
        $pq = PastQuote::where('user_id', auth('sanctum')->user()->id)
            ->where('quote_id', $id)
            ->first();

        if (!$pq) {
            $pq = new PastQuote;
            $pq->user_id = auth('sanctum')->user()->id;
            $pq->quote_id = $id;
            $pq->save();
        }

        return response()->json([
            'status' => 'success',
            'data' => $pq
        ], 200);
    }

    public function destroy($id)
    {
        $pq = PastQuote::where('user_id', auth('sanctum')->user()->id)
            ->where('quote_id', $id)
            ->first();

        if (!$pq) {
            return response()->json([
                'status' => 'failed',
                'message' => 'data not found'
            ], 404);
        }
    
        $pq->delete();
    
        return response()->json([
            'status' => 'success',
            'data' => $pq
        ], 200);
    }
}