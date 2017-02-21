<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Binding search data for route resources
        $registrar = new \App\CustomRouting\ResourceRegistrar($this->app['router']);

        $this->app->bind('Illuminate\Routing\ResourceRegistrar', function () use ($registrar) {
            return $registrar;
        });

        //Make variable available for nav partial
        view()->composer('partials.nav', function ($view) {
            $view->with('requests', is_object(Auth::user()) ? Auth::user()->followers()->wherePivot('accepted', FALSE)->count() : FALSE);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
