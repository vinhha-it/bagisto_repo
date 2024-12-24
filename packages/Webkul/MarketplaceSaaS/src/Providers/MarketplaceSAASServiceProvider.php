<?php

namespace Webkul\MarketplaceSaaS\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Webkul\Product\Contracts\Product as ProductContract;
use Webkul\Checkout\Contracts\CartItem as CartItemContract;
use Webkul\MarketplaceSaaS\Console\Commands\InstallMarketplaceSaas;

class MarketplaceSAASServiceProvider extends ServiceProvider
{
    // Models Starts
    protected  $model_connections = [
        'Marketplace' => [
            'Invoice',
            'InvoiceItem',
            'Order',
            'OrderItem',
            'Product',
            'ProductImage',
            'ProductVideo',
            'Refund',
            'RefundItem',
            'Review',
            'Seller',
            'SellerFlag',
            'SellerFlagReason',
            'Shipment',
            'ShipmentItem',
            'Transaction',
            'SellerCategory',
            'PaymentRequest',
            'MpProductDownloadableLink',
            'MpProductDownloadableSample',
        ],
    ];

    public function boot(Router $router)
    {
        $this->app->register(EventServiceProvider::class);

        /**
         * Load Route
         */
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->bootModelObservers();

        $this->overrideModels();

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallMarketplaceSaas::class,
            ]);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    // model observer for all the marketplace models of Bagisto
    public function bootModelObservers()
    {
        foreach ($this->model_connections as $dir_path => $modelClasses) {
            foreach ($modelClasses as $modelClass) {
                $model_class = "\Webkul\MarketplaceSaaS\Models\\{$modelClass}";
                $model_class::observe("\Webkul\MarketplaceSaaS\Observers\\{$modelClass}Observer");
            }
        }

        \Webkul\MarketplaceSaaS\Models\Catalog\Product::observe(\Webkul\MarketplaceSaaS\Observers\Catalog\ProductObserver::class);

        \Webkul\MarketplaceSaaS\Models\CartItem::observe(\Webkul\MarketplaceSaaS\Observers\CartItemObserver::class);
    }

    /**
     * This method will load all override models
     */
    protected function overrideModels()
    {
        foreach ($this->model_connections as $dir_path => $modelClasses) {
            foreach ($modelClasses as $modelClass) {
                $this->app->concord->registerModel(
                    "Webkul\\{$dir_path}\Models\\{$modelClass}",
                    "Webkul\MarketplaceSaaS\Models\\{$modelClass}"
                );
            }
        }

        $this->app->concord->registerModel(ProductContract::class, \Webkul\MarketplaceSaaS\Models\Catalog\Product::class);

        $this->app->concord->registerModel(CartItemContract::class, \Webkul\MarketplaceSaaS\Models\CartItem::class);
    }

    public function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/saas-extensions.php',
            'saas-extensions'
        );
    }
}
