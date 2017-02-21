<?php

namespace App\Models\Services\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Services\AdminService;

class AdminServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Binds 'adminService' to the result of the closure
        $this->app->bind('adminService', function($app)
        {
            return new AdminService(
                $app->make('App\Models\Contracts\UserInterface'),
                $app->make('App\Models\Contracts\UserRelationsInterface'),
                $app->make('App\Models\Contracts\PostInterface')
            );
        });
    }
}