<?php

namespace Webkul\SAASCustomizer\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Validation\Factory;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Webkul\Core\Core as BaseCore;
use Webkul\DataTransfer\Helpers\Importers\Product\Importer as BaseProductImporter;
use Webkul\DataTransfer\Helpers\Importers\Product\SKUStorage as BaseSKUStorage;
use Webkul\DataTransfer\Helpers\Importers\Customer\Importer as BaseCustomerImporter;
use Webkul\Product\Repositories\ProductRepository as BaseProductRepository;
use Webkul\Product\Repositories\ProductAttributeValueRepository as BaseProductAttributeValueRepository;
use Webkul\Shop\Http\Controllers\Customer\SessionController as BaseSessionController;
use Webkul\SAASCustomizer\Core;
use Webkul\SAASCustomizer\Company;
use Webkul\SAASCustomizer\Themes;
use Webkul\SAASCustomizer\Exceptions\Handler;
use Webkul\SAASCustomizer\Http\Middleware\CompanyLocale;
use Webkul\SAASCustomizer\Http\Middleware\CompanyTheme;
use Webkul\SAASCustomizer\Http\Middleware\Locale;
use Webkul\SAASCustomizer\Http\Middleware\Bouncer as BouncerMiddleware;
use Webkul\SAASCustomizer\Helpers\Importers\Product\Importer as ProductImporter;
use Webkul\SAASCustomizer\Helpers\Importers\Product\SKUStorage as SKUStorageImporter;
use Webkul\SAASCustomizer\Helpers\Importers\Customer\Importer as CustomerImporter;
use Webkul\SAASCustomizer\Repositories\ProductRepository;
use Webkul\SAASCustomizer\Http\Controllers\Shop\SessionController;
use Webkul\SAASCustomizer\SuperAcl;
use Webkul\SAASCustomizer\SuperSystemConfig;
use Webkul\SAASCustomizer\Facades\SuperAcl as SuperAclFacades;
use Webkul\SAASCustomizer\Facades\SuperSystemConfig as SuperSystemConfigFacades;
use Webkul\SAASCustomizer\Validation\DatabasePresenceVerifier;
use Webkul\SAASCustomizer\Repositories\ProductAttributeValueRepository;

class SAASCustomizerServiceProvider extends ServiceProvider
{
    protected $modelConnections = [
        'Attribute' => [
            'Attribute',
            'AttributeTranslation',
            'AttributeFamily',
            'AttributeGroup',
            'AttributeOption',
            'AttributeOptionTranslation',
        ],
        'Category' => [
            'Category',
            'CategoryTranslation',
        ],
        'Checkout' => [
            'Cart',
            'CartAddress',
            'CartItem',
            'CartPayment',
            'CartShippingRate',
        ],
        'Core' => [
            'Channel',
            'ChannelTranslation',
            'CoreConfig',
            'Currency',
            'CurrencyExchangeRate',
            'Locale',
            'SubscribersList',
        ],
        'Customer' => [
            'Customer',
            'CustomerAddress',
            'CustomerGroup',
            'Wishlist',
        ],
        'Inventory' => [
            'InventorySource',
        ],
        'Product' => [
            'Product',
            'ProductAttributeValue',
            'ProductFlat',
            'ProductImage',
            'ProductInventory',
            'ProductOrderedInventory',
            'ProductReview',
        ],
        'Sales' => [
            'Invoice',
            'InvoiceItem',
            'Order',
            'OrderAddress',
            'OrderItem',
            'OrderPayment',
            'OrderTransaction',
            'Shipment',
            'Refund',
            'RefundItem',
            'DownloadableLinkPurchased',
        ],
        'Tax' => [
            'TaxCategory',
            'TaxMap',
            'TaxRate',
        ],
        'User' => [
            'Admin',
            'Role',
        ],
        'CartRule' => [
            'CartRule',
            'CartRuleCoupon',
        ],
        'CatalogRule' => [
            'CatalogRule',
            'CatalogRuleProduct',
            'CatalogRuleProductPrice',
        ],
        'CMS' => [
            'Page',
            'PageTranslation',
        ],
        'Theme' => [
            'ThemeCustomization',
            'ThemeCustomizationTranslation',
        ],
        'Marketing' => [
            'Template',
            'Event',
            'Campaign',
            'URLRewrite',
            'SearchTerm',
            'SearchSynonym',
        ],
        'Sitemap' => [
            'Sitemap',
        ],
        'DataTransfer' => [
            'Import',
            'ImportBatch',
        ],
    ];

