<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// estoy agragando esto por si acaso
//////////////////////////////////////
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
//////////////////////////////////////


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //agregando esta línea por si acaso
        Schema::defaultStringLength(191);

    }
}
