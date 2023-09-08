<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Pagination\Paginator;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $categories= Cache::remember('categories', 60, function () {
            $categories = Category::where('lvl', 1)
                ->with('translations')
                ->get();
//        });

        $perPage = 10;
        $currentPage = request()->query('page', 1);
        $paginatedData = new LengthAwarePaginator(
            $categories->forPage($currentPage, $perPage),
            $categories->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );

        return view('admin.categories.index', ['categories' => $paginatedData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        $parentId = $request->parent_id_hidden;

        $parent = Category::find($parentId);
        $lvl = $parent->lvl + 1;

        if (!$parent) {
            return redirect()->back()->withErrors('Родительская категория не найдена.');
        }

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
        $category->lvl = $lvl;

        $category->save();

        return redirect()->back()->with('success', 'Категория успешно добавлена');
    }

    protected function saveCategoryWithLevel($category, $parent, $request)
    {
        $category->lvl = $parent->lvl + 1;


        $category->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $cacheKey = 'category_' . $category->id;

        $cachedData = Cache::remember($cacheKey, 24 * 60 * 60, function () use ($category) {
            $category->load([
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
            return $category;
        });

        return view('admin.categories.view', compact('cachedData'));
    }


    public function search(Request $request)
    {
        $searchText = $request->query('search');

        $categories = Category::query()->where('lvl', 1)->with('translations')->whereHas('translations', function ($query) use ($searchText) {
            $query->where('title', 'like', $searchText . '%');
        })
            ->limit(10)
            ->get(); // Select only id and title fields

        return response()->json($categories);
    }

    public function editCategories(Request $request)
    {
        $categoriesId = $request->input('selected_category', []);
        if ($categoriesId){
            $categories = Category::whereIn('id', $categoriesId)->orderBy('id')->with('translations')->get();
            return view('admin.categories.update', ['categories' => $categories]);
        } else {
            return redirect()->back()->with('error', 'Выберите категории или категрию');
        }

    }

    public function categoryBulkActions(Request $request)
    {
        $selectedCategories = $request->input('selected_category', []);
        $action = $request->input('action');
        $message = '';

        if ($action === 'edit') {
           return $this->editCategories($request);
        } elseif ($action === 'delete') {
            $message = Category::deleteBulkCategories($selectedCategories);
            Cache::forget('catalogs');
        }

        return redirect()->back()->with('success', $message);
    }

    public function updateSelected(UpdateCategoryRequest $request)
    {
        $locale = $request->getlocale;
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

//        $selectedCategories = $request->input('selected_category', []);
////        $fields = ['title', 'description', 'seo_title', 'seo_description', 'meta_keywords'];
//
//        $categoriesToUpdate = $selectedCategories ? Category::whereIn('id', $selectedCategories)->get() : Category::all();
//
//        foreach ($categoriesToUpdate as $category) {
//            Category::updateCatalogFields($request, $category, $fields, $category->id);
//
//            //Обновляем кэш для каждого каталога
////            Cache::forget("category_{$category->id}");
//        }
//        return redirect()->route('admin.catalog.index')->with('success', 'Данные успешно обновлены.');
    }

}
