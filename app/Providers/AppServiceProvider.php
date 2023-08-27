<?php

namespace App\Providers;

use App\Http\View\Composers\HeaderComposer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Connection;

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
        // Для определения N + 1 запросов в рамках локальной разработки
        Model::preventLazyLoading(!app()->isProduction());

        DB::whenQueryingForLongerThan(500, function (Connection $connection){

        });

        View::composer('front.__layouts.header',HeaderComposer::class);
    }
}
