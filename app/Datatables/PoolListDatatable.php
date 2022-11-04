<?php

namespace App\DataTables;

use App\Models\Admins;
use App\Models\Category;
use App\Models\CategoryArea;
use App\Models\CategoryFeel;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Services\DataTable;

class PoolListDatatable extends DataTable
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
            ->addColumn('Productivity', function ($categories) {
                $data = CategoryArea::join('areas', 'areas.id', '=', 'category_areas.area_id')
                    ->select('areas.name as area_name')
                    ->where('category_areas.category_id', $categories->id)
                    ->where('areas.name', 'Productivity')
                    ->get();

                $productivity = '';

                if ($data->count() > 0) {
                    $productivity = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status" id="switch-1-' . $categories->id . '" data-id="1-' . $categories->id . '" checked="true">
                        <label for="switch-1-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $productivity = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status" id="switch-1-' . $categories->id . '" data-id="1-' . $categories->id . '">
                        <label for="switch-1-' . $categories->id . '" class="cr"></label>
                       </div>';
                }


                return $productivity;
            })
            ->addColumn('Positive Thinking', function ($categories) {
                $data = CategoryArea::join('areas', 'areas.id', '=', 'category_areas.area_id')
                    ->select('areas.name as area_name')
                    ->where('category_areas.category_id', $categories->id)
                    ->where('areas.name', 'Positive Thinking')
                    ->get();

                $positive = '';

                if ($data->count() > 0) {
                    $positive = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status" id="switch-2-' . $categories->id . '" data-id="2-' . $categories->id . '" checked="true">
                        <label for="switch-2-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $positive = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status" id="switch-2-' . $categories->id . '" data-id="2-' . $categories->id . '">
                        <label for="switch-2-' . $categories->id . '" class="cr"></label>
                       </div>';
                }


                return $positive;
            })
            ->addColumn('Inspiration', function ($categories) {
                $data = CategoryArea::join('areas', 'areas.id', '=', 'category_areas.area_id')
                    ->select('areas.name as area_name')
                    ->where('category_areas.category_id', $categories->id)
                    ->where('areas.name', 'Inspiration')
                    ->get();

                $Inspiration = '';

                if ($data->count() > 0) {
                    $Inspiration = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status" id="switch-3-' . $categories->id . '" data-id="3-' . $categories->id . '" checked="true">
                        <label for="switch-3-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Inspiration = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status" id="switch-3-' . $categories->id . '" data-id="3-' . $categories->id . '">
                        <label for="switch-3-' . $categories->id . '" class="cr"></label>
                       </div>';
                }


                return $Inspiration;
            })
            ->addColumn('Stress & Anxiety', function ($categories) {
                $data = CategoryArea::join('areas', 'areas.id', '=', 'category_areas.area_id')
                    ->select('areas.name as area_name')
                    ->where('category_areas.category_id', $categories->id)
                    ->where('areas.name', 'Stress & Anxiety')
                    ->get();

                $Stress = '';

                if ($data->count() > 0) {
                    $Stress = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status" id="switch-4-' . $categories->id . '" data-id="4-' . $categories->id . '" checked="true">
                        <label for="switch-4-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Stress = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status" id="switch-4-' . $categories->id . '" data-id="4-' . $categories->id . '">
                        <label for="switch-4-' . $categories->id . '" class="cr"></label>
                       </div>';
                }


                return $Stress;
            })
            ->addColumn('Relationships', function ($categories) {
                $data = CategoryArea::join('areas', 'areas.id', '=', 'category_areas.area_id')
                    ->select('areas.name as area_name')
                    ->where('category_areas.category_id', $categories->id)
                    ->where('areas.name', 'Relationships')
                    ->get();

                $Relationships = '';

                if ($data->count() > 0) {
                    $Relationships = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status" id="switch-5-' . $categories->id . '" data-id="5-' . $categories->id . '" checked="true">
                        <label for="switch-5-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Relationships = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status" id="switch-5-' . $categories->id . '" data-id="5-' . $categories->id . '">
                        <label for="switch-5-' . $categories->id . '" class="cr"></label>
                       </div>';
                }


                return $Relationships;
            })
            ->addColumn('Working Out', function ($categories) {
                $data = CategoryArea::join('areas', 'areas.id', '=', 'category_areas.area_id')
                    ->select('areas.name as area_name')
                    ->where('category_areas.category_id', $categories->id)
                    ->where('areas.name', 'Working Out')
                    ->get();

                $working_out = '';

                if ($data->count() > 0) {
                    $working_out = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status" id="switch-6-' . $categories->id . '" data-id="6-' . $categories->id . '" checked="true">
                        <label for="switch-6-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $working_out = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status" id="switch-6-' . $categories->id . '" data-id="6-' . $categories->id . '">
                        <label for="switch-6-' . $categories->id . '" class="cr"></label>
                       </div>';
                }


                return $working_out;
            })
            ->addColumn('Self-esteem', function ($categories) {
                $data = CategoryArea::join('areas', 'areas.id', '=', 'category_areas.area_id')
                    ->select('areas.name as area_name')
                    ->where('category_areas.category_id', $categories->id)
                    ->where('areas.name', 'Self-esteem')
                    ->get();

                $self = '';

                if ($data->count() > 0) {
                    $self = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status" id="switch-7-' . $categories->id . '" data-id="7-' . $categories->id . '" checked="true">
                        <label for="switch-7-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $self = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status" id="switch-7-' . $categories->id . '" data-id="7-' . $categories->id . '">
                        <label for="switch-7-' . $categories->id . '" class="cr"></label>
                       </div>';
                }


                return $self;
            })
            ->addColumn('Achieving goals', function ($categories) {
                $data = CategoryArea::join('areas', 'areas.id', '=', 'category_areas.area_id')
                    ->select('areas.name as area_name')
                    ->where('category_areas.category_id', $categories->id)
                    ->where('areas.name', 'Achieving goals')
                    ->get();

                $achieving = '';

                if ($data->count() > 0) {
                    $achieving = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status" id="switch-8-' . $categories->id . '" data-id="8-' . $categories->id . '" checked="true">
                        <label for="switch-8-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $achieving = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status" id="switch-8-' . $categories->id . '" data-id="8-' . $categories->id . '">
                        <label for="switch-8-' . $categories->id . '" class="cr"></label>
                       </div>';
                }


                return $achieving;
            })
            ->rawColumns(['no', 'category', 'Productivity', 'Positive Thinking', 'Inspiration', 'Stress & Anxiety', 'Relationships', 'Working Out', 'Self-esteem', 'Achieving goals'])
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
            ->addColumn(['data' => 'Productivity', 'name' => 'Productivity', 'title' => __('Productivity')])
            ->addColumn(['data' => 'Positive Thinking', 'name' => 'Positive Thinking', 'title' => __('Positive Thinking')])
            ->addColumn(['data' => 'Inspiration', 'name' => 'Inspiration', 'title' => __('Inspiration')])
            ->addColumn(['data' => 'Stress & Anxiety', 'name' => 'Stress & Anxiety', 'title' => __('Stress & Anxiety')])
            ->addColumn(['data' => 'Relationships', 'name' => 'Relationships', 'title' => __('Relationships')])
            ->addColumn(['data' => 'Working Out', 'name' => 'Working Out', 'title' => __('Working Out')])
            ->addColumn(['data' => 'Self-esteem', 'name' => 'Self-esteem', 'title' => __('Self-esteem')])
            ->addColumn(['data' => 'Achieving goals', 'name' => 'Achieving goals', 'title' => __('Achieving goals')])

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
