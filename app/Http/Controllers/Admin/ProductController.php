<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Imports\ProductImport;
use App\Models\Admin\Attribute;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\CurrencyCode;
use App\Models\Admin\Price;
use App\Models\Admin\Product;
use App\Models\Admin\ProductGallery;
use App\Models\Admin\Subcategory;
use App\Models\Admin\Tag;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $subcategories = Cache::remember('subcategories', 24 * 60 * 60, function () {
//            return Subcategory::with('translations', 'products.translations')->get();
//        });
//
//        $perPage = 10;
//        $currentPage = request()->query('page', 1);
//        $paginatedData = new LengthAwarePaginator(
//            $subcategories->forPage($currentPage, $perPage),
//            $subcategories->count(),
//            $perPage,
//            $currentPage,
//            ['path' => Paginator::resolveCurrentPath()]
//        );


        return view('admin.products.index');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::with('translations')->get();
        $currencies = CurrencyCode::all();
        return view('admin.products.create', [
            'tags' => $tags,
            'currencies' => $currencies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // Создаем новый продукт на основе валидированных данных
        $product = new Product($request->validated());
        if ($request->hasFile('file_url')) {
            $path = $request->file_url->store('uploads', 'public');
            $product->file_url = '/storage/' . $path;
        }
        $product->brand_id = 1;

        // Сохраняем продукт
        $product->save();
        $images = $request->input('images', []);
        foreach ($images as $image){
            $product_gallery = new ProductGallery();
            $path = $image->store('/uploads/products', 'public');
            $product_gallery->image = '/storage/' .$path;
            $product_gallery->save();
        }

        // Получаем ID выбранной категории из формы
        $categoryId = $request->input('parent_id_hidden');
        // Получаем ID выбранных тегов из формы
        $tagsId = $request->input('tag_id', []);
        $price = new Price();
        $price->value = $request->input('price');
        $price->product_id = $product->id;
        $price->currency_code_id = $request->input('currency_code');
        $price->save();

        // Связываем продукт с выбранной категорией через pivot таблицу
        $product->categories()->attach($categoryId);
        // Связываем продукт с выбранными тегами через pivot таблицу
        foreach ($tagsId as $tagId){
            $product->tags()->attach($tagId);
        }

        return redirect()->back()->with('success', 'Продукт успешно добавлен');
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

    public function export($categoryId)
    {
        return Excel::download(new ProductExport($categoryId), 'product.xlsx');
    }

    public function viewTable()
    {
        $products = Product::with('translations')->orderBy('updated_at', 'desc')->limit(30)->get();

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

    public function editBySubcategory(Category $id)
    {
        $subcategory = Category::with('translations','products.translations')->find($id->id);

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
                File::delete($product->image);
                $path = $request->file('file_url_'.$id)->store('uploads', 'public');
                $product->file_url = '/storage/'.$path;
            }
            $product->update();
        }
        return redirect()->back()->with('success', 'Продукты успешно обновлены');
    }

    public function deleteBySubcategory(Request $request)
    {
        $subcategory_id = $request->input('subcategory_id', []);
        foreach ($subcategory_id as $id)
        {
            $subcategory = Category::findOrFail($id);
            $subcategory->destroy();
        }
        return redirect()->back()->with('success', 'Subcategory products deleted successfully');
    }
}
