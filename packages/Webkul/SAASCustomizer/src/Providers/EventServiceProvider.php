<?php

namespace Webkul\SAASCustomizer\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('saas.company.register.after', 'Webkul\SAASCustomizer\Listeners\CompanyRegistered@handle');

        Event::listen('super.agent.create.after', 'Webkul\SAASCustomizer\Listeners\AgentRegistered@handle');

        Event::listen('checkout.order.save.after', 'Webkul\SAASCustomizer\Listeners\OrderAgentMail@handle');

        Event::listen('sales.order.cancel.after', 'Webkul\SAASCustomizer\Listeners\Order@sendCancelOrderMail');

        Event::listen('sales.shipment.save.after', 'Webkul\SAASCustomizer\Listeners\Order@sendNewShipmentMail');
    }
}