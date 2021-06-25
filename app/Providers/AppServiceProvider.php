<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

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
        // if(!Cache::has('cate'))
        // {
        //     $cate = Category::get();
        //     $cache = Cache::put('cate', $cate, 60);
        // }
        // $cate = Cache::get('cate');

        Paginator::useBootstrap();
        
        $categories = Cache::remember('categories', 60, function() {
                return Category::all();
        });

        View::share('category',$categories);
    }
}
