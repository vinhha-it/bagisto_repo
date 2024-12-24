<?php

return [
    'super' => [
        'configuration' => [
            'index' => [
                'title' => 'Subscrição',
                'info'  => 'Gerenciar os detalhes de pagamento do PayPal para assinatura.',

                'payment' => [
                    'title' => 'Configurações de Pagamento',
                    'info'  => 'Configurar detalhes de Pagamento e Teste.',

                    'trail-plan' => [
                        'title'     => 'Plano de Teste',
                        'info'      => 'Gerenciar se deseja permitir o Plano de Teste e especificar o número de dias para o período de teste.',
                        'status'    => 'Permitir Teste',
                        'days'      => 'Dias de Teste',
                        'plan-list' => 'Lista de Planos de Teste',
                    ],

                    'paypal' => [
                        'title'              => 'Paypal',
                        'info'               => 'Gerenciar suas credenciais de pagamento do PayPal para facilitar os pagamentos dos planos de assinatura.',
                        'sandbox-mode'       => 'Modo Sandbox',
                        'merchant-paypal-id' => 'ID do Comerciante PayPal',
                        'user-name'          => 'Nome de Usuário',
                        'password'           => 'Senha',
                        'signature'          => 'Assinatura',
                    ],

                    'module-assignment' => [
                        'title'  => 'Configuração de Atribuição de Módulo',
                        'info'   => 'Gerenciar a atribuição de módulos (Addons Saas) para os planos de assinatura.',
                        'status' => 'Status',
                    ],
                ],
            ],
        ],

        'components' => [
            'layouts' => [
                'sidebar' => [
                    'subscription'    => 'Assinatura',
                    'plans'           => 'Planos',
                    'purchased-plans' => 'Planos Comprados',
                    'invoices'        => 'Faturas',
                ],
            ],
        ],

        'subscriptions' => [
            'plans' => [
                'index' => [
                    'title'      => 'Lista de Planos',
                    'create-btn' => 'Criar Plano',
                    'datagrid'   => [
                        'id'             => 'Id',
                        'code'           => 'Código',
                        'name'           => 'Nome',
                        'monthly-amount' => 'Valor Mensal',
                        'yearly-amount'  => 'Valor Anual',
                        'status'         => 'Status',
                        'active'         => 'Ativo',
                        'inactive'       => 'Inativo',
                        'edit'           => 'Editar',
                        'delete'         => 'Excluir',
                        'view'           => 'Ver',
                        'customer-email' => 'Email do Cliente',
                        'customer-name'  => 'Nome do Cliente',
                        'total'          => 'Total',
                        'expired-on'     => 'Expira Em',
                        'created-at'     => 'Criado Em',
                        'company-name'   => 'Nome da Empresa',
                        'plan-name'      => 'Plano',
                        'amount'         => 'Valor',
                        'period-unit'    => 'Unidade de Período',
                        'profile-state'  => 'Estado do Perfil',
                    ],
                ],

                'create' => [
                    'add-title'                  => 'Adicionar Plano',
                    'save-btn-title'             => 'Salvar Plano',
                    'general'                    => 'Geral',
                    'code'                       => 'Código',
                    'name'                       => 'Nome',
                    'description'                => 'Descrição',
                    'billing-amount'             => 'Valor da Cobrança',
                    'monthly-amount'             => 'Valor Mensal',
                    'yearly-amount'              => 'Valor Anual (Mês a Mês)',
                    'plan-limitation'            => 'Limitação do Plano',
                    'allowed-products'           => 'Produtos Permitidos',
                    'allowed-categories'         => 'Categorias Permitidas',
                    'allowed-attributes'         => 'Atributos Permitidos',
                    'allowed-attribute-families' => 'Famílias de Atributos Permitidas',
                    'allowed-channels'           => 'Canais Permitidos',
                    'allowed-orders'             => 'Pedidos Permitidos',
                    'offers'                     => 'Ofertas',
                    'active'                     => 'Ativo',
                    'inactive'                   => 'Inativo',
                    'offer-title'                => 'Título',
                    'type'                       => 'Tipo',
                    'discount'                   => 'Desconto',
                    'fixed'                      => 'Fixo',
                    'price'                      => 'Preço',
                    'offer-status'               => 'Status da Oferta',
                    'module-assignment'          => 'Atribuição de Módulo',
                ],

                'edit' => [
                    'edit-title'                 => 'Editar Plano',
                    'add-title'                  => 'Adicionar Plano',
                    'save-btn-title'             => 'Salvar Plano',
                    'general'                    => 'Geral',
                    'code'                       => 'Código',
                    'name'                       => 'Nome',
                    'description'                => 'Descrição',
                    'billing-amount'             => 'Valor da Cobrança',
                    'monthly-amount'             => 'Valor Mensal',
                    'yearly-amount'              => 'Valor Anual (Mês a Mês)',
                    'plan-limitation'            => 'Limitação do Plano',
                    'allowed-products'           => 'Produtos Permitidos',
                    'allowed-categories'         => 'Categorias Permitidas',
                    'allowed-attributes'         => 'Atributos Permitidos',
                    'allowed-attribute-families' => 'Famílias de Atributos Permitidas',
                    'allowed-channels'           => 'Canais Permitidos',
                    'allowed-orders'             => 'Pedidos Permitidos',
                    'offers'                     => 'Ofertas',
                    'active'                     => 'Ativo',
                    'inactive'                   => 'Inativo',
                    'offer-title'                => 'Título',
                    'type'                       => 'Tipo',
                    'discount'                   => 'Desconto',
                    'fixed'                      => 'Fixo',
                    'price'                      => 'Preço',
                    'offer-status'               => 'Status da Oferta',
                    'module-assignment'          => 'Atribuição de Módulo',
                ],
            ],
        ],

        'recurring-profiles' => [
            'index' => [
                'title'      => 'Planos Comprados',
                'create-btn' => 'Criar Plano',

                'datagrid' => [
                    'company-name'  => 'Nome da Empresa',
                    'id'            => 'Id',
                    'plan-name'     => 'Plano',
                    'amount'        => 'Valor',
                    'period-unit'   => 'Unidade de Período',
                    'profile-state' => 'Estado do Perfil',
                    'created-at'    => 'Criado Em',
                    'view'          => 'Ver',
                ],
            ],

            'view' => [
                'title'                      => 'Planos Comprados',
                'create-btn'                 => 'Criar Plano',
                'plan-info'                  => 'Informações do Plano',
                'plan'                       => 'Plano',
                'plan-name'                  => 'Nome do Plano',
                'expiration-date'            => 'Data de Expiração',
                'billing-amount'             => 'Valor da Cobrança',
                'billing-cycle'              => 'Ciclo de Cobrança',
                'monthly'                    => 'Mensal',
                'annual'                     => 'Anual',
                'profile-id'                 => 'ID do Perfil',
                'tin'                        => 'TIN',
                'profile-state'              => 'Estado do Perfil',
                'next-billing-date'          => 'Próxima Data de Cobrança',
                'payment-details'            => 'Detalhes de Pagamento',
                'offer-title'                => 'Oferta do Plano',
                'offer-type'                 => 'Tipo de Oferta',
                'offer-price'                => 'Preço da Oferta',
                'reference-id'               => 'ID de Referência',
                'plan-state'                 => 'Estado do Plano',
                'plan-type'                  => 'Tipo de Plano',
                'payment-status'             => 'Status do Pagamento',
                'schedule-description'       => 'Descrição do Cronograma',
                'amount'                     => 'Valor',
                'payment-method'             => 'Método de Pagamento',
                'features'                   => 'Recursos',
                'allowed-products'           => 'Produtos Permitidos',
                'allowed-categories'         => 'Categorias Permitidas',
                'allowed-attributes'         => 'Atributos Permitidos',
                'allowed-attribute-families' => 'Famílias de Atributos Permitidas',
                'allowed-channels'           => 'Canais Permitidos',
                'allowed-orders'             => 'Pedidos Permitidos',
            ],
        ],

        'tenants' => [
            'view' => [
                'title'      => 'Planos Comprados',
                'create-btn' => 'Criar Plano',
                'datagrid'   => [
                    'company-name'  => 'Nome da Empresa',
                    'id'            => 'Id',
                    'plan-name'     => 'Plano',
                    'amount'        => 'Valor',
                    'period-unit'   => 'Unidade de Período',
                    'profile-state' => 'Estado do Perfil',
                    'created-at'    => 'Criado Em',
                    'view'          => 'Ver',
                ],
            ],
        ],

        'plans' => [
            'title'                      => 'Planos de Assinatura',
            'add-title'                  => 'Adicionar Plano',
            'edit-title'                 => 'Editar Plano',
            'create-success'             => 'Plano criado com sucesso.',
            'update-success'             => 'Plano atualizado com sucesso.',
            'delete-success'             => 'Plano excluído com sucesso.',
            'save-btn-title'             => 'Salvar Plano',
            'general'                    => 'Geral',
            'code'                       => 'Código',
            'name'                       => 'Nome',
            'description'                => 'Descrição',
            'billing-amount'             => 'Valor da Cobrança',
            'monthly-amount'             => 'Valor Mensal',
            'yearly-amount'              => 'Valor Anual (Mensal)',
            'plan-limitation'            => 'Limitação do Plano',
            'allowed-products'           => 'Produtos Permitidos',
            'allowed-categories'         => 'Categorias Permitidas',
            'allowed-attributes'         => 'Atributos Permitidos',
            'allowed-attribute-families' => 'Famílias de Atributos Permitidas',
            'allowed-channels'           => 'Canais Permitidos',
            'allowed-orders'             => 'Pedidos Permitidos',
            'name-too-long-error'        => 'O nome do assinante é muito longo.',
            'description-too-long-error' => 'A descrição do assinante é muito longa.',
            'payment-cancel'             => 'Você cancelou o pagamento.',
            'generic-error'              => 'Ocorreu um erro, por favor, tente novamente mais tarde.',
            'profile-created-success'    => 'Perfil recorrente criado com sucesso.',
            'assign-plan'                => 'Atribuir Plano',
            'assign'                     => 'Atribuir',
            'plan'                       => 'Plano',
            'period-unit'                => 'Unidade de Período',
            'month'                      => 'Mensal',
            'year'                       => 'Anual',
            'plan-activated'             => 'Plano ativado com sucesso.',
            'plan-cancelled-message'     => 'Plano cancelado com sucesso.',
            'general-error'              => 'Ocorreu um erro, tente novamente mais tarde.',
            'cancel-plan'                => 'Cancelar Plano',
            'cancel-confirm-msg'         => 'Tem certeza de que deseja cancelar este plano?',
            'module-assignment-setting'  => 'Configuração de Atribuição de Módulo',
            'module-assignment-status'   => 'Status de Atribuição de Módulo',
            'module-assignment'          => 'Atribuição de Módulo',
            'allow-modules'              => 'Permitir Módulos',
            'offers'                     => 'Ofertas',
            'offer-title'                => 'Título',
            'type'                       => 'Tipo',
            'price'                      => 'Desconto',
            'offer-status'               => 'Status',
        ],

        'invoices' => [
            'index' => [
                'title'    => 'Faturas de Assinatura',
                'datagrid' => [
                    'id'             => 'ID',
                    'customer-name'  => 'Nome do Cliente',
                    'customer-email' => 'Email do Cliente',
                    'total'          => 'Total',
                    'expire-on'      => 'Expira Em',
                    'created-at'     => 'Criado Em',
                    'view'           => 'Ver',
                ],
            ],

            'view' => [
                'invoice-and-account'  => 'Fatura e Conta',
                'invoice-id'           => 'ID da Fatura',
                'profile-id'           => 'ID do Perfil',
                'invoice-date'         => 'Data da Fatura',
                'invoice-status'       => 'Status da Fatura',
                'customer-name'        => 'Nome do Cliente',
                'customer-email'       => 'Email do Cliente',
                'payment-detail'       => 'Detalhes do Pagamento',
                'payment-state'        => 'Estado do Pagamento',
                'payment-type'         => 'Tipo de Pagamento',
                'payment-status'       => 'Status do Pagamento',
                'schedule-description' => 'Descrição do Agendamento',
                'tin'                  => 'NIF',
                'amount'               => 'Valor',
                'payment-method'       => 'Método de Pagamento',
                'plan-information'     => 'Informações do Plano',
                'sku'                  => 'SKU',
                'plan'                 => 'Plano',
                'expiration-date'      => 'Data de Expiração',
                'sub-total'            => 'Subtotal',
                'grand-total'          => 'Total Geral',
            ],
        ],
    ],

    'admin' => [
        'layouts' => [
            'subscription'                        => 'Assinatura',
            'overview'                            => 'Visão Geral',
            'plans'                               => 'Planos',
            'invoices'                            => 'Faturas',
            'history'                             => 'Histórico de Planos Adquiridos',
            'purchase-plan-heading'               => 'Compre um plano para continuar',
            'purchase-plan-notification'          => 'Por favor, compre qualquer plano para continuar usando o serviço.',
            'trial-expired-heading'               => 'Seu período de teste expirou',
            'trial-expired-notification'          => 'Seu plano de teste expirou em :date. Por favor, clique no botão abaixo para escolher seu plano.',
            'choose-plan'                         => 'Escolher Plano',
            'subscription-stopped-heading'        => 'Sua assinatura foi interrompida',
            'subscription-stopped-notification'   => 'Sua assinatura foi interrompida em :date. Assine um novo plano para continuar seus serviços. Por favor, clique no botão abaixo para escolher seu plano.',
            'subscription-suspended-heading'      => 'Sua assinatura foi suspensa',
            'subscription-suspended-notification' => 'Sua assinatura foi suspensa porque não conseguimos processar seu pagamento. Por favor, entre em contato conosco para continuar seus serviços ou você pode assinar um novo plano.',
            'payment-due-heading'                 => 'Pagamento de fatura pendente',
            'payment-due-notification'            => 'Seu pagamento de fatura de assinatura está pendente. Atualize o plano, mude o plano ou entre em contato conosco para continuar seus serviços.',
        ],

        'plans' => [
            'history' => [
                'title'    => 'Histórico de Planos Adquiridos',
                'datagrid' => [
                    'title'         => 'Histórico de Planos Adquiridos',
                    'id'            => 'Id',
                    'code'          => 'Código',
                    'name'          => 'Nome',
                    'reference-id'  => 'ID de Referência',
                    'state'         => 'Estado',
                    'payment-type'  => 'Tipo de Pagamento',
                    'period-unit'   => 'Ciclo de Pagamento',
                    'amount'        => 'Valor Pago',
                    'next-due-date' => 'Próxima Data de Vencimento',
                ],
            ],

            'index' => [
                'title'                              => 'Planos de Assinatura',
                'allowed-products'                   => ' Produto(s)',
                'allowed-categories'                 => ' Categoria(s)',
                'allowed-attributes'                 => ' Atributo(s)',
                'allowed-attribute-families'         => ' Família(s) de Atributos Permitidas',
                'allowed-channels'                   => ' Canal(is)',
                'allowed-orders'                     => ' Pedido(s)',
                'purchase'                           => 'Comprar',
                'plan-description'                   => 'Cobrado anualmente quando faturado anualmente ou :amount por mês a mês :-',
                'product-left-notification'          => ':remaining produtos restantes de :purchased, atualize seu plano para mais produtos.',
                'category-left-notification'         => ':remaining categorias restantes de :purchased, atualize seu plano para mais categorias.',
                'attribute-left-notification'        => ':remaining atributos restantes de :purchased, atualize seu plano para mais atributos.',
                'attribute-family-left-notification' => ':remaining famílias de atributos restantes de :purchased, atualize seu plano para mais famílias de atributos.',
                'channel-left-notification'          => ':remaining canais restantes de :purchased, atualize seu plano para mais canais.',
                'order-left-notification'            => ':remaining pedidos restantes de :purchased, atualize seu plano para mais pedidos.',
                'resource-limit-error'               => 'Este plano permite apenas :allowed :nome_entidade, você já criou :used :nome_entidade.',
                'free-plan-activated'                => 'Plano gratuito ativado com sucesso.',
                'products'                           => 'Produtos',
                'categories'                         => 'Categorias',
                'attributes'                         => 'Atributos',
                'attribute_families'                 => 'Famílias de Atributos',
                'channels'                           => 'Canais',
                'orders'                             => 'Pedidos',
                'allowed-modules'                    => 'Módulos Permitidos :-',
                'no-module-assign'                   => 'Aviso: Nenhum módulo atribuído a este plano.',
                'plan-not-available'                 => 'Nenhum plano disponível',
                'not-activated-plans'                => 'Você ainda não possui planos ativados.',
                'reference-id'                       => 'ID de Referência',
                'state'                              => 'Estado',
                'type'                               => 'Tipo',
                'payment-status'                     => 'Status do Pagamento',
                'schedule-description'               => 'Descrição da Programação',
                'tin'                                => 'TIN',
                'amount'                             => 'Valor',
                'payment-method'                     => 'Método de Pagamento',
                'assigned-plan'                      => 'Seu plano foi atribuído.',
                'cancel-plan'                        => 'Seu plano foi cancelado.',
                'change-plan'                        => 'Seu plano foi alterado.',
                'assigned-plan-description'          => 'Um novo plano foi atribuído a você para o domínio <b>:domain</b>',
                'cancel-plan-description'            => 'Seu plano foi cancelado para o domínio <b>:domain</b>',
                'changed-plan-description'           => 'Seu plano foi alterado/modificado para o domínio <b>:domain</b>',
                'new-plan'                           => ':name (novo plano)',
                'for-plan'                           => 'Nome do plano <b>:name</b>',
                'plan-expired'                       => 'Seu plano expirou',
                'current-plan-expired'               => 'Seu plano atual expirou para o domínio <b>:domain</b>',
            ],

            'overview' => [
                'title'                      => 'Planos de Assinatura',
                'allowed-products'           => ' Produto(s)',
                'allowed-categories'         => ' Categoria(s)',
                'allowed-attributes'         => ' Atributo(s)',
                'allowed-attribute-families' => ' Família(s) de Atributos Permitidas',
                'allowed-channels'           => ' Canal(is)',
                'allowed-orders'             => ' Pedido(s)',
                'purchase'                   => 'Comprar',
                'products'                   => 'Produtos',
                'categories'                 => 'Categorias',
                'attributes'                 => 'Atributos',
                'attribute_families'         => 'Famílias de Atributos',
                'channels'                   => 'Canais',
                'orders'                     => 'Pedidos',
                'allowed-modules'            => 'Módulos Permitidos :-',
                'no-module-assign'           => 'Aviso: Nenhum módulo atribuído a este plano.',
                'plan-not-available'         => 'Nenhum plano disponível',
                'not-activated-plans'        => 'Você ainda não possui planos ativados.',
                'reference-id'               => 'ID de Referência',
                'state'                      => 'Estado',
                'type'                       => 'Tipo',
                'payment-status'             => 'Status do Pagamento',
                'schedule-description'       => 'Descrição da Programação',
                'tin'                        => 'TIN',
                'amount'                     => 'Valor',
                'payment-method'             => 'Método de Pagamento',
                'plan-info'                  => 'Informação do Plano',
                'plan'                       => 'Plano',
                'plan-name'                  => ':plan - (Teste)',
                'expiration-date'            => 'Data de Expiração',
                'billing-amount'             => 'Valor da Fatura',
                'billing-cycle'              => 'Ciclo de Faturamento',
                'monthly'                    => 'Mensal',
                'annual'                     => 'Anual',
                'profile-id'                 => 'ID do Perfil',
                'profile-status'             => 'Status do Perfil',
                'next-billing-date'          => 'Próxima Data de Faturamento',
                'profile-state'              => 'Estado do Perfil',
                'payment-status'             => 'Status do Pagamento',
                'features'                   => 'Recursos',
                'assign-modules'             => 'Seção de Módulos Atribuídos',
                'info-assign-modules'        => 'Módulos Atribuídos',
                'text-bagisto'               => 'Extensão Bagisto :extension',
                'payment-details'            => 'Detalhes do Pagamento',
                'offer'                      => [
                    'title' => 'Título',
                    'type'  => 'Tipo de Desconto',
                    'price' => 'Preço',
                ],
            ],
        ],

        'checkout' => [
            'title'                     => 'Finalizar Compra',
            'billing-address'           => 'Endereço de Faturação',
            'tin'                       => 'NIF',
            'first-name'                => 'Nome',
            'last-name'                 => 'Sobrenome',
            'email'                     => 'Email',
            'address1'                  => 'Endereço 1',
            'address2'                  => 'Endereço 2',
            'city'                      => 'Cidade',
            'postcode'                  => 'Código Postal',
            'state'                     => 'Estado',
            'select-state'              => 'Selecionar estado/região',
            'country'                   => 'País',
            'payment-information'       => 'Informações de Pagamento',
            'summary'                   => 'Resumo',
            'billing-cycle'             => 'Ciclo de Faturamento',
            'month'                     => 'Mês',
            'year'                      => 'Ano',
            'annual'                    => 'Anual',
            'plan'                      => 'Plano',
            'subtotal'                  => 'Subtotal (Incluindo Impostos)',
            'plan-option-label-monthly' => ':plan - :amount por mês',
            'plan-option-label-yearly'  => ':plan - :amount por ano',
            'success-activated-plan'    => 'Sucesso: :plan_name ativado com sucesso.',
        ],

        'invoices' => [
            'title' => 'Faturas',
            'view'  => [
                'id'                   => 'ID',
                'plan'                 => 'Plano',
                'customer-name'        => 'Nome do Cliente',
                'invoice-and-account'  => 'Fatura e Conta',
                'invoice-id'           => 'ID da Fatura',
                'profile-id'           => 'ID do Perfil',
                'invoice-date'         => 'Data da Fatura',
                'invoice-status'       => 'Estado da Fatura',
                'customer-name'        => 'Nome do Cliente',
                'customer-email'       => 'Email do Cliente',
                'reference-id'         => 'ID de Referência',
                'plan-state'           => 'Estado do Plano',
                'plan-type'            => 'Tipo de Plano',
                'payment-status'       => 'Estado do Pagamento',
                'payment-detail'       => 'Detalhes do Pagamento',
                'payment-state'        => 'Estado do Pagamento',
                'payment-type'         => 'Tipo de Pagamento',
                'payment-status'       => 'Estado do Pagamento',
                'schedule-description' => 'Descrição do Agendamento',
                'tin'                  => 'NIF',
                'amount'               => 'Valor',
                'payment-method'       => 'Método de Pagamento',
                'plan-info'            => 'Informação do Plano',
                'sku'                  => 'SKU',
                'expiration-date'      => 'Data de Expiração',
                'sub-total'            => 'Subtotal',
                'grand-total'          => 'Total Geral',
            ],

            'datagrid' => [
                'id'             => 'ID',
                'customer-name'  => 'Nome do Cliente',
                'customer-email' => 'Email do Cliente',
                'total'          => 'Total',
                'expire-on'      => 'Expira Em',
                'created-at'     => 'Criado Em',
                'view'           => 'Ver',
            ],
        ],
    ],
];
