<?php

namespace Webkul\SAASCustomizer\Repositories\Super;

use Webkul\Core\Eloquent\Repository;

class RoleRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\SAASCustomizer\Contracts\SuperRoles';
    }
}
