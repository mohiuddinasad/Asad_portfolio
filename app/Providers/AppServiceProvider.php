<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Support\Facades\View;
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
        View::composer('frontends.*', function ($view) {
            $logo = Setting::get('logo');
            $cv = Setting::get('cv');
            $socialLinks = SocialLink::active()->get();
            $user = User::find(2);

            $view->with('socialLinks', $socialLinks);
            $view->with('logo', $logo);
            $view->with('cv', $cv);
            $view->with('user', $user);
        });
        View::composer('backends.*', function ($view) {
            $logo = Setting::get('logo');



            $view->with('logo', $logo);

        });
    }
}