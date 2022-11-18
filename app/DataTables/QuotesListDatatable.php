<?php

namespace App\DataTables;

use App\Models\Admins;
use App\Models\Category;
use App\Models\Quote;
use Illuminate\Support\Env;
use Yajra\DataTables\Services\DataTable;

class QuotesListDatatable extends DataTable
{
    public function ajax()
    {
        $quotes = $this->query();
        return datatables()
            ->of($quotes)
            ->addColumn('title', function ($quotes) {
                $quote = '';
                $quote .= '<a href="' . url('quotes/edit/' . $quotes->id) . '">' . $quotes->title . '</a><br>';
                return  $quote . '<a href="' . url("quotes/edit/" . $quotes->id) . '"  target="_blank"></a>';
            })
            ->addColumn('action', function ($quotes) {
                $delete = '<form method="POST" action="' . url("quotes/delete/" . $quotes->id) . '"accept-charset="UTF-8" class="display_inline" id="delete-item-' . $quotes->id . '">
                ' . csrf_field() . '
                    <input type="hidden" name="id" value="' . $quotes->id . '">
                    <button title="' . __('Delete') . '" class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-id="' . $quotes->id . '" data-target="#confirmDelete" data-label = "Delete" data-title="' . __('Delete item') . '" data-message="' . __('Are you sure to delete this item?') . '">
                        <i class="feather icon-trash-2"></i> 
                    </button>
                </form>';
                return $delete;
            })
            ->rawColumns(['name','title','action'])
            ->make(true);
    }


    public function query()
    {
        $categories = Category::join('quotes', 'quotes.category_id', '=', 'categories.id')
            ->select('quotes.*', 'categories.name as group_name')
            ->orderBy('categories.name', 'asc')
            ->get();

        return $this->applyScopes($categories);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'id', "visible" => false])
            ->addColumn(['data' => 'group_name', 'name' => 'category_name', 'title' => __('Category')])
            ->addColumn(['data' => 'title', 'name' => 'title', 'title' => __('Quotes')])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => __('Action'), 'searchable' => false, 'orderable' => false])
            ->parameters([
                'pageLength' => $this->row_per_page,
                'order' => [0, 'DESC']
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

}
