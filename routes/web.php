<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Front\CabinetController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function (){

    Route::get('/', [HomeController::class, 'homepage']);
    Route::get('/product/{slug}', []);
    Route::get('/categories', [CategoryController::class, 'categoriesView'])->name('categories.view');
    Route::get('/category/{slug}', [CategoryController::class, 'categoryView'])->name('category.view');
    Route::get('/new-products', [ProductController::class, 'newProducts'])->name('new.products');

    Route::get('cabinet', [CabinetController::class, 'index'])->name('cabinet.index');

});

//Route::get('login', [AuthController::class, 'showLogin'])->name('login');

