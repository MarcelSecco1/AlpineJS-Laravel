<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator as FacadePaginator; 
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

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
        FacadePaginator::useBootstrapFive();
    }
}
