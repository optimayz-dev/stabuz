<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImportCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\PickUpPointController;
use App\Http\Controllers\Admin\VideoReviewController;
use App\Http\Controllers\Admin\MainBannerController;
use App\Http\Controllers\Admin\PromotionBannerController;
use App\Http\Controllers\Admin\FaqController;
use Illuminate\Support\Facades\Route;



    Route::middleware('guest:admin')->group(function (){
        Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/admin/login', [AuthController::class, 'login'])->name('login_process');
    });

    Route::middleware(['auth:admin','localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])->group(function (){
            Route::get('/admin/', [DashboardController::class, 'show'])->name('dashboard');
            Route::post('logout', [AuthController::class, 'logout'])->name('logout');
            Route::patch('/admin/product/update-products', [ProductController::class, 'updateSelected'])->name('updateProducts');
            Route::patch('/admin/product/delete-products', [ProductController::class, 'deleteSelected'])->name('deleteProducts');

            Route::resource('/admin/create', AdminController::class);
            Route::resource('/admin/brand', BrandController::class);
            Route::resource('/admin/catalog', CatalogController::class);
            Route::resource('/admin/category', CategoryController::class);
            Route::resource('/admin/product', ProductController::class);
            Route::resource('/admin/subcategory', SubcategoryController::class);
            Route::resource('/admin/tag', TagController::class);
            Route::resource('/admin/attribute', AttributeController::class);
            Route::resource('/admin/news', NewsController::class);
            Route::resource('/admin/promotion', PromotionController::class);
            Route::resource('/admin/video-review', VideoReviewController::class);
            Route::resource('/admin/pick-up-point', PickUpPointController::class);
            Route::resource('/admin/faq', FaqController::class);
            Route::resource('/admin/main-banner', MainBannerController::class);
            Route::resource('/admin/promotion-banner', PromotionBannerController::class);
            Route::patch('/admin/attribute-bulk-actions', [AttributeController::class, 'bulkActions'])->name('attribute.bulkActions');
            Route::patch('/admin/attributes/bulk-update', [AttributeController::class, 'bulkUpdate'])->name('attribute.bulkUpdate');
            Route::get('/admin/catalogs/edit-selected', [CatalogController::class, 'editSelected'])->name('editSelected');
//            Route::patch('/admin/catalogs/update-selected', [CatalogController::class, 'updateSelected'])->name('updateSelected');
            Route::delete('/admin/catalogs/delete-selected', [CatalogController::class, 'destroySelected'])->name('destroySelected');

            Route::get('/search/catalog', [CatalogController::class, 'search'])->name('search.catalogs');
            Route::get('/search/category', [CategoryController::class, 'search'])->name('search.categories');
            Route::get('/search/attribute', [AttributeController::class, 'getAttributes'])->name('search.attribute');

            Route::patch('/admin/categories/edit-selected', [CategoryController::class, 'editCategories'])->name('editCategories');
            Route::patch('/admin/categories/update-selected', [CategoryController::class, 'updateSelected'])->name('updateCategories');


            Route::post('/admin/brands-import', [BrandController::class, 'import'])->name('brand.import');
            Route::post('/admin/category-import', [CategoryController::class, 'import'])->name('categories.import');

            Route::get('/admin/category-get-export', [CategoryController::class, 'export'])->name('categories.export');

            Route::get('/admin/product-export', [ProductController::class, 'viewTable'])->name('products.view');
            Route::get('/admin/products-get-export/{id}', [ProductController::class, 'export'])->name('products.export');
            Route::post('/admin/products-import', [ProductController::class, 'import'])->name('products.import');
            Route::post('/admin/product/result', [ProductController::class, 'search'])->name('product.search');
            Route::patch('/admin/product-bulk-action', [ProductController::class, 'handleBulkActions'])->name('product.handleBulkActions');

            Route::get('/admin/edit-subcategory-products/{id}', [ProductController::class, 'editBySubcategory'])->name('edit.subcategory-products');
            Route::patch('/admin/update-subcategory-products', [ProductController::class, 'updateBySubcategory'])->name('update.subcategory-products');
            Route::get('/admin/get-product-parents', [ProductController::class, 'getProductParents'])->name('get.product.parents');
            Route::delete('/admin/delete-subcategory-products', [ProductController::class, 'deleteBySubcategory'])->name('delete.subcategory-products');
//            Route::patch('/admin/catalog-bulk-action', [CatalogController::class, 'catalogBulkActions'])->name('catalog.handleBulkActions');
            Route::patch('/admin/category-bulk-action', [CategoryController::class, 'categoryBulkActions'])->name('category.handleBulkActions');

            Route::get('/admin/product-import', [ProductController::class, 'importView'])->name('product.viewImport');

            Route::get('/admin/category-import', [ImportCategoryController::class, 'viewImport'])->name('category.viewImport');
            Route::get('/admin/category-export', [ImportCategoryController::class, 'export'])->name('category.export');
            Route::post('/admin/category-import', [ImportCategoryController::class, 'import'])->name('category.import');
           // Route::get('/admin/brands/categories/{slug}', [BrandController::class, 'brandCategories'])->name('brand.categories');

    });
