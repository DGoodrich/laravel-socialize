<?php

namespace App\Models\Services\Providers;

use Illuminate\Support\ServiceProvider;

class PostRepoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Models\Contracts\PostInterface', 'App\Models\Repositories\PostRepository');
    }
}