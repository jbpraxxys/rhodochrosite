<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\CmsPage;

use Validator;

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
        View::share('header_footer', CmsPage::where('slug', 'header_footer')->first());
        Validator::extend(
            'captcha',
            'App\\Validators\\Captcha@validate'
        );
    }
}
