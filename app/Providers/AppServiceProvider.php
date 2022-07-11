<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

use App\Models\CmsPage;


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
        try {
            if (Schema::hasTable('cms_pages')) {
                View::share('header_footer', CmsPage::where('slug', 'header_footer')->first());
                View::share('api_keys', CmsPage::where('slug', 'api_keys')->first());
            }
        } catch (\Exception $e) {
          
        }
    }
}
