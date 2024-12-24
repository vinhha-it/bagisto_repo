<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Company Theme Configuration
    |--------------------------------------------------------------------------
    |
    | All the configurations are related to the Company themes.
    |
    */

    'company-default' => 'default',

    'company' => [
        'default' => [
            'name'        => 'Default',
            'assets_path' => 'public/vendor/webkul/company',
            'views_path'  => 'resources/company-themes/default/views',

            'vite'        => [
                'hot_file'                 => 'company-default-vite.hot',
                'build_directory'          => 'vendor/webkul/company/build',
                'package_assets_directory' => 'src/Resources/assets',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Super Theme Configuration
    |--------------------------------------------------------------------------
    |
    | All the configurations are related to the Super themes.
    |
    */

    'super-default' => 'default',

    'super' => [
        'default' => [
            'name'        => 'Default',
            'assets_path' => 'public/themes/admin/default',
            'views_path'  => 'resources/admin-themes/default/views',

            'vite'        => [
                'hot_file'                 => 'admin-default-vite.hot',
                'build_directory'          => 'themes/admin/default/build',
                'package_assets_directory' => 'src/Resources/assets',
            ],
        ],
    ],
];