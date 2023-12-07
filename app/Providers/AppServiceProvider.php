<?php

namespace App\Providers;

use App\Http\View\Composers\HeaderComposer;
use App\Http\View\Composers\RecentlyViewedProductsComposer;
use App\Http\View\Composers\RecommendProductsComposer;
use App\Services\CurrencyService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Connection;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Paginator::defaultSimpleView('pagination');

        \view()->share('currency', function ($amount) {

            if (session('currency') == 'uzs')
                return (new CurrencyService())->sum($amount) . ' uzs';

            return $amount . ' $';
        });

        // Для определения N + 1 запросов в рамках локальной разработки
        Model::preventLazyLoading(!app()->isProduction());

        DB::whenQueryingForLongerThan(500, function (Connection $connection) {

        });

        View::composer('front.__layouts.header', HeaderComposer::class);
        View::composer('front.includes.recently-viewed-products', RecentlyViewedProductsComposer::class);
        View::composer('front.includes.recommend-products', RecommendProductsComposer::class);
    }
}
