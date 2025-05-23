<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Way;
use App\Models\Area;
use App\Models\Feel;
use App\Models\Link;
use App\Models\Group;
use App\Models\Style;
use App\Models\Theme;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\UserCategory;

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
        // $data = Theme::with('background')->where('status', 2)->get();
        $data = Group::with('themes')->where('flag', 2)->where('status', 2)->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function groups(Request $request)
    {
        $popular = Category::withCount('quotes')
            ->with('icon')
            ->orderBy('quotes_count', 'desc')
            ->take(4)
            ->get();

        if ($request->has('search') && $request->input('search') != '') {
            // $query->whereHas('categories', function($q) use($request) {
            //     $q->where('name', 'like', '%' . $request->input('search') . '%');
            // });

            $query = Group::with(['categories' => function($q) use($request) {
                $q->where('name', 'like', '%' . $request->input('search') . '%');
            }])
            ->where('flag', 1)
            ->where('status', 2);
        } else {
            $query = Group::with('categories')->where('flag', 1)->where('status', 2);
        }

        $groups = $query->get();
        
        if ($request->has('search') && $request->input('search') != '') {
            $res = array();
            foreach ($groups as $group) {
                if (count($group->categories)) {
                    $res[] = $group;
                }
            }
            $groups = $res;
        }

        $data = array(
            "popular" => $popular,
            "category" => $groups,
            "alternative" => null
        );

        // alternative category
        if ($request->has('search') && $request->input('search') != '') {
            if (!count($groups)) {
                if (auth('sanctum')->check()) {
                    $myCategory = UserCategory::where('user_id', auth('sanctum')->user()->id)
                        ->pluck('category_id')
                        ->toArray();

                    $alternatives = Group::with(['categories' => function($q) use($myCategory) {
                        $q->whereNotIn('id', $myCategory);
                    }])
                        ->where('flag', 1)
                        ->where('status', 2)
                        ->get();

                    $resp = array();
                    foreach ($alternatives as $group) {
                        if (count($group->categories)) {
                            $resp[] = $group;
                        }
                    }
                    $data['alternative'] = $resp;
                }
            }
        }

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

    public function links(Request $request)
    {
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

        $query = Link::with('icon')->where('status', 2)->orderBy($column, $dir);

        if ($request->has('flag') && $request->flag != '') {
            $query->where('flag', $request->flag);
        }

        if ($request->has('search') && $request->input('search') != '') {
            $query->where(function($q) use($request) {
                $q->where('title', 'like', '%' . $request->input('search') . '%');
            });
        }

        $data = $query->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function fonts()
    {
        $data = Theme::select('id','font_family')
            ->where('id','!=',6)
            ->where('status', 2)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function backgrounds()
    {
        $data = Media::select('id','url')
            ->where('type', 'theme')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }
}
