<?php

namespace App\Models\Services\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Services\UserService;

class UserServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Binds 'userService' to the result of the closure
        $this->app->bind('userService', function($app)
        {
            return new UserService(
                $app->make('App\Models\Contracts\UserInterface'),
                $app->make('App\Models\Contracts\UserRelationsInterface'),
                $app->make('App\Models\Contracts\PostInterface')
            );
        });
    }
}