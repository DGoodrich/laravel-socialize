<?php

namespace App\Models\Services\Providers;

use Illuminate\Support\ServiceProvider;

class UserRepoServiceProvide extends ServiceProvider
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
        $this->app->bind('App\Models\Contracts\UserInterface', 'App\Models\Repositories\UserRepository');
    }
}