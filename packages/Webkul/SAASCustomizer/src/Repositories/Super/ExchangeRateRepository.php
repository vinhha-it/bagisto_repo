<?php

namespace Webkul\SAASCustomizer\Repositories\Super;

use Webkul\Core\Eloquent\Repository;
use Webkul\SAASCustomizer\Models\CurrencyExchangeRate;

class ExchangeRateRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return CurrencyExchangeRate::class;
    }
}