<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'Версія: :version',
                'account-title' => 'Обліковий запис',
                'logout'        => 'Вийти',
                'my-account'    => 'Мій обліковий запис',
                'visit-shop'    => 'Відвідати магазин',
            ],
    
            'sidebar' => [
                'tenants'          => 'Орендатори',
                'tenant-customers' => 'Клієнти орендатора',
                'tenant-products'  => 'Продукти орендатора',
                'tenant-orders'    => 'Замовлення орендатора',
                'settings'         => 'Налаштування',
                'agents'           => 'Агенти',
                'roles'            => 'Ролі',
                'locales'          => 'Локалі',
                'currencies'       => 'Валюти',
                'channels'         => 'Канали',
                'exchange-rates'   => 'Курси валют',
                'themes'           => 'Теми',
                'cms'              => 'CMS',
                'configurations'   => 'Конфігурації',
                'general'          => 'Загальне',
                'send-email'       => 'Надіслати електронного листа',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'Орендарі',
            'create'         => 'Додати',
            'edit'           => 'Редагувати',
            'delete'         => 'Видалити',
            'cancel'         => 'Скасувати',
            'view'           => 'Переглянути',
            'mass-delete'    => 'Масове видалення',
            'mass-update'    => 'Масове оновлення',
            'customers'      => 'Клієнти',
            'products'       => 'Продукти',
            'orders'         => 'Замовлення',
            'settings'       => 'Налаштування',
            'agents'         => 'Агенти',
            'roles'          => 'Ролі',
            'locales'        => 'Локалі',
            'currencies'     => 'Валюти',
            'exchange-rates' => 'Курси валют',
            'channels'       => 'Канали',
            'themes'         => 'Теми',
            'send-email'     => 'Надіслати електронного листа',
            'cms'            => 'CMS',
            'configuration'  => 'Конфігурація',
            'download'       => 'Завантажити',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => 'Увійти як Супер Адміністратор',
                'email'                => 'Електронна адреса',
                'password'             => 'Пароль',
                'btn-submit'           => 'Увійти',
                'forget-password-link' => 'Забули пароль?',
                'submit-btn'           => 'Увійти',
                'login-success'        => 'Успіх: Ви успішно увійшли.',
                'login-error'          => 'Будь ласка, перевірте свої дані та спробуйте ще раз.',
                'activate-warning'     => 'Ваш обліковий запис ще не активовано, будь ласка, зв\'яжіться з адміністратором.',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'Забули пароль',
                    'title'           => 'Відновлення пароля',
                    'email'           => 'Зареєстрована електронна пошта',
                    'reset-link-sent' => 'Посилання для скидання пароля надіслано',
                    'sign-in-link'    => 'Повернутися до входу ?',
                    'email-not-exist' => 'Електронна пошта не існує',
                    'submit-btn'      => 'Скинути',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'Скидання пароля',
                'back-link-title'  => 'Повернутися до входу ?',
                'confirm-password' => 'Підтвердіть пароль',
                'email'            => 'Зареєстрована електронна пошта',
                'password'         => 'Пароль',
                'submit-btn'       => 'Скинути пароль',
            ],
        ],
        
        'tenants' => [
            'index' => [
                'title'        => 'Список орендарів',
                'register-btn' => 'Зареєструвати орендаря',
        
                'create' => [
                    'title'             => 'Створити орендаря',
                    'first-name'        => 'Ім\'я',
                    'last-name'         => 'Прізвище',
                    'user-name'         => 'Ім\'я користувача',
                    'organization-name' => 'Назва організації',
                    'phone'             => 'Телефон',
                    'email'             => 'Електронна адреса',
                    'password'          => 'Пароль',
                    'confirm-password'  => 'Підтвердити пароль',
                    'save-btn'          => 'Зберегти орендаря',
                    'back-btn'          => 'Назад',
                ],
        
                'datagrid' => [
                    'id'                  => 'Ідентифікатор',
                    'user-name'           => 'Ім\'я користувача',
                    'organization'        => 'Організація',
                    'domain'              => 'Домен',
                    'cname'               => 'Cname',
                    'status'              => 'Статус',
                    'active'              => 'Активний',
                    'disable'             => 'Відключений',
                    'view'                => 'Переглянути відомості',
                    'edit'                => 'Змінити орендаря',
                    'delete'              => 'Видалити орендаря',
                    'mass-delete'         => 'Масове видалення',
                    'mass-delete-success' => 'Обрані орендарі успішно видалені',
                ],
            ],
        
            'edit' => [
                'title'             => 'Редагувати орендаря',
                'first-name'        => 'Ім\'я',
                'last-name'         => 'Прізвище',
                'user-name'         => 'Ім\'я користувача',
                'cname'             => 'Cname',
                'organization-name' => 'Назва організації',
                'phone'             => 'Телефон',
                'status'            => 'Статус',
                'email'             => 'Електронна адреса',
                'password'          => 'Пароль',
                'confirm-password'  => 'Підтвердити пароль',
                'save-btn'          => 'Зберегти орендаря',
                'back-btn'          => 'Назад',
                'general'           => 'Загальні',
                'settings'          => 'Налаштування',
            ],
        
            'view' => [
                'title'                        => 'Інформація орендаря',
                'heading'                      => 'Орендар - :tenant_name',
                'email-address'                => 'Електронна адреса',
                'phone'                        => 'Телефон',
                'domain-information'           => 'Інформація про домен',
                'mapped-domain'                => 'Співставлений домен',
                'cname-information'            => 'Інформація про Cname',
                'cname-entry'                  => 'Запис Cname',
                'attribute-information'        => 'Інформація про атрибути',
                'no-of-attributes'             => 'Кількість атрибутів',
                'attribute-family-information' => 'Інформація про родини атрибутів',
                'no-of-attribute-families'     => 'Кількість родин атрибутів',
                'product-information'          => 'Інформація про продукти',
                'no-of-products'               => 'Кількість продуктів',
                'customer-information'         => 'Інформація про клієнтів',
                'no-of-customers'              => 'Кількість клієнтів',
                'customer-group-information'   => 'Інформація про групи клієнтів',
                'no-of-customer-groups'        => 'Кількість груп клієнтів',
                'category-information'         => 'Інформація про категорії',
                'no-of-categories'             => 'Кількість категорій',
                'addresses'                    => 'Список адрес (:count)',
                'empty-title'                  => 'Додати адресу орендаря',
            ],
        
            'create-success' => 'Орендар створений успішно',
            'delete-success' => 'Орендар видалений успішно',
            'delete-failed'  => 'Видалення орендаря не вдалося',
            'product-copied' => 'Орендар успішно скопійований',
            'update-success' => 'Орендар оновлений успішно',
        
            'customers' => [
                'index' => [
                    'title' => 'Список клієнтів',
        
                    'datagrid' => [
                        'id'             => 'Ідентифікатор',
                        'domain'         => 'Домен',
                        'customer-name'  => 'Ім\'я клієнта',
                        'email'          => 'Електронна адреса',
                        'customer-group' => 'Група клієнтів',
                        'phone'          => 'Телефон',
                        'status'         => 'Статус',
                        'active'         => 'Активний',
                        'inactive'       => 'Неактивний',
                        'is-suspended'   => 'Підвішено',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => 'Список продуктів',
        
                    'datagrid' => [
                        'id'               => 'Ідентифікатор',
                        'domain'           => 'Домен',
                        'name'             => 'Назва',
                        'sku'              => 'Артикул',
                        'attribute-family' => 'Сім\'я атрибутів',
                        'image'            => 'Зображення',
                        'price'            => 'Ціна',
                        'qty'              => 'Кількість',
                        'status'           => 'Статус',
                        'active'           => 'Активний',
                        'inactive'         => 'Неактивний',
                        'category'         => 'Категорія',
                        'type'             => 'Тип',
                    ],
                ],
            ],
        
            'orders' => [
                'index' => [
                    'title' => 'Список замовлень',
        
                    'datagrid' => [
                        'id'              => '#:ідентифікатор',
                        'order-id'        => 'Ідентифікатор замовлення',
                        'domain'          => 'Домен',
                        'sub-total'       => 'Сума без урахування податків',
                        'grand-total'     => 'Загальна сума',
                        'order-date'      => 'Дата замовлення',
                        'channel-name'    => 'Назва каналу',
                        'status'          => 'Статус',
                        'processing'      => 'Обробляється',
                        'completed'       => 'Завершено',
                        'canceled'        => 'Скасовано',
                        'closed'          => 'Закрито',
                        'pending'         => 'В очікуванні',
                        'pending-payment' => 'Очікує оплати',
                        'fraud'           => 'Шахрайство',
                        'customer'        => 'Клієнт',
                        'email'           => 'Електронна адреса',
                        'location'        => 'Місцезнаходження',
                        'images'          => 'Зображення',
                        'pay-by'          => 'Оплачено - ',
                        'pay-via'         => 'Оплата через',
                        'date'            => 'Дата',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'Список агентів',
                    'register-btn' => 'Створити агента',
            
                    'create' => [
                        'title'             => 'Створити агента',
                        'first-name'        => "Ім'я",
                        'last-name'         => 'Прізвище',
                        'email'             => 'Електронна пошта',
                        'current-password'  => 'Поточний пароль',
                        'password'          => 'Пароль',
                        'confirm-password'  => 'Підтвердити пароль',
                        'role'              => 'Роль',
                        'select'            => 'Вибрати',
                        'status'            => 'Статус',
                        'save-btn'          => 'Зберегти агента',
                        'back-btn'          => 'Назад',
                        'upload-image-info' => 'Завантажте зображення профілю (110px X 110px) у форматі PNG або JPG',
                    ],
            
                    'edit' => [
                        'title' => 'Редагувати агента',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Ідентифікатор',
                        'name'    => "Ім'я",
                        'email'   => 'Електронна пошта',
                        'role'    => 'Роль',
                        'status'  => 'Статус',
                        'active'  => 'Активний',
                        'disable' => 'Вимкнено',
                        'actions' => 'Дії',
                        'edit'    => 'Редагувати',
                        'delete'  => 'Видалити',
                    ],
                ],
            
                'create-success'             => 'Успіх: Супер адміністратор агента успішно створений',
                'delete-success'             => 'Агент видалений успішно',
                'delete-failed'              => 'Не вдалося видалити агента',
                'cannot-change'              => 'Не вдається змінити ім\'я агента :name',
                'product-copied'             => 'Агент успішно скопійований',
                'update-success'             => 'Агент успішно оновлений',
                'invalid-password'           => 'Ви ввели невірний поточний пароль',
                'last-delete-error'          => 'Попередження: Потрібен щонайменше один супер адміністратор агента',
                'login-delete-error'         => 'Попередження: Ви не можете видалити свій власний обліковий запис.',
                'administrator-delete-error' => 'Попередження: Потрібен щонайменше один супер адміністратор агента з доступом до адміністратора',
            ],
            
            'roles' => [
                'index' => [
                    'title'      => 'Список ролей',
                    'create-btn' => 'Створити роль',
            
                    'datagrid' => [
                        'id'              => 'Ідентифікатор',
                        'name'            => "Ім'я",
                        'permission-type' => 'Тип дозволу',
                        'actions'         => 'Дії',
                        'edit'            => 'Редагувати',
                        'delete'          => 'Видалити',
                    ],
                ],
            
                'create' => [
                    'access-control' => 'Контроль доступу',
                    'all'            => 'Усі',
                    'back-btn'       => 'Назад',
                    'custom'         => 'Користувальницькі',
                    'description'    => 'Опис',
                    'general'        => 'Загальні',
                    'name'           => "Ім'я",
                    'permissions'    => 'Дозволи',
                    'save-btn'       => 'Зберегти роль',
                    'title'          => 'Створити роль',
                ],
            
                'edit' => [
                    'access-control' => 'Контроль доступу',
                    'all'            => 'Усі',
                    'back-btn'       => 'Назад',
                    'custom'         => 'Користувальницькі',
                    'description'    => 'Опис',
                    'general'        => 'Загальні',
                    'name'           => "Ім'я",
                    'permissions'    => 'Дозволи',
                    'save-btn'       => 'Зберегти роль',
                    'title'          => 'Редагувати роль',
                ],
            
                'being-used'        => 'Роль вже використовується іншим агентом',
                'last-delete-error' => 'Останню роль неможливо видалити',
                'create-success'    => 'Роль успішно створена',
                'delete-success'    => 'Роль успішно видалена',
                'delete-failed'     => 'Не вдалося видалити роль',
                'update-success'    => 'Роль успішно оновлена',
            ],
            
            'locales' => [
                'index' => [
                    'title'      => 'Список локалей',
                    'create-btn' => 'Створити локаль',
            
                    'create' => [
                        'title'            => 'Створити локаль',
                        'code'             => 'Код',
                        'name'             => "Ім'я",
                        'direction'        => 'Напрям',
                        'select-direction' => 'Вибрати напрям',
                        'text-ltr'         => 'LTR',
                        'text-rtl'         => 'RTL',
                        'locale-logo'      => 'Логотип локалі',
                        'logo-size'        => 'Розмір зображення повинен бути 24px X 16px',
                        'save-btn'         => 'Зберегти локаль',
                    ],
            
                    'edit' => [
                        'title'     => 'Редагувати локаль',
                        'code'      => 'Код',
                        'name'      => "Ім'я",
                        'direction' => 'Напрям',
                    ],
            
                    'datagrid' => [
                        'id'        => 'Ідентифікатор',
                        'code'      => 'Код',
                        'name'      => "Ім'я",
                        'direction' => 'Напрям',
                        'text-ltr'  => 'LTR',
                        'text-rtl'  => 'RTL',
                        'actions'   => 'Дії',
                        'edit'      => 'Редагувати',
                        'delete'    => 'Видалити',
                    ],
                ],
                
                'being-used'        => 'Локаль :locale_name використовується як основна локаль в каналі',
                'create-success'    => 'Локаль успішно створена.',
                'update-success'    => 'Локаль успішно оновлена.',
                'delete-success'    => 'Локаль успішно видалена.',
                'delete-failed'     => 'Не вдалося видалити локаль',
                'last-delete-error' => 'Потрібна принаймні одна супер адміністраторська локаль.',
            ],

            'currencies' => [
                'index' => [
                    'title'      => 'Список валют',
                    'create-btn' => 'Створити валюту',
            
                    'create' => [
                        'title'    => 'Створити валюту',
                        'code'     => 'Код',
                        'name'     => 'Назва',
                        'symbol'   => 'Символ',
                        'decimal'  => 'Десяткові знаки',
                        'save-btn' => 'Зберегти валюту',
                    ],
            
                    'edit' => [
                        'title'    => 'Редагувати валюту',
                        'code'     => 'Код',
                        'name'     => 'Назва',
                        'symbol'   => 'Символ',
                        'decimal'  => 'Десяткові знаки',
                        'save-btn' => 'Зберегти валюту',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Ідентифікатор',
                        'code'    => 'Код',
                        'name'    => 'Назва',
                        'actions' => 'Дії',
                        'edit'    => 'Редагувати',
                        'delete'  => 'Видалити',
                    ],
                ],
            
                'create-success'      => 'Валюта успішно створена.',
                'update-success'      => 'Валюта успішно оновлена.',
                'delete-success'      => 'Валюта успішно видалена.',
                'delete-failed'       => 'Не вдалося видалити валюту.',
                'last-delete-error'   => 'Потрібна принаймні одна валюта для суперадміністратора.',
                'mass-delete-success' => 'Вибрані валюти успішно видалено.',
            ],
            
            'exchange-rates' => [
                'index' => [
                    'title'        => 'Курси обміну',
                    'create-btn'   => 'Створити курс обміну',
                    'update-rates' => 'Оновити курси',
            
                    'create' => [
                        'title'                  => 'Створити курс обміну',
                        'source-currency'        => 'Вихідна валюта',
                        'target-currency'        => 'Цільова валюта',
                        'select-target-currency' => 'Вибрати цільову валюту',
                        'rate'                   => 'Курс',
                        'save-btn'               => 'Зберегти курс обміну',
                    ],
            
                    'edit' => [
                        'title'           => 'Редагувати курс обміну',
                        'source-currency' => 'Вихідна валюта',
                        'target-currency' => 'Цільова валюта',
                        'rate'            => 'Курс',
                        'save-btn'        => 'Зберегти курс обміну',
                    ],
            
                    'datagrid' => [
                        'id'            => 'Ідентифікатор',
                        'currency-name' => 'Назва валюти',
                        'exchange-rate' => 'Курс обміну',
                        'actions'       => 'Дії',
                        'edit'          => 'Редагувати',
                        'delete'        => 'Видалити',
                    ],
                ],
            
                'create-success' => 'Курс обміну успішно створено.',
                'update-success' => 'Курс обміну успішно оновлено.',
                'delete-success' => 'Курс обміну успішно видалено.',
                'delete-failed'  => 'Не вдалося видалити курс обміну.',
            ],
            
            'channels' => [
                'index' => [
                    'title' => 'Канали',
            
                    'datagrid' => [
                        'id'       => 'Ідентифікатор',
                        'code'     => 'Код',
                        'name'     => 'Назва',
                        'hostname' => 'Ім\'я хосту',
                        'actions'  => 'Дії',
                        'edit'     => 'Редагувати',
                        'delete'   => 'Видалити',
                    ],
                ],
            
                'edit' => [
                    'title'                  => 'Редагувати канал',
                    'back-btn'               => 'Назад',
                    'save-btn'               => 'Зберегти канал',
                    'general'                => 'Загальне',
                    'code'                   => 'Код',
                    'name'                   => 'Назва',
                    'description'            => 'Опис',
                    'hostname'               => 'Ім\'я хосту',
                    'hostname-placeholder'   => 'https://www.example.com (Не додавайте слеш в кінці.)',
                    'design'                 => 'Дизайн',
                    'theme'                  => 'Тема',
                    'logo'                   => 'Логотип',
                    'logo-size'              => 'Розширення зображення повинно бути приблизно 192px X 50px',
                    'favicon'                => 'Фавікон',
                    'favicon-size'           => 'Розширення зображення повинно бути приблизно 16px X 16px',
                    'seo'                    => 'SEO домашньої сторінки',
                    'seo-title'              => 'Мета-заголовок',
                    'seo-description'        => 'Мета-опис',
                    'seo-keywords'           => 'Мета-ключові слова',
                    'currencies-and-locales' => 'Валюти та локалі',
                    'locales'                => 'Локалі',
                    'default-locale'         => 'Стандартна локаль',
                    'currencies'             => 'Валюти',
                    'default-currency'       => 'Стандартна валюта',
                    'last-delete-error'      => 'Потрібен принаймні один канал.',
                    'settings'               => 'Налаштування',
                    'status'                 => 'Статус',
                    'update-success'         => 'Канал успішно оновлено',
                ],
            
                'update-success' => 'Канал успішно оновлено.',
                'delete-success' => 'Канал успішно видалено.',
                'delete-failed'  => 'Не вдалося видалити канал.',
            ],

            'themes' => [
                'index' => [
                    'create-btn' => 'Створити Тему',
                    'title'      => 'Теми',
            
                    'datagrid' => [
                        'active'       => 'Активно',
                        'channel_name' => 'Назва Каналу',
                        'delete'       => 'Видалити',
                        'inactive'     => 'Неактивно',
                        'id'           => 'Ідентифікатор',
                        'name'         => 'Назва',
                        'status'       => 'Статус',
                        'sort-order'   => 'Порядок сортування',
                        'type'         => 'Тип',
                        'view'         => 'Перегляд',
                    ],
                ],
            
                'create' => [
                    'name'       => 'Назва',
                    'save-btn'   => 'Зберегти Тему',
                    'sort-order' => 'Порядок сортування',
                    'title'      => 'Створити Тему',
            
                    'type' => [
                        'footer-links'     => 'Посилання у підвалі',
                        'image-carousel'   => 'Карусель зображень',
                        'product-carousel' => 'Карусель товарів',
                        'static-content'   => 'Статичний контент',
                        'services-content' => 'Контент послуг',
                        'title'            => 'Тип',
                    ],
                ],
            
                'edit' => [
                    'add-image-btn'                 => 'Додати Зображення',
                    'add-filter-btn'                => 'Додати Фільтр',
                    'add-footer-link-btn'           => 'Додати Посилання у Підвалі',
                    'add-link'                      => 'Додати Посилання',
                    'asc'                           => 'У висхідному порядку',
                    'back'                          => 'Назад',
                    'category-carousel-description' => 'Відобразіть динамічні категорії привабливо за допомогою адаптивної каруселі категорій.',
                    'category-carousel'             => 'Карусель категорій',
                    'create-filter'                 => 'Створити Фільтр',
                    'css'                           => 'CSS',
                    'column'                        => 'Стовпець',
                    'channels'                      => 'Канали',
                    'desc'                          => 'У спадному порядку',
                    'delete'                        => 'Видалити',
                    'edit'                          => 'Редагувати',
                    'footer-title'                  => 'Заголовок',
                    'footer-link'                   => 'Посилання у Підвалі',
                    'footer-link-form-title'        => 'Посилання у Підвалі',
                    'filter-title'                  => 'Заголовок',
                    'filters'                       => 'Фільтри',
                    'footer-link-description'       => 'Переходьте за допомогою посилань у підвалі для безперервного дослідження веб-сайту та отримання інформації.',
                    'general'                       => 'Загальні',
                    'html'                          => 'HTML',
                    'image'                         => 'Зображення',
                    'image-size'                    => 'Розмір зображення повинен бути (1920px X 700px)',
                    'image-title'                   => 'Назва Зображення',
                    'image-upload-message'          => 'Дозволені лише зображення (.jpeg, .jpg, .png, .webp, ..).',
                    'key'                           => 'Ключ: :key',
                    'key-input'                     => 'Ключ',
                    'link'                          => 'Посилання',
                    'limit'                         => 'Ліміт',
                    'name'                          => 'Назва',
                    'product-carousel'              => 'Карусель товарів',
                    'product-carousel-description'  => 'Показ продуктів елегантно з динамічною та адаптивною каруселлю товарів.',
                    'path'                          => 'Шлях',
                    'preview'                       => 'Попередній перегляд',
                    'slider'                        => 'Слайдер',
                    'static-content-description'    => 'Покращіть взаємодію з лаконічним, інформативним статичним контентом для вашої аудиторії.',
                    'static-content'                => 'Статичний Контент',
                    'slider-description'            => 'Слайдер пов’язаний із налаштуванням теми.',
                    'slider-required'               => 'Поле Слайдер обов’язкове для заповнення.',
                    'slider-add-btn'                => 'Додати Слайдер',
                    'save-btn'                      => 'Зберегти',
                    'sort'                          => 'Сортування',
                    'sort-order'                    => 'Порядок сортування',
                    'status'                        => 'Статус',
                    'slider-image'                  => 'Зображення Слайдера',
                    'select'                        => 'Вибрати',
                    'title'                         => 'Редагувати Тему',
                    'update-slider'                 => 'Оновити Слайдер',
                    'url'                           => 'URL',
                    'value-input'                   => 'Значення',
                    'value'                         => 'Значення: :value',
            
                    'services-content' => [
                        'add-btn'            => 'Додати Послуги',
                        'channels'           => 'Канали',
                        'delete'             => 'Видалити',
                        'description'        => 'Опис',
                        'general'            => 'Загальні',
                        'name'               => 'Назва',
                        'save-btn'           => 'Зберегти',
                        'service-icon'       => 'Іконка Послуги',
                        'service-icon-class' => 'Клас Іконки Послуги',
                        'service-info'       => 'Пов’язані з темою налаштування послуг.',
                        'services'           => 'Послуги',
                        'sort-order'         => 'Порядок сортування',
                        'status'             => 'Статус',
                        'title'              => 'Назва',
                        'update-service'     => 'Оновити Послуги',
                    ],
                ],
            
                'create-success' => 'Тема успішно створена',
                'delete-success' => 'Тема успішно видалена',
                'update-success' => 'Тема успішно оновлена',
                'delete-failed'  => 'Під час видалення вмісту теми сталася помилка.',
            ],
            
            'email' => [
                'create' => [
                    'send-btn'                  => 'Надіслати Email',
                    'back-btn'                  => 'Назад',
                    'title'                     => 'Надіслати Email',
                    'general'                   => 'Загальні',
                    'body'                      => 'Тіло',
                    'subject'                   => 'Тема',
                    'dear'                      => 'Шановний(а) :agent_name',
                    'agent-registration'        => 'Saas Агент успішно зареєстрований',
                    'summary'                   => 'Ваш обліковий запис був створений. Деталі вашого облікового запису наведено нижче: ',
                    'saas-url'                  => 'Домен',
                    'email'                     => 'Email',
                    'password'                  => 'Пароль',
                    'sign-in'                   => 'Увійти',
                    'thanks'                    => 'Дякуємо!',
                    'send-email-to-all-tenants' => 'Надіслати email всім орендарям',
                ],
            
                'send-success' => 'Email успішно відправлено.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'Список сторінок CMS',
                'create-btn' => 'Створити сторінку',
        
                'datagrid' => [
                    'id'                  => 'Ідентифікатор',
                    'page-title'          => 'Заголовок сторінки',
                    'url-key'             => 'URL-ключ',
                    'status'              => 'Статус',
                    'active'              => 'Активний',
                    'disable'             => 'Відключити',
                    'edit'                => 'Редагувати сторінку',
                    'delete'              => 'Видалити сторінку',
                    'mass-delete'         => 'Масове видалення',
                    'mass-delete-success' => 'Вибрані сторінки CMS успішно видалено',
                ],
            ],
        
            'create' => [
                'title'            => 'Створити сторінку CMS',
                'first-name'       => "Ім'я",
                'general'          => 'Загальні',
                'page-title'       => 'Заголовок',
                'channels'         => 'Канали',
                'content'          => 'Контент',
                'meta-keywords'    => 'Мета-ключові слова',
                'meta-description' => 'Мета-опис',
                'meta-title'       => 'Мета-заголовок',
                'seo'              => 'SEO',
                'url-key'          => 'URL-ключ',
                'description'      => 'Опис',
                'save-btn'         => 'Зберегти сторінку CMS',
                'back-btn'         => 'Назад',
            ],
        
            'edit' => [
                'title'            => 'Редагувати сторінку',
                'preview-btn'      => 'Попередній перегляд сторінки',
                'save-btn'         => 'Зберегти сторінку',
                'general'          => 'Загальні',
                'page-title'       => 'Заголовок сторінки',
                'back-btn'         => 'Назад',
                'channels'         => 'Канали',
                'content'          => 'Контент',
                'seo'              => 'SEO',
                'meta-keywords'    => 'Мета-ключові слова',
                'meta-description' => 'Мета-опис',
                'meta-title'       => 'Мета-заголовок',
                'url-key'          => 'URL-ключ',
                'description'      => 'Опис',
            ],
        
            'create-success' => 'CMS успішно створено.',
            'delete-success' => 'CMS успішно видалено.',
            'update-success' => 'CMS успішно оновлено.',
            'no-resource'    => 'Ресурс не існує.',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => 'Видалити',
                'enable-at-least-one-shipping' => 'Включіть хоча б один метод доставки.',
                'enable-at-least-one-payment'  => 'Включіть хоча б один метод оплати.',
                'save-btn'                     => 'Зберегти конфігурацію',
                'save-message'                 => 'Конфігурацію успішно збережено',
                'title'                        => 'Конфігурація',
        
                'general' => [
                    'info'  => 'Керуйте макетом та деталями електронної пошти',
                    'title' => 'Загальні',
        
                    'design' => [
                        'info'  => 'Встановіть логотип та значок favicon.',
                        'title' => 'Дизайн',
        
                        'super' => [
                            'info'          => 'Логотип супер адміністратора - це характерне зображення або емблема, що представляє інтерфейс адміністрування системи або веб-сайту, часто настроюваний.',
                            'admin-logo'    => 'Логотип адміністратора',
                            'logo-image'    => 'Зображення логотипу',
                            'favicon-image' => 'Зображення favicon',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => 'Встановіть електронну адресу для супер адміністратора.',
                        'title' => 'Супер агент',
        
                        'super' => [
                            'info'          => 'Встановіть електронну адресу для супер адміністратора для отримання повідомлень електронної пошти',
                            'email-address' => 'Електронна адреса',
                        ],

                        'social-connect' => [
                            'title'    => 'Соціальна мережа',
                            'info'     => 'Соціальні медіаплатформи надають можливість прямої взаємодії з вашою аудиторією через коментарі, лайки та поширення, сприяючи залученню та формуванню спільноти навколо вашого бренду.',
                            'facebook' => 'Facebook',
                            'twitter'  => 'Twitter',
                            'linkedin' => 'Linkedin',
                        ],
                    ],
        
                    'content' => [
                        'info'   => 'Встановіть інформацію про заголовок та підвал для макету реєстрації орендаря.',
                        'title'  => 'Контент',
        
                        'footer' => [
                            'info'           => 'Встановіть вміст підвалу',
                            'title'          => 'Підвал',
                            'footer-content' => 'Текст підвалу',
                            'footer-toggle'  => 'Перемикач підвалу',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => 'Керуйте продажами, методами доставки та оплати',
                    'title' => 'Продажі',
        
                    'shipping-methods' => [
                        'info'  => 'Встановіть інформацію про методи доставки',
                        'title' => 'Методи доставки',
                    ],
        
                    'payment-methods' => [
                        'info'  => 'Встановіть інформацію про методи оплати',
                        'title' => 'Методи оплати',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => 'Включіть хоча б один метод доставки.',
            'enable-at-least-one-payment'  => 'Включіть хоча б один метод оплати.',
            'save-message'                 => 'Успіх: Конфігурацію супер адміністратора успішно збережено.',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'Зареєструватися як орендар',
            ],
    
            'footer' => [
                'footer-text'     => '© Авторське право 2010 - 2023, Webkul Software (зареєстровано в Індії). Усі права захищені.',
                'connect-with-us' => 'Зв’яжіться з нами',
                'text-locale'     => 'Мова',
                'text-currency'   => 'Валюта',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => 'Реєстрація торговця',
            'step-1'              => 'Крок 1',
            'auth-cred'           => 'Аутентифікаційні дані',
            'email'               => 'Електронна пошта',
            'phone'               => 'Телефон',
            'username'            => 'Ім’я користувача',
            'password'            => 'Пароль',
            'cpassword'           => 'Підтвердити пароль',
            'continue'            => 'Продовжити',
            'step-2'              => 'Крок 2',
            'personal'            => 'Особисті дані',
            'first-name'          => 'Ім’я',
            'last-name'           => 'Прізвище',
            'step-3'              => 'Крок 3',
            'org-details'         => 'Деталі організації',
            'org-name'            => 'Назва організації',
            'company-activated'   => 'Успіх: Компанія успішно активована.',
            'company-deactivated' => 'Успіх: Компанія успішно деактивована.',
            'company-updated'     => 'Успіх: Компанія успішно оновлена.',
            'something-wrong'     => 'Попередження: Виникла помилка.',
            'store-created'       => 'Успіх: Магазин успішно створено.',
            'something-wrong-1'   => 'Попередження: Виникла помилка, спробуйте ще раз пізніше.',
            'content'             => 'Станьте торговцем і створіть свій власний магазин без проблем і непокоєнь з встановленням та керуванням сервером. Вам потрібно лише зареєструватися, завантажити дані товарів і отримати свій електронний комерційний магазин. Модуль багатокомпанійного SaaS Laravel пропонує прості можливості налаштування, що означає, що торговець легко може додавати будь-які додаткові функції та можливості до свого магазину або легко його покращувати.',
    
            'right-panel' => [
                'heading'    => 'Як налаштувати обліковий запис торговця',
                'para'       => 'Це легко налаштувати модуль за допомогою всього кількох кроків',
                'step-one'   => 'Введіть аутентифікаційні дані, такі як електронна пошта, пароль і підтвердіть пароль',
                'step-two'   => 'Введіть особисті дані, такі як ім’я, прізвище та номер телефону.',
                'step-three' => 'Введіть деталі організації, такі як ім’я користувача, назва організації',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => 'Попередження: Створення більше одного каналу не дозволено',
            'channel-hostname'                  => 'Попередження: Зверніться до адміністратора, щоб змінити свій хостнейм',
            'same-domain'                       => 'Попередження: Неможливо залишити той самий піддомен, що і головний домен',
            'block-message'                     => 'Попередження: Якщо ви хочете розблокувати цього орендаря, не соромтеся зв’язатися з нами, ми доступні 24/7, щоб вирішити вашу проблему.',
            'blocked'                           => 'був заблокований',
            'illegal-action'                    => 'Попередження: Ви виконали незаконну дію',
            'domain-message'                    => 'Попередження: Упс! Ми не могли допомогти на <b>:domain</b>',
            'domain-desc'                       => 'Якщо ви бажаєте створити обліковий запис з <b>:domain</b>
            як організацію, не соромтеся створювати обліковий запис і починайте працювати.',
            'illegal-message'                   => 'Попередження: Дію, яку ви виконали, вимкнено адміністратором сайту, будь ласка, надішліть листа своєму адміністратору сайту для отримання більш докладної інформації про це.',
            'locale-creation'                   => 'Попередження: Створення локалі не англійською мовою не дозволено.',
            'locale-delete'                     => 'Попередження: Неможливо видалити локаль.',
            'cannot-delete-default'             => 'Попередження: Неможливо видалити типовий канал.',
            'tenant-blocked'                    => 'Орендар заблокований',
            'domain-not-found'                  => 'Попередження: Домен не знайдено.',
            'company-blocked-by-administrator'  => 'Цього орендаря заблоковано',
            'not-allowed-to-visit-this-section' => 'Попередження: Вам заборонено використовувати цей розділ.',
            'auth'                              => 'Попередження: Помилка аутентифікації!',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'Нова компанія зареєстрована',
                'first-name' => 'Ім’я',
                'last-name'  => 'Прізвище',
                'email'      => 'Електронна пошта',
                'name'       => 'Назва',
                'username'   => 'Ім’я користувача',
                'domain'     => 'Домен',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => 'Нова компанія успішно зареєстрована',
                'dear'       => 'Шановний(а) :tenant_name',
                'greeting'   => 'Ласкаво просимо і дякуємо за реєстрацію!',
                'summary'    => 'Ваш обліковий запис було успішно створено і ви можете увійти, використовуючи вашу електронну адресу та пароль. Після входу ви зможете отримати доступ до інших послуг, включаючи товари, продажі, клієнтів, відгуки та промоції.',
                'thanks'     => 'Дякуємо!',
                'visit-shop' => 'Відвідати магазин',
            ],
        ],
    ],
    
    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'Редагувати деталі компанії',
            'first-name'     => 'Ім’я',
            'last-name'      => 'Прізвище',
            'email'          => 'Електронна пошта',
            'skype'          => 'Skype',
            'cname'          => 'cName',
            'phone'          => 'Телефон',
            'general'        => 'Загальне',
            'back-btn'       => 'Назад',
            'save-btn'       => 'Зберегти деталі',
            'update-success' => 'Успіх: :resource успішно оновлено.',
            'update-failed'  => 'Попередження: Неможливо оновити :resource з невідомих причин.',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => 'Список адрес компанії',
                'create-btn' => 'Додати адресу',
    
                'datagrid' => [
                    'id'          => 'Ідентифікатор',
                    'address1'    => 'Адреса 1',
                    'address2'    => 'Адреса 2',
                    'city'        => 'Місто',
                    'country'     => 'Країна',
                    'edit'        => 'Редагувати',
                    'delete'      => 'Видалити',
                    'mass-delete' => 'Масове видалення',
                ],
            ],
    
            'create' => [
                'title'     => 'Створити адресу компанії',
                'general'   => 'Загальне',
                'address1'  => 'Адреса1',
                'address2'  => 'Адреса2',
                'country'   => 'Країна',
                'state'     => 'Область',
                'city'      => 'Місто',
                'post-code' => 'Поштовий індекс',
                'phone'     => 'Телефон',
                'back-btn'  => 'Назад',
                'save-btn'  => 'Зберегти адресу',
            ],
    
            'edit' => [
                'title'     => 'Редагувати адресу компанії',
                'general'   => 'Загальне',
                'address1'  => 'Адреса1',
                'address2'  => 'Адреса2',
                'country'   => 'Країна',
                'state'     => 'Область',
                'city'      => 'Місто',
                'post-code' => 'Поштовий індекс',
                'phone'     => 'Телефон',
                'back-btn'  => 'Назад',
                'save-btn'  => 'Зберегти адресу',
            ],
    
            'create-success'      => 'Успіх: Адреса компанії успішно створена.',
            'update-success'      => 'Успіх: Адреса компанії успішно оновлена.',
            'delete-success'      => 'Успіх: :resource успішно видалено.',
            'delete-failed'       => 'Попередження: Неможливо видалити :resource з невідомих причин.',
            'mass-delete-success' => 'Успіх: Вибрані адреси успішно видалені.',
        ],
    
        'system' => [
            'social-login'           => 'Соціальний вхід',
            'facebook'               => 'Налаштування Facebook',
            'facebook-client-id'     => 'Ідентифікатор клієнта Facebook',
            'facebook-client-secret' => 'Секрет клієнта Facebook',
            'facebook-callback-url'  => 'URL зворотного виклику Facebook',
            'twitter'                => 'Налаштування Twitter',
            'twitter-client-id'      => 'Ідентифікатор клієнта Twitter',
            'twitter-client-secret'  => 'Секрет клієнта Twitter',
            'twitter-callback-url'   => 'URL зворотного виклику Twitter',
            'google'                 => 'Налаштування Google',
            'google-client-id'       => 'Ідентифікатор клієнта Google',
            'google-client-secret'   => 'Секрет клієнта Google',
            'google-callback-url'    => 'URL зворотного виклику Google',
            'linkedin'               => 'Налаштування LinkedIn',
            'linkedin-client-id'     => 'Ідентифікатор клієнта LinkedIn',
            'linkedin-client-secret' => 'Секрет клієнта LinkedIn',
            'linkedin-callback-url'  => 'URL зворотного виклику LinkedIn',
            'github'                 => 'Налаштування GitHub',
            'github-client-id'       => 'Ідентифікатор клієнта GitHub',
            'github-client-secret'   => 'Секрет клієнта GitHub',
            'github-callback-url'    => 'URL зворотного виклику GitHub',
            'email-credentials'      => 'Облікові дані електронної пошти',
            'mail-driver'            => 'Драйвер пошти',
            'mail-host'              => 'Хост пошти',
            'mail-port'              => 'Порт пошти',
            'mail-username'          => 'Ім’я користувача пошти',
            'mail-password'          => 'Пароль пошти',
            'mail-encryption'        => 'Шифрування пошти',
        ],
    
        'tenant' => [
            'id'              => 'Ідентифікатор',
            'first-name'      => 'Ім’я',
            'last-name'       => 'Прізвище',
            'email'           => 'Електронна пошта',
            'skype'           => 'Skype',
            'c-name'          => 'CName',
            'add-address'     => 'Додати адресу',
            'country'         => 'Країна',
            'city'            => 'Місто',
            'address1'        => 'Адреса 1',
            'address2'        => 'Адреса 2',
            'address'         => 'Список адрес',
            'company'         => 'Орендар',
            'profile'         => 'Профіль',
            'update'          => 'Оновити',
            'address-details' => 'Деталі адреси',
            'create-failed'   => 'Попередження: Неможливо створити :attribute з невідомих причин.',
            'update-success'  => 'Успіх: :resource успішно оновлено.',
            'update-failed'   => 'Попередження: Неможливо оновити :resource з невідомих причин.',
    
            'company-address' => [
                'add-address-title'    => 'Нова адреса',
                'update-address-title' => 'Оновити адресу',
                'save-btn-title'       => 'Зберегти адресу',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'Замовлення :order_id було зроблено :placed_by :created_at.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'Ой! Сторінку, яку ви шукаєте, відпочиває. Здається, ми не змогли знайти те, що ви шукали.',
            'title'       => '404 Сторінку не знайдено',
        ],

        '401' => [
            'description' => 'Ой! Здається, у вас немає доступу до цієї сторінки. Здається, вам не вистачає необхідних облікових даних.',
            'title'       => '401 Неавторизовано',
        ],

        '403' => [
            'description' => 'Ой! Ця сторінка заборонена. Здається, у вас немає необхідних дозволів для перегляду цього вмісту.',
            'title'       => '403 Заборонено',
        ],

        '500' => [
            'description' => 'Ой! Виникла помилка. Здається, у нас виникли проблеми з завантаженням сторінки, яку ви шукаєте.',
            'title'       => '500 Внутрішня помилка сервера',
        ],

        '503' => [
            'description' => 'Ой! Здається, ми тимчасово припинили роботу для технічного обслуговування. Будь ласка, поверніться через деякий час.',
            'title'       => '503 Сервіс недоступний',
        ],
    ],
];
