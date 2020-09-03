<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


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
        // Tamaño String a 191
        Schema::defaultStringLength(191);
        // Php Format Language Date
        setlocale(LC_TIME, 'es_ES');
        // Carbon Configuration
        Carbon::setLocale(config('app.locale'));
    }
}
