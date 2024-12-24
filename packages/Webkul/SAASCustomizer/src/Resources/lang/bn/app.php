<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'সংস্করণ : :version',
                'account-title' => 'অ্যাকাউন্ট',
                'logout'        => 'লগ আউট',
                'my-account'    => 'আমার অ্যাকাউন্ট',
                'visit-shop'    => 'দোকানে যান',
            ],
    
            'sidebar' => [
                'tenants'          => 'টেন্যান্টস',
                'tenant-customers' => 'গ্রাহকবিশেষ',
                'tenant-products'  => 'পণ্যসমূহ',
                'tenant-orders'    => 'অর্ডারসমূহ',
                'settings'         => 'সেটিংস',
                'agents'           => 'এজেন্টস',
                'roles'            => 'রোলস',
                'locales'          => 'লোকেলস',
                'currencies'       => 'মুদ্রা',
                'channels'         => 'চ্যানেলস',
                'exchange-rates'   => 'বিনিময় হার',
                'themes'           => 'থিমস',
                'cms'              => 'সিএমএস',
                'configurations'   => 'কনফিগারেশনস',
                'general'          => 'জেনারেল',
                'send-email'       => 'ইমেইল পাঠান',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'প্রতিষ্ঠান',
            'create'         => 'যোগ করুন',
            'edit'           => 'সম্পাদনা',
            'delete'         => 'মুছুন',
            'cancel'         => 'বাতিল করুন',
            'view'           => 'দেখুন',
            'mass-delete'    => 'সাময়িক মুছুন',
            'mass-update'    => 'সাময়িক আপডেট',
            'customers'      => 'গ্রাহকবৃন্দ',
            'products'       => 'পণ্য',
            'orders'         => 'অর্ডারগুলি',
            'settings'       => 'সেটিংস',
            'agents'         => 'এজেন্টগুলি',
            'roles'          => 'ভূমিকা',
            'locales'        => 'লোকেলস',
            'currencies'     => 'মুদ্রা',
            'exchange-rates' => 'এক্সচেঞ্জ হার',
            'channels'       => 'চ্যানেলস',
            'themes'         => 'থিমস',
            'send-email'     => 'ইমেইল পাঠান',
            'cms'            => 'সিএমএস',
            'configuration'  => 'কনফিগারেশন',
            'download'       => 'ডাউনলোড',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => 'সুপার অ্যাডমিন সাইন ইন',
                'email'                => 'ইমেইল ঠিকানা',
                'password'             => 'পাসওয়ার্ড',
                'btn-submit'           => 'সাইন ইন করুন',
                'forget-password-link' => 'পাসওয়ার্ড ভুলে গেছেন?',
                'submit-btn'           => 'সাইন ইন করুন',
                'login-success'        => 'সাফল্য: আপনি সফলভাবে লগইন হয়েছেন।',
                'login-error'          => 'দুঃখিত আপনার শংসাপত্র পরীক্ষা করুন এবং আবার চেষ্টা করুন।',
                'activate-warning'     => 'আপনার অ্যাকাউন্টটি এখনো অ্যাকটিভেট হয়নি, দয়া করে প্রশাসকের সাথে যোগাযোগ করুন।',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'পাসওয়ার্ড ভুলে গেছেন',
                    'title'           => 'পাসওয়ার্ড পুনরুদ্ধার করুন',
                    'email'           => 'নিবন্ধিত ইমেইল',
                    'reset-link-sent' => 'পাসওয়ার্ড রিসেট লিঙ্ক পাঠানো হয়েছে',
                    'sign-in-link'    => 'সাইন ইনে ফিরে যান?',
                    'email-not-exist' => 'ইমেইল অস্তিত্ব নেই',
                    'submit-btn'      => 'রিসেট করুন',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'পাসওয়ার্ড রিসেট',
                'back-link-title'  => 'সাইন ইনে ফিরে যান?',
                'confirm-password' => 'পাসওয়ার্ড নিশ্চিত করুন',
                'email'            => 'নিবন্ধিত ইমেইল',
                'password'         => 'পাসওয়ার্ড',
                'submit-btn'       => 'পাসওয়ার্ড রিসেট করুন',
            ],
        ],

        'tenants' => [
            'index' => [
                'title'        => 'টেনেন্ট তালিকা',
                'register-btn' => 'টেনেন্ট নিবন্ধন',
        
                'create' => [
                    'title'             => 'টেনেন্ট তৈরি করুন',
                    'first-name'        => 'প্রথম নাম',
                    'last-name'         => 'শেষ নাম',
                    'user-name'         => 'ব্যবহারকারীর নাম',
                    'organization-name' => 'প্রতিষ্ঠানের নাম',
                    'phone'             => 'ফোন',
                    'email'             => 'ইমেইল',
                    'password'          => 'পাসওয়ার্ড',
                    'confirm-password'  => 'পাসওয়ার্ড নিশ্চিত করুন',
                    'save-btn'          => 'টেনেন্ট সংরক্ষণ করুন',
                    'back-btn'          => 'ফিরে যান',
                ],
        
                'datagrid' => [
                    'id'                  => 'আইডি',
                    'user-name'           => 'ব্যবহারকারীর নাম',
                    'organization'        => 'প্রতিষ্ঠান',
                    'domain'              => 'ডোমেইন',
                    'cname'               => 'সিনেমে',
                    'status'              => 'অবস্থা',
                    'active'              => 'সক্রিয়',
                    'disable'             => 'অক্ষম',
                    'view'                => 'ইনসাইটস দেখুন',
                    'edit'                => 'টেনেন্ট সম্পাদনা করুন',
                    'delete'              => 'টেনেন্ট অপসারণ করুন',
                    'mass-delete'         => 'সমস্ত টেনেন্ট মোছুন',
                    'mass-delete-success' => 'নির্বাচিত টেনেন্টগুলি সফলভাবে মোছা হয়েছে',
                ],
            ],
        
            'edit' => [
                'title'             => 'টেনেন্ট সম্পাদনা করুন',
                'first-name'        => 'প্রথম নাম',
                'last-name'         => 'শেষ নাম',
                'user-name'         => 'ব্যবহারকারীর নাম',
                'cname'             => 'সিনেমে',
                'organization-name' => 'প্রতিষ্ঠানের নাম',
                'phone'             => 'ফোন',
                'status'            => 'অবস্থা',
                'email'             => 'ইমেইল',
                'password'          => 'পাসওয়ার্ড',
                'confirm-password'  => 'পাসওয়ার্ড নিশ্চিত করুন',
                'save-btn'          => 'টেনেন্ট সংরক্ষণ করুন',
                'back-btn'          => 'ফিরে যান',
                'general'           => 'সাধারিত',
                'settings'          => 'সেটিংস',
            ],
        
            'view' => [
                'title'                        => 'টেনেন্টের ইনসাইটস',
                'heading'                      => 'টেনেন্ট - :tenant_name',
                'email-address'                => 'ইমেইল ঠিকানা',
                'phone'                        => 'ফোন',
                'domain-information'           => 'ডোমেইন তথ্য',
                'mapped-domain'                => 'ম্যাপ করা ডোমেইন',
                'cname-information'            => 'সিনেমে তথ্য',
                'cname-entry'                  => 'সিনেমে এন্ট্রি',
                'attribute-information'        => 'গুণগুণ তথ্য',
                'no-of-attributes'             => 'গুণগুণের সংখ্যা',
                'attribute-family-information' => 'গুণগুণ পরিবারের তথ্য',
                'no-of-attribute-families'     => 'গুণগুণ পরিবারের সংখ্যা',
                'product-information'          => 'পণ্য তথ্য',
                'no-of-products'               => 'পণ্যের সংখ্যা',
                'customer-information'         => 'গ্রাহকের তথ্য',
                'no-of-customers'              => 'গ্রাহকের সংখ্যা',
                'customer-group-information'   => 'গ্রাহক গ্রুপের তথ্য',
                'no-of-customer-groups'        => 'গ্রাহক গ্রুপের সংখ্যা',
                'category-information'         => 'বিভাগের তথ্য',
                'no-of-categories'             => 'বিভাগের সংখ্যা',
                'addresses'                    => 'ঠিকানা তালিকা (:count)',
                'empty-title'                  => 'টেনেন্ট ঠিকানা যোগ করুন',
            ],
        
            'create-success' => 'টেনেন্ট সফলভাবে তৈরি হয়েছে',
            'delete-success' => 'টেনেন্ট সফলভাবে মোছা হয়েছে',
            'delete-failed'  => 'টেনেন্ট মোছা হয়নি',
            'product-copied' => 'টেনেন্ট সফলভাবে অনুলিপি করা হয়েছে',
            'update-success' => 'টেনেন্ট সফলভাবে আপডেট হয়েছে',
        
            'customers' => [
                'index' => [
                    'title' => 'গ্রাহকের তালিকা',
        
                    'datagrid' => [
                        'id'             => 'আইডি',
                        'domain'         => 'ডোমেইন',
                        'customer-name'  => 'গ্রাহকের নাম',
                        'email'          => 'ইমেইল',
                        'customer-group' => 'গ্রাহক গ্রুপ',
                        'phone'          => 'ফোন',
                        'status'         => 'অবস্থা',
                        'active'         => 'সক্রিয়',
                        'inactive'       => 'নিষ্ক্রিয়',
                        'is-suspended'   => 'স্থগিত',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => 'পণ্যের তালিকা',
        
                    'datagrid' => [
                        'id'               => 'আইডি',
                        'domain'           => 'ডোমেইন',
                        'name'             => 'নাম',
                        'sku'              => 'SKU',
                        'attribute-family' => 'গুণগুণ পরিবার',
                        'image'            => 'চিত্র',
                        'price'            => 'মূল্য',
                        'qty'              => 'পরিমাণ',
                        'status'           => 'অবস্থা',
                        'active'           => 'সক্রিয়',
                        'inactive'         => 'নিষ্ক্রিয়',
                        'category'         => 'বিভাগ',
                        'type'             => 'প্রকার',
                    ],
                ],
            ],
        
            'orders' => [
                'index' => [
                    'title' => 'অর্ডারের তালিকা',
        
                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => 'অর্ডার আইডি',
                        'domain'          => 'ডোমেইন',
                        'sub-total'       => 'সাব টোটাল',
                        'grand-total'     => 'গ্র্যান্ড টোটাল',
                        'order-date'      => 'অর্ডার তারিখ',
                        'channel-name'    => 'চ্যানেলের নাম',
                        'status'          => 'অবস্থা',
                        'processing'      => 'প্রসেসিং',
                        'completed'       => 'সম্পন্ন',
                        'canceled'        => 'বাতিল',
                        'closed'          => 'বন্ধ',
                        'pending'         => 'মুলতুয়া',
                        'pending-payment' => 'মুলতুয়া পেমেন্ট',
                        'fraud'           => 'প্রতারণা',
                        'customer'        => 'গ্রাহক',
                        'email'           => 'ইমেইল',
                        'location'        => 'অবস্থান',
                        'images'          => 'চিত্র',
                        'pay-by'          => 'দ্বারা পরিশোধ করুন - ',
                        'pay-via'         => 'প্রদান করুন',
                        'date'            => 'তারিখ',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'এজেন্ট তালিকা',
                    'register-btn' => 'এজেন্ট তৈরি করুন',
            
                    'create' => [
                        'title'             => 'এজেন্ট তৈরি করুন',
                        'first-name'        => 'প্রথম নাম',
                        'last-name'         => 'শেষ নাম',
                        'email'             => 'ইমেইল',
                        'current-password'  => 'বর্তমান পাসওয়ার্ড',
                        'password'          => 'পাসওয়ার্ড',
                        'confirm-password'  => 'পাসওয়ার্ড নিশ্চিত করুন',
                        'role'              => 'রোল',
                        'select'            => 'নির্বাচন করুন',
                        'status'            => 'অবস্থা',
                        'save-btn'          => 'টেনেন্ট সংরক্ষণ করুন',
                        'back-btn'          => 'ফিরে যান',
                        'upload-image-info' => 'একটি প্রোফাইল ইমেজ (110px X 110px) আপলোড করুন, PNG বা JPG ফরম্যাটে',
                    ],
            
                    'edit' => [
                        'title' => 'এজেন্ট সম্পাদনা করুন',
                    ],
            
                    'datagrid' => [
                        'id'      => 'আইডি',
                        'name'    => 'নাম',
                        'email'   => 'ইমেইল',
                        'role'    => 'রোল',
                        'status'  => 'অবস্থা',
                        'active'  => 'সক্রিয়',
                        'disable' => 'নিষ্ক্রিয়',
                        'actions' => 'ক্রিয়াসমূহ',
                        'edit'    => 'সম্পাদনা',
                        'delete'  => 'মুছে ফেলা',
                    ],
                ],
            
                'create-success'             => 'সাফল্য: সুপার অ্যাডমিন এজেন্টটি সফলভাবে তৈরি হয়েছে',
                'delete-success'             => 'টেনেন্ট সফলভাবে মোছা হয়েছে',
                'delete-failed'              => 'টেনেন্ট মোছার প্রয়াস ব্যর্থ হয়েছে',
                'cannot-change'              => 'এজেন্টের :name পরিবর্তন করা যাবে না',
                'product-copied'             => 'টেনেন্টটি সফলভাবে কপি হয়েছে',
                'update-success'             => 'টেনেন্ট সফলভাবে আপডেট হয়েছে',
                'invalid-password'           => 'আপনি যে বর্তমান পাসওয়ার্ডটি লিখেছেন তা ভুল',
                'last-delete-error'          => 'সতর্কতা: অন্তত একটি সুপার অ্যাডমিন এজেন্ট প্রয়োজন',
                'login-delete-error'         => 'সতর্কতা: আপনি নিজের অ্যাকাউন্ট মুছে ফেলতে পারবেন না।',
                'administrator-delete-error' => 'সতর্কতা: অন্তত একটি সুপার অ্যাডমিন এজেন্ট প্রয়োজন যার অ্যাডমিনিস্ট্রেটর অ্যাক্সেস আছে',
            ],
            
            'roles' => [
                'index' => [
                    'title'      => 'রোল তালিকা',
                    'create-btn' => 'রোল তৈরি করুন',
            
                    'datagrid' => [
                        'id'              => 'আইডি',
                        'name'            => 'নাম',
                        'permission-type' => 'অনুমতি ধরণ',
                        'actions'         => 'ক্রিয়াসমূহ',
                        'edit'            => 'সম্পাদনা',
                        'delete'          => 'মুছে ফেলা',
                    ],
                ],
            
                'create' => [
                    'access-control' => 'অ্যাক্সেস কন্ট্রোল',
                    'all'            => 'সব',
                    'back-btn'       => 'ফিরে যান',
                    'custom'         => 'কাস্টম',
                    'description'    => 'বিবরণ',
                    'general'        => 'সাধারিত',
                    'name'           => 'নাম',
                    'permissions'    => 'অনুমতিসমূহ',
                    'save-btn'       => 'রোল সংরক্ষণ করুন',
                    'title'          => 'রোল তৈরি করুন',
                ],
            
                'edit' => [
                    'access-control' => 'অ্যাক্সেস কন্ট্রোল',
                    'all'            => 'সব',
                    'back-btn'       => 'ফিরে যান',
                    'custom'         => 'কাস্টম',
                    'description'    => 'বিবরণ',
                    'general'        => 'সাধারিত',
                    'name'           => 'নাম',
                    'permissions'    => 'অনুমতিসমূহ',
                    'save-btn'       => 'রোল সংরক্ষণ করুন',
                    'title'          => 'রোল সম্পাদনা করুন',
                ],
            
                'being-used'        => 'রোলটি ইতিমধ্যে অন্য এজেন্ট দ্বারা ব্যবহৃত হয়েছে',
                'last-delete-error' => 'শেষ রোলটি মুছে ফেলা যাবে না',
                'create-success'    => 'রোল সফলভাবে তৈরি হয়েছে',
                'delete-success'    => 'রোল সফলভাবে মোছা হয়েছে',
                'delete-failed'     => 'রোল মোছার প্রয়াস ব্যর্থ হয়েছে',
                'update-success'    => 'রোল সফলভাবে আপডেট হয়েছে',
            ],
            
            'locales' => [
                'index' => [
                    'title'      => 'লোকেল তালিকা',
                    'create-btn' => 'লোকেল তৈরি করুন',
            
                    'create' => [
                        'title'            => 'লোকেল তৈরি করুন',
                        'code'             => 'কোড',
                        'name'             => 'নাম',
                        'direction'        => 'দিক',
                        'select-direction' => 'দিক নির্বাচন করুন',
                        'text-ltr'         => 'এলটিআর',
                        'text-rtl'         => 'আরটিআল',
                        'locale-logo'      => 'লোকেল লোগো',
                        'logo-size'        => 'চিত্র রেজোলিউশন হতে হবে 24px X 16px এর মত',
                        'save-btn'         => 'লোকেল সংরক্ষণ করুন',
                    ],
            
                    'edit' => [
                        'title'     => 'লোকেল সম্পাদনা করুন',
                        'code'      => 'কোড',
                        'name'      => 'নাম',
                        'direction' => 'দিক',
                    ],
            
                    'datagrid' => [
                        'id'        => 'আইডি',
                        'code'      => 'কোড',
                        'name'      => 'নাম',
                        'direction' => 'দিক',
                        'text-ltr'  => 'এলটিআর',
                        'text-rtl'  => 'আরটিআল',
                        'actions'   => 'ক্রিয়াসমূহ',
                        'edit'      => 'সম্পাদনা',
                        'delete'    => 'মুছে ফেলা',
                    ],
                ],
            
                'create-success'    => 'লোকেল সফলভাবে তৈরি হয়েছে।',
                'update-success'    => 'লোকেল সফলভাবে আপডেট হয়েছে।',
                'delete-success'    => 'লোকেল সফলভাবে মোছা হয়েছে।',
                'delete-failed'     => 'লোকেল মোছার প্রয়াস ব্যর্থ হয়েছে',
                'last-delete-error' => 'অন্তত একটি সুপার অ্যাডমিন লোকেল প্রয়োজন।',
            ],
            
            'currencies' => [
                'index' => [
                    'title'      => 'মুদ্রা তালিকা',
                    'create-btn' => 'মুদ্রা তৈরি করুন',
            
                    'create' => [
                        'title'    => 'মুদ্রা তৈরি করুন',
                        'code'     => 'কোড',
                        'name'     => 'নাম',
                        'symbol'   => 'প্রতীক',
                        'decimal'  => 'ডেসিমাল',
                        'save-btn' => 'মুদ্রা সংরক্ষণ করুন',
                    ],
            
                    'edit' => [
                        'title'    => 'মুদ্রা সম্পাদনা করুন',
                        'code'     => 'কোড',
                        'name'     => 'নাম',
                        'symbol'   => 'প্রতীক',
                        'decimal'  => 'ডেসিমাল',
                        'save-btn' => 'মুদ্রা সংরক্ষণ করুন',
                    ],
            
                    'datagrid' => [
                        'id'      => 'আইডি',
                        'code'    => 'কোড',
                        'name'    => 'নাম',
                        'actions' => 'ক্রিয়াসমূহ',
                        'edit'    => 'সম্পাদনা',
                        'delete'  => 'মুছে ফেলা',
                    ],
                ],
            
                'create-success'      => 'মুদ্রা সফলভাবে তৈরি হয়েছে।',
                'update-success'      => 'মুদ্রা সফলভাবে আপডেট হয়েছে।',
                'delete-success'      => 'মুদ্রা সফলভাবে মোছা হয়েছে।',
                'delete-failed'       => 'মুদ্রা মোছার প্রয়াস ব্যর্থ হয়েছে',
                'last-delete-error'   => 'অন্তত একটি সুপার অ্যাডমিন মুদ্রা প্রয়োজন।',
                'mass-delete-success' => 'নির্বাচিত মুদ্রা সফলভাবে মোছা হয়েছে',
            ],
            
            'exchange-rates' => [
                'index' => [
                    'title'        => 'বিনিময় হার',
                    'create-btn'   => 'বিনিময় হার তৈরি করুন',
                    'update-rates' => 'রেট আপডেট করুন',
            
                    'create' => [
                        'title'                  => 'বিনিময় হার তৈরি করুন',
                        'source-currency'        => 'উৎস মুদ্রা',
                        'target-currency'        => 'লক্ষ্য মুদ্রা',
                        'select-target-currency' => 'লক্ষ্য মুদ্রা নির্বাচন করুন',
                        'rate'                   => 'রেট',
                        'save-btn'               => 'বিনিময় হার সংরক্ষণ করুন',
                    ],
            
                    'edit' => [
                        'title'           => 'বিনিময় হার সম্পাদনা করুন',
                        'source-currency' => 'উৎস মুদ্রা',
                        'target-currency' => 'লক্ষ্য মুদ্রা',
                        'rate'            => 'রেট',
                        'save-btn'        => 'বিনিময় হার সংরক্ষণ করুন',
                    ],
            
                    'datagrid' => [
                        'id'            => 'আইডি',
                        'currency-name' => 'মুদ্রা নাম',
                        'exchange-rate' => 'বিনিময় হার',
                        'actions'       => 'ক্রিয়াসমূহ',
                        'edit'          => 'সম্পাদনা',
                        'delete'        => 'মুছে ফেলা',
                    ],
                ],
            
                'create-success' => 'বিনিময় হার সফলভাবে তৈরি হয়েছে।',
                'update-success' => 'বিনিময় হার সফলভাবে আপডেট হয়েছে।',
                'delete-success' => 'বিনিময় হার সফলভাবে মোছা হয়েছে।',
                'delete-failed'  => 'বিনিময় হার মোছার প্রয়াস ব্যর্থ হয়েছে',
            ],
            
            'channels' => [
                'index' => [
                    'title' => 'চ্যানেল',
            
                    'datagrid' => [
                        'id'       => 'আইডি',
                        'code'     => 'কোড',
                        'name'     => 'নাম',
                        'hostname' => 'হোস্ট নাম',
                        'actions'  => 'ক্রিয়াকলাপ',
                        'edit'     => 'সম্পাদনা',
                        'delete'   => 'মুছুন',
                    ],
                ],
            
                'edit' => [
                    'title'                  => 'চ্যানেল সম্পাদনা',
                    'back-btn'               => 'পিছনে',
                    'save-btn'               => 'চ্যানেল সংরক্ষণ করুন',
                    'general'                => 'সাধারিত',
                    'code'                   => 'কোড',
                    'name'                   => 'নাম',
                    'description'            => 'বর্ণনা',
                    'hostname'               => 'হোস্টনেম',
                    'hostname-placeholder'   => 'https://www.example.com (শেষে স্ল্যাশ যোগ করবেন না।)',
                    'design'                 => 'ডিজাইন',
                    'theme'                  => 'থিম',
                    'logo'                   => 'লোগো',
                    'logo-size'              => 'চিত্র রেজোলিউশন হতে হবে 192px X 50px মতো',
                    'favicon'                => 'ফ্যাভিকন',
                    'favicon-size'           => 'চিত্র রেজোলিউশন হতে হবে 16px X 16px মতো',
                    'seo'                    => 'হোম পৃষ্ঠা এসইও',
                    'seo-title'              => 'মেটা শিরোনাম',
                    'seo-description'        => 'মেটা বর্ণনা',
                    'seo-keywords'           => 'মেটা কীওয়ার্ড',
                    'currencies-and-locales' => 'মুদ্রা এবং অঞ্চল',
                    'locales'                => 'অঞ্চল',
                    'default-locale'         => 'ডিফল্ট অঞ্চল',
                    'currencies'             => 'মুদ্রা',
                    'default-currency'       => 'ডিফল্ট মুদ্রা',
                    'last-delete-error'      => 'অবশ্যই একটি চ্যানেল প্রয়োজন।',
                    'settings'               => 'সেটিংস',
                    'status'                 => 'অবস্থা',
                    'update-success'         => 'চ্যানেল সফলভাবে আপডেট হয়েছে',
                ],
            
                'update-success' => 'চ্যানেল সফলভাবে আপডেট হয়েছে।',
                'delete-success' => 'চ্যানেল সফলভাবে মোছা হয়েছে।',
                'delete-failed'  => 'চ্যানেল মোছা ব্যর্থ হয়েছে',
            ],
            
            'themes' => [
                'index' => [
                    'create-btn' => 'থিম তৈরি করুন',
                    'title'      => 'থিমস',

                    'datagrid' => [
                        'active'       => 'সক্রিয়',
                        'channel_name' => 'চ্যানেল নাম',
                        'delete'       => 'মুছুন',
                        'inactive'     => 'নিষ্ক্রিয়',
                        'id'           => 'আইডি',
                        'name'         => 'নাম',
                        'status'       => 'অবস্থা',
                        'sort-order'   => 'ক্রমানুসারে সাজানো',
                        'type'         => 'প্রকার',
                        'view'         => 'দৃশ্য',
                    ],
                ],

                'create' => [
                    'name'       => 'নাম',
                    'save-btn'   => 'থিম সংরক্ষণ করুন',
                    'sort-order' => 'ক্রমানুসারে সাজানো',
                    'title'      => 'থিম তৈরি করুন',

                    'type' => [
                        'footer-links'     => 'ফুটার লিঙ্ক',
                        'image-carousel'   => 'স্লাইডার ক্যারোসেল',
                        'product-carousel' => 'পণ্য ক্যারোসেল',
                        'static-content'   => 'স্থির বিষয়বস্তু',
                        'services-content' => 'সেবা সংবহনের বিষয়বস্তু',
                        'title'            => 'প্রকার',
                    ],
                ],

                'edit' => [
                    'add-image-btn'                 => 'ছবি যোগ করুন',
                    'add-filter-btn'                => 'ফিল্টার যোগ করুন',
                    'add-footer-link-btn'           => 'ফুটার লিঙ্ক যোগ করুন',
                    'add-link'                      => 'লিঙ্ক যোগ করুন',
                    'asc'                           => 'আসেন্ডিং',
                    'back'                          => 'পিছনে',
                    'category-carousel-description' => 'একটি প্রতিস্থাপনকারী বিভাগ ক্যারোসেল ব্যবহার করে ডাইনামিক বিভাগগুলি আকর্ষণীয়ভাবে প্রদর্শন করুন।',
                    'category-carousel'             => 'বিভাগ ক্যারোসেল',
                    'create-filter'                 => 'ফিল্টার তৈরি করুন',
                    'css'                           => 'সিএসএস',
                    'column'                        => 'কলাম',
                    'channels'                      => 'চ্যানেলস',
                    'desc'                          => 'ডিসেন্ডিং',
                    'delete'                        => 'মুছুন',
                    'edit'                          => 'সম্পাদনা',
                    'footer-title'                  => 'শিরোনাম',
                    'footer-link'                   => 'ফুটার লিঙ্ক',
                    'footer-link-form-title'        => 'ফুটার লিঙ্ক',
                    'filter-title'                  => 'শিরোনাম',
                    'filters'                       => 'ফিল্টার',
                    'footer-link-description'       => 'ফুটার লিঙ্ক দিয়ে সাইট অনুস্বাদ এবং তথ্য অবিরত অনুসন্ধান করুন।',
                    'general'                       => 'সাধারিত',
                    'html'                          => 'এইচটিএমএল',
                    'image'                         => 'চিত্র',
                    'image-size'                    => 'চিত্র রেজোলিউশন হতে হবে (1920px X 700px)',
                    'image-title'                   => 'চিত্র শিরোনাম',
                    'image-upload-message'          => 'শুধুমাত্র চিত্র (.jpeg, .jpg, .png, .webp, ..) অনুমোদিত।',
                    'key'                           => 'কী: :key',
                    'key-input'                     => 'কী',
                    'link'                          => 'লিঙ্ক',
                    'limit'                         => 'সীমা',
                    'name'                          => 'নাম',
                    'product-carousel'              => 'পণ্য ক্যারোসেল',
                    'product-carousel-description'  => 'একটি ডাইনামিক এবং প্রতিস্থাপনকারী পণ্য ক্যারোসেল দিয়ে পণ্য প্রদর্শন করুন।',
                    'path'                          => 'পথ',
                    'preview'                       => 'পূর্বরূপ',
                    'slider'                        => 'স্লাইডার',
                    'static-content-description'    => 'আপনার পাবলিকের জন্য সংক্ষেপমূলক, জ্ঞানবর্ধনমূলক স্থির বিষয়বস্তু দিয়ে প্রবৃদ্ধি করুন।',
                    'static-content'                => 'স্থির বিষয়বস্তু',
                    'slider-description'            => 'স্লাইডার সংবাদ থিম অমুকানো।',
                    'slider-required'               => 'স্লাইডার ক্ষেত্র প্রয়োজন।',
                    'slider-add-btn'                => 'স্লাইডার যোগ করুন',
                    'save-btn'                      => 'সংরক্ষণ করুন',
                    'sort'                          => 'সাজানো',
                    'sort-order'                    => 'ক্রমানুসারে সাজানো',
                    'status'                        => 'অবস্থা',
                    'slider-image'                  => 'স্লাইডার চিত্র',
                    'select'                        => 'নির্বাচন করুন',
                    'title'                         => 'থিম সম্পাদনা',
                    'update-slider'                 => 'স্লাইডার আপডেট করুন',
                    'url'                           => 'ইউআরএল',
                    'value-input'                   => 'মান',
                    'value'                         => 'মান: :value',

                    'services-content' => [
                        'add-btn'            => 'সেবা যোগ করুন',
                        'channels'           => 'চ্যানেলস',
                        'delete'             => 'মুছুন',
                        'description'        => 'বর্ণনা',
                        'general'            => 'সাধারিত',
                        'name'               => 'নাম',
                        'save-btn'           => 'সংরক্ষণ করুন',
                        'service-icon'       => 'সেবা আইকন',
                        'service-icon-class' => 'সেবা আইকন ক্লাস',
                        'service-info'       => 'সেবা সংবহনের বিষয়বস্তু সম্পর্কিত থিম কাস্টমাইজেশন।',
                        'services'           => 'সেবা',
                        'sort-order'         => 'ক্রমানুসারে সাজানো',
                        'status'             => 'অবস্থা',
                        'title'              => 'শিরোনাম',
                        'update-service'     => 'সেবা আপডেট করুন',
                    ],
                ],

                'create-success' => 'থিম সফলভাবে তৈরি হয়েছে',
                'delete-success' => 'থিম সফলভাবে মোছা হয়েছে',
                'update-success' => 'থিম সফলভাবে আপডেট হয়েছে',
                'delete-failed'  => 'থিম সম্পর্কিত সামগ্রী মুছার সময় ত্রুটি হয়েছে।',
            ],

            'email' => [
                'create' => [
                    'send-btn'                  => 'ইমেইল পাঠান',
                    'back-btn'                  => 'পিছনে যাও',
                    'title'                     => 'ইমেইল পাঠান',
                    'general'                   => 'সাধারিত',
                    'body'                      => 'বডি',
                    'subject'                   => 'বিষয়',
                    'dear'                      => 'প্রিয় :agent_name',
                    'agent-registration'        => 'স্যাস এজেন্ট সফলভাবে নিবন্ধিত হয়েছে',
                    'summary'                   => 'আপনার অ্যাকাউন্টটি তৈরি হয়েছে। আপনার অ্যাকাউন্টের বিশদগুলি নিম্নে দেওয়া হয়েছে: ',
                    'saas-url'                  => 'ডোমেইন',
                    'email'                     => 'ইমেইল',
                    'password'                  => 'পাসওয়ার্ড',
                    'sign-in'                   => 'সাইন ইন',
                    'thanks'                    => 'ধন্যবাদ!',
                    'send-email-to-all-tenants' => 'সমস্ত টেনেন্টকে ইমেইল পাঠান',
                ],
                
                'send-success' => 'ইমেইল সফলভাবে পাঠানো হয়েছে।',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'CMS পৃষ্ঠা তালিকা',
                'create-btn' => 'পৃষ্ঠা তৈরি করুন',
        
                'datagrid' => [
                    'id'                  => 'আইডি',
                    'page-title'          => 'পৃষ্ঠা শিরোনাম',
                    'url-key'             => 'URL কী',
                    'status'              => 'অবস্থা',
                    'active'              => 'সক্রিয়',
                    'disable'             => 'নিষ্ক্রিয়',
                    'edit'                => 'পৃষ্ঠা সম্পাদনা করুন',
                    'delete'              => 'পৃষ্ঠা মুছুন',
                    'mass-delete'         => 'সামগ্রিক মুছুন',
                    'mass-delete-success' => 'নির্বাচিত সিএমএস পৃষ্ঠা(গুলি) সফলভাবে মুছে ফেলা হয়েছে',
                ],
            ],
        
            'create' => [
                'title'            => 'সিএমএস পৃষ্ঠা তৈরি করুন',
                'first-name'       => 'প্রথম নাম',
                'general'          => 'সাধারিত',
                'page-title'       => 'শিরোনাম',
                'channels'         => 'চ্যানেল',
                'content'          => 'কন্টেন্ট',
                'meta-keywords'    => 'মেটা কীওয়ার্ড',
                'meta-description' => 'মেটা বর্ণনা',
                'meta-title'       => 'মেটা শিরোনাম',
                'seo'              => 'এসইও',
                'url-key'          => 'URL কী',
                'description'      => 'বিবরণ',
                'save-btn'         => 'সিএমএস পৃষ্ঠা সংরক্ষণ করুন',
                'back-btn'         => 'ফিরে যান',
            ],
        
            'edit' => [
                'title'            => 'পৃষ্ঠা সম্পাদনা করুন',
                'preview-btn'      => 'পৃষ্ঠা পূর্বরূপ',
                'save-btn'         => 'পৃষ্ঠা সংরক্ষণ করুন',
                'general'          => 'সাধারিত',
                'page-title'       => 'পৃষ্ঠা শিরোনাম',
                'back-btn'         => 'ফিরে যান',
                'channels'         => 'চ্যানেল',
                'content'          => 'কন্টেন্ট',
                'seo'              => 'এসইও',
                'meta-keywords'    => 'মেটা কীওয়ার্ড',
                'meta-description' => 'মেটা বর্ণনা',
                'meta-title'       => 'মেটা শিরোনাম',
                'url-key'          => 'URL কী',
                'description'      => 'বিবরণ',
            ],
        
            'create-success' => 'সিএমএস সফলভাবে তৈরি হয়েছে।',
            'delete-success' => 'সিএমএস সফলভাবে মুছে ফেলা হয়েছে।',
            'update-success' => 'সিএমএস সফলভাবে আপডেট হয়েছে।',
            'no-resource'    => 'সম্পদ বিদ্যমান নেই।',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => 'মুছুন',
                'enable-at-least-one-shipping' => 'অন্তত একটি শিপিং পদ্ধতি চালু করুন।',
                'enable-at-least-one-payment'  => 'অন্তত একটি অর্থ প্রদান পদ্ধতি চালু করুন।',
                'save-btn'                     => 'কনফিগারেশন সংরক্ষণ করুন',
                'save-message'                 => 'কনফিগারেশন সফলভাবে সংরক্ষণ করা হয়েছে',
                'title'                        => 'কনফিগারেশন',
        
                'general' => [
                    'info'  => 'লেআউট এবং ইমেল বিবরণ পরিচালনা করুন',
                    'title' => 'সাধারিত',
        
                    'design' => [
                        'info'  => 'লোগো এবং ফ্যাভিকন আইকন সেট করুন।',
                        'title' => 'ডিজাইন',
        
                        'super' => [
                            'info'          => 'সুপার অ্যাডমিন লোগো হলো একটি বৈশিষ্ট্যমূলক চিত্র বা প্রতিষ্ঠান ইন্টারফেস প্রতিষ্ঠা করা, সাধারিতভাবে ব্যক্তিগতকৃত।',
                            'admin-logo'    => 'অ্যাডমিন লোগো',
                            'logo-image'    => 'লোগো চিত্র',
                            'favicon-image' => 'ফ্যাভিকন চিত্র',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => 'সুপার অ্যাডমিনের জন্য ইমেল ঠিকানা সেট করুন।',
                        'title' => 'সুপার এজেন্ট',
        
                        'super' => [
                            'info'          => 'ইমেল বিজ্ঞপ্তি পাওয়ার জন্য সুপার অ্যাডমিনের জন্য ইমেল ঠিকানা সেট করুন',
                            'email-address' => 'ইমেল ঠিকানা',
                        ],

                        'social-connect' => [
                            'title'    => 'সোশ্যাল কানেক্ট',
                            'info'     => 'সোশ্যাল মিডিয়া প্ল্যাটফর্ম আপনার পাবলিকের সাথে প্রত্যক্ষ যোগাযোগের সুযোগ সরবরাহ করে যা আপনার ব্র্যান্ডের চারপাশ সম্প্রদায় গঠন এবং জ্যামিতিকরণ করে। মতামত, লাইক এবং শেয়ারের মাধ্যমে আপনার পাবলিক সঙ্গে সরাসরি যোগাযোগ দিয়ে যা জনপ্রিয়তা ও আপনার ব্র্যান্ডের চারপাশে একটি সম্প্রদায় গঠন করে।',
                            'facebook' => 'ফেসবুক',
                            'twitter'  => 'টুইটার',
                            'linkedin' => 'লিঙ্কডইন',
                        ],
                    ],
        
                    'content' => [
                        'info'   => 'টেনেন্ট রেজিস্টার লেআউটের জন্য শিরোনাম এবং ফুটার তথ্য সেট করুন।',
                        'title'  => 'কন্টেন্ট',
        
                        'footer' => [
                            'info'           => 'ফুটার কন্টেন্ট সেট করুন',
                            'title'          => 'ফুটার',
                            'footer-content' => 'ফুটার টেক্সট',
                            'footer-toggle'  => 'ফুটার টগল',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => 'বিক্রয়, শিপিং এবং অর্থ প্রদান পদ্ধতির বিবরণ পরিচালনা করুন',
                    'title' => 'বিক্রয়',
        
                    'shipping-methods' => [
                        'info'  => 'শিপিং পদ্ধতির তথ্য সেট করুন',
                        'title' => 'শিপিং পদ্ধতি',
                    ],
        
                    'payment-methods' => [
                        'info'  => 'অর্থ প্রদান পদ্ধতির তথ্য সেট করুন',
                        'title' => 'অর্থ প্রদান পদ্ধতি',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => 'অন্তত একটি শিপিং পদ্ধতি চালু করুন।',
            'enable-at-least-one-payment'  => 'অন্তত একটি অর্থ প্রদান পদ্ধতি চালু করুন।',
            'save-message'                 => 'সাক্ষর: সুপার অ্যাডমিন কনফিগারেশন সফলভাবে সংরক্ষণ করা হয়েছে।',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'কিরান্ত হিসেবে নিবন্ধন করুন',
            ],
    
            'footer' => [
                'footer-text'     => '© কপিরাইট 2010 - 2023, ওয়েবকুল সফটওয়্যার (ভারতে নিবন্ধিত)। সমস্ত অধিকার সংরক্ষিত।',
                'connect-with-us' => 'আমাদের সাথে যোগাযোগ করুন',
                'text-locale'     => 'লোকেল',
                'text-currency'   => 'মুদ্রা',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => 'মার্চেন্ট নিবন্ধন',
            'step-1'              => 'পদক্ষেপ 1',
            'auth-cred'           => 'প্রমাণীকরণ শংসাপত্র',
            'email'               => 'ইমেইল',
            'phone'               => 'ফোন',
            'username'            => 'ব্যবহারকারীর নাম',
            'password'            => 'পাসওয়ার্ড',
            'cpassword'           => 'পাসওয়ার্ড নিশ্চিত করুন',
            'continue'            => 'চলমান',
            'step-2'              => 'পদক্ষেপ 2',
            'personal'            => 'ব্যক্তিগত বিবরণ',
            'first-name'          => 'প্রথম নাম',
            'last-name'           => 'শেষ নাম',
            'step-3'              => 'পদক্ষেপ 3',
            'org-details'         => 'সংগঠনের বিবরণ',
            'org-name'            => 'সংগঠনের নাম',
            'company-activated'   => 'সাফল্য: কোম্পানি সফলভাবে চালিত হয়েছে।',
            'company-deactivated' => 'সাফল্য: কোম্পানি সফলভাবে নিষ্ক্রিয় হয়েছে।',
            'company-updated'     => 'সাফল্য: কোম্পানি সফলভাবে আপডেট হয়েছে।',
            'something-wrong'     => 'সতর্কতা: কিছু ভুল হয়েছে।',
            'store-created'       => 'সাফল্য: স্টোর সফলভাবে তৈরি হয়েছে।',
            'something-wrong-1'   => 'সতর্কতা: কিছু ভুল হয়েছে, দয়া করে পরে আবার চেষ্টা করুন।',
            'content'             => 'একটি ব্যবসা কর্মক্ষেত্রে মার্চেন্ট হিসেবে নিবন্ধিত হন এবং একটি নিজস্ব স্টোর সহজেই তৈরি করুন, ইনস্টল এবং সার্ভার পরিচালনা করার চিন্তা না করে। আপনার শোনার প্রয়োজন হয়, পণ্যের তথ্য আপলোড করুন এবং আপনার ই-কমার্স স্টোর পান। লারাভেল মাল্টি কোম্পানি SaaS মডিউল সহজ কাস্টমাইজেশন সুবিধা অফার করে, এটি মানে মার্চেন্ট স্টোরে যে কোনও অতিরিক্ত সুবিধা এবং কার্যক্রম সহজেই যোগ করতে পারে বা তা সহজেই উন্নত করতে পারে।',
    
            'right-panel' => [
                'heading'    => 'মার্চেন্ট অ্যাকাউন্ট সেটআপ করতে কীভাবে',
                'para'       => 'এটি মাত্র কয়েকটি পদক্ষেপে মডিউল সেটআপ করা সহজ',
                'step-one'   => 'ইমেইল, পাসওয়ার্ড এবং পাসওয়ার্ড নিশ্চিত করুন সহ প্রমাণীকরণ শংসাপত্র দিন',
                'step-two'   => 'প্রথম নাম, শেষ নাম এবং ফোন নম্বর প্রদান করুন।',
                'step-three' => 'ব্যবহারকারীর নাম, সংগঠনের নাম প্রদান করুন।',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => 'সতর্কতা: একের বেশি চ্যানেল তৈরি করা অনুমোদিত নয়',
            'channel-hostname'                  => 'সতর্কতা: আপনির হোস্টনাম পরিবর্তন করতে অ্যাডমিনের সাথে যোগাযোগ করুন',
            'same-domain'                       => 'সতর্কতা: মূল ডোমেইনের সাথে একই সাব-ডোমেইন রাখা সম্ভাবনা নেই',
            'block-message'                     => 'সতর্কতা: আপনি যদি এই কিরান্ত আনব্লক করতে চান, আপনি স্বতন্ত্র ভাবে যোগাযোগ করতে পারেন, আমরা 24x7 আপনার সমস্যা সমাধান করার জন্য উপস্থিত আছি।',
            'blocked'                           => 'ব্লক করা হয়েছে',
            'illegal-action'                    => 'সতর্কতা: আপনি একটি অবৈধ ক্রিয়া পরিচালনা করেছেন',
            'domain-message'                    => 'সতর্কতা: ওহ! আমরা <b>:domain</b> এ সাহায্য করতে পারিনি।',
            'domain-desc'                       => '<b>:domain</b> দিয়ে একটি সংগঠন হিসেবে একাউন্ট তৈরি করতে চান তাদের মধ্যে প্রয়োজন হলে, স্বাধীনভাবে একাউন্ট তৈরি করুন এবং শুরু করুন।',
            'illegal-message'                   => 'সতর্কতা: আপনি যা করেছেন তা সাইট অ্যাডমিন দ্বারা অক্ষম করা হয়েছে, এই সম্পর্কে আপনার সাইট প্রশাসকে আরও তথ্যের জন্য আপনার সাইট প্রশাসকে ইমেল করুন।',
            'locale-creation'                   => 'সতর্কতা: ইংরেজি ছাড়া অন্য ভাষা তৈরি করা অনুমোদিত নয়।',
            'locale-delete'                     => 'সতর্কতা: লোকেল মুছতে পারবেন না।',
            'cannot-delete-default'             => 'সতর্কতা: ডিফল্ট চ্যানেল মুছতে পারবেন না।',
            'tenant-blocked'                    => 'কিরান্ত ব্লক করা হয়েছে',
            'domain-not-found'                  => 'সতর্কতা: ডোমেইন পাওয়া যায়নি।',
            'company-blocked-by-administrator'  => 'এই কিরান্তটি ব্লক করা হয়েছে',
            'not-allowed-to-visit-this-section' => 'সতর্কতা: আপনি এই বিভাগটি ব্যবহার করার অনুমতি প্রাপ্ত নয়।',
            'auth'                              => 'সতর্কতা: প্রমাণীকরণ ত্রুটি!',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'নতুন কোম্পানি নিবন্ধিত',
                'first-name' => 'প্রথম নাম',
                'last-name'  => 'শেষ নাম',
                'email'      => 'ইমেইল',
                'name'       => 'নাম',
                'username'   => 'ব্যবহারকারীর নাম',
                'domain'     => 'ডোমেইন',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => 'নতুন কোম্পানি সফলভাবে নিবন্ধিত',
                'dear'       => 'প্রিয় :tenant_name',
                'greeting'   => 'আমরা সাথে নিবন্ধিত হওয়ার জন্য আপনাকে স্বাগত ও ধন্যবাদ!',
                'summary'    => 'আপনার অ্যাকাউন্টটি এখন সফলভাবে তৈরি হয়েছে এবং আপনি এখানে আপনার ইমেইল ঠিকানা এবং পাসওয়ার্ড শংসাপত্র ব্যবহার করে লগইন করতে পারবেন। লগইন করার পরে, আপনি পণ্য, বিক্রয়, গ্রাহক, পর্যালোচনা এবং প্রচারের মধ্যে অন্যান্য সেবা অ্যাক্সেস করতে পারবেন।',
                'thanks'     => 'ধন্যবাদ!',
                'visit-shop' => 'দোকানে যান',
            ],
        ],
    ],

    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'কোম্পানির বিস্তারিত সম্পাদনা',
            'first-name'     => 'প্রথম নাম',
            'last-name'      => 'শেষ নাম',
            'email'          => 'ইমেইল',
            'skype'          => 'স্কাইপ',
            'cname'          => 'সি নাম',
            'phone'          => 'ফোন',
            'general'        => 'সাধারিত',
            'back-btn'       => 'পিছনে',
            'save-btn'       => 'বিস্তারিত সংরক্ষণ',
            'update-success' => 'সাফল্য: :resource সফলভাবে আপডেট হয়েছে।',
            'update-failed'  => 'সতর্কতা: অজানা কারণে :resource আপডেট করা যাচ্ছে না।',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => 'কোম্পানির ঠিকানা তালিকা',
                'create-btn' => 'ঠিকানা যোগ করুন',
    
                'datagrid' => [
                    'id'          => 'আইডি',
                    'address1'    => 'ঠিকানা 1',
                    'address2'    => 'ঠিকানা 2',
                    'city'        => 'শহর',
                    'country'     => 'দেশ',
                    'edit'        => 'সম্পাদনা',
                    'delete'      => 'মুছুন',
                    'mass-delete' => 'সমস্ত মুছে ফেলুন',
                ],
            ],
    
            'create' => [
                'title'     => 'কোম্পানির ঠিকানা তৈরি করুন',
                'general'   => 'সাধারিত',
                'address1'  => 'ঠিকানা 1',
                'address2'  => 'ঠিকানা 2',
                'country'   => 'দেশ',
                'state'     => 'রাজ্য',
                'city'      => 'শহর',
                'post-code' => 'পোস্ট কোড',
                'phone'     => 'ফোন',
                'back-btn'  => 'পিছনে',
                'save-btn'  => 'ঠিকানা সংরক্ষণ',
            ],
    
            'edit' => [
                'title'     => 'কোম্পানির ঠিকানা সম্পাদনা',
                'general'   => 'সাধারিত',
                'address1'  => 'ঠিকানা 1',
                'address2'  => 'ঠিকানা 2',
                'country'   => 'দেশ',
                'state'     => 'রাজ্য',
                'city'      => 'শহর',
                'post-code' => 'পোস্ট কোড',
                'phone'     => 'ফোন',
                'back-btn'  => 'পিছনে',
                'save-btn'  => 'ঠিকানা সংরক্ষণ',
            ],
    
            'create-success'      => 'সাফল্য: কোম্পানির ঠিকানা সফলভাবে তৈরি হয়েছে।',
            'update-success'      => 'সাফল্য: কোম্পানির ঠিকানা সফলভাবে আপডেট হয়েছে।',
            'delete-success'      => 'সাফল্য: :resource সফলভাবে মুছে ফেলা হয়েছে।',
            'delete-failed'       => 'সতর্কতা: অজানা কারণে :resource মুছা যাচ্ছে না।',
            'mass-delete-success' => 'সাফল্য: নির্বাচিত ঠিকানা সফলভাবে মুছে ফেলা হয়েছে।',
        ],
    
        'system' => [
            'social-login'           => 'সোশ্যাল লগইন',
            'facebook'               => 'ফেসবুক সেটিংস',
            'facebook-client-id'     => 'ফেসবুক ক্লায়েন্ট আইডি',
            'facebook-client-secret' => 'ফেসবুক ক্লায়েন্ট সিক্রেট',
            'facebook-callback-url'  => 'ফেসবুক ক্যালব্যাক URL',
            'twitter'                => 'টুইটার সেটিংস',
            'twitter-client-id'      => 'টুইটার ক্লায়েন্ট আইডি',
            'twitter-client-secret'  => 'টুইটার ক্লায়েন্ট সিক্রেট',
            'twitter-callback-url'   => 'টুইটার ক্যালব্যাক URL',
            'google'                 => 'গুগল সেটিংস',
            'google-client-id'       => 'গুগল ক্লায়েন্ট আইডি',
            'google-client-secret'   => 'গুগল ক্লায়েন্ট সিক্রেট',
            'google-callback-url'    => 'গুগল ক্যালব্যাক URL',
            'linkedin'               => 'লিঙ্কডইন সেটিংস',
            'linkedin-client-id'     => 'লিঙ্কডইন ক্লায়েন্ট আইডি',
            'linkedin-client-secret' => 'লিঙ্কডইন ক্লায়েন্ট সিক্রেট',
            'linkedin-callback-url'  => 'লিঙ্কডইন ক্যালব্যাক URL',
            'github'                 => 'গিটহাব সেটিংস',
            'github-client-id'       => 'গিটহাব ক্লায়েন্ট আইডি',
            'github-client-secret'   => 'গিটহাব ক্লায়েন্ট সিক্রেট',
            'github-callback-url'    => 'গিটহাব ক্যালব্যাক URL',
            'email-credentials'      => 'ইমেইল শংসাপত্র',
            'mail-driver'            => 'মেইল ড্রাইভার',
            'mail-host'              => 'মেইল হোস্ট',
            'mail-port'              => 'মেইল পোর্ট',
            'mail-username'          => 'মেইল ব্যবহারকারী নাম',
            'mail-password'          => 'মেইল পাসওয়ার্ড',
            'mail-encryption'        => 'মেইল এনক্রিপশন',
        ],
    
        'tenant' => [
            'id'              => 'আইডি',
            'first-name'      => 'প্রথম নাম',
            'last-name'       => 'শেষ নাম',
            'email'           => 'ইমেইল',
            'skype'           => 'স্কাইপ',
            'c-name'          => 'সি নাম',
            'add-address'     => 'ঠিকানা যোগ করুন',
            'country'         => 'দেশ',
            'city'            => 'শহর',
            'address1'        => 'ঠিকানা 1',
            'address2'        => 'ঠিকানা 2',
            'address'         => 'ঠিকানা তালিকা',
            'company'         => 'টেনেন্ট',
            'profile'         => 'প্রোফাইল',
            'update'          => 'আপডেট',
            'address-details' => 'ঠিকানা বিবরণ',
            'create-failed'   => 'সতর্কতা: অজানা কারণে :attribute তৈরি করা যাচ্ছে না।',
            'update-success'  => 'সাফল্য: :resource সফলভাবে আপডেট হয়েছে।',
            'update-failed'   => 'সতর্কতা: অজানা কারণে :resource আপডেট করা যাচ্ছে না।',
    
            'company-address' => [
                'add-address-title'    => 'নতুন ঠিকানা',
                'update-address-title' => 'ঠিকানা আপডেট করুন',
                'save-btn-title'       => 'ঠিকানা সংরক্ষণ',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'একটি অর্ডার :order_id স্থান করা হয়েছে, :placed_by দ্বারা :created_at।',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'উফ! দেখা যাচ্ছে না! আপনি যে পৃষ্ঠাটি খুঁজছেন সেটি ছুটিতে আছে। মনে হচ্ছে আমরা আপনি যা খুঁজছেন তা খুঁজে পাচ্ছি না।',
            'title'       => '404 পৃষ্ঠা পাওয়া যায়নি',
        ],

        '401' => [
            'description' => 'উফ! দেখা যাচ্ছে আপনি এই পৃষ্ঠায় অ্যাক্সেস করতে অনুমতি পাচ্ছেন না। মনে হচ্ছে আপনি প্রয়োজনীয় শংসাপত্র অনুপস্থিত আছেন।',
            'title'       => '401 অননুমোদিত',
        ],

        '403' => [
            'description' => 'উফ! এই পৃষ্ঠাটি অপ্রাপ্য। মনে হচ্ছে আপনার এই সামগ্রী দেখার জন্য আপনার প্রয়োজনীয় অনুমতি নেই।',
            'title'       => '403 নিষিদ্ধ',
        ],

        '500' => [
            'description' => 'উফ! কিছু ভুল হয়েছে। মনে হচ্ছে আমরা আপনি যে পৃষ্ঠাটি খুঁজছেন তা লোড করতে সমস্যা হচ্ছে।',
            'title'       => '500 অভ্যন্তরীণ সার্ভার ত্রুটি',
        ],

        '503' => [
            'description' => 'উফ! মনে হচ্ছে আমরা সাময়িকভাবে মেয়াদ শেষ হয়ে গেছি। কিছুক্ষণ পরে আবার চেক করুন।',
            'title'       => '503 সেবা অনুপলব্ধ',
        ],
    ],
];
