<?php

namespace Webkul\SAASSubscription\Providers;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;
use Webkul\SAASSubscription\Exceptions\Handler as SubscriptionHandler;

class SAASSubscriptionServiceProvider extends ServiceProvider
{
    /**
     * Boot method
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');

        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'saas_subscription');

        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'saas_subscription');

        $this->publishes([
            __DIR__.'/../Resources/views/super/tenants/view.blade.php' => __DIR__.'/../../../SAASCustomizer/src/Resources/views/super/tenants/companies/view.blade.php',
        ]);

        $this->app->register(EventServiceProvider::class);

        $this->app->register(ModuleServiceProvider::class);

        $this->app->bind(ExceptionHandler::class, SubscriptionHandler::class);
    }

    /**
     * Register services.
     *
     * @return void
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Registering the configuration.
     *
     * @return void
     */
    public function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/super-menu.php', 'menu.super-admin'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/super-system.php', 'company'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/admin-menu.php', 'menu.admin'
        );
    }
}
