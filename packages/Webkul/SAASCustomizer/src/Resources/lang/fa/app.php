<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'نسخه : :version',
                'account-title' => 'حساب کاربری',
                'logout'        => 'خروج',
                'my-account'    => 'حساب من',
                'visit-shop'    => 'بازدید از فروشگاه',
            ],
    
            'sidebar' => [
                'tenants'          => 'مستاجران',
                'tenant-customers' => 'مشتریان',
                'tenant-products'  => 'محصولات',
                'tenant-orders'    => 'سفارش‌ها',
                'settings'         => 'تنظیمات',
                'agents'           => 'نمایندگان',
                'roles'            => 'نقش‌ها',
                'locales'          => 'زبان‌ها',
                'currencies'       => 'ارزها',
                'channels'         => 'کانال‌ها',
                'exchange-rates'   => 'نرخ‌های ارز',
                'themes'           => 'قالب‌ها',
                'cms'              => 'مدیریت محتوا',
                'configurations'   => 'پیکربندی',
                'general'          => 'عمومی',
                'send-email'       => 'ارسال ایمیل',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'مستأجران',
            'create'         => 'افزودن',
            'edit'           => 'ویرایش',
            'delete'         => 'حذف',
            'cancel'         => 'لغو',
            'view'           => 'نمایش',
            'mass-delete'    => 'حذف گروهی',
            'mass-update'    => 'به‌روزرسانی گروهی',
            'customers'      => 'مشتریان',
            'products'       => 'محصولات',
            'orders'         => 'سفارش‌ها',
            'settings'       => 'تنظیمات',
            'agents'         => 'نمایندگان',
            'roles'          => 'نقش‌ها',
            'locales'        => 'محلی‌ها',
            'currencies'     => 'واحد پول',
            'exchange-rates' => 'نرخ‌های ارز',
            'channels'       => 'کانال‌ها',
            'themes'         => 'قالب‌ها',
            'send-email'     => 'ارسال ایمیل',
            'cms'            => 'مدیریت محتوا',
            'configuration'  => 'پیکربندی',
            'download'       => 'دانلود',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => 'ورود مدیریت سوپر',
                'email'                => 'آدرس ایمیل',
                'password'             => 'رمز عبور',
                'btn-submit'           => 'ورود',
                'forget-password-link' => 'رمز عبور را فراموش کرده‌ام؟',
                'submit-btn'           => 'ورود',
                'login-success'        => 'موفقیت: شما با موفقیت وارد شده‌اید.',
                'login-error'          => 'لطفاً اطلاعات ورود خود را بررسی کنید و دوباره تلاش کنید.',
                'activate-warning'     => 'حساب کاربری شما هنوز فعال نشده است، لطفاً با مدیر تماس بگیرید.',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'فراموشی رمز عبور',
                    'title'           => 'بازیابی رمز عبور',
                    'email'           => 'آدرس ایمیل ثبت‌نامی',
                    'reset-link-sent' => 'لینک بازیابی رمز عبور ارسال شد',
                    'sign-in-link'    => 'بازگشت به صفحه ورود؟',
                    'email-not-exist' => 'ایمیل وجود ندارد',
                    'submit-btn'      => 'بازنشانی',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'بازنشانی رمز عبور',
                'back-link-title'  => 'بازگشت به صفحه ورود؟',
                'confirm-password' => 'تأیید رمز عبور',
                'email'            => 'آدرس ایمیل ثبت‌نامی',
                'password'         => 'رمز عبور',
                'submit-btn'       => 'بازنشانی رمز عبور',
            ],
        ],

        'tenants' => [
            'index' => [
                'title'        => 'لیست مستأجران',
                'register-btn' => 'ثبت مستأجر',
        
                'create' => [
                    'title'             => 'ایجاد مستأجر',
                    'first-name'        => 'نام',
                    'last-name'         => 'نام خانوادگی',
                    'user-name'         => 'نام کاربری',
                    'organization-name' => 'نام سازمان',
                    'phone'             => 'تلفن',
                    'email'             => 'ایمیل',
                    'password'          => 'رمز عبور',
                    'confirm-password'  => 'تأیید رمز عبور',
                    'save-btn'          => 'ذخیره مستأجر',
                    'back-btn'          => 'بازگشت',
                ],
        
                'datagrid' => [
                    'id'                  => 'شناسه',
                    'user-name'           => 'نام کاربری',
                    'organization'        => 'سازمان',
                    'domain'              => 'دامنه',
                    'cname'               => 'Cname',
                    'status'              => 'وضعیت',
                    'active'              => 'فعال',
                    'disable'             => 'غیرفعال',
                    'view'                => 'مشاهده بررسی‌ها',
                    'edit'                => 'ویرایش مستأجر',
                    'delete'              => 'حذف مستأجر',
                    'mass-delete'         => 'حذف گروهی',
                    'mass-delete-success' => 'مستأجران انتخاب‌شده با موفقیت حذف شدند',
                ],
            ],
        
            'edit' => [
                'title'             => 'ویرایش مستأجر',
                'first-name'        => 'نام',
                'last-name'         => 'نام خانوادگی',
                'user-name'         => 'نام کاربری',
                'cname'             => 'Cname',
                'organization-name' => 'نام سازمان',
                'phone'             => 'تلفن',
                'status'            => 'وضعیت',
                'email'             => 'ایمیل',
                'password'          => 'رمز عبور',
                'confirm-password'  => 'تأیید رمز عبور',
                'save-btn'          => 'ذخیره مستأجر',
                'back-btn'          => 'بازگشت',
                'general'           => 'عمومی',
                'settings'          => 'تنظیمات',
            ],
        
            'view' => [
                'title'                        => 'بررسی‌هاي مستأجر',
                'heading'                      => 'مستأجر - :tenant_name',
                'email-address'                => 'آدرس ایمیل',
                'phone'                        => 'تلفن',
                'domain-information'           => 'اطلاعات دامنه',
                'mapped-domain'                => 'دامنه نقشه برداری شده',
                'cname-information'            => 'اطلاعات cName',
                'cname-entry'                  => 'ورودی cName',
                'attribute-information'        => 'اطلاعات خصوصیت',
                'no-of-attributes'             => 'تعداد خصوصیت‌ها',
                'attribute-family-information' => 'اطلاعات خانواده خصوصیت',
                'no-of-attribute-families'     => 'تعداد خانواده‌های خصوصیت',
                'product-information'          => 'اطلاعات محصول',
                'no-of-products'               => 'تعداد محصولات',
                'customer-information'         => 'اطلاعات مشتری',
                'no-of-customers'              => 'تعداد مشتریان',
                'customer-group-information'   => 'اطلاعات گروه مشتری',
                'no-of-customer-groups'        => 'تعداد گروه‌های مشتری',
                'category-information'         => 'اطلاعات دسته‌بندی',
                'no-of-categories'             => 'تعداد دسته‌بندی‌ها',
                'addresses'                    => 'لیست آدرس‌ها (:count)',
                'empty-title'                  => 'افزودن آدرس مستأجر',
            ],
        
            'create-success' => 'مستأجر با موفقیت ایجاد شد',
            'delete-success' => 'مستأجر با موفقیت حذف شد',
            'delete-failed'  => 'حذف مستأجر ناموفق بود',
            'product-copied' => 'مستأجر با موفقیت کپی شد',
            'update-success' => 'مستأجر با موفقیت به‌روز شد',
        
            'customers' => [
                'index' => [
                    'title' => 'لیست مشتریان',
        
                    'datagrid' => [
                        'id'             => 'شناسه',
                        'domain'         => 'دامنه',
                        'customer-name'  => 'نام مشتری',
                        'email'          => 'ایمیل',
                        'customer-group' => 'گروه مشتری',
                        'phone'          => 'تلفن',
                        'status'         => 'وضعیت',
                        'active'         => 'فعال',
                        'inactive'       => 'غیر فعال',
                        'is-suspended'   => 'معلق',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => 'لیست محصولات',
        
                    'datagrid' => [
                        'id'               => 'شناسه',
                        'domain'           => 'دامنه',
                        'name'             => 'نام',
                        'sku'              => 'SKU',
                        'attribute-family' => 'خانواده خصوصیت',
                        'image'            => 'تصویر',
                        'price'            => 'قیمت',
                        'qty'              => 'تعداد',
                        'status'           => 'وضعیت',
                        'active'           => 'فعال',
                        'inactive'         => 'غیر فعال',
                        'category'         => 'دسته‌بندی',
                        'type'             => 'نوع',
                    ],
                ],
            ],
        
            'orders' => [
                'index' => [
                    'title' => 'لیست سفارشات',
        
                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => 'شناسه سفارش',
                        'domain'          => 'دامنه',
                        'sub-total'       => 'جمع جزئی',
                        'grand-total'     => 'جمع کل',
                        'order-date'      => 'تاریخ سفارش',
                        'channel-name'    => 'نام کانال',
                        'status'          => 'وضعیت',
                        'processing'      => 'در حال پردازش',
                        'completed'       => 'تکمیل شده',
                        'canceled'        => 'لغو شده',
                        'closed'          => 'بسته شده',
                        'pending'         => 'در انتظار',
                        'pending-payment' => 'در انتظار پرداخت',
                        'fraud'           => 'تقلب',
                        'customer'        => 'مشتری',
                        'email'           => 'ایمیل',
                        'location'        => 'موقعیت',
                        'images'          => 'تصاویر',
                        'pay-by'          => 'پرداخت توسط - ',
                        'pay-via'         => 'پرداخت از طریق',
                        'date'            => 'تاریخ',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'لیست مشاوران',
                    'register-btn' => 'ایجاد مشاور',
            
                    'create' => [
                        'title'             => 'ایجاد مشاور',
                        'first-name'        => 'نام',
                        'last-name'         => 'نام خانوادگی',
                        'email'             => 'ایمیل',
                        'current-password'  => 'رمز عبور فعلی',
                        'password'          => 'رمز عبور',
                        'confirm-password'  => 'تأیید رمز عبور',
                        'role'              => 'نقش',
                        'select'            => 'انتخاب',
                        'status'            => 'وضعیت',
                        'save-btn'          => 'ذخیره مشاور',
                        'back-btn'          => 'بازگشت',
                        'upload-image-info' => 'آپلود تصویر پروفایل (110px X 110px) با فرمت PNG یا JPG',
                    ],
            
                    'edit' => [
                        'title' => 'ویرایش مشاور',
                    ],
            
                    'datagrid' => [
                        'id'      => 'شناسه',
                        'name'    => 'نام',
                        'email'   => 'ایمیل',
                        'role'    => 'نقش',
                        'status'  => 'وضعیت',
                        'active'  => 'فعال',
                        'disable' => 'غیرفعال',
                        'actions' => 'عملیات',
                        'edit'    => 'ویرایش',
                        'delete'  => 'حذف',
                    ],
                ],
            
                'create-success'             => 'موفقیت: مشاور ادمین اصلی با موفقیت ایجاد شد',
                'delete-success'             => 'مشاور با موفقیت حذف شد',
                'delete-failed'              => 'حذف مشاور ناموفق بود',
                'cannot-change'              => 'نام مشاور :name قابل تغییر نیست',
                'product-copied'             => 'مشاور با موفقیت کپی شد',
                'update-success'             => 'مشاور با موفقیت به‌روزرسانی شد',
                'invalid-password'           => 'رمز عبور فعلی وارد شده اشتباه است',
                'last-delete-error'          => 'هشدار: حداقل یک مشاور ادمین اصلی لازم است',
                'login-delete-error'         => 'هشدار: شما نمی‌توانید حساب کاربری خود را حذف کنید.',
                'administrator-delete-error' => 'هشدار: حداقل یک مشاور ادمین اصلی با دسترسی مدیر لازم است',
            ],
            
            'roles' => [
                'index' => [
                    'title'      => 'لیست نقش‌ها',
                    'create-btn' => 'ایجاد نقش',
            
                    'datagrid' => [
                        'id'              => 'شناسه',
                        'name'            => 'نام',
                        'permission-type' => 'نوع مجوز',
                        'actions'         => 'عملیات',
                        'edit'            => 'ویرایش',
                        'delete'          => 'حذف',
                    ],
                ],
            
                'create' => [
                    'access-control' => 'کنترل دسترسی',
                    'all'            => 'همه',
                    'back-btn'       => 'بازگشت',
                    'custom'         => 'سفارشی',
                    'description'    => 'توضیحات',
                    'general'        => 'عمومی',
                    'name'           => 'نام',
                    'permissions'    => 'مجوزها',
                    'save-btn'       => 'ذخیره نقش',
                    'title'          => 'ایجاد نقش',
                ],
            
                'edit' => [
                    'access-control' => 'کنترل دسترسی',
                    'all'            => 'همه',
                    'back-btn'       => 'بازگشت',
                    'custom'         => 'سفارشی',
                    'description'    => 'توضیحات',
                    'general'        => 'عمومی',
                    'name'           => 'نام',
                    'permissions'    => 'مجوزها',
                    'save-btn'       => 'ذخیره نقش',
                    'title'          => 'ویرایش نقش',
                ],
            
                'being-used'        => 'نقش در حال استفاده توسط مشاور دیگری است',
                'last-delete-error' => 'آخرین نقش قابل حذف نیست',
                'create-success'    => 'نقش با موفقیت ایجاد شد',
                'delete-success'    => 'نقش با موفقیت حذف شد',
                'delete-failed'     => 'حذف نقش ناموفق بود',
                'update-success'    => 'نقش با موفقیت به‌روزرسانی شد',
            ],

            'locales' => [
                'index' => [
                    'title'      => 'لیست محلی‌ها',
                    'create-btn' => 'ایجاد محلی',
            
                    'create' => [
                        'title'            => 'ایجاد محلی',
                        'code'             => 'کد',
                        'name'             => 'نام',
                        'direction'        => 'جهت',
                        'select-direction' => 'انتخاب جهت',
                        'text-ltr'         => 'چپ به راست',
                        'text-rtl'         => 'راست به چپ',
                        'locale-logo'      => 'آرم محلی',
                        'logo-size'        => 'ابعاد تصویر باید مانند 24px × 16px باشد',
                        'save-btn'         => 'ذخیره محلی',
                    ],
            
                    'edit' => [
                        'title'     => 'ویرایش محلی',
                        'code'      => 'کد',
                        'name'      => 'نام',
                        'direction' => 'جهت',
                    ],
            
                    'datagrid' => [
                        'id'        => 'شناسه',
                        'code'      => 'کد',
                        'name'      => 'نام',
                        'direction' => 'جهت',
                        'text-ltr'  => 'چپ به راست',
                        'text-rtl'  => 'راست به چپ',
                        'actions'   => 'عملیات‌ها',
                        'edit'      => 'ویرایش',
                        'delete'    => 'حذف',
                    ],
                ],

                'being-used'        => 'محلی :locale_name به عنوان محلی پیش‌فرض در کانال استفاده می‌شود',
                'create-success'    => 'محلی با موفقیت ایجاد شد.',
                'update-success'    => 'محلی با موفقیت به‌روزرسانی شد.',
                'delete-success'    => 'محلی با موفقیت حذف شد.',
                'delete-failed'     => 'حذف محلی با شکست مواجه شد.',
                'last-delete-error' => 'حداقل یک محلی با مجوز ادمین بالاتر نیاز است.',
            ],
            
            'currencies' => [
                'index' => [
                    'title'      => 'لیست ارزها',
                    'create-btn' => 'ایجاد ارز',
            
                    'create' => [
                        'title'    => 'ایجاد ارز',
                        'code'     => 'کد',
                        'name'     => 'نام',
                        'symbol'   => 'نماد',
                        'decimal'  => 'مبنا',
                        'save-btn' => 'ذخیره ارز',
                    ],
            
                    'edit' => [
                        'title'    => 'ویرایش ارز',
                        'code'     => 'کد',
                        'name'     => 'نام',
                        'symbol'   => 'نماد',
                        'decimal'  => 'مبنا',
                        'save-btn' => 'ذخیره ارز',
                    ],
            
                    'datagrid' => [
                        'id'      => 'شناسه',
                        'code'    => 'کد',
                        'name'    => 'نام',
                        'actions' => 'عملیات‌ها',
                        'edit'    => 'ویرایش',
                        'delete'  => 'حذف',
                    ],
                ],
            
                'create-success'      => 'ارز با موفقیت ایجاد شد.',
                'update-success'      => 'ارز با موفقیت به‌روزرسانی شد.',
                'delete-success'      => 'ارز با موفقیت حذف شد.',
                'delete-failed'       => 'حذف ارز با شکست مواجه شد.',
                'last-delete-error'   => 'حداقل یک ارز با مجوز ادمین بالاتر نیاز است.',
                'mass-delete-success' => 'ارزهای انتخاب‌شده با موفقیت حذف شدند.',
            ],
            
            'exchange-rates' => [
                'index' => [
                    'title'        => 'نرخ‌های ارزی',
                    'create-btn'   => 'ایجاد نرخ ارزی',
                    'update-rates' => 'به‌روزرسانی نرخ‌ها',
            
                    'create' => [
                        'title'                  => 'ایجاد نرخ ارزی',
                        'source-currency'        => 'ارز مبدأ',
                        'target-currency'        => 'ارز مقصد',
                        'select-target-currency' => 'انتخاب ارز مقصد',
                        'rate'                   => 'نرخ',
                        'save-btn'               => 'ذخیره نرخ ارزی',
                    ],
            
                    'edit' => [
                        'title'           => 'ویرایش نرخ ارزی',
                        'source-currency' => 'ارز مبدأ',
                        'target-currency' => 'ارز مقصد',
                        'rate'            => 'نرخ',
                        'save-btn'        => 'ذخیره نرخ ارزی',
                    ],
            
                    'datagrid' => [
                        'id'            => 'شناسه',
                        'currency-name' => 'نام ارز',
                        'exchange-rate' => 'نرخ ارزی',
                        'actions'       => 'عملیات‌ها',
                        'edit'          => 'ویرایش',
                        'delete'        => 'حذف',
                    ],
                ],
            
                'create-success' => 'نرخ ارزی با موفقیت ایجاد شد.',
                'update-success' => 'نرخ ارزی با موفقیت به‌روزرسانی شد.',
                'delete-success' => 'نرخ ارزی با موفقیت حذف شد.',
                'delete-failed'  => 'حذف نرخ ارزی با شکست مواجه شد.',
            ],
            
            'channels' => [
                'index' => [
                    'title' => 'کانال‌ها',
            
                    'datagrid' => [
                        'id'       => 'شناسه',
                        'code'     => 'کد',
                        'name'     => 'نام',
                        'hostname' => 'نام میزبان',
                        'actions'  => 'عملیات‌ها',
                        'edit'     => 'ویرایش',
                        'delete'   => 'حذف',
                    ],
                ],
            
                'edit' => [
                    'title'                  => 'ویرایش کانال',
                    'back-btn'               => 'بازگشت',
                    'save-btn'               => 'ذخیره کانال',
                    'general'                => 'عمومی',
                    'code'                   => 'کد',
                    'name'                   => 'نام',
                    'description'            => 'توضیحات',
                    'hostname'               => 'نام میزبان',
                    'hostname-placeholder'   => 'https://www.example.com (آخرین کاراکتر اسلش را اضافه نکنید.)',
                    'design'                 => 'طراحی',
                    'theme'                  => 'قالب',
                    'logo'                   => 'لوگو',
                    'logo-size'              => 'رزولوشن تصویر باید 192px X 50px باشد',
                    'favicon'                => 'فاویکون',
                    'favicon-size'           => 'رزولوشن تصویر باید 16px X 16px باشد',
                    'seo'                    => 'سئو صفحه اصلی',
                    'seo-title'              => 'عنوان متا',
                    'seo-description'        => 'توضیحات متا',
                    'seo-keywords'           => 'کلمات کلیدی متا',
                    'currencies-and-locales' => 'ارزها و محلی‌ها',
                    'locales'                => 'محلی‌ها',
                    'default-locale'         => 'محلی پیش‌فرض',
                    'currencies'             => 'ارزها',
                    'default-currency'       => 'ارز پیش‌فرض',
                    'last-delete-error'      => 'حداقل یک کانال الزامی است.',
                    'settings'               => 'تنظیمات',
                    'status'                 => 'وضعیت',
                    'update-success'         => 'به‌روزرسانی کانال با موفقیت انجام شد',
                ],
            
                'update-success' => 'کانال با موفقیت به‌روزرسانی شد.',
                'delete-success' => 'کانال با موفقیت حذف شد.',
                'delete-failed'  => 'حذف کانال ناموفق بود',
            ],
            
            'themes' => [
                'index' => [
                    'create-btn' => 'ایجاد قالب',
                    'title'      => 'قالب‌ها',

                    'datagrid' => [
                        'active'       => 'فعال',
                        'channel_name' => 'نام کانال',
                        'delete'       => 'حذف',
                        'inactive'     => 'غیرفعال',
                        'id'           => 'شناسه',
                        'name'         => 'نام',
                        'status'       => 'وضعیت',
                        'sort-order'   => 'ترتیب مرتب‌سازی',
                        'type'         => 'نوع',
                        'view'         => 'مشاهده',
                    ],
                ],

                'create' => [
                    'name'       => 'نام',
                    'save-btn'   => 'ذخیره قالب',
                    'sort-order' => 'ترتیب مرتب‌سازی',
                    'title'      => 'ایجاد قالب',

                    'type' => [
                        'footer-links'     => 'لینک‌های پاورقی',
                        'image-carousel'   => 'اسلایدر تصویر',
                        'product-carousel' => 'اسلایدر محصولات',
                        'static-content'   => 'محتوای ثابت',
                        'services-content' => 'محتوای خدمات',
                        'title'            => 'نوع',
                    ],
                ],

                'edit' => [
                    'add-image-btn'                 => 'افزودن تصویر',
                    'add-filter-btn'                => 'افزودن فیلتر',
                    'add-footer-link-btn'           => 'افزودن لینک پاورقی',
                    'add-link'                      => 'افزودن لینک',
                    'asc'                           => 'صعودی',
                    'back'                          => 'بازگشت',
                    'category-carousel-description' => 'نمایش دسته‌بندی‌ها به شکل جذاب با استفاده از اسلایدر دینامیک.',
                    'category-carousel'             => 'اسلایدر دسته‌بندی',
                    'create-filter'                 => 'ایجاد فیلتر',
                    'css'                           => 'سی‌اس‌اس',
                    'column'                        => 'ستون',
                    'channels'                      => 'کانال‌ها',
                    'desc'                          => 'نزولی',
                    'delete'                        => 'حذف',
                    'edit'                          => 'ویرایش',
                    'footer-title'                  => 'عنوان پاورقی',
                    'footer-link'                   => 'لینک‌های پاورقی',
                    'footer-link-form-title'        => 'لینک پاورقی',
                    'filter-title'                  => 'عنوان فیلتر',
                    'filters'                       => 'فیلترها',
                    'footer-link-description'       => 'جهت پیمایش راحت در وب‌سایت از طریق لینک‌های پاورقی.',
                    'general'                       => 'عمومی',
                    'html'                          => 'اچ.تی.ام.ال',
                    'image'                         => 'تصویر',
                    'image-size'                    => 'رزولوشن تصویر باید (1920px X 700px) باشد',
                    'image-title'                   => 'عنوان تصویر',
                    'image-upload-message'          => 'تنها تصاویر (.jpeg, .jpg, .png, .webp, ..) مجاز هستند.',
                    'key'                           => 'کلید: :key',
                    'key-input'                     => 'کلید',
                    'link'                          => 'لینک',
                    'limit'                         => 'محدودیت',
                    'name'                          => 'نام',
                    'product-carousel'              => 'اسلایدر محصولات',
                    'product-carousel-description'  => 'نمایش محصولات با زیبایی با استفاده از اسلایدر دینامیک و واکنش‌پذیر.',
                    'path'                          => 'مسیر',
                    'preview'                       => 'پیش‌نمایش',
                    'slider'                        => 'اسلایدر',
                    'static-content-description'    => 'با محتوای ثابت و مختصر، جذابیت جماعت خود را افزایش دهید.',
                    'static-content'                => 'محتوای ثابت',
                    'slider-description'            => 'سفارشی‌سازی مربوط به اسلایدر.',
                    'slider-required'               => 'فیلد اسلایدر الزامی است.',
                    'slider-add-btn'                => 'افزودن اسلایدر',
                    'save-btn'                      => 'ذخیره',
                    'sort'                          => 'مرتب‌سازی',
                    'sort-order'                    => 'ترتیب مرتب‌سازی',
                    'status'                        => 'وضعیت',
                    'slider-image'                  => 'تصویر اسلایدر',
                    'select'                        => 'انتخاب',
                    'title'                         => 'ویرایش قالب',
                    'update-slider'                 => 'به‌روزرسانی اسلایدر',
                    'url'                           => 'آدرس اینترنتی',
                    'value-input'                   => 'مقدار',
                    'value'                         => 'مقدار: :value',

                    'services-content' => [
                        'add-btn'            => 'افزودن خدمات',
                        'channels'           => 'کانال‌ها',
                        'delete'             => 'حذف',
                        'description'        => 'توضیحات',
                        'general'            => 'عمومی',
                        'name'               => 'نام',
                        'save-btn'           => 'ذخیره',
                        'service-icon'       => 'آیکون خدمات',
                        'service-icon-class' => 'کلاس آیکون خدمات',
                        'service-info'       => 'سفارشی‌سازی مربوط به خدمات.',
                        'services'           => 'خدمات',
                        'sort-order'         => 'ترتیب مرتب‌سازی',
                        'status'             => 'وضعیت',
                        'title'              => 'عنوان',
                        'update-service'     => 'به‌روزرسانی خدمات',
                    ],
                ],

                'create-success' => 'قالب با موفقیت ایجاد شد',
                'delete-success' => 'قالب با موفقیت حذف شد',
                'update-success' => 'قالب با موفقیت به‌روزرسانی شد',
                'delete-failed'  => 'خطا در هنگام حذف محتوای قالب.',
            ],

            'email' => [
                'create' => [
                    'send-btn'                  => 'ارسال ایمیل',
                    'back-btn'                  => 'بازگشت',
                    'title'                     => 'ارسال ایمیل',
                    'general'                   => 'عمومی',
                    'body'                      => 'متن',
                    'subject'                   => 'موضوع',
                    'dear'                      => 'عزیز :agent_name',
                    'agent-registration'        => 'ثبت نام موفقیت‌آمیز نماینده Saas',
                    'summary'                   => 'حساب کاربری شما ایجاد شده است. جزئیات حساب کاربری شما به شرح زیر می‌باشد: ',
                    'saas-url'                  => 'دامنه',
                    'email'                     => 'ایمیل',
                    'password'                  => 'رمز عبور',
                    'sign-in'                   => 'ورود',
                    'thanks'                    => 'سپاسگزاریم!',
                    'send-email-to-all-tenants' => 'ارسال ایمیل به تمام مستأجران',
                ],
            
                'send-success' => 'ایمیل با موفقیت ارسال شد.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'لیست صفحات CMS',
                'create-btn' => 'ایجاد صفحه',
        
                'datagrid' => [
                    'id'                  => 'شناسه',
                    'page-title'          => 'عنوان صفحه',
                    'url-key'             => 'کلید URL',
                    'status'              => 'وضعیت',
                    'active'              => 'فعال',
                    'disable'             => 'غیرفعال',
                    'edit'                => 'ویرایش صفحه',
                    'delete'              => 'حذف صفحه',
                    'mass-delete'         => 'حذف انبوه',
                    'mass-delete-success' => 'صفحات CMS انتخاب شده با موفقیت حذف شدند',
                ],
            ],
        
            'create' => [
                'title'            => 'ایجاد صفحه CMS',
                'first-name'       => 'نام',
                'general'          => 'عمومی',
                'page-title'       => 'عنوان',
                'channels'         => 'کانال‌ها',
                'content'          => 'محتوا',
                'meta-keywords'    => 'کلمات کلیدی متا',
                'meta-description' => 'توضیحات متا',
                'meta-title'       => 'عنوان متا',
                'seo'              => 'سئو',
                'url-key'          => 'کلید URL',
                'description'      => 'توضیحات',
                'save-btn'         => 'ذخیره صفحه CMS',
                'back-btn'         => 'بازگشت',
            ],
        
            'edit' => [
                'title'            => 'ویرایش صفحه',
                'preview-btn'      => 'پیش‌نمایش صفحه',
                'save-btn'         => 'ذخیره صفحه',
                'general'          => 'عمومی',
                'page-title'       => 'عنوان صفحه',
                'back-btn'         => 'بازگشت',
                'channels'         => 'کانال‌ها',
                'content'          => 'محتوا',
                'seo'              => 'سئو',
                'meta-keywords'    => 'کلمات کلیدی متا',
                'meta-description' => 'توضیحات متا',
                'meta-title'       => 'عنوان متا',
                'url-key'          => 'کلید URL',
                'description'      => 'توضیحات',
            ],
        
            'create-success' => 'CMS با موفقیت ایجاد شد.',
            'delete-success' => 'CMS با موفقیت حذف شد.',
            'update-success' => 'CMS با موفقیت به‌روزرسانی شد.',
            'no-resource'    => 'منبع موجود نیست.',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => 'حذف',
                'enable-at-least-one-shipping' => 'حداقل یک روش حمل‌ونقل را فعال کنید.',
                'enable-at-least-one-payment'  => 'حداقل یک روش پرداخت را فعال کنید.',
                'save-btn'                     => 'ذخیره پیکربندی',
                'save-message'                 => 'پیکربندی با موفقیت ذخیره شد',
                'title'                        => 'پیکربندی',
        
                'general' => [
                    'info'  => 'مدیریت طرح و جزئیات ایمیل',
                    'title' => 'عمومی',
        
                    'design' => [
                        'info'  => 'تنظیم لوگو و آیکون فاویکون.',
                        'title' => 'طراحی',
        
                        'super' => [
                            'info'          => 'لوگوی ادمین اصلی تصویر ممیز یا نشانه ممیز که نمایانگر رابط مدیریتی یک سیستم یا وب‌سایت است، اغلب قابل تنظیم است.',
                            'admin-logo'    => 'لوگو ادمین',
                            'logo-image'    => 'تصویر لوگو',
                            'favicon-image' => 'تصویر فاویکون',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => 'تنظیم آدرس ایمیل برای ادمین اصلی.',
                        'title' => 'نماینده اصلی',
        
                        'super' => [
                            'info'          => 'تنظیم آدرس ایمیل برای ادمین اصلی برای دریافت اعلان‌های ایمیلی',
                            'email-address' => 'آدرس ایمیل',
                        ],

                        'social-connect' => [
                            'title'    => 'اتصال اجتماعی',
                            'info'     => 'پلتفرم‌های رسانه‌های اجتماعی فرصت‌هایی برای تعامل مستقیم با مخاطبین شما از طریق نظرات، پسندها و اشتراک‌گذاری‌ها فراهم می‌کنند که تعامل و ایجاد اجتماع در اطراف برند شما را تقویت می‌کند.',
                            'facebook' => 'فیسبوک',
                            'twitter'  => 'توییتر',
                            'linkedin' => 'لینکداین',
                        ],
                    ],
        
                    'content' => [
                        'info'   => 'تنظیم اطلاعات سربرگ و پاورقی برای طرح ثبت نام مستأجر.',
                        'title'  => 'محتوا',
        
                        'footer' => [
                            'info'           => 'تنظیم محتوای پاورقی',
                            'title'          => 'پاورقی',
                            'footer-content' => 'متن پاورقی',
                            'footer-toggle'  => 'پاورقی را فعال کنید',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => 'مدیریت جزئیات فروش، حمل‌ونقل و روش‌های پرداخت',
                    'title' => 'فروش',
        
                    'shipping-methods' => [
                        'info'  => 'تنظیم اطلاعات روش‌های حمل‌ونقل',
                        'title' => 'روش‌های حمل‌ونقل',
                    ],
        
                    'payment-methods' => [
                        'info'  => 'تنظیم اطلاعات روش‌های پرداخت',
                        'title' => 'روش‌های پرداخت',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => 'حداقل یک روش حمل‌ونقل را فعال کنید.',
            'enable-at-least-one-payment'  => 'حداقل یک روش پرداخت را فعال کنید.',
            'save-message'                 => 'موفقیت: پیکربندی ادمین اصلی با موفقیت ذخیره شد.',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'ثبت نام به عنوان اجاره‌گیرنده',
            ],
    
            'footer' => [
                'footer-text'     => '© حق نسخه 2010 - 2023، نرم‌افزار وب‌کال (ثبت‌نام در هند). تمام حقوق محفوظ است.',
                'connect-with-us' => 'ارتباط با ما',
                'text-locale'     => 'زبان',
                'text-currency'   => 'واحد پول',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => 'ثبت نام تاجر',
            'step-1'              => 'مرحله 1',
            'auth-cred'           => 'اعتبارات احراز هویت',
            'email'               => 'ایمیل',
            'phone'               => 'تلفن',
            'username'            => 'نام کاربری',
            'password'            => 'رمز عبور',
            'cpassword'           => 'تأیید رمز عبور',
            'continue'            => 'ادامه',
            'step-2'              => 'مرحله 2',
            'personal'            => 'جزئیات شخصی',
            'first-name'          => 'نام',
            'last-name'           => 'نام خانوادگی',
            'step-3'              => 'مرحله 3',
            'org-details'         => 'جزئیات سازمان',
            'org-name'            => 'نام سازمان',
            'company-activated'   => 'موفقیت: شرکت با موفقیت فعال شد.',
            'company-deactivated' => 'موفقیت: شرکت با موفقیت غیرفعال شد.',
            'company-updated'     => 'موفقیت: شرکت با موفقیت به‌روزرسانی شد.',
            'something-wrong'     => 'هشدار: مشکلی پیش آمد.',
            'store-created'       => 'موفقیت: فروشگاه با موفقیت ایجاد شد.',
            'something-wrong-1'   => 'هشدار: مشکلی پیش آمد، لطفاً بعداً دوباره امتحان کنید.',
            'content'             => 'تبدیل به تاجر و ایجاد فروشگاه خود راحت و بدون نگرانی از نصب و مدیریت سرور است. شما فقط باید ثبت نام کنید، داده‌های محصول را بارگذاری کنید و فروشگاه خود را دریافت کنید. ماژول SaaS چند شرکتی Laravel امکانات سفارشی‌سازی آسان را ارائه می‌دهد. این به معنای آن است که تاجران به راحتی می‌توانند ویژگی‌ها و قابلیت‌های اضافی را به فروشگاه خود اضافه یا به راحتی به آن افزوده یا بهبود بخشند.',
    
            'right-panel' => [
                'heading'    => 'چگونه حساب تاجر را راه‌اندازی کنیم',
                'para'       => 'راه‌اندازی ماژول در چند گام بسیار آسان است',
                'step-one'   => 'اطلاعات احراز هویت را مانند ایمیل، رمز عبور و تأیید رمز عبور وارد کنید',
                'step-two'   => 'جزئیات شخصی مانند نام، نام خانوادگی و شماره تلفن را وارد کنید.',
                'step-three' => 'جزئیات سازمانی مانند نام کاربری و نام سازمان را وارد کنید',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => 'هشدار: ایجاد بیش از یک کانال مجاز نیست',
            'channel-hostname'                  => 'هشدار: لطفاً با مدیر تماس بگیرید تا نام میزبان خود را تغییر دهید',
            'same-domain'                       => 'هشدار: نمی‌توانید زیردامنه همان دامنه اصلی را نگه دارید',
            'block-message'                     => 'هشدار: اگر می‌خواهید این اجاره‌گیرنده را باز کنید، با ما تماس بگیرید. ما 24x7 برای حل مشکل شما در دسترس هستیم.',
            'blocked'                           => 'مسدود شده است',
            'illegal-action'                    => 'هشدار: شما یک عمل غیرقانونی انجام داده‌اید',
            'domain-message'                    => 'هشدار: اوه، ما نمی‌توانیم در <b>:domain</b> کمک کنیم',
            'domain-desc'                       => 'اگر می‌خواهید با <b>:domain</b> به عنوان یک سازمان حساب کاربری ایجاد کنید، احساس راحتی کنید که یک حساب کاربری ایجاد کرده و شروع به کار کنید.',
            'illegal-message'                   => 'هشدار: عملی که انجام داده‌اید توسط مدیر سایت غیرفعال شده است، لطفاً برای کسب اطلاعات بیشتر به مدیر سایت خود ایمیل بزنید.',
            'locale-creation'                   => 'هشدار: ایجاد منطقه غیر از انگلیسی مجاز نیست.',
            'locale-delete'                     => 'هشدار: نمی‌توان منطقه را حذف کرد.',
            'cannot-delete-default'             => 'هشدار: نمی‌توان کانال پیش‌فرض را حذف کرد.',
            'tenant-blocked'                    => 'اجاره‌گیرنده مسدود شده است',
            'domain-not-found'                  => 'هشدار: دامنه یافت نشد.',
            'company-blocked-by-administrator'  => 'این اجاره‌گیرنده توسط مدیر مسدود شده است',
            'not-allowed-to-visit-this-section' => 'هشدار: شما مجاز به استفاده از این بخش نیستید.',
            'auth'                              => 'هشدار: خطا در احراز هویت!',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'شرکت جدید ثبت‌نام شده',
                'first-name' => 'نام',
                'last-name'  => 'نام خانوادگی',
                'email'      => 'ایمیل',
                'name'       => 'نام',
                'username'   => 'نام کاربری',
                'domain'     => 'دامنه',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => 'شرکت جدید با موفقیت ثبت‌نام شد',
                'dear'       => 'عزیز :tenant_name',
                'greeting'   => 'به خوش آمدید و از ثبت‌نام شما سپاسگزاریم!',
                'summary'    => 'حساب شما با موفقیت ایجاد شده است و شما می‌توانید با استفاده از اطلاعات ایمیل و رمز عبور خود وارد شوید. پس از ورود، قادر به دسترسی به خدمات دیگر شامل محصولات، فروش، مشتریان، نقد و بررسی‌ها و ترویجات خواهید بود.',
                'thanks'     => 'با تشکر!',
                'visit-shop' => 'بازدید از فروشگاه',
            ],
        ],
    ],
    
    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'ویرایش جزئیات شرکت',
            'first-name'     => 'نام',
            'last-name'      => 'نام خانوادگی',
            'email'          => 'ایمیل',
            'skype'          => 'اسکایپ',
            'cname'          => 'cName',
            'phone'          => 'تلفن',
            'general'        => 'عمومی',
            'back-btn'       => 'بازگشت',
            'save-btn'       => 'ذخیره جزئیات',
            'update-success' => 'موفقیت: :resource با موفقیت به‌روزرسانی شد.',
            'update-failed'  => 'هشدار: نمی‌توان :resource را به‌روزرسانی کرد به دلیل دلایل ناشناخته.',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => 'لیست آدرس شرکت',
                'create-btn' => 'افزودن آدرس',
    
                'datagrid' => [
                    'id'          => 'شناسه',
                    'address1'    => 'آدرس 1',
                    'address2'    => 'آدرس 2',
                    'city'        => 'شهر',
                    'country'     => 'کشور',
                    'edit'        => 'ویرایش',
                    'delete'      => 'حذف',
                    'mass-delete' => 'حذف گروهی',
                ],
            ],
    
            'create' => [
                'title'     => 'ایجاد آدرس شرکت',
                'general'   => 'عمومی',
                'address1'  => 'آدرس1',
                'address2'  => 'آدرس2',
                'country'   => 'کشور',
                'state'     => 'استان',
                'city'      => 'شهر',
                'post-code' => 'کدپستی',
                'phone'     => 'تلفن',
                'back-btn'  => 'بازگشت',
                'save-btn'  => 'ذخیره آدرس',
            ],
    
            'edit' => [
                'title'     => 'ویرایش آدرس شرکت',
                'general'   => 'عمومی',
                'address1'  => 'آدرس1',
                'address2'  => 'آدرس2',
                'country'   => 'کشور',
                'state'     => 'استان',
                'city'      => 'شهر',
                'post-code' => 'کدپستی',
                'phone'     => 'تلفن',
                'back-btn'  => 'بازگشت',
                'save-btn'  => 'ذخیره آدرس',
            ],
    
            'create-success'      => 'موفقیت: آدرس شرکت با موفقیت ایجاد شد.',
            'update-success'      => 'موفقیت: آدرس شرکت با موفقیت به‌روزرسانی شد.',
            'delete-success'      => 'موفقیت: :resource با موفقیت حذف شد.',
            'delete-failed'       => 'هشدار: نمی‌توان :resource را به دلیل دلایل ناشناخته حذف کرد.',
            'mass-delete-success' => 'موفقیت: آدرس‌های انتخاب شده با موفقیت حذف شدند.',
        ],
    
        'system' => [
            'social-login'           => 'ورود اجتماعی',
            'facebook'               => 'تنظیمات فیس‌بوک',
            'facebook-client-id'     => 'شناسه مشتری فیس‌بوک',
            'facebook-client-secret' => 'رمز مشتری فیس‌بوک',
            'facebook-callback-url'  => 'آدرس بازگشت فیس‌بوک',
            'twitter'                => 'تنظیمات توییتر',
            'twitter-client-id'      => 'شناسه مشتری توییتر',
            'twitter-client-secret'  => 'رمز مشتری توییتر',
            'twitter-callback-url'   => 'آدرس بازگشت توییتر',
            'google'                 => 'تنظیمات گوگل',
            'google-client-id'       => 'شناسه مشتری گوگل',
            'google-client-secret'   => 'رمز مشتری گوگل',
            'google-callback-url'    => 'آدرس بازگشت گوگل',
            'linkedin'               => 'تنظیمات لینکداین',
            'linkedin-client-id'     => 'شناسه مشتری لینکداین',
            'linkedin-client-secret' => 'رمز مشتری لینکداین',
            'linkedin-callback-url'  => 'آدرس بازگشت لینکداین',
            'github'                 => 'تنظیمات گیت‌هاب',
            'github-client-id'       => 'شناسه مشتری گیت‌هاب',
            'github-client-secret'   => 'رمز مشتری گیت‌هاب',
            'github-callback-url'    => 'آدرس بازگشت گیت‌هاب',
            'email-credentials'      => 'اعتبارات ایمیل',
            'mail-driver'            => 'درایور ایمیل',
            'mail-host'              => 'میزبان ایمیل',
            'mail-port'              => 'پورت ایمیل',
            'mail-username'          => 'نام کاربری ایمیل',
            'mail-password'          => 'رمز عبور ایمیل',
            'mail-encryption'        => 'رمزنگاری ایمیل',
        ],
    
        'tenant' => [
            'id'              => 'شناسه',
            'first-name'      => 'نام',
            'last-name'       => 'نام خانوادگی',
            'email'           => 'ایمیل',
            'skype'           => 'اسکایپ',
            'c-name'          => 'CName',
            'add-address'     => 'افزودن آدرس',
            'country'         => 'کشور',
            'city'            => 'شهر',
            'address1'        => 'آدرس 1',
            'address2'        => 'آدرس 2',
            'address'         => 'لیست آدرس',
            'company'         => 'اجاره‌گیرنده',
            'profile'         => 'پروفایل',
            'update'          => 'به‌روزرسانی',
            'address-details' => 'جزئیات آدرس',
            'create-failed'   => 'هشدار: نمی‌توان :attribute را به دلیل دلایل ناشناخته ایجاد کرد.',
            'update-success'  => 'موفقیت: :resource با موفقیت به‌روزرسانی شد.',
            'update-failed'   => 'هشدار: نمی‌توان :resource را به‌روزرسانی کرد به دلیل دلایل ناشناخته.',
        
            'company-address' => [
                'add-address-title'    => 'آدرس جدید',
                'update-address-title' => 'آدرس به‌روزرسانی شد',
                'save-btn-title'       => 'ذخیره آدرس',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'یک سفارش :order_id توسط :placed_by در :created_at ثبت شده است.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'اوه! صفحه‌ای که به دنبال آن هستید در تعطیلات است. به نظر می‌رسد ما نتوانستیم آنچه را که دنبال می‌کردید پیدا کنیم.',
            'title'       => '404 صفحه پیدا نشد',
        ],

        '401' => [
            'description' => 'اوه! به نظر می‌رسد شما مجاز به دسترسی به این صفحه نیستید. به نظر می‌رسد شما اطلاعات اعتبار لازم را ندارید.',
            'title'       => '401 غیرمجاز',
        ],

        '403' => [
            'description' => 'اوه! این صفحه ممنوع است. به نظر می‌رسد شما دسترسی لازم برای مشاهده این محتوا را ندارید.',
            'title'       => '403 ممنوع',
        ],

        '500' => [
            'description' => 'اوه! مشکلی پیش آمد. به نظر می‌رسد ما مشکلی در بارگذاری صفحه‌ای که به دنبال آن هستید داریم.',
            'title'       => '500 خطای داخلی سرور',
        ],

        '503' => [
            'description' => 'اوه! به نظر می‌رسد ما به طور موقت برای تعمیر و نگهداری غیرفعال هستیم. لطفاً بعداً مراجعه کنید.',
            'title'       => '503 سرویس در دسترس نیست',
        ],
    ],
];
