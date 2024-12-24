<?php

namespace Webkul\SAASSubscription\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    /**
     * Define models of module
     *
     * @var array
     */
    protected $models = [
        \Webkul\SAASSubscription\Models\Address::class,
        \Webkul\SAASSubscription\Models\Invoice::class,
        \Webkul\SAASSubscription\Models\Plan::class,
        \Webkul\SAASSubscription\Models\PurchasedPlan::class,
        \Webkul\SAASSubscription\Models\RecurringProfile::class,
        \Webkul\SAASSubscription\Models\Offer::class,
    ];
}
