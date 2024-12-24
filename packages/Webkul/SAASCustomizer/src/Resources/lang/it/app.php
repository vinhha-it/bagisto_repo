<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'Versione: :versione',
                'account-title' => 'Account',
                'logout'        => 'Logout',
                'my-account'    => 'Il mio account',
                'visit-shop'    => 'Visita il negozio',
            ],
        
            'sidebar' => [
                'tenants'          => 'Inquilini',
                'tenant-customers' => 'Clienti',
                'tenant-products'  => 'Prodotti',
                'tenant-orders'    => 'Ordini',
                'settings'         => 'Impostazioni',
                'agents'           => 'Agenti',
                'roles'            => 'Ruoli',
                'locales'          => 'Localizzazioni',
                'currencies'       => 'Valute',
                'channels'         => 'Canali',
                'exchange-rates'   => 'Tassi di cambio',
                'themes'           => 'Temi',
                'cms'              => 'CMS',
                'configurations'   => 'Configurazioni',
                'general'          => 'Generale',
                'send-email'       => 'Invia email',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'Inquilini',
            'create'         => 'Aggiungi',
            'edit'           => 'Modifica',
            'delete'         => 'Elimina',
            'cancel'         => 'Annulla',
            'view'           => 'Visualizza',
            'mass-delete'    => 'Eliminazione di massa',
            'mass-update'    => 'Aggiornamento di massa',
            'customers'      => 'Clienti',
            'products'       => 'Prodotti',
            'orders'         => 'Ordini',
            'settings'       => 'Impostazioni',
            'agents'         => 'Agenti',
            'roles'          => 'Ruoli',
            'locales'        => 'Lingue',
            'currencies'     => 'Valute',
            'exchange-rates' => 'Tassi di cambio',
            'channels'       => 'Canali',
            'themes'         => 'Temi',
            'send-email'     => 'Invia Email',
            'cms'            => 'CMS',
            'configuration'  => 'Configurazione',
            'download'       => 'Scarica',
        ],

        'agents' => [
            'sessions' => [
                'title'                => 'Accesso Super Amministratore',
                'email'                => 'Indirizzo Email',
                'password'             => 'Password',
                'btn-submit'           => 'Accedi',
                'forget-password-link' => 'Password dimenticata?',
                'submit-btn'           => 'Accedi',
                'login-success'        => 'Successo: Accesso effettuato con successo.',
                'login-error'          => 'Verifica le tue credenziali e riprova.',
                'activate-warning'     => 'Il tuo account deve ancora essere attivato, contatta l\'amministratore.',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'Password Dimenticata',
                    'title'           => 'Recupera Password',
                    'email'           => 'Email Registrata',
                    'reset-link-sent' => 'Link per il reset della password inviato',
                    'sign-in-link'    => 'Torna al login?',
                    'email-not-exist' => 'Email non esistente',
                    'submit-btn'      => 'Resetta',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'Resetta Password',
                'back-link-title'  => 'Torna al login?',
                'confirm-password' => 'Conferma Password',
                'email'            => 'Email Registrata',
                'password'         => 'Password',
                'submit-btn'       => 'Resetta Password',
            ],
        ],

        'tenants' => [
            'index' => [
                'title'        => 'Elenco Inquilini',
                'register-btn' => 'Registra Inquilino',
        
                'create' => [
                    'title'             => 'Crea Inquilino',
                    'first-name'        => 'Nome',
                    'last-name'         => 'Cognome',
                    'user-name'         => 'Nome Utente',
                    'organization-name' => 'Nome Organizzazione',
                    'phone'             => 'Telefono',
                    'email'             => 'Email',
                    'password'          => 'Password',
                    'confirm-password'  => 'Conferma Password',
                    'save-btn'          => 'Salva Inquilino',
                    'back-btn'          => 'Indietro',
                ],
        
                'datagrid' => [
                    'id'                  => 'Id',
                    'user-name'           => 'Nome Utente',
                    'organization'        => 'Organizzazione',
                    'domain'              => 'Dominio',
                    'cname'               => 'Cname',
                    'status'              => 'Stato',
                    'active'              => 'Attivo',
                    'disable'             => 'Disabilita',
                    'view'                => 'Visualizza Statistiche',
                    'edit'                => 'Modifica Inquilino',
                    'delete'              => 'Rimuovi Inquilino',
                    'mass-delete'         => 'Eliminazione Massiva',
                    'mass-delete-success' => 'Inquilino Selezionato Eliminato con Successo',
                ],
            ],
        
            'edit' => [
                'title'             => 'Modifica Inquilino',
                'first-name'        => 'Nome',
                'last-name'         => 'Cognome',
                'user-name'         => 'Nome Utente',
                'cname'             => 'Cname',
                'organization-name' => 'Nome Organizzazione',
                'phone'             => 'Telefono',
                'status'            => 'Stato',
                'email'             => 'Email',
                'password'          => 'Password',
                'confirm-password'  => 'Conferma Password',
                'save-btn'          => 'Salva Inquilino',
                'back-btn'          => 'Indietro',
                'general'           => 'Generale',
                'settings'          => 'Impostazioni',
            ],
        
            'view' => [
                'title'                        => 'Statistiche Inquilino',
                'heading'                      => 'Inquilino - :tenant_name',
                'email-address'                => 'Indirizzo Email',
                'phone'                        => 'Telefono',
                'domain-information'           => 'Informazioni Dominio',
                'mapped-domain'                => 'Dominio Mappato',
                'cname-information'            => 'Informazioni Cname',
                'cname-entry'                  => 'Voce Cname',
                'attribute-information'        => 'Informazioni Attributo',
                'no-of-attributes'             => 'Numero di Attributi',
                'attribute-family-information' => 'Informazioni Famiglia di Attributi',
                'no-of-attribute-families'     => 'Numero di Famiglie di Attributi',
                'product-information'          => 'Informazioni Prodotto',
                'no-of-products'               => 'Numero di Prodotti',
                'customer-information'         => 'Informazioni Cliente',
                'no-of-customers'              => 'Numero di Clienti',
                'customer-group-information'   => 'Informazioni Gruppo Cliente',
                'no-of-customer-groups'        => 'Numero di Gruppi Clienti',
                'category-information'         => 'Informazioni Categoria',
                'no-of-categories'             => 'Numero di Categorie',
                'addresses'                    => 'Elenco Indirizzi (:count)',
                'empty-title'                  => 'Aggiungi Indirizzo Inquilino',
            ],
        
            'create-success' => 'Inquilino creato con successo',
            'delete-success' => 'Inquilino eliminato con successo',
            'delete-failed'  => 'Eliminazione Inquilino fallita',
            'product-copied' => 'Inquilino copiato con successo',
            'update-success' => 'Inquilino aggiornato con successo',
        
            'customers' => [
                'index' => [
                    'title' => 'Elenco Clienti',
        
                    'datagrid' => [
                        'id'             => 'Id',
                        'domain'         => 'Dominio',
                        'customer-name'  => 'Nome Cliente',
                        'email'          => 'Email',
                        'customer-group' => 'Gruppo Cliente',
                        'phone'          => 'Telefono',
                        'status'         => 'Stato',
                        'active'         => 'Attivo',
                        'inactive'       => 'Inattiva',
                        'is-suspended'   => 'Sospesa',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => 'Elenco Prodotti',
        
                    'datagrid' => [
                        'id'               => 'Id',
                        'domain'           => 'Dominio',
                        'name'             => 'Nome',
                        'sku'              => 'SKU',
                        'attribute-family' => 'Famiglia di Attributi',
                        'image'            => 'Immagine',
                        'price'            => 'Prezzo',
                        'qty'              => 'Quantità',
                        'status'           => 'Stato',
                        'active'           => 'Attivo',
                        'inactive'         => 'Inattiva',
                        'category'         => 'Categoria',
                        'type'             => 'Tipo',
                    ],
                ],
            ],
        
            'orders' => [
                'index' => [
                    'title' => 'Elenco Ordini',
        
                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => 'Id Ordine',
                        'domain'          => 'Dominio',
                        'sub-total'       => 'Sub Totale',
                        'grand-total'     => 'Totale',
                        'order-date'      => 'Data Ordine',
                        'channel-name'    => 'Nome Canale',
                        'status'          => 'Stato',
                        'processing'      => 'In Elaborazione',
                        'completed'       => 'Completato',
                        'canceled'        => 'Annullato',
                        'closed'          => 'Chiuso',
                        'pending'         => 'In Attesa',
                        'pending-payment' => 'Pagamento in Sospeso',
                        'fraud'           => 'Frode',
                        'customer'        => 'Cliente',
                        'email'           => 'Email',
                        'location'        => 'Posizione',
                        'images'          => 'Immagini',
                        'pay-by'          => 'Pagato Da - ',
                        'pay-via'         => 'Paga Via',
                        'date'            => 'Data',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'Elenco Agenti',
                    'register-btn' => 'Crea Agente',
        
                    'create' => [
                        'title'             => 'Crea Agente',
                        'first-name'        => 'Nome',
                        'last-name'         => 'Cognome',
                        'email'             => 'Email',
                        'current-password'  => 'Password Attuale',
                        'password'          => 'Password',
                        'confirm-password'  => 'Conferma Password',
                        'role'              => 'Ruolo',
                        'select'            => 'Seleziona',
                        'status'            => 'Stato',
                        'save-btn'          => 'Salva Tenant',
                        'back-btn'          => 'Indietro',
                        'upload-image-info' => 'Carica un\'immagine del profilo (110px X 110px) in formato PNG o JPG',
                    ],
        
                    'edit' => [
                        'title' => 'Modifica Agente',
                    ],
        
                    'datagrid' => [
                        'id'      => 'Id',
                        'name'    => 'Nome',
                        'email'   => 'Email',
                        'role'    => 'Ruolo',
                        'status'  => 'Stato',
                        'active'  => 'Attivo',
                        'disable' => 'Disabilita',
                        'actions' => 'Azioni',
                        'edit'    => 'Modifica',
                        'delete'  => 'Elimina',
                    ],
                ],
        
                'create-success'             => 'Successo: Agente super admin creato con successo',
                'delete-success'             => 'Tenant eliminato con successo',
                'delete-failed'              => 'Eliminazione del Tenant fallita',
                'cannot-change'              => 'Il nome dell\'Agente :name non può essere cambiato',
                'product-copied'             => 'Tenant copiato con successo',
                'update-success'             => 'Tenant aggiornato con successo',
                'invalid-password'           => 'La password attuale inserita non è corretta',
                'last-delete-error'          => 'Avviso: È richiesto almeno un agente super admin',
                'login-delete-error'         => 'Attenzione: Non puoi eliminare il tuo account.',
                'administrator-delete-error' => 'Attenzione: È richiesto almeno un agente super admin con accesso amministratore',
            ],
        
            'roles' => [
                'index' => [
                    'title'      => 'Elenco Ruoli',
                    'create-btn' => 'Crea Ruolo',
        
                    'datagrid' => [
                        'id'              => 'Id',
                        'name'            => 'Nome',
                        'permission-type' => 'Tipo di Permesso',
                        'actions'         => 'Azioni',
                        'edit'            => 'Modifica',
                        'delete'          => 'Elimina',
                    ],
                ],
        
                'create' => [
                    'access-control' => 'Controllo Accessi',
                    'all'            => 'Tutto',
                    'back-btn'       => 'Indietro',
                    'custom'         => 'Personalizzato',
                    'description'    => 'Descrizione',
                    'general'        => 'Generale',
                    'name'           => 'Nome',
                    'permissions'    => 'Permessi',
                    'save-btn'       => 'Salva Ruolo',
                    'title'          => 'Crea Ruolo',
                ],
        
                'edit' => [
                    'access-control' => 'Controllo Accessi',
                    'all'            => 'Tutto',
                    'back-btn'       => 'Indietro',
                    'custom'         => 'Personalizzato',
                    'description'    => 'Descrizione',
                    'general'        => 'Generale',
                    'name'           => 'Nome',
                    'permissions'    => 'Permessi',
                    'save-btn'       => 'Salva Ruolo',
                    'title'          => 'Modifica Ruolo',
                ],
        
                'being-used'        => 'Il Ruolo è già utilizzato da un altro Agente',
                'last-delete-error' => 'Impossibile eliminare l\'ultimo Ruolo',
                'create-success'    => 'Ruolo creato con successo',
                'delete-success'    => 'Ruolo eliminato con successo',
                'delete-failed'     => 'Eliminazione del Ruolo fallita',
                'update-success'    => 'Ruolo aggiornato con successo',
            ],
        
            'locales' => [
                'index' => [
                    'title'      => 'Elenco Localizzazioni',
                    'create-btn' => 'Crea Localizzazione',
        
                    'create' => [
                        'title'            => 'Crea Localizzazione',
                        'code'             => 'Codice',
                        'name'             => 'Nome',
                        'direction'        => 'Direzione',
                        'select-direction' => 'Seleziona Direzione',
                        'text-ltr'         => 'LTR',
                        'text-rtl'         => 'RTL',
                        'locale-logo'      => 'Logo Localizzazione',
                        'logo-size'        => 'La risoluzione dell\'immagine dovrebbe essere di 24px X 16px',
                        'save-btn'         => 'Salva Localizzazione',
                    ],
        
                    'edit' => [
                        'title'     => 'Modifica Localizzazione',
                        'code'      => 'Codice',
                        'name'      => 'Nome',
                        'direction' => 'Direzione',
                    ],
        
                    'datagrid' => [
                        'id'        => 'Id',
                        'code'      => 'Codice',
                        'name'      => 'Nome',
                        'direction' => 'Direzione',
                        'text-ltr'  => 'LTR',
                        'text-rtl'  => 'RTL',
                        'actions'   => 'Azioni',
                        'edit'      => 'Modifica',
                        'delete'    => 'Elimina',
                    ],
                ],
        
                'being-used'        => 'La localizzazione :locale_name è utilizzata come localizzazione predefinita nel canale',
                'create-success'    => 'Localizzazione creata con successo',
                'update-success'    => 'Localizzazione aggiornata con successo',
                'delete-success'    => 'Localizzazione eliminata con successo',
                'delete-failed'     => 'Eliminazione della Localizzazione fallita',
                'last-delete-error' => 'È richiesta almeno una localizzazione super admin',
            ],
        
            'currencies' => [
                'index' => [
                    'title'      => 'Elenco Valute',
                    'create-btn' => 'Crea Valuta',
        
                    'create' => [
                        'title'    => 'Crea Valuta',
                        'code'     => 'Codice',
                        'name'     => 'Nome',
                        'symbol'   => 'Simbolo',
                        'decimal'  => 'Decimale',
                        'save-btn' => 'Salva Valuta',
                    ],
        
                    'edit' => [
                        'title'    => 'Modifica Valuta',
                        'code'     => 'Codice',
                        'name'     => 'Nome',
                        'symbol'   => 'Simbolo',
                        'decimal'  => 'Decimale',
                        'save-btn' => 'Salva Valuta',
                    ],
        
                    'datagrid' => [
                        'id'      => 'Id',
                        'code'    => 'Codice',
                        'name'    => 'Nome',
                        'actions' => 'Azioni',
                        'edit'    => 'Modifica',
                        'delete'  => 'Elimina',
                    ],
                ],
        
                'create-success'      => 'Valuta creata con successo',
                'update-success'      => 'Valuta aggiornata con successo',
                'delete-success'      => 'Valuta eliminata con successo',
                'delete-failed'       => 'Eliminazione della Valuta fallita',
                'last-delete-error'   => 'È richiesta almeno una valuta super admin',
                'mass-delete-success' => 'Valute selezionate eliminate con successo',
            ],
        
            'exchange-rates' => [
                'index' => [
                    'title'        => 'Tassi di Cambio',
                    'create-btn'   => 'Crea Tasso di Cambio',
                    'update-rates' => 'Aggiorna Tassi',
        
                    'create' => [
                        'title'                  => 'Crea Tasso di Cambio',
                        'source-currency'        => 'Valuta Sorgente',
                        'target-currency'        => 'Valuta di Destinazione',
                        'select-target-currency' => 'Seleziona Valuta di Destinazione',
                        'rate'                   => 'Tasso',
                        'save-btn'               => 'Salva Tasso di Cambio',
                    ],
        
                    'edit' => [
                        'title'           => 'Modifica Tasso di Cambio',
                        'source-currency' => 'Valuta Sorgente',
                        'target-currency' => 'Valuta di Destinazione',
                        'rate'            => 'Tasso',
                        'save-btn'        => 'Salva Tasso di Cambio',
                    ],
        
                    'datagrid' => [
                        'id'            => 'Id',
                        'currency-name' => 'Nome Valuta',
                        'exchange-rate' => 'Tasso di Cambio',
                        'actions'       => 'Azioni',
                        'edit'          => 'Modifica',
                        'delete'        => 'Elimina',
                    ],
                ],
        
                'create-success' => 'Tasso di Cambio creato con successo',
                'update-success' => 'Tasso di Cambio aggiornato con successo',
                'delete-success' => 'Tasso di Cambio eliminato con successo',
                'delete-failed'  => 'Eliminazione del Tasso di Cambio fallita',
            ],
        
            'channels' => [
                'index' => [
                    'title' => 'Canali',
        
                    'datagrid' => [
                        'id'       => 'Id',
                        'code'     => 'Codice',
                        'name'     => 'Nome',
                        'hostname' => 'Nome Host',
                        'actions'  => 'Azioni',
                        'edit'     => 'Modifica',
                        'delete'   => 'Elimina',
                    ],
                ],
        
                'edit' => [
                    'title'                  => 'Modifica Canale',
                    'back-btn'               => 'Indietro',
                    'save-btn'               => 'Salva Canale',
                    'general'                => 'Generale',
                    'code'                   => 'Codice',
                    'name'                   => 'Nome',
                    'description'            => 'Descrizione',
                    'hostname'               => 'Hostname',
                    'hostname-placeholder'   => 'https://www.example.com (Non aggiungere la barra alla fine.)',
                    'design'                 => 'Design',
                    'theme'                  => 'Tema',
                    'logo'                   => 'Logo',
                    'logo-size'              => 'La risoluzione dell\'immagine dovrebbe essere di 192px X 50px',
                    'favicon'                => 'Favicon',
                    'favicon-size'           => 'La risoluzione dell\'immagine dovrebbe essere di 16px X 16px',
                    'seo'                    => 'SEO della pagina principale',
                    'seo-title'              => 'Meta Titolo',
                    'seo-description'        => 'Meta Descrizione',
                    'seo-keywords'           => 'Meta Parole Chiave',
                    'currencies-and-locales' => 'Valute e Localizzazioni',
                    'locales'                => 'Localizzazioni',
                    'default-locale'         => 'Localizzazione Predefinita',
                    'currencies'             => 'Valute',
                    'default-currency'       => 'Valuta Predefinita',
                    'last-delete-error'      => 'È richiesto almeno un Canale',
                    'settings'               => 'Impostazioni',
                    'status'                 => 'Stato',
                    'update-success'         => 'Aggiorna Canale con successo',
                ],
        
                'update-success' => 'Canale aggiornato con successo',
                'delete-success' => 'Canale eliminato con successo',
                'delete-failed'  => 'Eliminazione del Canale fallita',
            ],

            'themes' => [
                'index' => [
                    'create-btn' => 'Crea Tema',
                    'title'      => 'Temi',
        
                    'datagrid' => [
                        'active'       => 'Attivo',
                        'channel_name' => 'Nome Canale',
                        'delete'       => 'Elimina',
                        'inactive'     => 'Inattivo',
                        'id'           => 'Id',
                        'name'         => 'Nome',
                        'status'       => 'Stato',
                        'sort-order'   => 'Ordine di Ordinamento',
                        'type'         => 'Tipo',
                        'view'         => 'Visualizza',
                    ],
                ],
        
                'create' => [
                    'name'       => 'Nome',
                    'save-btn'   => 'Salva Tema',
                    'sort-order' => 'Ordine di Ordinamento',
                    'title'      => 'Crea Tema',
        
                    'type' => [
                        'footer-links'     => 'Link a piè di pagina',
                        'image-carousel'   => 'Carosello Immagini',
                        'product-carousel' => 'Carosello Prodotti',
                        'static-content'   => 'Contenuto Statico',
                        'services-content' => 'Contenuto Servizi',
                        'title'            => 'Tipo',
                    ],
                ],
        
                'edit' => [
                    'add-image-btn'                 => 'Aggiungi Immagine',
                    'add-filter-btn'                => 'Aggiungi Filtro',
                    'add-footer-link-btn'           => 'Aggiungi Link a piè di pagina',
                    'add-link'                      => 'Aggiungi Link',
                    'asc'                           => 'Asc',
                    'back'                          => 'Indietro',
                    'category-carousel-description' => 'Mostra categorie dinamiche in modo accattivante utilizzando un carosello di categorie responsivo.',
                    'category-carousel'             => 'Carosello Categorie',
                    'create-filter'                 => 'Crea Filtro',
                    'css'                           => 'CSS',
                    'column'                        => 'Colonna',
                    'channels'                      => 'Canali',
                    'desc'                          => 'Desc',
                    'delete'                        => 'Elimina',
                    'edit'                          => 'Modifica',
                    'footer-title'                  => 'Titolo',
                    'footer-link'                   => 'Link a piè di pagina',
                    'footer-link-form-title'        => 'Link a piè di pagina',
                    'filter-title'                  => 'Titolo',
                    'filters'                       => 'Filtri',
                    'footer-link-description'       => 'Naviga tramite link a piè di pagina per una navigazione senza interruzioni nel sito web.',
                    'general'                       => 'Generale',
                    'html'                          => 'HTML',
                    'image'                         => 'Immagine',
                    'image-size'                    => 'La risoluzione dell\'immagine dovrebbe essere di (1920px X 700px)',
                    'image-title'                   => 'Titolo Immagine',
                    'image-upload-message'          => 'Sono ammesse solo immagini (.jpeg, .jpg, .png, .webp, ..).',
                    'key'                           => 'Chiave: :key',
                    'key-input'                     => 'Chiave',
                    'link'                          => 'Link',
                    'limit'                         => 'Limite',
                    'name'                          => 'Nome',
                    'product-carousel'              => 'Carosello Prodotti',
                    'product-carousel-description'  => 'Mostra i prodotti in modo elegante con un carosello di prodotti dinamico e responsivo.',
                    'path'                          => 'Percorso',
                    'preview'                       => 'Anteprima',
                    'slider'                        => 'Slider',
                    'static-content-description'    => 'Aumenta l\'interazione con contenuti statici concisi e informativi per il tuo pubblico.',
                    'static-content'                => 'Contenuto Statico',
                    'slider-description'            => 'Personalizzazione del tema relativa allo slider.',
                    'slider-required'               => 'Il campo Slider è obbligatorio.',
                    'slider-add-btn'                => 'Aggiungi Slider',
                    'save-btn'                      => 'Salva',
                    'sort'                          => 'Ordina',
                    'sort-order'                    => 'Ordine di Ordinamento',
                    'status'                        => 'Stato',
                    'slider-image'                  => 'Immagine Slider',
                    'select'                        => 'Seleziona',
                    'title'                         => 'Modifica Tema',
                    'update-slider'                 => 'Aggiorna Slider',
                    'url'                           => 'URL',
                    'value-input'                   => 'Valore',
                    'value'                         => 'Valore: :value',
        
                    'services-content' => [
                        'add-btn'            => 'Aggiungi Servizi',
                        'channels'           => 'Canali',
                        'delete'             => 'Elimina',
                        'description'        => 'Descrizione',
                        'general'            => 'Generale',
                        'name'               => 'Nome',
                        'save-btn'           => 'Salva',
                        'service-icon'       => 'Icona Servizio',
                        'service-icon-class' => 'Classe Icona Servizio',
                        'service-info'       => 'Personalizzazione del tema relativa ai servizi.',
                        'services'           => 'Servizi',
                        'sort-order'         => 'Ordine di Ordinamento',
                        'status'             => 'Stato',
                        'title'              => 'Titolo',
                        'update-service'     => 'Aggiorna Servizi',
                    ],
                ],
        
                'create-success' => 'Tema creato con successo',
                'delete-success' => 'Tema eliminato con successo',
                'update-success' => 'Tema aggiornato con successo',
                'delete-failed'  => "Si è verificato un errore durante l'eliminazione del contenuto del tema.",
            ],
        
            'email' => [
                'create' => [
                    'send-btn'                  => 'Invia Email',
                    'back-btn'                  => 'Indietro',
                    'title'                     => 'Invia Email',
                    'general'                   => 'Generale',
                    'body'                      => 'Corpo',
                    'subject'                   => 'Oggetto',
                    'dear'                      => 'Caro :agent_name',
                    'agent-registration'        => 'Registrazione Agente Saas avvenuta con successo',
                    'summary'                   => 'Il tuo account è stato creato. I dettagli del tuo account sono i seguenti:',
                    'saas-url'                  => 'Dominio',
                    'email'                     => 'Email',
                    'password'                  => 'Password',
                    'sign-in'                   => 'Accedi',
                    'thanks'                    => 'Grazie!',
                    'send-email-to-all-tenants' => 'Invia email a tutti i tenant',
                ],
        
                'send-success' => 'Email inviata con successo.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'Elenco pagine CMS',
                'create-btn' => 'Crea pagina',
        
                'datagrid' => [
                    'id'                  => 'ID',
                    'page-title'          => 'Titolo pagina',
                    'url-key'             => 'Chiave URL',
                    'status'              => 'Stato',
                    'active'              => 'Attivo',
                    'disable'             => 'Disabilita',
                    'edit'                => 'Modifica pagina',
                    'delete'              => 'Rimuovi pagina',
                    'mass-delete'         => 'Elimina massa',
                    'mass-delete-success' => 'Pagine CMS selezionate eliminate con successo',
                ],
            ],
        
            'create' => [
                'title'            => 'Crea pagina CMS',
                'first-name'       => 'Nome',
                'general'          => 'Generale',
                'page-title'       => 'Titolo',
                'channels'         => 'Canali',
                'content'          => 'Contenuto',
                'meta-keywords'    => 'Meta Keywords',
                'meta-description' => 'Meta Descrizione',
                'meta-title'       => 'Meta Titolo',
                'seo'              => 'SEO',
                'url-key'          => 'Chiave URL',
                'description'      => 'Descrizione',
                'save-btn'         => 'Salva pagina CMS',
                'back-btn'         => 'Indietro',
            ],
        
            'edit' => [
                'title'            => 'Modifica pagina',
                'preview-btn'      => 'Anteprima pagina',
                'save-btn'         => 'Salva pagina',
                'general'          => 'Generale',
                'page-title'       => 'Titolo pagina',
                'back-btn'         => 'Indietro',
                'channels'         => 'Canali',
                'content'          => 'Contenuto',
                'seo'              => 'SEO',
                'meta-keywords'    => 'Meta Keywords',
                'meta-description' => 'Meta Descrizione',
                'meta-title'       => 'Meta Titolo',
                'url-key'          => 'Chiave URL',
                'description'      => 'Descrizione',
            ],
        
            'create-success' => 'CMS creato con successo.',
            'delete-success' => 'CMS eliminato con successo.',
            'update-success' => 'CMS aggiornato con successo.',
            'no-resource'    => 'Risorsa non esistente.',
        ],

        'configuration' => [
            'index' => [
                'delete'                       => 'Elimina',
                'enable-at-least-one-shipping' => 'Abilita almeno un metodo di spedizione.',
                'enable-at-least-one-payment'  => 'Abilita almeno un metodo di pagamento.',
                'save-btn'                     => 'Salva Configurazione',
                'save-message'                 => 'Configurazione salvata con successo',
                'title'                        => 'Configurazione',
        
                'general' => [
                    'info'  => 'Gestisci layout e dettagli email',
                    'title' => 'Generale',
        
                    'design' => [
                        'info'  => 'Imposta logo e icona favicon.',
                        'title' => 'Design',
        
                        'super' => [
                            'info'          => 'Il logo del super amministratore è l\'immagine distintiva o l\'emblema che rappresenta l\'interfaccia di amministrazione di un sistema o di un sito web, spesso personalizzabile.',
                            'admin-logo'    => 'Logo Admin',
                            'logo-image'    => 'Immagine del Logo',
                            'favicon-image' => 'Immagine Favicon',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => 'Imposta l\'indirizzo email del super amministratore.',
                        'title' => 'Super Agente',
        
                        'super' => [
                            'info'          => 'Imposta l\'indirizzo email per il super amministratore per ricevere le notifiche via email',
                            'email-address' => 'Indirizzo Email',
                        ],

                        'social-connect' => [
                            'title'    => 'Connessione Sociale',
                            'info'     => "Le piattaforme di social media forniscono opportunità per l'interazione diretta con il tuo pubblico attraverso commenti, mi piace e condivisioni, favorendo l'engagement e la costruzione di una comunità intorno al tuo brand.",
                            'facebook' => 'Facebook',
                            'twitter'  => 'Twitter',
                            'linkedin' => 'Linkedin',
                        ],
                    ],
        
                    'content' => [
                        'info'   => 'Imposta informazioni sull\'intestazione e il piè di pagina per la disposizione della registrazione dell\'inquilino.',
                        'title'  => 'Contenuto',
        
                        'footer' => [
                            'info'           => 'Imposta il contenuto del piè di pagina',
                            'title'          => 'Piè di Pagina',
                            'footer-content' => 'Testo del Piè di Pagina',
                            'footer-toggle'  => 'Attiva/Disattiva piè di pagina',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => 'Gestisci dettagli delle vendite, della spedizione e dei metodi di pagamento',
                    'title' => 'Vendite',
        
                    'shipping-methods' => [
                        'info'  => 'Imposta informazioni sui metodi di spedizione',
                        'title' => 'Metodi di Spedizione',
                    ],
        
                    'payment-methods' => [
                        'info'  => 'Imposta informazioni sui metodi di pagamento',
                        'title' => 'Metodi di Pagamento',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => 'Abilita almeno un metodo di spedizione.',
            'enable-at-least-one-payment'  => 'Abilita almeno un metodo di pagamento.',
            'save-message'                 => 'Successo: Configurazione del super amministratore salvata con successo.',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'Registrati come Inquilino',
            ],
    
            'footer' => [
                'footer-text'     => '© Copyright 2010 - 2023, Webkul Software (Registrato in India). Tutti i diritti riservati.',
                'connect-with-us' => 'Connettiti con noi',
                'text-locale'     => 'Locale',
                'text-currency'   => 'Valuta',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => 'Registrazione Commerciante',
            'step-1'              => 'Passo 1',
            'auth-cred'           => 'Credenziali di Autenticazione',
            'email'               => 'Email',
            'phone'               => 'Telefono',
            'username'            => 'Nome utente',
            'password'            => 'Password',
            'cpassword'           => 'Conferma Password',
            'continue'            => 'Continua',
            'step-2'              => 'Passo 2',
            'personal'            => 'Dettagli Personali',
            'first-name'          => 'Nome',
            'last-name'           => 'Cognome',
            'step-3'              => 'Passo 3',
            'org-details'         => 'Dettagli dell\'Organizzazione',
            'org-name'            => 'Nome dell\'Organizzazione',
            'company-activated'   => 'Successo: Azienda attivata con successo.',
            'company-deactivated' => 'Successo: Azienda disattivata con successo.',
            'company-updated'     => 'Successo: Azienda aggiornata con successo.',
            'something-wrong'     => 'Attenzione: Qualcosa è andato storto.',
            'store-created'       => 'Successo: Negozio creato con successo.',
            'something-wrong-1'   => 'Attenzione: Qualcosa è andato storto, riprova più tardi.',
            'content'             => 'Diventa un commerciante e crea il tuo negozio senza preoccuparti di installare e gestire il server. Devi solo registrarti, caricare i dati del prodotto e ottenere il tuo negozio di e-commerce. Il modulo SaaS multi-azienda Laravel offre facili capacità di personalizzazione, il che significa che il commerciante può facilmente aggiungere qualsiasi funzionalità extra al suo negozio o migliorarlo facilmente.',
    
            'right-panel' => [
                'heading'    => 'Come configurare l\'account commerciante',
                'para'       => 'È facile configurare il modulo in pochi passi',
                'step-one'   => 'Inserisci le credenziali di autenticazione come email, password e conferma password',
                'step-two'   => 'Inserisci i dettagli personali come nome, cognome e numero di telefono.',
                'step-three' => 'Inserisci i dettagli dell\'organizzazione come nome utente, nome dell\'organizzazione',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => 'Attenzione: Non è consentito creare più di un canale',
            'channel-hostname'                  => 'Attenzione: Contatta l\'amministratore per cambiare il tuo hostname',
            'same-domain'                       => 'Attenzione: Impossibile mantenere lo stesso sub-dominio del dominio principale',
            'block-message'                     => 'Attenzione: Se vuoi sbloccare questo inquilino, contattaci liberamente siamo disponibili 24x7 per risolvere il tuo problema.',
            'blocked'                           => 'è stato bloccato',
            'illegal-action'                    => 'Attenzione: Hai eseguito un\'azione illegale',
            'domain-message'                    => 'Attenzione: Oops! Non siamo riusciti ad aiutare a <b>:domain</b>',
            'domain-desc'                       => 'Se desideri creare un account con <b>:domain</b> come organizzazione, sentiti libero di creare un account e inizia.',
            'illegal-message'                   => 'Attenzione: L\'azione che hai eseguito è disabilitata dall\'amministratore del sito, contatta il tuo amministratore di sito per ulteriori dettagli su questo.',
            'locale-creation'                   => 'Attenzione: Creare una località diversa dall\'inglese non è consentito.',
            'locale-delete'                     => 'Attenzione: Impossibile eliminare la località.',
            'cannot-delete-default'             => 'Attenzione: Impossibile eliminare il canale predefinito.',
            'tenant-blocked'                    => 'Inquilino bloccato',
            'domain-not-found'                  => 'Attenzione: Dominio non trovato.',
            'company-blocked-by-administrator'  => 'Questo inquilino è bloccato',
            'not-allowed-to-visit-this-section' => 'Attenzione: Non hai il permesso di utilizzare questa sezione.',
            'auth'                              => 'Attenzione: Errore di autenticazione!',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'Nuova Azienda Registrata',
                'first-name' => 'Nome',
                'last-name'  => 'Cognome',
                'email'      => 'Email',
                'name'       => 'Nome',
                'username'   => 'Nome utente',
                'domain'     => 'Dominio',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => 'Nuova Azienda Registrata con Successo',
                'dear'       => 'Caro :tenant_name',
                'greeting'   => 'Benvenuto e grazie per esserti registrato con noi!',
                'summary'    => 'Il tuo account è stato creato con successo e puoi accedere utilizzando le tue credenziali di indirizzo email e password. Dopo esserti autenticato, potrai accedere ad altri servizi, tra cui prodotti, vendite, clienti, recensioni e promozioni.',
                'thanks'     => 'Grazie!',
                'visit-shop' => 'Visita il Negozio',
            ],
        ],
    ],

    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'Modifica Dettagli Azienda',
            'first-name'     => 'Nome',
            'last-name'      => 'Cognome',
            'email'          => 'Email',
            'skype'          => 'Skype',
            'cname'          => 'cName',
            'phone'          => 'Telefono',
            'general'        => 'Generale',
            'back-btn'       => 'Indietro',
            'save-btn'       => 'Salva Dettaglio',
            'update-success' => 'Successo: :resource aggiornato con successo.',
            'update-failed'  => 'Avviso: Impossibile aggiornare :resource per motivi sconosciuti.',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => 'Elenco Indirizzi Azienda',
                'create-btn' => 'Aggiungi Indirizzo',
    
                'datagrid' => [
                    'id'          => 'ID',
                    'address1'    => 'Indirizzo 1',
                    'address2'    => 'Indirizzo 2',
                    'city'        => 'Città',
                    'country'     => 'Paese',
                    'edit'        => 'Modifica',
                    'delete'      => 'Elimina',
                    'mass-delete' => 'Eliminazione di massa',
                ],
            ],
    
            'create' => [
                'title'     => 'Crea Indirizzo Azienda',
                'general'   => 'Generale',
                'address1'  => 'Indirizzo 1',
                'address2'  => 'Indirizzo 2',
                'country'   => 'Paese',
                'state'     => 'Stato',
                'city'      => 'Città',
                'post-code' => 'CAP',
                'phone'     => 'Telefono',
                'back-btn'  => 'Indietro',
                'save-btn'  => 'Salva Indirizzo',
            ],
    
            'edit' => [
                'title'     => 'Modifica Indirizzo Azienda',
                'general'   => 'Generale',
                'address1'  => 'Indirizzo 1',
                'address2'  => 'Indirizzo 2',
                'country'   => 'Paese',
                'state'     => 'Stato',
                'city'      => 'Città',
                'post-code' => 'CAP',
                'phone'     => 'Telefono',
                'back-btn'  => 'Indietro',
                'save-btn'  => 'Salva Indirizzo',
            ],
    
            'create-success'      => 'Successo: Indirizzo aziendale creato con successo.',
            'update-success'      => 'Successo: Indirizzo aziendale aggiornato con successo.',
            'delete-success'      => 'Successo: :resource eliminato con successo.',
            'delete-failed'       => 'Avviso: Impossibile eliminare :resource per motivi sconosciuti.',      
            'mass-delete-success' => 'Successo: Indirizzi selezionati eliminati con successo.',
        ],
    
        'system' => [
            'social-login'           => 'Login Social',
            'facebook'               => 'Impostazioni Facebook',
            'facebook-client-id'     => 'ID Cliente Facebook',
            'facebook-client-secret' => 'Segreto Cliente Facebook',
            'facebook-callback-url'  => 'URL Callback Facebook',
            'twitter'                => 'Impostazioni Twitter',
            'twitter-client-id'      => 'ID Cliente Twitter',
            'twitter-client-secret'  => 'Segreto Cliente Twitter',
            'twitter-callback-url'   => 'URL Callback Twitter',
            'google'                 => 'Impostazioni Google',
            'google-client-id'       => 'ID Cliente Google',
            'google-client-secret'   => 'Segreto Cliente Google',
            'google-callback-url'    => 'URL Callback Google',
            'linkedin'               => 'Impostazioni LinkedIn',
            'linkedin-client-id'     => 'ID Cliente LinkedIn',
            'linkedin-client-secret' => 'Segreto Cliente LinkedIn',
            'linkedin-callback-url'  => 'URL Callback LinkedIn',
            'github'                 => 'Impostazioni GitHub',
            'github-client-id'       => 'ID Cliente GitHub',
            'github-client-secret'   => 'Segreto Cliente GitHub',
            'github-callback-url'    => 'URL Callback GitHub',
            'email-credentials'      => 'Credenziali Email',
            'mail-driver'            => 'Driver Email',
            'mail-host'              => 'Host Email',
            'mail-port'              => 'Porta Email',
            'mail-username'          => 'Nome Utente Email',
            'mail-password'          => 'Password Email',
            'mail-encryption'        => 'Crittografia Email',
        ],
    
        'tenant' => [
            'id'              => 'ID',
            'first-name'      => 'Nome',
            'last-name'       => 'Cognome',
            'email'           => 'Email',
            'skype'           => 'Skype',
            'c-name'          => 'CName',
            'add-address'     => 'Aggiungi Indirizzo',
            'country'         => 'Paese',
            'city'            => 'Città',
            'address1'        => 'Indirizzo 1',
            'address2'        => 'Indirizzo 2',
            'address'         => 'Elenco Indirizzi',
            'company'         => 'Azienda',
            'profile'         => 'Profilo',
            'update'          => 'Aggiorna',
            'address-details' => 'Dettagli Indirizzo',
            'create-failed'   => 'Avviso: Impossibile creare :attribute per motivi sconosciuti.',
            'update-success'  => 'Successo: :resource aggiornato con successo.',
            'update-failed'   => 'Avviso: Impossibile aggiornare :resource per motivi sconosciuti.',
    
            'company-address' => [
                'add-address-title'    => 'Nuovo Indirizzo',
                'update-address-title' => 'Aggiorna Indirizzo',
                'save-btn-title'       => 'Salva Indirizzo',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'Un ordine :order_id è stato effettuato da :placed_by il :created_at.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'Oops! La pagina che stai cercando è in vacanza. Sembra che non siamo riusciti a trovare ciò che stavi cercando.',
            'title'       => '404 Pagina Non Trovata',
        ],

        '401' => [
            'description' => 'Oops! Sembra che tu non abbia il permesso di accedere a questa pagina. Sembra che tu stia mancando delle credenziali necessarie.',
            'title'       => '401 Non Autorizzato',
        ],

        '403' => [
            'description' => 'Oops! Questa pagina è off-limits. Sembra che tu non abbia i permessi necessari per visualizzare questo contenuto.',
            'title'       => '403 Accesso Negato',
        ],

        '500' => [
            'description' => 'Oops! Qualcosa è andato storto. Sembra che stiamo avendo problemi nel caricare la pagina che stai cercando.',
            'title'       => '500 Errore del Server Interno',
        ],

        '503' => [
            'description' => 'Oops! Sembra che siamo temporaneamente in manutenzione. Ti preghiamo di riprovare tra un po\'.',
            'title'       => '503 Servizio Non Disponibile',
        ],
    ],
];
