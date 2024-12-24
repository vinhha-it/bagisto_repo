<?php

namespace Webkul\SAASSubscription\Repositories;

use Webkul\Core\Eloquent\Repository;

class OffersRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return 'Webkul\SAASSubscription\Contracts\Offer';
    }
}
