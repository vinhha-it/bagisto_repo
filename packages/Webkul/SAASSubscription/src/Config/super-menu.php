<?php

return [
    [
        'key'   => 'subscriptions',
        'name'  => 'saas_subscription::app.super.components.layouts.sidebar.subscription',
        'route' => 'super.subscriptions.plans.index',
        'sort'  => 4,
        'icon'  => 'icon-settings',
    ], [
        'key'   => 'subscriptions.plans',
        'name'  => 'saas_subscription::app.super.components.layouts.sidebar.plans',
        'route' => 'super.subscriptions.plans.index',
        'sort'  => 1,
        'icon'  => '',
    ], [
        'key'   => 'subscriptions.recurring_profiles',
        'name'  => 'saas_subscription::app.super.components.layouts.sidebar.purchased-plans',
        'route' => 'super.subscriptions.recurring_profiles.index',
        'sort'  => 2,
        'icon'  => '',
    ], [
        'key'   => 'subscriptions.invoices',
        'name'  => 'saas_subscription::app.super.components.layouts.sidebar.invoices',
        'route' => 'super.subscriptions.invoices.index',
        'sort'  => 3,
        'icon'  => '',
    ],
];
