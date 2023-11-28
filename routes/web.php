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
use App\Http\Controllers\Front\OrderController;

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

    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.add-product');
    Route::get('cart/product-minus/{id}', [CartController::class, 'minusProduct'])->name('cart.product-minus');
    Route::get('cart/product-plus/{id}', [CartController::class, 'plusProduct'])->name('cart.product-plus');
    Route::get('cart/product-delete/{id}', [CartController::class, 'deleteProduct'])->name('cart.product-delete');

    //Order

    Route::post('checkout-order', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::get('checkout-order/entity', [OrderController::class, 'checkoutEntity'])->name('order.checkout-entity');
    Route::post('checkout-order/create', [OrderController::class, 'createOrder'])->name('order.create');
});


//Route::get('login', [AuthController::class, 'showLogin'])->name('login');

