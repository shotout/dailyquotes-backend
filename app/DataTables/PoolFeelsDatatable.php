<?php

namespace App\DataTables;

use App\Models\Admins;
use App\Models\Category;
use App\Models\CategoryArea;
use App\Models\CategoryFeel;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Services\DataTable;

class PoolFeelsDatatable extends DataTable
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
            ->addColumn('Awesome', function ($categories) {
                $data = CategoryFeel::join('feels', 'feels.id', '=', 'category_feels.feel_id')
                    ->select('feels.name as feels_name')
                    ->where('category_feels.category_id', $categories->id)
                    ->where('feels.name', 'Awesome')
                    ->get();

                $Awesome = '';

                if ($data->count() > 0) {
                    $Awesome = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status2" id="switch-1-' . $categories->id . '" data-id="1-' . $categories->id . '" checked="true">
                        <label for="switch-1-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Awesome = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status2" id="switch-1-' . $categories->id . '" data-id="1-' . $categories->id . '">
                        <label for="switch-1-' . $categories->id . '" class="cr"></label>
                       </div>';
                }


                return $Awesome;
            })
            ->addColumn('Good', function ($categories) {
                $data = CategoryFeel::join('feels', 'feels.id', '=', 'category_feels.feel_id')
                    ->select('feels.name as feels_name')
                    ->where('category_feels.category_id', $categories->id)
                    ->where('feels.name', 'Good')
                    ->get();

                $Good = '';

                if ($data->count() > 0) {
                    $Good = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status2" id="switch-2-' . $categories->id . '" data-id="2-' . $categories->id . '" checked="true">
                        <label for="switch-2-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Good = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status2" id="switch-2-' . $categories->id . '" data-id="2-' . $categories->id . '">
                        <label for="switch-2-' . $categories->id . '" class="cr"></label>
                       </div>';
                }


                return $Good;
            })
            ->addColumn('Ok', function ($categories) {
                $data = CategoryFeel::join('feels', 'feels.id', '=', 'category_feels.feel_id')
                    ->select('feels.name as feels_name')
                    ->where('category_feels.category_id', $categories->id)
                    ->where('feels.name', 'Ok')
                    ->get();

                $Ok = '';

                if ($data->count() > 0) {
                    $Ok = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status2" id="switch-3-' . $categories->id . '" data-id="3-' . $categories->id . '" checked="true">
                        <label for="switch-3-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Ok = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status2" id="switch-3-' . $categories->id . '" data-id="3-' . $categories->id . '">
                        <label for="switch-3-' . $categories->id . '" class="cr"></label>
                       </div>';
                }


                return $Ok;
            })
            ->addColumn('Bad', function ($categories) {
                $data = CategoryFeel::join('feels', 'feels.id', '=', 'category_feels.feel_id')
                    ->select('feels.name as feels_name')
                    ->where('category_feels.category_id', $categories->id)
                    ->where('feels.name', 'Bad')
                    ->get();

                $Bad = '';

                if ($data->count() > 0) {
                    $Bad = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status2" id="switch-4-' . $categories->id . '" data-id="4-' . $categories->id . '" checked="true">
                        <label for="switch-4-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Bad = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status2" id="switch-4-' . $categories->id . '" data-id="4-' . $categories->id . '">
                        <label for="switch-4-' . $categories->id . '" class="cr"></label>
                       </div>';
                }


                return $Bad;
            })
            ->addColumn('Terrible', function ($categories) {
                $data = CategoryFeel::join('feels', 'feels.id', '=', 'category_feels.feel_id')
                    ->select('feels.name as feels_name')
                    ->where('category_feels.category_id', $categories->id)
                    ->where('feels.name', 'Terrible')
                    ->get();

                $Terrible = '';

                if ($data->count() > 0) {
                    $Terrible = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status2" id="switch-5-' . $categories->id . '" data-id="5-' . $categories->id . '" checked="true">
                        <label for="switch-5-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Terrible = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status2" id="switch-5-' . $categories->id . '" data-id="5-' . $categories->id . '">
                        <label for="switch-5-' . $categories->id . '" class="cr"></label>
                       </div>';
                }


                return $Terrible;
            })
            ->addColumn('Other', function ($categories) {
                $data = CategoryFeel::join('feels', 'feels.id', '=', 'category_feels.feel_id')
                    ->select('feels.name as feels_name')
                    ->where('category_feels.category_id', $categories->id)
                    ->where('feels.name', 'Other')
                    ->get();

                $Other = '';

                if ($data->count() > 0) {
                    $Other = '<div class="switch d-inline m-r-8">
                        <input type="checkbox" class="status2" id="switch-6-' . $categories->id . '" data-id="6-' . $categories->id . '" checked="true">
                        <label for="switch-6-' . $categories->id . '" class="cr"></label>
                       </div>';
                } else {
                    $Other = '<div class="switch d-inline m-r-5">
                        <input type="checkbox" class="status2" id="switch-6-' . $categories->id . '" data-id="6-' . $categories->id . '">
                        <label for="switch-6-' . $categories->id . '" class="cr"></label>
                       </div>';
                }


                return $Other;
            })
            ->rawColumns(['no', 'name', 'Awesome', 'Good','Ok', 'Bad', 'Terrible', 'Other'])
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
            ->addColumn(['data' => 'Awesome', 'name' => 'Awesome', 'title' => __('Awesome'), 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'Good', 'name' => 'Good', 'title' => __('Good'), 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'Ok', 'name' => 'Ok', 'title' => __('Ok'), 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'Bad', 'name' => 'Bad', 'title' => __('Bad'), 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'Terrible', 'name' => 'Terrible', 'title' => __('Terrible'), 'orderable' => false, 'searchable' => false])
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
