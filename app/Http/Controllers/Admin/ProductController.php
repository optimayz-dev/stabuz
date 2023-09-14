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
        $products = Product::query()->with('translations')->get();

        return view('admin.products.index', ['products' => $products]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::with('translations')->get();
        $currencies = CurrencyCode::query()->get();
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
//        $product = new Product($request->validated());
        $product = new Product();
        if ($request->hasFile('file_url')) {
            $path = $request->file('file_url')->store('images');
        }

//        $product = Product::query()->create([
//            'title' => $request->input('title'),
//            'seo_title' => $request->input('seo_title'),
//            'description' => $request->input('description'),
//            'seo_description' => $request->input('seo_description'),
//            'meta_keywords' => $request->input('meta_keywords'),
//            'attribute_title' => $request->input('attribute_title'),
//            'attribute_value' => $request->input('attribute_value'),
//            'file_url' => $path,
//            'brand_id' => $request->input('brand_id',1)
//        ]);


        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->attribute_title = $request->input('attribute_title');
        $product->attribute_value = $request->input('attribute_value');
        $product->seo_title = $request->input('seo_title');
        $product->seo_description = $request->input('seo_description');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->file_url = $path ?? null;
        $product->brand_id = $request->input('brand_id',1);

        $product->save();
//        $product->brand_id = 1;


//        'title' => 'required',
//            'seo_title' => 'nullable',
//            'description' => 'required',
//            'seo_description' => 'nullable',
//            'meta_keywords' => 'nullable',
//            'attribute_title' => 'nullable',
//            'attribute_value' => 'nullable',
//            'file_url' => 'required'



        // Сохраняем продукт
//        $product->save();
//        $images = $request->input('images', []);
//        foreach ($images as $image){
//            $product_gallery = new ProductGallery();
//            $path = $request->file($image)->store('images');;
//            $product_gallery->image = $path;
//            $product_gallery->save();
//        }

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
//        foreach ($tagsId as $tagId){
//            $product->tags()->attach($tagId);
//        }

        return redirect()->back()->with('success', 'Продукт успешно добавлен');
    }



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        $product = Product::query()->with('categories')->findOrFail($product->id);
        $tags = Tag::with('translations')->get();
        $currencies = CurrencyCode::query()->get();

        return view('admin.products.update-once', [
            'product' => $product,
            'tags' => $tags,
            'currencies' => $currencies
        ]);
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
    public function update(Request $request, Product $product)
    {
        if ($request->file('file_url'))
            $file_url = $request->file('file_url')->store('images');

        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->attribute_title = $request->input('attribute_title');
        $product->attribute_value = $request->input('attribute_value');
        $product->seo_title = $request->input('seo_title');
        $product->seo_description = $request->input('seo_description');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->file_url = $file_url ?? $product->file_url;

        $product->update();


        return redirect()->back()->with('success','Продукт успешно изменен.');
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
        $errors = [];
        Excel::import(new ProductImport($errors), request()->file('file'));

        if (!empty($errors)) {
            return back()->with('errors', $errors);
        }

        return back()->with('success', 'Продукты успешно импортированы');
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

    public function handleBulkActions(Request $request)
    {
        $selectedCategories = $request->input('selected_category', []);
        $action = $request->input('action');
        $message = '';

        if ($action === 'edit') {
            return $this->showSelected($request);
        } elseif ($action === 'delete') {
            $this->deleteSelected($request);
        }

        return redirect()->back()->with('success', $message);
    }

    public function updateSelected(Request $request)
    {
        $locale = $request->getlocale;
        app()->setLocale($locale);

        foreach ($request->input('id') as $id){
            $category = Product::query()->with('translations')->where('id' , $id)->first();

            $category->update([
                'title' => $request->input('title_'.$id),
                'description' => $request->input('description_'.$id),
                'seo_title' => $request->input('seo_title_'.$id),
                'seo_description' => $request->input('seo_description_'.$id),
                'meta_keywords' => $request->input('meta_keywords_'.$id)
            ]);
        }

        return redirect()->route('admin.product.index')->with('success', 'Данные успешно обновлены.');
    }

    public function deleteSelected(Request $request)
    {
        foreach ($request->input('id') as $id){
            Product::query()->where('id', $id)->delete();

        }
        return redirect()->back()->with(['success', 'Данные успешно удалены.']);
    }

    public function showSelected(Request $request)
    {
        $products = $request->input('id', []);

        if ($products){
            $products = Product::whereIn('id', $products)->orderBy('id')->with('translations')->get();
            return view('admin.products.update', ['products' => $products]);
        } else {
            return redirect()->back()->with('error', 'Выберите продукты или продукт');
        }
    }


    public function viewImport()
    {

    }
}