    protected $skipObserver = [
        'TaxMap',
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router): void
    {
        include __DIR__.'/../Http/helpers.php';

        Route::middleware('web')->group(__DIR__.'/../Routes/web.php');

        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'saas');

        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'saas');

        Blade::anonymousComponentPath(__DIR__.'/../Resources/views/super/components', 'saas');

        Blade::anonymousComponentPath(__DIR__.'/../Resources/views/companies/components', 'company');

        $this->app->register(EventServiceProvider::class);
        $this->app->register(ModuleServiceProvider::class);

        /* Aliases */
        $router->aliasMiddleware('super-locale', Locale::class);
        $router->aliasMiddleware('super-admin', BouncerMiddleware::class);
        $router->aliasMiddleware('company-locale', CompanyLocale::class);
        $router->aliasMiddleware('company-theme', CompanyTheme::class);

        $this->loadPublishableAssets();
        $this->loadOverrideModels();
        $this->loadModelObservers();
        $this->registerPresenceVerifier();
        $this->loadValidationFactory();
        //$this->setMailConfigurations();

        $this->app->bind(ExceptionHandler::class, Handler::class);
        $this->app->bind(BaseProductImporter::class, ProductImporter::class);
        $this->app->bind(BaseSKUStorage::class, SKUStorageImporter::class);
        $this->app->bind(BaseCustomerImporter::class, CustomerImporter::class);
        $this->app->bind(BaseProductRepository::class, ProductRepository::class);
        $this->app->bind(BaseSessionController::class, SessionController::class);
        $this->app->bind(BaseProductAttributeValueRepository::class, ProductAttributeValueRepository::class);
        $this->app->bind(BaseCore::class, Core::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerConfig();

        $this->registerCommands();

        $this->registerFacades();
    }

    /**
     * Register the console commands of this package.
     *
     * @return void
     */
    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Webkul\SAASCustomizer\Console\Commands\Install::class,
            ]);
        }
    }

    /**
     * Register Bouncer as a singleton.
     *
     * @return void
     */
    protected function registerFacades(): void
    {
        $loader  = AliasLoader::getInstance();
        
        $loader->alias('super_system_config', SuperSystemConfigFacades::class);

        $loader->alias('super_acl', SuperAclFacades::class);

        $this->app->singleton('company', function () {
            return app()->make(Company::class);
        });

        $this->app->singleton('themes', function () {
            return app()->make(Themes::class);
        });
        
        $this->app->singleton('super_system_config', function () {
            return app()->make(SuperSystemConfig::class);
        });
        
        $this->app->singleton('super_acl', function () {
            return app()->make(SuperAcl::class);
        });

        // override DB facade
        $this->app->singleton('db', function ($app) {
            return new \Webkul\SAASCustomizer\Database\DatabaseManager($app, $app['db.factory']);
        });
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        foreach (['guards', 'providers', 'passwords'] as $key) {
            $this->mergeConfigFrom(
                dirname(__DIR__).'/Config/auth/'.$key.'.php',
                'auth.'.$key
            );
        }
        
        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/vite.php',
            'bagisto-vite.viters'
        );
        
        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/theme.php',
            'themes'
        );
        
        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/super-menu.php',
            'menu.super-admin'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/super-acl.php',
            'super-acl'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/super-system.php',
            'company'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/purge-pool.php',
            'purge-pool'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/admin-menu.php',
            'menu.admin'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/admin-system.php',
            'core'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/excluded-sites.php',
            'excluded-sites'
        );
    }

    /**
     * This method will load all override models
     *
     * @return void
     */
    protected function loadOverrideModels(): void
    {
        foreach ($this->modelConnections as $dir_path => $modelClasses) {
            foreach ($modelClasses as $modelClass) {
                $this->app->concord->registerModel(
                    "Webkul\\{$dir_path}\Contracts\\{$modelClass}", "Webkul\SAASCustomizer\Models\\{$dir_path}\\{$modelClass}"
                );
            }
        }
    }

    /**
     * This method will load all model's observers.
     *
     * @return void
     */
    protected function loadModelObservers(): void
    {
        foreach ($this->modelConnections as $dir_path => $modelClasses) {
            foreach ($modelClasses as $modelClass) {
                if (! in_array($modelClass, $this->skipObserver)) {
                    $model_class = "\Webkul\SAASCustomizer\Models\\{$dir_path}\\{$modelClass}";
                    $model_class::observe("\Webkul\SAASCustomizer\Observers\\{$dir_path}\\{$modelClass}Observer");
                }
            }
        }

        \Webkul\SAASCustomizer\Models\CompanyAddress::observe(\Webkul\SAASCustomizer\Observers\CompanyAddressObserver::class);
    }

    /**
     * Register the validation factory.
     *
     * @return mixed
     */
    protected function loadValidationFactory()
    {
        $this->app->singleton('validator', function ($app) {
            $validator = new Factory($app['translator'], $app);

            // The validation presence verifier is responsible for determining the existence of
            // values in a given data collection which is typically a relational database or
            // other persistent data stores. It is used to check for "uniqueness" as well.
            if (isset($app['db'], $app['validation.presence'])) {
                $validator->setPresenceVerifier($app['validation.presence']);
            }

            return $validator;
        });
    }

    /**
     * Register the database presence verifier.
     *
     * @return void
     */
    protected function registerPresenceVerifier()
    {
        $this->app->singleton('validation.presence', function ($app) {
            return new DatabasePresenceVerifier($app['db']);
        });
    }

    /**
     * Set the mail driver and configurations..
     *
     * @return void
     */
    private function setMailConfigurations(): void
    {
        $currentCompany = company()->getCurrent();

        if (
            $currentCompany != 'super-company'
            && ($currentCompany['more_info'] ?? false)
            && json_decode($currentCompany['more_info'])->seeded
            && core()->getConfigData('emails.configure.email_credentials.mail_username')
        ) {
            config()->set('mail.driver', core()->getConfigData('emails.configure.email_credentials.mail_driver'));
            config()->set('mail.host', core()->getConfigData('emails.configure.email_credentials.mail_host'));
            config()->set('mail.port', core()->getConfigData('emails.configure.email_credentials.mail_port'));
            config()->set('mail.username', core()->getConfigData('emails.configure.email_credentials.mail_username'));
            config()->set('mail.password', core()->getConfigData('emails.configure.email_credentials.mail_password'));
            config()->set('mail.encryption', core()->getConfigData('emails.configure.email_credentials.mail_encryption'));
        }
    }

    /**
     * This method will load all publishable.
     *
     * @return void
     */
    private function loadPublishableAssets(): void
    {
        $this->publishes([
            __DIR__ . '/../../publishable' => public_path('themes/company'),

            __DIR__ . '/../Http/Controllers/LoginController.php' => __DIR__ . '/../../../SocialLogin/src/Http/Controllers/LoginController.php',

            __DIR__ . '/../Helpers/Indexers/ElasticSearch.php' => __DIR__ . '/../../../Product/src/Helpers/Indexers/ElasticSearch.php',

            __DIR__ . '/../Resources/views/super/components/seo/index.blade.php' => __DIR__ . '/../../../Admin/src/Resources/views/components/seo/index.blade.php',

            __DIR__ . '/../Resources/views/super/components/media/images.blade.php' => __DIR__ . '/../../../Admin/src/Resources/views/components/media/images.blade.php',

            __DIR__ . '/../Resources/views/admin/components/' => __DIR__ . '/../../../Admin/src/Resources/views/components/',

            __DIR__ . '/../Resources/views/admin/sales/refunds' => resource_path('/views/vendor/admin/sales/refunds'),

            __DIR__ . '/../Config/EncryptCookies.php' => base_path('/app/Http/Middleware/EncryptCookies.php'),

            __DIR__ . '/../Resources/views/shop/home/index.blade.php' => resource_path('/themes/default/views/home/index.blade.php'),

            __DIR__ . '/../Helpers/Importers/AbstractImporter.php' => __DIR__ . '/../../../DataTransfer/src/Helpers/Importers/AbstractImporter.php',
        ], 'saas-publishes');
    }
}
