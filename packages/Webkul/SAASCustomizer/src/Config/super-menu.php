<?php

return [

    /**
     * Tenants.
     */
    [
        'key'   => 'tenants',
        'name'  => 'saas::app.components.layouts.sidebar.tenants',
        'route' => 'super.tenants.companies.index',
        'sort'  => 1,
        'icon'  => 'icon-customer-2',
    ], [
        'key'   => 'tenants.companies',
        'name'  => 'saas::app.components.layouts.sidebar.tenants',
        'route' => 'super.tenants.companies.index',
        'sort'  => 1,
        'icon'  => '',
    ], [
        'key'   => 'tenants.customers',
        'name'  => 'saas::app.components.layouts.sidebar.tenant-customers',
        'route' => 'super.tenants.customers.index',
        'sort'  => 2,
        'icon'  => '',
    ], [
        'key'   => 'tenants.products',
        'name'  => 'saas::app.components.layouts.sidebar.tenant-products',
        'route' => 'super.tenants.products.index',
        'sort'  => 3,
        'icon'  => '',
    ], [
        'key'   => 'tenants.orders',
        'name'  => 'saas::app.components.layouts.sidebar.tenant-orders',
        'route' => 'super.tenants.orders.index',
        'sort'  => 3,
        'icon'  => '',
    ],

    /**
     * Settings.
     */
    [
        'key'        => 'settings',
        'name'       => 'saas::app.components.layouts.sidebar.settings',
        'route'      => 'super.settings.agents.index',
        'sort'       => 2,
        'icon'       => 'icon-settings',
    ], [
        'key'   => 'settings.agents',
        'name'  => 'saas::app.components.layouts.sidebar.agents',
        'route' => 'super.settings.agents.index',
        'sort'  => 1,
        'icon'  => '',
    ], [
        'key'   => 'settings.agents.users',
        'name'  => 'saas::app.components.layouts.sidebar.agents',
        'route' => 'super.settings.agents.index',
        'sort'  => 1,
        'icon'  => '',
    ], [
        'key'   => 'settings.agents.roles',
        'name'  => 'saas::app.components.layouts.sidebar.roles',
        'route' => 'super.settings.roles.index',
        'sort'  => 2,
        'icon'  => '',
    ], [
        'key'   => 'settings.locales',
        'name'  => 'saas::app.components.layouts.sidebar.locales',
        'route' => 'super.settings.locales.index',
        'sort'  => 2,
        'icon'  => '',
    ], [
        'key'   => 'settings.currencies',
        'name'  => 'saas::app.components.layouts.sidebar.currencies',
        'route' => 'super.settings.currencies.index',
        'sort'  => 3,
        'icon'  => '',
    ], [
        'key'   => 'settings.exchange_rates',
        'name'  => 'saas::app.components.layouts.sidebar.exchange-rates',
        'route' => 'super.settings.exchange_rates.index',
        'sort'  => 4,
        'icon'  => '',
    ], [
        'key'   => 'settings.channels',
        'name'  => 'saas::app.components.layouts.sidebar.channels',
        'route' => 'super.settings.channels.index',
        'sort'  => 5,
        'icon'  => '',
    ], [
        'key'   => 'settings.themes',
        'name'  => 'saas::app.components.layouts.sidebar.themes',
        'route' => 'super.settings.themes.index',
        'sort'  => 6,
        'icon'  => '',
    ], [
        'key'   => 'settings.send-email',
        'name'  => 'saas::app.components.layouts.sidebar.send-email',
        'route' => 'super.settings.email.create',
        'sort'  => 7,
        'icon'  => '',
    ],

    /**
     * CMS.
     */
    [
        'key'   => 'cms',
        'name'  => 'saas::app.components.layouts.sidebar.cms',
        'route' => 'super.cms.index',
        'sort'  => 3,
        'icon'  => 'icon-cms',
    ],

    /**
     * Configuration.
     */
    [
        'key'   => 'configuration',
        'name'  => 'saas::app.components.layouts.sidebar.configurations',
        'route' => 'super.configuration.index',
        'sort'  => 4,
        'icon'  => 'icon-configuration',
    ],
];
