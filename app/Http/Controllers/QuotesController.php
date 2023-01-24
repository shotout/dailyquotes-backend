<?php

namespace App\Http\Controllers;

use App\DataTables\QuotesListDatatable;
use App\Imports\QuotesImport;
use App\Models\Category;
use App\Models\Quote;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class QuotesController extends Controller
{
    public function index(QuotesListDatatable $dataTable)
    {
        $data['menu'] = 'app';
        $data['sub_menu'] = 'quotes';
        $data['page_title'] = __('Quotes');

        $row_per_page = 10;

        return $dataTable->with('row_per_page', $row_per_page)->render('apps.quotes.quotes_list', $data);
    }

    public function create()
    {
        $data['menu'] = 'app';
        $data['sub_menu'] = 'quotes';
        $data['page_title'] = __('Add Quotes');
        $data['categories'] = Category::orderby('name', 'asc')->get();
        return view('apps.quotes.quotes_add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'quote' => 'required',
        ]);

        $quote = new Quote();
        $quote->category_id = $request->category_name;
        $quote->title = $request->quote;
        $quote->save();

        return redirect()->route('qt.list')->with('success', __('Quotes added successfully'));
    }

    public function edit($id)
    {
        $data['menu'] = 'app';
        $data['sub_menu'] = 'quotes';
        $data['page_title'] = __('Edit Quotes');
        $data['quotes'] = Quote::find($id);
        $data['group_names'] = Category::orderby('name', 'asc')->get();

        return view('apps.quotes.quotes_edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'group_name' => 'required',
            'quote' => 'required',
        ]);

        $quote = Quote::find($request->id);
        $quote->category_id = $request->group_name;
        $quote->title = $request->quote;
        $quote->save();

        return redirect()->route('qt.list')->with('success', 'Quote updated successfully');
    }

    public function destroy($id)
    {
        Quote::find($id)->delete();
        return redirect()->route('qt.list')->with('success', 'Quote deleted successfully');
    }

    public function import()
    {
        $data['menu'] = 'app';
        $data['sub_menu'] = 'quotes';
        $data['page_title'] = __('Quotes Import');
        $data['categories'] = Category::orderby('name', 'asc')->get();

        return view('apps.quotes.quotes_import', $data);
    }


    public function importcsv(Request $request)
    {
        $category = $request->group_name;

        Quote::where('category_id', $category)->delete();

        Excel::import(new QuotesImport($category), $request->file('csv_file'));

        $quote = Quote::get();
        foreach ($quote as $key => $value) {
            $value->order = rand(1, 10000);
            $value->save();
        }

        return redirect()->route('qt.list')->with('success', 'Quotes imported successfully');  
        
    }
}
