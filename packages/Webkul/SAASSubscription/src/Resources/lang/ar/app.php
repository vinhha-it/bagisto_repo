<?php

return [
    'super' => [
        'configuration' => [
            'index' => [
                'title' => 'الاشتراك',
                'info'  => 'إدارة تفاصيل الدفع عبر باي بال للاشتراك.',

                'payment' => [
                    'title' => 'إعدادات الدفع',
                    'info'  => 'تحديد تفاصيل الدفع والتجربة.',

                    'trail-plan' => [
                        'title'     => 'خطة التجربة',
                        'info'      => 'إدارة ما إذا كنت تريد السماح بخطة التجربة وتحديد عدد الأيام لفترة التجربة.',
                        'status'    => 'السماح بالتجربة',
                        'days'      => 'أيام التجربة',
                        'plan-list' => 'خطة التجربة',
                    ],

                    'paypal' => [
                        'title'              => 'باي بال',
                        'info'               => 'إدارة بيانات اعتماد الدفع في باي بال لتسهيل مدفوعات خطة الاشتراك.',
                        'sandbox-mode'       => 'وضع التجربة',
                        'merchant-paypal-id' => 'معرف باي بال التاجر',
                        'user-name'          => 'اسم المستخدم',
                        'password'           => 'كلمة المرور',
                        'signature'          => 'التوقيع',
                    ],

                    'module-assignment' => [
                        'title'  => 'إعداد تعيين الملحقات',
                        'info'   => 'إدارة تعيين الوحدات (الإضافات السحابية) لخطط الاشتراك.',
                        'status' => 'الحالة',
                    ],
                ],
            ],
        ],

        'components' => [
            'layouts' => [
                'sidebar' => [
                    'subscription'    => 'الاشتراك',
                    'plans'           => 'الخطط',
                    'purchased-plans' => 'الخطط المشتراة',
                    'invoices'        => 'الفواتير',
                ],
            ],
        ],

        'subscriptions' => [
            'plans' => [
                'index' => [
                    'title'      => 'قائمة الخطط',
                    'create-btn' => 'إنشاء خطة',
                    'datagrid'   => [
                        'id'             => 'المعرف',
                        'code'           => 'الرمز',
                        'name'           => 'الاسم',
                        'monthly-amount' => 'المبلغ الشهري',
                        'yearly-amount'  => 'المبلغ السنوي',
                        'status'         => 'الحالة',
                        'active'         => 'نشط',
                        'inactive'       => 'غير نشط',
                        'edit'           => 'تعديل',
                        'delete'         => 'حذف',
                        'view'           => 'عرض',
                        'customer-email' => 'البريد الإلكتروني للعميل',
                        'customer-name'  => 'اسم العميل',
                        'total'          => 'المجموع',
                        'expired-on'     => 'انتهت في',
                        'created-at'     => 'أنشئت في',
                        'company-name'   => 'اسم الشركة',
                        'plan-name'      => 'الخطة',
                        'amount'         => 'المبلغ',
                        'period-unit'    => 'وحدة الفترة',
                        'profile-state'  => 'حالة الملف الشخصي',
                    ],
                ],

                'create' => [
                    'add-title'                  => 'إضافة خطة',
                    'save-btn-title'             => 'حفظ الخطة',
                    'general'                    => 'عام',
                    'code'                       => 'الرمز',
                    'name'                       => 'الاسم',
                    'description'                => 'الوصف',
                    'billing-amount'             => 'مبلغ الفاتورة',
                    'monthly-amount'             => 'المبلغ الشهري',
                    'yearly-amount'              => 'المبلغ السنوي (شهريًا)',
                    'plan-limitation'            => 'قيود الخطة',
                    'allowed-products'           => 'المنتجات المسموح بها',
                    'allowed-categories'         => 'الفئات المسموح بها',
                    'allowed-attributes'         => 'السمات المسموح بها',
                    'allowed-attribute-families' => 'عائلات السمات المسموح بها',
                    'allowed-channels'           => 'القنوات المسموح بها',
                    'allowed-orders'             => 'الطلبات المسموح بها',
                    'offers'                     => 'العروض',
                    'active'                     => 'نشط',
                    'inactive'                   => 'غير نشط',
                    'offer-title'                => 'العنوان',
                    'type'                       => 'النوع',
                    'discount'                   => 'الخصم',
                    'fixed'                      => 'ثابت',
                    'price'                      => 'الخصم',
                    'offer-status'               => 'الحالة',
                    'module-assignment'          => 'تعيين الوحدة',
                ],

                'edit' => [
                    'edit-title'                 => 'تعديل الخطة',
                    'add-title'                  => 'إضافة خطة',
                    'save-btn-title'             => 'حفظ الخطة',
                    'general'                    => 'عام',
                    'code'                       => 'الرمز',
                    'name'                       => 'الاسم',
                    'description'                => 'الوصف',
                    'billing-amount'             => 'مبلغ الفاتورة',
                    'monthly-amount'             => 'المبلغ الشهري',
                    'yearly-amount'              => 'المبلغ السنوي (شهريًا)',
                    'plan-limitation'            => 'قيود الخطة',
                    'allowed-products'           => 'المنتجات المسموح بها',
                    'allowed-categories'         => 'الفئات المسموح بها',
                    'allowed-attributes'         => 'السمات المسموح بها',
                    'allowed-attribute-families' => 'عائلات السمات المسموح بها',
                    'allowed-channels'           => 'القنوات المسموح بها',
                    'allowed-orders'             => 'الطلبات المسموح بها',
                    'offers'                     => 'العروض',
                    'active'                     => 'نشط',
                    'inactive'                   => 'غير نشط',
                    'offer-title'                => 'العنوان',
                    'type'                       => 'النوع',
                    'discount'                   => 'الخصم',
                    'fixed'                      => 'ثابت',
                    'price'                      => 'الخصم',
                    'offer-status'               => 'الحالة',
                    'module-assignment'          => 'تعيين الوحدة',
                ],
            ],
        ],

        'recurring-profiles' => [
            'index' => [
                'title'      => 'الخطط المشتراة',
                'create-btn' => 'إنشاء خطة',

                'datagrid' => [
                    'company-name'  => 'اسم الشركة',
                    'id'            => 'المعرف',
                    'plan-name'     => 'الخطة',
                    'amount'        => 'المبلغ',
                    'period-unit'   => 'وحدة الفترة',
                    'profile-state' => 'حالة الملف الشخصي',
                    'created-at'    => 'أنشئت في',
                    'view'          => 'عرض',
                ],
            ],

            'view' => [
                'title'                      => 'الخطط المشتراة',
                'create-btn'                 => 'إنشاء خطة',
                'plan-info'                  => 'معلومات الخطة',
                'plan'                       => 'الخطة',
                'plan-name'                  => 'اسم الخطة',
                'expiration-date'            => 'تاريخ الانتهاء',
                'billing-amount'             => 'مبلغ الفاتورة',
                'billing-cycle'              => 'دورة الفاتورة',
                'monthly'                    => 'شهريًا',
                'annual'                     => 'سنويًا',
                'profile-id'                 => 'معرف الملف الشخصي',
                'tin'                        => 'الرقم الضريبي',
                'profile-state'              => 'حالة الملف الشخصي',
                'next-billing-date'          => 'تاريخ الفاتورة التالي',
                'payment-details'            => 'تفاصيل الدفع',
                'offer-title'                => 'عرض الخطة',
                'offer-type'                 => 'نوع العرض',
                'offer-price'                => 'سعر العرض',
                'reference-id'               => 'معرف المرجع',
                'plan-state'                 => 'الحالة',
                'plan-type'                  => 'نوع الخطة',
                'payment-status'             => 'حالة الدفع',
                'schedule-description'       => 'وصف الجدول',
                'amount'                     => 'المبلغ',
                'payment-method'             => 'طريقة الدفع',
                'features'                   => 'الميزات',
                'allowed-products'           => 'المنتجات المسموح بها',
                'allowed-categories'         => 'الفئات المسموح بها',
                'allowed-attributes'         => 'السمات المسموح بها',
                'allowed-attribute-families' => 'عائلات السمات المسموح بها',
                'allowed-channels'           => 'القنوات المسموح بها',
                'allowed-orders'             => 'الطلبات المسموح بها',
            ],
        ],

        'tenants' => [
            'view' => [
                'title'      => 'الخطط المشتراة',
                'create-btn' => 'إنشاء خطة',
                'datagrid'   => [
                    'company-name'  => 'اسم الشركة',
                    'id'            => 'المعرف',
                    'plan-name'     => 'الخطة',
                    'amount'        => 'المبلغ',
                    'period-unit'   => 'وحدة الفترة',
                    'profile-state' => 'حالة الملف الشخصي',
                    'created-at'    => 'أنشئت في',
                    'view'          => 'عرض',
                ],
            ],
        ],

        'plans' => [
            'title'                      => 'خطط الاشتراك',
            'add-title'                  => 'إضافة خطة',
            'edit-title'                 => 'تعديل الخطة',
            'create-success'             => 'تم إنشاء الخطة بنجاح.',
            'update-success'             => 'تم تحديث الخطة بنجاح.',
            'delete-success'             => 'تم حذف الخطة بنجاح.',
            'save-btn-title'             => 'حفظ الخطة',
            'general'                    => 'عام',
            'code'                       => 'الرمز',
            'name'                       => 'الاسم',
            'description'                => 'الوصف',
            'billing-amount'             => 'مبلغ الفاتورة',
            'monthly-amount'             => 'المبلغ الشهري',
            'yearly-amount'              => 'المبلغ السنوي (شهريًا)',
            'plan-limitation'            => 'قيود الخطة',
            'allowed-products'           => 'المنتجات المسموح بها',
            'allowed-categories'         => 'الفئات المسموح بها',
            'allowed-attributes'         => 'السمات المسموح بها',
            'allowed-attribute-families' => 'عائلات السمات المسموح بها',
            'allowed-channels'           => 'القنوات المسموح بها',
            'allowed-orders'             => 'الطلبات المسموح بها',
            'name-too-long-error'        => 'اسم المشترك طويل جدًا.',
            'description-too-long-error' => 'وصف المشترك طويل جدًا.',
            'payment-cancel'             => 'لقد قمت بإلغاء الدفع.',
            'generic-error'              => 'حدث خطأ ما، يرجى المحاولة مرة أخرى لاحقًا.',
            'profile-created-success'    => 'تم إنشاء الملف الشخصي الدوري بنجاح.',
            'assign-plan'                => 'تعيين الخطة',
            'assign'                     => 'تعيين',
            'plan'                       => 'الخطة',
            'period-unit'                => 'وحدة الفترة',
            'month'                      => 'شهريًا',
            'year'                       => 'سنويًا',
            'plan-activated'             => 'تم تفعيل الخطة بنجاح.',
            'plan-cancelled-message'     => 'تم إلغاء الخطة بنجاح.',
            'general-error'              => 'حدث خطأ ما، حاول مرة أخرى لاحقًا.',
            'cancel-plan'                => 'إلغاء الخطة',
            'cancel-confirm-msg'         => 'هل أنت متأكد أنك تريد إلغاء هذه الخطة؟',
            'module-assignment-setting'  => 'إعداد تعيين الوحدات',
            'module-assignment-status'   => 'حالة تعيين الوحدات',
            'module-assignment'          => 'تعيين الوحدات',
            'allow-modules'              => 'السماح بالوحدات',
            'offers'                     => 'العروض',
            'offer-title'                => 'العنوان',
            'type'                       => 'النوع',
            'price'                      => 'الخصم',
            'offer-status'               => 'الحالة',
        ],

        'invoices' => [
            'index' => [
                'title'    => 'فواتير الاشتراك',
                'datagrid' => [
                    'id'             => 'المعرف',
                    'customer-name'  => 'اسم العميل',
                    'customer-email' => 'البريد الإلكتروني للعميل',
                    'total'          => 'المجموع',
                    'expire-on'      => 'تنتهي في',
                    'created-at'     => 'أنشئت في',
                    'view'           => 'عرض',
                ],
            ],

            'view' => [
                'invoice-and-account'  => 'الفاتورة والحساب',
                'invoice-id'           => 'معرف الفاتورة',
                'profile-id'           => 'معرف الملف الشخصي',
                'invoice-date'         => 'تاريخ الفاتورة',
                'invoice-status'       => 'حالة الفاتورة',
                'customer-name'        => 'اسم العميل',
                'customer-email'       => 'البريد الإلكتروني للعميل',
                'payment-detail'       => 'تفاصيل الدفع',
                'payment-state'        => 'حالة الدفع',
                'payment-type'         => 'نوع الدفع',
                'payment-status'       => 'حالة الدفع',
                'schedule-description' => 'وصف الجدول',
                'tin'                  => 'الرقم الضريبي',
                'amount'               => 'المبلغ',
                'payment-method'       => 'طريقة الدفع',
                'plan-information'     => 'معلومات الخطة',
                'sku'                  => 'رمز المنتج',
                'plan'                 => 'الخطة',
                'expiration-date'      => 'تاريخ الانتهاء',
                'sub-total'            => 'المجموع الفرعي',
                'grand-total'          => 'المجموع الكلي',
            ],
        ],
    ],

    'admin' => [
        'layouts' => [
            'subscription'                        => 'الاشتراك',
            'overview'                            => 'نظرة عامة',
            'plans'                               => 'الخطط',
            'invoices'                            => 'الفواتير',
            'history'                             => 'سجل الخطط المشتراة',
            'purchase-plan-heading'               => 'اشترِ خطة للمتابعة',
            'purchase-plan-notification'          => 'يرجى شراء أي خطة للمتابعة في استخدام الخدمة.',
            'trial-expired-heading'               => 'انتهت فترة التجربة الخاصة بك',
            'trial-expired-notification'          => 'انتهت فترة التجربة الخاصة بك في :date. يرجى النقر على الزر أدناه لاختيار خطتك.',
            'choose-plan'                         => 'اختر خطة',
            'subscription-stopped-heading'        => 'توقف اشتراكك',
            'subscription-stopped-notification'   => 'تم إيقاف اشتراكك في :date. اشترك في خطة جديدة لمتابعة خدماتك. يرجى النقر على الزر أدناه لاختيار خطتك.',
            'subscription-suspended-heading'      => 'تم تعليق اشتراكك',
            'subscription-suspended-notification' => 'تم تعليق اشتراكك لأننا لم نتمكن من معالجة دفعتك. يرجى الاتصال بنا لمتابعة خدماتك أو يمكنك الاشتراك في خطة جديدة.',
            'payment-due-heading'                 => 'استحقاق الدفع',
            'payment-due-notification'            => 'استحقاق الدفع لفاتورة اشتراكك. قم بترقية الخطة، تغيير الخطة، أو اتصل بنا لمتابعة خدماتك.',
        ],

        'plans' => [
            'history' => [
                'title'    => 'سجل الخطط المشتراة',
                'datagrid' => [
                    'title'         => 'سجل الخطط المشتراة',
                    'id'            => 'المعرف',
                    'code'          => 'الرمز',
                    'name'          => 'الاسم',
                    'reference-id'  => 'المعرف المرجعي',
                    'state'         => 'الحالة',
                    'payment-type'  => 'نوع الدفع',
                    'period-unit'   => 'دورة الدفع',
                    'amount'        => 'المبلغ المدفوع',
                    'next-due-date' => 'تاريخ الاستحقاق التالي',
                ],
            ],

            'index' => [
                'title'                              => 'خطط الاشتراك',
                'allowed-products'                   => 'المنتجات المسموح بها',
                'allowed-categories'                 => 'الفئات المسموح بها',
                'allowed-attributes'                 => 'السمات المسموح بها',
                'allowed-attribute-families'         => 'عائلات السمات المسموح بها',
                'allowed-channels'                   => 'القنوات المسموح بها',
                'allowed-orders'                     => 'الطلبات المسموح بها',
                'purchase'                           => 'شراء',
                'plan-description'                   => 'محسوب سنويًا عند الفوترة سنويًا أو :amount شهريًا :-',
                'product-left-notification'          => ':remaining المنتجات المتبقية من :purchased، قم بترقية خطتك للمزيد من المنتجات.',
                'category-left-notification'         => ':remaining الفئات المتبقية من :purchased، قم بترقية خطتك للمزيد من الفئات.',
                'attribute-left-notification'        => ':remaining السمات المتبقية من :purchased، قم بترقية خطتك للمزيد من السمات.',
                'attribute-family-left-notification' => ':remaining عائلات السمات المتبقية من :purchased، قم بترقية خطتك للمزيد من عائلات السمات.',
                'channel-left-notification'          => ':remaining القنوات المتبقية من :purchased، قم بترقية خطتك للمزيد من القنوات.',
                'order-left-notification'            => ':remaining الطلبات المتبقية من :purchased، قم بترقية خطتك للمزيد من الطلبات.',
                'resource-limit-error'               => 'هذه الخطة تسمح فقط ب :allowed :entity_name، لقد قمت بإنشاء :used :entity_name بالفعل.',
                'free-plan-activated'                => 'تم تفعيل الخطة المجانية بنجاح.',
                'products'                           => 'المنتجات',
                'categories'                         => 'الفئات',
                'attributes'                         => 'السمات',
                'attribute_families'                 => 'عائلات السمات',
                'channels'                           => 'القنوات',
                'orders'                             => 'الطلبات',
                'allowed-modules'                    => 'الوحدات المسموح بها :-',
                'no-module-assign'                   => 'تحذير: لم يتم تعيين أي وحدة لهذه الخطة.',
                'plan-not-available'                 => 'لا توجد خطط متاحة',
                'not-activated-plans'                => 'ليس لديك أي خطط مفعلة حتى الآن.',
                'reference-id'                       => 'المعرف المرجعي',
                'state'                              => 'الحالة',
                'type'                               => 'النوع',
                'payment-status'                     => 'حالة الدفع',
                'schedule-description'               => 'وصف الجدول الزمني',
                'tin'                                => 'رقم التعريف الضريبي',
                'amount'                             => 'المبلغ',
                'payment-method'                     => 'طريقة الدفع',
                'assigned-plan'                      => 'تم تعيين خطتك.',
                'cancel-plan'                        => 'تم إلغاء خطتك.',
                'change-plan'                        => 'تم تغيير خطتك.',
                'assigned-plan-description'          => 'تم تعيين خطة جديدة لك لنطاق <b>:domain</b>',
                'cancel-plan-description'            => 'تم إلغاء خطتك لنطاق <b>:domain</b>',
                'changed-plan-description'           => 'تم تغيير/تعديل خطتك لنطاق <b>:domain</b>',
                'new-plan'                           => ':name (خطة جديدة)',
                'for-plan'                           => 'اسم الخطة <b>:name</b>',
                'plan-expired'                       => 'انتهت صلاحية خطتك',
                'current-plan-expired'               => 'انتهت صلاحية خطتك الحالية لنطاق <b>:domain</b>',
            ],

            'overview' => [
                'title'                      => 'خطط الاشتراك',
                'allowed-products'           => 'المنتجات المسموح بها',
                'allowed-categories'         => 'الفئات المسموح بها',
                'allowed-attributes'         => 'السمات المسموح بها',
                'allowed-attribute-families' => 'عائلات السمات المسموح بها',
                'allowed-channels'           => 'القنوات المسموح بها',
                'allowed-orders'             => 'الطلبات المسموح بها',
                'purchase'                   => 'شراء',
                'products'                   => 'المنتجات',
                'categories'                 => 'الفئات',
                'attributes'                 => 'السمات',
                'attribute_families'         => 'عائلات السمات',
                'channels'                   => 'القنوات',
                'orders'                     => 'الطلبات',
                'allowed-modules'            => 'الوحدات المسموح بها :-',
                'no-module-assign'           => 'تحذير: لم يتم تعيين أي وحدة لهذه الخطة.',
                'plan-not-available'         => 'لا توجد خطط متاحة',
                'not-activated-plans'        => 'ليس لديك أي خطط مفعلة حتى الآن.',
                'reference-id'               => 'المعرف المرجعي',
                'state'                      => 'الحالة',
                'type'                       => 'النوع',
                'payment-status'             => 'حالة الدفع',
                'schedule-description'       => 'وصف الجدول الزمني',
                'tin'                        => 'رقم التعريف الضريبي',
                'amount'                     => 'المبلغ',
                'payment-method'             => 'طريقة الدفع',
                'title'                      => 'نظرة عامة على الخطة',
                'plan-info'                  => 'معلومات الخطة',
                'plan'                       => 'الخطة',
                'plan-name'                  => ':plan - (تجربة)',
                'expiration-date'            => 'تاريخ الانتهاء',
                'billing-amount'             => 'مبلغ الفاتورة',
                'billing-cycle'              => 'دورة الفوترة',
                'monthly'                    => 'شهريًا',
                'annual'                     => 'سنويًا',
                'profile-id'                 => 'معرف الملف الشخصي',
                'profile-status'             => 'حالة الملف الشخصي',
                'next-billing-date'          => 'تاريخ الفاتورة التالي',
                'profile-state'              => 'حالة الملف الشخصي',
                'payment-status'             => 'حالة الدفع',
                'features'                   => 'المميزات',
                'assign-modules'             => 'قسم الوحدات المعينة',
                'info-assign-modules'        => 'الوحدات المعينة',
                'text-bagisto'               => 'Bagisto :extension امتداد',
                'payment-details'            => 'تفاصيل الدفع',
                'offer'                      => [
                    'title' => 'العنوان',
                    'type'  => 'نوع الخصم',
                    'price' => 'السعر',
                ],
            ],
        ],

        'checkout' => [
            'purchase'                  => 'شراء',
            'title'                     => 'إتمام الشراء',
            'billing-address'           => 'عنوان الفواتير',
            'tin'                       => 'رقم التعريف الضريبي',
            'first-name'                => 'الاسم الأول',
            'last-name'                 => 'الاسم الأخير',
            'email'                     => 'البريد الإلكتروني',
            'address1'                  => 'العنوان 1',
            'address2'                  => 'العنوان 2',
            'city'                      => 'المدينة',
            'postcode'                  => 'الرمز البريدي',
            'state'                     => 'الولاية',
            'select-state'              => 'اختر الولاية/المنطقة',
            'country'                   => 'البلد',
            'payment-information'       => 'معلومات الدفع',
            'summary'                   => 'الملخص',
            'billing-cycle'             => 'دورة الفوترة',
            'month'                     => 'الشهر',
            'year'                      => 'السنة',
            'annual'                    => 'سنويًا',
            'plan'                      => 'الخطة',
            'subtotal'                  => 'الإجمالي الفرعي (بما في ذلك الضرائب)',
            'plan-option-label-monthly' => ':plan - :amount شهريًا',
            'plan-option-label-yearly'  => ':plan - :amount سنويًا',
            'success-activated-plan'    => 'تم تفعيل :plan_name بنجاح.',
        ],

        'invoices' => [
            'title' => 'الفواتير',
            'view'  => [
                'id'                   => 'المعرف',
                'plan'                 => 'الخطة',
                'customer-name'        => 'اسم العميل',
                'invoice-and-account'  => 'الفاتورة والحساب',
                'invoice-id'           => 'معرف الفاتورة',
                'profile-id'           => 'معرف الملف الشخصي',
                'invoice-date'         => 'تاريخ الفاتورة',
                'invoice-status'       => 'حالة الفاتورة',
                'customer-name'        => 'اسم العميل',
                'customer-email'       => 'البريد الإلكتروني للعميل',
                'reference-id'         => 'المعرف المرجعي',
                'plan-state'           => 'الحالة',
                'plan-type'            => 'نوع الخطة',
                'payment-status'       => 'حالة الدفع',
                'payment-detail'       => 'تفاصيل الدفع',
                'payment-state'        => 'حالة الدفع',
                'payment-type'         => 'نوع الدفع',
                'payment-status'       => 'حالة الدفع',
                'schedule-description' => 'وصف الجدول الزمني',
                'tin'                  => 'رقم التعريف الضريبي',
                'amount'               => 'المبلغ',
                'payment-method'       => 'طريقة الدفع',
                'plan-info'            => 'معلومات الخطة',
                'sku'                  => 'رمز المخزون الموحد',
                'expiration-date'      => 'تاريخ الانتهاء',
                'sub-total'            => 'الإجمالي الفرعي',
                'grand-total'          => 'الإجمالي الكلي',
            ],

            'datagrid' => [
                'id'             => 'المعرف',
                'customer-name'  => 'اسم العميل',
                'customer-email' => 'البريد الإلكتروني للعميل',
                'total'          => 'الإجمالي',
                'expire-on'      => 'ينتهي في',
                'created-at'     => 'تم الإنشاء في',
                'view'           => 'عرض',
            ],
        ],
    ],

];
