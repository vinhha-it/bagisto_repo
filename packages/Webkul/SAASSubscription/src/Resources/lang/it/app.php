<?php

return [
    'super' => [
        'configuration' => [
            'index' => [
                'title' => 'Abbonamento',
                'info'  => 'Gestisci i dettagli del pagamento PayPal per l\'abbonamento.',

                'payment' => [
                    'title' => 'Impostazioni di Pagamento',
                    'info'  => 'Imposta dettagli di pagamento e prova.',

                    'trail-plan' => [
                        'title'     => 'Piano di Prova',
                        'info'      => 'Gestisci se desideri consentire il piano di prova e specifica il numero di giorni per il periodo di prova.',
                        'status'    => 'Consenti Prova',
                        'days'      => 'Giorni di Prova',
                        'plan-list' => 'Piano di Prova',
                    ],

                    'paypal' => [
                        'title'              => 'Paypal',
                        'info'               => 'Gestisci le tue credenziali di pagamento PayPal per facilitare i pagamenti dei piani di abbonamento.',
                        'sandbox-mode'       => 'Modalità Sandbox',
                        'merchant-paypal-id' => 'ID Commerciante PayPal',
                        'user-name'          => 'Nome Utente',
                        'password'           => 'Password',
                        'signature'          => 'Firma',
                    ],

                    'module-assignment' => [
                        'title'  => 'Impostazioni di Assegnazione Modulo',
                        'info'   => 'Gestisci l\'assegnazione dei moduli (addon Saas) per i piani di abbonamento.',
                        'status' => 'Stato',
                    ],
                ],
            ],
        ],

        'components' => [
            'layouts' => [
                'sidebar' => [
                    'subscription'    => 'Abbonamento',
                    'plans'           => 'Piani',
                    'purchased-plans' => 'Piani Acquistati',
                    'invoices'        => 'Fatture',
                ],
            ],
        ],

        'subscriptions' => [
            'plans' => [
                'index' => [
                    'title'      => 'Lista Piani',
                    'create-btn' => 'Crea Piano',
                    'datagrid'   => [
                        'id'             => 'ID',
                        'code'           => 'Codice',
                        'name'           => 'Nome',
                        'monthly-amount' => 'Importo Mensile',
                        'yearly-amount'  => 'Importo Annuale',
                        'status'         => 'Stato',
                        'active'         => 'Attivo',
                        'inactive'       => 'Inattivo',
                        'edit'           => 'Modifica',
                        'delete'         => 'Elimina',
                        'view'           => 'Visualizza',
                        'customer-email' => 'Email Cliente',
                        'customer-name'  => 'Nome Cliente',
                        'total'          => 'Totale',
                        'expired-on'     => 'Scadenza Il',
                        'created-at'     => 'Creato Il',
                        'company-name'   => 'Nome Azienda',
                        'plan-name'      => 'Piano',
                        'amount'         => 'Importo',
                        'period-unit'    => 'Unità Periodo',
                        'profile-state'  => 'Stato Profilo',
                    ],
                ],

                'create' => [
                    'add-title'                  => 'Aggiungi Piano',
                    'save-btn-title'             => 'Salva Piano',
                    'general'                    => 'Generale',
                    'code'                       => 'Codice',
                    'name'                       => 'Nome',
                    'description'                => 'Descrizione',
                    'billing-amount'             => 'Importo Fatturazione',
                    'monthly-amount'             => 'Importo Mensile',
                    'yearly-amount'              => 'Importo Annuale (Mese per Mese)',
                    'plan-limitation'            => 'Limitazione Piano',
                    'allowed-products'           => 'Prodotti Consentiti',
                    'allowed-categories'         => 'Categorie Consentite',
                    'allowed-attributes'         => 'Attributi Consentiti',
                    'allowed-attribute-families' => 'Famiglie di Attributi Consentite',
                    'allowed-channels'           => 'Canali Consentiti',
                    'allowed-orders'             => 'Ordini Consentiti',
                    'offers'                     => 'Offerte',
                    'active'                     => 'Attivo',
                    'inactive'                   => 'Inattivo',
                    'offer-title'                => 'Titolo',
                    'type'                       => 'Tipo',
                    'discount'                   => 'Sconto',
                    'fixed'                      => 'Fisso',
                    'price'                      => 'Prezzo',
                    'offer-status'               => 'Stato',
                    'module-assignment'          => 'Assegnazione Modulo',
                ],

                'edit' => [
                    'edit-title'                 => 'Modifica Piano',
                    'add-title'                  => 'Aggiungi Piano',
                    'save-btn-title'             => 'Salva Piano',
                    'general'                    => 'Generale',
                    'code'                       => 'Codice',
                    'name'                       => 'Nome',
                    'description'                => 'Descrizione',
                    'billing-amount'             => 'Importo Fatturazione',
                    'monthly-amount'             => 'Importo Mensile',
                    'yearly-amount'              => 'Importo Annuale (Mese per Mese)',
                    'plan-limitation'            => 'Limitazione Piano',
                    'allowed-products'           => 'Prodotti Consentiti',
                    'allowed-categories'         => 'Categorie Consentite',
                    'allowed-attributes'         => 'Attributi Consentiti',
                    'allowed-attribute-families' => 'Famiglie di Attributi Consentite',
                    'allowed-channels'           => 'Canali Consentiti',
                    'allowed-orders'             => 'Ordini Consentiti',
                    'offers'                     => 'Offerte',
                    'active'                     => 'Attivo',
                    'inactive'                   => 'Inattivo',
                    'offer-title'                => 'Titolo',
                    'type'                       => 'Tipo',
                    'discount'                   => 'Sconto',
                    'fixed'                      => 'Fisso',
                    'price'                      => 'Prezzo',
                    'offer-status'               => 'Stato',
                    'module-assignment'          => 'Assegnazione Modulo',
                ],
            ],
        ],

        'recurring-profiles' => [
            'index' => [
                'title'      => 'Piani Acquistati',
                'create-btn' => 'Crea Piano',

                'datagrid' => [
                    'company-name'  => 'Nome Azienda',
                    'id'            => 'ID',
                    'plan-name'     => 'Piano',
                    'amount'        => 'Importo',
                    'period-unit'   => 'Unità Periodo',
                    'profile-state' => 'Stato Profilo',
                    'created-at'    => 'Creato Il',
                    'view'          => 'Visualizza',
                ],
            ],

            'view' => [
                'title'                      => 'Piani Acquistati',
                'create-btn'                 => 'Crea Piano',
                'plan-info'                  => 'Informazioni Piano',
                'plan'                       => 'Piano',
                'plan-name'                  => 'Nome Piano',
                'expiration-date'            => 'Data Scadenza',
                'billing-amount'             => 'Importo Fatturazione',
                'billing-cycle'              => 'Ciclo Fatturazione',
                'monthly'                    => 'Mensile',
                'annual'                     => 'Annuale',
                'profile-id'                 => 'ID Profilo',
                'tin'                        => 'TIN',
                'profile-state'              => 'Stato Profilo',
                'next-billing-date'          => 'Prossima Data Fatturazione',
                'payment-details'            => 'Dettagli Pagamento',
                'offer-title'                => 'Offerta Piano',
                'offer-type'                 => 'Tipo Offerta',
                'offer-price'                => 'Prezzo Offerta',
                'reference-id'               => 'ID Riferimento',
                'plan-state'                 => 'Stato Piano',
                'plan-type'                  => 'Tipo Piano',
                'payment-status'             => 'Stato Pagamento',
                'schedule-description'       => 'Descrizione Schedule',
                'amount'                     => 'Importo',
                'payment-method'             => 'Metodo Pagamento',
                'features'                   => 'Caratteristiche',
                'allowed-products'           => 'Prodotti Consentiti',
                'allowed-categories'         => 'Categorie Consentite',
                'allowed-attributes'         => 'Attributi Consentiti',
                'allowed-attribute-families' => 'Famiglie di Attributi Consentite',
                'allowed-channels'           => 'Canali Consentiti',
                'allowed-orders'             => 'Ordini Consentiti',
            ],
        ],

        'tenants' => [
            'view' => [
                'title'      => 'Piani Acquistati',
                'create-btn' => 'Crea Piano',
                'datagrid'   => [
                    'company-name'  => 'Nome Azienda',
                    'id'            => 'ID',
                    'plan-name'     => 'Piano',
                    'amount'        => 'Importo',
                    'period-unit'   => 'Unità Periodo',
                    'profile-state' => 'Stato Profilo',
                    'created-at'    => 'Creato Il',
                    'view'          => 'Visualizza',
                ],
            ],
        ],

        'plans' => [
            'title'                      => 'Piani di abbonamento',
            'add-title'                  => 'Aggiungi piano',
            'edit-title'                 => 'Modifica piano',
            'create-success'             => 'Piano creato con successo.',
            'update-success'             => 'Piano aggiornato con successo.',
            'delete-success'             => 'Piano eliminato con successo.',
            'save-btn-title'             => 'Salva piano',
            'general'                    => 'Generale',
            'code'                       => 'Codice',
            'name'                       => 'Nome',
            'description'                => 'Descrizione',
            'billing-amount'             => 'Importo di fatturazione',
            'monthly-amount'             => 'Importo mensile',
            'yearly-amount'              => 'Importo annuale (mese per mese)',
            'plan-limitation'            => 'Limitazione del piano',
            'allowed-products'           => 'Prodotti consentiti',
            'allowed-categories'         => 'Categorie consentite',
            'allowed-attributes'         => 'Attributi consentiti',
            'allowed-attribute-families' => 'Famiglie di attributi consentite',
            'allowed-channels'           => 'Canali consentiti',
            'allowed-orders'             => 'Ordini consentiti',
            'name-too-long-error'        => 'Il nome del sottoscrittore è troppo lungo.',
            'description-too-long-error' => 'La descrizione del sottoscrittore è troppo lunga.',
            'payment-cancel'             => 'Hai annullato il pagamento.',
            'generic-error'              => 'Si è verificato un problema, riprova più tardi.',
            'profile-created-success'    => 'Profilo ricorrente creato con successo.',
            'assign-plan'                => 'Assegna piano',
            'assign'                     => 'Assegna',
            'plan'                       => 'Piano',
            'period-unit'                => 'Unità di periodo',
            'month'                      => 'Mensile',
            'year'                       => 'Annuale',
            'plan-activated'             => 'Piano attivato con successo.',
            'plan-cancelled-message'     => 'Piano cancellato con successo.',
            'general-error'              => 'Si è verificato un problema, riprova più tardi.',
            'cancel-plan'                => 'Annulla piano',
            'cancel-confirm-msg'         => 'Sei sicuro di voler cancellare questo piano?',
            'module-assignment-setting'  => 'Impostazione di assegnazione modulo',
            'module-assignment-status'   => 'Stato di assegnazione modulo',
            'module-assignment'          => 'Assegnazione modulo',
            'allow-modules'              => 'Consenti moduli',
            'offers'                     => 'Offerte',
            'offer-title'                => 'Titolo',
            'type'                       => 'Tipo',
            'price'                      => 'Sconto',
            'offer-status'               => 'Stato dell\'offerta',
        ],

        'invoices' => [
            'index' => [
                'title'    => 'Fatture di Abbonamento',
                'datagrid' => [
                    'id'             => 'Id',
                    'customer-name'  => 'Nome Cliente',
                    'customer-email' => 'Email Cliente',
                    'total'          => 'Totale',
                    'expire-on'      => 'Scadenza',
                    'created-at'     => 'Creato il',
                    'view'           => 'Visualizza',
                ],
            ],

            'view' => [
                'invoice-and-account'  => 'Fattura e Account',
                'invoice-id'           => 'ID Fattura',
                'profile-id'           => 'ID Profilo',
                'invoice-date'         => 'Data Fattura',
                'invoice-status'       => 'Stato Fattura',
                'customer-name'        => 'Nome Cliente',
                'customer-email'       => 'Email Cliente',
                'payment-detail'       => 'Dettagli Pagamento',
                'payment-state'        => 'Stato Pagamento',
                'payment-type'         => 'Tipo Pagamento',
                'payment-status'       => 'Stato Pagamento',
                'schedule-description' => 'Descrizione Programma',
                'tin'                  => 'Partita IVA',
                'amount'               => 'Importo',
                'payment-method'       => 'Metodo di Pagamento',
                'plan-information'     => 'Informazioni Piano',
                'sku'                  => 'SKU',
                'plan'                 => 'Piano',
                'expiration-date'      => 'Data di Scadenza',
                'sub-total'            => 'Sub Totale',
                'grand-total'          => 'Totale',
            ],
        ],
    ],

    'admin' => [
        'layouts' => [
            'subscription'                        => 'Abbonamento',
            'overview'                            => 'Panoramica',
            'plans'                               => 'Piani',
            'invoices'                            => 'Fatture',
            'history'                             => 'Storico Acquisti Piani',
            'purchase-plan-heading'               => 'Acquista un piano per procedere',
            'purchase-plan-notification'          => 'Si prega di acquistare un piano per continuare a utilizzare il servizio.',
            'trial-expired-heading'               => 'Il tuo periodo di prova è scaduto',
            'trial-expired-notification'          => 'Il tuo periodo di prova è scaduto il :date. Fai clic sul pulsante di seguito per scegliere il tuo piano.',
            'choose-plan'                         => 'Scegli Piano',
            'subscription-stopped-heading'        => 'La tua sottoscrizione è stata interrotta',
            'subscription-stopped-notification'   => 'La tua sottoscrizione è stata interrotta il :date. Sottoscrivi un nuovo piano per continuare i tuoi servizi. Fai clic sul pulsante di seguito per scegliere il tuo piano.',
            'subscription-suspended-heading'      => 'La tua sottoscrizione è stata sospesa',
            'subscription-suspended-notification' => 'La tua sottoscrizione è stata sospesa perché non siamo riusciti a processare il tuo pagamento. Contattaci per continuare i tuoi servizi o puoi sottoscrivere un nuovo piano.',
            'payment-due-heading'                 => 'Scadenza pagamento fattura',
            'payment-due-notification'            => 'Il pagamento della tua fatturazione di abbonamento è dovuto. Aggiorna il piano, Cambia piano o Contattaci per continuare i tuoi servizi.',
        ],

        'plans' => [
            'history' => [
                'title'    => 'Storico Acquisti Piani',
                'datagrid' => [
                    'title'         => 'Storico Acquisti Piani',
                    'id'            => 'Id',
                    'code'          => 'Codice',
                    'name'          => 'Nome',
                    'reference-id'  => 'ID di Riferimento',
                    'state'         => 'Stato',
                    'payment-type'  => 'Tipo di Pagamento',
                    'period-unit'   => 'Ciclo di Pagamento',
                    'amount'        => 'Importo Pagato',
                    'next-due-date' => 'Prossima Scadenza',
                ],
            ],

            'index' => [
                'title'                              => 'Piani di Abbonamento',
                'allowed-products'                   => ' Prodotto(i)',
                'allowed-categories'                 => ' Categoria(e)',
                'allowed-attributes'                 => ' Attributo(i)',
                'allowed-attribute-families'         => ' Famiglia(i) di Attributi',
                'allowed-channels'                   => ' Canale(i)',
                'allowed-orders'                     => ' Ordine(i)',
                'purchase'                           => 'Acquista',
                'plan-description'                   => 'Addebitato annualmente quando fatturato Annualmente o :amount al mese :-',
                'product-left-notification'          => ':remaining prodotti rimasti su :purchased, aggiorna il tuo piano per più prodotti.',
                'category-left-notification'         => ':remaining categorie rimaste su :purchased, aggiorna il tuo piano per più categorie.',
                'attribute-left-notification'        => ':remaining attributi rimasti su :purchased, aggiorna il tuo piano per più attributi.',
                'attribute-family-left-notification' => ':remaining famiglie di attributi rimaste su :purchased, aggiorna il tuo piano per più famiglie di attributi.',
                'channel-left-notification'          => ':remaining canali rimasti su :purchased, aggiorna il tuo piano per più canali.',
                'order-left-notification'            => ':remaining ordini rimasti su :purchased, aggiorna il tuo piano per più ordini.',
                'resource-limit-error'               => 'Questo piano consente solo :allowed :entity_name, ne hai già creati :used :entity_name.',
                'free-plan-activated'                => 'Piano gratuito attivato con successo.',
                'products'                           => 'Prodotti',
                'categories'                         => 'Categorie',
                'attributes'                         => 'Attributi',
                'attribute_families'                 => 'Famiglie di Attributi',
                'channels'                           => 'Canali',
                'orders'                             => 'Ordini',
                'allowed-modules'                    => 'Moduli Consentiti :-',
                'no-module-assign'                   => 'Avviso: Nessun modulo assegnato a questo piano.',
                'plan-not-available'                 => 'Nessun Piano disponibile',
                'not-activated-plans'                => 'Non hai ancora piani attivati.',
                'reference-id'                       => 'ID di Riferimento',
                'state'                              => 'Stato',
                'type'                               => 'Tipo',
                'payment-status'                     => 'Stato Pagamento',
                'schedule-description'               => 'Descrizione Programma',
                'tin'                                => 'Tin',
                'amount'                             => 'Importo',
                'payment-method'                     => 'Metodo di Pagamento',
                'assigned-plan'                      => 'Il tuo piano è stato assegnato.',
                'cancel-plan'                        => 'Il tuo piano è stato cancellato.',
                'change-plan'                        => 'Il tuo piano è stato modificato.',
                'assigned-plan-description'          => 'Un nuovo piano è stato assegnato a te per il dominio <b>:domain</b>',
                'cancel-plan-description'            => 'Il tuo piano è stato cancellato per il dominio <b>:domain</b>',
                'changed-plan-description'           => 'Il tuo piano è stato modificato per il dominio <b>:domain</b>',
                'new-plan'                           => ':name (nuovo piano)',
                'for-plan'                           => 'Nome piano <b>:name</b>',
                'plan-expired'                       => 'Il tuo Piano è Scaduto',
                'current-plan-expired'               => 'Il tuo piano attuale è scaduto per il dominio <b>:domain</b>',
            ],

            'overview' => [
                'title'                      => 'Piani di Abbonamento',
                'allowed-products'           => ' Prodotto(i)',
                'allowed-categories'         => ' Categoria(e)',
                'allowed-attributes'         => ' Attributo(i)',
                'allowed-attribute-families' => ' Famiglia(i) di Attributi',
                'allowed-channels'           => ' Canale(i)',
                'allowed-orders'             => ' Ordine(i)',
                'purchase'                   => 'Acquista',
                'products'                   => 'Prodotti',
                'categories'                 => 'Categorie',
                'attributes'                 => 'Attributi',
                'attribute_families'         => 'Famiglie di Attributi',
                'channels'                   => 'Canali',
                'orders'                     => 'Ordini',
                'allowed-modules'            => 'Moduli Consentiti :-',
                'no-module-assign'           => 'Avviso: Nessun modulo assegnato a questo piano.',
                'plan-not-available'         => 'Nessun Piano disponibile',
                'not-activated-plans'        => 'Non hai ancora piani attivati.',
                'reference-id'               => 'ID di Riferimento',
                'state'                      => 'Stato',
                'type'                       => 'Tipo',
                'payment-status'             => 'Stato Pagamento',
                'schedule-description'       => 'Descrizione Programma',
                'tin'                        => 'Tin',
                'amount'                     => 'Importo',
                'payment-method'             => 'Metodo di Pagamento',
                'title'                      => 'Panoramica del Piano',
                'plan-info'                  => 'Informazioni Piano',
                'plan'                       => 'Piano',
                'plan-name'                  => ':plan - (Prova)',
                'expiration-date'            => 'Data di Scadenza',
                'billing-amount'             => 'Importo Fatturato',
                'billing-cycle'              => 'Ciclo di Fatturazione',
                'monthly'                    => 'Mensile',
                'annual'                     => 'Annuale',
                'profile-id'                 => 'ID Profilo',
                'profile-status'             => 'Stato Profilo',
                'next-billing-date'          => 'Prossima Data di Fatturazione',
                'profile-state'              => 'Stato Profilo',
                'payment-status'             => 'Stato Pagamento',
                'features'                   => 'Caratteristiche',
                'assign-modules'             => 'Sezione Moduli Assegnati',
                'info-assign-modules'        => 'Moduli Assegnati',
                'text-bagisto'               => 'Bagisto :extension Estensione',
                'payment-details'            => 'Dettagli Pagamento',
                'offer'                      => [
                    'title' => 'Titolo',
                    'type'  => 'Tipo Sconto',
                    'price' => 'Prezzo',
                ],
            ],
        ],

        'checkout' => [
            'title'                     => 'Pagamento',
            'billing-address'           => 'Indirizzo di Fatturazione',
            'tin'                       => 'Partita IVA',
            'first-name'                => 'Nome',
            'last-name'                 => 'Cognome',
            'email'                     => 'Email',
            'address1'                  => 'Indirizzo 1',
            'address2'                  => 'Indirizzo 2',
            'city'                      => 'Città',
            'postcode'                  => 'Codice Postale',
            'state'                     => 'Stato',
            'select-state'              => 'Seleziona stato/regione',
            'country'                   => 'Paese',
            'payment-information'       => 'Informazioni di Pagamento',
            'summary'                   => 'Riepilogo',
            'billing-cycle'             => 'Ciclo di Fatturazione',
            'month'                     => 'Mese',
            'year'                      => 'Anno',
            'annual'                    => 'Annuale',
            'plan'                      => 'Piano',
            'subtotal'                  => 'Subtotale (Inclusi IVA)',
            'plan-option-label-monthly' => ':plan - :amount al mese',
            'plan-option-label-yearly'  => ':plan - :amount all\'anno',
            'success-activated-plan'    => 'Successo: :plan_name attivato con successo.',
        ],

        'invoices' => [
            'title' => 'Fatture',
            'view'  => [
                'id'                   => 'ID',
                'plan'                 => 'Piano',
                'customer-name'        => 'Nome Cliente',
                'invoice-and-account'  => 'Fattura e Account',
                'invoice-id'           => 'ID Fattura',
                'profile-id'           => 'ID Profilo',
                'invoice-date'         => 'Data Fattura',
                'invoice-status'       => 'Stato Fattura',
                'customer-name'        => 'Nome Cliente',
                'customer-email'       => 'Email Cliente',
                'reference-id'         => 'ID di Riferimento',
                'plan-state'           => 'Stato Piano',
                'plan-type'            => 'Tipo Piano',
                'payment-status'       => 'Stato Pagamento',
                'payment-detail'       => 'Dettaglio Pagamento',
                'payment-state'        => 'Stato Pagamento',
                'payment-type'         => 'Tipo Pagamento',
                'schedule-description' => 'Descrizione Programma',
                'tin'                  => 'TIN',
                'amount'               => 'Importo',
                'payment-method'       => 'Metodo di Pagamento',
                'plan-info'            => 'Informazioni Piano',
                'sku'                  => 'SKU',
                'expiration-date'      => 'Data di Scadenza',
                'sub-total'            => 'Subtotale',
                'grand-total'          => 'Totale',
            ],

            'datagrid' => [
                'id'             => 'ID',
                'customer-name'  => 'Nome Cliente',
                'customer-email' => 'Email Cliente',
                'total'          => 'Totale',
                'expire-on'      => 'Scadenza il',
                'created-at'     => 'Creato il',
                'view'           => 'Visualizza',
            ],
        ],
    ],
];
