<?php

namespace Webkul\SAASCustomizer\Facades;

use Illuminate\Support\Facades\Facade;

class SuperAcl extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'super_acl';
    }
}
