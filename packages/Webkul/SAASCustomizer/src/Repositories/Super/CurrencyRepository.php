<?php

namespace Webkul\SAASCustomizer\Repositories\Super;

use Webkul\Core\Eloquent\Repository;
use Webkul\SAASCustomizer\Models\Currency;

class CurrencyRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Currency::class;
    }
}