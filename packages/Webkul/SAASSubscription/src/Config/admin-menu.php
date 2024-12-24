<?php

return [
    [
        'key'        => 'company.subscription',
        'name'       => 'saas_subscription::app.admin.layouts.subscription',
        'route'      => 'admin.subscription.plan.overview',
        'sort'       => 2,
        'icon' => '',
    ], [
        'key'        => 'company.subscription.overview',
        'name'       => 'saas_subscription::app.admin.layouts.overview',
        'route'      => 'admin.subscription.plan.overview',
        'sort'       => 1,
        'icon' => '',
    ], [
        'key'        => 'company.subscription.plans',
        'name'       => 'saas_subscription::app.admin.layouts.plans',
        'route'      => 'admin.subscription.plan.index',
        'sort'       => 2,
        'icon' => '',
    ], [
        'key'        => 'company.subscription.invoices',
        'name'       => 'saas_subscription::app.admin.layouts.invoices',
        'route'      => 'admin.subscription.invoice.index',
        'sort'       => 3,
        'icon' => '',
    ],  [
        'key'        => 'company.plan_history',
        'name'       => 'saas_subscription::app.admin.layouts.history',
        'route'      => 'admin.subscription.plan.history.index',
        'sort'       => 3,
        'icon' => '',
    ],
];
