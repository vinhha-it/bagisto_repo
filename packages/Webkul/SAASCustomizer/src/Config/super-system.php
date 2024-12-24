<?php

return [
    [
        'key'  => 'general',
        'name' => 'saas::app.super.configuration.index.general.title',
        'info' => 'saas::app.super.configuration.index.general.info',
        'sort' => 1,
    ], [
        'key'  => 'general.design',
        'name' => 'saas::app.super.configuration.index.general.design.title',
        'info' => 'saas::app.super.configuration.index.general.design.info',
        'icon' => 'settings/theme.svg',
        'sort' => 1,
    ], [
        'key'  => 'general.design.super',
        'name' => 'saas::app.super.configuration.index.general.design.super.admin-logo',
        'info' => 'saas::app.super.configuration.index.general.design.super.info',
        'sort' => 1,
        'fields' => [
            [
                'name'          => 'logo_image',
                'title'         => 'saas::app.super.configuration.index.general.design.super.logo-image',
                'type'          => 'image',
                'channel_based' => true,
                'validation'    => 'mimes:jpeg,bmp,png,jpg',
            ], [
                'name'          => 'favicon_image',
                'title'         => 'saas::app.super.configuration.index.general.design.super.favicon-image',
                'type'          => 'image',
                'channel_based' => true,
                'validation'    => 'mimes:jpeg,bmp,png,jpg',
            ],
        ],
    ], [
        'key'  => 'general.agent',
        'name' => 'saas::app.super.configuration.index.general.agent.title',
        'info' => 'saas::app.super.configuration.index.general.agent.info',
        'icon' => 'customers.svg',
        'sort' => 1,
    ], [
        'key'  => 'general.agent.super',
        'name' => 'saas::app.super.configuration.index.general.agent.super.email-address',
        'info' => 'saas::app.super.configuration.index.general.agent.super.info',
        'sort' => 1,
        'fields' => [
            [
                'name'          => 'email',
                'title'         => 'saas::app.super.configuration.index.general.agent.super.email-address',
                'type'          => 'text',
                'channel_based' => true,
                'validation'    => 'required|email',
            ],
        ],
    ], [
        'key'  => 'general.agent.social_connect',
        'name' => 'saas::app.super.configuration.index.general.agent.social-connect.title',
        'info' => 'saas::app.super.configuration.index.general.agent.social-connect.info',
        'sort' => 1,
        'fields' => [
            [
                'name'          => 'facebook',
                'title'         => 'saas::app.super.configuration.index.general.agent.social-connect.facebook',
                'type'          => 'text',
                'channel_based' => true,
            ], [
                'name'          => 'twitter',
                'title'         => 'saas::app.super.configuration.index.general.agent.social-connect.twitter',
                'type'          => 'text',
                'channel_based' => true,
            ], [
                'name'          => 'linkedin',
                'title'         => 'saas::app.super.configuration.index.general.agent.social-connect.linkedin',
                'type'          => 'text',
                'channel_based' => true,
            ],
        ],
    ], [
        'key'  => 'general.content',
        'name' => 'saas::app.super.configuration.index.general.content.title',
        'info' => 'saas::app.super.configuration.index.general.content.info',
        'icon' => 'settings/store.svg',
        'sort' => 2,
    ], [
        'key'  => 'general.content.footer',
        'name' => 'saas::app.super.configuration.index.general.content.footer.title',
        'info' => 'saas::app.super.configuration.index.general.content.footer.info',
        'sort' => 2,
        'fields' => [
            [
                'name'          => 'footer_content',
                'title'         => 'saas::app.super.configuration.index.general.content.footer.footer-content',
                'type'          => 'text',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'  => 'footer_toggle',
                'title' => 'saas::app.super.configuration.index.general.content.footer.footer-toggle',
                'type'  => 'boolean',
                'options' => [
                    [
                        'title' => 'True',
                        'value' => 1,
                    ], [
                        'title' => 'False',
                        'value' => 0,
                    ],
                ],
                'locale_based'  => true,
                'channel_based' => true,
            ],
        ],
    ], [
        'key'  => 'sales',
        'name' => 'saas::app.super.configuration.index.sales.title',
        'info' => 'saas::app.super.configuration.index.sales.info',
        'sort' => 2,
    ], [
        'key'  => 'sales.carriers',
        'name' => 'saas::app.super.configuration.index.sales.shipping-methods.title',
        'info' => 'saas::app.super.configuration.index.sales.shipping-methods.info',
        'icon' => 'settings/shipping.svg',
        'sort' => 1,
    ], [
        'key'  => 'sales.paymentmethods',
        'name' => 'saas::app.super.configuration.index.sales.payment-methods.title',
        'info' => 'saas::app.super.configuration.index.sales.payment-methods.info',
        'icon' => 'settings/payment-method.svg',
        'sort' => 2,
    ],
];