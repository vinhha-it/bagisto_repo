<?php

namespace Webkul\SAASSubscription\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('bagisto.saas.layout.head', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('saas_subscription::super.layouts.style');
        });

        Event::listen('bagisto.admin.layout.content.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('saas_subscription::admin.layouts.service-stopped-notification');
        });

        Event::listen('saas.company.register.after', 'Webkul\SAASSubscription\Helpers\Subscription@activateTrial');

        Event::listen('catalog.product.copy.before', 'Webkul\SAASSubscription\Listeners\Resource@beforeProductCreate');

        Event::listen('catalog.product.create.before', 'Webkul\SAASSubscription\Listeners\Resource@beforeProductCreate');

        Event::listen('catalog.category.create.before', 'Webkul\SAASSubscription\Listeners\Resource@beforeCategoryCreate');

        Event::listen('catalog.attribute.create.before', 'Webkul\SAASSubscription\Listeners\Resource@beforeAttributeCreate');

        Event::listen('catalog.product.attribute_family.before', 'Webkul\SAASSubscription\Listeners\Resource@beforeAttributeFamilyCreate');

        Event::listen('core.channel.create.before', 'Webkul\SAASSubscription\Listeners\Resource@beforeChannelCreate');

        Event::listen('checkout.order.save.before', 'Webkul\SAASSubscription\Listeners\Resource@beforeOrderCreate');
    }
}
