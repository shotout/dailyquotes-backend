<?php

namespace App\DataTables;

use App\Models\Admins;
use App\Models\Category;
use App\Models\Collection;
use App\Models\CollectionQuote;
use App\Models\Quote;
use App\Models\UserQuote;
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
            ->addColumn('collectioned', function ($quotes) {
                $collectioned = CollectionQuote::where('quote_id', $quotes->id)->count();

                return $collectioned;
            })
            // ->addColumn('action', function ($quotes) {
            //     $delete = '<form method="POST" action="' . url("quotes/delete/" . $quotes->id) . '"accept-charset="UTF-8" class="display_inline" id="delete-item-' . $quotes->id . '">
            //     ' . csrf_field() . '
            //         <input type="hidden" name="id" value="' . $quotes->id . '">
            //         <button title="' . __('Delete') . '" class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-id="' . $quotes->id . '" data-target="#confirmDelete" data-label = "Delete" data-title="' . __('Delete item') . '" data-message="' . __('Are you sure to delete this item?') . '">
            //             <i class="feather icon-trash-2"></i> 
            //         </button>
            //     </form>';
            //     return $delete;
            // })
            ->addColumn('liked', function ($quotes) {
                $liked = UserQuote::join('quotes', 'quotes.id', '=', 'user_quote.quote_id')
                ->where('flag','like')
                ->where('quote_id', $quotes->id)
                ->count();

                return $liked;
            })
            ->addColumn('disliked', function ($quotes) {
                $disliked = UserQuote::join('quotes', 'quotes.id', '=', 'user_quote.quote_id')
                ->where('flag','dislike')
                ->where('quote_id', $quotes->id)
                ->count();

                return $disliked;
            })
            ->rawColumns(['name','title','collectioned','liked','disliked','action'])
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
            ->addColumn(['data' => 'liked', 'name' => 'liked', 'title' => __('Liked')])
            ->addColumn(['data' => 'disliked', 'name' => 'disliked', 'title' => __('Disliked')])
            ->addColumn(['data' => 'count_share', 'name' => 'shared', 'title' => __('Shared')])
            ->addColumn(['data' => 'collectioned', 'name' => 'collectioned', 'title' => __('Added to Collection')])
            // ->addColumn(['data' => 'action', 'name' => 'action', 'title' => __('Action'), 'searchable' => false, 'orderable' => false])
            ->parameters([
                'pageLength' => 100,
                'order' => [3, 'ASC']
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
