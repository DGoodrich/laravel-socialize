<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsButtonRight', 'components.form.button-right', ['value', 'attributes']);
        Form::component('bsTextArea', 'components.form.textarea', ['name', 'value', 'attributes']);
        Form::component('bsSelect', 'components.form.select', ['name', 'model', 'field', 'value', 'attributes']);
        Form::component('bsAcceptRejectButtons', 'components.form.accept-reject-buttons', ['route', 'user', 'id']);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
