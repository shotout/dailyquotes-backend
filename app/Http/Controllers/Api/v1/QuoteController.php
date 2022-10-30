<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Quote;
use App\Models\PastQuote;
use App\Models\Subscription;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MyQuote;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        // limit
        if ($request->has('length') && $request->input('length') != '') {
            $length = $request->input('length');
        } else {
            $length = 1;
        }

        // order by field
        if ($request->has('column') && $request->input('column') != '') {
            $column = $request->input('column');
        } else {
            $column = 'id';
        }

        // order direction
        if ($request->has('dir') && $request->input('dir') != '') {
            $dir = $request->input('dir');
        } else {
            $dir = 'desc';
        }

        // if user login
        // if (auth('sanctum')->check()) {
        //     $categories = UserCategory::where('user_id', auth('sanctum')->user()->id)
        //         ->pluck('category_id')
        //         ->toArray();
        // }

        // if (!count($categories)) {
        //     $categories = array(1);
        // }

        // list past quote user
        $pastQuotes = PastQuote::where('user_id', auth('sanctum')->user()->id)
            ->pluck('quote_id')
            ->toArray();

        // my quotes
        $myQuotes = MyQuote::where('user_id', auth('sanctum')->user()->id)->first();
        if ($myQuotes) {
            // order by
            $query = Quote::whereIn('id', $myQuotes->quotes)
                ->whereNotIn('id', $pastQuotes)
                ->where('status', 2)
                ->orderBy($column, $dir);

            // pagination
            $data = $query->paginate($length);

            // check if past quotes full
            if ($data->total() == 0) {
                $query = Quote::whereIn('id', $myQuotes->quotes)
                    ->where('status', 2)
                    ->orderBy($column, $dir);

                $data = $query->paginate($length);
            }
        } else {
            // order by
            $query = Quote::whereNotIn('id', $pastQuotes)
                ->where('status', 2)
                ->orderBy($column, $dir);

            // pagination
            $data = $query->paginate($length);

            // check if past quotes full
            if ($data->total() == 0) {
                $query = Quote::where('status', 2)
                    ->orderBy($column, $dir);

                $data = $query->paginate($length);
            }
        }

        // user themes
        $counter = 0;
        foreach ($data as $qt) {
            if ($counter == count(auth('sanctum')->user()->themes)) {
                $counter = 0;
            }

            $qt->theme = auth('sanctum')->user()->themes[$counter];
            $counter++;
        }

        // free 1 month
        $isFreeUser = Subscription::where('user_id', auth('sanctum')->user()->id)
            ->where('type', 1)
            ->where('status', 2)
            ->exists();
        $hasMonthFree = Subscription::where('user_id', auth('sanctum')->user()->id)
            ->where('type', 5)
            ->exists();
        if ($isFreeUser && $hasMonthFree) {
            $month_free = true;
        } else {
            $month_free = false;
        }

        // retun response
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'flag' => (object) array(
                'month_free' => $month_free
            )
        ], 200);
    }
}
