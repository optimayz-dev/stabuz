<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use Illuminate\Support\Facades\Route;

    Route::middleware('guest:admin')->group(function (){
        Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/admin/login', [AuthController::class, 'login'])->name('login_process');
    });

    Route::middleware(['auth:admin','localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])->group(function (){
            Route::get('/admin/', [DashboardController::class, 'show'])->name('dashboard');
            Route::post('logout', [AuthController::class, 'logout'])->name('logout');
            Route::resource('/admin/create', AdminController::class);
            Route::resource('/admin/brand', BrandController::class);
            Route::resource('/admin/catalog', CatalogController::class);
            Route::resource('/admin/category', CategoryController::class);
            Route::resource('/admin/product', ProductController::class);
            Route::resource('/admin/subcategory', SubcategoryController::class);
            Route::get('/admin/catalogs/edit-selected', [CatalogController::class, 'editSelected'])->name('editSelected');
//            Route::patch('/admin/catalogs/update-selected', [CatalogController::class, 'updateSelected'])->name('updateSelected');
            Route::delete('/admin/catalogs/delete-selected', [CatalogController::class, 'destroySelected'])->name('destroySelected');
            Route::get('/search/categories', [CategoryController::class, 'search'])->name('search.categories');
            Route::patch('/admin/categories/edit-selected', [CategoryController::class, 'editCategories'])->name('editCategories');
            Route::patch('/admin/categories/update-selected', [CategoryController::class, 'updateSelected'])->name('updateCategories');
            Route::get('/admin/subcategories-export', [SubcategoryController::class, 'export'])->name('subcategories.export');
            Route::post('/admin/subcategories-import', [SubcategoryController::class, 'import'])->name('subcategories.import');
            Route::post('/admin/brands-import', [BrandController::class, 'import'])->name('brand.import');
            Route::post('/admin/category-import', [CategoryController::class, 'import'])->name('categories.import');
            Route::get('/admin/category-export', [CategoryController::class, 'addByFile'])->name('categories.addByFile');
            Route::get('/admin/category-get-export', [CategoryController::class, 'export'])->name('categories.export');
            Route::get('/admin/product-export', [ProductController::class, 'viewTable'])->name('products.view');
            Route::get('/admin/products-get-export/{id}', [ProductController::class, 'export'])->name('products.export');
            Route::post('/admin/products-import', [ProductController::class, 'import'])->name('products.import');
            Route::post('/admin/product/result', [ProductController::class, 'search'])->name('product.search');
            Route::get('/admin/edit-subcategory-products/{id}', [ProductController::class, 'editBySubcategory'])->name('edit.subcategory-products');
            Route::patch('/admin/update-subcategory-products', [ProductController::class, 'updateBySubcategory'])->name('update.subcategory-products');
            Route::get('/admin/get-product-parents', [ProductController::class, 'getProductParents'])->name('get.product.parents');
            Route::delete('/admin/delete-subcategory-products', [ProductController::class, 'deleteBySubcategory'])->name('delete.subcategory-products');
//            Route::patch('/admin/catalog-bulk-action', [CatalogController::class, 'catalogBulkActions'])->name('catalog.handleBulkActions');
            Route::patch('/admin/category-bulk-action', [CategoryController::class, 'categoryBulkActions'])->name('category.handleBulkActions');
    });
