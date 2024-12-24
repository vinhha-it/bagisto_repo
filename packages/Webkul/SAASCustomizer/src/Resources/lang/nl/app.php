<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'Versie : :version',
                'account-title' => 'Account',
                'logout'        => 'Uitloggen',
                'my-account'    => 'Mijn Account',
                'visit-shop'    => 'Bezoek Winkel',
            ],
    
            'sidebar' => [
                'tenants'          => 'Huurobjecten',
                'tenant-customers' => 'Klanten',
                'tenant-products'  => 'Producten',
                'tenant-orders'    => 'Bestellingen',
                'settings'         => 'Instellingen',
                'agents'           => 'Agenten',
                'roles'            => 'Rollen',
                'locales'          => 'Talen',
                'currencies'       => 'Valuta\'s',
                'channels'         => 'Kanalen',
                'exchange-rates'   => 'Wisselkoersen',
                'themes'           => 'Thema\'s',
                'cms'              => 'CMS',
                'configurations'   => 'Configureren',
                'general'          => 'Algemeen',
                'send-email'       => 'E-mail versturen',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'Huurders',
            'create'         => 'Toevoegen',
            'edit'           => 'Bewerken',
            'delete'         => 'Verwijderen',
            'cancel'         => 'Annuleren',
            'view'           => 'Bekijken',
            'mass-delete'    => 'Massa Verwijderen',
            'mass-update'    => 'Massa Bijwerken',
            'customers'      => 'Klanten',
            'products'       => 'Producten',
            'orders'         => 'Bestellingen',
            'settings'       => 'Instellingen',
            'agents'         => 'Agenten',
            'roles'          => 'Rollen',
            'locales'        => 'Talen',
            'currencies'     => 'Valuta\'s',
            'exchange-rates' => 'Wisselkoersen',
            'channels'       => 'Kanalen',
            'themes'         => 'Thema\'s',
            'send-email'     => 'E-mail Verzenden',
            'cms'            => 'CMS',
            'configuration'  => 'Configuratie',
            'download'       => 'Downloaden',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => 'Super Admin Aanmelden',
                'email'                => 'E-mailadres',
                'password'             => 'Wachtwoord',
                'btn-submit'           => 'Aanmelden',
                'forget-password-link' => 'Wachtwoord Vergeten?',
                'submit-btn'           => 'Aanmelden',
                'login-success'        => 'Succes: U bent succesvol aangemeld.',
                'login-error'          => 'Controleer uw inloggegevens en probeer het opnieuw.',
                'activate-warning'     => 'Uw account moet nog worden geactiveerd, neem contact op met de beheerder.',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'Wachtwoord Vergeten',
                    'title'           => 'Herstel Wachtwoord',
                    'email'           => 'Geregistreerd E-mailadres',
                    'reset-link-sent' => 'Wachtwoord Resetlink Verzonden',
                    'sign-in-link'    => 'Terug naar Aanmelden ?',
                    'email-not-exist' => 'E-mailadres Bestaat Niet',
                    'submit-btn'      => 'Herstellen',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'Wachtwoord Herstellen',
                'back-link-title'  => 'Terug naar Aanmelden ?',
                'confirm-password' => 'Wachtwoord Bevestigen',
                'email'            => 'Geregistreerd E-mailadres',
                'password'         => 'Wachtwoord',
                'submit-btn'       => 'Wachtwoord Herstellen',
            ],
        ],

        'tenants' => [
            'index' => [
                'title'        => 'Lijst van Huurders',
                'register-btn' => 'Registreer Huurder',
        
                'create' => [
                    'title'             => 'Maak Huurder aan',
                    'first-name'        => 'Voornaam',
                    'last-name'         => 'Achternaam',
                    'user-name'         => 'Gebruikersnaam',
                    'organization-name' => 'Organisatienaam',
                    'phone'             => 'Telefoon',
                    'email'             => 'E-mail',
                    'password'          => 'Wachtwoord',
                    'confirm-password'  => 'Bevestig Wachtwoord',
                    'save-btn'          => 'Huurder Opslaan',
                    'back-btn'          => 'Terug',
                ],
        
                'datagrid' => [
                    'id'                  => 'Id',
                    'user-name'           => 'Gebruikersnaam',
                    'organization'        => 'Organisatie',
                    'domain'              => 'Domein',
                    'cname'               => 'Cnaam',
                    'status'              => 'Status',
                    'active'              => 'Actief',
                    'disable'             => 'Uitschakelen',
                    'view'                => 'Bekijk Inzichten',
                    'edit'                => 'Wijzig Huurder',
                    'delete'              => 'Verwijder Huurder',
                    'mass-delete'         => 'Massa Verwijderen',
                    'mass-delete-success' => 'Geselecteerde Huurder Succesvol Verwijderd',
                ],
            ],
        
            'edit' => [
                'title'             => 'Wijzig Huurder',
                'first-name'        => 'Voornaam',
                'last-name'         => 'Achternaam',
                'user-name'         => 'Gebruikersnaam',
                'cname'             => 'Cnaam',
                'organization-name' => 'Organisatienaam',
                'phone'             => 'Telefoon',
                'status'            => 'Status',
                'email'             => 'E-mail',
                'password'          => 'Wachtwoord',
                'confirm-password'  => 'Bevestig Wachtwoord',
                'save-btn'          => 'Huurder Opslaan',
                'back-btn'          => 'Terug',
                'general'           => 'Algemeen',
                'settings'          => 'Instellingen',
            ],
        
            'view' => [
                'title'                        => 'Inzichten van Huurder',
                'heading'                      => 'Huurder - :tenant_name',
                'email-address'                => 'E-mailadres',
                'phone'                        => 'Telefoon',
                'domain-information'           => 'Domeininformatie',
                'mapped-domain'                => 'Toegewezen Domein',
                'cname-information'            => 'Cnaam-informatie',
                'cname-entry'                  => 'Cnaam-ingang',
                'attribute-information'        => 'Attribuutinformatie',
                'no-of-attributes'             => 'Aantal Attributen',
                'attribute-family-information' => 'Informatie over Attribuutfamilie',
                'no-of-attribute-families'     => 'Aantal Attribuutfamilies',
                'product-information'          => 'Productinformatie',
                'no-of-products'               => 'Aantal Producten',
                'customer-information'         => 'Klantinformatie',
                'no-of-customers'              => 'Aantal Klanten',
                'customer-group-information'   => 'Informatie over Klantgroep',
                'no-of-customer-groups'        => 'Aantal Klantgroepen',
                'category-information'         => 'Categorie-informatie',
                'no-of-categories'             => 'Aantal Categorieën',
                'addresses'                    => 'Adreslijst (:count)',
                'empty-title'                  => 'Voeg Adres van Huurder toe',
            ],
        
            'create-success' => 'Huurder succesvol aangemaakt',
            'delete-success' => 'Huurder succesvol verwijderd',
            'delete-failed'  => 'Huurder verwijderen mislukt',
            'product-copied' => 'Huurder succesvol gekopieerd',
            'update-success' => 'Huurder succesvol bijgewerkt',
        
            'customers' => [
                'index' => [
                    'title' => 'Lijst van Klanten',
        
                    'datagrid' => [
                        'id'             => 'Id',
                        'domain'         => 'Domein',
                        'customer-name'  => 'Naam Klant',
                        'email'          => 'E-mail',
                        'customer-group' => 'Klantgroep',
                        'phone'          => 'Telefoon',
                        'status'         => 'Status',
                        'active'         => 'Actief',
                        'inactive'       => 'Inactief',
                        'is-suspended'   => 'Opgeschort',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => 'Lijst van Producten',
        
                    'datagrid' => [
                        'id'               => 'Id',
                        'domain'           => 'Domein',
                        'name'             => 'Naam',
                        'sku'              => 'SKU',
                        'attribute-family' => 'Attribuutfamilie',
                        'image'            => 'Afbeelding',
                        'price'            => 'Prijs',
                        'qty'              => 'Hoeveelheid',
                        'status'           => 'Status',
                        'active'           => 'Actief',
                        'inactive'         => 'Inactief',
                        'category'         => 'Categorie',
                        'type'             => 'Type',
                    ],
                ],
            ],

            'orders' => [
                'index' => [
                    'title' => 'Lijst van bestellingen',
            
                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => 'Bestelnummer',
                        'domain'          => 'Domein',
                        'sub-total'       => 'Subtotaal',
                        'grand-total'     => 'Totaalbedrag',
                        'order-date'      => 'Besteldatum',
                        'channel-name'    => 'Kanaalnaam',
                        'status'          => 'Status',
                        'processing'      => 'Verwerken',
                        'completed'       => 'Voltooid',
                        'canceled'        => 'Geannuleerd',
                        'closed'          => 'Gesloten',
                        'pending'         => 'In behandeling',
                        'pending-payment' => 'In afwachting van betaling',
                        'fraud'           => 'Fraude',
                        'customer'        => 'Klant',
                        'email'           => 'E-mail',
                        'location'        => 'Locatie',
                        'images'          => 'Afbeeldingen',
                        'pay-by'          => 'Betaalwijze - ',
                        'pay-via'         => 'Betaal via',
                        'date'            => 'Datum',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'Lijst van agenten',
                    'register-btn' => 'Agent aanmaken',
            
                    'create' => [
                        'title'             => 'Agent aanmaken',
                        'first-name'        => 'Voornaam',
                        'last-name'         => 'Achternaam',
                        'email'             => 'E-mail',
                        'current-password'  => 'Huidig wachtwoord',
                        'password'          => 'Wachtwoord',
                        'confirm-password'  => 'Bevestig wachtwoord',
                        'role'              => 'Rol',
                        'select'            => 'Selecteren',
                        'status'            => 'Status',
                        'save-btn'          => 'Agent opslaan',
                        'back-btn'          => 'Terug',
                        'upload-image-info' => 'Upload een profielafbeelding (110px X 110px) in PNG- of JPG-formaat',
                    ],
            
                    'edit' => [
                        'title' => 'Agent bewerken',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Id',
                        'name'    => 'Naam',
                        'email'   => 'E-mail',
                        'role'    => 'Rol',
                        'status'  => 'Status',
                        'active'  => 'Actief',
                        'disable' => 'Uitschakelen',
                        'actions' => 'Acties',
                        'edit'    => 'Bewerken',
                        'delete'  => 'Verwijderen',
                    ],
                ],
            
                'create-success'             => 'Succes: Super admin agent succesvol aangemaakt',
                'delete-success'             => 'Agent succesvol verwijderd',
                'delete-failed'              => 'Verwijderen van agent mislukt',
                'cannot-change'              => 'Naam van agent kan niet worden gewijzigd',
                'product-copied'             => 'Agent succesvol gekopieerd',
                'update-success'             => 'Agent succesvol bijgewerkt',
                'invalid-password'           => 'Het huidige wachtwoord dat u heeft ingevoerd is onjuist',
                'last-delete-error'          => 'Waarschuwing: Ten minste één superadmin-agent is vereist',
                'login-delete-error'         => 'Waarschuwing: U kunt uw eigen account niet verwijderen.',
                'administrator-delete-error' => 'Waarschuwing: Ten minste één superadmin-agent met beheerdersrechten is vereist',
            ],
            
            'roles' => [
                'index' => [
                    'title'      => 'Rollenlijst',
                    'create-btn' => 'Rol aanmaken',
            
                    'datagrid' => [
                        'id'              => 'Id',
                        'name'            => 'Naam',
                        'permission-type' => 'Toestemmingstype',
                        'actions'         => 'Acties',
                        'edit'            => 'Bewerken',
                        'delete'          => 'Verwijderen',
                    ],
                ],
            
                'create' => [
                    'access-control' => 'Toegangscontrole',
                    'all'            => 'Alle',
                    'back-btn'       => 'Terug',
                    'custom'         => 'Aangepast',
                    'description'    => 'Beschrijving',
                    'general'        => 'Algemeen',
                    'name'           => 'Naam',
                    'permissions'    => 'Toestemmingen',
                    'save-btn'       => 'Rol opslaan',
                    'title'          => 'Rol aanmaken',
                ],
            
                'edit' => [
                    'access-control' => 'Toegangscontrole',
                    'all'            => 'Alle',
                    'back-btn'       => 'Terug',
                    'custom'         => 'Aangepast',
                    'description'    => 'Beschrijving',
                    'general'        => 'Algemeen',
                    'name'           => 'Naam',
                    'permissions'    => 'Toestemmingen',
                    'save-btn'       => 'Rol opslaan',
                    'title'          => 'Rol bewerken',
                ],
            
                'being-used'        => 'Rol wordt al gebruikt door een andere agent',
                'last-delete-error' => 'Laatste rol kan niet worden verwijderd',
                'create-success'    => 'Rol succesvol aangemaakt',
                'delete-success'    => 'Rol succesvol verwijderd',
                'delete-failed'     => 'Verwijderen van rol mislukt',
                'update-success'    => 'Rol succesvol bijgewerkt',
            ],
            
            'locales' => [
                'index' => [
                    'title'      => 'Lijst van locaties',
                    'create-btn' => 'Locatie aanmaken',
            
                    'create' => [
                        'title'            => 'Locatie aanmaken',
                        'code'             => 'Code',
                        'name'             => 'Naam',
                        'direction'        => 'Richting',
                        'select-direction' => 'Richting selecteren',
                        'text-ltr'         => 'Links naar rechts',
                        'text-rtl'         => 'Rechts naar links',
                        'locale-logo'      => 'Locatie logo',
                        'logo-size'        => 'Afbeeldingsresolutie moet bijvoorbeeld 24px x 16px zijn',
                        'save-btn'         => 'Locatie opslaan',
                    ],
            
                    'edit' => [
                        'title'     => 'Locatie bewerken',
                        'code'      => 'Code',
                        'name'      => 'Naam',
                        'direction' => 'Richting',
                    ],
            
                    'datagrid' => [
                        'id'        => 'Id',
                        'code'      => 'Code',
                        'name'      => 'Naam',
                        'direction' => 'Richting',
                        'text-ltr'  => 'Links naar rechts',
                        'text-rtl'  => 'Rechts naar links',
                        'actions'   => 'Acties',
                        'edit'      => 'Bewerken',
                        'delete'    => 'Verwijderen',
                    ],
                ],
                
                'being-used'        => ':locale_name wordt gebruikt als standaardtaal in het kanaal',
                'create-success'    => 'Locatie succesvol aangemaakt.',
                'update-success'    => 'Locatie succesvol bijgewerkt.',
                'delete-success'    => 'Locatie succesvol verwijderd.',
                'delete-failed'     => 'Verwijderen van locatie mislukt',
                'last-delete-error' => 'Ten minste één superadmin-locatie is vereist.',
            ],

            'currencies' => [
                'index' => [
                    'title'      => 'Valutalijst',
                    'create-btn' => 'Valuta aanmaken',
            
                    'create' => [
                        'title'    => 'Valuta aanmaken',
                        'code'     => 'Code',
                        'name'     => 'Naam',
                        'symbol'   => 'Symbool',
                        'decimal'  => 'Decimaal',
                        'save-btn' => 'Valuta opslaan',
                    ],
            
                    'edit' => [
                        'title'    => 'Valuta bewerken',
                        'code'     => 'Code',
                        'name'     => 'Naam',
                        'symbol'   => 'Symbool',
                        'decimal'  => 'Decimaal',
                        'save-btn' => 'Valuta opslaan',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Id',
                        'code'    => 'Code',
                        'name'    => 'Naam',
                        'actions' => 'Acties',
                        'edit'    => 'Bewerken',
                        'delete'  => 'Verwijderen',
                    ],
                ],
            
                'create-success'      => 'Valuta succesvol aangemaakt.',
                'update-success'      => 'Valuta succesvol bijgewerkt.',
                'delete-success'      => 'Valuta succesvol verwijderd.',
                'delete-failed'       => 'Valuta verwijderen mislukt',
                'last-delete-error'   => 'Minstens één superbeheerder valuta is vereist.',
                'mass-delete-success' => 'Geselecteerde valuta\'s succesvol verwijderd',
            ],
            
            'exchange-rates' => [
                'index' => [
                    'title'        => 'Wisselkoersen',
                    'create-btn'   => 'Wisselkoers aanmaken',
                    'update-rates' => 'Koersen bijwerken',
            
                    'create' => [
                        'title'                  => 'Wisselkoers aanmaken',
                        'source-currency'        => 'Bronvaluta',
                        'target-currency'        => 'Doelvaluta',
                        'select-target-currency' => 'Doelvaluta selecteren',
                        'rate'                   => 'Koers',
                        'save-btn'               => 'Wisselkoers opslaan',
                    ],
            
                    'edit' => [
                        'title'           => 'Wisselkoers bewerken',
                        'source-currency' => 'Bronvaluta',
                        'target-currency' => 'Doelvaluta',
                        'rate'            => 'Koers',
                        'save-btn'        => 'Wisselkoers opslaan',
                    ],
            
                    'datagrid' => [
                        'id'            => 'Id',
                        'currency-name' => 'Valutanaam',
                        'exchange-rate' => 'Wisselkoers',
                        'actions'       => 'Acties',
                        'edit'          => 'Bewerken',
                        'delete'        => 'Verwijderen',
                    ],
                ],
            
                'create-success' => 'Wisselkoers succesvol aangemaakt.',
                'update-success' => 'Wisselkoers succesvol bijgewerkt.',
                'delete-success' => 'Wisselkoers succesvol verwijderd.',
                'delete-failed'  => 'Wisselkoers verwijderen mislukt',
            ],
            
            'channels' => [
                'index' => [
                    'title' => 'Kanalen',
            
                    'datagrid' => [
                        'id'       => 'Id',
                        'code'     => 'Code',
                        'name'     => 'Naam',
                        'hostname' => 'Hostnaam',
                        'actions'  => 'Acties',
                        'edit'     => 'Bewerken',
                        'delete'   => 'Verwijderen',
                    ],
                ],
            
                'edit' => [
                    'title'                  => 'Kanaal bewerken',
                    'back-btn'               => 'Terug',
                    'save-btn'               => 'Kanaal opslaan',
                    'general'                => 'Algemeen',
                    'code'                   => 'Code',
                    'name'                   => 'Naam',
                    'description'            => 'Beschrijving',
                    'hostname'               => 'Hostnaam',
                    'hostname-placeholder'   => 'https://www.example.com (Voeg geen schuine streep toe aan het einde.)',
                    'design'                 => 'Ontwerp',
                    'theme'                  => 'Thema',
                    'logo'                   => 'Logo',
                    'logo-size'              => 'Beeldresolutie moet zijn zoals 192px X 50px',
                    'favicon'                => 'Favicon',
                    'favicon-size'           => 'Beeldresolutie moet zijn zoals 16px X 16px',
                    'seo'                    => 'Startpagina SEO',
                    'seo-title'              => 'Meta-titel',
                    'seo-description'        => 'Meta-beschrijving',
                    'seo-keywords'           => 'Meta-trefwoorden',
                    'currencies-and-locales' => 'Valuta\'s en Locaties',
                    'locales'                => 'Locaties',
                    'default-locale'         => 'Standaard locatie',
                    'currencies'             => 'Valuta\'s',
                    'default-currency'       => 'Standaard valuta',
                    'last-delete-error'      => 'Minstens één kanaal is vereist.',
                    'settings'               => 'Instellingen',
                    'status'                 => 'Status',
                    'update-success'         => 'Kanaal succesvol bijgewerkt',
                ],
            
                'update-success' => 'Kanaal succesvol bijgewerkt.',
                'delete-success' => 'Kanaal succesvol verwijderd.',
                'delete-failed'  => 'Kanaal verwijderen mislukt',
            ],

            'themes' => [
                'index' => [
                    'create-btn' => 'Thema aanmaken',
                    'title'      => 'Thema\'s',
            
                    'datagrid' => [
                        'active'       => 'Actief',
                        'channel_name' => 'Kanaalnaam',
                        'delete'       => 'Verwijderen',
                        'inactive'     => 'Inactief',
                        'id'           => 'Id',
                        'name'         => 'Naam',
                        'status'       => 'Status',
                        'sort-order'   => 'Sorteervolgorde',
                        'type'         => 'Type',
                        'view'         => 'Bekijken',
                    ],
                ],
            
                'create' => [
                    'name'       => 'Naam',
                    'save-btn'   => 'Thema Opslaan',
                    'sort-order' => 'Sorteervolgorde',
                    'title'      => 'Thema aanmaken',
            
                    'type' => [
                        'footer-links'     => 'Voetteksten',
                        'image-carousel'   => 'Afbeeldingscarrousel',
                        'product-carousel' => 'Productcarrousel',
                        'static-content'   => 'Statische inhoud',
                        'services-content' => 'Diensteninhoud',
                        'title'            => 'Type',
                    ],
                ],
            
                'edit' => [
                    'add-image-btn'                 => 'Afbeelding toevoegen',
                    'add-filter-btn'                => 'Filter toevoegen',
                    'add-footer-link-btn'           => 'Voettekstlink toevoegen',
                    'add-link'                      => 'Link toevoegen',
                    'asc'                           => 'Oplopend',
                    'back'                          => 'Terug',
                    'category-carousel-description' => 'Toon dynamische categorieën aantrekkelijk met behulp van een responsieve categoriecarrousel.',
                    'category-carousel'             => 'Categoriecarrousel',
                    'create-filter'                 => 'Filter aanmaken',
                    'css'                           => 'CSS',
                    'column'                        => 'Kolom',
                    'channels'                      => 'Kanalen',
                    'desc'                          => 'Aflopend',
                    'delete'                        => 'Verwijderen',
                    'edit'                          => 'Bewerken',
                    'footer-title'                  => 'Titel',
                    'footer-link'                   => 'Voetteksten',
                    'footer-link-form-title'        => 'Voettekstlink',
                    'filter-title'                  => 'Titel',
                    'filters'                       => 'Filters',
                    'footer-link-description'       => 'Navigeer via voettekstlinks voor naadloze verkenning van de website en informatie.',
                    'general'                       => 'Algemeen',
                    'html'                          => 'HTML',
                    'image'                         => 'Afbeelding',
                    'image-size'                    => 'Afbeeldingsresolutie moet (1920px X 700px) zijn',
                    'image-title'                   => 'Afbeeldingstitel',
                    'image-upload-message'          => 'Alleen afbeeldingen (.jpeg, .jpg, .png, .webp, ..) zijn toegestaan.',
                    'key'                           => 'Sleutel: :key',
                    'key-input'                     => 'Sleutel',
                    'link'                          => 'Link',
                    'limit'                         => 'Limiet',
                    'name'                          => 'Naam',
                    'product-carousel'              => 'Productcarrousel',
                    'product-carousel-description'  => 'Toon producten elegant met een dynamische en responsieve productcarrousel.',
                    'path'                          => 'Pad',
                    'preview'                       => 'Voorbeeld',
                    'slider'                        => 'Schuifregelaar',
                    'static-content-description'    => 'Verbeter de betrokkenheid met beknopte, informatieve statische inhoud voor uw publiek.',
                    'static-content'                => 'Statische inhoud',
                    'slider-description'            => 'Schuifregelaar gerelateerde thema-aanpassing.',
                    'slider-required'               => 'Schuifregelaarveld is verplicht.',
                    'slider-add-btn'                => 'Schuifregelaar toevoegen',
                    'save-btn'                      => 'Opslaan',
                    'sort'                          => 'Sorteren',
                    'sort-order'                    => 'Sorteervolgorde',
                    'status'                        => 'Status',
                    'slider-image'                  => 'Schuifregelaar afbeelding',
                    'select'                        => 'Selecteer',
                    'title'                         => 'Thema bewerken',
                    'update-slider'                 => 'Schuifregelaar bijwerken',
                    'url'                           => 'URL',
                    'value-input'                   => 'Waarde',
                    'value'                         => 'Waarde: :value',
            
                    'services-content' => [
                        'add-btn'            => 'Diensten toevoegen',
                        'channels'           => 'Kanalen',
                        'delete'             => 'Verwijderen',
                        'description'        => 'Beschrijving',
                        'general'            => 'Algemeen',
                        'name'               => 'Naam',
                        'save-btn'           => 'Opslaan',
                        'service-icon'       => 'Dienstpictogram',
                        'service-icon-class' => 'Klasse dienstpictogram',
                        'service-info'       => 'Dienst gerelateerde thema-aanpassing.',
                        'services'           => 'Diensten',
                        'sort-order'         => 'Sorteervolgorde',
                        'status'             => 'Status',
                        'title'              => 'Titel',
                        'update-service'     => 'Diensten bijwerken',
                    ],
                ],
            
                'create-success' => 'Thema succesvol aangemaakt',
                'delete-success' => 'Thema succesvol verwijderd',
                'update-success' => 'Thema succesvol bijgewerkt',
                'delete-failed'  => 'Er is een fout opgetreden bij het verwijderen van thema-inhoud.',
            ],
            
            'email' => [
                'create' => [
                    'send-btn'                  => 'E-mail verzenden',
                    'back-btn'                  => 'Terug',
                    'title'                     => 'E-mail verzenden',
                    'general'                   => 'Algemeen',
                    'body'                      => 'Inhoud',
                    'subject'                   => 'Onderwerp',
                    'dear'                      => 'Beste :agent_name',
                    'agent-registration'        => 'Saas-agent succesvol geregistreerd',
                    'summary'                   => 'Uw account is aangemaakt. Hieronder staan uw accountgegevens: ',
                    'saas-url'                  => 'Domein',
                    'email'                     => 'E-mail',
                    'password'                  => 'Wachtwoord',
                    'sign-in'                   => 'Inloggen',
                    'thanks'                    => 'Bedankt!',
                    'send-email-to-all-tenants' => 'E-mail naar alle huurders verzenden',
                ],
            
                'send-success' => 'E-mail succesvol verzonden.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'CMS Pagina Lijst',
                'create-btn' => 'Pagina Maken',
        
                'datagrid' => [
                    'id'                  => 'Id',
                    'page-title'          => 'Pagina Titel',
                    'url-key'             => 'URL Sleutel',
                    'status'              => 'Status',
                    'active'              => 'Actief',
                    'disable'             => 'Uitschakelen',
                    'edit'                => 'Pagina Aanpassen',
                    'delete'              => 'Pagina Verwijderen',
                    'mass-delete'         => 'Massa Verwijderen',
                    'mass-delete-success' => 'Geselecteerde Cms Pagina(s) Succesvol Verwijderd',
                ],
            ],
        
            'create' => [
                'title'            => 'Cms Pagina Maken',
                'first-name'       => 'Voornaam',
                'general'          => 'Algemeen',
                'page-title'       => 'Titel',
                'channels'         => 'Kanalen',
                'content'          => 'Inhoud',
                'meta-keywords'    => 'Meta Trefwoorden',
                'meta-description' => 'Meta Beschrijving',
                'meta-title'       => 'Meta Titel',
                'seo'              => 'SEO',
                'url-key'          => 'URL Sleutel',
                'description'      => 'Beschrijving',
                'save-btn'         => 'Cms Pagina Opslaan',
                'back-btn'         => 'Terug',
            ],
        
            'edit' => [
                'title'            => 'Pagina Aanpassen',
                'preview-btn'      => 'Voorbeeld Pagina',
                'save-btn'         => 'Pagina Opslaan',
                'general'          => 'Algemeen',
                'page-title'       => 'Pagina Titel',
                'back-btn'         => 'Terug',
                'channels'         => 'Kanalen',
                'content'          => 'Inhoud',
                'seo'              => 'SEO',
                'meta-keywords'    => 'Meta Trefwoorden',
                'meta-description' => 'Meta Beschrijving',
                'meta-title'       => 'Meta Titel',
                'url-key'          => 'URL Sleutel',
                'description'      => 'Beschrijving',
            ],
        
            'create-success' => 'CMS succesvol aangemaakt.',
            'delete-success' => 'CMS succesvol verwijderd.',
            'update-success' => 'CMS succesvol bijgewerkt.',
            'no-resource'    => 'Bron bestaat niet.',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => 'Verwijderen',
                'enable-at-least-one-shipping' => 'Activeer ten minste één verzendmethode.',
                'enable-at-least-one-payment'  => 'Activeer ten minste één betalingsmethode.',
                'save-btn'                     => 'Configuratie Opslaan',
                'save-message'                 => 'Configuratie succesvol opgeslagen',
                'title'                        => 'Configuratie',
        
                'general' => [
                    'info'  => 'Beheer lay-out en e-mailgegevens',
                    'title' => 'Algemeen',
        
                    'design' => [
                        'info'  => 'Stel logo en favicon in.',
                        'title' => 'Ontwerp',
        
                        'super' => [
                            'info'          => 'Super beheerderslogo is het onderscheidende beeld of embleem dat de beheerinterface van een systeem of website vertegenwoordigt, vaak aanpasbaar.',
                            'admin-logo'    => 'Beheerderslogo',
                            'logo-image'    => 'Logo Afbeelding',
                            'favicon-image' => 'Favicon Afbeelding',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => 'Stel e-mailadres in voor superbeheerder.',
                        'title' => 'Super Agent',
        
                        'super' => [
                            'info'          => 'Stel e-mailadres in voor de superbeheerder om de e-mailmeldingen te ontvangen',
                            'email-address' => 'E-mailadres',
                        ],

                        'social-connect' => [
                            'title'    => 'Sociaal Verbinden',
                            'info'     => 'Sociale media platforms bieden mogelijkheden voor directe interactie met uw publiek via reacties, likes en delen, wat betrokkenheid bevordert en een gemeenschap rond uw merk opbouwt.',
                            'facebook' => 'Facebook',
                            'twitter'  => 'Twitter',
                            'linkedin' => 'LinkedIn',
                        ],
                    ],
        
                    'content' => [
                        'info'   => 'Stel koptekst- en voettekstinformatie in voor de lay-out van het huurdersregister.',
                        'title'  => 'Inhoud',
        
                        'footer' => [
                            'info'           => 'Stel de voettekstinhoud in',
                            'title'          => 'Voettekst',
                            'footer-content' => 'Voettekst Tekst',
                            'footer-toggle'  => 'Schakel voettekst in/uit',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => 'Beheer verkoop-, verzend- en betalingsmethodedetails',
                    'title' => 'Verkoop',
        
                    'shipping-methods' => [
                        'info'  => 'Stel verzendmethodeninformatie in',
                        'title' => 'Verzendmethoden',
                    ],
        
                    'payment-methods' => [
                        'info'  => 'Stel betalingsmethodeninformatie in',
                        'title' => 'Betalingsmethoden',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => 'Activeer ten minste één verzendmethode.',
            'enable-at-least-one-payment'  => 'Activeer ten minste één betalingsmethode.',
            'save-message'                 => 'Succes: Super beheerdersconfiguratie succesvol opgeslagen.',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'Registreren als huurder',
            ],
    
            'footer' => [
                'footer-text'     => '© Auteursrecht 2010 - 2023, Webkul Software (geregistreerd in India). Alle rechten voorbehouden.',
                'connect-with-us' => 'Verbind met ons',
                'text-locale'     => 'Taal',
                'text-currency'   => 'Valuta',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => 'Handelaarsregistratie',
            'step-1'              => 'Stap 1',
            'auth-cred'           => 'Authenticatiegegevens',
            'email'               => 'E-mail',
            'phone'               => 'Telefoon',
            'username'            => 'Gebruikersnaam',
            'password'            => 'Wachtwoord',
            'cpassword'           => 'Bevestig wachtwoord',
            'continue'            => 'Doorgaan',
            'step-2'              => 'Stap 2',
            'personal'            => 'Persoonlijke gegevens',
            'first-name'          => 'Voornaam',
            'last-name'           => 'Achternaam',
            'step-3'              => 'Stap 3',
            'org-details'         => 'Organisatiegegevens',
            'org-name'            => 'Organisatienaam',
            'company-activated'   => 'Succes: Bedrijf succesvol geactiveerd.',
            'company-deactivated' => 'Succes: Bedrijf succesvol gedeactiveerd.',
            'company-updated'     => 'Succes: Bedrijf succesvol bijgewerkt.',
            'something-wrong'     => 'Waarschuwing: Er is iets misgegaan.',
            'store-created'       => 'Succes: Winkel succesvol aangemaakt.',
            'something-wrong-1'   => 'Waarschuwing: Er is iets misgegaan, probeer het later opnieuw.',
            'content'             => 'Word een handelaar en maak zonder problemen je eigen winkel aan zonder je zorgen te maken over het installeren en beheren van de server. Je hoeft je alleen maar aan te melden, productgegevens te uploaden en je e-commerce winkel te krijgen. De Laravel multi-company SaaS-module biedt eenvoudige aanpassingsmogelijkheden, dit betekent dat handelaars eenvoudig extra functies en functionaliteiten aan hun winkel kunnen toevoegen of deze eenvoudig kunnen verbeteren.',
    
            'right-panel' => [
                'heading'    => 'Hoe een handelaarsaccount op te zetten',
                'para'       => 'Het is eenvoudig om de module op te zetten in slechts een paar stappen',
                'step-one'   => 'Voer Authenticatiegegevens in zoals e-mail, wachtwoord en bevestig wachtwoord',
                'step-two'   => 'Voer Persoonlijke gegevens in zoals voornaam, achternaam en telefoonnummer.',
                'step-three' => 'Voer Organisatiegegevens in zoals gebruikersnaam, organisatienaam',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => 'Waarschuwing: Het aanmaken van meer dan één kanaal is niet toegestaan',
            'channel-hostname'                  => 'Waarschuwing: Neem contact op met de beheerder om uw hostnaam te wijzigen',
            'same-domain'                       => 'Waarschuwing: Kan hetzelfde subdomein als hoofddomein niet behouden',
            'block-message'                     => 'Waarschuwing: Als u deze huurder wilt deblokkeren, neem dan gerust contact met ons op. We zijn 24x7 beschikbaar om uw probleem op te lossen.',
            'blocked'                           => 'is geblokkeerd',
            'illegal-action'                    => 'Waarschuwing: U heeft een illegale handeling verricht',
            'domain-message'                    => 'Waarschuwing: Oeps! We konden niet helpen bij <b>:domain</b>',
            'domain-desc'                       => 'Als u een account wilt maken met <b>:domain</b> als organisatie, maak dan gerust een account aan en begin meteen.',
            'illegal-message'                   => 'Waarschuwing: De handeling die u heeft uitgevoerd, is uitgeschakeld door de site-beheerder, neem contact op met uw sitebeheerder voor meer informatie hierover.',
            'locale-creation'                   => 'Waarschuwing: Het maken van een taalinstelling anders dan Engels is niet toegestaan.',
            'locale-delete'                     => 'Waarschuwing: Kan de taalinstelling niet verwijderen.',
            'cannot-delete-default'             => 'Waarschuwing: Kan het standaardkanaal niet verwijderen.',
            'tenant-blocked'                    => 'Huurder geblokkeerd',
            'domain-not-found'                  => 'Waarschuwing: Domein niet gevonden.',
            'company-blocked-by-administrator'  => 'Deze huurder is geblokkeerd',
            'not-allowed-to-visit-this-section' => 'Waarschuwing: U mag dit gedeelte niet gebruiken.',
            'auth'                              => 'Waarschuwing: Authenticatiefout!',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'Nieuw Bedrijf Geregistreerd',
                'first-name' => 'Voornaam',
                'last-name'  => 'Achternaam',
                'email'      => 'E-mail',
                'name'       => 'Naam',
                'username'   => 'Gebruikersnaam',
                'domain'     => 'Domein',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => 'Nieuw Bedrijf Succesvol Geregistreerd',
                'dear'       => 'Beste :tenant_name',
                'greeting'   => 'Welkom en bedankt voor uw registratie bij ons!',
                'summary'    => 'Uw account is nu succesvol aangemaakt en u kunt inloggen met uw e-mailadres en wachtwoordgegevens. Na het inloggen kunt u andere diensten gebruiken, waaronder producten, verkoop, klanten, beoordelingen en promoties.',
                'thanks'     => 'Bedankt!',
                'visit-shop' => 'Bezoek Winkel',
            ],
        ],
    ],

    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'Bedrijfsgegevens bewerken',
            'first-name'     => 'Voornaam',
            'last-name'      => 'Achternaam',
            'email'          => 'E-mail',
            'skype'          => 'Skype',
            'cname'          => 'Cnaam',
            'phone'          => 'Telefoon',
            'general'        => 'Algemeen',
            'back-btn'       => 'Terug',
            'save-btn'       => 'Gegevens opslaan',
            'update-success' => 'Succes: :resource succesvol bijgewerkt.',
            'update-failed'  => 'Waarschuwing: Kan :resource niet bijwerken vanwege onbekende redenen.',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => 'Lijst met bedrijfsadressen',
                'create-btn' => 'Adres toevoegen',
    
                'datagrid' => [
                    'id'          => 'ID',
                    'address1'    => 'Adres 1',
                    'address2'    => 'Adres 2',
                    'city'        => 'Stad',
                    'country'     => 'Land',
                    'edit'        => 'Bewerken',
                    'delete'      => 'Verwijderen',
                    'mass-delete' => 'Massa Verwijderen',
                ],
            ],
    
            'create' => [
                'title'     => 'Bedrijfsadres maken',
                'general'   => 'Algemeen',
                'address1'  => 'Adres1',
                'address2'  => 'Adres2',
                'country'   => 'Land',
                'state'     => 'Staat',
                'city'      => 'Stad',
                'post-code' => 'Postcode',
                'phone'     => 'Telefoon',
                'back-btn'  => 'Terug',
                'save-btn'  => 'Adres opslaan',
            ],
    
            'edit' => [
                'title'     => 'Bedrijfsadres bewerken',
                'general'   => 'Algemeen',
                'address1'  => 'Adres1',
                'address2'  => 'Adres2',
                'country'   => 'Land',
                'state'     => 'Staat',
                'city'      => 'Stad',
                'post-code' => 'Postcode',
                'phone'     => 'Telefoon',
                'back-btn'  => 'Terug',
                'save-btn'  => 'Adres opslaan',
            ],
    
            'create-success'      => 'Succes: Bedrijfsadres succesvol aangemaakt.',
            'update-success'      => 'Succes: Bedrijfsadres succesvol bijgewerkt.',
            'delete-success'      => 'Succes: :resource succesvol verwijderd.',
            'delete-failed'       => 'Waarschuwing: Kan :resource niet verwijderen vanwege onbekende redenen.',
            'mass-delete-success' => 'Succes: Geselecteerd adres succesvol verwijderd.',
        ],
    
        'system' => [
            'social-login'           => 'Sociale login',
            'facebook'               => 'Facebook-instellingen',
            'facebook-client-id'     => 'Facebook-client-ID',
            'facebook-client-secret' => 'Facebook-clientgeheim',
            'facebook-callback-url'  => 'Facebook-terugroep-URL',
            'twitter'                => 'Twitter-instellingen',
            'twitter-client-id'      => 'Twitter-client-ID',
            'twitter-client-secret'  => 'Twitter-clientgeheim',
            'twitter-callback-url'   => 'Twitter-terugroep-URL',
            'google'                 => 'Google-instellingen',
            'google-client-id'       => 'Google-client-ID',
            'google-client-secret'   => 'Google-clientgeheim',
            'google-callback-url'    => 'Google-terugroep-URL',
            'linkedin'               => 'LinkedIn-instellingen',
            'linkedin-client-id'     => 'LinkedIn-client-ID',
            'linkedin-client-secret' => 'LinkedIn-clientgeheim',
            'linkedin-callback-url'  => 'LinkedIn-terugroep-URL',
            'github'                 => 'GitHub-instellingen',
            'github-client-id'       => 'GitHub-client-ID',
            'github-client-secret'   => 'GitHub-clientgeheim',
            'github-callback-url'    => 'GitHub-terugroep-URL',
            'email-credentials'      => 'E-mailreferenties',
            'mail-driver'            => 'Mailstuurprogramma',
            'mail-host'              => 'Mailhost',
            'mail-port'              => 'Mailpoort',
            'mail-username'          => 'Mailgebruikersnaam',
            'mail-password'          => 'Mailwachtwoord',
            'mail-encryption'        => 'Mailversleuteling',
        ],
        
        'tenant' => [
            'id'              => 'ID',
            'first-name'      => 'Voornaam',
            'last-name'       => 'Achternaam',
            'email'           => 'E-mail',
            'skype'           => 'Skype',
            'c-name'          => 'cNaam',
            'add-address'     => 'Adres toevoegen',
            'country'         => 'Land',
            'city'            => 'Stad',
            'address1'        => 'Adres 1',
            'address2'        => 'Adres 2',
            'address'         => 'Adreslijst',
            'company'         => 'Tenant',
            'profile'         => 'Profiel',
            'update'          => 'Bijwerken',
            'address-details' => 'Adresgegevens',
            'create-failed'   => 'Waarschuwing: Kan :attribute niet maken vanwege onbekende redenen.',
            'update-success'  => 'Succes: :resource succesvol bijgewerkt.',
            'update-failed'   => 'Waarschuwing: Kan :resource niet bijwerken vanwege onbekende redenen.',
    
            'company-address' => [
                'add-address-title'    => 'Nieuw adres',
                'update-address-title' => 'Adres bijwerken',
                'save-btn-title'       => 'Adres opslaan',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'Er is een bestelling :order_id geplaatst door :placed_by op :created_at.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'Oeps! De pagina die je zoekt is met vakantie. Het lijkt erop dat we niet kunnen vinden waar je naar op zoek bent.',
            'title'       => '404 Pagina niet gevonden',
        ],

        '401' => [
            'description' => 'Oeps! Het lijkt erop dat je geen toegang hebt tot deze pagina. Het lijkt erop dat je de benodigde referenties mist.',
            'title'       => '401 Niet geautoriseerd',
        ],

        '403' => [
            'description' => 'Oeps! Deze pagina is verboden terrein. Het lijkt erop dat je niet de vereiste machtigingen hebt om deze inhoud te bekijken.',
            'title'       => '403 Verboden',
        ],

        '500' => [
            'description' => 'Oeps! Er is iets misgegaan. Het lijkt erop dat we problemen hebben met het laden van de pagina die je zoekt.',
            'title'       => '500 Interne serverfout',
        ],

        '503' => [
            'description' => 'Oeps! Het lijkt erop dat we tijdelijk niet beschikbaar zijn vanwege onderhoud. Kom over een tijdje terug.',
            'title'       => '503 Service niet beschikbaar',
        ],
    ],
];
