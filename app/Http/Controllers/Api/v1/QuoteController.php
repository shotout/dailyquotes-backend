<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        // order by
        $query = Quote::where('status', 2)->orderBy($column, $dir);

        // search
        if ($request->has('search') && $request->input('search') != '') {
            $query->where(function($q) use($request) {
                $q->where('field1', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('field2', 'like', '%' . $request->input('search') . '%');
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
}
