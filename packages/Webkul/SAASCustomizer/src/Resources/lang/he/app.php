<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'גרסה: :version',
                'account-title' => 'חשבון',
                'logout'        => 'התנתק',
                'my-account'    => 'החשבון שלי',
                'visit-shop'    => 'בקר בחנות',
            ],
    
            'sidebar' => [
                'tenants'          => 'שוכרים',
                'tenant-customers' => 'לקוחות',
                'tenant-products'  => 'מוצרים',
                'tenant-orders'    => 'הזמנות',
                'settings'         => 'הגדרות',
                'agents'           => 'סוכנים',
                'roles'            => 'תפקידים',
                'locales'          => 'אזורים',
                'currencies'       => 'מטבעות',
                'channels'         => 'ערוצים',
                'exchange-rates'   => 'שערי החליפין',
                'themes'           => 'ערכות נושא',
                'cms'              => 'מערכת ניהול תוכן',
                'configurations'   => 'הגדרות',
                'general'          => 'כללי',
                'send-email'       => 'שלח דוא"ל',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'שוכרים',
            'create'         => 'הוסף',
            'edit'           => 'ערוך',
            'delete'         => 'מחק',
            'cancel'         => 'בטל',
            'view'           => 'צפה',
            'mass-delete'    => 'מחיקה מרובה',
            'mass-update'    => 'עדכון מרובה',
            'customers'      => 'לקוחות',
            'products'       => 'מוצרים',
            'orders'         => 'הזמנות',
            'settings'       => 'הגדרות',
            'agents'         => 'סוכנים',
            'roles'          => 'תפקידים',
            'locales'        => 'לוקייליזציה',
            'currencies'     => 'מטבעות',
            'exchange-rates' => 'שערי חליפין',
            'channels'       => 'ערוצים',
            'themes'         => 'ערכות נושא',
            'send-email'     => 'שלח דוא"ל',
            'cms'            => 'מערכת ניהול תוכן',
            'configuration'  => 'הגדרות',
            'download'       => 'הורדה',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => 'כניסת מנהל מערכת',
                'email'                => 'כתובת דוא"ל',
                'password'             => 'סיסמה',
                'btn-submit'           => 'כניסה',
                'forget-password-link' => 'שכחת סיסמה?',
                'submit-btn'           => 'כניסה',
                'login-success'        => 'הצלחה: כניסתך הושלמה בהצלחה.',
                'login-error'          => 'אנא בדוק את פרטי ההתחברות שלך ונסה שוב.',
                'activate-warning'     => 'החשבון שלך עדיין לא הופעל, אנא צור קשר עם המנהל.',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'שכחתי סיסמה',
                    'title'           => 'שחזור סיסמה',
                    'email'           => 'דוא"ל רשום',
                    'reset-link-sent' => 'נשלח קישור לשחזור סיסמה',
                    'sign-in-link'    => 'חזרה להתחברות?',
                    'email-not-exist' => 'דוא"ל לא קיים',
                    'submit-btn'      => 'איפוס',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'איפוס סיסמה',
                'back-link-title'  => 'חזרה להתחברות?',
                'confirm-password' => 'אישור סיסמה',
                'email'            => 'דוא"ל רשום',
                'password'         => 'סיסמה',
                'submit-btn'       => 'איפוס סיסמה',
            ],
        ],

        'tenants' => [
            'index' => [
                'title'        => 'רשימת שוכרים',
                'register-btn' => 'הרשם כשוכר',

                'create' => [
                    'title'             => 'צור שוכר',
                    'first-name'        => 'שם פרטי',
                    'last-name'         => 'שם משפחה',
                    'user-name'         => 'שם משתמש',
                    'organization-name' => 'שם הארגון',
                    'phone'             => 'טלפון',
                    'email'             => 'אימייל',
                    'password'          => 'סיסמה',
                    'confirm-password'  => 'אשר סיסמה',
                    'save-btn'          => 'שמור שוכר',
                    'back-btn'          => 'חזרה',
                ],

                'datagrid' => [
                    'id'                  => 'מזהה',
                    'user-name'           => 'שם משתמש',
                    'organization'        => 'ארגון',
                    'domain'              => 'דומיין',
                    'cname'               => 'Cname',
                    'status'              => 'סטטוס',
                    'active'              => 'פעיל',
                    'disable'             => 'ניטרול',
                    'view'                => 'הצג תובנות',
                    'edit'                => 'ערוך שוכר',
                    'delete'              => 'הסר שוכר',
                    'mass-delete'         => 'מחק הרבה',
                    'mass-delete-success' => 'השוכרים שנבחרו נמחקו בהצלחה',
                ],
            ],

            'edit' => [
                'title'             => 'ערוך שוכר',
                'first-name'        => 'שם פרטי',
                'last-name'         => 'שם משפחה',
                'user-name'         => 'שם משתמש',
                'cname'             => 'Cname',
                'organization-name' => 'שם הארגון',
                'phone'             => 'טלפון',
                'status'            => 'סטטוס',
                'email'             => 'אימייל',
                'password'          => 'סיסמה',
                'confirm-password'  => 'אשר סיסמה',
                'save-btn'          => 'שמור שוכר',
                'back-btn'          => 'חזרה',
                'general'           => 'כללי',
                'settings'          => 'הגדרות',
            ],

            'view' => [
                'title'                        => 'תובנות שוכר',
                'heading'                      => 'שוכר - :tenant_name',
                'email-address'                => 'כתובת דוא"ל',
                'phone'                        => 'טלפון',
                'domain-information'           => 'מידע על הדומיין',
                'mapped-domain'                => 'דומיין ממופה',
                'cname-information'            => 'מידע על Cname',
                'cname-entry'                  => 'רשומת Cname',
                'attribute-information'        => 'מידע על התכונות',
                'no-of-attributes'             => 'מספר התכונות',
                'attribute-family-information' => 'מידע על משפחת התכונות',
                'no-of-attribute-families'     => 'מספר משפחות התכונות',
                'product-information'          => 'מידע על המוצרים',
                'no-of-products'               => 'מספר המוצרים',
                'customer-information'         => 'מידע על הלקוחות',
                'no-of-customers'              => 'מספר הלקוחות',
                'customer-group-information'   => 'מידע על קבוצות הלקוחות',
                'no-of-customer-groups'        => 'מספר קבוצות הלקוחות',
                'category-information'         => 'מידע על הקטגוריות',
                'no-of-categories'             => 'מספר הקטגוריות',
                'addresses'                    => 'רשימת כתובות (:count)',
                'empty-title'                  => 'הוסף כתובת שוכר',
            ],

            'create-success' => 'שוכר נוצר בהצלחה',
            'delete-success' => 'שוכר נמחק בהצלחה',
            'delete-failed'  => 'נכשל למחוק שוכר',
            'product-copied' => 'השוכר הועתק בהצלחה',
            'update-success' => 'השוכר עודכן בהצלחה',

            'customers' => [
                'index' => [
                    'title' => 'רשימת לקוחות',

                    'datagrid' => [
                        'id'             => 'מזהה',
                        'domain'         => 'דומיין',
                        'customer-name'  => 'שם לקוח',
                        'email'          => 'אימייל',
                        'customer-group' => 'קבוצת לקוח',
                        'phone'          => 'טלפון',
                        'status'         => 'סטטוס',
                        'active'         => 'פעיל',
                        'inactive'       => 'לֹא פָּעִיל',
                        'is-suspended'   => 'מוּשׁהֶה',
                    ],
                ],
            ],

            'products' => [
                'index' => [
                    'title' => 'רשימת מוצרים',

                    'datagrid' => [
                        'id'               => 'מזהה',
                        'domain'           => 'דומיין',
                        'name'             => 'שם',
                        'sku'              => 'SKU',
                        'attribute-family' => 'משפחת תכונות',
                        'image'            => 'תמונה',
                        'price'            => 'מחיר',
                        'qty'              => 'כמות',
                        'status'           => 'סטטוס',
                        'active'           => 'פעיל',
                        'inactive'         => 'לֹא פָּעִיל',
                        'category'         => 'קטגוריה',
                        'type'             => 'סוג',
                    ],
                ],
            ],

            'orders' => [
                'index' => [
                    'title' => 'רשימת הזמנות',

                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => 'מזהה הזמנה',
                        'domain'          => 'דומיין',
                        'sub-total'       => 'סכום חלקי',
                        'grand-total'     => 'סכום כולל',
                        'order-date'      => 'תאריך הזמנה',
                        'channel-name'    => 'שם הערוץ',
                        'status'          => 'סטטוס',
                        'processing'      => 'בעיבוד',
                        'completed'       => 'הושלם',
                        'canceled'        => 'בוטל',
                        'closed'          => 'סגור',
                        'pending'         => 'ממתין',
                        'pending-payment' => 'ממתין לתשלום',
                        'fraud'           => 'הונאה',
                        'customer'        => 'לקוח',
                        'email'           => 'אימייל',
                        'location'        => 'מיקום',
                        'images'          => 'תמונות',
                        'pay-by'          => 'שולם על ידי - ',
                        'pay-via'         => 'שולם דרך',
                        'date'            => 'תאריך',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'רשימת סוכנים',
                    'register-btn' => 'צור סוכן',
            
                    'create' => [
                        'title'             => 'צור סוכן',
                        'first-name'        => 'שם פרטי',
                        'last-name'         => 'שם משפחה',
                        'email'             => 'אימייל',
                        'current-password'  => 'סיסמה נוכחית',
                        'password'          => 'סיסמה',
                        'confirm-password'  => 'אימות סיסמה',
                        'role'              => 'תפקיד',
                        'select'            => 'בחר',
                        'status'            => 'סטטוס',
                        'save-btn'          => 'שמור נכס',
                        'back-btn'          => 'חזור',
                        'upload-image-info' => 'העלה תמונת פרופיל (110 פיקסלים X 110 פיקסלים) בפורמט PNG או JPG',
                    ],
            
                    'edit' => [
                        'title' => 'ערוך סוכן',
                    ],
            
                    'datagrid' => [
                        'id'      => 'מזהה',
                        'name'    => 'שם',
                        'email'   => 'אימייל',
                        'role'    => 'תפקיד',
                        'status'  => 'סטטוס',
                        'active'  => 'פעיל',
                        'disable' => 'ניתן להשבתה',
                        'actions' => 'פעולות',
                        'edit'    => 'ערוך',
                        'delete'  => 'מחק',
                    ],
                ],
            
                'create-success'             => 'הצלחה: סוכן סופר אדמין נוצר בהצלחה',
                'delete-success'             => 'הדייר נמחק בהצלחה',
                'delete-failed'              => 'נכשל במחיקת הדייר',
                'cannot-change'              => 'שם הסוכן :name אינו יכול להשתנות',
                'product-copied'             => 'הדייר הועתק בהצלחה',
                'update-success'             => 'הדייר עודכן בהצלחה',
                'invalid-password'           => 'הסיסמה הנוכחית שהוזנה אינה נכונה',
                'last-delete-error'          => 'אזהרה: נדרש לפחות סוכן סופר אדמין אחד',
                'login-delete-error'         => 'אזהרה: אין אפשרות למחוק את החשבון שלך.',
                'administrator-delete-error' => 'אזהרה: נדרש לפחות סוכן סופר אדמין עם גישת מנהל',
            ],
            
            'roles' => [
                'index' => [
                    'title'      => 'רשימת תפקידים',
                    'create-btn' => 'צור תפקיד',
            
                    'datagrid' => [
                        'id'              => 'מזהה',
                        'name'            => 'שם',
                        'permission-type' => 'סוג הרשאה',
                        'actions'         => 'פעולות',
                        'edit'            => 'ערוך',
                        'delete'          => 'מחק',
                    ],
                ],
            
                'create' => [
                    'access-control' => 'בקרת גישה',
                    'all'            => 'הכל',
                    'back-btn'       => 'חזור',
                    'custom'         => 'מותאם אישית',
                    'description'    => 'תיאור',
                    'general'        => 'כללי',
                    'name'           => 'שם',
                    'permissions'    => 'הרשאות',
                    'save-btn'       => 'שמור תפקיד',
                    'title'          => 'צור תפקיד',
                ],
            
                'edit' => [
                    'access-control' => 'בקרת גישה',
                    'all'            => 'הכל',
                    'back-btn'       => 'חזור',
                    'custom'         => 'מותאם אישית',
                    'description'    => 'תיאור',
                    'general'        => 'כללי',
                    'name'           => 'שם',
                    'permissions'    => 'הרשאות',
                    'save-btn'       => 'שמור תפקיד',
                    'title'          => 'ערוך תפקיד',
                ],
            
                'being-used'        => 'התפקיד כבר בשימוש על ידי סוכן אחר',
                'last-delete-error' => 'אי אפשר למחוק תפקיד אחרון',
                'create-success'    => 'התפקיד נוצר בהצלחה',
                'delete-success'    => 'התפקיד נמחק בהצלחה',
                'delete-failed'     => 'נכשל במחיקת התפקיד',
                'update-success'    => 'התפקיד עודכן בהצלחה',
            ],
            
            'locales' => [
                'index' => [
                    'title'      => 'רשימת אזורים',
                    'create-btn' => 'צור אזור',
            
                    'create' => [
                        'title'            => 'צור אזור',
                        'code'             => 'קוד',
                        'name'             => 'שם',
                        'direction'        => 'כיוון',
                        'select-direction' => 'בחר כיוון',
                        'text-ltr'         => 'מימין לשמאל',
                        'text-rtl'         => 'משמאל לימין',
                        'locale-logo'      => 'לוגו אזור',
                        'logo-size'        => 'גודל התמונה צריך להיות 24 פיקסלים על 16 פיקסלים',
                        'save-btn'         => 'שמור אזור',
                    ],
            
                    'edit' => [
                        'title'     => 'ערוך אזור',
                        'code'      => 'קוד',
                        'name'      => 'שם',
                        'direction' => 'כיוון',
                    ],
            
                    'datagrid' => [
                        'id'        => 'מזהה',
                        'code'      => 'קוד',
                        'name'      => 'שם',
                        'direction' => 'כיוון',
                        'text-ltr'  => 'מימין לשמאל',
                        'text-rtl'  => 'משמאל לימין',
                        'actions'   => 'פעולות',
                        'edit'      => 'ערוך',
                        'delete'    => 'מחק',
                    ],
                ],
                
                'being-used'        => 'האזור :locale_name משמש כאזור ברירת המחדל בערוץ',
                'create-success'    => 'האזור נוצר בהצלחה',
                'update-success'    => 'האזור עודכן בהצלחה',
                'delete-success'    => 'האזור נמחק בהצלחה',
                'delete-failed'     => 'נכשל במחיקת האזור',
                'last-delete-error' => 'נדרש לפחות אזור אחד סופר אדמין',
            ],

            'currencies' => [
                'index' => [
                    'title'      => 'רשימת מטבעות',
                    'create-btn' => 'יצירת מטבע',
            
                    'create' => [
                        'title'    => 'יצירת מטבע',
                        'code'     => 'קוד',
                        'name'     => 'שם',
                        'symbol'   => 'סמל',
                        'decimal'  => 'עשרוני',
                        'save-btn' => 'שמירת מטבע',
                    ],
            
                    'edit' => [
                        'title'    => 'עריכת מטבע',
                        'code'     => 'קוד',
                        'name'     => 'שם',
                        'symbol'   => 'סמל',
                        'decimal'  => 'עשרוני',
                        'save-btn' => 'שמירת מטבע',
                    ],
            
                    'datagrid' => [
                        'id'      => 'מזהה',
                        'code'    => 'קוד',
                        'name'    => 'שם',
                        'actions' => 'פעולות',
                        'edit'    => 'עריכה',
                        'delete'  => 'מחיקה',
                    ],
                ],
            
                'create-success'      => 'המטבע נוצר בהצלחה.',
                'update-success'      => 'המטבע עודכן בהצלחה.',
                'delete-success'      => 'המטבע נמחק בהצלחה.',
                'delete-failed'       => 'נכשלה מחיקת המטבע.',
                'last-delete-error'   => 'נדרש לפחות מטבע אחד למנהל עליון.',
                'mass-delete-success' => 'המטבעות הנבחרים נמחקו בהצלחה.',
            ],
            
            'exchange-rates' => [
                'index' => [
                    'title'        => 'שערי החליפין',
                    'create-btn'   => 'יצירת שער החליפין',
                    'update-rates' => 'עדכון שערים',
            
                    'create' => [
                        'title'                  => 'יצירת שער החליפין',
                        'source-currency'        => 'מטבע מקור',
                        'target-currency'        => 'מטבע יעד',
                        'select-target-currency' => 'בחר מטבע יעד',
                        'rate'                   => 'שער',
                        'save-btn'               => 'שמירת שער החליפין',
                    ],
            
                    'edit' => [
                        'title'           => 'עריכת שער החליפין',
                        'source-currency' => 'מטבע מקור',
                        'target-currency' => 'מטבע יעד',
                        'rate'            => 'שער',
                        'save-btn'        => 'שמירת שער החליפין',
                    ],
            
                    'datagrid' => [
                        'id'            => 'מזהה',
                        'currency-name' => 'שם המטבע',
                        'exchange-rate' => 'שער החליפין',
                        'actions'       => 'פעולות',
                        'edit'          => 'עריכה',
                        'delete'        => 'מחיקה',
                    ],
                ],
            
                'create-success' => 'שער החליפין נוצר בהצלחה.',
                'update-success' => 'שער החליפין עודכן בהצלחה.',
                'delete-success' => 'שער החליפין נמחק בהצלחה.',
                'delete-failed'  => 'נכשלה מחיקת שער החליפין.',
            ],
            
            'channels' => [
                'index' => [
                    'title' => 'ערוצים',
            
                    'datagrid' => [
                        'id'       => 'מזהה',
                        'code'     => 'קוד',
                        'name'     => 'שם',
                        'hostname' => 'שם מארח',
                        'actions'  => 'פעולות',
                        'edit'     => 'ערוך',
                        'delete'   => 'מחק',
                    ],
                ],
            
                'edit' => [
                    'title'                  => 'ערוך ערוץ',
                    'back-btn'               => 'חזור',
                    'save-btn'               => 'שמור ערוץ',
                    'general'                => 'כללי',
                    'code'                   => 'קוד',
                    'name'                   => 'שם',
                    'description'            => 'תיאור',
                    'hostname'               => 'שם מארח',
                    'hostname-placeholder'   => 'https://www.example.com (אל תוסיף קו לסיום.)',
                    'design'                 => 'עיצוב',
                    'theme'                  => 'ערכת נושא',
                    'logo'                   => 'לוגו',
                    'logo-size'              => 'הרזולוציה המומלצת היא כמו 192 פיקסלים על 50 פיקסלים',
                    'favicon'                => 'סמל אתר',
                    'favicon-size'           => 'הרזולוציה המומלצת היא כמו 16 פיקסלים על 16 פיקסלים',
                    'seo'                    => 'SEO לעמוד הבית',
                    'seo-title'              => 'כותרת מטא',
                    'seo-description'        => 'תיאור מטא',
                    'seo-keywords'           => 'מילות מפתח מטא',
                    'currencies-and-locales' => 'מטבעות ושפות מקומיות',
                    'locales'                => 'שפות מקומיות',
                    'default-locale'         => 'שפה ברירת מחדל',
                    'currencies'             => 'מטבעות',
                    'default-currency'       => 'מטבע ברירת מחדל',
                    'last-delete-error'      => 'נדרש לפחות ערוץ אחד.',
                    'settings'               => 'הגדרות',
                    'status'                 => 'סטטוס',
                    'update-success'         => 'עדכון ערוץ בוצע בהצלחה',
                ],
            
                'update-success' => 'עדכון ערוץ בוצע בהצלחה.',
                'delete-success' => 'מחיקת ערוץ בוצעה בהצלחה.',
                'delete-failed'  => 'מחיקת ערוץ נכשלה',
            ],

            'themes' => [
                'index' => [
                    'create-btn' => 'יצירת ערכת נושא',
                    'title'      => 'ערכות נושא',
                    'datagrid'   => [
                        'active'       => 'פעיל',
                        'channel_name' => 'שם הערוץ',
                        'delete'       => 'מחיקה',
                        'inactive'     => 'לא פעיל',
                        'id'           => 'מזהה',
                        'name'         => 'שם',
                        'status'       => 'סטטוס',
                        'sort-order'   => 'סדר מיון',
                        'type'         => 'סוג',
                        'view'         => 'תצוגה',
                    ],
                ],
            
                'create' => [
                    'name'       => 'שם',
                    'save-btn'   => 'שמירת ערכת נושא',
                    'sort-order' => 'סדר מיון',
                    'title'      => 'יצירת ערכת נושא',
            
                    'type' => [
                        'footer-links'     => 'קישורי תחתית',
                        'image-carousel'   => 'קרוסלת תמונות',
                        'product-carousel' => 'קרוסלת מוצרים',
                        'static-content'   => 'תוכן סטטי',
                        'services-content' => 'תוכן שירותים',
                        'title'            => 'סוג',
                    ],
                ],
            
                'edit' => [
                    'add-image-btn'                 => 'הוסף תמונה',
                    'add-filter-btn'                => 'הוסף מסנן',
                    'add-footer-link-btn'           => 'הוסף קישור תחתית',
                    'add-link'                      => 'הוסף קישור',
                    'asc'                           => 'סדר עולה',
                    'back'                          => 'חזרה',
                    'category-carousel-description' => 'תצוגה מושכת של קטגוריות דינמיות באמצעות קרוסלת קטגוריות רספונסיבית.',
                    'category-carousel'             => 'קרוסלת קטגוריות',
                    'create-filter'                 => 'יצירת מסנן',
                    'css'                           => 'CSS',
                    'column'                        => 'עמודה',
                    'channels'                      => 'ערוצים',
                    'desc'                          => 'סדר יורד',
                    'delete'                        => 'מחיקה',
                    'edit'                          => 'עריכה',
                    'footer-title'                  => 'כותרת',
                    'footer-link'                   => 'קישורי תחתית',
                    'footer-link-form-title'        => 'קישור תחתית',
                    'filter-title'                  => 'כותרת',
                    'filters'                       => 'מסננים',
                    'footer-link-description'       => 'ניווט דרך קישורי תחתית לטיול באתר בצורה חלקה ומידע.',
                    'general'                       => 'כללי',
                    'html'                          => 'HTML',
                    'image'                         => 'תמונה',
                    'image-size'                    => 'רזולוציית התמונה צריכה להיות (1920 פיקסלים X 700 פיקסלים)',
                    'image-title'                   => 'כותרת התמונה',
                    'image-upload-message'          => 'רק תמונות (.jpeg, .jpg, .png, .webp, ..) מורשות.',
                    'key'                           => 'מפתח: :key',
                    'key-input'                     => 'מפתח',
                    'link'                          => 'קישור',
                    'limit'                         => 'מגבלה',
                    'name'                          => 'שם',
                    'product-carousel'              => 'קרוסלת מוצרים',
                    'product-carousel-description'  => 'הצגת מוצרים בצורה אלגנטית עם קרוסלת מוצרים דינמית ורספונסיבית.',
                    'path'                          => 'נתיב',
                    'preview'                       => 'תצוגה מקדימה',
                    'slider'                        => 'סליידר',
                    'static-content-description'    => 'שפר את ההתעסקות עם תוכן סטטי ומידע לקהל שלך.',
                    'static-content'                => 'תוכן סטטי',
                    'slider-description'            => 'התאמת ערכת נושא הקשורה לסליידר.',
                    'slider-required'               => 'שדה הסליידר הוא שדה חובה.',
                    'slider-add-btn'                => 'הוסף סליידר',
                    'save-btn'                      => 'שמירה',
                    'sort'                          => 'מיון',
                    'sort-order'                    => 'סדר מיון',
                    'status'                        => 'סטטוס',
                    'slider-image'                  => 'תמונת סליידר',
                    'select'                        => 'בחר',
                    'title'                         => 'עריכת ערכת נושא',
                    'update-slider'                 => 'עדכון סליידר',
                    'url'                           => 'כתובת',
                    'value-input'                   => 'ערך',
                    'value'                         => 'ערך: :value',
            
                    'services-content' => [
                        'add-btn'            => 'הוסף שירותים',
                        'channels'           => 'ערוצים',
                        'delete'             => 'מחיקה',
                        'description'        => 'תיאור',
                        'general'            => 'כללי',
                        'name'               => 'שם',
                        'save-btn'           => 'שמור',
                        'service-icon'       => 'איקון שירות',
                        'service-icon-class' => 'קורס שירות',
                        'service-info'       => 'התאמת ערכת נושא הקשורה לשירותים.',
                        'services'           => 'שירותים',
                        'sort-order'         => 'סדר מיון',
                        'status'             => 'סטטוס',
                        'title'              => 'כותרת',
                        'update-service'     => 'עדכון שירותים',
                    ],
                ],
            
                'create-success' => 'ערכת נושא נוצרה בהצלחה',
                'delete-success' => 'ערכת נושא נמחקה בהצלחה',
                'update-success' => 'ערכת נושא עודכנה בהצלחה',
                'delete-failed'  => 'אירעה שגיאה בעת מחיקת תוכן הנושא.',
            ],
            
            'email' => [
                'create' => [
                    'send-btn'                  => 'שלח דוא"ל',
                    'back-btn'                  => 'חזור',
                    'title'                     => 'שליחת דוא"ל',
                    'general'                   => 'כללי',
                    'body'                      => 'גוף הודעה',
                    'subject'                   => 'נושא',
                    'dear'                      => 'יקר :agent_name',
                    'agent-registration'        => 'הרשמת סוכן ב-Saas בוצעה בהצלחה',
                    'summary'                   => 'חשבונך נוצר. פרטי חשבונך הם:',
                    'saas-url'                  => 'דומיין',
                    'email'                     => 'דוא"ל',
                    'password'                  => 'סיסמה',
                    'sign-in'                   => 'התחברות',
                    'thanks'                    => 'תודה!',
                    'send-email-to-all-tenants' => 'שלח דוא"ל לכל השוכרים',
                ],
            
                'send-success' => 'הדוא"ל נשלח בהצלחה.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'רשימת עמודי CMS',
                'create-btn' => 'יצירת עמוד',
        
                'datagrid' => [
                    'id'                  => 'מזהה',
                    'page-title'          => 'כותרת העמוד',
                    'url-key'             => 'מפתח URL',
                    'status'              => 'סטטוס',
                    'active'              => 'פעיל',
                    'disable'             => 'בטל פעולה',
                    'edit'                => 'ערוך עמוד',
                    'delete'              => 'מחק עמוד',
                    'mass-delete'         => 'מחיקה מרובה',
                    'mass-delete-success' => 'העמודים שנבחרו נמחקו בהצלחה',
                ],
            ],
        
            'create' => [
                'title'            => 'יצירת עמוד CMS',
                'first-name'       => 'שם פרטי',
                'general'          => 'כללי',
                'page-title'       => 'כותרת',
                'channels'         => 'ערוצים',
                'content'          => 'תוכן',
                'meta-keywords'    => 'מילות מפתח למטה-דף',
                'meta-description' => 'תיאור מטה-דף',
                'meta-title'       => 'כותרת מטה-דף',
                'seo'              => 'קידום אתרים',
                'url-key'          => 'מפתח URL',
                'description'      => 'תיאור',
                'save-btn'         => 'שמור עמוד CMS',
                'back-btn'         => 'חזור',
            ],
        
            'edit' => [
                'title'            => 'עריכת עמוד',
                'preview-btn'      => 'תצוגה מקדימה של העמוד',
                'save-btn'         => 'שמור עמוד',
                'general'          => 'כללי',
                'page-title'       => 'כותרת העמוד',
                'back-btn'         => 'חזור',
                'channels'         => 'ערוצים',
                'content'          => 'תוכן',
                'seo'              => 'קידום אתרים',
                'meta-keywords'    => 'מילות מפתח למטה-דף',
                'meta-description' => 'תיאור מטה-דף',
                'meta-title'       => 'כותרת מטה-דף',
                'url-key'          => 'מפתח URL',
                'description'      => 'תיאור',
            ],
        
            'create-success' => 'CMS נוצר בהצלחה.',
            'delete-success' => 'CMS נמחק בהצלחה.',
            'update-success' => 'CMS עודכן בהצלחה.',
            'no-resource'    => 'המשאב אינו קיים.',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => 'מחק',
                'enable-at-least-one-shipping' => 'הפעל לפחות אחת משיטות המשלוח.',
                'enable-at-least-one-payment'  => 'הפעל לפחות אחת משיטות התשלום.',
                'save-btn'                     => 'שמור הגדרות',
                'save-message'                 => 'ההגדרות נשמרו בהצלחה',
                'title'                        => 'הגדרות',
        
                'general' => [
                    'info'  => 'ניהול פרטי פריסה ודוא"ל',
                    'title' => 'כללי',
        
                    'design' => [
                        'info'  => 'הגדר לוגו וסמל Favicon.',
                        'title' => 'עיצוב',
        
                        'super' => [
                            'info'          => 'לוגו של מנהל המערכת הוא דמות מטרידה או סמל המייצג את ממשק הניהול של מערכת או אתר, לרוב אפשר להתאימו.',
                            'admin-logo'    => 'לוגו מנהל',
                            'logo-image'    => 'דימוי לוגו',
                            'favicon-image' => 'דימוי Favicon',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => 'הגדרת כתובת דוא"ל למנהל מערכת.',
                        'title' => 'סופר אייג\'נט',
        
                        'super' => [
                            'info'          => 'הגדרת כתובת דוא"ל לסופר אדמין לקבל התראות בדוא"ל',
                            'email-address' => 'כתובת דוא"ל',
                        ],

                        'social-connect' => [
                            'title'    => 'חיבור חברתי',
                            'info'     => 'פלטפורמות רשת חברתית מספקות הזדמנויות לאינטראקציה ישירה עם הקהל שלך דרך תגובות, לייקים ושיתופים, תוך קידום ההתמעלות ובניית קהילה סביב המותג שלך.',
                            'facebook' => 'פייסבוק',
                            'twitter'  => 'טוויטר',
                            'linkedin' => 'לינקדאין',
                        ],
                    ],
        
                    'content' => [
                        'info'   => 'הגדרת מידע לכותרת ולכותרת התחתית של תצוגת השכרת הדיירים.',
                        'title'  => 'תוכן',
        
                        'footer' => [
                            'info'           => 'הגדרת תוכן לתחתית',
                            'title'          => 'תחתית',
                            'footer-content' => 'טקסט לתחתית',
                            'footer-toggle'  => 'שנה תחתית',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => 'ניהול פרטי מכירות, משלוחים ופרטי שיטות התשלום',
                    'title' => 'מכירות',
        
                    'shipping-methods' => [
                        'info'  => 'הגדרת מידע של שיטות המשלוח',
                        'title' => 'שיטות משלוח',
                    ],
        
                    'payment-methods' => [
                        'info'  => 'הגדרת מידע של שיטות התשלום',
                        'title' => 'שיטות תשלום',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => 'הפעל לפחות אחת משיטות המשלוח.',
            'enable-at-least-one-payment'  => 'הפעל לפחות אחת משיטות התשלום.',
            'save-message'                 => 'הצלחה: הגדרות סופר אדמין נשמרו בהצלחה.',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'הרשמה כשוכר',
            ],
    
            'footer' => [
                'footer-text'     => '© זכויות יוצרים 2010 - 2023, Webkul Software (רשום בהודו). כל הזכויות שמורות.',
                'connect-with-us' => 'התחברות איתנו',
                'text-locale'     => 'אזור',
                'text-currency'   => 'מטבע',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => 'רישום סוחר',
            'step-1'              => 'שלב 1',
            'auth-cred'           => 'אימות פרטים',
            'email'               => 'אימייל',
            'phone'               => 'טלפון',
            'username'            => 'שם משתמש',
            'password'            => 'סיסמה',
            'cpassword'           => 'אימות סיסמה',
            'continue'            => 'המשך',
            'step-2'              => 'שלב 2',
            'personal'            => 'פרטים אישיים',
            'first-name'          => 'שם פרטי',
            'last-name'           => 'שם משפחה',
            'step-3'              => 'שלב 3',
            'org-details'         => 'פרטי הארגון',
            'org-name'            => 'שם הארגון',
            'company-activated'   => 'הצלחה: החברה הופעלה בהצלחה.',
            'company-deactivated' => 'הצלחה: החברה הושבתה בהצלחה.',
            'company-updated'     => 'הצלחה: פרטי החברה עודכנו בהצלחה.',
            'something-wrong'     => 'אזהרה: משהו השתבש.',
            'store-created'       => 'הצלחה: החנות נוצרה בהצלחה.',
            'something-wrong-1'   => 'אזהרה: משהו השתבש, נסה שוב מאוחר יותר.',
            'content'             => 'הפוך לסוחר וצור את החנות שלך בקלות ובלתי פלא ולא צריך לדאוג להתקין ולנהל את השרת. אתה רק צריך להירשם, להעלות נתוני מוצר ולקבל את החנות שלך למכירת מכר. מודול SaaS של לראוול החברה הרבתי מציע אפשרויות התאמה קלות, וזה אומר שהסוחר יכול בקלות להוסיף כל תכונה או תכונה נוספת לחנות שלו או לשדרג אותה בקלות.',
    
            'right-panel' => [
                'heading'    => 'איך להגדיר חשבון סוחר',
                'para'       => 'זה קל להגדיר את המודול בכמה צעדים בלבד',
                'step-one'   => 'הזן פרטי אימות כמו כתובת דוא"ל, סיסמה ואימות סיסמה',
                'step-two'   => 'הזן פרטים אישיים כמו שם פרטי, שם משפחה ומספר טלפון',
                'step-three' => 'הזן פרטי הארגון כמו שם משתמש, שם הארגון',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => 'אזהרה: אין ליצור יותר מערוץ אחד',
            'channel-hostname'                  => 'אזהרה: אנא צור קשר עם המנהל לשינוי שם המארח שלך',
            'same-domain'                       => 'אזהרה: לא ניתן לשמור דומיין משני כדומין ראשי',
            'block-message'                     => 'אזהרה: אם ברצונך לשחרר את השוכר הזה, תרגיש חופשי ליצור איתנו קשר, אנו זמינים 24/7 לפתור את הבעיה שלך.',
            'blocked'                           => 'חוסם',
            'illegal-action'                    => 'אזהרה: ביצעת פעולה לא חוקית',
            'domain-message'                    => 'אזהרה: אופס! לא יכולנו לעזור ב־<b>:domain</b>',
            'domain-desc'                       => 'אם ברצונך ליצור חשבון עם <b>:domain</b> כארגון, נפשט ליצור חשבון ולהתחיל.',
            'illegal-message'                   => 'אזהרה: הפעולה שביצעת מושבתת על ידי מנהל האתר, אנא שלח אימייל למנהל האתר שלך לקבלת פרטים נוספים על זה.',
            'locale-creation'                   => 'אזהרה: אין ליצור לוקייל שונה מאנגלית',
            'locale-delete'                     => 'אזהרה: לא ניתן למחוק את הלוקייל',
            'cannot-delete-default'             => 'אזהרה: לא ניתן למחוק את הערוץ הברירת מחדל.',
            'tenant-blocked'                    => 'שוכר חסום',
            'domain-not-found'                  => 'אזהרה: הדומיין לא נמצא.',
            'company-blocked-by-administrator'  => 'השוכר הזה נחסם',
            'not-allowed-to-visit-this-section' => 'אזהרה: אין לך הרשאה להשתמש במקטע הזה.',
            'auth'                              => 'אזהרה: שגיאת אימות!',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'חברה חדשה נרשמה',
                'first-name' => 'שם פרטי',
                'last-name'  => 'שם משפחה',
                'email'      => 'דוא"ל',
                'name'       => 'שם',
                'username'   => 'שם משתמש',
                'domain'     => 'דומיין',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => 'חברה חדשה נרשמה בהצלחה',
                'dear'       => 'יקר :tenant_name',
                'greeting'   => 'ברוך הבא ותודה שנרשמת אלינו!',
                'summary'    => 'החשבון שלך נוצר בהצלחה וניתן להתחבר באמצעות כתובת הדוא"ל והפרטי סיסמה שלך. לאחר התחברות, תוכל לגשת לשאר השירותים, כולל מוצרים, מכירות, לקוחות, ביקורות וקידום מכירות.',
                'thanks'     => 'תודה!',
                'visit-shop' => 'בקר בחנות',
            ],
        ],
    
    ],
    
    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'ערוך פרטי חברה',
            'first-name'     => 'שם פרטי',
            'last-name'      => 'שם משפחה',
            'email'          => 'דוא"ל',
            'skype'          => 'סקייפ',
            'cname'          => 'שם חברה',
            'phone'          => 'טלפון',
            'general'        => 'כללי',
            'back-btn'       => 'חזור',
            'save-btn'       => 'שמור פרטים',
            'update-success' => 'הצלחה: :resource עודכן בהצלחה.',
            'update-failed'  => 'אזהרה: לא ניתן לעדכן :resource עקב סיבות לא ידועות.',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => 'רשימת כתובות חברה',
                'create-btn' => 'הוסף כתובת',
    
                'datagrid' => [
                    'id'          => 'מזהה',
                    'address1'    => 'כתובת 1',
                    'address2'    => 'כתובת 2',
                    'city'        => 'עיר',
                    'country'     => 'מדינה',
                    'edit'        => 'ערוך',
                    'delete'      => 'מחק',
                    'mass-delete' => 'מחיקה מרובה',
                ],
            ],
    
            'create' => [
                'title'     => 'צור כתובת חברה',
                'general'   => 'כללי',
                'address1'  => 'כתובת1',
                'address2'  => 'כתובת2',
                'country'   => 'מדינה',
                'state'     => 'מדינה',
                'city'      => 'עיר',
                'post-code' => 'מיקוד',
                'phone'     => 'טלפון',
                'back-btn'  => 'חזור',
                'save-btn'  => 'שמור כתובת',
            ],
    
            'edit' => [
                'title'     => 'ערוך כתובת חברה',
                'general'   => 'כללי',
                'address1'  => 'כתובת1',
                'address2'  => 'כתובת2',
                'country'   => 'מדינה',
                'state'     => 'מדינה',
                'city'      => 'עיר',
                'post-code' => 'מיקוד',
                'phone'     => 'טלפון',
                'back-btn'  => 'חזור',
                'save-btn'  => 'שמור כתובת',
            ],
    
            'create-success'      => 'הצלחה: כתובת החברה נוצרה בהצלחה.',
            'update-success'      => 'הצלחה: כתובת החברה עודכנה בהצלחה.',
            'delete-success'      => 'הצלחה: :resource נמחק בהצלחה.',
            'delete-failed'       => 'אזהרה: לא ניתן למחוק :resource עקב סיבות לא ידועות.',
            'mass-delete-success' => 'הצלחה: הכתובת הנבחרת נמחקה בהצלחה.',
        ],
    
        'system' => [
            'social-login'           => 'כניסה חברתית',
            'facebook'               => 'הגדרות פייסבוק',
            'facebook-client-id'     => 'זיהוי לקוח של פייסבוק',
            'facebook-client-secret' => 'סוד לקוח של פייסבוק',
            'facebook-callback-url'  => 'כתובת החזרה של פייסבוק',
            'twitter'                => 'הגדרות טוויטר',
            'twitter-client-id'      => 'זיהוי לקוח של טוויטר',
            'twitter-client-secret'  => 'סוד לקוח של טוויטר',
            'twitter-callback-url'   => 'כתובת החזרה של טוויטר',
            'google'                 => 'הגדרות גוגל',
            'google-client-id'       => 'זיהוי לקוח של גוגל',
            'google-client-secret'   => 'סוד לקוח של גוגל',
            'google-callback-url'    => 'כתובת החזרה של גוגל',
            'linkedin'               => 'הגדרות לינקדאין',
            'linkedin-client-id'     => 'זיהוי לקוח של לינקדאין',
            'linkedin-client-secret' => 'סוד לקוח של לינקדאין',
            'linkedin-callback-url'  => 'כתובת החזרה של לינקדאין',
            'github'                 => 'הגדרות GitHub',
            'github-client-id'       => 'זיהוי לקוח של GitHub',
            'github-client-secret'   => 'סוד לקוח של GitHub',
            'github-callback-url'    => 'כתובת החזרה של GitHub',
            'email-credentials'      => 'פרטי דוא"ל',
            'mail-driver'            => 'נהג דוא"ל',
            'mail-host'              => 'מארח דוא"ל',
            'mail-port'              => 'יציאת דוא"ל',
            'mail-username'          => 'שם משתמש של דוא"ל',
            'mail-password'          => 'סיסמת דוא"ל',
            'mail-encryption'        => 'הצפנת דוא"ל',
        ],
    
        'tenant' => [
            'id'              => 'מזהה',
            'first-name'      => 'שם פרטי',
            'last-name'       => 'שם משפחה',
            'email'           => 'דוא"ל',
            'skype'           => 'סקייפ',
            'c-name'          => 'שם חברה',
            'add-address'     => 'הוסף כתובת',
            'country'         => 'מדינה',
            'city'            => 'עיר',
            'address1'        => 'כתובת 1',
            'address2'        => 'כתובת 2',
            'address'         => 'רשימת כתובות',
            'company'         => 'שוכר',
            'profile'         => 'פרופיל',
            'update'          => 'עדכן',
            'address-details' => 'פרטי כתובת',
            'create-failed'   => 'אזהרה: לא ניתן ליצור :attribute עקב סיבות לא ידועות.',
            'update-success'  => 'הצלחה: :resource עודכן בהצלחה.',
            'update-failed'   => 'אזהרה: לא ניתן לעדכן :resource עקב סיבות לא ידועות.',
    
            'company-address' => [
                'add-address-title'    => 'כתובת חדשה',
                'update-address-title' => 'עדכן כתובת',
                'save-btn-title'       => 'שמור כתובת',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'הזמנה :order_id הוזמנה על ידי :placed_by ב־:created_at.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'אופס! הדף שאתה מחפש בחופשה. נראה שלא הצלחנו למצוא את מה שחיפשת.',
            'title'       => '404 דף לא נמצא',
        ],

        '401' => [
            'description' => 'אופס! נראה שאין לך הרשאה לגשת לדף הזה. נראה שאתה חסר את הפרטים הנדרשים.',
            'title'       => '401 לא מורשה',
        ],

        '403' => [
            'description' => 'אופס! דף זה אסור. נראה שאין לך הרשאות הדרושות לצפות בתוכן זה.',
            'title'       => '403 אסור',
        ],

        '500' => [
            'description' => 'אופס! משהו השתבש. נראה שיש לנו בעיה בטעינת הדף שאתה מחפש.',
            'title'       => '500 שגיאת שרת פנימית',
        ],

        '503' => [
            'description' => 'אופס! נראה שאנחנו בתחזוקה זמנית. אנא בדוק שוב בעוד כמה רגעים.',
            'title'       => '503 שירות לא זמין',
        ],
    ],
];
