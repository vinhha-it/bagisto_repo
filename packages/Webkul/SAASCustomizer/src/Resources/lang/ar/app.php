<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'الإصدار: :version',
                'account-title' => 'الحساب',
                'logout'        => 'تسجيل الخروج',
                'my-account'    => 'حسابي',
                'visit-shop'    => 'زيارة المتجر',
            ],
    
            'sidebar' => [
                'tenants'          => 'المستأجرين',
                'tenant-customers' => 'العملاء',
                'tenant-products'  => 'المنتجات',
                'tenant-orders'    => 'الطلبات',
                'settings'         => 'الإعدادات',
                'agents'           => 'الوكلاء',
                'roles'            => 'الأدوار',
                'locales'          => 'اللغات',
                'currencies'       => 'العملات',
                'channels'         => 'القنوات',
                'exchange-rates'   => 'سعر صرف',
                'themes'           => 'السمات',
                'cms'              => 'إدارة المحتوى',
                'configurations'   => 'تكوين',
                'general'          => 'عام',
                'send-email'       => 'إرسال البريد الإلكتروني',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'المستأجرين',
            'create'         => 'إضافة',
            'edit'           => 'تحرير',
            'delete'         => 'حذف',
            'cancel'         => 'إلغاء',
            'view'           => 'عرض',
            'mass-delete'    => 'حذف جماعي',
            'mass-update'    => 'تحديث جماعي',
            'customers'      => 'العملاء',
            'products'       => 'المنتجات',
            'orders'         => 'الطلبات',
            'settings'       => 'الإعدادات',
            'agents'         => 'الوكلاء',
            'roles'          => 'الأدوار',
            'locales'        => 'اللغات',
            'currencies'     => 'العملات',
            'exchange-rates' => 'أسعار الصرف',
            'channels'       => 'القنوات',
            'themes'         => 'السمات',
            'send-email'     => 'إرسال بريد إلكتروني',
            'cms'            => 'نظام إدارة المحتوى',
            'configuration'  => 'التكوين',
            'download'       => 'تحميل',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                 => 'تسجيل الدخول للمشرف العلوي',
                'email'                 => 'عنوان البريد الإلكتروني',
                'password'              => 'كلمة المرور',
                'btn-submit'            => 'تسجيل الدخول',
                'forget-password-link'  => 'هل نسيت كلمة المرور؟',
                'submit-btn'            => 'تسجيل الدخول',
                'login-success'         => 'نجاح: لقد قمت بتسجيل الدخول بنجاح.',
                'login-error'           => 'يرجى التحقق من بيانات الاعتماد الخاصة بك والمحاولة مرة أخرى.',
                'activate-warning'      => 'حسابك لم يتم تنشيطه بعد، يرجى الاتصال بالمسؤول.',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'نسيت كلمة المرور',
                    'title'           => 'استرداد كلمة المرور',
                    'email'           => 'البريد الإلكتروني المسجل',
                    'reset-link-sent' => 'تم إرسال رابط إعادة تعيين كلمة المرور',
                    'sign-in-link'    => 'العودة إلى تسجيل الدخول؟',
                    'email-not-exist' => 'البريد الإلكتروني غير موجود',
                    'submit-btn'      => 'إعادة تعيين',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'إعادة تعيين كلمة المرور',
                'back-link-title'  => 'العودة إلى تسجيل الدخول؟',
                'confirm-password' => 'تأكيد كلمة المرور',
                'email'            => 'البريد الإلكتروني المسجل',
                'password'         => 'كلمة المرور',
                'submit-btn'       => 'إعادة تعيين كلمة المرور',
            ],
        ],
        
        'tenants' => [
            'index' => [
                'title'        => 'قائمة المستأجرين',
                'register-btn' => 'تسجيل مستأجر',
        
                'create'  => [
                    'title'             => 'إنشاء مستأجر',
                    'first-name'        => 'الاسم الأول',
                    'last-name'         => 'الاسم الأخير',
                    'user-name'         => 'اسم المستخدم',
                    'organization-name' => 'اسم الشركة',
                    'phone'             => 'الهاتف',
                    'email'             => 'البريد الإلكتروني',
                    'password'          => 'كلمة المرور',
                    'confirm-password'  => 'تأكيد كلمة المرور',
                    'save-btn'          => 'حفظ المستأجر',
                    'back-btn'          => 'رجوع',
                ],
        
                'datagrid' => [
                    'id'                  => 'المعرف',
                    'user-name'           => 'اسم المستخدم',
                    'organization'        => 'المؤسسة',
                    'domain'              => 'النطاق',
                    'cname'               => 'اسم',
                    'status'              => 'الحالة',
                    'active'              => 'نشط',
                    'disable'             => 'تعطيل',
                    'view'                => 'عرض البيانات',
                    'edit'                => 'تعديل المستأجر',
                    'delete'              => 'حذف المستأجر',
                    'mass-delete'         => 'حذف جماعي',
                    'mass-delete-success' => 'تم حذف المستأجر المحدد بنجاح',
                ],
            ],
        
            'edit'  => [
                'title'             => 'تحرير المستأجر',
                'first-name'        => 'الاسم الأول',
                'last-name'         => 'الاسم الأخير',
                'user-name'         => 'اسم المستخدم',
                'cname'             => 'اسم',
                'organization-name' => 'اسم الشركة',
                'phone'             => 'الهاتف',
                'status'            => 'الحالة',
                'email'             => 'البريد الإلكتروني',
                'password'          => 'كلمة المرور',
                'confirm-password'  => 'تأكيد كلمة المرور',
                'save-btn'          => 'حفظ المستأجر',
                'back-btn'          => 'رجوع',
                'general'           => 'عام',
                'settings'          => 'الإعدادات',
            ],
        
            'view' => [
                'title'                        => 'تحليلات المستأجر',
                'heading'                      => 'المستأجر - :tenant_name',
                'email-address'                => 'عنوان البريد الإلكتروني',
                'phone'                        => 'الهاتف',
                'domain-information'           => 'معلومات النطاق',
                'mapped-domain'                => 'نطاق معين',
                'cname-information'            => 'معلومات اسم',
                'cname-entry'                  => 'إدخال اسم',
                'attribute-information'        => 'معلومات السمة',
                'no-of-attributes'             => 'عدد السمات',
                'attribute-family-information' => 'معلومات عائلة السمات',
                'no-of-attribute-families'     => 'عدد عائلات السمات',
                'product-information'          => 'معلومات المنتج',
                'no-of-products'               => 'عدد المنتجات',
                'customer-information'         => 'معلومات العميل',
                'no-of-customers'              => 'عدد العملاء',
                'customer-group-information'   => 'معلومات مجموعة العملاء',
                'no-of-customer-groups'        => 'عدد مجموعات العملاء',
                'category-information'         => 'معلومات الفئة',
                'no-of-categories'             => 'عدد الفئات',
                'addresses'                    => 'قائمة العناوين (:count)',
                'empty-title'                  => 'عنوان المستأجر',
            ],
        
            'create-success' => 'تم إنشاء المستأجر بنجاح',
            'delete-success' => 'تم حذف المستأجر بنجاح',
            'delete-failed'  => 'فشل حذف المستأجر',
            'product-copied' => 'تم نسخ المستأجر بنجاح',
            'update-success' => 'تم تحديث المستأجر بنجاح',
        
            'customers' => [
                'index'     => [
                    'title'     => 'قائمة العملاء',
        
                    'datagrid'  => [
                        'id'             => 'المعرف',
                        'domain'         => 'النطاق',
                        'customer-name'  => 'اسم العميل',
                        'email'          => 'البريد الإلكتروني',
                        'customer-group' => 'مجموعة العملاء',
                        'phone'          => 'الهاتف',
                        'status'         => 'الحالة',
                        'active'         => 'نشط',
                        'inactive'       => 'غير نشط',
                        'is-suspended'   => 'معلق',
                    ],
                ],
            ],
        
            'products' => [
                'index'     => [
                    'title' => 'قائمة المنتجات',
        
                    'datagrid'  => [
                        'id'               => 'المعرف',
                        'domain'           => 'النطاق',
                        'name'             => 'الاسم',
                        'sku'              => 'رمز المنتج',
                        'attribute-family' => 'عائلة السمة',
                        'image'            => 'الصورة',
                        'price'            => 'السعر',
                        'qty'              => 'الكمية',
                        'status'           => 'الحالة',
                        'active'           => 'نشط',
                        'inactive'         => 'غير نشط',
                        'category'         => 'الفئة',
                        'type'             => 'النوع',
                    ],
                ],
            ],
        
            'orders' => [
                'index'     => [
                    'title' => 'قائمة الطلبات',
        
                    'datagrid'  => [
                        'id'             => '#:id',
                        'order-id'       => 'رقم الطلب',
                        'domain'         => 'النطاق',
                        'sub-total'      => 'الإجمالي الفرعي',
                        'grand-total'    => 'الإجمالي الكلي',
                        'order-date'     => 'تاريخ الطلب',
                        'channel-name'   => 'اسم القناة',
                        'status'         => 'الحالة',
                        'processing'     => 'قيد الإجراء',
                        'completed'      => 'تم الانتهاء',
                        'canceled'       => 'تم الإلغاء',
                        'closed'         => 'تم الإغلاق',
                        'pending'        => 'قيد الانتظار',
                        'pending-payment'=> 'انتظار الدفع',
                        'fraud'          => 'احتيال',
                        'customer'       => 'العميل',
                        'email'          => 'البريد الإلكتروني',
                        'location'       => 'الموقع',
                        'images'         => 'الصور',
                        'pay-by'         => 'الدفع عن طريق - ',
                        'pay-via'        => 'الدفع عبر',
                        'date'           => 'التاريخ',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'قائمة الوكلاء',
                    'register-btn' => 'إنشاء وكيل',
        
                    'create'  => [
                        'title'             => 'إنشاء وكيل',
                        'first-name'        => 'الاسم الأول',
                        'last-name'         => 'الاسم الأخير',
                        'email'             => 'البريد الإلكتروني',
                        'current-password'  => 'كلمة المرور الحالية',
                        'password'          => 'كلمة المرور',
                        'confirm-password'  => 'تأكيد كلمة المرور',
                        'role'              => 'الدور',
                        'select'            => 'اختيار',
                        'status'            => 'الحالة',
                        'save-btn'          => 'حفظ الوكيل',
                        'back-btn'          => 'رجوع',
                        'upload-image-info' => 'تحميل صورة الملف الشخصي (110 بكسل × 110 بكسل) بتنسيق PNG أو JPG',
                    ],
        
                    'edit'  => [
                        'title'      => 'تحرير الوكيل',
                    ],
        
                    'datagrid' => [
                        'id'         => 'المعرف',
                        'name'       => 'الاسم',
                        'email'      => 'البريد الإلكتروني',
                        'role'       => 'الدور',
                        'status'     => 'الحالة',
                        'active'     => 'نشط',
                        'disable'    => 'معطل',
                        'actions'    => 'الإجراءات',
                        'edit'       => 'تحرير',
                        'delete'     => 'حذف',
                    ],
                ],
        
                'create-success'             => 'نجاح: تم إنشاء وكيل المسؤول بنجاح',
                'delete-success'             => 'تم حذف المستأجر بنجاح',
                'delete-failed'              => 'فشل حذف المستأجر',
                'cannot-change'              => 'لا يمكن تغيير :name للوكيل',
                'product-copied'             => 'تم نسخ المستأجر بنجاح',
                'update-success'             => 'تم تحديث المستأجر بنجاح',
                'invalid-password'           => 'كلمة المرور الحالية التي أدخلتها غير صحيحة',
                'last-delete-error'          => 'تحذير: يتعين وجود وكيل مسؤول على الأقل',
                'login-delete-error'         => 'تحذير: لا يمكنك حذف حسابك الخاص',
                'administrator-delete-error' => 'تحذير: يتعين وجود وكيل مسؤول واحد على الأقل بصلاحية المسؤول',
            ],
        
            'roles' => [
                'index' => [
                    'title'      => 'قائمة الأدوار',
                    'create-btn' => 'إنشاء دور',
        
                    'datagrid' => [
                        'id'              => 'المعرف',
                        'name'            => 'الاسم',
                        'permission-type' => 'نوع الصلاحية',
                        'actions'         => 'الإجراءات',
                        'edit'            => 'تحرير',
                        'delete'          => 'حذف',
                    ],
                ],
        
                'create' => [
                    'access-control' => 'التحكم في الوصول',
                    'all'            => 'الكل',
                    'back-btn'       => 'رجوع',
                    'custom'         => 'مخصص',
                    'description'    => 'الوصف',
                    'general'        => 'عام',
                    'name'           => 'الاسم',
                    'permissions'    => 'الصلاحيات',
                    'save-btn'       => 'حفظ الدور',
                    'title'          => 'إنشاء دور',
                ],
        
                'edit' => [
                    'access-control' => 'التحكم في الوصول',
                    'all'            => 'الكل',
                    'back-btn'       => 'رجوع',
                    'custom'         => 'مخصص',
                    'description'    => 'الوصف',
                    'general'        => 'عام',
                    'name'           => 'الاسم',
                    'permissions'    => 'الصلاحيات',
                    'save-btn'       => 'حفظ الدور',
                    'title'          => 'تحرير الدور',
                ],
        
                'being-used'        => 'الدور يستخدم بالفعل من قبل وكيل آخر',
                'last-delete-error' => 'لا يمكن حذف آخر دور',
                'create-success'    => 'تم إنشاء الدور بنجاح',
                'delete-success'    => 'تم حذف الدور بنجاح',
                'delete-failed'     => 'فشل حذف الدور',
                'update-success'    => 'تم تحديث الدور بنجاح',
            ],
        
            'locales' => [
                'index' => [
                    'title'      => 'قائمة اللغات',
                    'create-btn' => 'إنشاء لغة',
        
                    'create' => [
                        'title'            => 'إنشاء لغة',
                        'code'             => 'الرمز',
                        'name'             => 'الاسم',
                        'direction'        => 'الاتجاه',
                        'select-direction' => 'اختر الاتجاه',
                        'text-ltr'         => 'لتر',
                        'text-rtl'         => 'من اليمين إلى اليسار',
                        'locale-logo'      => 'شعار اللغة',
                        'logo-size'        => 'يجب أن يكون حجم الصورة مثل 24 بكسل × 16 بكسل',
                        'save-btn'         => 'حفظ اللغة',
                    ],
        
                    'edit' => [
                        'title'     => 'تحرير اللغة',
                        'code'      => 'الرمز',
                        'name'      => 'الاسم',
                        'direction' => 'الاتجاه',
                    ],
        
                    'datagrid' => [
                        'id'        => 'المعرف',
                        'code'      => 'الرمز',
                        'name'      => 'الاسم',
                        'direction' => 'الاتجاه',
                        'text-ltr'  => 'لتر',
                        'text-rtl'  => 'من اليمين إلى اليسار',
                        'actions'   => 'الإجراءات',
                        'edit'      => 'تحرير',
                        'delete'    => 'حذف',
                    ],
                ],

                'being-used'        => 'تستخدم اللغة :locale_name كلغة افتراضية في القناة',
                'create-success'    => 'تم إنشاء اللغة بنجاح.',
                'update-success'    => 'تم تحديث اللغة بنجاح.',
                'delete-success'    => 'تم حذف اللغة بنجاح.',
                'delete-failed'     => 'فشل حذف اللغة',
                'last-delete-error' => 'يتعين وجود لغة مسؤولة على الأقل.',
            ],
        
            'currencies' => [
                'index' => [
                    'title'      => 'قائمة العملات',
                    'create-btn' => 'إنشاء عملة',
        
                    'create' => [
                        'title'    => 'إنشاء عملة',
                        'code'     => 'الرمز',
                        'name'     => 'الاسم',
                        'symbol'   => 'الرمز',
                        'decimal'  => 'الكسور العشرية',
                        'save-btn' => 'حفظ العملة',
                    ],
        
                    'edit' => [
                        'title'    => 'تحرير العملة',
                        'code'     => 'الرمز',
                        'name'     => 'الاسم',
                        'symbol'   => 'الرمز',
                        'decimal'  => 'الكسور العشرية',
                        'save-btn' => 'حفظ العملة',
                    ],
        
                    'datagrid' => [
                        'id'        => 'المعرف',
                        'code'      => 'الرمز',
                        'name'      => 'الاسم',
                        'actions'   => 'الإجراءات',
                        'edit'      => 'تحرير',
                        'delete'    => 'حذف',
                    ],
                ],
                
                'create-success'      => 'تم إنشاء العملة بنجاح.',
                'update-success'      => 'تم تحديث العملة بنجاح.',
                'delete-success'      => 'تم حذف العملة بنجاح.',
                'delete-failed'       => 'فشل حذف العملة',
                'last-delete-error'   => 'يتعين وجود عملة مسؤولة على الأقل.',
                'mass-delete-success' => 'تم حذف العملات المحددة بنجاح',
            ],
        
            'exchange-rates' => [
                'index' => [
                    'title'        => 'أسعار الصرف',
                    'create-btn'   => 'إنشاء سعر صرف',
                    'update-rates' => 'تحديث الأسعار',
        
                    'create' => [
                        'title'                  => 'إنشاء سعر صرف',
                        'source-currency'        => 'العملة المصدر',
                        'target-currency'        => 'العملة المستهدفة',
                        'select-target-currency' => 'اختر العملة المستهدفة',
                        'rate'                   => 'السعر',
                        'save-btn'               => 'حفظ سعر الصرف',
                    ],
        
                    'edit' => [
                        'title'           => 'تحرير سعر الصرف',
                        'source-currency' => 'العملة المصدر',
                        'target-currency' => 'العملة المستهدفة',
                        'rate'            => 'السعر',
                        'save-btn'        => 'حفظ سعر الصرف',
                    ],
        
                    'datagrid' => [
                        'id'            => 'المعرف',
                        'currency-name' => 'اسم العملة',
                        'exchange-rate' => 'سعر الصرف',
                        'actions'       => 'الإجراءات',
                        'edit'          => 'تحرير',
                        'delete'        => 'حذف',
                    ],
                ],
                
                'create-success'      => 'تم إنشاء سعر الصرف بنجاح.',
                'update-success'      => 'تم تحديث سعر الصرف بنجاح.',
                'delete-success'      => 'تم حذف سعر الصرف بنجاح.',
                'delete-failed'       => 'فشل حذف سعر الصرف',
            ],
            
            'channels' => [
                'index' => [
                    'title'        => 'القنوات',
            
                    'datagrid' => [
                        'id'        => 'المعرف',
                        'code'      => 'الكود',
                        'name'      => 'الاسم',
                        'hostname'  => 'اسم المضيف',
                        'actions'   => 'الإجراءات',
                        'edit'      => 'تحرير',
                        'delete'    => 'حذف',
                    ],
                ],
            
                'edit' => [
                    'title'                  => 'تحرير القناة',
                    'back-btn'               => 'رجوع',
                    'save-btn'               => 'حفظ القناة',
                    'general'                => 'عام',
                    'code'                   => 'الكود',
                    'name'                   => 'الاسم',
                    'description'            => 'الوصف',
                    'hostname'               => 'اسم المضيف',
                    'hostname-placeholder'   => 'https://www.example.com (لا تضيف شرطة في النهاية.)',
                    'design'                 => 'التصميم',
                    'theme'                  => 'السمة',
                    'logo'                   => 'الشعار',
                    'logo-size'              => 'يجب أن تكون دقة الصورة مثل 192 بكسل × 50 بكسل',
                    'favicon'                => 'الرمز المميز',
                    'favicon-size'           => 'يجب أن تكون دقة الصورة مثل 16 بكسل × 16 بكسل',
                    'seo'                    => 'SEO للصفحة الرئيسية',
                    'seo-title'              => 'العنوان الفعلي',
                    'seo-description'        => 'الوصف الفعلي',
                    'seo-keywords'           => 'الكلمات الرئيسية الفعلية',
                    'currencies-and-locales' => 'العملات واللغات',
                    'locales'                => 'اللغات',
                    'default-locale'         => 'اللغة الافتراضية',
                    'currencies'             => 'العملات',
                    'default-currency'       => 'العملة الافتراضية',
                    'last-delete-error'      => 'يتطلب وجود قناة واحدة على الأقل.',
                    'settings'               => 'الإعدادات',
                    'status'                 => 'الحالة',
                    'update-success'         => 'تم تحديث القناة بنجاح',
                ],
            
                'update-success'      => 'تم تحديث القناة بنجاح.',
                'delete-success'      => 'تم حذف القناة بنجاح.',
                'delete-failed'       => 'فشل حذف القناة.',
            ],
            
            'themes' => [
                'index' => [
                    'create-btn' => 'إنشاء سمة',
                    'title'      => 'السمات',

                    'datagrid'   => [
                        'active'       => 'نشط',
                        'channel_name' => 'اسم القناة',
                        'delete'       => 'حذف',
                        'inactive'     => 'غير نشط',
                        'id'           => 'المعرف',
                        'name'         => 'الاسم',
                        'status'       => 'الحالة',
                        'sort-order'   => 'ترتيب التصنيف',
                        'type'         => 'النوع',
                        'view'         => 'عرض',
                    ],
                ],

                'create' => [
                    'name'       => 'الاسم',
                    'save-btn'   => 'حفظ السمة',
                    'sort-order' => 'ترتيب التصنيف',
                    'title'      => 'إنشاء سمة',

                    'type'       => [
                        'category-carousel' => 'شريط التمرير للفئات',
                        'footer-links'      => 'روابط التذييل',
                        'image-carousel'    => 'شريط التمرير للصور',
                        'product-carousel'  => 'شريط التمرير للمنتجات',
                        'static-content'    => 'محتوى ثابت',
                        'services-content'  => 'محتوى الخدمات',
                        'title'             => 'النوع',
                    ],
                ],

                'edit' => [
                    'add-image-btn'                 => 'إضافة صورة',
                    'add-filter-btn'                => 'إضافة فلتر',
                    'add-footer-link-btn'           => 'إضافة رابط القدم',
                    'add-link'                      => 'إضافة رابط',
                    'asc'                           => 'تصاعدي',
                    'back'                          => 'رجوع',
                    'category-carousel-description' => 'عرض فئات ديناميكية بشكل جذاب باستخدام سياروسيل فئات متجاوب.',
                    'category-carousel'             => 'سياروسيل الفئات',
                    'create-filter'                 => 'إنشاء فلتر',
                    'css'                           => 'CSS',
                    'column'                        => 'عمود',
                    'channels'                      => 'القنوات',
                    'desc'                          => 'تنازلي',
                    'delete'                        => 'حذف',
                    'edit'                          => 'تعديل',
                    'footer-title'                  => 'العنوان',
                    'footer-link'                   => 'روابط القدم',
                    'footer-link-form-title'        => 'رابط القدم',
                    'filter-title'                  => 'العنوان',
                    'filters'                       => 'الفلاتر',
                    'footer-link-description'       => 'تصفح عبر روابط القدم لاستكشاف الموقع بسلاسة والحصول على المعلومات.',
                    'general'                       => 'عام',
                    'html'                          => 'HTML',
                    'image'                         => 'صورة',
                    'image-size'                    => 'يجب أن يكون حجم الصورة (1920 بكسل × 700 بكسل)',
                    'image-title'                   => 'عنوان الصورة',
                    'image-upload-message'          => 'يُسمح فقط بالصور (.jpeg، .jpg، .png، .webp، ..).',
                    'key'                           => 'المفتاح: :key',
                    'key-input'                     => 'المفتاح',
                    'link'                          => 'الرابط',
                    'limit'                         => 'الحد',
                    'name'                          => 'الاسم',
                    'product-carousel'              => 'سياروسيل المنتجات',
                    'product-carousel-description'  => 'عرض المنتجات بشكل أنيق باستخدام سياروسيل منتجات ديناميكي ومتجاوب.',
                    'path'                          => 'المسار',
                    'preview'                       => 'معاينة',
                    'slider'                        => 'السلايدر',
                    'static-content-description'    => 'تحسين التفاعل مع محتوى ثابت موجز ومعلوماتي لجمهورك.',
                    'static-content'                => 'المحتوى الثابت',
                    'slider-description'            => 'تخصيص السمات المتعلقة بالسلايدر.',
                    'slider-required'               => 'حقل السلايدر مطلوب.',
                    'slider-add-btn'                => 'إضافة سلايدر',
                    'save-btn'                      => 'حفظ',
                    'sort'                          => 'فرز',
                    'sort-order'                    => 'ترتيب الفرز',
                    'status'                        => 'الحالة',
                    'slider-image'                  => 'صورة السلايدر',
                    'select'                        => 'تحديد',
                    'title'                         => 'تعديل السمة',
                    'update-slider'                 => 'تحديث السلايدر',
                    'url'                           => 'عنوان الرابط',
                    'value-input'                   => 'القيمة',
                    'value'                         => 'القيمة: :value',
                    'services-content'              => [
                        'add-btn'            => 'إضافة خدمات',
                        'channels'           => 'القنوات',
                        'delete'             => 'حذف',
                        'description'        => 'الوصف',
                        'general'            => 'عام',
                        'name'               => 'الاسم',
                        'save-btn'           => 'حفظ',
                        'service-icon'       => 'أيقونة الخدمة',
                        'service-icon-class' => 'فئة أيقونة الخدمة',
                        'service-info'       => 'تخصيص السمة المتعلقة بالخدمة.',
                        'services'           => 'الخدمات',
                        'sort-order'         => 'ترتيب الفرز',
                        'status'             => 'الحالة',
                        'title'              => 'العنوان',
                        'update-service'     => 'تحديث الخدمات',
                    ],
                ],
            
                'create-success' => 'تم إنشاء السمة بنجاح',
                'delete-success' => 'تم حذف السمة بنجاح',
                'update-success' => 'تم تحديث السمة بنجاح',
                'delete-failed'  => 'حدث خطأ أثناء حذف السمة.',
            ],
            
            'email' => [
                'create' => [
                    'send-btn'                  => 'إرسال البريد الإلكتروني',
                    'back-btn'                  => 'رجوع',
                    'title'                     => 'إرسال البريد الإلكتروني',
                    'general'                   => 'عام',
                    'body'                      => 'المحتوى',
                    'subject'                   => 'الموضوع',
                    'dear'                      => 'عزيزي :agent_name',
                    'agent-registration'        => 'تم تسجيل وكيل Saas بنجاح',
                    'summary'                   => 'تم إنشاء حسابك. تفاصيل حسابك أدناه: ',
                    'saas-url'                  => 'النطاق',
                    'email'                     => 'البريد الإلكتروني',
                    'password'                  => 'كلمة المرور',
                    'sign-in'                   => 'تسجيل الدخول',
                    'thanks'                    => 'شكرًا!',
                    'send-email-to-all-tenants' => 'إرسال البريد الإلكتروني إلى جميع المستأجرين',
                ],
            
                'send-success' => 'تم إرسال البريد الإلكتروني بنجاح.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'قائمة صفحات CMS',
                'create-btn' => 'إنشاء صفحة',
        
                'datagrid' => [
                    'id'                  => 'المعرف',
                    'page-title'          => 'عنوان الصفحة',
                    'url-key'             => 'مفتاح URL',
                    'status'              => 'الحالة',
                    'active'              => 'نشط',
                    'disable'             => 'تعطيل',
                    'edit'                => 'تعديل الصفحة',
                    'delete'              => 'حذف الصفحة',
                    'mass-delete'         => 'حذف جماعي',
                    'mass-delete-success' => 'تم حذف صفحة(صفحات) CMS المحددة بنجاح',
                ],
            ],
        
            'create'  => [
                'title'            => 'إنشاء صفحة CMS',
                'first-name'       => 'الاسم الأول',
                'general'          => 'عام',
                'page-title'       => 'العنوان',
                'channels'         => 'القنوات',
                'content'          => 'المحتوى',
                'meta-keywords'    => 'الكلمات الرئيسية الوصفية',
                'meta-description' => 'الوصف الوصفي',
                'meta-title'       => 'العنوان الوصفي',
                'seo'              => 'تحسين محركات البحث',
                'url-key'          => 'مفتاح URL',
                'description'      => 'الوصف',
                'save-btn'         => 'حفظ صفحة CMS',
                'back-btn'         => 'رجوع',
            ],
        
            'edit' => [
                'title'            => 'تعديل الصفحة',
                'preview-btn'      => 'معاينة الصفحة',
                'save-btn'         => 'حفظ الصفحة',
                'general'          => 'عام',
                'page-title'       => 'عنوان الصفحة',
                'back-btn'         => 'رجوع',
                'channels'         => 'القنوات',
                'content'          => 'المحتوى',
                'seo'              => 'تحسين محركات البحث',
                'meta-keywords'    => 'الكلمات الرئيسية الوصفية',
                'meta-description' => 'الوصف الوصفي',
                'meta-title'       => 'العنوان الوصفي',
                'url-key'          => 'مفتاح URL',
                'description'      => 'الوصف',
            ],
        
            'create-success' => 'تم إنشاء صفحة CMS بنجاح.',
            'delete-success' => 'تم حذف صفحة CMS بنجاح.',
            'update-success' => 'تم تحديث صفحة CMS بنجاح.',
            'no-resource'    => 'المورد غير موجود.',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => 'حذف',
                'enable-at-least-one-shipping' => 'تمكين وسيلة الشحن واحدة على الأقل.',
                'enable-at-least-one-payment'  => 'تمكين وسيلة الدفع واحدة على الأقل.',
                'save-btn'                     => 'حفظ التكوين',
                'save-message'                 => 'تم حفظ التكوين بنجاح',
                'title'                        => 'التكوين',
        
                'general' => [
                    'info'      => 'إدارة تفاصيل التخطيط والبريد الإلكتروني',
                    'title'     => 'عام',
        
                    'design'    => [
                        'info'      => 'تعيين شعار ورمز الشركة.',
                        'title'     => 'تصميم',
        
                        'super'    => [
                            'info'          => 'شعار المسؤول الفائق هو الصورة أو الشعار المميز الذي يمثل واجهة الإدارة لنظام أو موقع ويب، وغالبًا ما يمكن تخصيصه.',
                            'admin-logo'    => 'شعار المسؤول',
                            'logo-image'    => 'صورة الشعار',
                            'favicon-image' => 'صورة Favicon',
                        ],
                    ],
        
                    'agent'    => [
                        'info'      => 'تعيين عنوان البريد الإلكتروني للمسؤول الفائق.',
                        'title'     => 'الوكيل الفائق',
        
                        'super'    => [
                            'info'          => 'تعيين عنوان البريد الإلكتروني للمسؤول الفائق لتلقي إشعارات البريد الإلكتروني',
                            'email-address' => 'عنوان البريد الإلكتروني',
                        ],

                        'social-connect' => [
                            'title'    => 'التواصل الاجتماعي',
                            'info'     => 'توفر منصات التواصل الاجتماعي فرصًا للتفاعل المباشر مع جمهورك من خلال التعليقات والإعجابات والمشاركات، مما يعزز التفاعل ويبني مجتمعًا حول علامتك التجارية.',
                            'facebook' => 'فيسبوك',
                            'twitter'  => 'تويتر',
                            'linkedin' => 'لينكد إن',
                        ],
                    ],
        
                    'content'    => [
                        'info'      => 'تعيين معلومات رأس وتذييل الصفحة لتخطيط تسجيل المستأجر.',
                        'title'     => 'المحتوى',
        
                        'footer'    => [
                            'info'              => 'تعيين محتوى التذييل',
                            'title'             => 'تذييل',
                            'footer-content'    => 'نص التذييل',
                            'footer-toggle'     => 'تبديل التذييل',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => 'إدارة تفاصيل المبيعات ووسائل الشحن وطرق الدفع',
                    'title' => 'المبيعات',
        
                    'shipping-methods' => [
                        'info'              => 'تعيين معلومات وسائل الشحن',
                        'title'             => 'وسائل الشحن',
                    ],
        
                    'payment-methods' => [
                        'info'          => 'تعيين معلومات وسائل الدفع',
                        'title'         => 'وسائل الدفع',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => 'تمكين وسيلة شحن واحدة على الأقل.',
            'enable-at-least-one-payment'  => 'تمكين وسيلة دفع واحدة على الأقل.',
            'save-message'                 => 'نجاح: تم حفظ تكوين المسؤول الفائق بنجاح.',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'التسجيل كمؤجر',
            ],

            'footer' => [
                'footer-text'     => '© حقوق النشر 2010 - 2023، Webkul Software (مُسجلة في الهند). كل الحقوق محفوظة.',
                'connect-with-us' => 'تواصل معنا',
                'text-locale'     => 'اللغة',
                'text-currency'   => 'العملة',
            ],
        ],

        'registration' => [
            'merchant-auth'       => 'تسجيل التاجر',
            'step-1'              => 'الخطوة 1',
            'auth-cred'           => 'بيانات اعتماد المصادقة',
            'email'               => 'البريد الإلكتروني',
            'phone'               => 'الهاتف',
            'username'            => 'اسم المستخدم',
            'password'            => 'كلمة المرور',
            'cpassword'           => 'تأكيد كلمة المرور',
            'continue'            => 'متابعة',
            'step-2'              => 'الخطوة 2',
            'personal'            => 'التفاصيل الشخصية',
            'first-name'          => 'الاسم الأول',
            'last-name'           => 'اسم العائلة',
            'step-3'              => 'الخطوة 3',
            'org-details'         => 'تفاصيل المؤسسة',
            'org-name'            => 'اسم المؤسسة',
            'company-activated'   => 'نجاح: تم تنشيط الشركة بنجاح.',
            'company-deactivated' => 'نجاح: تم إلغاء تنشيط الشركة بنجاح.',
            'company-updated'     => 'نجاح: تم تحديث الشركة بنجاح.',
            'something-wrong'     => 'تحذير: حدث خطأ ما.',
            'store-created'       => 'نجاح: تم إنشاء المتجر بنجاح.',
            'something-wrong-1'   => 'تحذير: حدث خطأ ما، يرجى المحاولة مرة أخرى لاحقًا.',
            'content'             => 'كن تاجرًا وأنشئ متجرك الخاص بسهولة دون القلق بشأن تثبيت وإدارة الخادم. كل ما عليك هو الاشتراك، تحميل بيانات المنتج والحصول على متجر التجارة الإلكترونية الخاص بك. يقدم وحدة Laravel Multi Company SaaS إمكانيات تخصيص سهلة، وهذا يعني أن التاجر يمكنه بسهولة إضافة أي ميزات إضافية ووظائف إلى متجره أو تحسينه بسهولة.',
            
            'right-panel' => [
                'heading'    => 'كيفية إعداد حساب التاجر',
                'para'       => 'من السهل إعداد الوحدة في بضع خطوات فقط',
                'step-one'   => 'أدخل بيانات اعتماد المصادقة مثل البريد الإلكتروني وكلمة المرور وتأكيد كلمة المرور',
                'step-two'   => 'أدخل التفاصيل الشخصية مثل الاسم الأول واسم العائلة ورقم الهاتف.',
                'step-three' => 'أدخل تفاصيل المؤسسة مثل اسم المستخدم واسم المؤسسة',
            ],
        ],

        'custom-errors' => [
            'channel-creating'                  => 'تحذير: غير مسموح بإنشاء أكثر من قناة واحدة',
            'channel-hostname'                  => 'تحذير: يرجى التواصل مع المسؤول لتغيير اسم الخادم الخاص بك',
            'same-domain'                       => 'تحذير: لا يمكن الاحتفاظ بنفس النطاق الفرعي كنطاق رئيسي',
            'block-message'                     => 'تحذير: إذا كنت ترغب في فتح هذا المستأجر، فلا تتردد في الاتصال بنا، نحن متاحون على مدار الساعة لحل مشكلتك.',
            'blocked'                           => 'تم حظر',
            'illegal-action'                    => 'تحذير: لقد قمت بأداء إجراء غير قانوني',
            'domain-message'                    => 'تحذير: عذرًا! لم نتمكن من مساعدتك في <b>:domain</b>',
            'domain-desc'                       => 'إذا كنت ترغب في إنشاء حساب باسم <b>:domain</b> كمؤسسة، فلا تتردد في إنشاء حساب والبدء.',
            'illegal-message'                   => 'تحذير: تم تعطيل الإجراء الذي قمت به من قبل مسؤول الموقع، يرجى مراسلة مسؤول موقعك للحصول على مزيد من التفاصيل حول ذلك.',
            'locale-creation'                   => 'تحذير: غير مسموح بإنشاء لغة غير الإنجليزية.',
            'locale-delete'                     => 'تحذير: لا يمكن حذف اللغة.',
            'cannot-delete-default'             => 'تحذير: لا يمكن حذف القناة الافتراضية.',
            'tenant-blocked'                    => 'تم حظر المستأجر',
            'domain-not-found'                  => 'تحذير: النطاق غير موجود.',
            'company-blocked-by-administrator'  => 'تم حظر هذا المستأجر من قبل المسؤول',
            'not-allowed-to-visit-this-section' => 'تحذير: غير مسموح لك باستخدام هذا القسم.',
            'auth'                              => 'تحذير: خطأ في المصادقة!',
        ],

        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'تم تسجيل شركة جديدة',
                'first-name' => 'الاسم الأول',
                'last-name'  => 'اسم العائلة',
                'email'      => 'البريد الإلكتروني',
                'name'       => 'الاسم',
                'username'   => 'اسم المستخدم',
                'domain'     => 'النطاق',
            ],

            'new-company-register-tenant' => [
                'subject'    => 'تم تسجيل شركة جديدة بنجاح',
                'dear'       => 'عزيزي :tenant_name',
                'greeting'   => 'مرحبًا وشكرًا لتسجيلك معنا!',
                'summary'    => 'تم إنشاء حسابك الآن بنجاح، ويمكنك تسجيل الدخول باستخدام عنوان البريد الإلكتروني وبيانات اعتماد كلمة المرور. عند تسجيل الدخول، ستكون قادرًا على الوصول إلى خدمات أخرى بما في ذلك المنتجات والمبيعات والعملاء والتقييمات والترويج.',
                'thanks'     => 'شكرًا!',
                'visit-shop' => 'زيارة المتجر',
            ]
        ]
    ],

    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'تحرير تفاصيل الشركة',
            'first-name'     => 'الاسم الأول',
            'last-name'      => 'اسم العائلة',
            'email'          => 'البريد الإلكتروني',
            'skype'          => 'سكايب',
            'cname'          => 'اسم الشركة',
            'phone'          => 'الهاتف',
            'general'        => 'عام',
            'back-btn'       => 'رجوع',
            'save-btn'       => 'حفظ التفاصيل',
            'update-success' => 'نجاح: تم تحديث :resource بنجاح.',
            'update-failed'  => 'تحذير: لا يمكن تحديث :resource بسبب أسباب غير معروفة.',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'         => 'قائمة عناوين الشركة',
                'create-btn'    => 'إضافة عنوان',
    
                'datagrid'      => [
                    'id'          => 'الرقم',
                    'address1'    => 'العنوان 1',
                    'address2'    => 'العنوان 2',
                    'city'        => 'المدينة',
                    'country'     => 'البلد',
                    'edit'        => 'تحرير',
                    'delete'      => 'حذف',
                    'mass-delete' => 'حذف جماعي',
                ],
            ],

            'create' => [
                'title'          => 'إنشاء عنوان الشركة',
                'general'        => 'عام',
                'address1'       => 'العنوان 1',
                'address2'       => 'العنوان 2',
                'country'        => 'البلد',
                'state'          => 'الولاية',
                'city'           => 'المدينة',
                'post-code'      => 'الرمز البريدي',
                'phone'          => 'الهاتف',
                'back-btn'       => 'رجوع',
                'save-btn'       => 'حفظ العنوان',
            ],

            'edit' => [
                'title'          => 'تحرير عنوان الشركة',
                'general'        => 'عام',
                'address1'       => 'العنوان 1',
                'address2'       => 'العنوان 2',
                'country'        => 'البلد',
                'state'          => 'الولاية',
                'city'           => 'المدينة',
                'post-code'      => 'الرمز البريدي',
                'phone'          => 'الهاتف',
                'back-btn'       => 'رجوع',
                'save-btn'       => 'حفظ العنوان',
            ],

            'create-success'      => 'نجاح: تم إنشاء عنوان الشركة بنجاح.',
            'update-success'      => 'نجاح: تم تحديث عنوان الشركة بنجاح.',
            'delete-success'      => 'نجاح: تم حذف :resource بنجاح.',
            'delete-failed'       => 'تحذير: لا يمكن حذف :resource بسبب أسباب غير معروفة.',
            'mass-delete-success' => 'نجاح: تم حذف العناوين المحددة بنجاح.',
        ],

        'system' => [
            'social-login'           => 'تسجيل الدخول الاجتماعي',
            'facebook'               => 'إعدادات Facebook',
            'facebook-client-id'     => 'معرف عميل Facebook',
            'facebook-client-secret' => 'سر عميل Facebook',
            'facebook-callback-url'  => 'عنوان رد الاتصال Facebook',
            'twitter'                => 'إعدادات Twitter',
            'twitter-client-id'      => 'معرف عميل Twitter',
            'twitter-client-secret'  => 'سر عميل Twitter',
            'twitter-callback-url'   => 'عنوان رد الاتصال Twitter',
            'google'                 => 'إعدادات Google',
            'google-client-id'       => 'معرف عميل Google',
            'google-client-secret'   => 'سر عميل Google',
            'google-callback-url'    => 'عنوان رد الاتصال Google',
            'linkedin'               => 'إعدادات LinkedIn',
            'linkedin-client-id'     => 'معرف عميل LinkedIn',
            'linkedin-client-secret' => 'سر عميل LinkedIn',
            'linkedin-callback-url'  => 'عنوان رد الاتصال LinkedIn',
            'github'                 => 'إعدادات GitHub',
            'github-client-id'       => 'معرف عميل GitHub',
            'github-client-secret'   => 'سر عميل GitHub',
            'github-callback-url'    => 'عنوان رد الاتصال GitHub',
            'email-credentials'      => 'بيانات البريد الإلكتروني',
            'mail-driver'            => 'مشغل البريد',
            'mail-host'              => 'مضيف البريد',
            'mail-port'              => 'منفذ البريد',
            'mail-username'          => 'اسم مستخدم البريد',
            'mail-password'          => 'كلمة مرور البريد',
            'mail-encryption'        => 'تشفير البريد',
        ],
        
        'tenant' => [
            'id'              => 'الرقم الهوية',
            'first-name'      => 'الاسم الأول',
            'last-name'       => 'الاسم الأخير',
            'email'           => 'البريد الإلكتروني',
            'skype'           => 'سكايب',
            'c-name'          => 'اسم العميل',
            'add-address'     => 'إضافة عنوان',
            'country'         => 'البلد',
            'city'            => 'المدينة',
            'address1'        => 'العنوان 1',
            'address2'        => 'العنوان 2',
            'address'         => 'قائمة العناوين',
            'company'         => 'العميل',
            'profile'         => 'الملف الشخصي',
            'update'          => 'تحديث',
            'address-details' => 'تفاصيل العنوان',
            'create-failed'   => 'تحذير: لا يمكن إنشاء :attribute بسبب أسباب غير معروفة.',
            'update-success'  => 'نجاح: تم تحديث :resource بنجاح.',
            'update-failed'   => 'تحذير: لا يمكن تحديث :resource بسبب أسباب غير معروفة.',

            'company-address' => [
                'add-address-title'    => 'عنوان جديد',
                'update-address-title' => 'تحديث العنوان',
                'save-btn-title'       => 'حفظ العنوان',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'تم وضع طلب :order_id بواسطة :placed_by في :created_at.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'عفوًا! الصفحة التي تبحث عنها في إجازة. يبدو أننا لم نتمكن من العثور على ما كنت تبحث عنه.',
            'title'       => '404 صفحة غير موجودة',
        ],

        '401' => [
            'description' => 'عفوًا! يبدو أنك غير مسموح لك بالوصول إلى هذه الصفحة. يبدو أنك تفتقد إلى بيانات الاعتماد اللازمة.',
            'title'       => '401 غير مصرح به',
        ],

        '403' => [
            'description' => 'عفوًا! هذه الصفحة محظورة. يبدو أنك ليس لديك الأذونات اللازمة لعرض هذا المحتوى.',
            'title'       => '403 ممنوع',
        ],

        '500' => [
            'description' => 'عفوًا! حدث خطأ ما. يبدو أننا نواجه مشكلة في تحميل الصفحة التي تبحث عنها.',
            'title'       => '500 خطأ في الخادم الداخلي',
        ],

        '503' => [
            'description' => 'عفوًا! يبدو أننا في وضع الصيانة المؤقتة. يرجى التحقق مرة أخرى بعد قليل.',
            'title'       => '503 الخدمة غير متوفرة',
        ],
    ],
];
