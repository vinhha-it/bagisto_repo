<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Tenants
    |--------------------------------------------------------------------------
    |
    | All ACLs related to tenants will be placed here.
    |
    */
    [
        'key'   => 'tenants',
        'name'  => 'saas::app.super.acl.tenants',
        'route' => 'super.tenants.companies.index',
        'sort'  => 1,
    ], [
        'key'   => 'tenants.companies',
        'name'  => 'saas::app.super.acl.tenants',
        'route' => 'super.tenants.companies.index',
        'sort'  => 1,
    ], [
        'key'   => 'tenants.companies.create',
        'name'  => 'saas::app.super.acl.create',
        'route' => 'super.tenants.companies.create',
        'sort'  => 1,
    ], [
        'key'   => 'tenants.companies.edit',
        'name'  => 'saas::app.super.acl.edit',
        'route' => 'super.tenants.companies.edit',
        'sort'  => 2,
    ], [
        'key'   => 'tenants.companies.view',
        'name'  => 'saas::app.super.acl.view',
        'route' => 'super.tenants.companies.view',
        'sort'  => 3,
    ], [
        'key'   => 'tenants.companies.delete',
        'name'  => 'saas::app.super.acl.delete',
        'route' => 'super.tenants.companies.delete',
        'sort'  => 3,
    ], [
        'key'   => 'tenants.companies.mass-update',
        'name'  => 'saas::app.super.acl.mass-update',
        'route' => 'super.tenants.companies.mass_update',
        'sort'  => 4,
    ], [
        'key'   => 'tenants.companies.mass-delete',
        'name'  => 'saas::app.super.acl.mass-delete',
        'route' => 'super.tenants.companies.mass_delete',
        'sort'  => 5,
    ], [
        'key'   => 'tenants.customers',
        'name'  => 'saas::app.super.acl.customers',
        'route' => 'super.tenants.customers.index',
        'sort'  => 2,
    ], [
        'key'   => 'tenants.products',
        'name'  => 'saas::app.super.acl.products',
        'route' => 'super.tenants.products.index',
        'sort'  => 3,
    ], [
        'key'   => 'tenants.orders',
        'name'  => 'saas::app.super.acl.orders',
        'route' => 'super.tenants.orders.index',
        'sort'  => 4,
    ],

    /*
    |--------------------------------------------------------------------------
    | Agents
    |--------------------------------------------------------------------------
    |
    | All ACLs related to agents will be placed here.
    |
    */
    [
        'key'   => 'settings',
        'name'  => 'saas::app.super.acl.settings',
        'route' => 'super.settings.agents.index',
        'sort'  => 2,
    ], [
        'key'   => 'settings.agents',
        'name'  => 'saas::app.super.acl.agents',
        'route' => 'super.settings.agents.index',
        'sort'  => 1,
    ], [
        'key'   => 'settings.agents.create',
        'name'  => 'saas::app.super.acl.create',
        'route' => 'super.settings.agents.create',
        'sort'  => 1,
    ], [
        'key'   => 'settings.agents.edit',
        'name'  => 'saas::app.super.acl.edit',
        'route' => 'super.settings.agents.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.agents.delete',
        'name'  => 'saas::app.super.acl.delete',
        'route' => 'super.settings.agents.delete',
        'sort'  => 3,
    ],

    /*
    |--------------------------------------------------------------------------
    | Roles
    |--------------------------------------------------------------------------
    |
    | All ACLs related to agents will be placed here.
    |
    */
    [
        'key'   => 'settings.roles',
        'name'  => 'saas::app.super.acl.roles',
        'route' => 'super.settings.roles.index',
        'sort'  => 2,
    ], [
        'key'   => 'settings.roles.create',
        'name'  => 'saas::app.super.acl.create',
        'route' => 'super.settings.roles.create',
        'sort'  => 1,
    ], [
        'key'   => 'settings.roles.edit',
        'name'  => 'saas::app.super.acl.edit',
        'route' => 'super.settings.roles.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.roles.delete',
        'name'  => 'saas::app.super.acl.delete',
        'route' => 'super.settings.roles.delete',
        'sort'  => 3,
    ],

    /*
    |--------------------------------------------------------------------------
    | Locales
    |--------------------------------------------------------------------------
    |
    | All ACLs related to locales will be placed here.
    |
    */
    [
        'key'   => 'settings.locales',
        'name'  => 'saas::app.super.acl.locales',
        'route' => 'super.settings.locales.index',
        'sort'  => 3,
    ], [
        'key'   => 'settings.locales.create',
        'name'  => 'saas::app.super.acl.create',
        'route' => 'super.settings.locales.create',
        'sort'  => 1,
    ], [
        'key'   => 'settings.locales.edit',
        'name'  => 'saas::app.super.acl.edit',
        'route' => 'super.settings.locales.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.locales.delete',
        'name'  => 'saas::app.super.acl.delete',
        'route' => 'super.settings.locales.delete',
        'sort'  => 3,
    ],

    /*
    |--------------------------------------------------------------------------
    | Currencies
    |--------------------------------------------------------------------------
    |
    | All ACLs related to currencies will be placed here.
    |
    */
    [
        'key'   => 'settings.currencies',
        'name'  => 'saas::app.super.acl.currencies',
        'route' => 'super.settings.currencies.index',
        'sort'  => 4,
    ], [
        'key'   => 'settings.currencies.create',
        'name'  => 'saas::app.super.acl.create',
        'route' => 'super.settings.currencies.create',
        'sort'  => 1,
    ], [
        'key'   => 'settings.currencies.edit',
        'name'  => 'saas::app.super.acl.edit',
        'route' => 'super.settings.currencies.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.currencies.delete',
        'name'  => 'saas::app.super.acl.delete',
        'route' => 'super.settings.currencies.delete',
        'sort'  => 3,
    ], [
        'key'   => 'settings.currencies.mass-delete',
        'name'  => 'saas::app.super.acl.mass-delete',
        'route' => 'super.settings.currencies.mass_delete',
        'sort'  => 4,
    ],

    /*
    |--------------------------------------------------------------------------
    | Currency Exchange Rates
    |--------------------------------------------------------------------------
    |
    | All ACLs related to exchange rates will be placed here.
    |
    */
    [
        'key'   => 'settings.exchange_rates',
        'name'  => 'saas::app.super.acl.exchange-rates',
        'route' => 'super.exchange_rates.index',
        'sort'  => 5,
    ], [
        'key'   => 'settings.exchange_rates.create',
        'name'  => 'saas::app.super.acl.create',
        'route' => 'super.settings.exchange_rates.create',
        'sort'  => 1,
    ], [
        'key'   => 'settings.exchange_rates.edit',
        'name'  => 'saas::app.super.acl.edit',
        'route' => 'super.settings.exchange_rates.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.exchange_rates.delete',
        'name'  => 'saas::app.super.acl.delete',
        'route' => 'super.settings.exchange_rates.delete',
        'sort'  => 3,
    ],

    /*
    |--------------------------------------------------------------------------
    | Channels
    |--------------------------------------------------------------------------
    |
    | All ACLs related to channels will be placed here.
    |
    */
    [
        'key'   => 'settings.channels',
        'name'  => 'saas::app.super.acl.channels',
        'route' => 'super.settings.channels.index',
        'sort'  => 6,
    ], [
        'key'   => 'settings.channels.edit',
        'name'  => 'saas::app.super.acl.edit',
        'route' => 'super.settings.channels.edit',
        'sort'  => 1,
    ],

    /*
    |--------------------------------------------------------------------------
    | Themes
    |--------------------------------------------------------------------------
    |
    | All ACLs related to exchange rates will be placed here.
    |
    */
    [
        'key'   => 'settings.themes',
        'name'  => 'saas::app.super.acl.themes',
        'route' => 'super.settings.themes.index',
        'sort'  => 7,
    ], [
        'key'   => 'settings.themes.create',
        'name'  => 'saas::app.super.acl.create',
        'route' => 'super.settings.themes.create',
        'sort'  => 1,
    ], [
        'key'   => 'settings.themes.edit',
        'name'  => 'saas::app.super.acl.edit',
        'route' => 'super.settings.themes.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.themes.delete',
        'name'  => 'saas::app.super.acl.delete',
        'route' => 'super.settings.themes.delete',
        'sort'  => 3,
    ],

    /*
    |--------------------------------------------------------------------------
    | Email
    |--------------------------------------------------------------------------
    |
    | All ACLs related to exchange rates will be placed here.
    |
    */
    [
        'key'   => 'settings.email',
        'name'  => 'saas::app.super.acl.send-email',
        'route' => 'super.settings.email.create',
        'sort'  => 8,
    ],

    /*
    |--------------------------------------------------------------------------
    | CMS
    |--------------------------------------------------------------------------
    |
    | All ACLs related to CMS will be placed here.
    |
    */
    [
        'key'   => 'cms',
        'name'  => 'saas::app.super.acl.cms',
        'route' => 'super.cms.index',
        'sort'  => 3,
    ], [
        'key'   => 'cms.create',
        'name'  => 'saas::app.super.acl.create',
        'route' => 'super.cms.create',
        'sort'  => 1,
    ], [
        'key'   => 'cms.edit',
        'name'  => 'saas::app.super.acl.edit',
        'route' => 'super.cms.edit',
        'sort'  => 2,
    ], [
        'key'   => 'cms.delete',
        'name'  => 'saas::app.super.acl.delete',
        'route' => 'super.cms.delete',
        'sort'  => 3,
    ], [
        'key'   => 'cms.mass-delete',
        'name'  => 'saas::app.super.acl.mass-delete',
        'route' => 'super.cms.mass_delete',
        'sort'  => 4,
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuration
    |--------------------------------------------------------------------------
    |
    | All ACLs related to CMS will be placed here.
    |
    */
    [
        'key'   => 'configuration',
        'name'  => 'saas::app.super.acl.configuration',
        'route' => 'super.configuration.index',
        'sort'  => 4,
    ], [
        'key'   => 'configuration.download',
        'name'  => 'saas::app.super.acl.download',
        'route' => 'super.configuration.download',
        'sort'  => 1,
    ],
];