<?php

namespace Webkul\Marketplace\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'marketplace.seller.create.after' => [
            'Webkul\Marketplace\Listeners\Seller@afterCreate',
        ],

        'marketplace.seller.update.after' => [
            'Webkul\Marketplace\Listeners\Seller@afterUpdate',
        ],

        'catalog.product.update.before' => [
            'Webkul\Marketplace\Listeners\Product@beforeUpdate',
        ],

        'catalog.product.update.after' => [
            'Webkul\Marketplace\Listeners\Product@afterUpdate',
        ],

        'checkout.cart.add.before' => [
            'Webkul\Marketplace\Listeners\Cart@cartItemAddBefore',
        ],

        'checkout.cart.add.after' => [
            'Webkul\Marketplace\Listeners\Cart@cartItemAddAfter',
        ],

        'checkout.order.save.after' => [
            'Webkul\Marketplace\Listeners\Order@afterPlaceOrder',
        ],

        'sales.order.cancel.after' => [
            'Webkul\Marketplace\Listeners\Order@afterOrderCancel',
        ],

        'marketplace.sales.order.save.after' => [
            'Webkul\Marketplace\Listeners\Order@sendNewOrderMail',
        ],

        'sales.invoice.save.after' => [
            'Webkul\Marketplace\Listeners\Invoice@afterInvoice',
        ],

        'sales.shipment.save.after' => [
            'Webkul\Marketplace\Listeners\Shipment@afterShipment',
        ],

        'sales.refund.save.after' => [
            'Webkul\Marketplace\Listeners\Refund@afterRefund',
        ],

        'core.configuration.save.after' => [
            'Webkul\Marketplace\Listeners\Configuration@afterUpdate',
        ],
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $eventTemplates = [
            [
                'event'    => 'bagisto.shop.products.view.additional_actions.after',
                'template' => 'marketplace::shop.products.product-sellers',
            ],
            [
                'event'    => 'bagisto.shop.products.view.after',
                'template' => 'marketplace::shop.products.top-selling',
            ],
            [
                'event'    => 'bagisto.shop.components.layouts.header.desktop.bottom.mini_cart.after',
                'template' => 'marketplace::components.shop.layouts.header.sell',
            ],
            [
                'event'    => 'bagisto.shop.components.layouts.header.mobile.mini_cart.after',
                'template' => 'marketplace::components.shop.layouts.header.sell',
            ],
        ];

        if (core()->getConfigData('marketplace.settings.general.status')) {
            foreach ($eventTemplates as $eventTemplate) {
                Event::listen(current($eventTemplate), fn ($e) => $e->addTemplate(end($eventTemplate)));
            }
        }
    }
}
