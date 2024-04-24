<?php

namespace App\Providers;

// use view;
// use view;

use App\Models\About;
use Illuminate\Pagination\Paginator;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     */
    public function boot(): void
    {

        Paginator::useBootstrap();


        $websiteSetting = Setting::first();
        View::share('appSetting', $websiteSetting);

        $about = About::first();
        View::share('about', $about);

        $colorSetting = Setting::first();
        View::share('setting', $colorSetting);
    }
}
