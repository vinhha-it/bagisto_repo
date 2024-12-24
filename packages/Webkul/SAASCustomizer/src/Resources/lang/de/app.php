<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'Version : :version',
                'account-title' => 'Konto',
                'logout'        => 'Ausloggen',
                'my-account'    => 'Mein Konto',
                'visit-shop'    => 'Shop besuchen',
            ],
    
            'sidebar' => [
                'tenants'          => 'Mieter',
                'tenant-customers' => 'Kunden',
                'tenant-products'  => 'Produkte',
                'tenant-orders'    => 'Bestellungen',
                'settings'         => 'Einstellungen',
                'agents'           => 'Agenten',
                'roles'            => 'Rollen',
                'locales'          => 'Sprachen',
                'currencies'       => 'Währungen',
                'channels'         => 'Kanäle',
                'exchange-rates'   => 'Wechselkurse',
                'themes'           => 'Themen',
                'cms'              => 'CMS',
                'configurations'   => 'Konfigurationen',
                'general'          => 'Allgemein',
                'send-email'       => 'E-Mail senden',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'Mieter',
            'create'         => 'Hinzufügen',
            'edit'           => 'Bearbeiten',
            'delete'         => 'Löschen',
            'cancel'         => 'Abbrechen',
            'view'           => 'Ansehen',
            'mass-delete'    => 'Massenlöschung',
            'mass-update'    => 'Massenaktualisierung',
            'customers'      => 'Kunden',
            'products'       => 'Produkte',
            'orders'         => 'Bestellungen',
            'settings'       => 'Einstellungen',
            'agents'         => 'Agenten',
            'roles'          => 'Rollen',
            'locales'        => 'Sprachen',
            'currencies'     => 'Währungen',
            'exchange-rates' => 'Wechselkurse',
            'channels'       => 'Kanäle',
            'themes'         => 'Themen',
            'send-email'     => 'E-Mail senden',
            'cms'            => 'CMS',
            'configuration'  => 'Konfiguration',
            'download'       => 'Herunterladen',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => 'Super-Admin-Anmeldung',
                'email'                => 'E-Mail-Adresse',
                'password'             => 'Passwort',
                'btn-submit'           => 'Anmelden',
                'forget-password-link' => 'Passwort vergessen?',
                'submit-btn'           => 'Anmelden',
                'login-success'        => 'Erfolg: Sie haben sich erfolgreich angemeldet.',
                'login-error'          => 'Bitte überprüfen Sie Ihre Anmeldeinformationen und versuchen Sie es erneut.',
                'activate-warning'     => 'Ihr Konto muss noch aktiviert werden. Bitte kontaktieren Sie den Administrator.',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'Passwort vergessen',
                    'title'           => 'Passwort wiederherstellen',
                    'email'           => 'Registrierte E-Mail',
                    'reset-link-sent' => 'Link zum Zurücksetzen des Passworts gesendet',
                    'sign-in-link'    => 'Zurück zur Anmeldung?',
                    'email-not-exist' => 'E-Mail existiert nicht',
                    'submit-btn'      => 'Zurücksetzen',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'Passwort zurücksetzen',
                'back-link-title'  => 'Zurück zur Anmeldung?',
                'confirm-password' => 'Passwort bestätigen',
                'email'            => 'Registrierte E-Mail',
                'password'         => 'Passwort',
                'submit-btn'       => 'Passwort zurücksetzen',
            ],
        ],

        'tenants' => [
            'index' => [
                'title'        => 'Mieterliste',
                'register-btn' => 'Mieter registrieren',
        
                'create' => [
                    'title'             => 'Mieter erstellen',
                    'first-name'        => 'Vorname',
                    'last-name'         => 'Nachname',
                    'user-name'         => 'Benutzername',
                    'organization-name' => 'Organisationsname',
                    'phone'             => 'Telefon',
                    'email'             => 'E-Mail',
                    'password'          => 'Passwort',
                    'confirm-password'  => 'Passwort bestätigen',
                    'save-btn'          => 'Mieter speichern',
                    'back-btn'          => 'Zurück',
                ],
        
                'datagrid' => [
                    'id'                  => 'Id',
                    'user-name'           => 'Benutzername',
                    'organization'        => 'Organisation',
                    'domain'              => 'Domäne',
                    'cname'               => 'Cname',
                    'status'              => 'Status',
                    'active'              => 'Aktiv',
                    'disable'             => 'Deaktivieren',
                    'view'                => 'Einblicke anzeigen',
                    'edit'                => 'Mieter bearbeiten',
                    'delete'              => 'Mieter entfernen',
                    'mass-delete'         => 'Massenlöschung',
                    'mass-delete-success' => 'Ausgewählte Mieter erfolgreich gelöscht',
                ],
            ],
        
            'edit' => [
                'title'             => 'Mieter bearbeiten',
                'first-name'        => 'Vorname',
                'last-name'         => 'Nachname',
                'user-name'         => 'Benutzername',
                'cname'             => 'Cname',
                'organization-name' => 'Organisationsname',
                'phone'             => 'Telefon',
                'status'            => 'Status',
                'email'             => 'E-Mail',
                'password'          => 'Passwort',
                'confirm-password'  => 'Passwort bestätigen',
                'save-btn'          => 'Mieter speichern',
                'back-btn'          => 'Zurück',
                'general'           => 'Allgemein',
                'settings'          => 'Einstellungen',
            ],
        
            'view' => [
                'title'                        => 'Einblicke des Mieters',
                'heading'                      => 'Mieter - :tenant_name',
                'email-address'                => 'E-Mail-Adresse',
                'phone'                        => 'Telefon',
                'domain-information'           => 'Domäneninformationen',
                'mapped-domain'                => 'Zugeordnete Domäne',
                'cname-information'            => 'Cname-Informationen',
                'cname-entry'                  => 'Cname-Eintrag',
                'attribute-information'        => 'Attributinformationen',
                'no-of-attributes'             => 'Anzahl der Attribute',
                'attribute-family-information' => 'Attributfamilieninformationen',
                'no-of-attribute-families'     => 'Anzahl der Attributfamilien',
                'product-information'          => 'Produktinformationen',
                'no-of-products'               => 'Anzahl der Produkte',
                'customer-information'         => 'Kundeninformationen',
                'no-of-customers'              => 'Anzahl der Kunden',
                'customer-group-information'   => 'Kundengruppeninformationen',
                'no-of-customer-groups'        => 'Anzahl der Kundengruppen',
                'category-information'         => 'Kategorieninformationen',
                'no-of-categories'             => 'Anzahl der Kategorien',
                'addresses'                    => 'Adressliste (:count)',
                'empty-title'                  => 'Adresse des Mieters hinzufügen',
            ],
        
            'create-success' => 'Mieter erfolgreich erstellt',
            'delete-success' => 'Mieter erfolgreich gelöscht',
            'delete-failed'  => 'Löschen des Mieters fehlgeschlagen',
            'product-copied' => 'Mieter erfolgreich kopiert',
            'update-success' => 'Mieter erfolgreich aktualisiert',
        
            'customers' => [
                'index' => [
                    'title' => 'Kundenliste',
        
                    'datagrid' => [
                        'id'             => 'Id',
                        'domain'         => 'Domäne',
                        'customer-name'  => 'Kundenname',
                        'email'          => 'E-Mail',
                        'customer-group' => 'Kundengruppe',
                        'phone'          => 'Telefon',
                        'status'         => 'Status',
                        'active'         => 'Aktiv',
                        'inactive'       => 'Inaktiv',
                        'is-suspended'   => 'Ausgesetzt',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => 'Produktliste',
        
                    'datagrid' => [
                        'id'               => 'Id',
                        'domain'           => 'Domäne',
                        'name'             => 'Name',
                        'sku'              => 'SKU',
                        'attribute-family' => 'Attributfamilie',
                        'image'            => 'Bild',
                        'price'            => 'Preis',
                        'qty'              => 'Menge',
                        'status'           => 'Status',
                        'active'           => 'Aktiv',
                        'inactive'         => 'Inaktiv',
                        'category'         => 'Kategorie',
                        'type'             => 'Typ',
                    ],
                ],
            ],
        
            'orders' => [
                'index' => [
                    'title' => 'Bestellungsliste',
        
                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => 'Bestellungs-ID',
                        'domain'          => 'Domäne',
                        'sub-total'       => 'Zwischensumme',
                        'grand-total'     => 'Gesamtsumme',
                        'order-date'      => 'Bestelldatum',
                        'channel-name'    => 'Kanalname',
                        'status'          => 'Status',
                        'processing'      => 'Verarbeitung',
                        'completed'       => 'Abgeschlossen',
                        'canceled'        => 'Abgebrochen',
                        'closed'          => 'Geschlossen',
                        'pending'         => 'Ausstehend',
                        'pending-payment' => 'Ausstehende Zahlung',
                        'fraud'           => 'Betrug',
                        'customer'        => 'Kunde',
                        'email'           => 'E-Mail',
                        'location'        => 'Ort',
                        'images'          => 'Bilder',
                        'pay-by'          => 'Bezahlt von - ',
                        'pay-via'         => 'Bezahlt über',
                        'date'            => 'Datum',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'Agentenliste',
                    'register-btn' => 'Agent erstellen',
            
                    'create' => [
                        'title'             => 'Agent erstellen',
                        'first-name'        => 'Vorname',
                        'last-name'         => 'Nachname',
                        'email'             => 'E-Mail',
                        'current-password'  => 'Aktuelles Passwort',
                        'password'          => 'Passwort',
                        'confirm-password'  => 'Passwort bestätigen',
                        'role'              => 'Rolle',
                        'select'            => 'Auswählen',
                        'status'            => 'Status',
                        'save-btn'          => 'Speichern',
                        'back-btn'          => 'Zurück',
                        'upload-image-info' => 'Laden Sie ein Profilbild (110px X 110px) im PNG- oder JPG-Format hoch',
                    ],
            
                    'edit' => [
                        'title' => 'Agent bearbeiten',
                    ],
            
                    'datagrid' => [
                        'id'      => 'ID',
                        'name'    => 'Name',
                        'email'   => 'E-Mail',
                        'role'    => 'Rolle',
                        'status'  => 'Status',
                        'active'  => 'Aktiv',
                        'disable' => 'Deaktivieren',
                        'actions' => 'Aktionen',
                        'edit'    => 'Bearbeiten',
                        'delete'  => 'Löschen',
                    ],
                ],
            
                'create-success'             => 'Erfolg: Super-Admin-Agent erfolgreich erstellt',
                'delete-success'             => 'Agent erfolgreich gelöscht',
                'delete-failed'              => 'Agent löschen fehlgeschlagen',
                'cannot-change'              => 'Der Name des Agenten \':name\' kann nicht geändert werden',
                'product-copied'             => 'Agent erfolgreich kopiert',
                'update-success'             => 'Agent erfolgreich aktualisiert',
                'invalid-password'           => 'Das eingegebene aktuelle Passwort ist falsch',
                'last-delete-error'          => 'Warnung: Mindestens ein Super-Admin-Agent ist erforderlich',
                'login-delete-error'         => 'Warnung: Sie können Ihr eigenes Konto nicht löschen.',
                'administrator-delete-error' => 'Warnung: Mindestens ein Super-Admin-Agent mit Administratorzugriff ist erforderlich',
            ],
            
            'roles' => [
                'index' => [
                    'title'      => 'Rollenliste',
                    'create-btn' => 'Rolle erstellen',
            
                    'datagrid' => [
                        'id'              => 'ID',
                        'name'            => 'Name',
                        'permission-type' => 'Berechtigungstyp',
                        'actions'         => 'Aktionen',
                        'edit'            => 'Bearbeiten',
                        'delete'          => 'Löschen',
                    ],
                ],
            
                'create' => [
                    'access-control' => 'Zugriffskontrolle',
                    'all'            => 'Alle',
                    'back-btn'       => 'Zurück',
                    'custom'         => 'Benutzerdefiniert',
                    'description'    => 'Beschreibung',
                    'general'        => 'Allgemein',
                    'name'           => 'Name',
                    'permissions'    => 'Berechtigungen',
                    'save-btn'       => 'Speichern',
                    'title'          => 'Rolle erstellen',
                ],
            
                'edit' => [
                    'access-control' => 'Zugriffskontrolle',
                    'all'            => 'Alle',
                    'back-btn'       => 'Zurück',
                    'custom'         => 'Benutzerdefiniert',
                    'description'    => 'Beschreibung',
                    'general'        => 'Allgemein',
                    'name'           => 'Name',
                    'permissions'    => 'Berechtigungen',
                    'save-btn'       => 'Speichern',
                    'title'          => 'Rolle bearbeiten',
                ],
            
                'being-used'        => 'Rolle wird bereits von einem anderen Agenten verwendet',
                'last-delete-error' => 'Letzte Rolle kann nicht gelöscht werden',
                'create-success'    => 'Rolle erfolgreich erstellt',
                'delete-success'    => 'Rolle erfolgreich gelöscht',
                'delete-failed'     => 'Löschen der Rolle fehlgeschlagen',
                'update-success'    => 'Rolle erfolgreich aktualisiert',
            ],
            
            'locales' => [
                'index' => [
                    'title'      => 'Sprachumgebungen',
                    'create-btn' => 'Sprachumgebung erstellen',
            
                    'create' => [
                        'title'            => 'Sprachumgebung erstellen',
                        'code'             => 'Code',
                        'name'             => 'Name',
                        'direction'        => 'Richtung',
                        'select-direction' => 'Richtung auswählen',
                        'text-ltr'         => 'Links nach rechts (LTR)',
                        'text-rtl'         => 'Rechts nach links (RTL)',
                        'locale-logo'      => 'Sprachumgebungslogo',
                        'logo-size'        => 'Bildauflösung sollte 24px x 16px sein',
                        'save-btn'         => 'Speichern',
                    ],
            
                    'edit' => [
                        'title'     => 'Sprachumgebung bearbeiten',
                        'code'      => 'Code',
                        'name'      => 'Name',
                        'direction' => 'Richtung',
                    ],
            
                    'datagrid' => [
                        'id'        => 'ID',
                        'code'      => 'Code',
                        'name'      => 'Name',
                        'direction' => 'Richtung',
                        'text-ltr'  => 'Links nach rechts (LTR)',
                        'text-rtl'  => 'Rechts nach links (RTL)',
                        'actions'   => 'Aktionen',
                        'edit'      => 'Bearbeiten',
                        'delete'    => 'Löschen',
                    ],
                ],

                'being-used'        => ':locale_name wird als Standardsprache im Kanal verwendet',
                'create-success'    => 'Sprachumgebung erfolgreich erstellt.',
                'update-success'    => 'Sprachumgebung erfolgreich aktualisiert.',
                'delete-success'    => 'Sprachumgebung erfolgreich gelöscht.',
                'delete-failed'     => 'Löschen der Sprachumgebung fehlgeschlagen',
                'last-delete-error' => 'Mindestens eine Super-Admin-Sprachumgebung ist erforderlich.',
            ],

            'currencies' => [
                'index' => [
                    'title'      => 'Währungsliste',
                    'create-btn' => 'Währung erstellen',
            
                    'create' => [
                        'title'    => 'Währung erstellen',
                        'code'     => 'Code',
                        'name'     => 'Name',
                        'symbol'   => 'Symbol',
                        'decimal'  => 'Dezimal',
                        'save-btn' => 'Währung speichern',
                    ],
            
                    'edit' => [
                        'title'    => 'Währung bearbeiten',
                        'code'     => 'Code',
                        'name'     => 'Name',
                        'symbol'   => 'Symbol',
                        'decimal'  => 'Dezimal',
                        'save-btn' => 'Währung speichern',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Id',
                        'code'    => 'Code',
                        'name'    => 'Name',
                        'actions' => 'Aktionen',
                        'edit'    => 'Bearbeiten',
                        'delete'  => 'Löschen',
                    ],
                ],
            
                'create-success'      => 'Währung erfolgreich erstellt.',
                'update-success'      => 'Währung erfolgreich aktualisiert.',
                'delete-success'      => 'Währung erfolgreich gelöscht.',
                'delete-failed'       => 'Währung löschen fehlgeschlagen',
                'last-delete-error'   => 'Mindestens eine Super-Admin-Währung ist erforderlich.',
                'mass-delete-success' => 'Ausgewählte Währungen erfolgreich gelöscht',
            ],
            
            'exchange-rates' => [
                'index' => [
                    'title'        => 'Wechselkurse',
                    'create-btn'   => 'Wechselkurs erstellen',
                    'update-rates' => 'Kurse aktualisieren',
            
                    'create' => [
                        'title'                  => 'Wechselkurs erstellen',
                        'source-currency'        => 'Ausgangswährung',
                        'target-currency'        => 'Zielwährung',
                        'select-target-currency' => 'Zielwährung auswählen',
                        'rate'                   => 'Kurs',
                        'save-btn'               => 'Wechselkurs speichern',
                    ],
            
                    'edit' => [
                        'title'           => 'Wechselkurs bearbeiten',
                        'source-currency' => 'Ausgangswährung',
                        'target-currency' => 'Zielwährung',
                        'rate'            => 'Kurs',
                        'save-btn'        => 'Wechselkurs speichern',
                    ],
            
                    'datagrid' => [
                        'id'            => 'Id',
                        'currency-name' => 'Währungsname',
                        'exchange-rate' => 'Wechselkurs',
                        'actions'       => 'Aktionen',
                        'edit'          => 'Bearbeiten',
                        'delete'        => 'Löschen',
                    ],
                ],
            
                'create-success' => 'Wechselkurs erfolgreich erstellt.',
                'update-success' => 'Wechselkurs erfolgreich aktualisiert.',
                'delete-success' => 'Wechselkurs erfolgreich gelöscht.',
                'delete-failed'  => 'Wechselkurs löschen fehlgeschlagen',
            ],
            
            'channels' => [
                'index' => [
                    'title' => 'Kanäle',
            
                    'datagrid' => [
                        'id'      => 'Id',
                        'code'    => 'Code',
                        'name'    => 'Name',
                        'hostname'=> 'Host Name',
                        'actions' => 'Aktionen',
                        'edit'    => 'Bearbeiten',
                        'delete'  => 'Löschen',
                    ],
                ],
            
                'edit' => [
                    'title'                  => 'Kanal bearbeiten',
                    'back-btn'               => 'Zurück',
                    'save-btn'               => 'Kanal speichern',
                    'general'                => 'Allgemein',
                    'code'                   => 'Code',
                    'name'                   => 'Name',
                    'description'            => 'Beschreibung',
                    'hostname'               => 'Hostname',
                    'hostname-placeholder'   => 'https://www.example.com (Fügen Sie am Ende keinen Schrägstrich hinzu.)',
                    'design'                 => 'Design',
                    'theme'                  => 'Thema',
                    'logo'                   => 'Logo',
                    'logo-size'              => 'Bildauflösung sollte etwa 192px X 50px sein',
                    'favicon'                => 'Favicon',
                    'favicon-size'           => 'Bildauflösung sollte etwa 16px X 16px sein',
                    'seo'                    => 'SEO für Startseite',
                    'seo-title'              => 'Meta-Titel',
                    'seo-description'        => 'Meta-Beschreibung',
                    'seo-keywords'           => 'Meta-Schlüsselwörter',
                    'currencies-and-locales' => 'Währungen und Sprachversionen',
                    'locales'                => 'Sprachversionen',
                    'default-locale'         => 'Standard-Sprachversion',
                    'currencies'             => 'Währungen',
                    'default-currency'       => 'Standardwährung',
                    'last-delete-error'      => 'Mindestens ein Kanal ist erforderlich.',
                    'settings'               => 'Einstellungen',
                    'status'                 => 'Status',
                    'update-success'         => 'Kanal erfolgreich aktualisiert',
                ],
            
                'update-success' => 'Kanal erfolgreich aktualisiert.',
                'delete-success' => 'Kanal erfolgreich gelöscht.',
                'delete-failed'  => 'Kanal löschen fehlgeschlagen',
            ],

            'themes' => [
                'index' => [
                    'create-btn' => 'Thema erstellen',
                    'title'      => 'Themen',
            
                    'datagrid' => [
                        'active'       => 'Aktiv',
                        'channel_name' => 'Kanalname',
                        'delete'       => 'Löschen',
                        'inactive'     => 'Inaktiv',
                        'id'           => 'ID',
                        'name'         => 'Name',
                        'status'       => 'Status',
                        'sort-order'   => 'Sortierreihenfolge',
                        'type'         => 'Typ',
                        'view'         => 'Anzeigen',
                    ],
                ],
            
                'create' => [
                    'name'       => 'Name',
                    'save-btn'   => 'Thema speichern',
                    'sort-order' => 'Sortierreihenfolge',
                    'title'      => 'Thema erstellen',
            
                    'type' => [
                        'category-carousel' => 'Kategorie Karussell',
                        'footer-links'      => 'Fußzeilen-Links',
                        'image-carousel'    => 'Bild Karussell',
                        'product-carousel'  => 'Produkt Karussell',
                        'static-content'    => 'Statischer Inhalt',
                        'title'             => 'Typ',
                    ],
                ],
            
                'edit' => [
                    'add-image-btn'                 => 'Bild hinzufügen',
                    'add-filter-btn'                => 'Filter hinzufügen',
                    'add-footer-link-btn'           => 'Fußzeilen-Link hinzufügen',
                    'add-link'                      => 'Link hinzufügen',
                    'asc'                           => 'Aufsteigend',
                    'back'                          => 'Zurück',
                    'category-carousel-description' => 'Zeigen Sie dynamische Kategorien attraktiv mit einem responsiven Kategorie-Karussell an.',
                    'category-carousel'             => 'Kategorie Karussell',
                    'create-filter'                 => 'Filter erstellen',
                    'css'                           => 'CSS',
                    'column'                        => 'Spalte',
                    'channels'                      => 'Kanäle',
                    'desc'                          => 'Absteigend',
                    'delete'                        => 'Löschen',
                    'edit'                          => 'Bearbeiten',
                    'footer-title'                  => 'Titel',
                    'footer-link'                   => 'Fußzeilen-Links',
                    'footer-link-form-title'        => 'Fußzeilen-Link',
                    'filter-title'                  => 'Titel',
                    'filters'                       => 'Filter',
                    'footer-link-description'       => 'Navigieren Sie über Fußzeilen-Links für nahtlose Website-Erkundungen und Informationen.',
                    'general'                       => 'Allgemein',
                    'html'                          => 'HTML',
                    'image'                         => 'Bild',
                    'image-size'                    => 'Bildauflösung sollte (1920px X 700px) sein',
                    'image-title'                   => 'Bildtitel',
                    'image-upload-message'          => 'Nur Bilder (.jpeg, .jpg, .png, .webp, ..) sind erlaubt.',
                    'key'                           => 'Schlüssel: :key',
                    'key-input'                     => 'Schlüssel',
                    'link'                          => 'Link',
                    'limit'                         => 'Limit',
                    'name'                          => 'Name',
                    'product-carousel'              => 'Produkt Karussell',
                    'product-carousel-description'  => 'Präsentieren Sie Produkte elegant mit einem dynamischen und responsiven Produkt-Karussell.',
                    'path'                          => 'Pfad',
                    'preview'                       => 'Vorschau',
                    'slider'                        => 'Schieberegler',
                    'static-content-description'    => 'Verbessern Sie die Bindung mit präzisen, informativen statischen Inhalten für Ihr Publikum.',
                    'static-content'                => 'Statischer Inhalt',
                    'slider-description'            => 'Schieberegler-bezogene Theme-Anpassungen.',
                    'slider-required'               => 'Schiebereglerfeld ist erforderlich.',
                    'slider-add-btn'                => 'Schieberegler hinzufügen',
                    'save-btn'                      => 'Speichern',
                    'sort'                          => 'Sortieren',
                    'sort-order'                    => 'Sortierreihenfolge',
                    'status'                        => 'Status',
                    'slider-image'                  => 'Schiebereglerbild',
                    'select'                        => 'Auswählen',
                    'title'                         => 'Thema bearbeiten',
                    'update-slider'                 => 'Schieberegler aktualisieren',
                    'url'                           => 'URL',
                    'value-input'                   => 'Wert',
                    'value'                         => 'Wert: :value',
            
                    'services-content' => [
                        'add-btn'            => 'Dienste hinzufügen',
                        'channels'           => 'Kanäle',
                        'delete'             => 'Löschen',
                        'description'        => 'Beschreibung',
                        'general'            => 'Allgemein',
                        'name'               => 'Name',
                        'save-btn'           => 'Speichern',
                        'service-icon'       => 'Dienstsymbol',
                        'service-icon-class' => 'Dienstsymbol-Klasse',
                        'service-info'       => 'Dienstbezogene Theme-Anpassungen.',
                        'services'           => 'Dienste',
                        'sort-order'         => 'Sortierreihenfolge',
                        'status'             => 'Status',
                        'title'              => 'Titel',
                        'update-service'     => 'Dienste aktualisieren',
                    ],
                ],
            
                'create-success' => 'Thema erfolgreich erstellt',
                'delete-success' => 'Thema erfolgreich gelöscht',
                'update-success' => 'Thema erfolgreich aktualisiert',
                'delete-failed'  => 'Fehler beim Löschen des Themeninhalts aufgetreten.',
            ],
            
            'email' => [
                'create' => [
                    'send-btn'                  => 'E-Mail senden',
                    'back-btn'                  => 'Zurück',
                    'title'                     => 'E-Mail senden',
                    'general'                   => 'Allgemein',
                    'body'                      => 'Nachrichtentext',
                    'subject'                   => 'Betreff',
                    'dear'                      => 'Sehr geehrter :agent_name',
                    'agent-registration'        => 'Saas Agent erfolgreich registriert',
                    'summary'                   => 'Ihr Konto wurde erstellt. Ihre Kontodetails sind wie folgt:',
                    'saas-url'                  => 'Domain',
                    'email'                     => 'E-Mail',
                    'password'                  => 'Passwort',
                    'sign-in'                   => 'Anmelden',
                    'thanks'                    => 'Vielen Dank!',
                    'send-email-to-all-tenants' => 'E-Mail an alle Mieter senden',
                ],
            
                'send-success' => 'E-Mail erfolgreich gesendet.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'CMS Seitenliste',
                'create-btn' => 'Seite erstellen',
        
                'datagrid' => [
                    'id'                  => 'Id',
                    'page-title'          => 'Seitentitel',
                    'url-key'             => 'URL Schlüssel',
                    'status'              => 'Status',
                    'active'              => 'Aktiv',
                    'disable'             => 'Deaktivieren',
                    'edit'                => 'Seite bearbeiten',
                    'delete'              => 'Seite entfernen',
                    'mass-delete'         => 'Massenlöschung',
                    'mass-delete-success' => 'Ausgewählte CMS Seiten erfolgreich gelöscht',
                ],
            ],
        
            'create'  => [
                'title'            => 'CMS Seite erstellen',
                'first-name'       => 'Vorname',
                'general'          => 'Allgemein',
                'page-title'       => 'Titel',
                'channels'         => 'Kanäle',
                'content'          => 'Inhalt',
                'meta-keywords'    => 'Meta-Schlüsselwörter',
                'meta-description' => 'Meta-Beschreibung',
                'meta-title'       => 'Meta-Titel',
                'seo'              => 'SEO',
                'url-key'          => 'URL Schlüssel',
                'description'      => 'Beschreibung',
                'save-btn'         => 'CMS Seite speichern',
                'back-btn'         => 'Zurück',
            ],
        
            'edit' => [
                'title'            => 'Seite bearbeiten',
                'preview-btn'      => 'Vorschau der Seite',
                'save-btn'         => 'Seite speichern',
                'general'          => 'Allgemein',
                'page-title'       => 'Seitentitel',
                'back-btn'         => 'Zurück',
                'channels'         => 'Kanäle',
                'content'          => 'Inhalt',
                'seo'              => 'SEO',
                'meta-keywords'    => 'Meta-Schlüsselwörter',
                'meta-description' => 'Meta-Beschreibung',
                'meta-title'       => 'Meta-Titel',
                'url-key'          => 'URL Schlüssel',
                'description'      => 'Beschreibung',
            ],
        
            'create-success' => 'CMS erfolgreich erstellt.',
            'delete-success' => 'CMS erfolgreich gelöscht.',
            'update-success' => 'CMS erfolgreich aktualisiert.',
            'no-resource'    => 'Ressource existiert nicht.',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => 'Löschen',
                'enable-at-least-one-shipping' => 'Aktivieren Sie mindestens eine Versandmethode.',
                'enable-at-least-one-payment'  => 'Aktivieren Sie mindestens eine Zahlungsmethode.',
                'save-btn'                     => 'Konfiguration speichern',
                'save-message'                 => 'Konfiguration erfolgreich gespeichert',
                'title'                        => 'Konfiguration',
        
                'general' => [
                    'info'  => 'Layout- und E-Mail-Details verwalten',
                    'title' => 'Allgemein',
        
                    'design' => [
                        'info'  => 'Logo und Favicon-Symbol festlegen.',
                        'title' => 'Design',
        
                        'super' => [
                            'info'          => 'Das Super-Admin-Logo ist das charakteristische Bild oder Emblem, das die Administrations-Schnittstelle eines Systems oder einer Website darstellt, oft anpassbar.',
                            'admin-logo'    => 'Admin Logo',
                            'logo-image'    => 'Logo Bild',
                            'favicon-image' => 'Favicon Bild',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => 'E-Mail-Adresse für Super-Admin festlegen.',
                        'title' => 'Super Agent',
        
                        'super' => [
                            'info'          => 'E-Mail-Adresse für den Super-Admin festlegen, um die E-Mail-Benachrichtigungen zu erhalten',
                            'email-address' => 'E-Mail-Adresse',
                        ],
        
                        'social-connect' => [
                            'title'    => 'Soziale Verbindung',
                            'info'     => 'Soziale Medienplattformen bieten Möglichkeiten für direkte Interaktion mit Ihrem Publikum durch Kommentare, Likes und Shares, fördern Engagement und den Aufbau einer Community rund um Ihre Marke.',
                            'facebook' => 'Facebook',
                            'twitter'  => 'Twitter',
                            'linkedin' => 'Linkedin',
                        ],
                    ],
        
                    'content' => [
                        'info'  => 'Kopf- und Fußzeileninformationen für das Layout der Mieterregistrierung festlegen.',
                        'title' => 'Inhalt',
        
                        'footer' => [
                            'info'           => 'Den Fußzeilentext festlegen',
                            'title'          => 'Fußzeile',
                            'footer-content' => 'Fußzeilentext',
                            'footer-toggle'  => 'Fußzeile umschalten',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => 'Verkaufs-, Versand- und Zahlungsmethodendetails verwalten',
                    'title' => 'Verkäufe',
        
                    'shipping-methods' => [
                        'info'  => 'Versandmethodeninformationen festlegen',
                        'title' => 'Versandmethoden',
                    ],
        
                    'payment-methods' => [
                        'info'  => 'Zahlungsmethodeninformationen festlegen',
                        'title' => 'Zahlungsmethoden',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => 'Aktivieren Sie mindestens eine Versandmethode.',
            'enable-at-least-one-payment'  => 'Aktivieren Sie mindestens eine Zahlungsmethode.',
            'save-message'                 => 'Erfolg: Super Admin-Konfiguration erfolgreich gespeichert.',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'Als Mieter registrieren',
            ],
    
            'footer' => [
                'footer-text'     => '© Urheberrecht 2010 - 2023, Webkul Software (Registriert in Indien). Alle Rechte vorbehalten.',
                'connect-with-us' => 'Verbinde dich mit uns',
                'text-locale'     => 'Standort',
                'text-currency'   => 'Währung',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => 'Händlerregistrierung',
            'step-1'              => 'Schritt 1',
            'auth-cred'           => 'Authentifizierungsanmeldeinformationen',
            'email'               => 'E-Mail',
            'phone'               => 'Telefon',
            'username'            => 'Benutzername',
            'password'            => 'Passwort',
            'cpassword'           => 'Passwort bestätigen',
            'continue'            => 'Fortsetzen',
            'step-2'              => 'Schritt 2',
            'personal'            => 'Persönliche Angaben',
            'first-name'          => 'Vorname',
            'last-name'           => 'Nachname',
            'step-3'              => 'Schritt 3',
            'org-details'         => 'Organisationsdetails',
            'org-name'            => 'Organisationsname',
            'company-activated'   => 'Erfolg: Unternehmen erfolgreich aktiviert.',
            'company-deactivated' => 'Erfolg: Unternehmen erfolgreich deaktiviert.',
            'company-updated'     => 'Erfolg: Unternehmen erfolgreich aktualisiert.',
            'something-wrong'     => 'Warnung: Etwas ist schief gelaufen.',
            'store-created'       => 'Erfolg: Geschäft erfolgreich erstellt.',
            'something-wrong-1'   => 'Warnung: Etwas ist schief gelaufen. Bitte versuchen Sie es später erneut.',
            'content'             => 'Werden Sie Händler und erstellen Sie Ihren eigenen Shop problemlos, ohne sich Gedanken über die Installation und Verwaltung des Servers machen zu müssen. Sie müssen sich nur anmelden, Produktinformationen hochladen und Ihren E-Commerce-Shop erhalten. Das Laravel Multi-Company SaaS-Modul bietet einfache Anpassungsmöglichkeiten. Das bedeutet, dass Händler ihrem Shop problemlos zusätzliche Funktionen und Funktionalitäten hinzufügen oder ihn problemlos erweitern können.',
    
            'right-panel' => [
                'heading'    => 'So richten Sie ein Händlerkonto ein',
                'para'       => 'Es ist einfach, das Modul in nur wenigen Schritten einzurichten',
                'step-one'   => 'Geben Sie Authentifizierungsanmeldeinformationen wie E-Mail, Passwort und Passwortbestätigung ein',
                'step-two'   => 'Geben Sie persönliche Angaben wie Vorname, Nachname und Telefonnummer ein.',
                'step-three' => 'Geben Sie Organisationsdetails wie Benutzernamen und Organisationsnamen ein',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => 'Warnung: Das Erstellen mehrerer Kanäle ist nicht erlaubt',
            'channel-hostname'                  => 'Warnung: Bitte kontaktieren Sie den Administrator, um Ihren Hostnamen zu ändern',
            'same-domain'                       => 'Warnung: Es kann nicht dasselbe Subdomain wie die Hauptdomain beibehalten werden',
            'block-message'                     => 'Warnung: Wenn Sie diesen Mandanten freischalten möchten, kontaktieren Sie uns gerne. Wir stehen Ihnen rund um die Uhr zur Verfügung, um Ihr Problem zu lösen.',
            'blocked'                           => 'wurde gesperrt',
            'illegal-action'                    => 'Warnung: Sie haben eine illegale Aktion durchgeführt',
            'domain-message'                    => 'Warnung: Hoppla! Wir konnten bei <b>:domain</b> nicht helfen',
            'domain-desc'                       => 'Wenn Sie ein Konto mit <b>:domain</b> als Organisation erstellen möchten, können Sie gerne ein Konto erstellen und loslegen.',
            'illegal-message'                   => 'Warnung: Die von Ihnen durchgeführte Aktion wurde vom Website-Administrator deaktiviert. Kontaktieren Sie bitte Ihren Website-Administrator für weitere Details dazu.',
            'locale-creation'                   => 'Warnung: Das Erstellen von Sprachen außer Englisch ist nicht erlaubt.',
            'locale-delete'                     => 'Warnung: Die Sprache kann nicht gelöscht werden.',
            'cannot-delete-default'             => 'Warnung: Die Standardkanal kann nicht gelöscht werden.',
            'tenant-blocked'                    => 'Mandant gesperrt',
            'domain-not-found'                  => 'Warnung: Domain nicht gefunden.',
            'company-blocked-by-administrator'  => 'Dieser Mandant wurde gesperrt',
            'not-allowed-to-visit-this-section' => 'Warnung: Sie dürfen diesen Abschnitt nicht verwenden.',
            'auth'                              => 'Warnung: Authentifizierungsfehler!',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'Neue Firma registriert',
                'first-name' => 'Vorname',
                'last-name'  => 'Nachname',
                'email'      => 'E-Mail',
                'name'       => 'Name',
                'username'   => 'Benutzername',
                'domain'     => 'Domain',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => 'Neue Firma erfolgreich registriert',
                'dear'       => 'Liebe:r :tenant_name',
                'greeting'   => 'Willkommen und vielen Dank, dass Sie sich bei uns registriert haben!',
                'summary'    => 'Ihr Konto wurde erfolgreich erstellt und Sie können sich jetzt mit Ihren E-Mail-Adress- und Passwortanmeldeinformationen anmelden. Nach dem Einloggen können Sie auf andere Dienste zugreifen, einschließlich Produkte, Verkäufe, Kunden, Bewertungen und Promotionen.',
                'thanks'     => 'Vielen Dank!',
                'visit-shop' => 'Shop besuchen',
            ],
        ],
    ],

    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'Unternehmensdetails bearbeiten',
            'first-name'     => 'Vorname',
            'last-name'      => 'Nachname',
            'email'          => 'E-Mail',
            'skype'          => 'Skype',
            'cname'          => 'cName',
            'phone'          => 'Telefon',
            'general'        => 'Allgemein',
            'back-btn'       => 'Zurück',
            'save-btn'       => 'Details speichern',
            'update-success' => 'Erfolg: :resource erfolgreich aktualisiert.',
            'update-failed'  => 'Warnung: Kann :resource aus unbekannten Gründen nicht aktualisieren.',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => 'Unternehmensadressliste',
                'create-btn' => 'Adresse hinzufügen',
    
                'datagrid' => [
                    'id'          => 'Id',
                    'address1'    => 'Adresse 1',
                    'address2'    => 'Adresse 2',
                    'city'        => 'Stadt',
                    'country'     => 'Land',
                    'edit'        => 'Bearbeiten',
                    'delete'      => 'Löschen',
                    'mass-delete' => 'Massenlöschen',
                ],
            ],
    
            'create' => [
                'title'     => 'Unternehmensadresse erstellen',
                'general'   => 'Allgemein',
                'address1'  => 'Adresse1',
                'address2'  => 'Adresse2',
                'country'   => 'Land',
                'state'     => 'Bundesland',
                'city'      => 'Stadt',
                'post-code' => 'Postleitzahl',
                'phone'     => 'Telefon',
                'back-btn'  => 'Zurück',
                'save-btn'  => 'Adresse speichern',
            ],
    
            'edit' => [
                'title'     => 'Unternehmensadresse bearbeiten',
                'general'   => 'Allgemein',
                'address1'  => 'Adresse1',
                'address2'  => 'Adresse2',
                'country'   => 'Land',
                'state'     => 'Bundesland',
                'city'      => 'Stadt',
                'post-code' => 'Postleitzahl',
                'phone'     => 'Telefon',
                'back-btn'  => 'Zurück',
                'save-btn'  => 'Adresse speichern',
            ],
    
            'create-success'      => 'Erfolg: Unternehmensadresse erfolgreich erstellt.',
            'update-success'      => 'Erfolg: Unternehmensadresse erfolgreich aktualisiert.',
            'delete-success'      => 'Erfolg: :resource erfolgreich gelöscht.',
            'delete-failed'       => 'Warnung: Kann :resource aus unbekannten Gründen nicht löschen.',
            'mass-delete-success' => 'Erfolg: Ausgewählte Adresse erfolgreich gelöscht.',
        ],
    
        'system' => [
            'social-login'           => 'Soziale Anmeldung',
            'facebook'               => 'Facebook Einstellungen',
            'facebook-client-id'     => 'Facebook Client-ID',
            'facebook-client-secret' => 'Facebook Client-Geheimnis',
            'facebook-callback-url'  => 'Facebook Callback-URL',
            'twitter'                => 'Twitter Einstellungen',
            'twitter-client-id'      => 'Twitter Client-ID',
            'twitter-client-secret'  => 'Twitter Client-Geheimnis',
            'twitter-callback-url'   => 'Twitter Callback-URL',
            'google'                 => 'Google Einstellungen',
            'google-client-id'       => 'Google Client-ID',
            'google-client-secret'   => 'Google Client-Geheimnis',
            'google-callback-url'    => 'Google Callback-URL',
            'linkedin'               => 'LinkedIn Einstellungen',
            'linkedin-client-id'     => 'LinkedIn Client-ID',
            'linkedin-client-secret' => 'LinkedIn Client-Geheimnis',
            'linkedin-callback-url'  => 'LinkedIn Callback-URL',
            'github'                 => 'GitHub Einstellungen',
            'github-client-id'       => 'GitHub Client-ID',
            'github-client-secret'   => 'GitHub Client-Geheimnis',
            'github-callback-url'    => 'GitHub Callback-URL',
            'email-credentials'      => 'E-Mail-Anmeldeinformationen',
            'mail-driver'            => 'Mail-Treiber',
            'mail-host'              => 'Mail-Host',
            'mail-port'              => 'Mail-Port',
            'mail-username'          => 'Mail-Benutzername',
            'mail-password'          => 'Mail-Passwort',
            'mail-encryption'        => 'Mail-Verschlüsselung',
        ],
        
        'tenant' => [
            'id'              => 'ID',
            'first-name'      => 'Vorname',
            'last-name'       => 'Nachname',
            'email'           => 'E-Mail',
            'skype'           => 'Skype',
            'c-name'          => 'CName',
            'add-address'     => 'Adresse hinzufügen',
            'country'         => 'Land',
            'city'            => 'Stadt',
            'address1'        => 'Adresse 1',
            'address2'        => 'Adresse 2',
            'address'         => 'Adressliste',
            'company'         => 'Mieter',
            'profile'         => 'Profil',
            'update'          => 'Aktualisieren',
            'address-details' => 'Adressdetails',
    
            'company-address' => [
                'add-address-title'    => 'Neue Adresse',
                'update-address-title' => 'Adresse aktualisieren',
                'save-btn-title'       => 'Adresse speichern',
            ],
    
            'create-failed'  => 'Warnung: Kann :attribute aus unbekannten Gründen nicht erstellen.',
            'update-success' => 'Erfolg: :resource erfolgreich aktualisiert.',
            'update-failed'  => 'Warnung: Kann :resource aus unbekannten Gründen nicht aktualisieren.',
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'Eine Bestellung :order_id wurde von :placed_by am :created_at platziert.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'Oops! Die Seite, nach der Sie suchen, ist im Urlaub. Es scheint, dass wir nicht finden konnten, wonach Sie gesucht haben.',
            'title'       => '404 Seite nicht gefunden',
        ],

        '401' => [
            'description' => 'Oops! Es sieht so aus, als hätten Sie keinen Zugriff auf diese Seite. Es scheint, dass Ihnen die erforderlichen Berechtigungen fehlen.',
            'title'       => '401 Nicht autorisiert',
        ],

        '403' => [
            'description' => 'Oops! Diese Seite ist gesperrt. Es scheint, dass Sie nicht die erforderlichen Berechtigungen haben, um diesen Inhalt anzuzeigen.',
            'title'       => '403 Zugriff verweigert',
        ],

        '500' => [
            'description' => 'Oops! Etwas ist schief gelaufen. Es scheint, dass wir Schwierigkeiten haben, die von Ihnen gesuchte Seite zu laden.',
            'title'       => '500 Interner Serverfehler',
        ],

        '503' => [
            'description' => 'Oops! Es sieht so aus, als wären wir vorübergehend wegen Wartungsarbeiten nicht erreichbar. Bitte schauen Sie in Kürze wieder vorbei.',
            'title'       => '503 Dienst nicht verfügbar',
        ],
    ],
];
