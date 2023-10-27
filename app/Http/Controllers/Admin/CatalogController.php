<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CatalogStoreOnceRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreCatalogRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCatalogRequest;
use App\Models\Admin\Catalog;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $catalogs = Cache::remember('catalogs', 60, function () {
            $catalogs = Category::with('translations')
                ->whereNull('lvl')
                ->latest()->get();
//        });
        return view('admin.catalogs.index', compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.catalogs.create-once');
    }

    public function edit(Category $catalog)
    {
        return view('admin.catalogs.update-once',['catalog' => $catalog]);
    }

    public function update(Category $catalog, UpdateCatalogRequest $request)
    {
        if ($request->hasfile('category_img')) {
            $image = $request->file('category_img')->store('images');
        }

        $catalog->title = $request->input('title');
        $catalog->seo_title = $request->input('seo_title');
        $catalog->description = $request->input('description');
        $catalog->seo_description = $request->input('seo_description');
        $catalog->meta_keywords = $request->input('meta_keywords');
        $catalog->parent_id = $request->input('parent_id_hidden');
        $catalog->category_img = $image ?? $catalog->category_img;
//        $catalog->lvl = $lvl;

        $catalog->update();

        return redirect()->route('admin.catalog.index')->with('success', 'Успешно обновлен');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CatalogStoreOnceRequest $request)
    {
//        foreach ($request->addmore as $key => $value)
//        {
//            $catalog = new Category();
//            $catalog->title = $value['title'];
//            $catalog->description = $value['description'];
//            $catalog->seo_title = $value['seo_title'];
//            $catalog->seo_description = $value['seo_description'];
//            $catalog->meta_keywords = $value['meta_keywords'];
//            $catalog->save();
//        }

        if ($request->hasfile('category_img')) {
            $image = $request->file('category_img')->store('images');
        }

        $category =  new Category();
        $category->title = $request->input('title');
        $category->seo_title = $request->input('seo_title');
        $category->description = $request->input('description');
        $category->seo_description = $request->input('seo_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->parent_id = $request->input('parent_id_hidden');
        $category->category_img = $image ?? null;

        $category->save();

        return redirect()->route('admin.catalog.index')->with('success', 'Данные успешно добавлены.');
    }

    public function search(Request $request)
    {

        $searchText = $request->input('search');

        $categories = Category::query()->with('translations')->whereHas('translations', function ($query) use ($searchText) {
            $query->where('title', 'like', $searchText .'%');
        })
            ->limit(10)
            ->latest(); // Select only id and title fields

        return response()->json($categories);
    }

    public function show(Category $catalog)
    {
//        $cacheKey = 'category_' . $category->id;

//        $cachedData = Cache::remember($cacheKey, 24 * 60 * 60, function () use ($category) {
        $catalog->load([
            'translations',
            'children.translations',
            'products' => function ($query) {
                $query->with([
                    'translations',
                    'prices.currency',
                    'tags.translations',
                ]);
            },
        ]);
//            return $category;
//        });

        return view('admin.catalogs.view', ['catalog' => $catalog]);
    }

    public function editCatalogs(Request $request)
    {

        $categoriesId = $request->input('selected_category', []);

        if ($categoriesId){
            $categories = Category::whereIn('id', $categoriesId)->orderBy('id')->with('translations')->get();
            return view('admin.catalogs.update', ['catalogs' => $categories]);
        } else {
            return redirect()->back()->with('error', 'Выберите категории или категрию');
        }

    }

    public function catalogBulkActions(Request $request)
    {
        $selectedCategories = $request->input('selected_category', []);
        $action = $request->input('action');
        $message = '';

        if ($action === 'edit') {
            return $this->editCatalogs($request);
        } elseif ($action === 'delete') {
            $message = Category::deleteBulkCategories($selectedCategories);
            Cache::forget('catalogs');
        }

        return redirect()->back()->with('success', $message);
    }

    public function updateSelected(UpdateCatalogRequest $request)
    {
        $locale = $request->getlocale;

//        dd($request->all());

        app()->setLocale($locale);

        foreach ($request->input('id') as $id){
            $category = Category::query()->with('translations')->where('id' , $id)->first();

            $category->update([
                'title' => $request->input('title_'.$id),
                'description' => $request->input('description_'.$id),
                'seo_title' => $request->input('seo_title_'.$id),
                'seo_description' => $request->input('seo_description_'.$id),
                'meta_keywords' => $request->input('meta_keywords_'.$id)
            ]);
        }

        return redirect()->route('admin.catalog.index')->with('success', 'Данные успешно обновлены.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $catalog)
    {
        $catalog->delete();

        if (file_exists($catalog->category_img))
            File::delete($catalog->category_img);

        return redirect()->back();
    }
}
