<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Quote;
use App\Models\Category;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscription;

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
        if (auth('sanctum')->check()) {
            $categories = UserCategory::where('user_id', auth('sanctum')->user()->id)
                ->pluck('category_id')
                ->toArray();
        }

        if (!count($categories)) {
            $categories = array(1);
        }

        // order by
        $query = Quote::whereIn('category_id', $categories)
            ->where('status', 2)
            ->orderBy($column, $dir);

        // search
        if ($request->has('search') && $request->input('search') != '') {
            $query->where(function($q) use($request) {
                $q->where('field1', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('field2', 'like', '%' . $request->input('search') . '%');
            });
        }

        // pagination
        $data = $query->paginate($length);

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
