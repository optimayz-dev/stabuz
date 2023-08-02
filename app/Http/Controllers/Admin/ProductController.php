<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Imports\ProductImport;
use App\Models\Admin\Product;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Cache::remember('subcategories', 24 * 60 * 60, function () {
            return Subcategory::with('translations', 'products.translations')->get();
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

        return view('admin.products.index', ['subcategories' => $paginatedData]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function import()
    {
        Excel::import(new ProductImport(), request()->file('file'));
        return back();
    }

    public function export($subcategoryId)
    {
        return Excel::download(new ProductExport($subcategoryId), 'product.xlsx');
    }

    public function viewTable()
    {
        $products = Product::with('translations')->orderBy('updated_at')->get();

        return view('admin.products.export-import', ['products' => $products]);
    }

    public function search(Request $request)
    {
        $keyword = $request->searchVar;

        $products = Product::whereHas('translations', function ($query) use ($keyword) {
            $query->where('title', 'like', $keyword . '%');
        })->get();

        return response()->json(['products' => $products]);
    }

    public function editBySubcategory(Subcategory $id)
    {
        $subcategory = Subcategory::with('translations','products.translations')->find($id->id);

        return view('admin.products.update', compact('subcategory'));
    }

    public function updateBySubcategory(Request $request)
    {
        $product_id = $request->input('product_id', []);
        foreach ($product_id as $id)
        {
            $product = Product::findOrFail($id);
            $product->title = $request->input('title_'.$id);
            $product->descr = $request->input('descr_'.$id);
            if ($request->hasFile('file_url_'.$id)) {
                $path = $request->file('file_url_'.$id)->store('uploads', 'public');
                $product->file_url = '/storage/'.$path;
            }
            $product->update();
        }
        return redirect()->back()->with('success', 'Продукты успешно обновлены');
    }
}
