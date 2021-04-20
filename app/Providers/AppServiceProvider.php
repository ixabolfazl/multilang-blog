<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        if (app()->getLocale() == 'fa') {
            $lang = 'rtl';
        } else {
            $lang = 'ltr';
        }
        view()->share('lang', $lang);
    }
}
