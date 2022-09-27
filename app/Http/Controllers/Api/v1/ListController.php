<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Way;
use App\Models\Area;
use App\Models\Feel;
use App\Models\Style;
use App\Models\Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;

class ListController extends Controller
{
    public function styles()
    {
        $data = Style::with('icon')->where('status', 2)->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function feels()
    {
        $data = Feel::with('icon')->where('status', 2)->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function ways()
    {
        $data = Way::with('icon')->where('status', 2)->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function areas()
    {
        $data = Area::where('status', 2)->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function themes()
    {
        $data = Theme::with('background')->where('status', 2)->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function groups(Request $request)
    {
        $popular = Category::withCount('quotes')
            ->orderBy('quotes_count', 'desc')
            ->take(4)
            ->get();

        $query = Group::with('categories')->where('status', 2);

        if ($request->has('search') && $request->input('search') != '') {
            $query->whereHas('categories', function($q) use($request) {
                $q->where('name', 'like', '%' . $request->input('search') . '%');
            });
        }

        $data = array(
            "popular" => $popular,
            "category" => $query->get()
        );

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function categories(Request $request)
    {
        $query = Category::with('icon')->where('status', 2);

        if ($request->has('search') && $request->input('search') != '') {
            $query->where(function($q) use($request) {
                $q->where('name', 'like', '%' . $request->input('search') . '%');
            });
        }

        $data = $query->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }
}
