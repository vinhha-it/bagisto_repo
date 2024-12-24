<?php

namespace Webkul\SAASSubscription\Repositories;

use Webkul\Core\Eloquent\Repository;

class PlanRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return 'Webkul\SAASSubscription\Contracts\Plan';
    }

    /**
     * Retunns plans
     *
     * @return array
     */
    public function getPlans()
    {
        $plans = [];

        foreach ($this->all() as $plan) {
            $plans['title'] = $plan->name;
            $plans['value'] = $plan->id;
        }

        return [$plans];
    }
}
