<?php

namespace Webkul\SAASCustomizer\Facades;

use Illuminate\Support\Facades\Facade;

class SuperSystemConfig extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'super_system_config';
    }
}
