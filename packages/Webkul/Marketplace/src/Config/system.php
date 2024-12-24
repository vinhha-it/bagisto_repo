<?php

return [
    [
        'key'  => 'marketplace',
        'name' => 'marketplace::app.admin.system.title',
        'info' => 'marketplace::app.admin.system.info',
        'sort' => 1,
    ], [
        'key'  => 'marketplace.settings',
        'name' => 'marketplace::app.admin.system.settings.title',
        'icon' => 'settings/settings.svg',
        'sort' => 1,
    ], [
        'key'    => 'marketplace.settings.info',
        'name'   => 'marketplace::app.admin.system.settings.module-info-title',
        'info'   => 'marketplace::app.admin.system.settings.module-info-desc',
        'sort'   => 1,
        'fields' => [
            [
                'name'  => '',
                'title' => 'marketplace::app.admin.system.settings.app-version',
                'type'  => '',
            ],
        ],
    ], [
        'key'    => 'marketplace.settings.general',
        'name'   => 'marketplace::app.admin.system.settings.general.title',
        'info'   => 'marketplace::app.admin.system.settings.general.description',
        'sort'   => 2,
        'fields' => [
            [
                'name'  => 'status',
                'title' => 'marketplace::app.admin.system.settings.general.status',
                'type'  => 'boolean',
            ], [
                'name'  => 'seller_approval_required',
                'title' => 'marketplace::app.admin.system.settings.general.seller-approval-required',
                'type'  => 'boolean',
            ], [
                'name'  => 'product_approval_required',
                'title' => 'marketplace::app.admin.system.settings.general.product-approval-required',
                'type'  => 'boolean',
            ], [
                'name'  => 'can_create_invoice',
                'title' => 'marketplace::app.admin.system.settings.general.can-create-invoice',
                'type'  => 'boolean',
            ], [
                'name'  => 'can_create_shipment',
                'title' => 'marketplace::app.admin.system.settings.general.can-create-shipment',
                'type'  => 'boolean',
            ], [
                'name'  => 'can_cancel_order',
                'title' => 'marketplace::app.admin.system.settings.general.can-cancel-order',
                'type'  => 'boolean',
            ], [
                'name'  => 'enable_minimum_order_amount',
                'title' => 'marketplace::app.admin.system.settings.general.minimum-order-amount',
                'type'  => 'boolean',
            ], [
                'name'          => 'commission_per_unit',
                'title'         => 'marketplace::app.admin.system.settings.general.commission-per-unit',
                'type'          => 'text',
                'validation'    => 'required|between:1,100',
                'channel_based' => true,
                'locale_based'  => false,
            ],
        ],
    ], [
        'key'    => 'marketplace.settings.landing_page',
        'name'   => 'marketplace::app.admin.system.settings.landing-page.title',
        'info'   => 'marketplace::app.admin.system.settings.landing-page.description',
        'sort'   => 3,
        'fields' => [
            [
                'name'          => 'banner_title',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.banner-title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'banner_description',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.banner-description',
                'type'          => 'textarea',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'banner_btn_title',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.banner-btn-title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'banner_image',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.banner-image',
                'type'          => 'image',
                'validation'    => 'mimes:jpeg,bmp,png,jpg',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'community_count',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.community-count',
                'type'          => 'number',
                'validation'    => 'numeric',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'business_hour',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.business-hour',
                'type'          => 'text',
                'validation'    => 'required|alpha_num',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'payment_duration',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.payment-duration',
                'type'          => 'number',
                'validation'    => 'required|numeric',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'serviceable_pincode',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.serviceable-pincode',
                'type'          => 'number',
                'validation'    => 'required|numeric',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'feature_title',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'feature_description',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-description',
                'type'          => 'textarea',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'feature_image',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-image',
                'type'          => 'image',
                'validation'    => 'mimes:jpeg,bmp,png,jpg',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'feature_box1_icon',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-box1-icon',
                'type'          => 'image',
                'validation'    => 'mimes:jpeg,bmp,png,jpg',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'feature_box1_title',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-box1-title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'feature_box1_desc',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-box1-desc',
                'type'          => 'textarea',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'feature_box2_icon',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-box2-icon',
                'type'          => 'image',
                'validation'    => 'mimes:jpeg,bmp,png,jpg',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'feature_box2_title',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-box2-title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'feature_box2_desc',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-box2-desc',
                'type'          => 'textarea',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'feature_box3_icon',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-box3-icon',
                'type'          => 'image',
                'validation'    => 'mimes:jpeg,bmp,png,jpg',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'feature_box3_title',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-box3-title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'feature_box3_desc',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-box3-desc',
                'type'          => 'textarea',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'feature_box4_icon',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-box4-icon',
                'type'          => 'image',
                'validation'    => 'mimes:jpeg,bmp,png,jpg',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'feature_box4_title',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-box4-title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'feature_box4_desc',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.feature-box4-desc',
                'type'          => 'textarea',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'journey_title',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'journey_description',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-description',
                'type'          => 'textarea',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'journey_step1_icon',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step1-icon',
                'type'          => 'image',
                'validation'    => 'mimes:jpeg,bmp,png,jpg',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'journey_step1_title',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step1-title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'journey_step1_desc',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step1-desc',
                'type'          => 'textarea',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'journey_step2_icon',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step2-icon',
                'type'          => 'image',
                'validation'    => 'mimes:jpeg,bmp,png,jpg',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'journey_step2_title',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step2-title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'journey_step2_desc',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step2-desc',
                'type'          => 'textarea',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'journey_step3_icon',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step3-icon',
                'type'          => 'image',
                'validation'    => 'mimes:jpeg,bmp,png,jpg',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'journey_step3_title',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step3-title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'journey_step3_desc',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step3-desc',
                'type'          => 'textarea',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'journey_step4_icon',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step4-icon',
                'type'          => 'image',
                'validation'    => 'mimes:jpeg,bmp,png,jpg',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'journey_step4_title',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step4-title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'journey_step4_desc',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step4-desc',
                'type'          => 'textarea',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'journey_step5_icon',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step5-icon',
                'type'          => 'image',
                'validation'    => 'mimes:jpeg,bmp,png,jpg',
                'channel_based' => true,
                'locale_based'  => false,
            ], [
                'name'          => 'journey_step5_title',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step5-title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'journey_step5_desc',
                'title'         => 'marketplace::app.admin.system.settings.landing-page.journey-step5-desc',
                'type'          => 'textarea',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ],
        ],
    ],
];