<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Registra o DuskServiceProvider apenas no ambiente local

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
