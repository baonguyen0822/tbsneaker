<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Cart;
use Session;
use App\Category;
use App\Product;
use App\Brand_label;
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
        $category = Category::where('status',1)->get();
        view()->share('category',$category);
        $brand_label = Brand_label::where('status',1)->get();
        view()->share('brand_label',$brand_label);
    }
}
