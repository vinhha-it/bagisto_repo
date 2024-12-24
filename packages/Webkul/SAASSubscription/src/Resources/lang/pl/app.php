<?php

return [
    'super' => [
        'configuration' => [
            'index' => [
                'title' => 'Subskrypcja',
                'info'  => 'Zarządzaj szczegółami płatności PayPal dla subskrypcji.',

                'payment' => [
                    'title' => 'Ustawienia Płatności',
                    'info'  => 'Ustaw szczegóły dotyczące płatności i okresu próbnego.',

                    'trail-plan' => [
                        'title'     => 'Plan Próbny',
                        'info'      => 'Zarządzaj opcją umożliwienia planu próbnego oraz określ liczbę dni trwania okresu próbnego.',
                        'status'    => 'Zezwalaj na próbę',
                        'days'      => 'Dni próbne',
                        'plan-list' => 'Plan Próbny',
                    ],

                    'paypal' => [
                        'title'              => 'PayPal',
                        'info'               => 'Zarządzaj swoimi danymi uwierzytelniającymi PayPal w celu ułatwienia płatności za plany subskrypcyjne.',
                        'sandbox-mode'       => 'Tryb piaskownicy (sandbox)',
                        'merchant-paypal-id' => 'Identyfikator PayPal handlowca',
                        'user-name'          => 'Nazwa użytkownika',
                        'password'           => 'Hasło',
                        'signature'          => 'Sygnatura',
                    ],

                    'module-assignment' => [
                        'title'  => 'Ustawienia Przypisania Rozszerzenia',
                        'info'   => 'Zarządzaj przypisaniem modułów (dodatków SaaS) do planów subskrypcyjnych.',
                        'status' => 'Status',
                    ],
                ],
            ],
        ],

        'components' => [
            'layouts' => [
                'sidebar' => [
                    'subscription'    => 'Subskrypcja',
                    'plans'           => 'Plany',
                    'purchased-plans' => 'Zakupione Plany',
                    'invoices'        => 'Faktury',
                ],
            ],
        ],

        'subscriptions' => [
            'plans' => [
                'index' => [
                    'title'      => 'Lista Planów',
                    'create-btn' => 'Stwórz Plan',
                    'datagrid'   => [
                        'id'             => 'Id',
                        'code'           => 'Kod',
                        'name'           => 'Nazwa',
                        'monthly-amount' => 'Kwota miesięczna',
                        'yearly-amount'  => 'Kwota roczna',
                        'status'         => 'Status',
                        'active'         => 'Aktywny',
                        'inactive'       => 'Nieaktywny',
                        'edit'           => 'Edytuj',
                        'delete'         => 'Usuń',
                        'view'           => 'Podgląd',
                        'customer-email' => 'Email klienta',
                        'customer-name'  => 'Nazwa klienta',
                        'total'          => 'Suma',
                        'expired-on'     => 'Wygasa',
                        'created-at'     => 'Utworzony',
                        'company-name'   => 'Nazwa firmy',
                        'plan-name'      => 'Plan',
                        'amount'         => 'Kwota',
                        'period-unit'    => 'Jednostka okresu',
                        'profile-state'  => 'Status profilu',
                    ],
                ],

                'create' => [
                    'add-title'                  => 'Dodaj Plan',
                    'save-btn-title'             => 'Zapisz Plan',
                    'general'                    => 'Ogólne',
                    'code'                       => 'Kod',
                    'name'                       => 'Nazwa',
                    'description'                => 'Opis',
                    'billing-amount'             => 'Kwota rozliczenia',
                    'monthly-amount'             => 'Miesięczna kwota',
                    'yearly-amount'              => 'Roczna kwota (miesiąc po miesiącu)',
                    'plan-limitation'            => 'Ograniczenie planu',
                    'allowed-products'           => 'Dozwolone produkty',
                    'allowed-categories'         => 'Dozwolone kategorie',
                    'allowed-attributes'         => 'Dozwolone atrybuty',
                    'allowed-attribute-families' => 'Dozwolone rodziny atrybutów',
                    'allowed-channels'           => 'Dozwolone kanały',
                    'allowed-orders'             => 'Dozwolone zamówienia',
                    'offers'                     => 'Oferty',
                    'active'                     => 'Aktywny',
                    'inactive'                   => 'Nieaktywny',
                    'offer-title'                => 'Tytuł',
                    'type'                       => 'Typ',
                    'discount'                   => 'Zniżka',
                    'fixed'                      => 'Stała',
                    'price'                      => 'Zniżka',
                    'offer-status'               => 'Status',
                    'module-assignment'          => 'Przypisanie modułu',
                ],

                'edit' => [
                    'edit-title'                 => 'Edytuj Plan',
                    'add-title'                  => 'Dodaj Plan',
                    'save-btn-title'             => 'Zapisz Plan',
                    'general'                    => 'Ogólne',
                    'code'                       => 'Kod',
                    'name'                       => 'Nazwa',
                    'description'                => 'Opis',
                    'billing-amount'             => 'Kwota rozliczenia',
                    'monthly-amount'             => 'Miesięczna kwota',
                    'yearly-amount'              => 'Roczna kwota (miesiąc po miesiącu)',
                    'plan-limitation'            => 'Ograniczenie planu',
                    'allowed-products'           => 'Dozwolone produkty',
                    'allowed-categories'         => 'Dozwolone kategorie',
                    'allowed-attributes'         => 'Dozwolone atrybuty',
                    'allowed-attribute-families' => 'Dozwolone rodziny atrybutów',
                    'allowed-channels'           => 'Dozwolone kanały',
                    'allowed-orders'             => 'Dozwolone zamówienia',
                    'offers'                     => 'Oferty',
                    'active'                     => 'Aktywny',
                    'inactive'                   => 'Nieaktywny',
                    'offer-title'                => 'Tytuł',
                    'type'                       => 'Typ',
                    'discount'                   => 'Zniżka',
                    'fixed'                      => 'Stała',
                    'price'                      => 'Zniżka',
                    'offer-status'               => 'Status',
                    'module-assignment'          => 'Przypisanie modułu',
                ],
            ],
        ],

        'recurring-profiles' => [
            'index' => [
                'title'      => 'Zakupione Plany',
                'create-btn' => 'Stwórz Plan',

                'datagrid' => [
                    'company-name'  => 'Nazwa Firmy',
                    'id'            => 'Id',
                    'plan-name'     => 'Plan',
                    'amount'        => 'Kwota',
                    'period-unit'   => 'Jednostka Okresu',
                    'profile-state' => 'Stan Profilu',
                    'created-at'    => 'Utworzony',
                    'view'          => 'Podgląd',
                ],
            ],

            'view' => [
                'title'                      => 'Zakupione Plany',
                'create-btn'                 => 'Stwórz Plan',
                'plan-info'                  => 'Informacje o Planie',
                'plan'                       => 'Plan',
                'plan-name'                  => 'Nazwa Planu',
                'expiration-date'            => 'Data Wygaśnięcia',
                'billing-amount'             => 'Kwota Rozliczenia',
                'billing-cycle'              => 'Cykl Rozliczeniowy',
                'monthly'                    => 'Miesięczny',
                'annual'                     => 'Roczny',
                'profile-id'                 => 'Id Profilu',
                'tin'                        => 'NIP',
                'profile-state'              => 'Stan Profilu',
                'next-billing-date'          => 'Następna Data Rozliczenia',
                'payment-details'            => 'Szczegóły Płatności',
                'offer-title'                => 'Oferta Planu',
                'offer-type'                 => 'Typ Oferty',
                'offer-price'                => 'Cena Oferty',
                'reference-id'               => 'Identyfikator Referencyjny',
                'plan-state'                 => 'Stan Planu',
                'plan-type'                  => 'Typ Planu',
                'payment-status'             => 'Status Płatności',
                'schedule-description'       => 'Opis Harmonogramu',
                'amount'                     => 'Kwota',
                'payment-method'             => 'Metoda Płatności',
                'features'                   => 'Funkcje',
                'allowed-products'           => 'Dozwolone Produkty',
                'allowed-categories'         => 'Dozwolone Kategorie',
                'allowed-attributes'         => 'Dozwolone Atrybuty',
                'allowed-attribute-families' => 'Dozwolone Rodziny Atrybutów',
                'allowed-channels'           => 'Dozwolone Kanały',
                'allowed-orders'             => 'Dozwolone Zamówienia',
            ],
        ],

        'tenants' => [
            'view' => [
                'title'      => 'Zakupione Plany',
                'create-btn' => 'Stwórz Plan',
                'datagrid'   => [
                    'company-name'  => 'Nazwa Firmy',
                    'id'            => 'Id',
                    'plan-name'     => 'Plan',
                    'amount'        => 'Kwota',
                    'period-unit'   => 'Jednostka Okresu',
                    'profile-state' => 'Stan Profilu',
                    'created-at'    => 'Utworzony',
                    'view'          => 'Podgląd',
                ],
            ],
        ],

        'plans' => [
            'title'                      => 'Plany Abonamentowe',
            'add-title'                  => 'Dodaj Plan',
            'edit-title'                 => 'Edytuj Plan',
            'create-success'             => 'Plan został pomyślnie utworzony.',
            'update-success'             => 'Plan został pomyślnie zaktualizowany.',
            'delete-success'             => 'Plan został pomyślnie usunięty.',
            'save-btn-title'             => 'Zapisz Plan',
            'general'                    => 'Ogólne',
            'code'                       => 'Kod',
            'name'                       => 'Nazwa',
            'description'                => 'Opis',
            'billing-amount'             => 'Kwota Rozliczeniowa',
            'monthly-amount'             => 'Kwota Miesięczna',
            'yearly-amount'              => 'Kwota Roczna (miesiąc po miesiącu)',
            'plan-limitation'            => 'Ograniczenia Planu',
            'allowed-products'           => 'Dozwolone Produkty',
            'allowed-categories'         => 'Dozwolone Kategorie',
            'allowed-attributes'         => 'Dozwolone Atrybuty',
            'allowed-attribute-families' => 'Dozwolone Rodziny Atrybutów',
            'allowed-channels'           => 'Dozwolone Kanały',
            'allowed-orders'             => 'Dozwolone Zamówienia',
            'name-too-long-error'        => 'Nazwa subskrybenta jest zbyt długa.',
            'description-too-long-error' => 'Opis subskrybenta jest zbyt długi.',
            'payment-cancel'             => 'Anulowano płatność.',
            'generic-error'              => 'Wystąpił błąd, spróbuj ponownie później.',
            'profile-created-success'    => 'Profil cykliczny został pomyślnie utworzony.',
            'assign-plan'                => 'Przypisz Plan',
            'assign'                     => 'Przypisz',
            'plan'                       => 'Plan',
            'period-unit'                => 'Jednostka Okresu',
            'month'                      => 'Miesięcznie',
            'year'                       => 'Rocznie',
            'plan-activated'             => 'Plan został pomyślnie aktywowany.',
            'plan-cancelled-message'     => 'Plan został pomyślnie anulowany.',
            'general-error'              => 'Wystąpił problem, spróbuj ponownie później.',
            'cancel-plan'                => 'Anuluj Plan',
            'cancel-confirm-msg'         => 'Czy na pewno chcesz anulować ten plan?',
            'module-assignment-setting'  => 'Ustawienia Przypisania Modułów',
            'module-assignment-status'   => 'Status Przypisania Modułów',
            'module-assignment'          => 'Przypisanie Modułów',
            'allow-modules'              => 'Zezwalaj na Moduły',
            'offers'                     => 'Oferty',
            'offer-title'                => 'Tytuł',
            'type'                       => 'Typ',
            'price'                      => 'Rabat',
            'offer-status'               => 'Status',
        ],

        'invoices' => [
            'index' => [
                'title'    => 'Faktury Abonamentowe',
                'datagrid' => [
                    'id'             => 'Id',
                    'customer-name'  => 'Nazwa Klienta',
                    'customer-email' => 'Email Klienta',
                    'total'          => 'Suma',
                    'expire-on'      => 'Wygasa',
                    'created-at'     => 'Utworzono',
                    'view'           => 'Zobacz',
                ],
            ],

            'view' => [
                'invoice-and-account'  => 'Faktura i Konto',
                'invoice-id'           => 'Identyfikator Faktury',
                'profile-id'           => 'Identyfikator Profilu',
                'invoice-date'         => 'Data Faktury',
                'invoice-status'       => 'Status Faktury',
                'customer-name'        => 'Nazwa Klienta',
                'customer-email'       => 'Email Klienta',
                'payment-detail'       => 'Szczegóły Płatności',
                'payment-state'        => 'Status Płatności',
                'payment-type'         => 'Typ Płatności',
                'payment-status'       => 'Status Płatności',
                'schedule-description' => 'Opis Harmonogramu',
                'tin'                  => 'NIP',
                'amount'               => 'Kwota',
                'payment-method'       => 'Metoda Płatności',
                'plan-information'     => 'Informacje o Planie',
                'sku'                  => 'SKU',
                'plan'                 => 'Plan',
                'expiration-date'      => 'Data Wygaśnięcia',
                'sub-total'            => 'Suma Częściowa',
                'grand-total'          => 'Suma Ogólna',
            ],
        ],
    ],

    'admin' => [
        'layouts' => [
            'subscription'                        => 'Subskrypcja',
            'overview'                            => 'Przegląd',
            'plans'                               => 'Plany',
            'invoices'                            => 'Faktury',
            'history'                             => 'Historia zakupionych planów',
            'purchase-plan-heading'               => 'Zakup planu, aby kontynuować',
            'purchase-plan-notification'          => 'Prosimy o zakup planu, aby kontynuować korzystanie z usługi.',
            'trial-expired-heading'               => 'Wygasło Twoje darmowe konto',
            'trial-expired-notification'          => 'Twoje darmowe konto wygasło dnia :date. Kliknij poniżej, aby wybrać swój plan.',
            'choose-plan'                         => 'Wybierz Plan',
            'subscription-stopped-heading'        => 'Twoja subskrypcja została zatrzymana',
            'subscription-stopped-notification'   => 'Twoja subskrypcja została zatrzymana dnia :date. Wybierz nowy plan, aby kontynuować usługi. Kliknij poniżej, aby wybrać swój plan.',
            'subscription-suspended-heading'      => 'Twoja subskrypcja została zawieszona',
            'subscription-suspended-notification' => 'Twoja subskrypcja została zawieszona z powodu problemów z przetworzeniem płatności. Skontaktuj się z nami, aby kontynuować usługi lub wybierz nowy plan.',
            'payment-due-heading'                 => 'Termin płatności za subskrypcję',
            'payment-due-notification'            => 'Termin płatności za subskrypcję minął. Zaktualizuj plan, zmień plan lub skontaktuj się z nami, aby kontynuować usługi.',
        ],

        'plans' => [
            'history' => [
                'title'    => 'Historia zakupionych planów',
                'datagrid' => [
                    'title'         => 'Historia zakupionych planów',
                    'id'            => 'Id',
                    'code'          => 'Kod',
                    'name'          => 'Nazwa',
                    'reference-id'  => 'Identyfikator referencyjny',
                    'state'         => 'Stan',
                    'payment-type'  => 'Typ płatności',
                    'period-unit'   => 'Cykl płatności',
                    'amount'        => 'Kwota zapłacona',
                    'next-due-date' => 'Następna data płatności',
                ],
            ],

            'index' => [
                'title'                              => 'Plany subskrypcyjne',
                'allowed-products'                   => ' Produkt(y)',
                'allowed-categories'                 => ' Kategoria(y)',
                'allowed-attributes'                 => ' Atrybut(y)',
                'allowed-attribute-families'         => ' Rodzina/y atrybutów',
                'allowed-channels'                   => ' Kanał(y)',
                'allowed-orders'                     => ' Zamówienie(a)',
                'purchase'                           => 'Kup',
                'plan-description'                   => 'Opłata roczna przy rozliczeniu rocznym lub :amount miesięcznie :-',
                'product-left-notification'          => ':remaining produktów pozostało z :purchased, zaktualizuj swój plan, aby uzyskać więcej produktów.',
                'category-left-notification'         => ':remaining kategorii pozostało z :purchased, zaktualizuj swój plan, aby uzyskać więcej kategorii.',
                'attribute-left-notification'        => ':remaining atrybutów pozostało z :purchased, zaktualizuj swój plan, aby uzyskać więcej atrybutów.',
                'attribute-family-left-notification' => ':remaining rodzin atrybutów pozostało z :purchased, zaktualizuj swój plan, aby uzyskać więcej rodzin atrybutów.',
                'channel-left-notification'          => ':remaining kanałów pozostało z :purchased, zaktualizuj swój plan, aby uzyskać więcej kanałów.',
                'order-left-notification'            => ':remaining zamówień pozostało z :purchased, zaktualizuj swój plan, aby uzyskać więcej zamówień.',
                'resource-limit-error'               => 'Ten plan pozwala tylko na :allowed :entity_name, już utworzyłeś :used :entity_name.',
                'free-plan-activated'                => 'Darmowy plan został pomyślnie aktywowany.',
                'products'                           => 'Produkty',
                'categories'                         => 'Kategorie',
                'attributes'                         => 'Atrybuty',
                'attribute_families'                 => 'Rodziny atrybutów',
                'channels'                           => 'Kanały',
                'orders'                             => 'Zamówienia',
                'allowed-modules'                    => 'Dozwolone moduły :-',
                'no-module-assign'                   => 'Ostrzeżenie: Nie przypisano żadnego modułu do tego planu.',
                'plan-not-available'                 => 'Brak dostępnych planów',
                'not-activated-plans'                => 'Nie masz jeszcze aktywowanych planów.',
                'reference-id'                       => 'Identyfikator referencyjny',
                'state'                              => 'Stan',
                'type'                               => 'Typ',
                'payment-status'                     => 'Status płatności',
                'schedule-description'               => 'Opis harmonogramu',
                'tin'                                => 'NIP',
                'amount'                             => 'Kwota',
                'payment-method'                     => 'Metoda płatności',
                'assigned-plan'                      => 'Twój plan został przypisany.',
                'cancel-plan'                        => 'Twój plan został anulowany.',
                'change-plan'                        => 'Twój plan został zmieniony.',
                'assigned-plan-description'          => 'Nowy plan został przypisany do domeny <b>:domain</b>',
                'cancel-plan-description'            => 'Twój plan został anulowany dla domeny <b>:domain</b>',
                'changed-plan-description'           => 'Twój plan został zmieniony dla domeny <b>:domain</b>',
                'new-plan'                           => ':name (nowy plan)',
                'for-plan'                           => 'Nazwa planu <b>:name</b>',
                'plan-expired'                       => 'Twój plan wygasł',
                'current-plan-expired'               => 'Twój obecny plan wygasł dla domeny <b>:domain</b>',
            ],

            'overview' => [
                'title'                      => 'Plany subskrypcyjne',
                'allowed-products'           => ' Produkt(y)',
                'allowed-categories'         => ' Kategoria(y)',
                'allowed-attributes'         => ' Atrybut(y)',
                'allowed-attribute-families' => ' Rodzina/y atrybutów',
                'allowed-channels'           => ' Kanał(y)',
                'allowed-orders'             => ' Zamówienie(a)',
                'purchase'                   => 'Kup',
                'products'                   => 'Produkty',
                'categories'                 => 'Kategorie',
                'attributes'                 => 'Atrybuty',
                'attribute_families'         => 'Rodziny atrybutów',
                'channels'                   => 'Kanały',
                'orders'                     => 'Zamówienia',
                'allowed-modules'            => 'Dozwolone moduły :-',
                'no-module-assign'           => 'Ostrzeżenie: Nie przypisano żadnego modułu do tego planu.',
                'plan-not-available'         => 'Brak dostępnych planów',
                'not-activated-plans'        => 'Nie masz jeszcze aktywowanych planów.',
                'reference-id'               => 'Identyfikator referencyjny',
                'state'                      => 'Stan',
                'type'                       => 'Typ',
                'payment-status'             => 'Status płatności',
                'schedule-description'       => 'Opis harmonogramu',
                'tin'                        => 'NIP',
                'amount'                     => 'Kwota',
                'payment-method'             => 'Metoda płatności',
                'title'                      => 'Przegląd planu',
                'plan-info'                  => 'Informacje o planie',
                'plan'                       => 'Plan',
                'plan-name'                  => ':plan - (Testowy)',
                'expiration-date'            => 'Data wygaśnięcia',
                'billing-amount'             => 'Kwota rozliczenia',
                'billing-cycle'              => 'Cykl rozliczenia',
                'monthly'                    => 'Miesięcznie',
                'annual'                     => 'Rocznie',
                'profile-id'                 => 'Identyfikator profilu',
                'profile-status'             => 'Status profilu',
                'next-billing-date'          => 'Następna data rozliczenia',
                'profile-state'              => 'Stan profilu',
                'payment-status'             => 'Status płatności',
                'features'                   => 'Funkcje',
                'assign-modules'             => 'Przypisane moduły sekcji',
                'info-assign-modules'        => 'Przypisane moduły',
                'text-bagisto'               => 'Bagisto :extension Rozszerzenie',
                'payment-details'            => 'Szczegóły płatności',
                'offer'                      => [
                    'title' => 'Tytuł',
                    'type'  => 'Typ zniżki',
                    'price' => 'Cena',
                ],
            ],
        ],

        'checkout' => [
            'title'                     => 'Zamówienie',
            'billing-address'           => 'Adres rozliczeniowy',
            'tin'                       => 'NIP',
            'first-name'                => 'Imię',
            'last-name'                 => 'Nazwisko',
            'email'                     => 'Email',
            'address1'                  => 'Adres 1',
            'address2'                  => 'Adres 2',
            'city'                      => 'Miasto',
            'postcode'                  => 'Kod pocztowy',
            'state'                     => 'Województwo',
            'select-state'              => 'Wybierz województwo/region',
            'country'                   => 'Kraj',
            'payment-information'       => 'Informacje o płatności',
            'summary'                   => 'Podsumowanie',
            'billing-cycle'             => 'Cykl rozliczeniowy',
            'month'                     => 'Miesiąc',
            'year'                      => 'Rok',
            'annual'                    => 'Rocznie',
            'plan'                      => 'Plan',
            'subtotal'                  => 'Podsumowanie (z podatkami)',
            'plan-option-label-monthly' => ':plan - :amount miesięcznie',
            'plan-option-label-yearly'  => ':plan - :amount rocznie',
            'success-activated-plan'    => 'Sukces: :plan_name został pomyślnie aktywowany.',
        ],

        'invoices' => [
            'title' => 'Faktury',
            'view'  => [
                'id'                   => 'Identyfikator',
                'plan'                 => 'Plan',
                'customer-name'        => 'Nazwa klienta',
                'invoice-and-account'  => 'Faktura i konto',
                'invoice-id'           => 'Identyfikator faktury',
                'profile-id'           => 'Identyfikator profilu',
                'invoice-date'         => 'Data faktury',
                'invoice-status'       => 'Status faktury',
                'customer-email'       => 'Email klienta',
                'reference-id'         => 'Identyfikator referencyjny',
                'plan-state'           => 'Stan planu',
                'plan-type'            => 'Typ planu',
                'payment-status'       => 'Status płatności',
                'payment-detail'       => 'Szczegóły płatności',
                'payment-type'         => 'Typ płatności',
                'schedule-description' => 'Opis harmonogramu',
                'tin'                  => 'NIP',
                'amount'               => 'Kwota',
                'payment-method'       => 'Metoda płatności',
                'plan-info'            => 'Informacje o planie',
                'sku'                  => 'SKU',
                'expiration-date'      => 'Data ważności',
                'sub-total'            => 'Suma częściowa',
                'grand-total'          => 'Suma całkowita',
            ],

            'datagrid' => [
                'id'             => 'Identyfikator',
                'customer-name'  => 'Nazwa klienta',
                'customer-email' => 'Email klienta',
                'total'          => 'Suma',
                'expire-on'      => 'Wygasa',
                'created-at'     => 'Utworzono',
                'view'           => 'Pokaż',
            ],
        ],
    ],
];