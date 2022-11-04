<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesListDatatable;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(CategoriesListDatatable $dataTable)
    {
        $data['menu'] = 'app';
        $data['sub_menu'] = 'categories';
        $data['page_title'] = __('Categories');
        $data['total_blockchain'] = Category::all()->count();      
                
        $row_per_page = 10;

        $categories = Category::join('media', 'media.owner_id', '=', 'categories.id')
            ->select('categories.*', 'media.url')
            ->where('media.type', 'category')
            ->groupBy('media.id')
            ->get();
       
        
        return $dataTable->with('row_per_page', $row_per_page)->render('apps.categories.categories_list', $data);
        
    }

    public function create()
    {
        $data['menu'] = 'app';
        $data['sub_menu'] = 'categories';
        $data['page_title'] = __('Create Category');
        $data['total_blockchain'] = Category::all()->count();
        return view('apps.categories.create_category', $data);
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'group_id' => 'required',
    //         'url' => 'required',
    //     ]);

    //     $category = new Category();
    //     $category->name = $request->name;
    //     $category->group_id = $request->group_id;
    //     $category->save();

    //     $media = new Media();
    //     $media->owner_id = $category->id;
    //     $media->type = 'category';
    //     $media->url = $request->url;
    //     $media->save();

    //     return redirect()->route('categories.index')->with('success', __('Category created successfully.'));
    // }

    public function edit($id)
    {
        $data['menu'] = 'app';
        $data['sub_menu'] = 'categories';
        $data['page_title'] = __('Edit Category');
        $data['category'] = Category::find($id);
        return view('apps.categories.edit_category', $data);
    }
}
