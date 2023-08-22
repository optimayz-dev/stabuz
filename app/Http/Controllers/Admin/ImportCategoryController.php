<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CategoryExport;
use App\Http\Controllers\Controller;
use App\Imports\CategoryImport;
use App\Models\Admin\Category;
use Maatwebsite\Excel\Facades\Excel;

class ImportCategoryController extends Controller
{
    public function viewImport()
    {
        return view('admin.categories.import');
    }

    public function export()
    {
        return Excel::download(new CategoryExport(), 'categories.xlsx');
    }
    public function import()
    {
        Excel::import(new CategoryImport, request()->file('file'));
        return redirect()->back()->with('success', 'categories was successfully imported');
    }
}
