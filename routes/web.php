<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Front\CabinetController;
use App\Http\Controllers\Front\BrandController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\PromotionController;
use App\Http\Controllers\Front\VideoReviewController;
use App\Http\Controllers\Front\CartController;

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
    'middleware' => [
        'localeSessionRedirect', 'localizationRedirect', 'localeViewPath',
//        'auth:web'
        ],
], function (){

    Route::get('/', [HomeController::class, 'homepage']);
    Route::get('/locale/{locale}', [HomeController::class, 'changeLocale'])->name('locale');

    Route::get('/product/{slug}', [ProductController::class, 'detailProduct'])->name('product.detail');
    Route::get('/product/', [ProductController::class, 'search'])->name('product.search');
    Route::get('/categories', [CategoryController::class, 'categoriesView'])->name('categories.view');

    Route::get('/category/{slug}', [CategoryController::class, 'categoryView'])->name('category.view');
    Route::get('/new-products', [ProductController::class, 'newProducts'])->name('new.products');

    Route::group(['middleware' => 'auth:web'], function (){
        Route::get('cabinet', [CabinetController::class, 'index'])->name('cabinet.index');
    });


    //Brands

    Route::get('brands', [BrandController::class, 'index'])->name('brands');
    Route::get('brand/{slug}', [BrandController::class, 'detail'])->name('brand.detail');

    // News

    Route::get('news/',[NewsController::class, 'newsList'])->name('news.list');
    Route::get('news/{slug}',[NewsController::class, 'detail'])->name('news.detail');

    //Promotions

    Route::get('promotions', [PromotionController::class, 'promotionList'])->name('promotions');
    Route::get('promotion/{slug}', [PromotionController::class, 'detail'])->name('promotion.detail');

    //Video Review

    Route::get('video-reviews', [VideoReviewController::class, 'index'])->name('video-reviews');

    // User login

    Route::get('register', [AuthController::class, 'registerPage'])->name('register.page');
    Route::post('register', [AuthController::class, 'register'])->name('register.user');

    Route::get('login', [AuthController::class, 'loginPage'])->name('login.page');
    Route::post('login', [AuthController::class, 'login'])->name('login.user');

    //Basket

    Route::get('basket', [CartController::class, 'index'])->name('basket');
});


//Route::get('login', [AuthController::class, 'showLogin'])->name('login');

