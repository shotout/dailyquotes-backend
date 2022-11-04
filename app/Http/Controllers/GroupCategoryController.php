<?php

namespace App\Http\Controllers;

use App\DataTables\GroupCategoryListDatatable;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupCategoryController extends Controller
{
    public function index(GroupCategoryListDatatable $dataTable){
        $data['menu'] = 'app';
        $data['sub_menu'] = 'groupcategory';
        $data['page_title'] = __('groupcategory'); 
                
        $row_per_page = 10;
        
        return $dataTable->with('row_per_page', $row_per_page)->render('apps.group.group_list', $data);
    }

    public function create(){
        $data['menu'] = 'app';
        $data['sub_menu'] = 'groupcategory';
        $data['page_title'] = __('Create Group Category');
        return view('apps.group.group_add', $data);
    }

    public function store(Request $request){
        Validator::make($request->all(), [
            'group_name' => 'required|max:30'
        ]);

        $group = new Group();
        $group->name = $request->group_name;
        $group->save();

        return redirect()->route('gp.list')->with('success', __('Group Category Created Successfully'));
    }

    public function edit($id)
    {
        $data['menu'] = 'app';
        $data['sub_menu'] = 'groupcategory';
        $data['page_title'] = __('Edit Group Category');
        $data['groupData'] = Group::find($id);        
        $data['status_tab'] = 'active';

        return view('apps.group.group_edit', $data);
    }

    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'group_name' => 'required|max:30',
            'group_id' => 'required|max:30',
        ])->validate();

        $group = Group::find($request->group_id);
        $group->name = $request->group_name;
        $group->save();

        return redirect()->route('gp.list')->with('success', __('Group Category Updated Successfully'));
    }

    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();

        return redirect()->route('gp.list')->with('success', __('Group Category Deleted Successfully'));
    }
}
