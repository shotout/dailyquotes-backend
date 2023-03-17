<?php

namespace App\DataTables;

use App\Models\Group;
use Yajra\DataTables\Services\DataTable;

class GroupCategoryListDatatable extends DataTable
{
    public function ajax()
    {
        $groups = $this->query();
        return datatables()
            ->of($groups)
            ->addColumn('name', function ($groups) {
                $group = '';
                $group .= '<a href="' . url('group/edit/' . $groups->id) . '">' . $groups->name . '</a><br>';
                return  $group . '<a href="' . url("group/edit/" . $groups->id) . '"  target="_blank"></a>';
            })
            ->addColumn('action', function ($groups) {
                $delete = '<form method="POST" action="'.url("group/delete/".$groups->id).'"accept-charset="UTF-8" class="display_inline" id="delete-item-'. $groups->id .'">
                ' . csrf_field() . '
                    <input type="hidden" name="id" value="'.$groups->id.'">
                    <button title="' . __('Delete') . '" class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-id="'. $groups->id .'" data-target="#confirmDelete" data-label = "Delete" data-title="' . __('Delete item') . '" data-message="' . __('Are you sure to delete this item?') . '">
                        <i class="feather icon-trash-2"></i> 
                    </button>
                </form>';
                return $delete;
            })
            ->rawColumns(['no', 'name', 'action'])
            ->make(true);
    }


    public function query()
    {
        $categories = Group::where('flag', 1)->get();
        return $this->applyScopes($categories);
    }

    public function html()
    {
        $no = 1;
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'id', "visible" => false])
            ->addColumn(['data' => 'id', 'name' => 'name', 'title' => __('No'), 'visible' => true])
            ->addColumn(['data' => 'name', 'name' => 'Group Name', 'title' => __('Name')])
            ->addColumn(['data' => 'action', 'name' => 'Action', 'title' => __('Action')])
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

    protected function filename()
    {
        return 'admins_' . time();
    }
}
