<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'Version : :version',
                'account-title' => 'Account',
                'logout'        => 'Logout',
                'my-account'    => 'My Account',
                'visit-shop'    => 'Visit Shop',
            ],

            'sidebar' => [
                'tenants'          => 'Tenants',
                'tenant-customers' => 'Customers',
                'tenant-products'  => 'Products',
                'tenant-orders'    => 'Orders',
                'settings'         => 'Settings',
                'agents'           => 'Agents',
                'roles'            => 'Roles',
                'locales'          => 'Locales',
                'currencies'       => 'Currencies',
                'channels'         => 'Channels',
                'exchange-rates'   => 'Exchange Rates',
                'themes'           => 'Themes',
                'cms'              => 'CMS',
                'configurations'   => 'Configure',
                'general'          => 'General',
                'send-email'       => 'Send email',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'Tenants',
            'create'         => 'Add',
            'edit'           => 'Edit',
            'delete'         => 'Delete',
            'cancel'         => 'Cancel',
            'view'           => 'View',
            'mass-delete'    => 'Mass Delete',
            'mass-update'    => 'Mass Update',
            'customers'      => 'Customers',
            'products'       => 'Products',
            'orders'         => 'Orders',
            'settings'       => 'Settings',
            'agents'         => 'Agents',
            'roles'          => 'Roles',
            'locales'        => 'Locales',
            'currencies'     => 'Currencies',
            'exchange-rates' => 'Exchange Rates',
            'channels'       => 'Channels',
            'themes'         => 'Themes',
            'send-email'     => 'Send Email',
            'cms'            => 'CMS',
            'configuration'  => 'Configuration',
            'download'       => 'Download',
        ],

        'agents' => [
            'sessions' => [
                'title'                => 'Super Admin Sign In',
                'email'                => 'Email Address',
                'password'             => 'Password',
                'btn-submit'           => 'Sign In',
                'forget-password-link' => 'Forget Password?',
                'submit-btn'           => 'Sign In',
                'login-success'        => 'Success: You have successfully logged in.',
                'login-error'          => 'Please check your credentials and try again.',
                'activate-warning'     => 'Your account is yet to be activated, please contact administrator.',
            ],

            'forget-password' => [
                'create' => [
                    'page-title'      => 'Forget Password',
                    'title'           => 'Recover Password',
                    'email'           => 'Registered Email',
                    'reset-link-sent' => 'Reset Password link sent',
                    'sign-in-link'    => 'Back to Sign In ?',
                    'email-not-exist' => 'Email Not Exists',
                    'submit-btn'      => 'Reset',
                ],
            ],

            'reset-password' => [
                'title'            => 'Reset Password',
                'back-link-title'  => 'Back to Sign In ?',
                'confirm-password' => 'Confirm Password',
                'email'            => 'Registered Email',
                'password'         => 'Password',
                'submit-btn'       => 'Reset Password',
            ],
        ],

        'tenants' => [
            'index' => [
                'title'        => 'Tenants List',
                'register-btn' => 'Register Tenant',

                'create' => [
                    'title'             => 'Create Tenant',
                    'first-name'        => 'First Name',
                    'last-name'         => 'Last Name',
                    'user-name'         => 'User Name',
                    'organization-name' => 'Organization Name',
                    'phone'             => 'Phone',
                    'email'             => 'Email',
                    'password'          => 'Password',
                    'confirm-password'  => 'Confirm Password',
                    'save-btn'          => 'Save Tenant',
                    'back-btn'          => 'Back',
                ],

                'datagrid' => [
                    'id'                  => 'Id',
                    'user-name'           => 'User Name',
                    'organization'        => 'Organization',
                    'domain'              => 'Domain',
                    'cname'               => 'Cname',
                    'status'              => 'Status',
                    'active'              => 'Active',
                    'disable'             => 'Disable',
                    'view'                => 'View Insights',
                    'edit'                => 'Modify Tenant',
                    'delete'              => 'Remove Tenant',
                    'mass-delete'         => 'Mass Delete',
                    'mass-delete-success' => 'Selected Tenant Deleted Successfully',
                ],
            ],

            'edit' => [
                'title'             => 'Edit Tenant',
                'first-name'        => 'First Name',
                'last-name'         => 'Last Name',
                'user-name'         => 'User Name',
                'cname'             => 'Cname',
                'organization-name' => 'Organization Name',
                'phone'             => 'Phone',
                'status'            => 'Status',
                'email'             => 'Email',
                'password'          => 'Password',
                'confirm-password'  => 'Confirm Password',
                'save-btn'          => 'Save Tenant',
                'back-btn'          => 'Back',
                'general'           => 'General',
                'settings'          => 'Settings',
            ],

            'view' => [
                'title'                        => 'Tenant\'s Insights',
                'heading'                      => 'Tenant - :tenant_name',
                'email-address'                => 'Email Address',
                'phone'                        => 'Phone',
                'domain-information'           => 'Domain Information',
                'mapped-domain'                => 'Mapped Domain',
                'cname-information'            => 'cName Information',
                'cname-entry'                  => 'cName Entry',
                'attribute-information'        => 'Attribute Information',
                'no-of-attributes'             => 'No. Of Attributes',
                'attribute-family-information' => 'Attribute Family Information',
                'no-of-attribute-families'     => 'No. Of Attribute Families',
                'product-information'          => 'Product Information',
                'no-of-products'               => 'No. Of Products',
                'customer-information'         => 'Customer Information',
                'no-of-customers'              => 'No. Of Customers',
                'customer-group-information'   => 'Customer Group Information',
                'no-of-customer-groups'        => 'No. Of Customer Groups',
                'category-information'         => 'Category Information',
                'no-of-categories'             => 'No. Of Categories',
                'addresses'                    => 'Address List (:count)',
                'empty-title'                  => 'Tenant Address',
            ],

            'create-success' => 'Tenant created successfully',
            'delete-success' => 'Tenant deleted successfully',
            'delete-failed'  => 'Error encountered while deleting tenant.',
            'product-copied' => 'Tenant copied successfully',
            'update-success' => 'Tenant updated successfully',

            'customers' => [
                'index' => [
                    'title' => 'Customers List',

                    'datagrid' => [
                        'id'             => 'Id',
                        'domain'         => 'Domain',
                        'customer-name'  => 'Customer Name',
                        'email'          => 'Email',
                        'customer-group' => 'Customer Group',
                        'phone'          => 'Phone',
                        'status'         => 'Status',
                        'active'         => 'Active',
                        'inactive'       => 'Inactive',
                        'is-suspended'   => 'Suspended',
                    ],
                ],
            ],

            'products' => [
                'index' => [
                    'title' => 'Products List',

                    'datagrid' => [
                        'id'               => 'Id',
                        'domain'           => 'Domain',
                        'name'             => 'Name',
                        'sku'              => 'SKU',
                        'attribute-family' => 'Attribute Family',
                        'image'            => 'Image',
                        'price'            => 'Price',
                        'qty'              => 'Quantity',
                        'status'           => 'Status',
                        'active'           => 'Active',
                        'inactive'         => 'Inactive',
                        'category'         => 'Category',
                        'type'             => 'Type',
                    ],
                ],
            ],

            'orders' => [
                'index' => [
                    'title' => 'Orders List',

                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => 'Order Id',
                        'domain'          => 'Domain',
                        'sub-total'       => 'Sub Total',
                        'grand-total'     => 'Grand Total',
                        'order-date'      => 'Order Date',
                        'channel-name'    => 'Channel Name',
                        'status'          => 'Status',
                        'processing'      => 'Processing',
                        'completed'       => 'Completed',
                        'canceled'        => 'Canceled',
                        'closed'          => 'Closed',
                        'pending'         => 'Pending',
                        'pending-payment' => 'Pending Payment',
                        'fraud'           => 'Fraud',
                        'customer'        => 'Customer',
                        'email'           => 'Email',
                        'location'        => 'Location',
                        'images'          => 'Images',
                        'pay-by'          => 'Pay By - ',
                        'pay-via'         => 'Pay Via',
                        'date'            => 'Date',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'Agents List',
                    'register-btn' => 'Create Agent',

                    'create' => [
                        'title'             => 'Create Agent',
                        'first-name'        => 'First Name',
                        'last-name'         => 'Last Name',
                        'email'             => 'Email',
                        'current-password'  => 'Current Password',
                        'password'          => 'Password',
                        'confirm-password'  => 'Confirm Password',
                        'role'              => 'Role',
                        'select'            => 'Select',
                        'status'            => 'Status',
                        'save-btn'          => 'Save Tenant',
                        'back-btn'          => 'Back',
                        'upload-image-info' => 'Upload a Profile Image (110px X 110px) in PNG or JPG Format',
                    ],

                    'edit' => [
                        'title' => 'Edit Agent',
                    ],

                    'datagrid' => [
                        'id'      => 'Id',
                        'name'    => 'Name',
                        'email'   => 'Email',
                        'role'    => 'Role',
                        'status'  => 'Status',
                        'active'  => 'Active',
                        'disable' => 'Disable',
                        'actions' => 'Actions',
                        'edit'    => 'Edit',
                        'delete'  => 'Delete',
                    ],
                ],

                'create-success'             => 'Success: Super admin agent created successfully',
                'delete-success'             => 'Tenant deleted successfully',
                'delete-failed'              => 'Error encountered while deleting tenant.',
                'cannot-change'              => 'Agent\'s :name cannot be changed',
                'product-copied'             => 'Tenant copied successfully',
                'update-success'             => 'Tenant updated successfully',
                'invalid-password'           => 'The current password you entered is incorrect',
                'last-delete-error'          => 'Warning: At least one super admin agent is required',
                'login-delete-error'         => 'Warning: You can not delete your own account.',
                'administrator-delete-error' => 'Warning: At least one super admin agent with administrator access is required',
            ],

            'roles' => [
                'index' => [
                    'title'      => 'Roles List',
                    'create-btn' => 'Create Role',

                    'datagrid' => [
                        'id'              => 'Id',
                        'name'            => 'Name',
                        'permission-type' => 'Permission Type',
                        'actions'         => 'Actions',
                        'edit'            => 'Edit',
                        'delete'          => 'Delete',
                    ],
                ],

                'create' => [
                    'access-control' => 'Access Control',
                    'all'            => 'All',
                    'back-btn'       => 'Back',
                    'custom'         => 'Custom',
                    'description'    => 'Description',
                    'general'        => 'General',
                    'name'           => 'Name',
                    'permissions'    => 'Permissions',
                    'save-btn'       => 'Save Role',
                    'title'          => 'Create Role',
                ],

                'edit' => [
                    'access-control' => 'Access Control',
                    'all'            => 'All',
                    'back-btn'       => 'Back',
                    'custom'         => 'Custom',
                    'description'    => 'Description',
                    'general'        => 'General',
                    'name'           => 'Name',
                    'permissions'    => 'Permissions',
                    'save-btn'       => 'Save Role',
                    'title'          => 'Edit Role',
                ],

                'being-used'        => 'Role is already used by another Agent',
                'last-delete-error' => 'Last Role can not be deleted',
                'create-success'    => 'Role created successfully',
                'delete-success'    => 'Role deleted successfully',
                'delete-failed'     => 'Error encountered while deleting role.',
                'update-success'    => 'Role updated successfully',
            ],

            'locales' => [
                'index' => [
                    'title'      => 'Locales List',
                    'create-btn' => 'Create Locale',

                    'create' => [
                        'title'            => 'Create Locale',
                        'code'             => 'Code',
                        'name'             => 'Name',
                        'direction'        => 'Direction',
                        'select-direction' => 'Select Direction',
                        'text-ltr'         => 'LTR',
                        'text-rtl'         => 'RTL',
                        'locale-logo'      => 'Locale Logo',
                        'logo-size'        => 'Image resolution should be like 24px X 16px',
                        'save-btn'         => 'Save Locale',
                    ],

                    'edit' => [
                        'title'     => 'Edit Locale',
                        'code'      => 'Code',
                        'name'      => 'Name',
                        'direction' => 'Direction',
                    ],

                    'datagrid' => [
                        'id'        => 'Id',
                        'code'      => 'Code',
                        'name'      => 'Name',
                        'direction' => 'Direction',
                        'text-ltr'  => 'LTR',
                        'text-rtl'  => 'RTL',
                        'actions'   => 'Actions',
                        'edit'      => 'Edit',
                        'delete'    => 'Delete',
                    ],
                ],

                'being-used'        => ':locale_name locale is used as default locale in channel',
                'create-success'    => 'Locale created successfully.',
                'update-success'    => 'Locale updated successfully.',
                'delete-success'    => 'Locale deleted successfully.',
                'delete-failed'     => 'Error encountered while deleting locale.',
                'last-delete-error' => 'At least one super admin locale is required.',
            ],

            'currencies' => [
                'index' => [
                    'title'      => 'Currencies List',
                    'create-btn' => 'Create Currency',

                    'create' => [
                        'title'    => 'Create Currency',
                        'code'     => 'Code',
                        'name'     => 'Name',
                        'symbol'   => 'Symbol',
                        'decimal'  => 'Decimal',
                        'save-btn' => 'Save Currency',
                    ],

                    'edit' => [
                        'title'    => 'Edit Currency',
                        'code'     => 'Code',
                        'name'     => 'Name',
                        'symbol'   => 'Symbol',
                        'decimal'  => 'Decimal',
                        'save-btn' => 'Save Currency',
                    ],

                    'datagrid' => [
                        'id'      => 'Id',
                        'code'    => 'Code',
                        'name'    => 'Name',
                        'actions' => 'Actions',
                        'edit'    => 'Edit',
                        'delete'  => 'Delete',
                    ],
                ],
                
                'create-success'      => 'Currency created successfully.',
                'update-success'      => 'Currency updated successfully.',
                'delete-success'      => 'Currency deleted successfully.',
                'delete-failed'       => 'Error encountered while deleting currency.',
                'last-delete-error'   => 'At least one super admin currency is required.',
                'mass-delete-success' => 'Selected Currencies Deleted Successfully',
            ],
            
            'exchange-rates' => [
                'index' => [
                    'title'        => 'Exchange Rates',
                    'create-btn'   => 'Create Exchange Rate',
                    'update-rates' => 'Update Rates',

                    'create' => [
                        'title'                  => 'Create Exchange Rate',
                        'source-currency'        => 'Source Currency',
                        'target-currency'        => 'Target Currency',
                        'select-target-currency' => 'Select Target Currency',
                        'rate'                   => 'Rate',
                        'save-btn'               => 'Save Exchange Rate',
                    ],

                    'edit' => [
                        'title'           => 'Edit Exchange Rate',
                        'source-currency' => 'Source Currency',
                        'target-currency' => 'Target Currency',
                        'rate'            => 'Rate',
                        'save-btn'        => 'Save Exchange Rate',
                    ],

                    'datagrid' => [
                        'id'            => 'Id',
                        'currency-name' => 'Currency Name',
                        'exchange-rate' => 'Exchange Rate',
                        'actions'       => 'Actions',
                        'edit'          => 'Edit',
                        'delete'        => 'Delete',
                    ],
                ],
                
                'create-success' => 'Exchange Rate created successfully.',
                'update-success' => 'Exchange Rate updated successfully.',
                'delete-success' => 'Exchange Rate deleted successfully.',
                'delete-failed'  => 'Error encountered while deleting exchange rate.',
            ],
            
            'channels' => [
                'index' => [
                    'title' => 'Channels',

                    'datagrid' => [
                        'id'       => 'Id',
                        'code'     => 'Code',
                        'name'     => 'Name',
                        'hostname' => 'Host Name',
                        'actions'  => 'Actions',
                        'edit'     => 'Edit',
                        'delete'   => 'Delete',
                    ],
                ],

                'edit' => [
                    'title'                  => 'Edit Channel',
                    'back-btn'               => 'Back',
                    'save-btn'               => 'Save Channel',
                    'general'                => 'General',
                    'code'                   => 'Code',
                    'name'                   => 'Name',
                    'description'            => 'Description',
                    'hostname'               => 'Hostname',
                    'hostname-placeholder'   => 'https://www.example.com (Don\'t add slash in the end.)',
                    'design'                 => 'Design',
                    'theme'                  => 'Theme',
                    'logo'                   => 'Logo',
                    'logo-size'              => 'Image resolution should be like 192px X 50px',
                    'favicon'                => 'Favicon',
                    'favicon-size'           => 'Image resolution should be like 16px X 16px',
                    'seo'                    => 'Home page SEO',
                    'seo-title'              => 'Meta title',
                    'seo-description'        => 'Meta description',
                    'seo-keywords'           => 'Meta keywords',
                    'currencies-and-locales' => 'Currencies and Locales',
                    'locales'                => 'Locales',
                    'default-locale'         => 'Default Locale',
                    'currencies'             => 'Currencies',
                    'default-currency'       => 'Default Currency',
                    'last-delete-error'      => 'At least one Channel is required.',
                    'settings'               => 'Settings',
                    'status'                 => 'Status',
                    'update-success'         => 'Update Channel Successfully',
                ],
                
                'update-success' => 'Channel updated successfully.',
                'delete-success' => 'Channel deleted successfully.',
                'delete-failed'  => 'Error encountered while deleting channel.',
            ],

            'themes' => [
                'index' => [
                    'create-btn' => 'Create Theme',
                    'title'      => 'Themes',
    
                    'datagrid' => [
                        'active'       => 'Active',
                        'channel_name' => 'Channel Name',
                        'delete'       => 'Delete',
                        'inactive'     => 'Inactive',
                        'id'           => 'Id',
                        'name'         => 'Name',
                        'status'       => 'Status',
                        'sort-order'   => 'Sort Order',
                        'type'         => 'Type',
                        'view'         => 'View',
                    ],
                ],
    
                'create' => [
                    'name'       => 'Name',
                    'save-btn'   => 'Save Theme',
                    'sort-order' => 'Sort Order',
                    'title'      => 'Create Theme',
    
                    'type' => [
                        'footer-links'     => 'Footer Links',
                        'image-carousel'   => 'Slider Carousel',
                        'product-carousel' => 'Product Carousel',
                        'static-content'   => 'Static Content',
                        'services-content' => 'Services Content',
                        'title'            => 'Type',
                    ],
                ],
    
                'edit' => [
                    'add-image-btn'                 => 'Add Image',
                    'add-filter-btn'                => 'Add Filter',
                    'add-footer-link-btn'           => 'Add Footer Link',
                    'add-link'                      => 'Add Link',
                    'asc'                           => 'Asc',
                    'back'                          => 'Back',
                    'category-carousel-description' => 'Display dynamic categories attractively using a responsive category carousel.',
                    'category-carousel'             => 'Category Carousel',
                    'create-filter'                 => 'Create Filter',
                    'css'                           => 'CSS',
                    'column'                        => 'Column',
                    'channels'                      => 'Channels',
                    'desc'                          => 'Desc',
                    'delete'                        => 'Delete',
                    'edit'                          => 'Edit',
                    'footer-title'                  => 'Title',
                    'footer-link'                   => 'Footer Links',
                    'footer-link-form-title'        => 'Footer Link',
                    'filter-title'                  => 'Title',
                    'filters'                       => 'Filters',
                    'footer-link-description'       => 'Navigate via footer links for seamless website exploration and information.',
                    'general'                       => 'General',
                    'html'                          => 'HTML',
                    'image'                         => 'Image',
                    'image-size'                    => 'Image resolution should be (1920px X 700px)',
                    'image-title'                   => 'Image Title',
                    'image-upload-message'          => 'Only images (.jpeg, .jpg, .png, .webp, ..) are allowed.',
                    'key'                           => 'Key: :key',
                    'key-input'                     => 'Key',
                    'link'                          => 'Link',
                    'limit'                         => 'Limit',
                    'name'                          => 'Name',
                    'product-carousel'              => 'Product Carousel',
                    'product-carousel-description'  => 'Showcase products elegantly with a dynamic and responsive product carousel.',
                    'path'                          => 'Path',
                    'preview'                       => 'Preview',
                    'slider'                        => 'Slider',
                    'static-content-description'    => 'Improve engagement with concise, informative static content for your audience.',
                    'static-content'                => 'Static Content',
                    'slider-description'            => 'Slider related theme customization.',
                    'slider-required'               => 'Slider field is Required.',
                    'slider-add-btn'                => 'Add Slider',
                    'save-btn'                      => 'Save',
                    'sort'                          => 'Sort',
                    'sort-order'                    => 'Sort Order',
                    'status'                        => 'Status',
                    'slider-image'                  => 'Slider Image',
                    'select'                        => 'Select',
                    'title'                         => 'Edit Theme',
                    'update-slider'                 => 'Update Slider',
                    'url'                           => 'URL',
                    'value-input'                   => 'Value',
                    'value'                         => 'Value: :value',

                    'services-content' => [
                        'add-btn'            => 'Add Services',
                        'channels'           => 'Channels',
                        'delete'             => 'Delete',
                        'description'        => 'Description',
                        'general'            => 'General',
                        'name'               => 'Name',
                        'save-btn'           => 'Save',
                        'service-icon'       => 'Service Icon',
                        'service-icon-class' => 'Service Icon Class',
                        'service-info'       => 'Service related theme customization.',
                        'services'           => 'Services',
                        'sort-order'         => 'Sort Order',
                        'status'             => 'Status',
                        'title'              => 'Title',
                        'update-service'     => 'Update Services',
                    ],
                ],
    
                'create-success' => 'Theme created successfully',
                'delete-success' => 'Theme deleted successfully',
                'update-success' => 'Theme updated successfully',
                'delete-failed'  => 'Error encountered while deleting theme content.',
            ],

            'email' => [
                'create' => [
                    'send-btn'                  => 'Send Email',
                    'back-btn'                  => 'Back',
                    'title'                     => 'Send Email',
                    'general'                   => 'General',
                    'body'                      => 'Body',
                    'subject'                   => 'Subject',
                    'dear'                      => 'Dear :agent_name',
                    'agent-registration'        => 'Saas Agent Registered Successfully',
                    'summary'                   => 'Your account has been created. Your account details are below: ',
                    'saas-url'                  => 'Domain',
                    'email'                     => 'Email',
                    'password'                  => 'Password',
                    'sign-in'                   => 'SignIn',
                    'thanks'                    => 'Thanks!',
                    'send-email-to-all-tenants' => 'Send email to all tenants',
                ],
                
                'send-success' => 'Email sent successfully.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'CMS Page List',
                'create-btn' => 'Create Page',

                'datagrid' => [
                    'id'                  => 'Id',
                    'page-title'          => 'Page Title',
                    'url-key'             => 'URL Key',
                    'status'              => 'Status',
                    'active'              => 'Active',
                    'disable'             => 'Disable',
                    'edit'                => 'Modify Page',
                    'delete'              => 'Remove Page',
                    'mass-delete'         => 'Mass Delete',
                    'mass-delete-success' => 'Selected Cms Page(s) Deleted Successfully',
                ],
            ],

            'create' => [
                'title'            => 'Create Cms Page',
                'first-name'       => 'First Name',
                'general'          => 'General',
                'page-title'       => 'Title',
                'channels'         => 'Channels',
                'content'          => 'Content',
                'meta-keywords'    => 'Meta Keywords',
                'meta-description' => 'Meta Description',
                'meta-title'       => 'Meta Title',
                'seo'              => 'SEO',
                'url-key'          => 'URL Key',
                'description'      => 'Description',
                'save-btn'         => 'Save Cms Page',
                'back-btn'         => 'Back',
            ],

            'edit' => [
                'title'            => 'Edit Page',
                'preview-btn'      => 'Preview Page',
                'save-btn'         => 'Save Page',
                'general'          => 'General',
                'page-title'       => 'Page Title',
                'back-btn'         => 'Back',
                'channels'         => 'Channels',
                'content'          => 'Content',
                'seo'              => 'SEO',
                'meta-keywords'    => 'Meta Keywords',
                'meta-description' => 'Meta Description',
                'meta-title'       => 'Meta Title',
                'url-key'          => 'URL Key',
                'description'      => 'Description',
            ],
    
            'create-success' => 'CMS created successfully.',
            'delete-success' => 'CMS deleted successfully.',
            'update-success' => 'CMS updated successfully.',
            'no-resource'    => 'Resource not exists.',
        ],

        'configuration' => [
            'index' => [
                'delete'                       => 'Delete',
                'enable-at-least-one-shipping' => 'Enable at least one shipping method.',
                'enable-at-least-one-payment'  => 'Enable at least one payment method.',
                'no-result-found'              => 'No result found',
                'save-btn'                     => 'Save Configuration',
                'save-message'                 => 'Configuration saved successfully',
                'search'                       => 'Search',
                'title'                        => 'Configuration',

                'general' => [
                    'info'  => 'Manage layout and email details',
                    'title' => 'General',

                    'design' => [
                        'info'  => 'Set logo and favicon icon.',
                        'title' => 'Design',

                        'super' => [
                            'info'          => 'Super admin logo is the distinctive image or emblem representing the administration interface of a system or website, often customizable.',
                            'admin-logo'    => 'Admin Logo',
                            'logo-image'    => 'Logo Image',
                            'favicon-image' => 'Favicon Image',
                        ],
                    ],

                    'agent' => [
                        'info'  => 'Set email address for super admin.',
                        'title' => 'Super Agent',

                        'super' => [
                            'info'          => 'Set email address for the super admin to get the email notifications',
                            'email-address' => 'Email Address',
                        ],

                        'social-connect' => [
                            'title'    => 'Social Connect',
                            'info'     => 'Social media platforms provide opportunities for direct interaction with your audience through comments, likes, and shares, fostering engagement and building a community around your brand.',
                            'facebook' => 'Facebook',
                            'twitter'  => 'Twitter',
                            'linkedin' => 'Linkedin',
                        ],
                    ],

                    'content' => [
                        'info'   => 'Set header and footer information for the tenant register layout.',
                        'title'  => 'Content',

                        'footer' => [
                            'info'           => 'Set the footer content',
                            'title'          => 'Footer',
                            'footer-content' => 'Footer Text',
                            'footer-toggle'  => 'Toggle footer',
                        ],
                    ],
                ],

                'sales' => [
                    'info'  => 'Manage sales, shipping, and payment methods details. </br> Info: These settings will only work with the Saas Shippings & Payments Addons only. <a href="https://prnt.sc/LJ0SKHLMfbfy" target="_blank" class="text-blue-600">Example</a>',
                    'title' => 'Sales',

                    'shipping-methods' => [
                        'info'  => 'Set shipping methods information',
                        'title' => 'Shipping Methods',
                    ],

                    'payment-methods' => [
                        'info'  => 'Set payment methods information',
                        'title' => 'Payment Methods',
                    ],
                ],
            ],

            'enable-at-least-one-shipping' => 'Enable at least one shipping method.',
            'enable-at-least-one-payment'  => 'Enable at least one payment method.',
            'save-message'                 => 'Success: Super admin configuration saved successfully.',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'Register As Tenant',
            ],
    
            'footer' => [
                'footer-text'     => '© Copyright 2010 - 2023, Webkul Software (Registered in India). All rights reserved.',
                'connect-with-us' => 'Connect With Us',
                'text-locale'     => 'Locale',
                'text-currency'   => 'Currency',
            ],
        ],

        'registration' => [
            'merchant-auth'       => 'Merchant Registration',
            'step-1'              => 'Step 1',
            'auth-cred'           => 'Authentication Credentials',
            'email'               => 'Email',
            'phone'               => 'Phone',
            'username'            => 'Username',
            'password'            => 'Password',
            'cpassword'           => 'Confirm Password',
            'continue'            => 'Continue',
            'step-2'              => 'Step 2',
            'personal'            => 'Personal Details',
            'first-name'          => 'First Name',
            'last-name'           => 'Last Name',
            'step-3'              => 'Step 3',
            'org-details'         => 'Organization Details',
            'org-name'            => 'Organization Name',
            'company-activated'   => 'Success: Company successfully activated.',
            'company-deactivated' => 'Success: Company successfully deactivated.',
            'company-updated'     => 'Success: Company Updated Successfully.',
            'something-wrong'     => 'Warning: Something went wrong.',
            'store-created'       => 'Success: Store Created Successfully.',
            'something-wrong-1'   => 'Warning: Something went wrong, please try again later.',
            'content'             => 'Become a merchant and create your own store hassle free without worrying about installing and managing the server. You just need to signup, upload product data and get your e-commerce store. The laravel multi company SaaS module offers easy customization abilities this means that merchant can easily add any extra features and functionalities to their store or can easily enhance it.',
            
            'right-panel' => [
                'heading'    => 'How to setup Merchant Account',
                'para'       => 'Its easy to setup the module in just few steps',
                'step-one'   => 'Enter Authentication credentials like email, password and confirm password',
                'step-two'   => 'Enter Personal Details like first name, last name and phone number.',
                'step-three' => 'Enter Organisation Details like user name, organisation name',
            ]
        ],

        'custom-errors' => [
            'channel-creating'                  => 'Warning: Creating more than one channel is not allowed',
            'channel-hostname'                  => 'Warning: Kindly contact admin to change your hostname',
            'same-domain'                       => 'Warning: Cannot keep same sub-domain as main domain',
            'block-message'                     => 'Warning: If you want to unblock this tenant, free feel to contact us we are available 24x7 to solve your issue.',
            'blocked'                           => 'has been blocked',
            'illegal-action'                    => 'Warning: You have performed an illegal action',
            'domain-message'                    => 'Warning: Oops! We could not help at <b>:domain</b>',
            'domain-desc'                       => 'If you wish to create an account with <b>:domain</b>
            as an organization, feel free to create an account and get started.',
            'illegal-message'                   => 'Warning: The action you performed is disabled by site admin, kindly mail your site administrator for more details on this.',
            'locale-creation'                   => 'Warning: Creating locale other than English is not allowed.',
            'locale-delete'                     => 'Warning: Cannot delete the Locale.',
            'cannot-delete-default'             => 'Warning: Cannot delete the default channel.',
            'tenant-blocked'                    => 'Tenant Blocked',
            'domain-not-found'                  => 'Warning: Domain not found.',
            'company-blocked-by-administrator'  => 'This tenant is blocked',
            'not-allowed-to-visit-this-section' => 'Warning: You are not allowed to use this section.',
            'auth'                              => 'Warning: Authentication Error!',
        ],

        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'New Company Registered',
                'first-name' => 'First Name',
                'last-name'  => 'Last Name',
                'email'      => 'Email',
                'name'       => 'Name',
                'username'   => 'Username',
                'domain'     => 'Domain',
            ],

            'new-company-register-tenant' => [
                'subject'    => 'New Company Registered Successfully',
                'dear'       => 'Dear :tenant_name',
                'greeting'   => 'Welcome and thank you for registering with us!',
                'summary'    => 'Your account has now been created successfully and you can login using your email address and password credentials. Upon logging in, you will be able to access other services including products, sales, customers, reviews and promotion.',
                'thanks'     => 'Thanks!',
                'visit-shop' => 'Visit Shop',
            ],
        ],
    ],

    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'Edit Company Detail',
            'first-name'     => 'First Name',
            'last-name'      => 'Last Name',
            'email'          => 'Email',
            'skype'          => 'Skype',
            'cname'          => 'cName',
            'phone'          => 'Phone',
            'general'        => 'General',
            'back-btn'       => 'Back',
            'save-btn'       => 'Save Detail',
            'update-success' => 'Success: :resource updated successfully.',
            'update-failed'  => 'Warning: Cannot update :resource due to unknown reasons.',
        ],

        'tenant-address' => [
            'index' => [
                'title'      => 'Company Address List',
                'create-btn' => 'Add Address',

                'datagrid' => [
                    'id'          => 'Id',
                    'address1'    => 'Address 1',
                    'address2'    => 'Address 2',
                    'city'        => 'City',
                    'state'       => 'State',
                    'country'     => 'Country',
                    'postcode'    => 'Postcode',
                    'phone'       => 'Phone',
                    'edit'        => 'Edit',
                    'delete'      => 'Delete',
                    'mass-delete' => 'Mass Delete',
                ],
            ],

            'create' => [
                'title'     => 'Create Company Address',
                'general'   => 'General',
                'address1'  => 'Address1',
                'address2'  => 'Address2',
                'country'   => 'Country',
                'state'     => 'State',
                'city'      => 'City',
                'post-code' => 'PostCode',
                'phone'     => 'Phone',
                'back-btn'  => 'Back',
                'save-btn'  => 'Save Address',
            ],

            'edit' => [
                'title'     => 'Edit Company Address',
                'general'   => 'General',
                'address1'  => 'Address1',
                'address2'  => 'Address2',
                'country'   => 'Country',
                'state'     => 'State',
                'city'      => 'City',
                'post-code' => 'PostCode',
                'phone'     => 'Phone',
                'back-btn'  => 'Back',
                'save-btn'  => 'Save Address',
            ],

            'create-success'      => 'Success: Company address is created successfully.',
            'update-success'      => 'Success: Company address is updated successfully.',
            'delete-success'      => 'Success: :resource deleted successfully.',
            'delete-failed'       => 'Warning: Cannot delete :resource due to unknown reasons.',
            'mass-delete-success' => 'Success: Selected address deleted successfully.',
        ],

        'system' => [
            'social-login'           => 'Social Login',
            'facebook'               => 'Facebook Settings',
            'facebook-client-id'     => 'Facebook Client ID',
            'facebook-client-secret' => 'Facebook Client Secret',
            'facebook-callback-url'  => 'Facebook Callback URL',
            'twitter'                => 'Twitter Settings',
            'twitter-client-id'      => 'Twitter Client ID',
            'twitter-client-secret'  => 'Twitter Client Secret',
            'twitter-callback-url'   => 'Twitter Callback URL',
            'google'                 => 'Google Settings',
            'google-client-id'       => 'Google Client ID',
            'google-client-secret'   => 'Google Client Secret',
            'google-callback-url'    => 'Google Callback URL',
            'linkedin'               => 'LinkedIn Settings',
            'linkedin-client-id'     => 'LinkedIn Client ID',
            'linkedin-client-secret' => 'LinkedIn Client Secret',
            'linkedin-callback-url'  => 'LinkedIn Callback URL',
            'github'                 => 'GitHub Settings',
            'github-client-id'       => 'GitHub Client ID',
            'github-client-secret'   => 'GitHub Client Secret',
            'github-callback-url'    => 'GitHub Callback URL',
            'email-credentials'      => 'Email Credentials',
            'mail-driver'            => 'Mail driver',
            'mail-host'              => 'Mail host',
            'mail-port'              => 'Mail port',
            'mail-username'          => 'Mail username',
            'mail-password'          => 'Mail password',
            'mail-encryption'        => 'Mail encryption',
        ],
        
        'tenant' => [
            'id'              => 'ID',
            'first-name'      => 'First Name',
            'last-name'       => 'Last Name',
            'email'           => 'Email',
            'skype'           => 'Skype',
            'c-name'          => 'CName',
            'add-address'     => 'Add Address',
            'country'         => 'Country',
            'city'            => 'City',
            'address1'        => 'Address 1',
            'address2'        => 'Address 2',
            'address'         => 'Address List',
            'company'         => 'Tenant',
            'profile'         => 'Profile',
            'update'          => 'Update',
            'address-details' => 'Address Details',
            'create-failed'   => 'Warning: Cannot create :attribute due to unknown reasons.',
            'update-success'  => 'Success: :resource updated successfully.',
            'update-failed'   => 'Warning: Cannot update :resource due to unknown reasons.',

            'company-address' => [
                'add-address-title'    => 'New Address',
                'update-address-title' => 'Update Address',
                'save-btn-title'       => 'Save Address',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'An order :order_id has been placed by :placed_by on :created_at.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'Oops! The page you are looking for is on vacation. It seems we could not find what you were searching for.',
            'title'       => '404 Page Not Found',
        ],

        '401' => [
            'description' => 'Oops! Looks like you are not allowed to access this page. It seems you are missing the necessary credentials.',
            'title'       => '401 Unauthorized',
        ],

        '403' => [
            'description' => 'Oops! This page is off-limits. It appears you do not have the required permissions to view this content.',
            'title'       => '403 Forbidden',
        ],

        '500' => [
            'description' => 'Oops! Something went wrong. It seems we are having trouble loading the page you are looking for.',
            'title'       => '500 Internal Server Error',
        ],

        '503' => [
            'description' => 'Oops! Looks like we are temporarily down for maintenance. Please check back in a bit.',
            'title'       => '503 Service Unavailable',
        ],
    ],
];
