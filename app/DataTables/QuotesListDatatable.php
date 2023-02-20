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
                $collectioned = CollectionQuote::where('quote_id', $quotes->id)
                                ->join ('collections', 'collections.id', '=', 'collection_quotes.collection_id')
                                ->join('subscriptions', 'subscriptions.user_id', '=', 'collections.user_id')
                                ->where('subscriptions.plan_id', '!=', '1')
                                ->count();

                return $collectioned;
            })
            ->addColumn('collectioned_free', function ($quotes) {
                $collectioned_free = CollectionQuote::where('quote_id', $quotes->id)
                                ->join ('collections', 'collections.id', '=', 'collection_quotes.collection_id')
                                ->join('subscriptions', 'subscriptions.user_id', '=', 'collections.user_id')
                                ->where('subscriptions.plan_id', '=', '1')
                                ->count();

                return $collectioned_free;
            }) 
            ->addColumn('liked', function ($quotes) {
                $liked = UserQuote::join('quotes', 'quotes.id', '=', 'user_quote.quote_id')
                ->join('subscriptions', 'subscriptions.user_id', '=', 'user_quote.user_id')
                ->where('flag','like')
                ->where('subscriptions.plan_id', '!=', '1')
                ->where('quote_id', $quotes->id)
                ->count();

                return $liked;
            })
            ->addColumn('liked_free', function ($quotes) {
                $liked_free = UserQuote::join('quotes', 'quotes.id', '=', 'user_quote.quote_id')
                ->join('subscriptions', 'subscriptions.user_id', '=', 'user_quote.user_id')
                ->where('flag','like')
                ->where('subscriptions.plan_id', '=', '1')
                ->where('quote_id', $quotes->id)
                ->count();

                return $liked_free;
            })
            ->addColumn('disliked', function ($quotes) {
                $disliked = UserQuote::join('quotes', 'quotes.id', '=', 'user_quote.quote_id')
                ->join('subscriptions', 'subscriptions.user_id', '=', 'user_quote.user_id')
                ->where('flag','dislike')
                ->where('subscriptions.plan_id', '!=', '1')
                ->where('quote_id', $quotes->id)
                ->count();

                return $disliked;
            })
            ->addColumn('disliked_free', function ($quotes) {
                $disliked_free = UserQuote::join('quotes', 'quotes.id', '=', 'user_quote.quote_id')
                ->join('subscriptions', 'subscriptions.user_id', '=', 'user_quote.user_id')
                ->where('flag','dislike')
                ->where('subscriptions.plan_id', '=', '1')
                ->where('quote_id', $quotes->id)
                ->count();

                return $disliked_free;
            })
            ->rawColumns(['name','title','collectioned','collectioned_free','liked','liked_free','disliked','disliked_free','action'])
            ->make(true);
    }


    public function query($data = [])
    {
        $categories = Category::join('quotes', 'quotes.category_id', '=', 'categories.id')
            ->join('user_quote', 'user_quote.quote_id', '=', 'quotes.id')
            ->leftjoin('collection_quotes', 'collection_quotes.quote_id', '=', 'quotes.id')
            ->select('quotes.id','title','count_share', 'categories.name as group_name')
            ->groupBy('quotes.id')
            ->get();

        return $this->applyScopes($categories,$data);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'id', "visible" => false])
            ->addColumn(['data' => 'group_name', 'name' => 'category_name', 'title' => __('Category')])
            ->addColumn(['data' => 'title', 'name' => 'title', 'title' => __('Quotes')])
            ->addColumn(['data' => 'liked', 'name' => 'liked', 'title' => __('Liked (P)')])
            ->addColumn(['data' => 'liked_free', 'name' => 'liked_free', 'title' => __('Liked (F)')])
            ->addColumn(['data' => 'disliked', 'name' => 'disliked', 'title' => __('Disliked (P)')])
            ->addColumn(['data' => 'disliked_free', 'name' => 'disliked_free', 'title' => __('Disliked (F)')])
            ->addColumn(['data' => 'count_share', 'name' => 'shared', 'title' => __('Shared')])
            ->addColumn(['data' => 'collectioned', 'name' => 'collectioned', 'title' => __('Added to Coll (P)')])
            ->addColumn(['data' => 'collectioned_free', 'name' => 'collectioned_free', 'title' => __('Added to Coll (F)')])
            // ->addColumn(['data' => 'action', 'name' => 'action', 'title' => __('Action'), 'searchable' => false, 'orderable' => false])
            ->serverSide(true)
            ->parameters([
                'pageLength' => 50,
                'order' => [[4, 'desc'],[3, 'desc'],[5, 'desc'],[6, 'desc'],[7, 'desc'],[8, 'desc'],[9, 'desc'],],
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
