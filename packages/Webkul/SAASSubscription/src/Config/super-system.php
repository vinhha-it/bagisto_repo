<?php

return [
    [
        'key'  => 'subscription',
        'name' => 'saas_subscription::app.super.configuration.index.title',
        'info' => 'saas_subscription::app.super.configuration.index.info',
        'sort' => 2,
    ], [
        'key'  => 'subscription.payment',
        'name' => 'saas_subscription::app.super.configuration.index.payment.title',
        'info' => 'saas_subscription::app.super.configuration.index.payment.info',
        'icon' => 'settings/payment-method.svg',
        'sort' => 1,
    ], [
        'key'    => 'subscription.payment.trail_plan',
        'name'   => 'saas_subscription::app.super.configuration.index.payment.trail-plan.title',
        'info'   => 'saas_subscription::app.super.configuration.index.payment.trail-plan.info',
        'sort'   => 1,
        'fields' => [
            [
                'name'          => 'allow_trial',
                'title'         => 'saas_subscription::app.super.configuration.index.payment.trail-plan.status',
                'type'          => 'boolean',
                'channel_based' => true,
            ], [
                'name'          => 'trial_days',
                'title'         => 'saas_subscription::app.super.configuration.index.payment.trail-plan.days',
                'type'          => 'text',
                'validation'    => 'numeric|required',
                'channel_based' => true,
            ], [
                'name'          => 'trial_plan',
                'title'         => 'saas_subscription::app.super.configuration.index.payment.trail-plan.plan-list',
                'type'          => 'select',
                'options'       => 'Webkul\SAASSubscription\Repositories\PlanRepository@getPlans',
                'channel_based' => true,
            ],
        ],
    ], [
        'key'    => 'subscription.payment.paypal',
        'name'   => 'saas_subscription::app.super.configuration.index.payment.paypal.title',
        'info'   => 'saas_subscription::app.super.configuration.index.payment.paypal.info',
        'sort'   => 2,
        'fields' => [
            [
                'name'          => 'sandbox_mode',
                'title'         => 'saas_subscription::app.super.configuration.index.payment.paypal.sandbox-mode',
                'type'          => 'boolean',
                'channel_based' => true,
            ], [
                'name'          => 'merchant_paypal_id',
                'title'         => 'saas_subscription::app.super.configuration.index.payment.paypal.merchant-paypal-id',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
            ], [
                'name'          => 'user_name',
                'title'         => 'saas_subscription::app.super.configuration.index.payment.paypal.user-name',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
            ], [
                'name'          => 'password',
                'title'         => 'saas_subscription::app.super.configuration.index.payment.paypal.password',
                'type'          => 'password',
                'validation'    => 'required',
                'channel_based' => true,
            ], [
                'name'          => 'signature',
                'title'         => 'saas_subscription::app.super.configuration.index.payment.paypal.signature',
                'type'          => 'password',
                'validation'    => 'required',
                'channel_based' => true,
            ],
        ],
    ], [
        'key'    => 'subscription.payment.module',
        'name'   => 'saas_subscription::app.super.configuration.index.payment.module-assignment.title',
        'info'   => 'saas_subscription::app.super.configuration.index.payment.module-assignment.info',
        'sort'   => 3,
        'fields' => [
            [
                'name'          => 'status',
                'title'         => 'saas_subscription::app.super.configuration.index.payment.module-assignment.status',
                'type'          => 'boolean',
                'channel_based' => true,
            ],
        ],
    ],
];
