<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

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
        Schema::defaultStringLength(191);

        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->rol === 'Administrador';
        });

        Blade::if('ifRangoAlto', function () {
            return auth()->check() && (auth()->user()->rol === 'Administrador' || auth()->user()->rol === 'Hermano Mayor' || auth()->user()->rol === 'Presidente Vocalia');
        });

    }
}
