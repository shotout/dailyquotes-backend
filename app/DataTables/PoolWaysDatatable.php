<?php

namespace App\DataTables;

use App\Models\Admins;
use App\Models\Category;
use App\Models\CategoryArea;
use App\Models\CategoryFeel;
use App\Models\CategoryWay;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Services\DataTable;

class PoolWaysDatatable extends DataTable
{
    public function ajax()
    {
        $categories = $this->query();
        return datatables()
            ->of($categories)
            ->addColumn('no', function ($categories) {
                $status = '';
                if ($categories->is_free == 1) {
                    $status = '<span class="badge badge-success">Free</span>';
                } else {
                    $status = '<span class = "badge badge-danger">Paid</span>';
                }
                return $status;
            })
            ->addColumn('Family', function ($categories) {
                $data = CategoryWay::join('ways', 'ways.id', '=', 'category_ways.way_id')
                    ->select('ways.name as ways_name')
                    ->where('category_ways.category_id', $categories->id)
                    ->where('ways.name', 'Family')
                    ->get();

                $Family = '';

                if ($data->count() > 0) {
                    $Family = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status3" id="switch-1-' . $categories->id . '" data-id="1-' . $categories->id . '" checked="true">
                        <label for="switch-1-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Family = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status3" id="switch-1-' . $categories->id . '" data-id="1-' . $categories->id . '">
                        <label for="switch-1-' . $categories->id . '" class="cr"></label>
                       </div>';
                }

                return $Family;
            })
            ->addColumn('Friends', function ($categories) {
                $data = CategoryWay::join('ways', 'ways.id', '=', 'category_ways.way_id')
                    ->select('ways.name as ways_name')
                    ->where('category_ways.category_id', $categories->id)
                    ->where('ways.name', 'Friends')
                    ->get();

                $Friends = '';

                if ($data->count() > 0) {
                    $Friends = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status3" id="switch-2-' . $categories->id . '" data-id="2-' . $categories->id . '" checked="true">
                        <label for="switch-2-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Friends = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status3" id="switch-2-' . $categories->id . '" data-id="2-' . $categories->id . '">
                        <label for="switch-2-' . $categories->id . '" class="cr"></label>
                       </div>';
                }

                return $Friends;
            })
            ->addColumn('Work', function ($categories) {
                $data = CategoryWay::join('ways', 'ways.id', '=', 'category_ways.way_id')
                    ->select('ways.name as ways_name')
                    ->where('category_ways.category_id', $categories->id)
                    ->where('ways.name', 'Work')
                    ->get();

                $Work = '';

                if ($data->count() > 0) {
                    $Work = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status3" id="switch-3-' . $categories->id . '" data-id="3-' . $categories->id . '" checked="true">
                        <label for="switch-3-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Work = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status3" id="switch-3-' . $categories->id . '" data-id="3-' . $categories->id . '">
                        <label for="switch-3-' . $categories->id . '" class="cr"></label>
                       </div>';
                }

                return $Work;
            })
            ->addColumn('Health', function ($categories) {
                $data = CategoryWay::join('ways', 'ways.id', '=', 'category_ways.way_id')
                    ->select('ways.name as ways_name')
                    ->where('category_ways.category_id', $categories->id)
                    ->where('ways.name', 'Health')
                    ->get();

                $Health = '';

                if ($data->count() > 0) {
                    $Health = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status3" id="switch-4-' . $categories->id . '" data-id="4-' . $categories->id . '" checked="true">
                        <label for="switch-4-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Health = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status3" id="switch-4-' . $categories->id . '" data-id="4-' . $categories->id . '">
                        <label for="switch-4-' . $categories->id . '" class="cr"></label>
                       </div>';
                }

                return $Health;
            })
            ->addColumn('Relationship', function ($categories) {
                $data = CategoryWay::join('ways', 'ways.id', '=', 'category_ways.way_id')
                    ->select('ways.name as ways_name')
                    ->where('category_ways.category_id', $categories->id)
                    ->where('ways.name', 'Relationship')
                    ->get();

                $Relationship = '';

                if ($data->count() > 0) {
                    $Relationship = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status3" id="switch-5-' . $categories->id . '" data-id="5-' . $categories->id . '" checked="true">
                        <label for="switch-5-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Relationship = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status3" id="switch-5-' . $categories->id . '" data-id="5-' . $categories->id . '">
                        <label for="switch-5-' . $categories->id . '" class="cr"></label>
                       </div>';
                }

                return $Relationship;
            })
            ->addColumn('Other', function ($categories) {
                $data = CategoryWay::join('ways', 'ways.id', '=', 'category_ways.way_id')
                    ->select('ways.name as ways_name')
                    ->where('category_ways.category_id', $categories->id)
                    ->where('ways.name', 'Other')
                    ->get();

                $Other = '';

                if ($data->count() > 0) {
                    $Other = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status3" id="switch-6-' . $categories->id . '" data-id="6-' . $categories->id . '" checked="true">
                        <label for="switch-6-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Other = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status3" id="switch-6-' . $categories->id . '" data-id="6-' . $categories->id . '">
                        <label for="switch-6-' . $categories->id . '" class="cr"></label>
                       </div>';
                }

                return $Other;
            })
            ->rawColumns(['no', 'name', 'Family','Friends','Work','Health','Relationship','Other'])
            ->make(true);
    }


    public function query()
    {
        $categories = Category::orderby('name', 'asc')->get();
        return $this->applyScopes($categories);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'id', "visible" => false])
            ->addColumn(['data' => 'no', 'name' => 'no', 'title' => __('Package')])
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => __('Category Name')])
            ->addColumn(['data' => 'Family', 'name' => 'Awesome', 'title' => __('Family'), 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'Friends', 'name' => 'Good', 'title' => __('Friends'), 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'Health', 'name' => 'Ok', 'title' => __('Health'), 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'Relationship', 'name' => 'Bad', 'title' => __('Relationship'), 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'Other', 'name' => 'Other', 'title' => __('Other'), 'orderable' => false, 'searchable' => false])

            ->parameters([
                'pageLength' => $this->row_per_page,
                'order' => [1, 'ASC']
            ]);
    }

    protected function getColumns()
    {
        return [
            'id',
            'created_at',
            'updated_at',
        ];
    }

    protected function filename()
    {
        return 'admins_' . time();
    }
}
