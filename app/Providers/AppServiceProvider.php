<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;

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
        $categories = Category::whereNull('parent_id')->get();
        $shareData = array(
            'categories' => $categories
        );
        view()->share('shareData',$shareData);
        
        Paginator::useBootstrap();
    }
}
