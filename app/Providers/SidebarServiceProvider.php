<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SidebarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.frontend.sidebar', function($view){
            $view->with('popularPosts', \App\Models\Post::latest()->take(3)->get());
            $view->with('categories', \App\Models\Category::latest()->take(5)->get());
        });
    }
}
