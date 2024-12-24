<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'Versão : :version',
                'account-title' => 'Conta',
                'logout'        => 'Sair',
                'my-account'    => 'Minha Conta',
                'visit-shop'    => 'Visitar Loja',
            ],
    
            'sidebar' => [
                'tenants'          => 'Locatários',
                'tenant-customers' => 'Clientes',
                'tenant-products'  => 'Produtos',
                'tenant-orders'    => 'Pedidos',
                'settings'         => 'Configurações',
                'agents'           => 'Agentes',
                'roles'            => 'Funções',
                'locales'          => 'Localidades',
                'currencies'       => 'Moedas',
                'channels'         => 'Canais',
                'exchange-rates'   => 'Taxas de Câmbio',
                'themes'           => 'Temas',
                'cms'              => 'CMS',
                'configurations'   => 'Configurações',
                'general'          => 'Geral',
                'send-email'       => 'Enviar e-mail',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'Inquilinos',
            'create'         => 'Adicionar',
            'edit'           => 'Editar',
            'delete'         => 'Excluir',
            'cancel'         => 'Cancelar',
            'view'           => 'Visualizar',
            'mass-delete'    => 'Excluir em Massa',
            'mass-update'    => 'Atualizar em Massa',
            'customers'      => 'Clientes',
            'products'       => 'Produtos',
            'orders'         => 'Pedidos',
            'settings'       => 'Configurações',
            'agents'         => 'Agentes',
            'roles'          => 'Funções',
            'locales'        => 'Locais',
            'currencies'     => 'Moedas',
            'exchange-rates' => 'Taxas de Câmbio',
            'channels'       => 'Canais',
            'themes'         => 'Temas',
            'send-email'     => 'Enviar Email',
            'cms'            => 'CMS',
            'configuration'  => 'Configuração',
            'download'       => 'Baixar',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => 'Super Admin Entrar',
                'email'                => 'Endereço de Email',
                'password'             => 'Senha',
                'btn-submit'           => 'Entrar',
                'forget-password-link' => 'Esqueceu a Senha?',
                'submit-btn'           => 'Entrar',
                'login-success'        => 'Sucesso: Você entrou com sucesso.',
                'login-error'          => 'Por favor, verifique suas credenciais e tente novamente.',
                'activate-warning'     => 'Sua conta ainda não foi ativada, por favor, entre em contato com o administrador.',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'Esqueceu a Senha',
                    'title'           => 'Recuperar Senha',
                    'email'           => 'Email Registrado',
                    'reset-link-sent' => 'Link de Redefinição de Senha enviado',
                    'sign-in-link'    => 'Voltar para Entrar?',
                    'email-not-exist' => 'Email Não Existe',
                    'submit-btn'      => 'Redefinir',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'Redefinir Senha',
                'back-link-title'  => 'Voltar para Entrar?',
                'confirm-password' => 'Confirmar Senha',
                'email'            => 'Email Registrado',
                'password'         => 'Senha',
                'submit-btn'       => 'Redefinir Senha',
            ],
        ],

        'tenants' => [
            'index' => [
                'title'        => 'Lista de Inquilinos',
                'register-btn' => 'Registrar Inquilino',
        
                'create' => [
                    'title'             => 'Criar Inquilino',
                    'first-name'        => 'Primeiro Nome',
                    'last-name'         => 'Sobrenome',
                    'user-name'         => 'Nome de Usuário',
                    'organization-name' => 'Nome da Organização',
                    'phone'             => 'Telefone',
                    'email'             => 'E-mail',
                    'password'          => 'Senha',
                    'confirm-password'  => 'Confirmar Senha',
                    'save-btn'          => 'Salvar Inquilino',
                    'back-btn'          => 'Voltar',
                ],
        
                'datagrid' => [
                    'id'                  => 'Id',
                    'user-name'           => 'Nome de Usuário',
                    'organization'        => 'Organização',
                    'domain'              => 'Domínio',
                    'cname'               => 'Cnome',
                    'status'              => 'Status',
                    'active'              => 'Ativo',
                    'disable'             => 'Desativar',
                    'view'                => 'Ver Insights',
                    'edit'                => 'Modificar Inquilino',
                    'delete'              => 'Remover Inquilino',
                    'mass-delete'         => 'Excluir em Massa',
                    'mass-delete-success' => 'Inquilino Selecionado Excluído com Sucesso',
                ],
            ],
        
            'edit' => [
                'title'             => 'Editar Inquilino',
                'first-name'        => 'Primeiro Nome',
                'last-name'         => 'Sobrenome',
                'user-name'         => 'Nome de Usuário',
                'cname'             => 'Cnome',
                'organization-name' => 'Nome da Organização',
                'phone'             => 'Telefone',
                'status'            => 'Status',
                'email'             => 'E-mail',
                'password'          => 'Senha',
                'confirm-password'  => 'Confirmar Senha',
                'save-btn'          => 'Salvar Inquilino',
                'back-btn'          => 'Voltar',
                'general'           => 'Geral',
                'settings'          => 'Configurações',
            ],
        
            'view' => [
                'title'                        => 'Percepções do Inquilino',
                'heading'                      => 'Inquilino - :tenant_name',
                'email-address'                => 'Endereço de E-mail',
                'phone'                        => 'Telefone',
                'domain-information'           => 'Informações do Domínio',
                'mapped-domain'                => 'Domínio Mapeado',
                'cname-information'            => 'Informações do Cnome',
                'cname-entry'                  => 'Entrada Cnome',
                'attribute-information'        => 'Informações do Atributo',
                'no-of-attributes'             => 'Número de Atributos',
                'attribute-family-information' => 'Informações da Família de Atributos',
                'no-of-attribute-families'     => 'Número de Famílias de Atributos',
                'product-information'          => 'Informações do Produto',
                'no-of-products'               => 'Número de Produtos',
                'customer-information'         => 'Informações do Cliente',
                'no-of-customers'              => 'Número de Clientes',
                'customer-group-information'   => 'Informações do Grupo de Clientes',
                'no-of-customer-groups'        => 'Número de Grupos de Clientes',
                'category-information'         => 'Informações da Categoria',
                'no-of-categories'             => 'Número de Categorias',
                'addresses'                    => 'Lista de Endereços (:count)',
                'empty-title'                  => 'Adicionar Endereço do Inquilino',
            ],
        
            'create-success' => 'Inquilino criado com sucesso',
            'delete-success' => 'Inquilino excluído com sucesso',
            'delete-failed'  => 'Falha ao excluir inquilino',
            'product-copied' => 'Inquilino copiado com sucesso',
            'update-success' => 'Inquilino atualizado com sucesso',
        
            'customers' => [
                'index' => [
                    'title' => 'Lista de Clientes',
        
                    'datagrid' => [
                        'id'             => 'Id',
                        'domain'         => 'Domínio',
                        'customer-name'  => 'Nome do Cliente',
                        'email'          => 'E-mail',
                        'customer-group' => 'Grupo de Clientes',
                        'phone'          => 'Telefone',
                        'status'         => 'Status',
                        'active'         => 'Ativo',
                        'inactive'       => 'Inativa',
                        'is-suspended'   => 'Suspensa',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => 'Lista de Produtos',
        
                    'datagrid' => [
                        'id'               => 'Id',
                        'domain'           => 'Domínio',
                        'name'             => 'Nome',
                        'sku'              => 'SKU',
                        'attribute-family' => 'Família de Atributos',
                        'image'            => 'Imagem',
                        'price'            => 'Preço',
                        'qty'              => 'Quantidade',
                        'status'           => 'Status',
                        'active'           => 'Ativo',
                        'inactive'         => 'Inativa',
                        'category'         => 'Categoria',
                        'type'             => 'Tipo',
                    ],
                ],
            ],
        
            'orders' => [
                'index' => [
                    'title' => 'Lista de Pedidos',
        
                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => 'ID do Pedido',
                        'domain'          => 'Domínio',
                        'sub-total'       => 'Subtotal',
                        'grand-total'     => 'Total Geral',
                        'order-date'      => 'Data do Pedido',
                        'channel-name'    => 'Nome do Canal',
                        'status'          => 'Status',
                        'processing'      => 'Processando',
                        'completed'       => 'Concluído',
                        'canceled'        => 'Cancelado',
                        'closed'          => 'Fechado',
                        'pending'         => 'Pendente',
                        'pending-payment' => 'Pagamento Pendente',
                        'fraud'           => 'Fraude',
                        'customer'        => 'Cliente',
                        'email'           => 'E-mail',
                        'location'        => 'Localização',
                        'images'          => 'Imagens',
                        'pay-by'          => 'Pagar Por - ',
                        'pay-via'         => 'Pagar Via',
                        'date'            => 'Data',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'Lista de Agentes',
                    'register-btn' => 'Criar Agente',
            
                    'create' => [
                        'title'             => 'Criar Agente',
                        'first-name'        => 'Nome',
                        'last-name'         => 'Sobrenome',
                        'email'             => 'E-mail',
                        'current-password'  => 'Senha Atual',
                        'password'          => 'Senha',
                        'confirm-password'  => 'Confirmar Senha',
                        'role'              => 'Função',
                        'select'            => 'Selecionar',
                        'status'            => 'Status',
                        'save-btn'          => 'Salvar Agente',
                        'back-btn'          => 'Voltar',
                        'upload-image-info' => 'Carregue uma imagem de perfil (110px X 110px) em formato PNG ou JPG',
                    ],
            
                    'edit' => [
                        'title' => 'Editar Agente',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Id',
                        'name'    => 'Nome',
                        'email'   => 'E-mail',
                        'role'    => 'Função',
                        'status'  => 'Status',
                        'active'  => 'Ativo',
                        'disable' => 'Desativar',
                        'actions' => 'Ações',
                        'edit'    => 'Editar',
                        'delete'  => 'Excluir',
                    ],
                ],
            
                'create-success'             => 'Sucesso: Agente super administrador criado com sucesso',
                'delete-success'             => 'Agente excluído com sucesso',
                'delete-failed'              => 'Falha ao excluir Agente',
                'cannot-change'              => 'O nome do Agente :name não pode ser alterado',
                'product-copied'             => 'Agente copiado com sucesso',
                'update-success'             => 'Agente atualizado com sucesso',
                'invalid-password'           => 'A senha atual inserida está incorreta',
                'last-delete-error'          => 'Aviso: Pelo menos um Agente super administrador é necessário',
                'login-delete-error'         => 'Aviso: Você não pode excluir sua própria conta.',
                'administrator-delete-error' => 'Aviso: Pelo menos um agente super administrador com acesso de administrador é necessário',
            ],
            
            'roles' => [
                'index' => [
                    'title'      => 'Lista de Funções',
                    'create-btn' => 'Criar Função',
            
                    'datagrid' => [
                        'id'              => 'Id',
                        'name'            => 'Nome',
                        'permission-type' => 'Tipo de Permissão',
                        'actions'         => 'Ações',
                        'edit'            => 'Editar',
                        'delete'          => 'Excluir',
                    ],
                ],
            
                'create' => [
                    'access-control' => 'Controle de Acesso',
                    'all'            => 'Todos',
                    'back-btn'       => 'Voltar',
                    'custom'         => 'Personalizado',
                    'description'    => 'Descrição',
                    'general'        => 'Geral',
                    'name'           => 'Nome',
                    'permissions'    => 'Permissões',
                    'save-btn'       => 'Salvar Função',
                    'title'          => 'Criar Função',
                ],
            
                'edit' => [
                    'access-control' => 'Controle de Acesso',
                    'all'            => 'Todos',
                    'back-btn'       => 'Voltar',
                    'custom'         => 'Personalizado',
                    'description'    => 'Descrição',
                    'general'        => 'Geral',
                    'name'           => 'Nome',
                    'permissions'    => 'Permissões',
                    'save-btn'       => 'Salvar Função',
                    'title'          => 'Editar Função',
                ],
            
                'being-used'        => 'A Função já está sendo usada por outro Agente',
                'last-delete-error' => 'A última Função não pode ser excluída',
                'create-success'    => 'Função criada com sucesso',
                'delete-success'    => 'Função excluída com sucesso',
                'delete-failed'     => 'Falha ao excluir Função',
                'update-success'    => 'Função atualizada com sucesso',
            ],
            
            'locales' => [
                'index' => [
                    'title'      => 'Lista de Locais',
                    'create-btn' => 'Criar Local',
            
                    'create' => [
                        'title'            => 'Criar Local',
                        'code'             => 'Código',
                        'name'             => 'Nome',
                        'direction'        => 'Direção',
                        'select-direction' => 'Selecionar Direção',
                        'text-ltr'         => 'Esquerda para Direita (LTR)',
                        'text-rtl'         => 'Direita para Esquerda (RTL)',
                        'locale-logo'      => 'Logotipo do Local',
                        'logo-size'        => 'A resolução da imagem deve ser de 24px X 16px',
                        'save-btn'         => 'Salvar Local',
                    ],
            
                    'edit' => [
                        'title'     => 'Editar Local',
                        'code'      => 'Código',
                        'name'      => 'Nome',
                        'direction' => 'Direção',
                    ],
            
                    'datagrid' => [
                        'id'        => 'Id',
                        'code'      => 'Código',
                        'name'      => 'Nome',
                        'direction' => 'Direção',
                        'text-ltr'  => 'Esquerda para Direita (LTR)',
                        'text-rtl'  => 'Direita para Esquerda (RTL)',
                        'actions'   => 'Ações',
                        'edit'      => 'Editar',
                        'delete'    => 'Excluir',
                    ],
                ],
            
                'being-used'        => 'O local :locale_name é usado como local padrão no canal',
                'create-success'    => 'Local criado com sucesso',
                'update-success'    => 'Local atualizado com sucesso',
                'delete-success'    => 'Local excluído com sucesso',
                'delete-failed'     => 'Falha ao excluir Local',
                'last-delete-error' => 'Pelo menos um Local super administrador é necessário',
            ],

            'currencies' => [
                'index' => [
                    'title'      => 'Lista de Moedas',
                    'create-btn' => 'Criar Moeda',
            
                    'create' => [
                        'title'    => 'Criar Moeda',
                        'code'     => 'Código',
                        'name'     => 'Nome',
                        'symbol'   => 'Símbolo',
                        'decimal'  => 'Decimal',
                        'save-btn' => 'Salvar Moeda',
                    ],
            
                    'edit' => [
                        'title'    => 'Editar Moeda',
                        'code'     => 'Código',
                        'name'     => 'Nome',
                        'symbol'   => 'Símbolo',
                        'decimal'  => 'Decimal',
                        'save-btn' => 'Salvar Moeda',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Id',
                        'code'    => 'Código',
                        'name'    => 'Nome',
                        'actions' => 'Ações',
                        'edit'    => 'Editar',
                        'delete'  => 'Excluir',
                    ],
                ],
            
                'create-success'      => 'Moeda criada com sucesso.',
                'update-success'      => 'Moeda atualizada com sucesso.',
                'delete-success'      => 'Moeda excluída com sucesso.',
                'delete-failed'       => 'Falha ao excluir moeda',
                'last-delete-error'   => 'Pelo menos uma moeda de super administrador é necessária.',
                'mass-delete-success' => 'Moedas selecionadas excluídas com sucesso',
            ],
            
            'exchange-rates' => [
                'index' => [
                    'title'        => 'Taxas de Câmbio',
                    'create-btn'   => 'Criar Taxa de Câmbio',
                    'update-rates' => 'Atualizar Taxas',
            
                    'create' => [
                        'title'                  => 'Criar Taxa de Câmbio',
                        'source-currency'        => 'Moeda de Origem',
                        'target-currency'        => 'Moeda de Destino',
                        'select-target-currency' => 'Selecionar Moeda de Destino',
                        'rate'                   => 'Taxa',
                        'save-btn'               => 'Salvar Taxa de Câmbio',
                    ],
            
                    'edit' => [
                        'title'           => 'Editar Taxa de Câmbio',
                        'source-currency' => 'Moeda de Origem',
                        'target-currency' => 'Moeda de Destino',
                        'rate'            => 'Taxa',
                        'save-btn'        => 'Salvar Taxa de Câmbio',
                    ],
            
                    'datagrid' => [
                        'id'            => 'Id',
                        'currency-name' => 'Nome da Moeda',
                        'exchange-rate' => 'Taxa de Câmbio',
                        'actions'       => 'Ações',
                        'edit'          => 'Editar',
                        'delete'        => 'Excluir',
                    ],
                ],
            
                'create-success' => 'Taxa de Câmbio criada com sucesso.',
                'update-success' => 'Taxa de Câmbio atualizada com sucesso.',
                'delete-success' => 'Taxa de Câmbio excluída com sucesso.',
                'delete-failed'  => 'Falha ao excluir Taxa de Câmbio',
            ],
            
            'channels' => [
                'index' => [
                    'title' => 'Canais',
            
                    'datagrid' => [
                        'id'       => 'Id',
                        'code'     => 'Código',
                        'name'     => 'Nome',
                        'hostname' => 'Nome do Host',
                        'actions'  => 'Ações',
                        'edit'     => 'Editar',
                        'delete'   => 'Excluir',
                    ],
                ],
            
                'edit' => [
                    'title'                  => 'Editar Canal',
                    'back-btn'               => 'Voltar',
                    'save-btn'               => 'Salvar Canal',
                    'general'                => 'Geral',
                    'code'                   => 'Código',
                    'name'                   => 'Nome',
                    'description'            => 'Descrição',
                    'hostname'               => 'Nome do Host',
                    'hostname-placeholder'   => 'https://www.example.com (Não adicione barra no final.)',
                    'design'                 => 'Design',
                    'theme'                  => 'Tema',
                    'logo'                   => 'Logotipo',
                    'logo-size'              => 'A resolução da imagem deve ser de 192px X 50px',
                    'favicon'                => 'Favicon',
                    'favicon-size'           => 'A resolução da imagem deve ser de 16px X 16px',
                    'seo'                    => 'SEO da Página Inicial',
                    'seo-title'              => 'Título Meta',
                    'seo-description'        => 'Descrição Meta',
                    'seo-keywords'           => 'Palavras-chave Meta',
                    'currencies-and-locales' => 'Moedas e Locais',
                    'locales'                => 'Locais',
                    'default-locale'         => 'Local Padrão',
                    'currencies'             => 'Moedas',
                    'default-currency'       => 'Moeda Padrão',
                    'last-delete-error'      => 'Pelo menos um Canal é necessário.',
                    'settings'               => 'Configurações',
                    'status'                 => 'Status',
                    'update-success'         => 'Canal Atualizado com Sucesso',
                ],
            
                'update-success' => 'Canal atualizado com sucesso.',
                'delete-success' => 'Canal excluído com sucesso.',
                'delete-failed'  => 'Falha ao excluir o Canal',
            ],

            'themes' => [
                'index' => [
                    'create-btn' => 'Criar Tema',
                    'title'      => 'Temas',
            
                    'datagrid' => [
                        'active'       => 'Ativo',
                        'channel_name' => 'Nome do Canal',
                        'delete'       => 'Excluir',
                        'inactive'     => 'Inativo',
                        'id'           => 'Id',
                        'name'         => 'Nome',
                        'status'       => 'Status',
                        'sort-order'   => 'Ordem de Classificação',
                        'type'         => 'Tipo',
                        'view'         => 'Visualizar',
                    ],
                ],
            
                'create' => [
                    'name'       => 'Nome',
                    'save-btn'   => 'Salvar Tema',
                    'sort-order' => 'Ordem de Classificação',
                    'title'      => 'Criar Tema',
            
                    'type' => [
                        'footer-links'     => 'Links do Rodapé',
                        'image-carousel'   => 'Carrossel de Imagens',
                        'product-carousel' => 'Carrossel de Produtos',
                        'static-content'   => 'Conteúdo Estático',
                        'services-content' => 'Conteúdo de Serviços',
                        'title'            => 'Tipo',
                    ],
                ],
            
                'edit' => [
                    'add-image-btn'                 => 'Adicionar Imagem',
                    'add-filter-btn'                => 'Adicionar Filtro',
                    'add-footer-link-btn'           => 'Adicionar Link no Rodapé',
                    'add-link'                      => 'Adicionar Link',
                    'asc'                           => 'Ascendente',
                    'back'                          => 'Voltar',
                    'category-carousel-description' => 'Exiba categorias dinâmicas de forma atraente usando um carrossel responsivo.',
                    'category-carousel'             => 'Carrossel de Categorias',
                    'create-filter'                 => 'Criar Filtro',
                    'css'                           => 'CSS',
                    'column'                        => 'Coluna',
                    'channels'                      => 'Canais',
                    'desc'                          => 'Descendente',
                    'delete'                        => 'Excluir',
                    'edit'                          => 'Editar',
                    'footer-title'                  => 'Título',
                    'footer-link'                   => 'Links do Rodapé',
                    'footer-link-form-title'        => 'Link do Rodapé',
                    'filter-title'                  => 'Título',
                    'filters'                       => 'Filtros',
                    'footer-link-description'       => 'Navegue por meio de links no rodapé para uma exploração e obtenção de informações sem interrupções no site.',
                    'general'                       => 'Geral',
                    'html'                          => 'HTML',
                    'image'                         => 'Imagem',
                    'image-size'                    => 'A resolução da imagem deve ser (1920px X 700px)',
                    'image-title'                   => 'Título da Imagem',
                    'image-upload-message'          => 'Apenas imagens (.jpeg, .jpg, .png, .webp, ..) são permitidas.',
                    'key'                           => 'Chave: :key',
                    'key-input'                     => 'Chave',
                    'link'                          => 'Link',
                    'limit'                         => 'Limite',
                    'name'                          => 'Nome',
                    'product-carousel'              => 'Carrossel de Produtos',
                    'product-carousel-description'  => 'Apresente produtos de forma elegante com um carrossel de produtos dinâmico e responsivo.',
                    'path'                          => 'Caminho',
                    'preview'                       => 'Visualização',
                    'slider'                        => 'Slider',
                    'static-content-description'    => 'Aumente o engajamento com conteúdo estático conciso e informativo para o seu público.',
                    'static-content'                => 'Conteúdo Estático',
                    'slider-description'            => 'Personalização de tema relacionada ao slider.',
                    'slider-required'               => 'Campo Slider é obrigatório.',
                    'slider-add-btn'                => 'Adicionar Slider',
                    'save-btn'                      => 'Salvar',
                    'sort'                          => 'Ordenar',
                    'sort-order'                    => 'Ordem de Classificação',
                    'status'                        => 'Status',
                    'slider-image'                  => 'Imagem do Slider',
                    'select'                        => 'Selecionar',
                    'title'                         => 'Editar Tema',
                    'update-slider'                 => 'Atualizar Slider',
                    'url'                           => 'URL',
                    'value-input'                   => 'Valor',
                    'value'                         => 'Valor: :value',
            
                    'services-content' => [
                        'add-btn'            => 'Adicionar Serviços',
                        'channels'           => 'Canais',
                        'delete'             => 'Excluir',
                        'description'        => 'Descrição',
                        'general'            => 'Geral',
                        'name'               => 'Nome',
                        'save-btn'           => 'Salvar',
                        'service-icon'       => 'Ícone do Serviço',
                        'service-icon-class' => 'Classe do Ícone do Serviço',
                        'service-info'       => 'Personalização de tema relacionada a serviços.',
                        'services'           => 'Serviços',
                        'sort-order'         => 'Ordem de Classificação',
                        'status'             => 'Status',
                        'title'              => 'Título',
                        'update-service'     => 'Atualizar Serviços',
                    ],
                ],
            
                'create-success' => 'Tema criado com sucesso',
                'delete-success' => 'Tema excluído com sucesso',
                'update-success' => 'Tema atualizado com sucesso',
                'delete-failed'  => 'Erro encontrado ao excluir o conteúdo do tema.',
            ],
            
            'email' => [
                'create' => [
                    'send-btn'                  => 'Enviar Email',
                    'back-btn'                  => 'Voltar',
                    'title'                     => 'Enviar Email',
                    'general'                   => 'Geral',
                    'body'                      => 'Corpo',
                    'subject'                   => 'Assunto',
                    'dear'                      => 'Prezado :agent_name',
                    'agent-registration'        => 'Agente Saas Registrado com Sucesso',
                    'summary'                   => 'Sua conta foi criada. Os detalhes da sua conta estão abaixo: ',
                    'saas-url'                  => 'Domínio',
                    'email'                     => 'Email',
                    'password'                  => 'Senha',
                    'sign-in'                   => 'Entrar',
                    'thanks'                    => 'Obrigado!',
                    'send-email-to-all-tenants' => 'Enviar email para todos os inquilinos',
                ],
            
                'send-success' => 'Email enviado com sucesso.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'Lista de Páginas do CMS',
                'create-btn' => 'Criar Página',
        
                'datagrid' => [
                    'id'                  => 'ID',
                    'page-title'          => 'Título da Página',
                    'url-key'             => 'Chave URL',
                    'status'              => 'Status',
                    'active'              => 'Ativo',
                    'disable'             => 'Desativar',
                    'edit'                => 'Modificar Página',
                    'delete'              => 'Remover Página',
                    'mass-delete'         => 'Excluir em Massa',
                    'mass-delete-success' => 'Página(s) do CMS selecionada(s) excluída(s) com sucesso',
                ],
            ],
        
            'create' => [
                'title'            => 'Criar Página do CMS',
                'first-name'       => 'Primeiro Nome',
                'general'          => 'Geral',
                'page-title'       => 'Título',
                'channels'         => 'Canais',
                'content'          => 'Conteúdo',
                'meta-keywords'    => 'Meta Palavras-chave',
                'meta-description' => 'Meta Descrição',
                'meta-title'       => 'Meta Título',
                'seo'              => 'SEO',
                'url-key'          => 'Chave URL',
                'description'      => 'Descrição',
                'save-btn'         => 'Salvar Página do CMS',
                'back-btn'         => 'Voltar',
            ],
        
            'edit' => [
                'title'            => 'Editar Página',
                'preview-btn'      => 'Visualizar Página',
                'save-btn'         => 'Salvar Página',
                'general'          => 'Geral',
                'page-title'       => 'Título da Página',
                'back-btn'         => 'Voltar',
                'channels'         => 'Canais',
                'content'          => 'Conteúdo',
                'seo'              => 'SEO',
                'meta-keywords'    => 'Meta Palavras-chave',
                'meta-description' => 'Meta Descrição',
                'meta-title'       => 'Meta Título',
                'url-key'          => 'Chave URL',
                'description'      => 'Descrição',
            ],
        
            'create-success' => 'CMS criado com sucesso.',
            'delete-success' => 'CMS excluído com sucesso.',
            'update-success' => 'CMS atualizado com sucesso.',
            'no-resource'    => 'Recurso não existe.',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => 'Excluir',
                'enable-at-least-one-shipping' => 'Ativar pelo menos um método de envio.',
                'enable-at-least-one-payment'  => 'Ativar pelo menos um método de pagamento.',
                'save-btn'                     => 'Salvar Configuração',
                'save-message'                 => 'Configuração salva com sucesso',
                'title'                        => 'Configuração',
        
                'general' => [
                    'info'  => 'Gerencie o layout e os detalhes do e-mail',
                    'title' => 'Geral',
        
                    'design' => [
                        'info'  => 'Defina o logotipo e o ícone do favicon.',
                        'title' => 'Design',
        
                        'super' => [
                            'info'          => 'O logotipo do super admin é a imagem ou emblema distintivo que representa a interface de administração de um sistema ou site, muitas vezes personalizável.',
                            'admin-logo'    => 'Logotipo do Admin',
                            'logo-image'    => 'Imagem do Logotipo',
                            'favicon-image' => 'Imagem do Favicon',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => 'Defina o endereço de e-mail para o super admin.',
                        'title' => 'Super Agente',
        
                        'super' => [
                            'info'          => 'Defina o endereço de e-mail para o super admin receber notificações por e-mail',
                            'email-address' => 'Endereço de E-mail',
                        ],

                        'social-connect' => [
                            'title'    => 'Conexão Social',
                            'info'     => 'As plataformas de mídia social fornecem oportunidades para interação direta com seu público por meio de comentários, curtidas e compartilhamentos, promovendo o engajamento e construindo uma comunidade em torno de sua marca.',
                            'facebook' => 'Facebook',
                            'twitter'  => 'Twitter',
                            'linkedin' => 'LinkedIn',
                        ],
                    ],
        
                    'content' => [
                        'info'   => 'Configure as informações de cabeçalho e rodapé para o layout do registro do locatário.',
                        'title'  => 'Conteúdo',
        
                        'footer' => [
                            'info'           => 'Configure o conteúdo do rodapé',
                            'title'          => 'Rodapé',
                            'footer-content' => 'Texto do Rodapé',
                            'footer-toggle'  => 'Alternar rodapé',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => 'Gerencie detalhes de vendas, envio e métodos de pagamento',
                    'title' => 'Vendas',
        
                    'shipping-methods' => [
                        'info'  => 'Configure informações sobre métodos de envio',
                        'title' => 'Métodos de Envio',
                    ],
        
                    'payment-methods' => [
                        'info'  => 'Configure informações sobre métodos de pagamento',
                        'title' => 'Métodos de Pagamento',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => 'Ativar pelo menos um método de envio.',
            'enable-at-least-one-payment'  => 'Ativar pelo menos um método de pagamento.',
            'save-message'                 => 'Sucesso: Configuração do super admin salva com sucesso.',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'Registrar como Inquilino',
            ],
    
            'footer' => [
                'footer-text'     => '© Direitos autorais 2010 - 2023, Webkul Software (Registrado na Índia). Todos os direitos reservados.',
                'connect-with-us' => 'Conecte-se Conosco',
                'text-locale'     => 'Local',
                'text-currency'   => 'Moeda',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => 'Registro de Comerciante',
            'step-1'              => 'Passo 1',
            'auth-cred'           => 'Credenciais de Autenticação',
            'email'               => 'Email',
            'phone'               => 'Telefone',
            'username'            => 'Nome de Usuário',
            'password'            => 'Senha',
            'cpassword'           => 'Confirmar Senha',
            'continue'            => 'Continuar',
            'step-2'              => 'Passo 2',
            'personal'            => 'Detalhes Pessoais',
            'first-name'          => 'Primeiro Nome',
            'last-name'           => 'Sobrenome',
            'step-3'              => 'Passo 3',
            'org-details'         => 'Detalhes da Organização',
            'org-name'            => 'Nome da Organização',
            'company-activated'   => 'Sucesso: Empresa ativada com sucesso.',
            'company-deactivated' => 'Sucesso: Empresa desativada com sucesso.',
            'company-updated'     => 'Sucesso: Empresa atualizada com sucesso.',
            'something-wrong'     => 'Aviso: Algo deu errado.',
            'store-created'       => 'Sucesso: Loja criada com sucesso.',
            'something-wrong-1'   => 'Aviso: Algo deu errado, por favor, tente novamente mais tarde.',
            'content'             => 'Torne-se um comerciante e crie sua própria loja sem complicações, sem se preocupar em instalar e gerenciar o servidor. Basta se cadastrar, fazer upload dos dados do produto e obter sua loja de comércio eletrônico. O módulo SaaS multiempresa Laravel oferece facilidades de personalização fáceis, o que significa que o comerciante pode facilmente adicionar recursos e funcionalidades extras à sua loja ou melhorá-la facilmente.',
    
            'right-panel' => [
                'heading'    => 'Como configurar uma conta de comerciante',
                'para'       => 'É fácil configurar o módulo em apenas alguns passos',
                'step-one'   => 'Digite as credenciais de autenticação como email, senha e confirmar senha',
                'step-two'   => 'Digite os detalhes pessoais como primeiro nome, último nome e número de telefone.',
                'step-three' => 'Digite os detalhes da organização como nome de usuário, nome da organização',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => 'Aviso: Não é permitida a criação de mais de um canal',
            'channel-hostname'                  => 'Aviso: Entre em contato com o administrador para alterar seu nome de host',
            'same-domain'                       => 'Aviso: Não é possível manter o mesmo subdomínio que o domínio principal',
            'block-message'                     => 'Aviso: Se você quiser desbloquear este inquilino, sinta-se à vontade para entrar em contato conosco, estamos disponíveis 24 horas por dia, 7 dias por semana para resolver seu problema.',
            'blocked'                           => 'foi bloqueado',
            'illegal-action'                    => 'Aviso: Você realizou uma ação ilegal',
            'domain-message'                    => 'Aviso: Oops! Não conseguimos ajudar em <b>:domain</b>',
            'domain-desc'                       => 'Se você deseja criar uma conta com <b>:domain</b>
            como uma organização, sinta-se à vontade para criar uma conta e começar.',
            'illegal-message'                   => 'Aviso: A ação que você realizou foi desativada pelo administrador do site, por favor, envie um e-mail para o administrador do site para obter mais detalhes sobre isso.',
            'locale-creation'                   => 'Aviso: Não é permitida a criação de localidade diferente do inglês.',
            'locale-delete'                     => 'Aviso: Não é possível excluir a Localidade.',
            'cannot-delete-default'             => 'Aviso: Não é possível excluir o canal padrão.',
            'tenant-blocked'                    => 'Inquilino Bloqueado',
            'domain-not-found'                  => 'Aviso: Domínio não encontrado.',
            'company-blocked-by-administrator'  => 'Este inquilino está bloqueado',
            'not-allowed-to-visit-this-section' => 'Aviso: Você não tem permissão para usar esta seção.',
            'auth'                              => 'Aviso: Erro de Autenticação!',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'Nova Empresa Registrada',
                'first-name' => 'Primeiro Nome',
                'last-name'  => 'Sobrenome',
                'email'      => 'Email',
                'name'       => 'Nome',
                'username'   => 'Nome de Usuário',
                'domain'     => 'Domínio',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => 'Nova Empresa Registrada com Sucesso',
                'dear'       => 'Prezado :tenant_name',
                'greeting'   => 'Bem-vindo e obrigado por se registrar conosco!',
                'summary'    => 'Sua conta foi criada com sucesso e você pode fazer login usando seu endereço de e-mail e credenciais de senha. Ao fazer login, você poderá acessar outros serviços, incluindo produtos, vendas, clientes, avaliações e promoções.',
                'thanks'     => 'Obrigado!',
                'visit-shop' => 'Visitar Loja',
            ],
        ],
    ],

    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'Editar Detalhes da Empresa',
            'first-name'     => 'Primeiro Nome',
            'last-name'      => 'Último Nome',
            'email'          => 'Email',
            'skype'          => 'Skype',
            'cname'          => 'Cnome',
            'phone'          => 'Telefone',
            'general'        => 'Geral',
            'back-btn'       => 'Voltar',
            'save-btn'       => 'Salvar Detalhes',
            'update-success' => 'Sucesso: :resource atualizado com sucesso.',
            'update-failed'  => 'Aviso: Não foi possível atualizar :resource por razões desconhecidas.',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => 'Lista de Endereços da Empresa',
                'create-btn' => 'Adicionar Endereço',
    
                'datagrid' => [
                    'id'          => 'Id',
                    'address1'    => 'Endereço 1',
                    'address2'    => 'Endereço 2',
                    'city'        => 'Cidade',
                    'country'     => 'País',
                    'edit'        => 'Editar',
                    'delete'      => 'Excluir',
                    'mass-delete' => 'Exclusão em Massa',
                ],
            ],
    
            'create' => [
                'title'     => 'Criar Endereço da Empresa',
                'general'   => 'Geral',
                'address1'  => 'Endereço1',
                'address2'  => 'Endereço2',
                'country'   => 'País',
                'state'     => 'Estado',
                'city'      => 'Cidade',
                'post-code' => 'Código Postal',
                'phone'     => 'Telefone',
                'back-btn'  => 'Voltar',
                'save-btn'  => 'Salvar Endereço',
            ],
    
            'edit' => [
                'title'     => 'Editar Endereço da Empresa',
                'general'   => 'Geral',
                'address1'  => 'Endereço1',
                'address2'  => 'Endereço2',
                'country'   => 'País',
                'state'     => 'Estado',
                'city'      => 'Cidade',
                'post-code' => 'Código Postal',
                'phone'     => 'Telefone',
                'back-btn'  => 'Voltar',
                'save-btn'  => 'Salvar Endereço',
            ],
    
            'create-success'      => 'Sucesso: Endereço da empresa criado com sucesso.',
            'update-success'      => 'Sucesso: Endereço da empresa atualizado com sucesso.',
            'delete-success'      => 'Sucesso: :resource excluído com sucesso.',
            'delete-failed'       => 'Aviso: Não é possível excluir :resource por razões desconhecidas.',
            'mass-delete-success' => 'Sucesso: Endereço selecionado excluído com sucesso.',
        ],
    
        'system' => [
            'social-login'           => 'Login Social',
            'facebook'               => 'Configurações do Facebook',
            'facebook-client-id'     => 'ID do Cliente do Facebook',
            'facebook-client-secret' => 'Segredo do Cliente do Facebook',
            'facebook-callback-url'  => 'URL de Retorno do Facebook',
            'twitter'                => 'Configurações do Twitter',
            'twitter-client-id'      => 'ID do Cliente do Twitter',
            'twitter-client-secret'  => 'Segredo do Cliente do Twitter',
            'twitter-callback-url'   => 'URL de Retorno do Twitter',
            'google'                 => 'Configurações do Google',
            'google-client-id'       => 'ID do Cliente do Google',
            'google-client-secret'   => 'Segredo do Cliente do Google',
            'google-callback-url'    => 'URL de Retorno do Google',
            'linkedin'               => 'Configurações do LinkedIn',
            'linkedin-client-id'     => 'ID do Cliente do LinkedIn',
            'linkedin-client-secret' => 'Segredo do Cliente do LinkedIn',
            'linkedin-callback-url'  => 'URL de Retorno do LinkedIn',
            'github'                 => 'Configurações do GitHub',
            'github-client-id'       => 'ID do Cliente do GitHub',
            'github-client-secret'   => 'Segredo do Cliente do GitHub',
            'github-callback-url'    => 'URL de Retorno do GitHub',
            'email-credentials'      => 'Credenciais de Email',
            'mail-driver'            => 'Driver de Email',
            'mail-host'              => 'Host de Email',
            'mail-port'              => 'Porta de Email',
            'mail-username'          => 'Nome de Usuário de Email',
            'mail-password'          => 'Senha de Email',
            'mail-encryption'        => 'Criptografia de Email',
        ],
    
        'tenant' => [
            'id'              => 'ID',
            'first-name'      => 'Primeiro Nome',
            'last-name'       => 'Último Nome',
            'email'           => 'Email',
            'skype'           => 'Skype',
            'c-name'          => 'Cnome',
            'add-address'     => 'Adicionar Endereço',
            'country'         => 'País',
            'city'            => 'Cidade',
            'address1'        => 'Endereço 1',
            'address2'        => 'Endereço 2',
            'address'         => 'Lista de Endereços',
            'company'         => 'Inquilino',
            'profile'         => 'Perfil',
            'update'          => 'Atualizar',
            'address-details' => 'Detalhes do Endereço',
            'create-failed'   => 'Aviso: Não é possível criar :attribute devido a razões desconhecidas.',
            'update-success'  => 'Sucesso: :resource atualizado com sucesso.',
            'update-failed'   => 'Aviso: Não é possível atualizar :resource por razões desconhecidas.',
    
            'company-address' => [
                'add-address-title'    => 'Novo Endereço',
                'update-address-title' => 'Atualizar Endereço',
                'save-btn-title'       => 'Salvar Endereço',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'Um pedido :order_id foi feito por :placed_by em :created_at.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'Oops! A página que você está procurando está de férias. Parece que não conseguimos encontrar o que você estava procurando.',
            'title'       => '404 Página Não Encontrada',
        ],

        '401' => [
            'description' => 'Oops! Parece que você não tem permissão para acessar esta página. Parece que você está faltando as credenciais necessárias.',
            'title'       => '401 Não Autorizado',
        ],

        '403' => [
            'description' => 'Oops! Esta página está proibida. Parece que você não tem as permissões necessárias para visualizar este conteúdo.',
            'title'       => '403 Proibido',
        ],

        '500' => [
            'description' => 'Oops! Algo deu errado. Parece que estamos tendo problemas para carregar a página que você está procurando.',
            'title'       => '500 Erro Interno do Servidor',
        ],

        '503' => [
            'description' => 'Oops! Parece que estamos temporariamente fora do ar para manutenção. Por favor, volte em breve.',
            'title'       => '503 Serviço Indisponível',
        ],
    ],
];
