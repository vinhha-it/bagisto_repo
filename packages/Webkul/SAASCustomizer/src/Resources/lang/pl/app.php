<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'Wersja : :version',
                'account-title' => 'Konto',
                'logout'        => 'Wyloguj',
                'my-account'    => 'Moje konto',
                'visit-shop'    => 'Odwiedź sklep',
            ],
    
            'sidebar' => [
                'tenants'          => 'Najemcy',
                'tenant-customers' => 'Klienci',
                'tenant-products'  => 'Produkty',
                'tenant-orders'    => 'Zamówienia',
                'settings'         => 'Ustawienia',
                'agents'           => 'Agenci',
                'roles'            => 'Role',
                'locales'          => 'Lokalizacje',
                'currencies'       => 'Waluty',
                'channels'         => 'Kanały',
                'exchange-rates'   => 'Kursy wymiany',
                'themes'           => 'Motywy',
                'cms'              => 'CMS',
                'configurations'   => 'Konfiguracje',
                'general'          => 'Ogólne',
                'send-email'       => 'Wyślij e-mail',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'Najemcy',
            'create'         => 'Dodaj',
            'edit'           => 'Edytuj',
            'delete'         => 'Usuń',
            'cancel'         => 'Anuluj',
            'view'           => 'Zobacz',
            'mass-delete'    => 'Usuwanie masowe',
            'mass-update'    => 'Aktualizacja masowa',
            'customers'      => 'Klienci',
            'products'       => 'Produkty',
            'orders'         => 'Zamówienia',
            'settings'       => 'Ustawienia',
            'agents'         => 'Agenci',
            'roles'          => 'Role',
            'locales'        => 'Lokalizacje',
            'currencies'     => 'Waluty',
            'exchange-rates' => 'Kursy wymiany',
            'channels'       => 'Kanały',
            'themes'         => 'Motywy',
            'send-email'     => 'Wyślij Email',
            'cms'            => 'CMS',
            'configuration'  => 'Konfiguracja',
            'download'       => 'Pobierz',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => 'Logowanie Super Administratora',
                'email'                => 'Adres Email',
                'password'             => 'Hasło',
                'btn-submit'           => 'Zaloguj się',
                'forget-password-link' => 'Zapomniałeś hasła?',
                'submit-btn'           => 'Zaloguj się',
                'login-success'        => 'Sukces: Zalogowałeś się pomyślnie.',
                'login-error'          => 'Sprawdź swoje dane logowania i spróbuj ponownie.',
                'activate-warning'     => 'Twoje konto nie zostało jeszcze aktywowane, skontaktuj się z administratorem.',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'Zapomniane hasło',
                    'title'           => 'Odzyskaj hasło',
                    'email'           => 'Zarejestrowany Email',
                    'reset-link-sent' => 'Wysłano link do resetowania hasła',
                    'sign-in-link'    => 'Powrót do logowania?',
                    'email-not-exist' => 'Email nie istnieje',
                    'submit-btn'      => 'Zresetuj',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'Resetuj hasło',
                'back-link-title'  => 'Powrót do logowania?',
                'confirm-password' => 'Potwierdź hasło',
                'email'            => 'Zarejestrowany Email',
                'password'         => 'Hasło',
                'submit-btn'       => 'Zresetuj hasło',
            ],
        ],

        'tenants' => [
            'index' => [
                'title'        => 'Lista Najemców',
                'register-btn' => 'Zarejestruj Najemcę',
        
                'create' => [
                    'title'             => 'Stwórz Najemcę',
                    'first-name'        => 'Imię',
                    'last-name'         => 'Nazwisko',
                    'user-name'         => 'Nazwa Użytkownika',
                    'organization-name' => 'Nazwa Organizacji',
                    'phone'             => 'Telefon',
                    'email'             => 'Email',
                    'password'          => 'Hasło',
                    'confirm-password'  => 'Potwierdź Hasło',
                    'save-btn'          => 'Zapisz Najemcę',
                    'back-btn'          => 'Powrót',
                ],
        
                'datagrid' => [
                    'id'                  => 'Id',
                    'user-name'           => 'Nazwa Użytkownika',
                    'organization'        => 'Organizacja',
                    'domain'              => 'Domena',
                    'cname'               => 'Imię',
                    'status'              => 'Status',
                    'active'              => 'Aktywny',
                    'disable'             => 'Wyłącz',
                    'view'                => 'Zobacz Dane',
                    'edit'                => 'Edytuj Najemcę',
                    'delete'              => 'Usuń Najemcę',
                    'mass-delete'         => 'Masowe Usuwanie',
                    'mass-delete-success' => 'Wybrani Najemcy Pomyślnie Usunięci',
                ],
            ],
        
            'edit' => [
                'title'             => 'Edytuj Najemcę',
                'first-name'        => 'Imię',
                'last-name'         => 'Nazwisko',
                'user-name'         => 'Nazwa Użytkownika',
                'cname'             => 'Imię',
                'organization-name' => 'Nazwa Organizacji',
                'phone'             => 'Telefon',
                'status'            => 'Status',
                'email'             => 'Email',
                'password'          => 'Hasło',
                'confirm-password'  => 'Potwierdź Hasło',
                'save-btn'          => 'Zapisz Najemcę',
                'back-btn'          => 'Powrót',
                'general'           => 'Ogólne',
                'settings'          => 'Ustawienia',
            ],
        
            'view' => [
                'title'                        => 'Dane Statystyczne Najemcy',
                'heading'                      => 'Najemca - :tenant_name',
                'email-address'                => 'Adres Email',
                'phone'                        => 'Telefon',
                'domain-information'           => 'Informacje o Domenie',
                'mapped-domain'                => 'Zmapowana Domena',
                'cname-information'            => 'Informacje o Imię',
                'cname-entry'                  => 'Wpis Imię',
                'attribute-information'        => 'Informacje o Atrybutach',
                'no-of-attributes'             => 'Liczba Atrybutów',
                'attribute-family-information' => 'Informacje o Rodzinie Atrybutów',
                'no-of-attribute-families'     => 'Liczba Rodzin Atrybutów',
                'product-information'          => 'Informacje o Produkcie',
                'no-of-products'               => 'Liczba Produktów',
                'customer-information'         => 'Informacje o Kliencie',
                'no-of-customers'              => 'Liczba Klientów',
                'customer-group-information'   => 'Informacje o Grupie Klientów',
                'no-of-customer-groups'        => 'Liczba Grup Klientów',
                'category-information'         => 'Informacje o Kategorii',
                'no-of-categories'             => 'Liczba Kategorii',
                'addresses'                    => 'Lista Adresów (:count)',
                'empty-title'                  => 'Dodaj Adres Najemcy',
            ],
        
            'create-success' => 'Najemca pomyślnie utworzony',
            'delete-success' => 'Najemca pomyślnie usunięty',
            'delete-failed'  => 'Usuwanie Najemcy nie powiodło się',
            'product-copied' => 'Najemca pomyślnie skopiowany',
            'update-success' => 'Najemca pomyślnie zaktualizowany',
        
            'customers' => [
                'index' => [
                    'title' => 'Lista Klientów',
        
                    'datagrid' => [
                        'id'             => 'Id',
                        'domain'         => 'Domena',
                        'customer-name'  => 'Nazwa Klienta',
                        'email'          => 'Email',
                        'customer-group' => 'Grupa Klienta',
                        'phone'          => 'Telefon',
                        'status'         => 'Status',
                        'active'         => 'Aktywny',
                        'inactive'       => 'Nieaktywny',
                        'is-suspended'   => 'Zawieszony',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => 'Lista Produktów',
        
                    'datagrid' => [
                        'id'               => 'Id',
                        'domain'           => 'Domena',
                        'name'             => 'Nazwa',
                        'sku'              => 'SKU',
                        'attribute-family' => 'Rodzina Atrybutów',
                        'image'            => 'Obraz',
                        'price'            => 'Cena',
                        'qty'              => 'Ilość',
                        'status'           => 'Status',
                        'active'           => 'Aktywny',
                        'inactive'         => 'Nieaktywny',
                        'category'         => 'Kategoria',
                        'type'             => 'Typ',
                    ],
                ],
            ],
        
            'orders' => [
                'index' => [
                    'title' => 'Lista Zamówień',
        
                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => 'Id Zamówienia',
                        'domain'          => 'Domena',
                        'sub-total'       => 'Razem',
                        'grand-total'     => 'Suma Ogólna',
                        'order-date'      => 'Data Zamówienia',
                        'channel-name'    => 'Nazwa Kanału',
                        'status'          => 'Status',
                        'processing'      => 'Przetwarzanie',
                        'completed'       => 'Zakończone',
                        'canceled'        => 'Anulowane',
                        'closed'          => 'Zamknięte',
                        'pending'         => 'Oczekujące',
                        'pending-payment' => 'Oczekujące na Płatność',
                        'fraud'           => 'Oszustwo',
                        'customer'        => 'Klient',
                        'email'           => 'Email',
                        'location'        => 'Lokalizacja',
                        'images'          => 'Obrazy',
                        'pay-by'          => 'Zapłać Przez - ',
                        'pay-via'         => 'Zapłać Przez',
                        'date'            => 'Data',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'Lista Agentów',
                    'register-btn' => 'Utwórz Agenta',
            
                    'create' => [
                        'title'             => 'Utwórz Agenta',
                        'first-name'        => 'Imię',
                        'last-name'         => 'Nazwisko',
                        'email'             => 'Email',
                        'current-password'  => 'Obecne Hasło',
                        'password'          => 'Hasło',
                        'confirm-password'  => 'Potwierdź Hasło',
                        'role'              => 'Rola',
                        'select'            => 'Wybierz',
                        'status'            => 'Status',
                        'save-btn'          => 'Zapisz Agenta',
                        'back-btn'          => 'Powrót',
                        'upload-image-info' => 'Prześlij obraz profilowy (110px X 110px) w formacie PNG lub JPG',
                    ],
            
                    'edit' => [
                        'title' => 'Edytuj Agenta',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Id',
                        'name'    => 'Imię',
                        'email'   => 'Email',
                        'role'    => 'Rola',
                        'status'  => 'Status',
                        'active'  => 'Aktywny',
                        'disable' => 'Wyłącz',
                        'actions' => 'Akcje',
                        'edit'    => 'Edytuj',
                        'delete'  => 'Usuń',
                    ],
                ],
            
                'create-success'             => 'Sukces: Super admin agent został utworzony pomyślnie',
                'delete-success'             => 'Agent został pomyślnie usunięty',
                'delete-failed'              => 'Usuwanie agenta nie powiodło się',
                'cannot-change'              => 'Imię agenta :name nie może być zmienione',
                'product-copied'             => 'Agent został pomyślnie skopiowany',
                'update-success'             => 'Agent został pomyślnie zaktualizowany',
                'invalid-password'           => 'Wprowadzone przez Ciebie obecne hasło jest niepoprawne',
                'last-delete-error'          => 'Ostrzeżenie: Wymagany jest co najmniej jeden super admin agent',
                'login-delete-error'         => 'Ostrzeżenie: Nie możesz usunąć swojego własnego konta.',
                'administrator-delete-error' => 'Ostrzeżenie: Wymagany jest co najmniej jeden super admin agent z dostępem administratora',
            ],
            
            'roles' => [
                'index' => [
                    'title'      => 'Lista Ról',
                    'create-btn' => 'Utwórz Rolę',
            
                    'datagrid' => [
                        'id'              => 'Id',
                        'name'            => 'Nazwa',
                        'permission-type' => 'Typ Uprawnień',
                        'actions'         => 'Akcje',
                        'edit'            => 'Edytuj',
                        'delete'          => 'Usuń',
                    ],
                ],
            
                'create' => [
                    'access-control' => 'Kontrola Dostępu',
                    'all'            => 'Wszystkie',
                    'back-btn'       => 'Powrót',
                    'custom'         => 'Niestandardowe',
                    'description'    => 'Opis',
                    'general'        => 'Ogólne',
                    'name'           => 'Nazwa',
                    'permissions'    => 'Uprawnienia',
                    'save-btn'       => 'Zapisz Rolę',
                    'title'          => 'Utwórz Rolę',
                ],
            
                'edit' => [
                    'access-control' => 'Kontrola Dostępu',
                    'all'            => 'Wszystkie',
                    'back-btn'       => 'Powrót',
                    'custom'         => 'Niestandardowe',
                    'description'    => 'Opis',
                    'general'        => 'Ogólne',
                    'name'           => 'Nazwa',
                    'permissions'    => 'Uprawnienia',
                    'save-btn'       => 'Zapisz Rolę',
                    'title'          => 'Edytuj Rolę',
                ],
            
                'being-used'        => 'Rola jest już używana przez innego Agenta',
                'last-delete-error' => 'Ostatnia Rola nie może zostać usunięta',
                'create-success'    => 'Rola została pomyślnie utworzona',
                'delete-success'    => 'Rola została pomyślnie usunięta',
                'delete-failed'     => 'Usuwanie roli nie powiodło się',
                'update-success'    => 'Rola została pomyślnie zaktualizowana',
            ],
            
            'locales' => [
                'index' => [
                    'title'      => 'Lista Lokalizacji',
                    'create-btn' => 'Utwórz Lokalizację',
            
                    'create' => [
                        'title'            => 'Utwórz Lokalizację',
                        'code'             => 'Kod',
                        'name'             => 'Nazwa',
                        'direction'        => 'Kierunek',
                        'select-direction' => 'Wybierz Kierunek',
                        'text-ltr'         => 'Lewo do prawo',
                        'text-rtl'         => 'Prawo do lewo',
                        'locale-logo'      => 'Logo Lokalizacji',
                        'logo-size'        => 'Rozmiar obrazu powinien być jak 24px X 16px',
                        'save-btn'         => 'Zapisz Lokalizację',
                    ],
            
                    'edit' => [
                        'title'     => 'Edytuj Lokalizację',
                        'code'      => 'Kod',
                        'name'      => 'Nazwa',
                        'direction' => 'Kierunek',
                    ],
            
                    'datagrid' => [
                        'id'        => 'Id',
                        'code'      => 'Kod',
                        'name'      => 'Nazwa',
                        'direction' => 'Kierunek',
                        'text-ltr'  => 'Lewo do prawo',
                        'text-rtl'  => 'Prawo do lewo',
                        'actions'   => 'Akcje',
                        'edit'      => 'Edytuj',
                        'delete'    => 'Usuń',
                    ],
                ],
                
                'being-used'        => ':locale_name jest używane jako domyślna lokalizacja w kanale',
                'create-success'    => 'Lokalizacja została pomyślnie utworzona.',
                'update-success'    => 'Lokalizacja została pomyślnie zaktualizowana.',
                'delete-success'    => 'Lokalizacja została pomyślnie usunięta.',
                'delete-failed'     => 'Usuwanie lokalizacji nie powiodło się',
                'last-delete-error' => 'Wymagana jest co najmniej jedna super admin lokalizacja.',
            ],

            'currencies' => [
                'index' => [
                    'title'      => 'Lista walut',
                    'create-btn' => 'Utwórz walutę',
            
                    'create' => [
                        'title'    => 'Utwórz walutę',
                        'code'     => 'Kod',
                        'name'     => 'Nazwa',
                        'symbol'   => 'Symbol',
                        'decimal'  => 'Dziesiętne',
                        'save-btn' => 'Zapisz walutę',
                    ],
            
                    'edit' => [
                        'title'    => 'Edytuj walutę',
                        'code'     => 'Kod',
                        'name'     => 'Nazwa',
                        'symbol'   => 'Symbol',
                        'decimal'  => 'Dziesiętne',
                        'save-btn' => 'Zapisz walutę',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Id',
                        'code'    => 'Kod',
                        'name'    => 'Nazwa',
                        'actions' => 'Działania',
                        'edit'    => 'Edytuj',
                        'delete'  => 'Usuń',
                    ],
                ],
            
                'create-success'      => 'Waluta została pomyślnie utworzona.',
                'update-success'      => 'Waluta została pomyślnie zaktualizowana.',
                'delete-success'      => 'Waluta została pomyślnie usunięta.',
                'delete-failed'       => 'Usuwanie waluty nie powiodło się',
                'last-delete-error'   => 'Wymagana jest co najmniej jedna waluta super admina.',
                'mass-delete-success' => 'Wybrane waluty zostały pomyślnie usunięte',
            ],
            
            'exchange-rates' => [
                'index' => [
                    'title'        => 'Kursy wymiany',
                    'create-btn'   => 'Utwórz kurs wymiany',
                    'update-rates' => 'Zaktualizuj kursy',
            
                    'create' => [
                        'title'                  => 'Utwórz kurs wymiany',
                        'source-currency'        => 'Waluta źródłowa',
                        'target-currency'        => 'Waluta docelowa',
                        'select-target-currency' => 'Wybierz walutę docelową',
                        'rate'                   => 'Kurs',
                        'save-btn'               => 'Zapisz kurs wymiany',
                    ],
            
                    'edit' => [
                        'title'           => 'Edytuj kurs wymiany',
                        'source-currency' => 'Waluta źródłowa',
                        'target-currency' => 'Waluta docelowa',
                        'rate'            => 'Kurs',
                        'save-btn'        => 'Zapisz kurs wymiany',
                    ],
            
                    'datagrid' => [
                        'id'            => 'Id',
                        'currency-name' => 'Nazwa waluty',
                        'exchange-rate' => 'Kurs wymiany',
                        'actions'       => 'Działania',
                        'edit'          => 'Edytuj',
                        'delete'        => 'Usuń',
                    ],
                ],
            
                'create-success' => 'Kurs wymiany został pomyślnie utworzony.',
                'update-success' => 'Kurs wymiany został pomyślnie zaktualizowany.',
                'delete-success' => 'Kurs wymiany został pomyślnie usunięty.',
                'delete-failed'  => 'Usuwanie kursu wymiany nie powiodło się',
            ],
            
            'channels' => [
                'index' => [
                    'title' => 'Kanały',
            
                    'datagrid' => [
                        'id'       => 'Id',
                        'code'     => 'Kod',
                        'name'     => 'Nazwa',
                        'hostname' => 'Nazwa hosta',
                        'actions'  => 'Działania',
                        'edit'     => 'Edytuj',
                        'delete'   => 'Usuń',
                    ],
                ],
            
                'edit' => [
                    'title'                  => 'Edytuj kanał',
                    'back-btn'               => 'Powrót',
                    'save-btn'               => 'Zapisz kanał',
                    'general'                => 'Ogólne',
                    'code'                   => 'Kod',
                    'name'                   => 'Nazwa',
                    'description'            => 'Opis',
                    'hostname'               => 'Nazwa hosta',
                    'hostname-placeholder'   => 'https://www.example.com (Nie dodawaj ukośnika na końcu.)',
                    'design'                 => 'Projekt',
                    'theme'                  => 'Motyw',
                    'logo'                   => 'Logo',
                    'logo-size'              => 'Rozdzielczość obrazu powinna być jak 192px X 50px',
                    'favicon'                => 'Favicon',
                    'favicon-size'           => 'Rozdzielczość obrazu powinna być jak 16px X 16px',
                    'seo'                    => 'SEO strony głównej',
                    'seo-title'              => 'Meta tytuł',
                    'seo-description'        => 'Meta opis',
                    'seo-keywords'           => 'Meta słowa kluczowe',
                    'currencies-and-locales' => 'Waluty i lokalizacje',
                    'locales'                => 'Lokalizacje',
                    'default-locale'         => 'Domyślna lokalizacja',
                    'currencies'             => 'Waluty',
                    'default-currency'       => 'Domyślna waluta',
                    'last-delete-error'      => 'Wymagany jest co najmniej jeden kanał.',
                    'settings'               => 'Ustawienia',
                    'status'                 => 'Status',
                    'update-success'         => 'Aktualizacja kanału zakończona pomyślnie',
                ],
            
                'update-success' => 'Kanał został pomyślnie zaktualizowany.',
                'delete-success' => 'Kanał został pomyślnie usunięty.',
                'delete-failed'  => 'Nie udało się usunąć kanału.',
            ],
            
            'themes' => [
                'index' => [
                    'create-btn' => 'Utwórz motyw',
                    'title'      => 'Motywy',
            
                    'datagrid' => [
                        'active'       => 'Aktywny',
                        'channel_name' => 'Nazwa kanału',
                        'delete'       => 'Usuń',
                        'inactive'     => 'Nieaktywny',
                        'id'           => 'Id',
                        'name'         => 'Nazwa',
                        'status'       => 'Status',
                        'sort-order'   => 'Kolejność sortowania',
                        'type'         => 'Typ',
                        'view'         => 'Widok',
                    ],
                ],
            
                'create' => [
                    'name'       => 'Nazwa',
                    'save-btn'   => 'Zapisz motyw',
                    'sort-order' => 'Kolejność sortowania',
                    'title'      => 'Utwórz motyw',
            
                    'type' => [
                        'footer-links'     => 'Linki stopki',
                        'image-carousel'   => 'Karuzela ze zdjęciami',
                        'product-carousel' => 'Karuzela produktów',
                        'static-content'   => 'Treść statyczna',
                        'services-content' => 'Treść usług',
                        'title'            => 'Typ',
                    ],
                ],
            
                'edit' => [
                    'add-image-btn'                 => 'Dodaj obraz',
                    'add-filter-btn'                => 'Dodaj filtr',
                    'add-footer-link-btn'           => 'Dodaj link stopki',
                    'add-link'                      => 'Dodaj link',
                    'asc'                           => 'Rosnąco',
                    'back'                          => 'Powrót',
                    'category-carousel-description' => 'Wyświetl dynamiczne kategorie atrakcyjnie za pomocą responsywnej karuzeli kategorii.',
                    'category-carousel'             => 'Karuzela kategorii',
                    'create-filter'                 => 'Utwórz filtr',
                    'css'                           => 'CSS',
                    'column'                        => 'Kolumna',
                    'channels'                      => 'Kanały',
                    'desc'                          => 'Malejąco',
                    'delete'                        => 'Usuń',
                    'edit'                          => 'Edytuj',
                    'footer-title'                  => 'Tytuł',
                    'footer-link'                   => 'Linki stopki',
                    'footer-link-form-title'        => 'Link stopki',
                    'filter-title'                  => 'Tytuł',
                    'filters'                       => 'Filtry',
                    'footer-link-description'       => 'Przejdź za pomocą linków stopki dla płynnego przeglądania i uzyskiwania informacji na stronie internetowej.',
                    'general'                       => 'Ogólne',
                    'html'                          => 'HTML',
                    'image'                         => 'Obraz',
                    'image-size'                    => 'Rozdzielczość obrazu powinna być (1920px X 700px)',
                    'image-title'                   => 'Tytuł obrazu',
                    'image-upload-message'          => 'Dozwolone są tylko obrazy (.jpeg, .jpg, .png, .webp, ..).',
                    'key'                           => 'Klucz: :key',
                    'key-input'                     => 'Klucz',
                    'link'                          => 'Link',
                    'limit'                         => 'Limit',
                    'name'                          => 'Nazwa',
                    'product-carousel'              => 'Karuzela produktów',
                    'product-carousel-description'  => 'Przedstaw produkty elegancko za pomocą dynamicznej i responsywnej karuzeli produktów.',
                    'path'                          => 'Ścieżka',
                    'preview'                       => 'Podgląd',
                    'slider'                        => 'Suwak',
                    'static-content-description'    => 'Zwiększ zaangażowanie za pomocą zwięzłej, informacyjnej treści statycznej dla swojej publiczności.',
                    'static-content'                => 'Treść statyczna',
                    'slider-description'            => 'Dostosowanie motywu związane ze sliderem.',
                    'slider-required'               => 'Pole slidera jest wymagane.',
                    'slider-add-btn'                => 'Dodaj slider',
                    'save-btn'                      => 'Zapisz',
                    'sort'                          => 'Sortuj',
                    'sort-order'                    => 'Kolejność sortowania',
                    'status'                        => 'Status',
                    'slider-image'                  => 'Obraz suwaka',
                    'select'                        => 'Wybierz',
                    'title'                         => 'Edytuj motyw',
                    'update-slider'                 => 'Aktualizuj slider',
                    'url'                           => 'URL',
                    'value-input'                   => 'Wartość',
                    'value'                         => 'Wartość: :value',
            
                    'services-content' => [
                        'add-btn'            => 'Dodaj usługi',
                        'channels'           => 'Kanały',
                        'delete'             => 'Usuń',
                        'description'        => 'Opis',
                        'general'            => 'Ogólne',
                        'name'               => 'Nazwa',
                        'save-btn'           => 'Zapisz',
                        'service-icon'       => 'Ikona usługi',
                        'service-icon-class' => 'Klasa ikony usługi',
                        'service-info'       => 'Dostosowanie motywu związane z usługami.',
                        'services'           => 'Usługi',
                        'sort-order'         => 'Kolejność sortowania',
                        'status'             => 'Status',
                        'title'              => 'Tytuł',
                        'update-service'     => 'Aktualizuj usługi',
                    ],
                ],
            
                'create-success' => 'Motyw został pomyślnie utworzony',
                'delete-success' => 'Motyw został pomyślnie usunięty',
                'update-success' => 'Motyw został pomyślnie zaktualizowany',
                'delete-failed'  => 'Wystąpił błąd podczas usuwania zawartości motywu.',
            ],
            
            'email' => [
                'create' => [
                    'send-btn'                  => 'Wyślij e-mail',
                    'back-btn'                  => 'Powrót',
                    'title'                     => 'Wyślij e-mail',
                    'general'                   => 'Ogólne',
                    'body'                      => 'Treść',
                    'subject'                   => 'Temat',
                    'dear'                      => 'Drogi :agent_name',
                    'agent-registration'        => 'Rejestracja agenta SaaS zakończona pomyślnie',
                    'summary'                   => 'Twoje konto zostało utworzone. Szczegóły Twojego konta są poniżej: ',
                    'saas-url'                  => 'Domena',
                    'email'                     => 'E-mail',
                    'password'                  => 'Hasło',
                    'sign-in'                   => 'Zaloguj się',
                    'thanks'                    => 'Dziękujemy!',
                    'send-email-to-all-tenants' => 'Wyślij e-mail do wszystkich najemców',
                ],
            
                'send-success' => 'E-mail został pomyślnie wysłany.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'Lista Stron CMS',
                'create-btn' => 'Utwórz Stronę',
        
                'datagrid' => [
                    'id'                  => 'Id',
                    'page-title'          => 'Tytuł Strony',
                    'url-key'             => 'Klucz URL',
                    'status'              => 'Status',
                    'active'              => 'Aktywny',
                    'disable'             => 'Wyłącz',
                    'edit'                => 'Modyfikuj Stronę',
                    'delete'              => 'Usuń Stronę',
                    'mass-delete'         => 'Masowe Usuwanie',
                    'mass-delete-success' => 'Wybrane Strony Cms Usunięte Pomyślnie',
                ],
            ],
        
            'create' => [
                'title'            => 'Utwórz Stronę Cms',
                'first-name'       => 'Imię',
                'general'          => 'Ogólne',
                'page-title'       => 'Tytuł',
                'channels'         => 'Kanały',
                'content'          => 'Zawartość',
                'meta-keywords'    => 'Słowa Kluczowe Meta',
                'meta-description' => 'Opis Meta',
                'meta-title'       => 'Tytuł Meta',
                'seo'              => 'SEO',
                'url-key'          => 'Klucz URL',
                'description'      => 'Opis',
                'save-btn'         => 'Zapisz Stronę Cms',
                'back-btn'         => 'Powrót',
            ],
        
            'edit' => [
                'title'            => 'Edytuj Stronę',
                'preview-btn'      => 'Podgląd Strony',
                'save-btn'         => 'Zapisz Stronę',
                'general'          => 'Ogólne',
                'page-title'       => 'Tytuł Strony',
                'back-btn'         => 'Powrót',
                'channels'         => 'Kanały',
                'content'          => 'Zawartość',
                'seo'              => 'SEO',
                'meta-keywords'    => 'Słowa Kluczowe Meta',
                'meta-description' => 'Opis Meta',
                'meta-title'       => 'Tytuł Meta',
                'url-key'          => 'Klucz URL',
                'description'      => 'Opis',
            ],
        
            'create-success' => 'Utworzono CMS pomyślnie.',
            'delete-success' => 'Usunięto CMS pomyślnie.',
            'update-success' => 'Zaktualizowano CMS pomyślnie.',
            'no-resource'    => 'Zasób nie istnieje.',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => 'Usuń',
                'enable-at-least-one-shipping' => 'Włącz przynajmniej jedną metodę wysyłki.',
                'enable-at-least-one-payment'  => 'Włącz przynajmniej jedną metodę płatności.',
                'save-btn'                     => 'Zapisz Konfigurację',
                'save-message'                 => 'Konfiguracja zapisana pomyślnie',
                'title'                        => 'Konfiguracja',
        
                'general' => [
                    'info'  => 'Zarządzaj układem i szczegółami e-maili',
                    'title' => 'Ogólne',
        
                    'design' => [
                        'info'  => 'Ustaw logo i ikonę favicon.',
                        'title' => 'Projekt',
        
                        'super' => [
                            'info'          => 'Logo super admina to charakterystyczny obraz lub emblemat reprezentujący interfejs administracyjny systemu lub witryny, często konfigurowalny.',
                            'admin-logo'    => 'Logo Administratora',
                            'logo-image'    => 'Obraz Logo',
                            'favicon-image' => 'Obraz Favicon',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => 'Ustaw adres e-mail dla super admina.',
                        'title' => 'Super Agent',
        
                        'super' => [
                            'info'          => 'Ustaw adres e-mail dla super admina w celu otrzymywania powiadomień e-mail',
                            'email-address' => 'Adres e-mail',
                        ],

                        'social-connect' => [
                            'title'    => 'Łączność Społecznościowa',
                            'info'     => 'Platformy mediów społecznościowych zapewniają możliwości bezpośredniej interakcji z Twoją publicznością poprzez komentarze, polubienia i udostępnianie, wspierając zaangażowanie i budowanie społeczności wokół Twojej marki.',
                            'facebook' => 'Facebook',
                            'twitter'  => 'Twitter',
                            'linkedin' => 'LinkedIn',
                        ],
                    ],
        
                    'content' => [
                        'info'   => 'Ustaw informacje o nagłówku i stopce dla układu rejestracji najemcy.',
                        'title'  => 'Zawartość',
        
                        'footer' => [
                            'info'           => 'Ustaw treść stopki',
                            'title'          => 'Stopka',
                            'footer-content' => 'Treść Stopki',
                            'footer-toggle'  => 'Przełącz stopkę',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => 'Zarządzaj szczegółami sprzedaży, wysyłki i metod płatności',
                    'title' => 'Sprzedaż',
        
                    'shipping-methods' => [
                        'info'  => 'Ustaw informacje o metodach wysyłki',
                        'title' => 'Metody Wysyłki',
                    ],
        
                    'payment-methods' => [
                        'info'  => 'Ustaw informacje o metodach płatności',
                        'title' => 'Metody Płatności',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => 'Włącz przynajmniej jedną metodę wysyłki.',
            'enable-at-least-one-payment'  => 'Włącz przynajmniej jedną metodę płatności.',
            'save-message'                 => 'Sukces: Konfiguracja super admina została pomyślnie zapisana.',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'Zarejestruj się jako najemca',
            ],
    
            'footer' => [
                'footer-text'     => '© Prawa autorskie 2010 - 2023, Webkul Software (Zarejestrowane w Indiach). Wszelkie prawa zastrzeżone.',
                'connect-with-us' => 'Skontaktuj się z nami',
                'text-locale'     => 'Lokalizacja',
                'text-currency'   => 'Waluta',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => 'Rejestracja handlowca',
            'step-1'              => 'Krok 1',
            'auth-cred'           => 'Dane uwierzytelniające',
            'email'               => 'E-mail',
            'phone'               => 'Telefon',
            'username'            => 'Nazwa użytkownika',
            'password'            => 'Hasło',
            'cpassword'           => 'Potwierdź hasło',
            'continue'            => 'Kontynuuj',
            'step-2'              => 'Krok 2',
            'personal'            => 'Dane osobowe',
            'first-name'          => 'Imię',
            'last-name'           => 'Nazwisko',
            'step-3'              => 'Krok 3',
            'org-details'         => 'Dane organizacyjne',
            'org-name'            => 'Nazwa organizacji',
            'company-activated'   => 'Sukces: Firma została pomyślnie aktywowana.',
            'company-deactivated' => 'Sukces: Firma została pomyślnie dezaktywowana.',
            'company-updated'     => 'Sukces: Firma zaktualizowana pomyślnie.',
            'something-wrong'     => 'Ostrzeżenie: Wystąpił problem.',
            'store-created'       => 'Sukces: Sklep został pomyślnie utworzony.',
            'something-wrong-1'   => 'Ostrzeżenie: Wystąpił problem, spróbuj ponownie później.',
            'content'             => 'Zostań handlowcem i utwórz swój własny sklep bezproblemowo, nie martwiąc się o instalację i zarządzanie serwerem. Wystarczy się zarejestrować, przesłać dane produktu i otrzymać swój sklep internetowy. Moduł SaaS wielu firm Laravel oferuje łatwe możliwości dostosowywania, co oznacza, że handlowiec może łatwo dodać dodatkowe funkcje i funkcjonalności do swojego sklepu lub łatwo go ulepszyć.',
    
            'right-panel' => [
                'heading'    => 'Jak skonfigurować konto handlowca',
                'para'       => 'Konfiguracja modułu jest łatwa i wymaga tylko kilku kroków',
                'step-one'   => 'Wprowadź dane uwierzytelniające, takie jak e-mail, hasło i potwierdź hasło',
                'step-two'   => 'Wprowadź dane osobowe, takie jak imię, nazwisko i numer telefonu.',
                'step-three' => 'Wprowadź dane organizacyjne, takie jak nazwa użytkownika, nazwa organizacji',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => 'Ostrzeżenie: Tworzenie więcej niż jednego kanału jest niedozwolone',
            'channel-hostname'                  => 'Ostrzeżenie: Skontaktuj się z administratorem, aby zmienić nazwę hosta',
            'same-domain'                       => 'Ostrzeżenie: Nie można zachować tego samego poddomeny co główna domena',
            'block-message'                     => 'Ostrzeżenie: Jeśli chcesz odblokować tego najemcę, skontaktuj się z nami, jesteśmy dostępni 24/7, aby rozwiązać Twój problem.',
            'blocked'                           => 'został zablokowany',
            'illegal-action'                    => 'Ostrzeżenie: Wykonałeś nielegalną czynność',
            'domain-message'                    => 'Ostrzeżenie: Ups! Nie mogliśmy pomóc na <b>:domain</b>',
            'domain-desc'                       => 'Jeśli chcesz utworzyć konto z <b>:domain</b> jako organizacja, śmiało utwórz konto i zacznij korzystać.',
            'illegal-message'                   => 'Ostrzeżenie: Wykonywana przez Ciebie czynność została wyłączona przez administratora witryny, prosimy o wysłanie wiadomości do administratora witryny w celu uzyskania więcej informacji.',
            'locale-creation'                   => 'Ostrzeżenie: Tworzenie lokalizacji innej niż angielska jest niedozwolone.',
            'locale-delete'                     => 'Ostrzeżenie: Nie można usunąć lokalizacji.',
            'cannot-delete-default'             => 'Ostrzeżenie: Nie można usunąć domyślnego kanału.',
            'tenant-blocked'                    => 'Najemca zablokowany',
            'domain-not-found'                  => 'Ostrzeżenie: Nie znaleziono domeny.',
            'company-blocked-by-administrator'  => 'Ten najemca jest zablokowany',
            'not-allowed-to-visit-this-section' => 'Ostrzeżenie: Nie masz uprawnień do korzystania z tej sekcji.',
            'auth'                              => 'Ostrzeżenie: Błąd uwierzytelniania!',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'Nowa firma zarejestrowana',
                'first-name' => 'Imię',
                'last-name'  => 'Nazwisko',
                'email'      => 'E-mail',
                'name'       => 'Nazwa',
                'username'   => 'Nazwa użytkownika',
                'domain'     => 'Domena',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => 'Nowa firma zarejestrowana pomyślnie',
                'dear'       => 'Szanowny :tenant_name',
                'greeting'   => 'Witaj i dziękujemy za rejestrację!',
                'summary'    => 'Twoje konto zostało pomyślnie utworzone i możesz się zalogować, używając swojego adresu e-mail i hasła. Po zalogowaniu będziesz mógł korzystać z innych usług, w tym produktów, sprzedaży, klientów, opinii i promocji.',
                'thanks'     => 'Dzięki!',
                'visit-shop' => 'Odwiedź sklep',
            ],
        ],
    ],

    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'Edytuj szczegóły firmy',
            'first-name'     => 'Imię',
            'last-name'      => 'Nazwisko',
            'email'          => 'E-mail',
            'skype'          => 'Skype',
            'cname'          => 'Nazwa firmy',
            'phone'          => 'Telefon',
            'general'        => 'Ogólne',
            'back-btn'       => 'Wstecz',
            'save-btn'       => 'Zapisz szczegóły',
            'update-success' => 'Sukces: :resource pomyślnie zaktualizowany.',
            'update-failed'  => 'Ostrzeżenie: Nie można zaktualizować :resource z nieznanych powodów.',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => 'Lista adresów firmy',
                'create-btn' => 'Dodaj adres',
    
                'datagrid' => [
                    'id'          => 'Id',
                    'address1'    => 'Adres 1',
                    'address2'    => 'Adres 2',
                    'city'        => 'Miasto',
                    'country'     => 'Kraj',
                    'edit'        => 'Edytuj',
                    'delete'      => 'Usuń',
                    'mass-delete' => 'Usuń masowo',
                ],
            ],
    
            'create' => [
                'title'     => 'Utwórz adres firmy',
                'general'   => 'Ogólne',
                'address1'  => 'Adres1',
                'address2'  => 'Adres2',
                'country'   => 'Kraj',
                'state'     => 'Stan',
                'city'      => 'Miasto',
                'post-code' => 'Kod pocztowy',
                'phone'     => 'Telefon',
                'back-btn'  => 'Wstecz',
                'save-btn'  => 'Zapisz adres',
            ],
    
            'edit' => [
                'title'     => 'Edytuj adres firmy',
                'general'   => 'Ogólne',
                'address1'  => 'Adres1',
                'address2'  => 'Adres2',
                'country'   => 'Kraj',
                'state'     => 'Stan',
                'city'      => 'Miasto',
                'post-code' => 'Kod pocztowy',
                'phone'     => 'Telefon',
                'back-btn'  => 'Wstecz',
                'save-btn'  => 'Zapisz adres',
            ],
    
            'create-success'      => 'Sukces: Adres firmy został pomyślnie utworzony.',
            'update-success'      => 'Sukces: Adres firmy został pomyślnie zaktualizowany.',
            'delete-success'      => 'Sukces: :resource został pomyślnie usunięty.',
            'delete-failed'       => 'Ostrzeżenie: Nie można usunąć :resource z nieznanych powodów.',
            'mass-delete-success' => 'Sukces: Wybrane adresy zostały pomyślnie usunięte.',
        ],
    
        'system' => [
            'social-login'           => 'Logowanie przez media społecznościowe',
            'facebook'               => 'Ustawienia Facebooka',
            'facebook-client-id'     => 'ID klienta Facebooka',
            'facebook-client-secret' => 'Tajny klucz klienta Facebooka',
            'facebook-callback-url'  => 'Adres zwrotny Facebooka',
            'twitter'                => 'Ustawienia Twittera',
            'twitter-client-id'      => 'ID klienta Twittera',
            'twitter-client-secret'  => 'Tajny klucz klienta Twittera',
            'twitter-callback-url'   => 'Adres zwrotny Twittera',
            'google'                 => 'Ustawienia Google',
            'google-client-id'       => 'ID klienta Google',
            'google-client-secret'   => 'Tajny klucz klienta Google',
            'google-callback-url'    => 'Adres zwrotny Google',
            'linkedin'               => 'Ustawienia LinkedIn',
            'linkedin-client-id'     => 'ID klienta LinkedIn',
            'linkedin-client-secret' => 'Tajny klucz klienta LinkedIn',
            'linkedin-callback-url'  => 'Adres zwrotny LinkedIn',
            'github'                 => 'Ustawienia GitHuba',
            'github-client-id'       => 'ID klienta GitHuba',
            'github-client-secret'   => 'Tajny klucz klienta GitHuba',
            'github-callback-url'    => 'Adres zwrotny GitHuba',
            'email-credentials'      => 'Dane uwierzytelniania e-maila',
            'mail-driver'            => 'Sterownik poczty',
            'mail-host'              => 'Host poczty',
            'mail-port'              => 'Port poczty',
            'mail-username'          => 'Nazwa użytkownika poczty',
            'mail-password'          => 'Hasło poczty',
            'mail-encryption'        => 'Szyfrowanie poczty',
        ],
    
        'tenant' => [
            'id'              => 'ID',
            'first-name'      => 'Imię',
            'last-name'       => 'Nazwisko',
            'email'           => 'E-mail',
            'skype'           => 'Skype',
            'c-name'          => 'Nazwa firmy',
            'add-address'     => 'Dodaj adres',
            'country'         => 'Kraj',
            'city'            => 'Miasto',
            'address1'        => 'Adres 1',
            'address2'        => 'Adres 2',
            'address'         => 'Lista adresów',
            'company'         => 'Najemca',
            'profile'         => 'Profil',
            'update'          => 'Aktualizuj',
            'address-details' => 'Szczegóły adresu',
            'create-failed'   => 'Ostrzeżenie: Nie można utworzyć :attribute z nieznanych powodów.',
            'update-success'  => 'Sukces: :resource pomyślnie zaktualizowany.',
            'update-failed'   => 'Ostrzeżenie: Nie można zaktualizować :resource z nieznanych powodów.',
    
            'company-address' => [
                'add-address-title'    => 'Nowy adres',
                'update-address-title' => 'Aktualizuj adres',
                'save-btn-title'       => 'Zapisz adres',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'Zamówienie :order_id zostało złożone przez :placed_by w dniu :created_at.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'Ups! Strona, której szukasz, jest na wakacjach. Wygląda na to, że nie możemy znaleźć tego, czego szukasz.',
            'title'       => '404 Strona nie znaleziona',
        ],

        '401' => [
            'description' => 'Ups! Wygląda na to, że nie masz uprawnień do dostępu do tej strony. Wydaje się, że brakuje Ci niezbędnych poświadczeń.',
            'title'       => '401 Nieautoryzowany',
        ],

        '403' => [
            'description' => 'Ups! Ta strona jest zabroniona. Wygląda na to, że nie masz wymaganych uprawnień do wyświetlania tego zasobu.',
            'title'       => '403 Zabronione',
        ],

        '500' => [
            'description' => 'Ups! Coś poszło nie tak. Wygląda na to, że mamy problemy z wczytaniem strony, której szukasz.',
            'title'       => '500 Wewnętrzny błąd serwera',
        ],

        '503' => [
            'description' => 'Ups! Wygląda na to, że jesteśmy tymczasowo niedostępni z powodu konserwacji. Prosimy o sprawdzenie za chwilę.',
            'title'       => '503 Usługa niedostępna',
        ],
    ],
];
