<?php

namespace App\Http\Controllers;

use App\DataTables\ThemesListDataTable;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index(ThemesListDataTable $dataTable)
    {
        $data['menu'] = 'themes';
        $data['sub_menu'] = 'themeslist';
        $data['page_title'] = __('Themes');

        $row_per_page = 10;

        return $dataTable->with('row_per_page', $row_per_page)->render('apps.themes.theme_list', $data);
    }
   
}
