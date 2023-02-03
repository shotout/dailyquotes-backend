<?php

namespace App\DataTables;

use App\Models\Admins;
use App\Models\Category;
use App\Models\Media;
use App\Models\Theme;
use App\Models\UserTheme;
use Illuminate\Support\Env;
use Yajra\DataTables\Services\DataTable;

class ThemesListDataTable extends DataTable
{
    public function ajax()
    {
        $categories = $this->query();
        return datatables()
            ->of($categories)
            ->addColumn('free_users', function ($categories) {
                $total_users = UserTheme::join('subscriptions', 'subscriptions.user_id', '=', 'user_themes.user_id')
                ->where('subscriptions.plan_id', '1')
                ->where('theme_id', $categories->id)->count();
                return $total_users;
            })
            ->addColumn('paid_users', function ($categories) {
                $total_users = UserTheme::join('subscriptions', 'subscriptions.user_id', '=', 'user_themes.user_id')
                ->where('subscriptions.plan_id', '!=', '1')
                ->where('theme_id', $categories->id)->count();
                return $total_users;
            })
            ->addColumn('url', function ($categories) {
                $img = '';
                $data = Media::where('owner_id', $categories->id)->where('type', 'theme')->first();
                if ($data) {
                    $img = '<img src="' . env('APP_URL') . $data->url . '" alt="icon" width="100" height="100">';
                    return $img;
                }


                return $img;
            })
            ->rawColumns(['name', 'url', 'free_users','paid_users', 'action'])
            ->make(true);
    }


    public function query()
    {
        $categories = Theme::select('themes.id', 'themes.name')
            ->orderBy('id', 'desc')
            ->groupBy('themes.id')
            ->get();

        return $this->applyScopes($categories);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'id', "visible" => false])
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => __('Theme Name')])
            ->addColumn(['data' => 'url', 'name' => 'url', 'title' => __('Theme Image')])
            ->addColumn(['data' => 'free_users', 'name' => 'free_users', 'title' => __('Free Users')])
            ->addColumn(['data' => 'paid_users', 'name' => 'paid_users', 'title' => __('Paid Users')])
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
