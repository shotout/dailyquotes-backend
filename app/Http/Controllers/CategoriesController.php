<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesListDatatable;
use App\Models\Category;
use App\Models\Group;
use App\Models\Media;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoriesController extends Controller
{
    public function index(CategoriesListDatatable $dataTable)
    {
        $data['menu'] = 'app';
        $data['sub_menu'] = 'categories';
        $data['page_title'] = __('Categories');

        $row_per_page = 10;

        return $dataTable->with('row_per_page', $row_per_page)->render('apps.categories.categories_list', $data);
    }

    public function create()
    {
        $data['menu'] = 'app';
        $data['sub_menu'] = 'categories';
        $data['page_title'] = __('Create Category');
        $data['groups'] = Group::get();
        return view('apps.categories.category_add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_group' => 'required',
            'is_free' => 'required',
            'image' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->category_name;
        $category->group_id = $request->category_group;
        $category->is_free = $request->is_free;
        $category->save();

        $filename = str_replace(' ', '', $category->name);
        $image = $request->file('image');

        $name = time() . '_' . $filename . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/icons/category/');
        $image->move($destinationPath, $name);
        $url = '/assets/icons/category/' . $name;

        $media = new Media();
        $media->owner_id = $category->id;
        $media->type = 'category';
        $media->url = $url;
        $media->save();

        return redirect()->route('bc.list')->with('success', __('Category created successfully.'));
    }

    public function edit($id)
    {
        $data['menu'] = 'app';
        $data['sub_menu'] = 'categories';
        $data['page_title'] = __('Edit Category');
        $data['category'] = Category::find($id);
        $data['group_names'] = Group::get();
        return view('apps.categories.category_edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
            'group_name' => 'required',
            'is_free' => 'required',
        ]);

        $category = Category::find($id);
        $category->name = $request->category_name;
        $category->group_id = $request->group_name;
        $category->is_free = $request->is_free;
        $category->save();

        if ($request->image) {
            validator($request->all(), [
                'image' => 'required|image|mimes:svg|max:2048',
            ])->validate();

            $filename = str_replace(' ', '', $category->name);
            $image = $request->file('image');

            $name = time() . '_' . $filename . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/icons/category/');
            $image->move($destinationPath, $name);
            $url = '/assets/icons/category/' . $name;

            $media = Media::where('owner_id', $category->id)->where('type', 'category')->first();
            if ($media->url) {
                unlink(public_path($media->url));
            }
            $media->url = $url;
            $media->save();
        }
        // 

        return redirect()->route('bc.list')->with('success', __('Category updated successfully.'));
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        $media = Media::where('owner_id', $category->id)->where('type', 'category')->first();
        if ($media->url) {
            unlink(public_path($media->url));
        }
        $media->delete();

        return redirect()->route('bc.list')->with('success', __('Category deleted successfully.'));
    }
}
