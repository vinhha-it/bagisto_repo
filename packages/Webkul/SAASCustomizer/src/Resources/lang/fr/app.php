<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'Version : :version',
                'account-title' => 'Compte',
                'logout'        => 'Déconnexion',
                'my-account'    => 'Mon Compte',
                'visit-shop'    => 'Visiter la boutique',
            ],
    
            'sidebar' => [
                'tenants'          => 'Locataires',
                'tenant-customers' => 'Clients',
                'tenant-products'  => 'Produits',
                'tenant-orders'    => 'Commandes',
                'settings'         => 'Paramètres',
                'agents'           => 'Agents',
                'roles'            => 'Rôles',
                'locales'          => 'Langues',
                'currencies'       => 'Devises',
                'channels'         => 'Canaux',
                'exchange-rates'   => 'Taux de change',
                'themes'           => 'Thèmes',
                'cms'              => 'CMS',
                'configurations'   => 'Configurer',
                'general'          => 'Général',
                'send-email'       => 'Envoyer un e-mail',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'Locataires',
            'create'         => 'Ajouter',
            'edit'           => 'Modifier',
            'delete'         => 'Supprimer',
            'cancel'         => 'Annuler',
            'view'           => 'Afficher',
            'mass-delete'    => 'Suppression en masse',
            'mass-update'    => 'Mise à jour en masse',
            'customers'      => 'Clients',
            'products'       => 'Produits',
            'orders'         => 'Commandes',
            'settings'       => 'Paramètres',
            'agents'         => 'Agents',
            'roles'          => 'Rôles',
            'locales'        => 'Paramètres régionaux',
            'currencies'     => 'Devises',
            'exchange-rates' => 'Taux de change',
            'channels'       => 'Canaux',
            'themes'         => 'Thèmes',
            'send-email'     => 'Envoyer un e-mail',
            'cms'            => 'CMS',
            'configuration'  => 'Configuration',
            'download'       => 'Télécharger',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => 'Connexion Super Administrateur',
                'email'                => 'Adresse e-mail',
                'password'             => 'Mot de passe',
                'btn-submit'           => 'Se connecter',
                'forget-password-link' => 'Mot de passe oublié ?',
                'submit-btn'           => 'Se connecter',
                'login-success'        => 'Succès : Vous êtes connecté avec succès.',
                'login-error'          => 'Veuillez vérifier vos identifiants et réessayer.',
                'activate-warning'     => 'Votre compte doit encore être activé, veuillez contacter l\'administrateur.',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'Mot de passe oublié',
                    'title'           => 'Récupérer le mot de passe',
                    'email'           => 'E-mail enregistré',
                    'reset-link-sent' => 'Lien de réinitialisation du mot de passe envoyé',
                    'sign-in-link'    => 'Retour à la connexion ?',
                    'email-not-exist' => 'E-mail inexistant',
                    'submit-btn'      => 'Réinitialiser',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'Réinitialiser le mot de passe',
                'back-link-title'  => 'Retour à la connexion ?',
                'confirm-password' => 'Confirmer le mot de passe',
                'email'            => 'E-mail enregistré',
                'password'         => 'Mot de passe',
                'submit-btn'       => 'Réinitialiser le mot de passe',
            ],
        ],

        'tenants' => [
            'index' => [
                'title'        => 'Liste des locataires',
                'register-btn' => 'Enregistrer le locataire',

                'create' => [
                    'title'             => 'Créer un locataire',
                    'first-name'        => 'Prénom',
                    'last-name'         => 'Nom de famille',
                    'user-name'         => 'Nom d\'utilisateur',
                    'organization-name' => 'Nom de l\'organisation',
                    'phone'             => 'Téléphone',
                    'email'             => 'Email',
                    'password'          => 'Mot de passe',
                    'confirm-password'  => 'Confirmer le mot de passe',
                    'save-btn'          => 'Enregistrer le locataire',
                    'back-btn'          => 'Retour',
                ],

                'datagrid' => [
                    'id'                  => 'Id',
                    'user-name'           => 'Nom d\'utilisateur',
                    'organization'        => 'Organisation',
                    'domain'              => 'Domaine',
                    'cname'               => 'NomC',
                    'status'              => 'Statut',
                    'active'              => 'Actif',
                    'disable'             => 'Désactiver',
                    'view'                => 'Voir les informations',
                    'edit'                => 'Modifier le locataire',
                    'delete'              => 'Supprimer le locataire',
                    'mass-delete'         => 'Suppression en masse',
                    'mass-delete-success' => 'Locataire sélectionné supprimé avec succès',
                ],
            ],

            'edit' => [
                'title'             => 'Modifier le locataire',
                'first-name'        => 'Prénom',
                'last-name'         => 'Nom de famille',
                'user-name'         => 'Nom d\'utilisateur',
                'cname'             => 'NomC',
                'organization-name' => 'Nom de l\'organisation',
                'phone'             => 'Téléphone',
                'status'            => 'Statut',
                'email'             => 'Email',
                'password'          => 'Mot de passe',
                'confirm-password'  => 'Confirmer le mot de passe',
                'save-btn'          => 'Enregistrer le locataire',
                'back-btn'          => 'Retour',
                'general'           => 'Général',
                'settings'          => 'Paramètres',
            ],

            'view' => [
                'title'                        => 'Informations sur le locataire',
                'heading'                      => 'Locataire - :tenant_name',
                'email-address'                => 'Adresse email',
                'phone'                        => 'Téléphone',
                'domain-information'           => 'Informations sur le domaine',
                'mapped-domain'                => 'Domaine mappé',
                'cname-information'            => 'Informations sur le NomC',
                'cname-entry'                  => 'Entrée NomC',
                'attribute-information'        => 'Informations sur les attributs',
                'no-of-attributes'             => 'Nombre d\'attributs',
                'attribute-family-information' => 'Informations sur la famille d\'attributs',
                'no-of-attribute-families'     => 'Nombre de familles d\'attributs',
                'product-information'          => 'Informations sur les produits',
                'no-of-products'               => 'Nombre de produits',
                'customer-information'         => 'Informations sur les clients',
                'no-of-customers'              => 'Nombre de clients',
                'customer-group-information'   => 'Informations sur le groupe de clients',
                'no-of-customer-groups'        => 'Nombre de groupes de clients',
                'category-information'         => 'Informations sur les catégories',
                'no-of-categories'             => 'Nombre de catégories',
                'addresses'                    => 'Liste des adresses (:count)',
                'empty-title'                  => 'Ajouter une adresse de locataire',
            ],

            'create-success' => 'Locataire créé avec succès',
            'delete-success' => 'Locataire supprimé avec succès',
            'delete-failed'  => 'Erreur lors de la suppression du locataire.',
            'product-copied' => 'Locataire copié avec succès',
            'update-success' => 'Locataire mis à jour avec succès',
        
            'customers' => [
                'index' => [
                    'title' => 'Liste des clients',
        
                    'datagrid' => [
                        'id'             => 'Id',
                        'domain'         => 'Domaine',
                        'customer-name'  => 'Nom du client',
                        'email'          => 'Email',
                        'customer-group' => 'Groupe de clients',
                        'phone'          => 'Téléphone',
                        'status'         => 'Statut',
                        'active'         => 'Actif',
                        'inactive'       => 'Inactif',
                        'is-suspended'   => 'Suspendue',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => 'Liste des produits',
        
                    'datagrid' => [
                        'id'               => 'Id',
                        'domain'           => 'Domaine',
                        'name'             => 'Nom',
                        'sku'              => 'SKU',
                        'attribute-family' => 'Famille d\'attributs',
                        'image'            => 'Image',
                        'price'            => 'Prix',
                        'qty'              => 'Quantité',
                        'status'           => 'Statut',
                        'active'           => 'Actif',
                        'inactive'         => 'Inactif',
                        'category'         => 'Catégorie',
                        'type'             => 'Type',
                    ],
                ],
            ],
        
            'orders' => [
                'index' => [
                    'title' => 'Liste des commandes',
        
                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => 'Identifiant de la commande',
                        'domain'          => 'Domaine',
                        'sub-total'       => 'Sous-total',
                        'grand-total'     => 'Total général',
                        'order-date'      => 'Date de la commande',
                        'channel-name'    => 'Nom du canal',
                        'status'          => 'Statut',
                        'processing'      => 'Traitement',
                        'completed'       => 'Terminé',
                        'canceled'        => 'Annulé',
                        'closed'          => 'Fermé',
                        'pending'         => 'En attente',
                        'pending-payment' => 'Paiement en attente',
                        'fraud'           => 'Fraude',
                        'customer'        => 'Client',
                        'email'           => 'Email',
                        'location'        => 'Emplacement',
                        'images'          => 'Images',
                        'pay-by'          => 'Payer par - ',
                        'pay-via'         => 'Payer via',
                        'date'            => 'Date',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'Liste des agents',
                    'register-btn' => 'Créer un agent',
            
                    'create' => [
                        'title'             => 'Créer un agent',
                        'first-name'        => 'Prénom',
                        'last-name'         => 'Nom de famille',
                        'email'             => 'Email',
                        'current-password'  => 'Mot de passe actuel',
                        'password'          => 'Mot de passe',
                        'confirm-password'  => 'Confirmer le mot de passe',
                        'role'              => 'Rôle',
                        'select'            => 'Sélectionner',
                        'status'            => 'Statut',
                        'save-btn'          => 'Enregistrer l\'agent',
                        'back-btn'          => 'Retour',
                        'upload-image-info' => 'Téléchargez une image de profil (110px X 110px) au format PNG ou JPG',
                    ],
            
                    'edit' => [
                        'title' => 'Modifier l\'agent',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Id',
                        'name'    => 'Nom',
                        'email'   => 'Email',
                        'role'    => 'Rôle',
                        'status'  => 'Statut',
                        'active'  => 'Actif',
                        'disable' => 'Désactiver',
                        'actions' => 'Actions',
                        'edit'    => 'Modifier',
                        'delete'  => 'Supprimer',
                    ],
                ],
            
                'create-success'             => 'Succès : Super admin agent créé avec succès',
                'delete-success'             => 'Agent supprimé avec succès',
                'delete-failed'              => 'Échec de la suppression de l\'agent',
                'cannot-change'              => 'Le nom de l\'agent :name ne peut pas être modifié',
                'product-copied'             => 'Agent copié avec succès',
                'update-success'             => 'Agent mis à jour avec succès',
                'invalid-password'           => 'Le mot de passe actuel que vous avez saisi est incorrect',
                'last-delete-error'          => 'Avertissement : Au moins un super admin agent est requis',
                'login-delete-error'         => 'Attention : Vous ne pouvez pas supprimer votre propre compte.',
                'administrator-delete-error' => 'Attention : Au moins un super admin agent avec un accès administrateur est requis',
            ],
            
            'roles' => [
                'index' => [
                    'title'      => 'Liste des rôles',
                    'create-btn' => 'Créer un rôle',
            
                    'datagrid' => [
                        'id'              => 'Id',
                        'name'            => 'Nom',
                        'permission-type' => 'Type de permission',
                        'actions'         => 'Actions',
                        'edit'            => 'Modifier',
                        'delete'          => 'Supprimer',
                    ],
                ],
            
                'create' => [
                    'access-control' => 'Contrôle d\'accès',
                    'all'            => 'Tout',
                    'back-btn'       => 'Retour',
                    'custom'         => 'Personnalisé',
                    'description'    => 'Description',
                    'general'        => 'Général',
                    'name'           => 'Nom',
                    'permissions'    => 'Permissions',
                    'save-btn'       => 'Enregistrer le rôle',
                    'title'          => 'Créer un rôle',
                ],
            
                'edit' => [
                    'access-control' => 'Contrôle d\'accès',
                    'all'            => 'Tout',
                    'back-btn'       => 'Retour',
                    'custom'         => 'Personnalisé',
                    'description'    => 'Description',
                    'general'        => 'Général',
                    'name'           => 'Nom',
                    'permissions'    => 'Permissions',
                    'save-btn'       => 'Enregistrer le rôle',
                    'title'          => 'Modifier le rôle',
                ],
            
                'being-used'        => 'Le rôle est déjà utilisé par un autre agent',
                'last-delete-error' => 'Le dernier rôle ne peut pas être supprimé',
                'create-success'    => 'Rôle créé avec succès',
                'delete-success'    => 'Rôle supprimé avec succès',
                'delete-failed'     => 'Échec de la suppression du rôle',
                'update-success'    => 'Rôle mis à jour avec succès',
            ],
            
            'locales' => [
                'index' => [
                    'title'      => 'Liste des locales',
                    'create-btn' => 'Créer une locale',
            
                    'create' => [
                        'title'            => 'Créer une locale',
                        'code'             => 'Code',
                        'name'             => 'Nom',
                        'direction'        => 'Direction',
                        'select-direction' => 'Sélectionner la direction',
                        'text-ltr'         => 'Gauche à droite',
                        'text-rtl'         => 'Droite à gauche',
                        'locale-logo'      => 'Logo de la locale',
                        'logo-size'        => 'La résolution de l\'image doit être de 24px X 16px',
                        'save-btn'         => 'Enregistrer la locale',
                    ],
            
                    'edit' => [
                        'title'     => 'Modifier la locale',
                        'code'      => 'Code',
                        'name'      => 'Nom',
                        'direction' => 'Direction',
                    ],
            
                    'datagrid' => [
                        'id'        => 'Id',
                        'code'      => 'Code',
                        'name'      => 'Nom',
                        'direction' => 'Direction',
                        'text-ltr'  => 'Gauche à droite',
                        'text-rtl'  => 'Droite à gauche',
                        'actions'   => 'Actions',
                        'edit'      => 'Modifier',
                        'delete'    => 'Supprimer',
                    ],
                ],

                'being-used'        => 'La locale :locale_name est utilisée comme locale par défaut dans le canal',
                'create-success'    => 'Locale créée avec succès',
                'update-success'    => 'Locale mise à jour avec succès',
                'delete-success'    => 'Locale supprimée avec succès',
                'delete-failed'     => 'Échec de la suppression de la locale',
                'last-delete-error' => 'Au moins une super admin locale est requise',
            ],

            'currencies' => [
                'index' => [
                    'title'      => 'Liste des devises',
                    'create-btn' => 'Créer une devise',

                    'create' => [
                        'title'    => 'Créer une devise',
                        'code'     => 'Code',
                        'name'     => 'Nom',
                        'symbol'   => 'Symbole',
                        'decimal'  => 'Décimal',
                        'save-btn' => 'Enregistrer la devise',
                    ],

                    'edit' => [
                        'title'    => 'Modifier la devise',
                        'code'     => 'Code',
                        'name'     => 'Nom',
                        'symbol'   => 'Symbole',
                        'decimal'  => 'Décimal',
                        'save-btn' => 'Enregistrer la devise',
                    ],

                    'datagrid' => [
                        'id'      => 'Id',
                        'code'    => 'Code',
                        'name'    => 'Nom',
                        'actions' => 'Actions',
                        'edit'    => 'Modifier',
                        'delete'  => 'Supprimer',
                    ],
                ],

                'create-success'      => 'Devise créée avec succès.',
                'update-success'      => 'Devise mise à jour avec succès.',
                'delete-success'      => 'Devise supprimée avec succès.',
                'delete-failed'       => 'Échec de la suppression de la devise',
                'last-delete-error'   => 'Au moins une devise du super administrateur est requise.',
                'mass-delete-success' => 'Devises sélectionnées supprimées avec succès',
            ],

            'exchange-rates' => [
                'index' => [
                    'title'        => 'Taux de change',
                    'create-btn'   => 'Créer un taux de change',
                    'update-rates' => 'Mettre à jour les taux',

                    'create' => [
                        'title'                  => 'Créer un taux de change',
                        'source-currency'        => 'Devise source',
                        'target-currency'        => 'Devise cible',
                        'select-target-currency' => 'Sélectionner la devise cible',
                        'rate'                   => 'Taux',
                        'save-btn'               => 'Enregistrer le taux de change',
                    ],

                    'edit' => [
                        'title'           => 'Modifier le taux de change',
                        'source-currency' => 'Devise source',
                        'target-currency' => 'Devise cible',
                        'rate'            => 'Taux',
                        'save-btn'        => 'Enregistrer le taux de change',
                    ],

                    'datagrid' => [
                        'id'            => 'Id',
                        'currency-name' => 'Nom de la devise',
                        'exchange-rate' => 'Taux de change',
                        'actions'       => 'Actions',
                        'edit'          => 'Modifier',
                        'delete'        => 'Supprimer',
                    ],
                ],

                'create-success' => 'Taux de change créé avec succès.',
                'update-success' => 'Taux de change mis à jour avec succès.',
                'delete-success' => 'Taux de change supprimé avec succès.',
                'delete-failed'  => 'Échec de la suppression du taux de change',
            ],

            'channels' => [
                'index' => [
                    'title' => 'Canaux',

                    'datagrid' => [
                        'id'       => 'Id',
                        'code'     => 'Code',
                        'name'     => 'Nom',
                        'hostname' => "Nom d'hôte",
                        'actions'  => 'Actions',
                        'edit'     => 'Modifier',
                        'delete'   => 'Supprimer',
                    ],
                ],

                'edit' => [
                    'title'                  => 'Modifier le canal',
                    'back-btn'               => 'Retour',
                    'save-btn'               => 'Enregistrer le canal',
                    'general'                => 'Général',
                    'code'                   => 'Code',
                    'name'                   => 'Nom',
                    'description'            => 'Description',
                    'hostname'               => "Nom d'hôte",
                    'hostname-placeholder'   => 'https://www.example.com (Ne pas ajouter de barre oblique à la fin.)',
                    'design'                 => 'Design',
                    'theme'                  => 'Thème',
                    'logo'                   => 'Logo',
                    'logo-size'              => "La résolution de l'image doit être de 192px X 50px",
                    'favicon'                => 'Favicon',
                    'favicon-size'           => "La résolution de l'image doit être de 16px X 16px",
                    'seo'                    => "SEO de la page d'accueil",
                    'seo-title'              => 'Meta title',
                    'seo-description'        => 'Meta description',
                    'seo-keywords'           => 'Meta keywords',
                    'currencies-and-locales' => 'Devises et paramètres régionaux',
                    'locales'                => 'Paramètres régionaux',
                    'default-locale'         => 'Langue par défaut',
                    'currencies'             => 'Devises',
                    'default-currency'       => 'Devise par défaut',
                    'last-delete-error'      => 'Au moins un canal est requis.',
                    'settings'               => 'Paramètres',
                    'status'                 => 'Statut',
                    'update-success'         => 'Mise à jour du canal réussie',
                ],

                'update-success' => 'Canal mis à jour avec succès.',
                'delete-success' => 'Canal supprimé avec succès.',
                'delete-failed'  => 'Échec de la suppression du canal',
            ],

            'themes' => [
                'index' => [
                    'create-btn' => 'Créer un thème',
                    'title'      => 'Thèmes',
            
                    'datagrid' => [
                        'active'       => 'Actif',
                        'channel_name' => 'Nom du canal',
                        'delete'       => 'Supprimer',
                        'inactive'     => 'Inactif',
                        'id'           => 'Id',
                        'name'         => 'Nom',
                        'status'       => 'Statut',
                        'sort-order'   => 'Ordre de tri',
                        'type'         => 'Type',
                        'view'         => 'Vue',
                    ],
                ],
            
                'create' => [
                    'name'       => 'Nom',
                    'save-btn'   => 'Enregistrer le thème',
                    'sort-order' => 'Ordre de tri',
                    'title'      => 'Créer un thème',
            
                    'type' => [
                        'footer-links'     => 'Liens de pied de page',
                        'image-carousel'   => 'Carrousel d\'images',
                        'product-carousel' => 'Carrousel de produits',
                        'static-content'   => 'Contenu statique',
                        'services-content' => 'Contenu des services',
                        'title'            => 'Type',
                    ],
                ],
    
                'edit' => [
                    'add-image-btn'                 => 'Ajouter une image',
                    'add-filter-btn'                => 'Ajouter un filtre',
                    'add-footer-link-btn'           => 'Ajouter un lien de pied de page',
                    'add-link'                      => 'Ajouter un lien',
                    'asc'                           => 'Asc',
                    'back'                          => 'Retour',
                    'category-carousel-description' => 'Affichez de manière attrayante des catégories dynamiques à l\'aide d\'un carrousel de catégories réactif.',
                    'category-carousel'             => 'Carrousel de catégories',
                    'create-filter'                 => 'Créer un filtre',
                    'css'                           => 'CSS',
                    'column'                        => 'Colonne',
                    'channels'                      => 'Canaux',
                    'desc'                          => 'Desc',
                    'delete'                        => 'Supprimer',
                    'edit'                          => 'Modifier',
                    'footer-title'                  => 'Titre',
                    'footer-link'                   => 'Liens de pied de page',
                    'footer-link-form-title'        => 'Lien de pied de page',
                    'filter-title'                  => 'Titre',
                    'filters'                       => 'Filtres',
                    'footer-link-description'       => 'Naviguez via les liens de pied de page pour une exploration et une recherche d\'informations sans heurts.',
                    'general'                       => 'Général',
                    'html'                          => 'HTML',
                    'image'                         => 'Image',
                    'image-size'                    => 'La résolution de l\'image doit être (1920px X 700px)',
                    'image-title'                   => 'Titre de l\'image',
                    'image-upload-message'          => 'Seules les images (.jpeg, .jpg, .png, .webp, ..) sont autorisées.',
                    'key'                           => 'Clé : :key',
                    'key-input'                     => 'Clé',
                    'link'                          => 'Lien',
                    'limit'                         => 'Limite',
                    'name'                          => 'Nom',
                    'product-carousel'              => 'Carrousel de produits',
                    'product-carousel-description'  => 'Présentez élégamment les produits avec un carrousel de produits dynamique et réactif.',
                    'path'                          => 'Chemin',
                    'preview'                       => 'Aperçu',
                    'slider'                        => 'Curseur',
                    'static-content-description'    => 'Améliorez l\'engagement avec un contenu statique concis et informatif pour votre public.',
                    'static-content'                => 'Contenu statique',
                    'slider-description'            => 'Personnalisation du thème liée au curseur.',
                    'slider-required'               => 'Le champ du curseur est obligatoire.',
                    'slider-add-btn'                => 'Ajouter un curseur',
                    'save-btn'                      => 'Enregistrer',
                    'sort'                          => 'Trier',
                    'sort-order'                    => 'Ordre de tri',
                    'status'                        => 'Statut',
                    'slider-image'                  => 'Image du curseur',
                    'select'                        => 'Sélectionner',
                    'title'                         => 'Modifier le thème',
                    'update-slider'                 => 'Mettre à jour le curseur',
                    'url'                           => 'URL',
                    'value-input'                   => 'Valeur',
                    'value'                         => 'Valeur : :value',
                
                    'services-content' => [
                        'add-btn'            => 'Ajouter des services',
                        'channels'           => 'Canaux',
                        'delete'             => 'Supprimer',
                        'description'        => 'Description',
                        'general'            => 'Général',
                        'name'               => 'Nom',
                        'save-btn'           => 'Enregistrer',
                        'service-icon'       => 'Icône du service',
                        'service-icon-class' => 'Classe d\'icône de service',
                        'service-info'       => 'Personnalisation du thème liée au service.',
                        'services'           => 'Services',
                        'sort-order'         => 'Ordre de tri',
                        'status'             => 'Statut',
                        'title'              => 'Titre',
                        'update-service'     => 'Mettre à jour les services',
                    ],
                ],
                
                'create-success' => 'Thème créé avec succès',
                'delete-success' => 'Thème supprimé avec succès',
                'update-success' => 'Thème mis à jour avec succès',
                'delete-failed'  => 'Erreur rencontrée lors de la suppression du contenu du thème.',
            ],

            'email' => [
                'create' => [
                    'send-btn'                  => 'Envoyer l\'e-mail',
                    'back-btn'                  => 'Retour',
                    'title'                     => 'Envoyer un e-mail',
                    'general'                   => 'Général',
                    'body'                      => 'Corps',
                    'subject'                   => 'Sujet',
                    'dear'                      => 'Cher :agent_name',
                    'agent-registration'        => 'Agent Saas enregistré avec succès',
                    'summary'                   => 'Votre compte a été créé. Vos détails de compte sont les suivants :',
                    'saas-url'                  => 'Domaine',
                    'email'                     => 'E-mail',
                    'password'                  => 'Mot de passe',
                    'sign-in'                   => 'Se connecter',
                    'thanks'                    => 'Merci !',
                    'send-email-to-all-tenants' => 'Envoyer un e-mail à tous les locataires',
                ],
            
                'send-success' => 'E-mail envoyé avec succès.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'Liste des pages CMS',
                'create-btn' => 'Créer une page',
        
                'datagrid' => [
                    'id'                  => 'Id',
                    'page-title'          => 'Titre de la page',
                    'url-key'             => 'Clé URL',
                    'status'              => 'Statut',
                    'active'              => 'Actif',
                    'disable'             => 'Désactiver',
                    'edit'                => 'Modifier la page',
                    'delete'              => 'Supprimer la page',
                    'mass-delete'         => 'Supprimer en masse',
                    'mass-delete-success' => 'Les pages CMS sélectionnées ont été supprimées avec succès',
                ],
            ],
        
            'create' => [
                'title'            => 'Créer une page CMS',
                'first-name'       => 'Prénom',
                'general'          => 'Général',
                'page-title'       => 'Titre',
                'channels'         => 'Canaux',
                'content'          => 'Contenu',
                'meta-keywords'    => 'Mots-clés méta',
                'meta-description' => 'Description méta',
                'meta-title'       => 'Titre méta',
                'seo'              => 'SEO',
                'url-key'          => 'Clé URL',
                'description'      => 'Description',
                'save-btn'         => 'Enregistrer la page CMS',
                'back-btn'         => 'Retour',
            ],
        
            'edit' => [
                'title'            => 'Modifier la page',
                'preview-btn'      => 'Aperçu de la page',
                'save-btn'         => 'Enregistrer la page',
                'general'          => 'Général',
                'page-title'       => 'Titre de la page',
                'back-btn'         => 'Retour',
                'channels'         => 'Canaux',
                'content'          => 'Contenu',
                'seo'              => 'SEO',
                'meta-keywords'    => 'Mots-clés méta',
                'meta-description' => 'Description méta',
                'meta-title'       => 'Titre méta',
                'url-key'          => 'Clé URL',
                'description'      => 'Description',
            ],
        
            'create-success' => 'CMS créé avec succès.',
            'delete-success' => 'CMS supprimé avec succès.',
            'update-success' => 'CMS mis à jour avec succès.',
            'no-resource'    => "La ressource n'existe pas.",
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => 'Supprimer',
                'enable-at-least-one-shipping' => "Activer au moins une méthode d'expédition.",
                'enable-at-least-one-payment'  => 'Activer au moins une méthode de paiement.',
                'save-btn'                     => 'Enregistrer la configuration',
                'save-message'                 => 'Configuration enregistrée avec succès',
                'title'                        => 'Configuration',
        
                'general' => [
                    'info'  => 'Gérer la disposition et les détails des e-mails',
                    'title' => 'Général',
        
                    'design' => [
                        'info'  => "Définir le logo et l'icône favicon.",
                        'title' => 'Design',
        
                        'super' => [
                            'info'          => "Le logo du super admin est l'image distinctive ou l'emblème représentant l'interface d'administration d'un système ou d'un site web, souvent personnalisable.",
                            'admin-logo'    => 'Logo administrateur',
                            'logo-image'    => 'Image du logo',
                            'favicon-image' => 'Image favicon',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => "Définir l'adresse e-mail du super administrateur.",
                        'title' => 'Super Agent',
        
                        'super' => [
                            'info'          => "Définir l'adresse e-mail du super administrateur pour recevoir les notifications par e-mail",
                            'email-address' => 'Adresse e-mail',
                        ],

                        'social-connect' => [
                            'title'    => 'Connexion sociale',
                            'info'     => "Les plateformes de médias sociaux offrent des opportunités d'interaction directe avec votre public via des commentaires, des likes et des partages, favorisant ainsi l'engagement et la création d'une communauté autour de votre marque.",
                            'facebook' => 'Facebook',
                            'twitter'  => 'Twitter',
                            'linkedin' => 'LinkedIn',
                        ],
                    ],
        
                    'content' => [
                        'info'   => "Définir les informations d'en-tête et de pied de page pour la disposition d'inscription du locataire.",
                        'title'  => 'Contenu',
        
                        'footer' => [
                            'info'           => 'Définir le contenu du pied de page',
                            'title'          => 'Pied de page',
                            'footer-content' => 'Texte du pied de page',
                            'footer-toggle'  => 'Basculer le pied de page',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => "Gérer les détails des ventes, de l'expédition et des méthodes de paiement",
                    'title' => 'Ventes',
        
                    'shipping-methods' => [
                        'info'  => "Définir les informations des méthodes d'expédition",
                        'title' => "Méthodes d'expédition",
                    ],
        
                    'payment-methods' => [
                        'info'  => 'Définir les informations des méthodes de paiement',
                        'title' => 'Méthodes de paiement',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => "Activer au moins une méthode d'expédition.",
            'enable-at-least-one-payment'  => "Activer au moins une méthode de paiement.",
            'save-message'                 => "Succès : Configuration du super administrateur enregistrée avec succès.",
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => "S\'inscrire en tant que locataire",
            ],
    
            'footer' => [
                'footer-text'     => '© Copyright 2010 - 2023, Webkul Software (enregistré en Inde). Tous droits réservés.',
                'connect-with-us' => 'Connectez-vous avec nous',
                'text-locale'     => 'Langue',
                'text-currency'   => 'Devise',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => 'Enregistrement du commerçant',
            'step-1'              => 'Étape 1',
            'auth-cred'           => 'Informations d\'authentification',
            'email'               => 'Email',
            'phone'               => 'Téléphone',
            'username'            => 'Nom d\'utilisateur',
            'password'            => 'Mot de passe',
            'cpassword'           => 'Confirmer le mot de passe',
            'continue'            => 'Continuer',
            'step-2'              => 'Étape 2',
            'personal'            => 'Détails personnels',
            'first-name'          => 'Prénom',
            'last-name'           => 'Nom de famille',
            'step-3'              => 'Étape 3',
            'org-details'         => 'Détails de l\'organisation',
            'org-name'            => 'Nom de l\'organisation',
            'company-activated'   => 'Succès : Entreprise activée avec succès.',
            'company-deactivated' => 'Succès : Entreprise désactivée avec succès.',
            'company-updated'     => 'Succès : Entreprise mise à jour avec succès.',
            'something-wrong'     => 'Avertissement : Quelque chose s\'est mal passé.',
            'store-created'       => 'Succès : Magasin créé avec succès.',
            'something-wrong-1'   => 'Avertissement : Quelque chose s\'est mal passé, veuillez réessayer plus tard.',
            'content'             => 'Devenez un commerçant et créez votre propre magasin sans souci d\'installation et de gestion du serveur. Vous avez juste besoin de vous inscrire, de télécharger les données du produit et d\'obtenir votre magasin de commerce électronique. Le module SaaS multi-entreprise Laravel offre des capacités de personnalisation faciles, ce qui signifie que le commerçant peut facilement ajouter des fonctionnalités supplémentaires à son magasin ou l\'améliorer facilement.',
    
            'right-panel' => [
                'heading'    => 'Comment configurer un compte marchand',
                'para'       => 'Il est facile de configurer le module en seulement quelques étapes',
                'step-one'   => 'Entrez les informations d\'authentification telles que l\'email, le mot de passe et la confirmation du mot de passe',
                'step-two'   => 'Entrez les détails personnels tels que le prénom, le nom de famille et le numéro de téléphone.',
                'step-three' => 'Entrez les détails de l\'organisation tels que le nom d\'utilisateur, le nom de l\'organisation',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => 'Avertissement : Il n\'est pas autorisé de créer plus d\'un canal.',
            'channel-hostname'                  => 'Avertissement : Veuillez contacter l\'administrateur pour changer votre nom d\'hôte.',
            'same-domain'                       => 'Avertissement : Impossible de garder le même sous-domaine que le domaine principal.',
            'block-message'                     => 'Avertissement : Si vous souhaitez débloquer ce locataire, n\'hésitez pas à nous contacter, nous sommes disponibles 24h/24 pour résoudre votre problème.',
            'blocked'                           => 'a été bloqué',
            'illegal-action'                    => 'Avertissement : Vous avez effectué une action illégale.',
            'domain-message'                    => 'Avertissement : Oups ! Nous n\'avons pas pu aider sur <b>:domain</b>',
            'domain-desc'                       => 'Si vous souhaitez créer un compte avec <b>:domain</b>
            en tant qu\'organisation, n\'hésitez pas à créer un compte et à commencer.',
            'illegal-message'                   => 'Avertissement : L\'action que vous avez effectuée est désactivée par l\'administrateur du site, veuillez envoyer un mail à votre administrateur de site pour plus de détails à ce sujet.',
            'locale-creation'                   => 'Avertissement : Il n\'est pas autorisé de créer une langue autre que l\'anglais.',
            'locale-delete'                     => 'Avertissement : Impossible de supprimer la langue.',
            'cannot-delete-default'             => 'Avertissement : Impossible de supprimer le canal par défaut.',
            'tenant-blocked'                    => 'Locataire bloqué',
            'domain-not-found'                  => 'Avertissement : Domaine non trouvé.',
            'company-blocked-by-administrator'  => 'Ce locataire est bloqué',
            'not-allowed-to-visit-this-section' => 'Avertissement : Vous n\'êtes pas autorisé à utiliser cette section.',
            'auth'                              => 'Avertissement : Erreur d\'authentification !',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'Nouvelle entreprise enregistrée',
                'first-name' => 'Prénom',
                'last-name'  => 'Nom de famille',
                'email'      => 'Email',
                'name'       => 'Nom',
                'username'   => 'Nom d\'utilisateur',
                'domain'     => 'Domaine',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => 'Nouvelle entreprise enregistrée avec succès',
                'dear'       => 'Cher :tenant_name',
                'greeting'   => 'Bienvenue et merci de vous être inscrit chez nous !',
                'summary'    => 'Votre compte a maintenant été créé avec succès et vous pouvez vous connecter en utilisant votre adresse e-mail et vos informations d\'authentification par mot de passe. En vous connectant, vous pourrez accéder à d\'autres services, y compris les produits, les ventes, les clients, les avis et les promotions.',
                'thanks'     => 'Merci !',
                'visit-shop' => 'Visitez le magasin',
            ],
        ],
    ],

    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'Modifier les détails de l\'entreprise',
            'first-name'     => 'Prénom',
            'last-name'      => 'Nom de famille',
            'email'          => 'E-mail',
            'skype'          => 'Skype',
            'cname'          => 'Nom de l\'entreprise',
            'phone'          => 'Téléphone',
            'general'        => 'Général',
            'back-btn'       => 'Retour',
            'save-btn'       => 'Enregistrer les détails',
            'update-success' => 'Succès : :resource mis à jour avec succès.',
            'update-failed'  => 'Avertissement : Impossible de mettre à jour :resource en raison de raisons inconnues.',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => 'Liste des adresses de l\'entreprise',
                'create-btn' => 'Ajouter une adresse',
    
                'datagrid' => [
                    'id'          => 'Id',
                    'address1'    => 'Adresse 1',
                    'address2'    => 'Adresse 2',
                    'city'        => 'Ville',
                    'country'     => 'Pays',
                    'edit'        => 'Modifier',
                    'delete'      => 'Supprimer',
                    'mass-delete' => 'Suppression en masse',
                ],
            ],
    
            'create' => [
                'title'     => 'Créer une adresse d\'entreprise',
                'general'   => 'Général',
                'address1'  => 'Adresse 1',
                'address2'  => 'Adresse 2',
                'country'   => 'Pays',
                'state'     => 'État',
                'city'      => 'Ville',
                'post-code' => 'Code postal',
                'phone'     => 'Téléphone',
                'back-btn'  => 'Retour',
                'save-btn'  => 'Enregistrer l\'adresse',
            ],
    
            'edit' => [
                'title'     => 'Modifier l\'adresse de l\'entreprise',
                'general'   => 'Général',
                'address1'  => 'Adresse 1',
                'address2'  => 'Adresse 2',
                'country'   => 'Pays',
                'state'     => 'État',
                'city'      => 'Ville',
                'post-code' => 'Code postal',
                'phone'     => 'Téléphone',
                'back-btn'  => 'Retour',
                'save-btn'  => 'Enregistrer l\'adresse',
            ],
    
            'create-success'      => 'Succès : l\'adresse de l\'entreprise a été créée avec succès.',
            'update-success'      => 'Succès : l\'adresse de l\'entreprise a été mise à jour avec succès.',
            'delete-success'      => 'Succès : :resource supprimée avec succès.',
            'delete-failed'       => 'Avertissement : Impossible de supprimer :resource en raison de raisons inconnues.',
            'mass-delete-success' => 'Succès : L\'adresse sélectionnée a été supprimée avec succès.',
        ],
    
        'system' => [
            'social-login'           => 'Connexion sociale',
            'facebook'               => 'Paramètres Facebook',
            'facebook-client-id'     => 'Identifiant client Facebook',
            'facebook-client-secret' => 'Secret client Facebook',
            'facebook-callback-url'  => 'URL de retour Facebook',
            'twitter'                => 'Paramètres Twitter',
            'twitter-client-id'      => 'Identifiant client Twitter',
            'twitter-client-secret'  => 'Secret client Twitter',
            'twitter-callback-url'   => 'URL de retour Twitter',
            'google'                 => 'Paramètres Google',
            'google-client-id'       => 'Identifiant client Google',
            'google-client-secret'   => 'Secret client Google',
            'google-callback-url'    => 'URL de retour Google',
            'linkedin'               => 'Paramètres LinkedIn',
            'linkedin-client-id'     => 'Identifiant client LinkedIn',
            'linkedin-client-secret' => 'Secret client LinkedIn',
            'linkedin-callback-url'  => 'URL de retour LinkedIn',
            'github'                 => 'Paramètres GitHub',
            'github-client-id'       => 'Identifiant client GitHub',
            'github-client-secret'   => 'Secret client GitHub',
            'github-callback-url'    => 'URL de retour GitHub',
            'email-credentials'      => 'Identifiants e-mail',
            'mail-driver'            => 'Pilote de messagerie',
            'mail-host'              => 'Hôte de messagerie',
            'mail-port'              => 'Port de messagerie',
            'mail-username'          => 'Nom d\'utilisateur de messagerie',
            'mail-password'          => 'Mot de passe de messagerie',
            'mail-encryption'        => 'Chiffrement de messagerie',
        ],
    
        'tenant' => [
            'id'              => 'ID',
            'first-name'      => 'Prénom',
            'last-name'       => 'Nom de famille',
            'email'           => 'E-mail',
            'skype'           => 'Skype',
            'c-name'          => 'Nom de l\'entreprise',
            'add-address'     => 'Ajouter une adresse',
            'country'         => 'Pays',
            'city'            => 'Ville',
            'address1'        => 'Adresse 1',
            'address2'        => 'Adresse 2',
            'address'         => 'Liste des adresses',
            'company'         => 'Locataire',
            'profile'         => 'Profil',
            'update'          => 'Mettre à jour',
            'address-details' => 'Détails de l\'adresse',
            'create-failed'   => 'Avertissement : Impossible de créer :attribute en raison de raisons inconnues.',
            'update-success'  => 'Succès : :resource mis à jour avec succès.',
            'update-failed'   => 'Avertissement : Impossible de mettre à jour :resource en raison de raisons inconnues.',
    
            'company-address' => [
                'add-address-title'    => 'Nouvelle adresse',
                'update-address-title' => 'Mettre à jour l\'adresse',
                'save-btn-title'       => 'Enregistrer l\'adresse',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'Une commande :order_id a été passée par :placed_by le :created_at.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => "Oops! La page que vous recherchez est en vacances. Il semble que nous n'ayons pas pu trouver ce que vous cherchiez.",
            'title'       => '404 Page non trouvée',
        ],

        '401' => [
            'description' => "Oops! Il semble que vous n'êtes pas autorisé à accéder à cette page. Il semble que vous n'ayez pas les informations d'identification nécessaires.",
            'title'       => '401 Non autorisé',
        ],

        '403' => [
            'description' => "Oops! Cette page est interdite. Il semble que vous n'ayez pas les autorisations nécessaires pour afficher ce contenu.",
            'title'       => '403 Interdit',
        ],

        '500' => [
            'description' => "Oops! Quelque chose s'est mal passé. Il semble que nous ayons des problèmes pour charger la page que vous recherchez.",
            'title'       => '500 Erreur interne du serveur',
        ],

        '503' => [
            'description' => 'Oops! Il semble que nous sommes temporairement en maintenance. Veuillez revenir dans un instant.',
            'title'       => '503 Service non disponible',
        ],
    ],
];
