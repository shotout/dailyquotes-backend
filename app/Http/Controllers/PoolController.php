<?php

namespace App\Http\Controllers;

use App\DataTables\PoolFeelsDatatable;
use App\DataTables\PoolListDatatable;
use App\DataTables\PoolWaysDatatable;
use App\Models\Admins;
use App\Models\Area;
use App\Models\CategoryArea;
use App\Models\CategoryFeel;
use App\Models\CategoryWay;
use App\Models\Feel;
use App\Models\Way;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    public function index(PoolListDatatable $dataTable)

    {
        $data['menu'] = 'setting';
        $data['sub_menu'] = 'pool';
        $data['page_title'] = __('Quotes Pool');

        $row_per_page = 10;

        return $dataTable->with('row_per_page', $row_per_page)->render('apps.pool.pool_list', $data);
    }


    public function feels(PoolFeelsDatatable $dataTable)

    {
        $data['menu'] = 'setting';
        $data['sub_menu'] = 'feels';
        $data['page_title'] = __('Quotes Pool');

        $row_per_page = 10;

        return $dataTable->with('row_per_page', $row_per_page)->render('apps.pool.feels_list', $data);
    }


    public function ways(PoolWaysDatatable $dataTable)

    {
        $data['menu'] = 'setting';
        $data['sub_menu'] = 'ways';
        $data['page_title'] = __('Quotes Pool');

        $row_per_page = 10;

        return $dataTable->with('row_per_page', $row_per_page)->render('apps.pool.ways_list', $data);
    }


    public function area(Request $request)
    {
        $area = substr($request->id, 0, 1);
        $categori = substr($request->id, 2);
        $area_id = '';

        if ($area == '1') {
            $area_id = Area::where('name', 'Productivity')->get('id');
        } elseif ($area == '2') {
            $area_id = Area::where('name', 'Positive Thinking')->get('id');
        } elseif ($area == '3') {
            $area_id = Area::where('name', 'Inspiration')->get('id');
        } elseif ($area == '4') {
            $area_id = Area::where('name', 'Stress & Anxiety')->get('id');
        } elseif ($area == '5') {
            $area_id = Area::where('name', 'Relationships')->get('id');
        } elseif ($area == '6') {
            $area_id = Area::where('name', 'Working Out')->get('id');
        } elseif ($area == '7') {
            $area_id = Area::where('name', 'Self-Esteem')->get('id');
        } else {
            $area_id = Area::where('name', 'Achieving Goals')->get('id');
        }


        if ($request->status == '1') {
            $way = CategoryArea::where('area_id', $area)->where('category_id', $categori)->first();
            $way->delete();
        }
        if ($request->status == '0') {
            $way = new CategoryArea();
            $way->area_id = $area_id[0]->id;
            $way->category_id = $categori;
            $way->save();
        }

        $data['status']       = 'success';
        return $data;
    }


    public function feel(Request $request)
    {
        $feels = substr($request->id, 0, 1);
        $categori = substr($request->id, 2);
        $feels_id = '';

        if ($feels == '1') {
            $feels_id = Feel::where('name', 'Awesome')->get('id');
        } elseif ($feels == '2') {
            $feels_id = Feel::where('name', 'Good')->get('id');
        } elseif ($feels == '3') {
            $feels_id = Feel::where('name', 'Ok')->get('id');
        } elseif ($feels == '4') {
            $feels_id = Feel::where('name', 'Bad')->get('id');
        } elseif ($feels == '5') {
            $feels_id = Feel::where('name', 'Terrible')->get('id');
        } else {
            $feels_id = Feel::where('name', 'Other')->get('id');
        }


        if ($request->status == '1') {
            $way = CategoryFeel::where('feel_id', $feels)->where('category_id', $categori)->first();
            $way->delete();
        }
        if ($request->status == '0') {
            $way = new CategoryFeel();
            $way->feel_id = $feels_id[0]->id;
            $way->category_id = $categori;
            $way->save();
        }

        $data['status']       = 'success';
        return $data;
    }



    public function way(Request $request)
    {
        $ways = substr($request->id, 0, 1);
        $categori = substr($request->id, 2);
        $ways_id = '';

        if ($ways == '1') {
            $ways_id = Way::where('name', 'Family')->get('id');
        } elseif ($ways == '2') {
            $ways_id = Way::where('name', 'Friends')->get('id');
        } elseif ($ways == '3') {
            $ways_id = Way::where('name', 'Work')->get('id');
        } elseif ($ways == '4') {
            $ways_id = Way::where('name', 'Health')->get('id');
        } elseif ($ways == '5') {
            $ways_id = Way::where('name', 'Relationship')->get('id');
        } else {
            $ways_id = Way::where('name', 'Other')->get('id');
        }


        if ($request->status == '1') {
            $way = CategoryWay::where('way_id', $ways)->where('category_id', $categori)->first();
            $way->delete();
        }
        if ($request->status == '0') {
            $way = new CategoryWay();
            $way->way_id = $ways_id[0]->id;
            $way->category_id = $categori;
            $way->save();
        }

        $data['status']       = 'success';
        return $data;
    }
}
