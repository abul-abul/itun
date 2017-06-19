<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Contracts\BlogInterface',
            'App\Services\BlogService'
        );
        $this->app->bind(
            'App\Contracts\BlogGalleryInterface',
            'App\Services\BlogGalleryService'
        );
    }
}
