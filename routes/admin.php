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
            Route::patch('/admin/catalogs/update-selected', [CatalogController::class, 'updateSelected'])->name('updateSelected');
            Route::delete('/admin/catalogs/delete-selected', [CatalogController::class, 'destroySelected'])->name('destroySelected');
            Route::get('/admin/categories/edit-selected', [CategoryController::class, 'editCategories'])->name('editCategories');
            Route::patch('/admin/categories/update-selected', [CategoryController::class, 'updateCategories'])->name('updateCategories');
            Route::get('/admin/subcategories-export', [SubcategoryController::class, 'export'])->name('subcategories.export');
            Route::post('/admin/subcategories-import', [SubcategoryController::class, 'import'])->name('subcategories.import');
    });



