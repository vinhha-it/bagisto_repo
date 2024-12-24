<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'Версия: :version',
                'account-title' => 'Аккаунт',
                'logout'        => 'Выйти',
                'my-account'    => 'Мой аккаунт',
                'visit-shop'    => 'Посетить магазин',
            ],
    
            'sidebar' => [
                'tenants'          => 'Арендаторы',
                'tenant-customers' => 'Клиенты',
                'tenant-products'  => 'Продукты',
                'tenant-orders'    => 'Заказы',
                'settings'         => 'Настройки',
                'agents'           => 'Агенты',
                'roles'            => 'Роли',
                'locales'          => 'Локали',
                'currencies'       => 'Валюты',
                'channels'         => 'Каналы',
                'exchange-rates'   => 'Курсы обмена',
                'themes'           => 'Темы',
                'cms'              => 'CMS',
                'configurations'   => 'Конфигурации',
                'general'          => 'Общее',
                'send-email'       => 'Отправить email',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'Арендаторы',
            'create'         => 'Добавить',
            'edit'           => 'Редактировать',
            'delete'         => 'Удалить',
            'cancel'         => 'Отмена',
            'view'           => 'Просмотр',
            'mass-delete'    => 'Массовое удаление',
            'mass-update'    => 'Массовое обновление',
            'customers'      => 'Клиенты',
            'products'       => 'Продукты',
            'orders'         => 'Заказы',
            'settings'       => 'Настройки',
            'agents'         => 'Агенты',
            'roles'          => 'Роли',
            'locales'        => 'Локали',
            'currencies'     => 'Валюты',
            'exchange-rates' => 'Курсы обмена',
            'channels'       => 'Каналы',
            'themes'         => 'Темы',
            'send-email'     => 'Отправить письмо',
            'cms'            => 'CMS',
            'configuration'  => 'Конфигурация',
            'download'       => 'Скачать',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => 'Вход для суперадминистратора',
                'email'                => 'Адрес электронной почты',
                'password'             => 'Пароль',
                'btn-submit'           => 'Войти',
                'forget-password-link' => 'Забыли пароль?',
                'submit-btn'           => 'Войти',
                'login-success'        => 'Успех: Вы успешно вошли.',
                'login-error'          => 'Проверьте свои учетные данные и повторите попытку.',
                'activate-warning'     => 'Ваша учетная запись еще не активирована, пожалуйста, свяжитесь с администратором.',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'Забыли пароль',
                    'title'           => 'Восстановление пароля',
                    'email'           => 'Зарегистрированный адрес электронной почты',
                    'reset-link-sent' => 'Ссылка для сброса пароля отправлена',
                    'sign-in-link'    => 'Вернуться к входу?',
                    'email-not-exist' => 'Электронная почта не существует',
                    'submit-btn'      => 'Сбросить',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'Сброс пароля',
                'back-link-title'  => 'Вернуться к входу?',
                'confirm-password' => 'Подтвердите пароль',
                'email'            => 'Зарегистрированный адрес электронной почты',
                'password'         => 'Пароль',
                'submit-btn'       => 'Сбросить пароль',
            ],
        ],

        'tenants' => [
            'index' => [
                'title'        => 'Список Арендаторов',
                'register-btn' => 'Зарегистрировать арендатора',
        
                'create' => [
                    'title'             => 'Создать Арендатора',
                    'first-name'        => 'Имя',
                    'last-name'         => 'Фамилия',
                    'user-name'         => 'Имя пользователя',
                    'organization-name' => 'Название организации',
                    'phone'             => 'Телефон',
                    'email'             => 'Электронная почта',
                    'password'          => 'Пароль',
                    'confirm-password'  => 'Подтвердить пароль',
                    'save-btn'          => 'Сохранить Арендатора',
                    'back-btn'          => 'Назад',
                ],
        
                'datagrid' => [
                    'id'                  => 'Идентификатор',
                    'user-name'           => 'Имя пользователя',
                    'organization'        => 'Организация',
                    'domain'              => 'Домен',
                    'cname'               => 'Имя',
                    'status'              => 'Статус',
                    'active'              => 'Активный',
                    'disable'             => 'Отключить',
                    'view'                => 'Просмотреть Инсайты',
                    'edit'                => 'Изменить Арендатора',
                    'delete'              => 'Удалить Арендатора',
                    'mass-delete'         => 'Массовое удаление',
                    'mass-delete-success' => 'Выбранный арендатор успешно удален',
                ],
            ],
        
            'edit' => [
                'title'             => 'Изменить Арендатора',
                'first-name'        => 'Имя',
                'last-name'         => 'Фамилия',
                'user-name'         => 'Имя пользователя',
                'cname'             => 'Имя',
                'organization-name' => 'Название организации',
                'phone'             => 'Телефон',
                'status'            => 'Статус',
                'email'             => 'Электронная почта',
                'password'          => 'Пароль',
                'confirm-password'  => 'Подтвердить пароль',
                'save-btn'          => 'Сохранить Арендатора',
                'back-btn'          => 'Назад',
                'general'           => 'Общие',
                'settings'          => 'Настройки',
            ],
        
            'view' => [
                'title'                        => 'Инсайты Арендатора',
                'heading'                      => 'Арендатор - :tenant_name',
                'email-address'                => 'Адрес электронной почты',
                'phone'                        => 'Телефон',
                'domain-information'           => 'Информация о домене',
                'mapped-domain'                => 'Сопоставленный домен',
                'cname-information'            => 'Информация о Имя',
                'cname-entry'                  => 'Запись Имя',
                'attribute-information'        => 'Информация об атрибутах',
                'no-of-attributes'             => 'Количество атрибутов',
                'attribute-family-information' => 'Информация о семье атрибутов',
                'no-of-attribute-families'     => 'Количество семей атрибутов',
                'product-information'          => 'Информация о продуктах',
                'no-of-products'               => 'Количество продуктов',
                'customer-information'         => 'Информация о клиентах',
                'no-of-customers'              => 'Количество клиентов',
                'customer-group-information'   => 'Информация о группах клиентов',
                'no-of-customer-groups'        => 'Количество групп клиентов',
                'category-information'         => 'Информация о категориях',
                'no-of-categories'             => 'Количество категорий',
                'addresses'                    => 'Список адресов (:count)',
                'empty-title'                  => 'Добавить адрес арендатора',
            ],
        
            'create-success' => 'Арендатор успешно создан',
            'delete-success' => 'Арендатор успешно удален',
            'delete-failed'  => 'Не удалось удалить арендатора',
            'product-copied' => 'Арендатор успешно скопирован',
            'update-success' => 'Арендатор успешно обновлен',
        
            'customers' => [
                'index' => [
                    'title' => 'Список клиентов',
        
                    'datagrid' => [
                        'id'             => 'Идентификатор',
                        'domain'         => 'Домен',
                        'customer-name'  => 'Имя клиента',
                        'email'          => 'Электронная почта',
                        'customer-group' => 'Группа клиентов',
                        'phone'          => 'Телефон',
                        'status'         => 'Статус',
                        'active'         => 'Активный',
                        'inactive'       => 'Неактивный',
                        'is-suspended'   => 'Приостановленный',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => 'Список продуктов',
        
                    'datagrid' => [
                        'id'               => 'Идентификатор',
                        'domain'           => 'Домен',
                        'name'             => 'Название',
                        'sku'              => 'Артикул',
                        'attribute-family' => 'Семья атрибутов',
                        'image'            => 'Изображение',
                        'price'            => 'Цена',
                        'qty'              => 'Количество',
                        'status'           => 'Статус',
                        'active'           => 'Активный',
                        'inactive'         => 'Неактивный',
                        'category'         => 'Категория',
                        'type'             => 'Тип',
                    ],
                ],
            ],
        
            'orders' => [
                'index' => [
                    'title' => 'Список заказов',
        
                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => 'Идентификатор заказа',
                        'domain'          => 'Домен',
                        'sub-total'       => 'Промежуточный итог',
                        'grand-total'     => 'Общая сумма',
                        'order-date'      => 'Дата заказа',
                        'channel-name'    => 'Название канала',
                        'status'          => 'Статус',
                        'processing'      => 'Обработка',
                        'completed'       => 'Завершен',
                        'canceled'        => 'Отменен',
                        'closed'          => 'Закрыт',
                        'pending'         => 'В ожидании',
                        'pending-payment' => 'Ожидает оплаты',
                        'fraud'           => 'Мошенничество',
                        'customer'        => 'Клиент',
                        'email'           => 'Электронная почта',
                        'location'        => 'Местоположение',
                        'images'          => 'Изображения',
                        'pay-by'          => 'Оплата через - ',
                        'pay-via'         => 'Оплата через',
                        'date'            => 'Дата',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'Список агентов',
                    'register-btn' => 'Создать агента',
            
                    'create' => [
                        'title'             => 'Создать агента',
                        'first-name'        => 'Имя',
                        'last-name'         => 'Фамилия',
                        'email'             => 'Электронная почта',
                        'current-password'  => 'Текущий пароль',
                        'password'          => 'Пароль',
                        'confirm-password'  => 'Подтвердить пароль',
                        'role'              => 'Роль',
                        'select'            => 'Выбрать',
                        'status'            => 'Статус',
                        'save-btn'          => 'Сохранить агента',
                        'back-btn'          => 'Назад',
                        'upload-image-info' => 'Загрузите изображение профиля (110px X 110px) в формате PNG или JPG',
                    ],
            
                    'edit' => [
                        'title' => 'Редактировать агента',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Идентификатор',
                        'name'    => 'Имя',
                        'email'   => 'Электронная почта',
                        'role'    => 'Роль',
                        'status'  => 'Статус',
                        'active'  => 'Активный',
                        'disable' => 'Отключить',
                        'actions' => 'Действия',
                        'edit'    => 'Редактировать',
                        'delete'  => 'Удалить',
                    ],
                ],
            
                'create-success'             => 'Успех: Администратор агента успешно создан',
                'delete-success'             => 'Агент успешно удален',
                'delete-failed'              => 'Не удалось удалить агента',
                'cannot-change'              => 'Имя агента :name нельзя изменить',
                'product-copied'             => 'Агент успешно скопирован',
                'update-success'             => 'Агент успешно обновлен',
                'invalid-password'           => 'Введен неверный текущий пароль',
                'last-delete-error'          => 'Предупреждение: Требуется хотя бы один супер администратор агента',
                'login-delete-error'         => 'Предупреждение: Вы не можете удалить свою учетную запись.',
                'administrator-delete-error' => 'Предупреждение: Требуется хотя бы один супер администратор агента с доступом к администратору',
            ],
            
            'roles' => [
                'index' => [
                    'title'      => 'Список ролей',
                    'create-btn' => 'Создать роль',
            
                    'datagrid' => [
                        'id'              => 'Идентификатор',
                        'name'            => 'Имя',
                        'permission-type' => 'Тип разрешения',
                        'actions'         => 'Действия',
                        'edit'            => 'Редактировать',
                        'delete'          => 'Удалить',
                    ],
                ],
            
                'create' => [
                    'access-control' => 'Контроль доступа',
                    'all'            => 'Все',
                    'back-btn'       => 'Назад',
                    'custom'         => 'Настроить',
                    'description'    => 'Описание',
                    'general'        => 'Общее',
                    'name'           => 'Имя',
                    'permissions'    => 'Разрешения',
                    'save-btn'       => 'Сохранить роль',
                    'title'          => 'Создать роль',
                ],
            
                'edit' => [
                    'access-control' => 'Контроль доступа',
                    'all'            => 'Все',
                    'back-btn'       => 'Назад',
                    'custom'         => 'Настроить',
                    'description'    => 'Описание',
                    'general'        => 'Общее',
                    'name'           => 'Имя',
                    'permissions'    => 'Разрешения',
                    'save-btn'       => 'Сохранить роль',
                    'title'          => 'Редактировать роль',
                ],
            
                'being-used'        => 'Роль уже используется другим агентом',
                'last-delete-error' => 'Последнюю роль нельзя удалить',
                'create-success'    => 'Роль успешно создана',
                'delete-success'    => 'Роль успешно удалена',
                'delete-failed'     => 'Не удалось удалить роль',
                'update-success'    => 'Роль успешно обновлена',
            ],
            
            'locales' => [
                'index' => [
                    'title'      => 'Список локалей',
                    'create-btn' => 'Создать локаль',
            
                    'create' => [
                        'title'            => 'Создать локаль',
                        'code'             => 'Код',
                        'name'             => 'Название',
                        'direction'        => 'Направление',
                        'select-direction' => 'Выбрать направление',
                        'text-ltr'         => 'LTR (слева направо)',
                        'text-rtl'         => 'RTL (справа налево)',
                        'locale-logo'      => 'Логотип локали',
                        'logo-size'        => 'Разрешение изображения должно быть 24px X 16px',
                        'save-btn'         => 'Сохранить локаль',
                    ],
            
                    'edit' => [
                        'title'     => 'Редактировать локаль',
                        'code'      => 'Код',
                        'name'      => 'Название',
                        'direction' => 'Направление',
                    ],
            
                    'datagrid' => [
                        'id'        => 'Идентификатор',
                        'code'      => 'Код',
                        'name'      => 'Название',
                        'direction' => 'Направление',
                        'text-ltr'  => 'LTR (слева направо)',
                        'text-rtl'  => 'RTL (справа налево)',
                        'actions'   => 'Действия',
                        'edit'      => 'Редактировать',
                        'delete'    => 'Удалить',
                    ],
                ],
            
                'being-used'        => 'Локаль :locale_name используется в качестве локали по умолчанию в канале',
                'create-success'    => 'Локаль успешно создана.',
                'update-success'    => 'Локаль успешно обновлена.',
                'delete-success'    => 'Локаль успешно удалена.',
                'delete-failed'     => 'Не удалось удалить локаль',
                'last-delete-error' => 'Требуется хотя бы одна супер администраторская локаль.',
            ],

            'currencies' => [
                'index' => [
                    'title'      => 'Список валют',
                    'create-btn' => 'Создать валюту',
            
                    'create' => [
                        'title'    => 'Создать валюту',
                        'code'     => 'Код',
                        'name'     => 'Название',
                        'symbol'   => 'Символ',
                        'decimal'  => 'Десятичные знаки',
                        'save-btn' => 'Сохранить валюту',
                    ],
            
                    'edit' => [
                        'title'    => 'Редактировать валюту',
                        'code'     => 'Код',
                        'name'     => 'Название',
                        'symbol'   => 'Символ',
                        'decimal'  => 'Десятичные знаки',
                        'save-btn' => 'Сохранить валюту',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Идентификатор',
                        'code'    => 'Код',
                        'name'    => 'Название',
                        'actions' => 'Действия',
                        'edit'    => 'Редактировать',
                        'delete'  => 'Удалить',
                    ],
                ],
            
                'create-success'      => 'Валюта успешно создана.',
                'update-success'      => 'Валюта успешно обновлена.',
                'delete-success'      => 'Валюта успешно удалена.',
                'delete-failed'       => 'Ошибка при удалении валюты',
                'last-delete-error'   => 'Требуется хотя бы одна валюта для суперадминистратора.',
                'mass-delete-success' => 'Выбранные валюты успешно удалены',
            ],
            
            'exchange-rates' => [
                'index' => [
                    'title'        => 'Курсы обмена',
                    'create-btn'   => 'Создать курс обмена',
                    'update-rates' => 'Обновить курсы',
            
                    'create' => [
                        'title'                  => 'Создать курс обмена',
                        'source-currency'        => 'Исходная валюта',
                        'target-currency'        => 'Целевая валюта',
                        'select-target-currency' => 'Выберите целевую валюту',
                        'rate'                   => 'Курс',
                        'save-btn'               => 'Сохранить курс обмена',
                    ],
            
                    'edit' => [
                        'title'           => 'Редактировать курс обмена',
                        'source-currency' => 'Исходная валюта',
                        'target-currency' => 'Целевая валюта',
                        'rate'            => 'Курс',
                        'save-btn'        => 'Сохранить курс обмена',
                    ],
            
                    'datagrid' => [
                        'id'            => 'Идентификатор',
                        'currency-name' => 'Название валюты',
                        'exchange-rate' => 'Курс обмена',
                        'actions'       => 'Действия',
                        'edit'          => 'Редактировать',
                        'delete'        => 'Удалить',
                    ],
                ],
            
                'create-success' => 'Курс обмена успешно создан.',
                'update-success' => 'Курс обмена успешно обновлен.',
                'delete-success' => 'Курс обмена успешно удален.',
                'delete-failed'  => 'Ошибка при удалении курса обмена',
            ],
            
            'channels' => [
                'index' => [
                    'title' => 'Каналы',
            
                    'datagrid' => [
                        'id'       => 'Идентификатор',
                        'code'     => 'Код',
                        'name'     => 'Название',
                        'hostname' => 'Имя хоста',
                        'actions'  => 'Действия',
                        'edit'     => 'Редактировать',
                        'delete'   => 'Удалить',
                    ],
                ],
            
                'edit' => [
                    'title'                  => 'Редактировать канал',
                    'back-btn'               => 'Назад',
                    'save-btn'               => 'Сохранить канал',
                    'general'                => 'Общие',
                    'code'                   => 'Код',
                    'name'                   => 'Название',
                    'description'            => 'Описание',
                    'hostname'               => 'Имя хоста',
                    'hostname-placeholder'   => 'https://www.example.com (Не добавляйте слеш в конце.)',
                    'design'                 => 'Дизайн',
                    'theme'                  => 'Тема',
                    'logo'                   => 'Логотип',
                    'logo-size'              => 'Разрешение изображения должно быть 192px X 50px',
                    'favicon'                => 'Фавикон',
                    'favicon-size'           => 'Разрешение изображения должно быть 16px X 16px',
                    'seo'                    => 'SEO главной страницы',
                    'seo-title'              => 'Мета заголовок',
                    'seo-description'        => 'Мета описание',
                    'seo-keywords'           => 'Мета ключевые слова',
                    'currencies-and-locales' => 'Валюты и локали',
                    'locales'                => 'Локали',
                    'default-locale'         => 'Локаль по умолчанию',
                    'currencies'             => 'Валюты',
                    'default-currency'       => 'Валюта по умолчанию',
                    'last-delete-error'      => 'Требуется как минимум один канал.',
                    'settings'               => 'Настройки',
                    'status'                 => 'Статус',
                    'update-success'         => 'Канал успешно обновлен',
                ],
                
                'update-success' => 'Канал успешно обновлен.',
                'delete-success' => 'Канал успешно удален.',
                'delete-failed'  => 'Ошибка удаления канала',
            ],

            'themes' => [
                'index' => [
                    'create-btn' => 'Создать тему',
                    'title'      => 'Темы',
            
                    'datagrid' => [
                        'active'       => 'Активный',
                        'channel_name' => 'Название канала',
                        'delete'       => 'Удалить',
                        'inactive'     => 'Неактивный',
                        'id'           => 'ID',
                        'name'         => 'Имя',
                        'status'       => 'Статус',
                        'sort-order'   => 'Порядок сортировки',
                        'type'         => 'Тип',
                        'view'         => 'Просмотр',
                    ],
                ],
            
                'create' => [
                    'name'       => 'Имя',
                    'save-btn'   => 'Сохранить тему',
                    'sort-order' => 'Порядок сортировки',
                    'title'      => 'Создать тему',
            
                    'type' => [
                        'footer-links'     => 'Ссылки в подвале',
                        'image-carousel'   => 'Слайдер Карусель',
                        'product-carousel' => 'Карусель товаров',
                        'static-content'   => 'Статическое содержимое',
                        'services-content' => 'Содержимое услуг',
                        'title'            => 'Тип',
                    ],
                ],
            
                'edit' => [
                    'add-image-btn'                 => 'Добавить изображение',
                    'add-filter-btn'                => 'Добавить фильтр',
                    'add-footer-link-btn'           => 'Добавить ссылку в подвале',
                    'add-link'                      => 'Добавить ссылку',
                    'asc'                           => 'По возрастанию',
                    'back'                          => 'Назад',
                    'category-carousel-description' => 'Показывать динамические категории привлекательно с помощью адаптивного каруселя категорий.',
                    'category-carousel'             => 'Карусель категорий',
                    'create-filter'                 => 'Создать фильтр',
                    'css'                           => 'CSS',
                    'column'                        => 'Колонка',
                    'channels'                      => 'Каналы',
                    'desc'                          => 'По убыванию',
                    'delete'                        => 'Удалить',
                    'edit'                          => 'Редактировать',
                    'footer-title'                  => 'Заголовок',
                    'footer-link'                   => 'Ссылки в подвале',
                    'footer-link-form-title'        => 'Ссылка в подвале',
                    'filter-title'                  => 'Заголовок',
                    'filters'                       => 'Фильтры',
                    'footer-link-description'       => 'Переходите по ссылкам в подвале для плавного и информативного исследования веб-сайта.',
                    'general'                       => 'Общее',
                    'html'                          => 'HTML',
                    'image'                         => 'Изображение',
                    'image-size'                    => 'Разрешение изображения должно быть (1920px X 700px)',
                    'image-title'                   => 'Заголовок изображения',
                    'image-upload-message'          => 'Разрешены только изображения (.jpeg, .jpg, .png, .webp, ..).',
                    'key'                           => 'Ключ: :key',
                    'key-input'                     => 'Ключ',
                    'link'                          => 'Ссылка',
                    'limit'                         => 'Лимит',
                    'name'                          => 'Имя',
                    'product-carousel'              => 'Карусель товаров',
                    'product-carousel-description'  => 'Представьте продукты элегантно с динамической и адаптивной каруселью товаров.',
                    'path'                          => 'Путь',
                    'preview'                       => 'Предпросмотр',
                    'slider'                        => 'Слайдер',
                    'static-content-description'    => 'Улучшите взаимодействие с кратким, информативным статическим контентом для вашей аудитории.',
                    'static-content'                => 'Статическое содержимое',
                    'slider-description'            => 'Настройка темы, связанной со слайдером.',
                    'slider-required'               => 'Поле слайдера обязательно.',
                    'slider-add-btn'                => 'Добавить слайдер',
                    'save-btn'                      => 'Сохранить',
                    'sort'                          => 'Сортировка',
                    'sort-order'                    => 'Порядок сортировки',
                    'status'                        => 'Статус',
                    'slider-image'                  => 'Изображение слайдера',
                    'select'                        => 'Выбрать',
                    'title'                         => 'Редактировать тему',
                    'update-slider'                 => 'Обновить слайдер',
                    'url'                           => 'URL',
                    'value-input'                   => 'Значение',
                    'value'                         => 'Значение: :value',
            
                    'services-content' => [
                        'add-btn'            => 'Добавить услуги',
                        'channels'           => 'Каналы',
                        'delete'             => 'Удалить',
                        'description'        => 'Описание',
                        'general'            => 'Общее',
                        'name'               => 'Имя',
                        'save-btn'           => 'Сохранить',
                        'service-icon'       => 'Иконка услуги',
                        'service-icon-class' => 'Класс иконки услуги',
                        'service-info'       => 'Настройка темы, связанной с услугами.',
                        'services'           => 'Услуги',
                        'sort-order'         => 'Порядок сортировки',
                        'status'             => 'Статус',
                        'title'              => 'Заголовок',
                        'update-service'     => 'Обновить услуги',
                    ],
                ],
            
                'create-success' => 'Тема успешно создана',
                'delete-success' => 'Тема успешно удалена',
                'update-success' => 'Тема успешно обновлена',
                'delete-failed'  => 'Произошла ошибка при удалении содержимого темы.',
            ],
            
            'email' => [
                'create' => [
                    'send-btn'                  => 'Отправить Email',
                    'back-btn'                  => 'Назад',
                    'title'                     => 'Отправить Email',
                    'general'                   => 'Общее',
                    'body'                      => 'Текст',
                    'subject'                   => 'Тема',
                    'dear'                      => 'Уважаемый :agent_name',
                    'agent-registration'        => 'Агент Saas успешно зарегистрирован',
                    'summary'                   => 'Ваша учетная запись была создана. Ваши данные учетной записи указаны ниже:',
                    'saas-url'                  => 'Домен',
                    'email'                     => 'Email',
                    'password'                  => 'Пароль',
                    'sign-in'                   => 'Войти',
                    'thanks'                    => 'Спасибо!',
                    'send-email-to-all-tenants' => 'Отправить email всем арендаторам',
                ],
                
                'send-success' => 'Email успешно отправлен.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'Список страниц CMS',
                'create-btn' => 'Создать страницу',
        
                'datagrid' => [
                    'id'                  => 'Идентификатор',
                    'page-title'          => 'Заголовок страницы',
                    'url-key'             => 'URL-адрес',
                    'status'              => 'Статус',
                    'active'              => 'Активно',
                    'disable'             => 'Отключить',
                    'edit'                => 'Изменить страницу',
                    'delete'              => 'Удалить страницу',
                    'mass-delete'         => 'Массовое удаление',
                    'mass-delete-success' => 'Выбранные страницы CMS успешно удалены',
                ],
            ],
        
            'create' => [
                'title'            => 'Создать страницу CMS',
                'first-name'       => 'Имя',
                'general'          => 'Общее',
                'page-title'       => 'Заголовок',
                'channels'         => 'Каналы',
                'content'          => 'Содержание',
                'meta-keywords'    => 'Мета-ключи',
                'meta-description' => 'Мета-описание',
                'meta-title'       => 'Мета-заголовок',
                'seo'              => 'SEO',
                'url-key'          => 'URL-адрес',
                'description'      => 'Описание',
                'save-btn'         => 'Сохранить страницу CMS',
                'back-btn'         => 'Назад',
            ],
        
            'edit' => [
                'title'            => 'Редактировать страницу',
                'preview-btn'      => 'Предварительный просмотр страницы',
                'save-btn'         => 'Сохранить страницу',
                'general'          => 'Общее',
                'page-title'       => 'Заголовок страницы',
                'back-btn'         => 'Назад',
                'channels'         => 'Каналы',
                'content'          => 'Содержание',
                'seo'              => 'SEO',
                'meta-keywords'    => 'Мета-ключи',
                'meta-description' => 'Мета-описание',
                'meta-title'       => 'Мета-заголовок',
                'url-key'          => 'URL-адрес',
                'description'      => 'Описание',
            ],
        
            'create-success' => 'CMS успешно создана.',
            'delete-success' => 'CMS успешно удалена.',
            'update-success' => 'CMS успешно обновлена.',
            'no-resource'    => 'Ресурс не существует.',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => 'Удалить',
                'enable-at-least-one-shipping' => 'Включите хотя бы один метод доставки.',
                'enable-at-least-one-payment'  => 'Включите хотя бы один метод оплаты.',
                'save-btn'                     => 'Сохранить настройки',
                'save-message'                 => 'Настройки успешно сохранены',
                'title'                        => 'Настройки',
        
                'general' => [
                    'info'  => 'Управление макетом и деталями электронной почты',
                    'title' => 'Общее',
        
                    'design' => [
                        'info'  => 'Установите логотип и значок фавиконки.',
                        'title' => 'Дизайн',
        
                        'super' => [
                            'info'          => 'Логотип суперадминистратора - это отличительное изображение или эмблема, представляющая интерфейс администрирования системы или веб-сайта, часто настраиваемая.',
                            'admin-logo'    => 'Логотип администратора',
                            'logo-image'    => 'Изображение логотипа',
                            'favicon-image' => 'Изображение фавиконки',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => 'Установите адрес электронной почты для суперадминистратора.',
                        'title' => 'Супер Агент',
        
                        'super' => [
                            'info'          => 'Установите адрес электронной почты для суперадминистратора, чтобы получать уведомления по электронной почте',
                            'email-address' => 'Адрес электронной почты',
                        ],

                        'social-connect' => [
                            'title'    => 'Социальные сети',
                            'info'     => 'Социальные медиа предоставляют возможности для прямого взаимодействия с вашей аудиторией через комментарии, лайки и репосты, способствуя вовлеченности и созданию сообщества вокруг вашего бренда.',
                            'facebook' => 'Facebook',
                            'twitter'  => 'Twitter',
                            'linkedin' => 'LinkedIn',
                        ],
                    ],
        
                    'content' => [
                        'info'   => 'Установите информацию для верхнего и нижнего колонтитулов для макета регистрации арендатора.',
                        'title'  => 'Содержание',
        
                        'footer' => [
                            'info'           => 'Установите содержимое нижнего колонтитула',
                            'title'          => 'Нижний колонтитул',
                            'footer-content' => 'Текст нижнего колонтитула',
                            'footer-toggle'  => 'Переключить нижний колонтитул',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => 'Управление продажами, методами доставки и оплаты',
                    'title' => 'Продажи',
        
                    'shipping-methods' => [
                        'info'  => 'Установите информацию о методах доставки',
                        'title' => 'Методы доставки',
                    ],
        
                    'payment-methods' => [
                        'info'  => 'Установите информацию о методах оплаты',
                        'title' => 'Методы оплаты',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => 'Включите хотя бы один метод доставки.',
            'enable-at-least-one-payment'  => 'Включите хотя бы один метод оплаты.',
            'save-message'                 => 'Успех: настройки суперадминистратора успешно сохранены.',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'Зарегистрироваться как арендатор',
            ],
    
            'footer' => [
                'footer-text'     => '© Копирайт 2010 - 2023, Webkul Software (зарегистрирована в Индии). Все права защищены.',
                'connect-with-us' => 'Связаться с нами',
                'text-locale'     => 'Язык',
                'text-currency'   => 'Валюта',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => 'Регистрация продавца',
            'step-1'              => 'Шаг 1',
            'auth-cred'           => 'Аутентификационные данные',
            'email'               => 'Email',
            'phone'               => 'Телефон',
            'username'            => 'Имя пользователя',
            'password'            => 'Пароль',
            'cpassword'           => 'Подтвердить пароль',
            'continue'            => 'Продолжить',
            'step-2'              => 'Шаг 2',
            'personal'            => 'Личные данные',
            'first-name'          => 'Имя',
            'last-name'           => 'Фамилия',
            'step-3'              => 'Шаг 3',
            'org-details'         => 'Данные организации',
            'org-name'            => 'Название организации',
            'company-activated'   => 'Успех: Компания успешно активирована.',
            'company-deactivated' => 'Успех: Компания успешно деактивирована.',
            'company-updated'     => 'Успех: Компания успешно обновлена.',
            'something-wrong'     => 'Предупреждение: Что-то пошло не так.',
            'store-created'       => 'Успех: Магазин успешно создан.',
            'something-wrong-1'   => 'Предупреждение: Что-то пошло не так, пожалуйста, попробуйте позже.',
            'content'             => 'Станьте продавцом и создайте свой собственный магазин без проблем с установкой и управлением сервером. Вам просто нужно зарегистрироваться, загрузить данные о продуктах и получить свой интернет-магазин. Модуль SaaS для Laravel многокомпаний предлагает простые возможности настройки, это означает, что продавец легко может добавить любые дополнительные функции и возможности к своему магазину или легко улучшить его.',
    
            'right-panel' => [
                'heading'    => 'Как настроить учетную запись продавца',
                'para'       => 'Это легко настроить модуль всего за несколько шагов',
                'step-one'   => 'Введите аутентификационные данные, такие как email, пароль и подтверждение пароля',
                'step-two'   => 'Введите личные данные, такие как имя, фамилия и номер телефона.',
                'step-three' => 'Введите данные организации, такие как имя пользователя и название организации',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => 'Предупреждение: Создание более одного канала недопустимо',
            'channel-hostname'                  => 'Предупреждение: Пожалуйста, свяжитесь с администратором для изменения вашего хоста',
            'same-domain'                       => 'Предупреждение: Невозможно сохранить тот же поддомен как основной домен',
            'block-message'                     => 'Предупреждение: Если вы хотите разблокировать этого арендатора, не стесняйтесь связаться с нами, мы доступны 24/7 для решения вашей проблемы.',
            'blocked'                           => 'был заблокирован',
            'illegal-action'                    => 'Предупреждение: Вы совершили незаконное действие',
            'domain-message'                    => 'Предупреждение: Упс! Мы не можем помочь на <b>:domain</b>',
            'domain-desc'                       => 'Если вы хотите создать учетную запись с <b>:domain</b>
            в качестве организации, не стесняйтесь создавать учетную запись и начинать работу.',
            'illegal-message'                   => 'Предупреждение: Действие, которое вы выполнили, отключено администратором сайта, пожалуйста, отправьте письмо вашему администратору сайта для получения дополнительной информации по этому вопросу.',
            'locale-creation'                   => 'Предупреждение: Создание локали, отличной от английского, недопустимо.',
            'locale-delete'                     => 'Предупреждение: Невозможно удалить локаль.',
            'cannot-delete-default'             => 'Предупреждение: Невозможно удалить канал по умолчанию.',
            'tenant-blocked'                    => 'Арендатор заблокирован',
            'domain-not-found'                  => 'Предупреждение: Домен не найден.',
            'company-blocked-by-administrator'  => 'Этот арендатор заблокирован администратором',
            'not-allowed-to-visit-this-section' => 'Предупреждение: Вам не разрешено использовать этот раздел.',
            'auth'                              => 'Предупреждение: Ошибка аутентификации!',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'Новая компания зарегистрирована',
                'first-name' => 'Имя',
                'last-name'  => 'Фамилия',
                'email'      => 'Email',
                'name'       => 'Имя',
                'username'   => 'Имя пользователя',
                'domain'     => 'Домен',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => 'Новая компания успешно зарегистрирована',
                'dear'       => 'Уважаемый :tenant_name',
                'greeting'   => 'Добро пожаловать и спасибо за регистрацию!',
                'summary'    => 'Ваша учетная запись была успешно создана, и вы можете войти, используя свой адрес электронной почты и учетные данные пароля. После входа в систему вы сможете получить доступ к другим услугам, включая продукты, продажи, клиентов, отзывы и акции.',
                'thanks'     => 'Спасибо!',
                'visit-shop' => 'Посетить магазин',
            ],
        ],
    ],

    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'Редактировать информацию о компании',
            'first-name'     => 'Имя',
            'last-name'      => 'Фамилия',
            'email'          => 'Эл. почта',
            'skype'          => 'Скайп',
            'cname'          => 'Имя',
            'phone'          => 'Телефон',
            'general'        => 'Общее',
            'back-btn'       => 'Назад',
            'save-btn'       => 'Сохранить информацию',
            'update-success' => 'Успех: :resource успешно обновлен.',
            'update-failed'  => 'Предупреждение: Невозможно обновить :resource по неизвестным причинам.',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => 'Список адресов компании',
                'create-btn' => 'Добавить адрес',
    
                'datagrid' => [
                    'id'          => 'Идентификатор',
                    'address1'    => 'Адрес 1',
                    'address2'    => 'Адрес 2',
                    'city'        => 'Город',
                    'country'     => 'Страна',
                    'edit'        => 'Редактировать',
                    'delete'      => 'Удалить',
                    'mass-delete' => 'Массовое удаление',
                ],
            ],
    
            'create' => [
                'title'     => 'Создать адрес компании',
                'general'   => 'Общее',
                'address1'  => 'Адрес 1',
                'address2'  => 'Адрес 2',
                'country'   => 'Страна',
                'state'     => 'Регион',
                'city'      => 'Город',
                'post-code' => 'Почтовый индекс',
                'phone'     => 'Телефон',
                'back-btn'  => 'Назад',
                'save-btn'  => 'Сохранить адрес',
            ],
    
            'edit' => [
                'title'     => 'Редактировать адрес компании',
                'general'   => 'Общее',
                'address1'  => 'Адрес 1',
                'address2'  => 'Адрес 2',
                'country'   => 'Страна',
                'state'     => 'Регион',
                'city'      => 'Город',
                'post-code' => 'Почтовый индекс',
                'phone'     => 'Телефон',
                'back-btn'  => 'Назад',
                'save-btn'  => 'Сохранить адрес',
            ],
    
            'create-success'      => 'Успех: Адрес компании успешно создан.',
            'update-success'      => 'Успех: Адрес компании успешно обновлен.',
            'delete-success'      => 'Успех: :resource успешно удален.',
            'delete-failed'       => 'Предупреждение: Невозможно удалить :resource по неизвестным причинам.',
            'mass-delete-success' => 'Успех: Выбранный адрес успешно удален.',
        ],
    
        'system' => [
            'social-login'           => 'Социальный вход',
            'facebook'               => 'Настройки Facebook',
            'facebook-client-id'     => 'Идентификатор клиента Facebook',
            'facebook-client-secret' => 'Секретный ключ клиента Facebook',
            'facebook-callback-url'  => 'URL обратного вызова Facebook',
            'twitter'                => 'Настройки Twitter',
            'twitter-client-id'      => 'Идентификатор клиента Twitter',
            'twitter-client-secret'  => 'Секретный ключ клиента Twitter',
            'twitter-callback-url'   => 'URL обратного вызова Twitter',
            'google'                 => 'Настройки Google',
            'google-client-id'       => 'Идентификатор клиента Google',
            'google-client-secret'   => 'Секретный ключ клиента Google',
            'google-callback-url'    => 'URL обратного вызова Google',
            'linkedin'               => 'Настройки LinkedIn',
            'linkedin-client-id'     => 'Идентификатор клиента LinkedIn',
            'linkedin-client-secret' => 'Секретный ключ клиента LinkedIn',
            'linkedin-callback-url'  => 'URL обратного вызова LinkedIn',
            'github'                 => 'Настройки GitHub',
            'github-client-id'       => 'Идентификатор клиента GitHub',
            'github-client-secret'   => 'Секретный ключ клиента GitHub',
            'github-callback-url'    => 'URL обратного вызова GitHub',
            'email-credentials'      => 'Учетные данные эл. почты',
            'mail-driver'            => 'Драйвер почты',
            'mail-host'              => 'Хост почты',
            'mail-port'              => 'Порт почты',
            'mail-username'          => 'Имя пользователя почты',
            'mail-password'          => 'Пароль почты',
            'mail-encryption'        => 'Шифрование почты',
        ],
    
        'tenant' => [
            'id'              => 'ID',
            'first-name'      => 'Имя',
            'last-name'       => 'Фамилия',
            'email'           => 'Эл. почта',
            'skype'           => 'Скайп',
            'c-name'          => 'Имя',
            'add-address'     => 'Добавить адрес',
            'country'         => 'Страна',
            'city'            => 'Город',
            'address1'        => 'Адрес 1',
            'address2'        => 'Адрес 2',
            'address'         => 'Список адресов',
            'company'         => 'Компания',
            'profile'         => 'Профиль',
            'update'          => 'Обновить',
            'address-details' => 'Детали адреса',
            'create-failed'   => 'Предупреждение: Невозможно создать :attribute по неизвестным причинам.',
            'update-success'  => 'Успех: :resource успешно обновлен.',
            'update-failed'   => 'Предупреждение: Невозможно обновить :resource по неизвестным причинам.',
    
            'company-address' => [
                'add-address-title'    => 'Новый адрес',
                'update-address-title' => 'Обновить адрес',
                'save-btn-title'       => 'Сохранить адрес',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'Заказ :order_id размещен :placed_by :created_at.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'Упс! Страница, которую вы ищете, в отпуске. Похоже, мы не смогли найти то, что вы искали.',
            'title'       => '404 Страница не найдена',
        ],

        '401' => [
            'description' => 'Упс! Похоже, у вас нет доступа к этой странице. Похоже, у вас отсутствуют необходимые учетные данные.',
            'title'       => '401 Неавторизован',
        ],

        '403' => [
            'description' => 'Упс! Эта страница запрещена. Похоже, у вас нет необходимых разрешений для просмотра этого контента.',
            'title'       => '403 Запрещено',
        ],

        '500' => [
            'description' => 'Упс! Что-то пошло не так. Похоже, у нас возникли проблемы с загрузкой страницы, которую вы ищете.',
            'title'       => '500 Внутренняя ошибка сервера',
        ],

        '503' => [
            'description' => 'Упс! Похоже, мы временно недоступны из-за технического обслуживания. Пожалуйста, проверьте позже.',
            'title'       => '503 Сервис недоступен',
        ],
    ],
];
