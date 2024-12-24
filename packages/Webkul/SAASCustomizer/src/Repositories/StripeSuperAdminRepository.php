<?php

namespace Webkul\SAASCustomizer\Repositories;

use Webkul\Core\Eloquent\Repository;

class StripeSuperAdminRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\SAASCustomizer\Models\StripeSuperAdmin';
    }
}