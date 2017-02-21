<?php

namespace App\Models\Services\Facades;

use \Illuminate\Support\Facades\Facade;

class UserFacade extends Facade

{
    /**
     * Get the registered name of the component. This tells $this->app what record to return
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'userService'; }
}