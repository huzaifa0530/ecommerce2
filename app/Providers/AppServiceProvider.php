<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
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


    public function boot()
    {
        // Share only parent categories with their children
        view()->composer('*', function ($view) {
            $view->with(
                'allCategories',
                Category::whereNull('parent_id')
                    ->with('subcategories')
                    ->orderBy('name')
                    ->get()
            );
        });
    }

}
