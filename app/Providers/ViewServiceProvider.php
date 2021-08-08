<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = Setting::with('breaking_title_category')->get()->keyBy('lang');
        View::share('setting', $setting);
        View::composer('app.layouts.app', function ($view) {
            $view->with('categories', Category::active()->with('children')->where('category_id', null)->get());
        });
    }
}
