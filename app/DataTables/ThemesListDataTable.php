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
            ->addColumn('total_users', function ($categories) {
               $total_users = UserTheme::where('theme_id', $categories->id)->count();
                return $total_users;
            })
            ->addColumn('url', function ($categories) {

                $data = Media::where('owner_id', $categories->id)->where('type', 'theme')->first();
                $img = '<img src="' . env('APP_URL') . $data->url . '" alt="icon" width="100" height="100">';

                return $img;
            })
            ->rawColumns(['name','url','total_users','action'])
            ->make(true);
    }


    public function query()
    {
        $categories = Theme::join('media', 'media.owner_id', '=', 'themes.id')
            ->join('user_themes', 'user_themes.theme_id', '=', 'themes.id')
            ->select('themes.id','themes.name')
            ->selectRaw('count(user_themes.user_id) as total_users')
            ->where('themes.name', '!=', 'Random')
            ->groupBy('themes.id')
            ->get();

        return $this->applyScopes($categories);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'id', "visible" => false])
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => __('Category Name')])
            ->addColumn(['data' => 'url', 'name' => 'url', 'title' => __('Image')])
            ->addColumn(['data' => 'total_users', 'name' => 'total_users', 'title' => __('Total Users')])
            ->parameters([
                'pageLength' => $this->row_per_page,
                'order' => [0, 'ASC']
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
