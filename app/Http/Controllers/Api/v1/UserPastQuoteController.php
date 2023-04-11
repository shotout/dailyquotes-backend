<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Models\Quote;
use App\Models\PastQuote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPastQuoteController extends Controller
{
    public function index(Request $request)
    {
        if (auth('sanctum')->user()->subscription->type == 1) {
            // $quotes = Quote::with('like')->whereIn('id', $pq)
            //     ->where('status', 2)
            //     ->orderBy('order', 'desc')
            //     ->limit(5)
            //     ->get();

            $pq = PastQuote::where('user_id', auth('sanctum')->user()->id)
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->pluck('quote_id')
                ->toArray();

            $quotes = array();

            foreach ($pq as $item) {
                $quote = Quote::with('like')->find($item);
                if ($quote) {
                    $quotes[] = $quote;
                }
            }

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
                $column = 'created_at';
            }

            // order direction
            if ($request->has('dir') && $request->input('dir') != '') {
                $dir = $request->input('dir');
            } else {
                $dir = 'desc';
            }

            $query = PastQuote::where('user_id', auth('sanctum')->user()->id)
                ->orderBy($column, $dir);

            // pagination
            if ($request->has('all')) {
                $quotes = $query->get();
            } else {
                $quotes = $query->paginate($length);
            }
            
            foreach ($quotes as $i => $item) {
                $quote = Quote::with('like')->find($item->quote_id);
                if ($quote) {
                    $quotes[$i] = $quote;
                }
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

            $user = User::find(auth('sanctum')->user()->id);
            if ($user) {
                $user->quote_count++;
                $user->update();
            }
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