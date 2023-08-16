<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubcategoryExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Imports\SubcategoryImport;
use App\Models\Admin\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Cache::remember('subcategories', 24 * 60 * 60, function () {
            return Category::where('lvl', 2)
                ->with('translations')
                ->get();
        });

        $perPage = 10;
        $currentPage = request()->query('page', 1);
        $paginatedData = new LengthAwarePaginator(
            $subcategories->forPage($currentPage, $perPage),
            $subcategories->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );

        return view('admin.subcategories.index', ['subcategories' => $paginatedData]);
    }

    public function export()
    {
        return Excel::download(new SubcategoryExport, 'subcategory.csv');
    }
    public function import()
    {
        Excel::import(new SubcategoryImport, request()->file('file'));
        return back();
    }
}
