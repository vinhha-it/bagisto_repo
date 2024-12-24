<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'Versión : :version',
                'account-title' => 'Cuenta',
                'logout'        => 'Cerrar sesión',
                'my-account'    => 'Mi cuenta',
                'visit-shop'    => 'Visitar tienda',
            ],
    
            'sidebar' => [
                'tenants'          => 'Inquilinos',
                'tenant-customers' => 'Clientes',
                'tenant-products'  => 'Productos',
                'tenant-orders'    => 'Órdenes',
                'settings'         => 'Configuraciones',
                'agents'           => 'Agentes',
                'roles'            => 'Roles',
                'locales'          => 'Idiomas locales',
                'currencies'       => 'Monedas',
                'channels'         => 'Canales',
                'exchange-rates'   => 'Tipos de cambio',
                'themes'           => 'Temas',
                'cms'              => 'CMS',
                'configurations'   => 'Configuraciones',
                'general'          => 'General',
                'send-email'       => 'Enviar correo electrónico',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'Inquilinos',
            'create'         => 'Agregar',
            'edit'           => 'Editar',
            'delete'         => 'Eliminar',
            'cancel'         => 'Cancelar',
            'view'           => 'Ver',
            'mass-delete'    => 'Eliminar en Masa',
            'mass-update'    => 'Actualizar en Masa',
            'customers'      => 'Clientes',
            'products'       => 'Productos',
            'orders'         => 'Pedidos',
            'settings'       => 'Configuraciones',
            'agents'         => 'Agentes',
            'roles'          => 'Roles',
            'locales'        => 'Idiomas',
            'currencies'     => 'Monedas',
            'exchange-rates' => 'Tasas de Cambio',
            'channels'       => 'Canales',
            'themes'         => 'Temas',
            'send-email'     => 'Enviar Correo Electrónico',
            'cms'            => 'CMS',
            'configuration'  => 'Configuración',
            'download'       => 'Descargar',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => 'Inicio de Sesión del Super Administrador',
                'email'                => 'Correo Electrónico',
                'password'             => 'Contraseña',
                'btn-submit'           => 'Iniciar Sesión',
                'forget-password-link' => '¿Olvidaste la Contraseña?',
                'submit-btn'           => 'Iniciar Sesión',
                'login-success'        => 'Éxito: Has iniciado sesión correctamente.',
                'login-error'          => 'Por favor, verifica tus credenciales e inténtalo de nuevo.',
                'activate-warning'     => 'Tu cuenta aún no ha sido activada, por favor contacta al administrador.',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'Olvidé la Contraseña',
                    'title'           => 'Recuperar Contraseña',
                    'email'           => 'Correo Electrónico Registrado',
                    'reset-link-sent' => 'Enlace para Restablecer la Contraseña enviado',
                    'sign-in-link'    => '¿Volver a Iniciar Sesión?',
                    'email-not-exist' => 'Correo Electrónico No Existe',
                    'submit-btn'      => 'Restablecer',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'Restablecer Contraseña',
                'back-link-title'  => '¿Volver a Iniciar Sesión?',
                'confirm-password' => 'Confirmar Contraseña',
                'email'            => 'Correo Electrónico Registrado',
                'password'         => 'Contraseña',
                'submit-btn'       => 'Restablecer Contraseña',
            ],
        ],
        
        'tenants' => [
            'index' => [
                'title'        => 'Lista de Inquilinos',
                'register-btn' => 'Registrar Inquilino',
        
                'create' => [
                    'title'             => 'Crear Inquilino',
                    'first-name'        => 'Nombre',
                    'last-name'         => 'Apellido',
                    'user-name'         => 'Nombre de Usuario',
                    'organization-name' => 'Nombre de la Organización',
                    'phone'             => 'Teléfono',
                    'email'             => 'Correo Electrónico',
                    'password'          => 'Contraseña',
                    'confirm-password'  => 'Confirmar Contraseña',
                    'save-btn'          => 'Guardar Inquilino',
                    'back-btn'          => 'Volver',
                ],
        
                'datagrid' => [
                    'id'                  => 'ID',
                    'user-name'           => 'Nombre de Usuario',
                    'organization'        => 'Organización',
                    'domain'              => 'Dominio',
                    'cname'               => 'cNombre',
                    'status'              => 'Estado',
                    'active'              => 'Activo',
                    'disable'             => 'Desactivar',
                    'view'                => 'Ver Detalles',
                    'edit'                => 'Modificar Inquilino',
                    'delete'              => 'Eliminar Inquilino',
                    'mass-delete'         => 'Eliminar en Masa',
                    'mass-delete-success' => 'Inquilino(s) seleccionado(s) eliminado(s) con éxito',
                ],
            ],
        
            'edit' => [
                'title'             => 'Editar Inquilino',
                'first-name'        => 'Nombre',
                'last-name'         => 'Apellido',
                'user-name'         => 'Nombre de Usuario',
                'cname'             => 'cNombre',
                'organization-name' => 'Nombre de la Organización',
                'phone'             => 'Teléfono',
                'status'            => 'Estado',
                'email'             => 'Correo Electrónico',
                'password'          => 'Contraseña',
                'confirm-password'  => 'Confirmar Contraseña',
                'save-btn'          => 'Guardar Inquilino',
                'back-btn'          => 'Volver',
                'general'           => 'General',
                'settings'          => 'Configuraciones',
            ],
        
            'view' => [
                'title'                        => 'Información del Inquilino',
                'heading'                      => 'Inquilino - :tenant_name',
                'email-address'                => 'Dirección de Correo Electrónico',
                'phone'                        => 'Teléfono',
                'domain-information'           => 'Información del Dominio',
                'mapped-domain'                => 'Dominio Mapeado',
                'cname-information'            => 'Información del cNombre',
                'cname-entry'                  => 'Entrada cNombre',
                'attribute-information'        => 'Información del Atributo',
                'no-of-attributes'             => 'Número de Atributos',
                'attribute-family-information' => 'Información de la Familia de Atributos',
                'no-of-attribute-families'     => 'Número de Familias de Atributos',
                'product-information'          => 'Información del Producto',
                'no-of-products'               => 'Número de Productos',
                'customer-information'         => 'Información del Cliente',
                'no-of-customers'              => 'Número de Clientes',
                'customer-group-information'   => 'Información del Grupo de Clientes',
                'no-of-customer-groups'        => 'Número de Grupos de Clientes',
                'category-information'         => 'Información de la Categoría',
                'no-of-categories'             => 'Número de Categorías',
                'addresses'                    => 'Lista de Direcciones (:count)',
                'empty-title'                  => 'Agregar Dirección del Inquilino',
            ],
        
            'create-success' => 'Inquilino creado exitosamente',
            'delete-success' => 'Inquilino eliminado exitosamente',
            'delete-failed'  => 'Falló la eliminación del Inquilino',
            'product-copied' => 'Inquilino copiado exitosamente',
            'update-success' => 'Inquilino actualizado exitosamente',
        
            'customers' => [
                'index' => [
                    'title' => 'Lista de Clientes',
        
                    'datagrid' => [
                        'id'             => 'ID',
                        'domain'         => 'Dominio',
                        'customer-name'  => 'Nombre del Cliente',
                        'email'          => 'Correo Electrónico',
                        'customer-group' => 'Grupo de Clientes',
                        'phone'          => 'Teléfono',
                        'status'         => 'Estado',
                        'active'         => 'Activo',
                        'inactive'       => 'Inactiva',
                        'is-suspended'   => 'Suspendida',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => 'Lista de Productos',
        
                    'datagrid' => [
                        'id'               => 'ID',
                        'domain'           => 'Dominio',
                        'name'             => 'Nombre',
                        'sku'              => 'SKU',
                        'attribute-family' => 'Familia de Atributos',
                        'image'            => 'Imagen',
                        'price'            => 'Precio',
                        'qty'              => 'Cantidad',
                        'status'           => 'Estado',
                        'active'           => 'Activo',
                        'inactive'         => 'Inactiva',
                        'category'         => 'Categoría',
                        'type'             => 'Tipo',
                    ],
                ],
            ],
        
            'orders' => [
                'index' => [
                    'title' => 'Lista de Pedidos',
        
                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => 'ID del Pedido',
                        'domain'          => 'Dominio',
                        'sub-total'       => 'Subtotal',
                        'grand-total'     => 'Total',
                        'order-date'      => 'Fecha del Pedido',
                        'channel-name'    => 'Nombre del Canal',
                        'status'          => 'Estado',
                        'processing'      => 'Procesando',
                        'completed'       => 'Completado',
                        'canceled'        => 'Cancelado',
                        'closed'          => 'Cerrado',
                        'pending'         => 'Pendiente',
                        'pending-payment' => 'Pago Pendiente',
                        'fraud'           => 'Fraude',
                        'customer'        => 'Cliente',
                        'email'           => 'Correo Electrónico',
                        'location'        => 'Ubicación',
                        'images'          => 'Imágenes',
                        'pay-by'          => 'Pagar Por - ',
                        'pay-via'         => 'Pagar Via',
                        'date'            => 'Fecha',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'Lista de Agentes',
                    'register-btn' => 'Crear Agente',
            
                    'create' => [
                        'title'             => 'Crear Agente',
                        'first-name'        => 'Nombre',
                        'last-name'         => 'Apellido',
                        'email'             => 'Correo electrónico',
                        'current-password'  => 'Contraseña actual',
                        'password'          => 'Contraseña',
                        'confirm-password'  => 'Confirmar Contraseña',
                        'role'              => 'Rol',
                        'select'            => 'Seleccionar',
                        'status'            => 'Estado',
                        'save-btn'          => 'Guardar Agente',
                        'back-btn'          => 'Atrás',
                        'upload-image-info' => 'Sube una imagen de perfil (110px X 110px) en formato PNG o JPG',
                    ],
            
                    'edit' => [
                        'title' => 'Editar Agente',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Id',
                        'name'    => 'Nombre',
                        'email'   => 'Correo electrónico',
                        'role'    => 'Rol',
                        'status'  => 'Estado',
                        'active'  => 'Activo',
                        'disable' => 'Desactivar',
                        'actions' => 'Acciones',
                        'edit'    => 'Editar',
                        'delete'  => 'Eliminar',
                    ],
                ],
            
                'create-success'             => 'Éxito: Super administrador de agente creado exitosamente',
                'delete-success'             => 'Agente eliminado exitosamente',
                'delete-failed'              => 'Error al eliminar el agente',
                'cannot-change'              => 'No se puede cambiar el nombre de :name del agente',
                'product-copied'             => 'Agente copiado exitosamente',
                'update-success'             => 'Agente actualizado exitosamente',
                'invalid-password'           => 'La contraseña actual ingresada es incorrecta',
                'last-delete-error'          => 'Advertencia: Se requiere al menos un super administrador de agente',
                'login-delete-error'         => 'Advertencia: No puedes eliminar tu propia cuenta.',
                'administrator-delete-error' => 'Advertencia: Se requiere al menos un super administrador de agente con acceso de administrador',
            ],
            
            'roles' => [
                'index' => [
                    'title'      => 'Lista de Roles',
                    'create-btn' => 'Crear Rol',
            
                    'datagrid' => [
                        'id'              => 'Id',
                        'name'            => 'Nombre',
                        'permission-type' => 'Tipo de Permiso',
                        'actions'         => 'Acciones',
                        'edit'            => 'Editar',
                        'delete'          => 'Eliminar',
                    ],
                ],
            
                'create' => [
                    'access-control' => 'Control de Acceso',
                    'all'            => 'Todo',
                    'back-btn'       => 'Atrás',
                    'custom'         => 'Personalizado',
                    'description'    => 'Descripción',
                    'general'        => 'General',
                    'name'           => 'Nombre',
                    'permissions'    => 'Permisos',
                    'save-btn'       => 'Guardar Rol',
                    'title'          => 'Crear Rol',
                ],
            
                'edit' => [
                    'access-control' => 'Control de Acceso',
                    'all'            => 'Todo',
                    'back-btn'       => 'Atrás',
                    'custom'         => 'Personalizado',
                    'description'    => 'Descripción',
                    'general'        => 'General',
                    'name'           => 'Nombre',
                    'permissions'    => 'Permisos',
                    'save-btn'       => 'Guardar Rol',
                    'title'          => 'Editar Rol',
                ],
            
                'being-used'        => 'El rol ya está siendo utilizado por otro agente',
                'last-delete-error' => 'El último rol no puede ser eliminado',
                'create-success'    => 'Rol creado exitosamente',
                'delete-success'    => 'Rol eliminado exitosamente',
                'delete-failed'     => 'Error al eliminar el rol',
                'update-success'    => 'Rol actualizado exitosamente',
            ],
            
            'locales' => [
                'index' => [
                    'title'      => 'Lista de Idiomas',
                    'create-btn' => 'Crear Idioma',
            
                    'create' => [
                        'title'            => 'Crear Idioma',
                        'code'             => 'Código',
                        'name'             => 'Nombre',
                        'direction'        => 'Dirección',
                        'select-direction' => 'Seleccionar Dirección',
                        'text-ltr'         => 'De izquierda a derecha',
                        'text-rtl'         => 'De derecha a izquierda',
                        'locale-logo'      => 'Logotipo del Idioma',
                        'logo-size'        => 'La resolución de la imagen debe ser de 24px X 16px',
                        'save-btn'         => 'Guardar Idioma',
                    ],
            
                    'edit' => [
                        'title'     => 'Editar Idioma',
                        'code'      => 'Código',
                        'name'      => 'Nombre',
                        'direction' => 'Dirección',
                    ],
            
                    'datagrid' => [
                        'id'        => 'Id',
                        'code'      => 'Código',
                        'name'      => 'Nombre',
                        'direction' => 'Dirección',
                        'text-ltr'  => 'De izquierda a derecha',
                        'text-rtl'  => 'De derecha a izquierda',
                        'actions'   => 'Acciones',
                        'edit'      => 'Editar',
                        'delete'    => 'Eliminar',
                    ],
                ],

                'being-used'        => 'El idioma :locale_name se utiliza como idioma predeterminado en el canal',
                'create-success'    => 'Idioma creado exitosamente.',
                'update-success'    => 'Idioma actualizado exitosamente.',
                'delete-success'    => 'Idioma eliminado exitosamente.',
                'delete-failed'     => 'Error al eliminar el idioma',
                'last-delete-error' => 'Se requiere al menos un super administrador de idioma.',
            ],
            
            'currencies' => [
                'index' => [
                    'title'      => 'Lista de Monedas',
                    'create-btn' => 'Crear Moneda',
            
                    'create' => [
                        'title'    => 'Crear Moneda',
                        'code'     => 'Código',
                        'name'     => 'Nombre',
                        'symbol'   => 'Símbolo',
                        'decimal'  => 'Decimal',
                        'save-btn' => 'Guardar Moneda',
                    ],
            
                    'edit' => [
                        'title'    => 'Editar Moneda',
                        'code'     => 'Código',
                        'name'     => 'Nombre',
                        'symbol'   => 'Símbolo',
                        'decimal'  => 'Decimal',
                        'save-btn' => 'Guardar Moneda',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Id',
                        'code'    => 'Código',
                        'name'    => 'Nombre',
                        'actions' => 'Acciones',
                        'edit'    => 'Editar',
                        'delete'  => 'Eliminar',
                    ],
                ],
            
                'create-success'      => 'Moneda creada exitosamente.',
                'update-success'      => 'Moneda actualizada exitosamente.',
                'delete-success'      => 'Moneda eliminada exitosamente.',
                'delete-failed'       => 'Error al eliminar la moneda',
                'last-delete-error'   => 'Se requiere al menos un super administrador de moneda.',
                'mass-delete-success' => 'Monedas seleccionadas eliminadas exitosamente',
            ],
            
            'exchange-rates' => [
                'index' => [
                    'title'        => 'Tasas de Cambio',
                    'create-btn'   => 'Crear Tasa de Cambio',
                    'update-rates' => 'Actualizar Tasas',
            
                    'create' => [
                        'title'                  => 'Crear Tasa de Cambio',
                        'source-currency'        => 'Moneda Fuente',
                        'target-currency'        => 'Moneda Objetivo',
                        'select-target-currency' => 'Seleccionar Moneda Objetivo',
                        'rate'                   => 'Tasa',
                        'save-btn'               => 'Guardar Tasa de Cambio',
                    ],
            
                    'edit' => [
                        'title'           => 'Editar Tasa de Cambio',
                        'source-currency' => 'Moneda Fuente',
                        'target-currency' => 'Moneda Objetivo',
                        'rate'            => 'Tasa',
                        'save-btn'        => 'Guardar Tasa de Cambio',
                    ],
            
                    'datagrid' => [
                        'id'            => 'Id',
                        'currency-name' => 'Nombre de la Moneda',
                        'exchange-rate' => 'Tasa de Cambio',
                        'actions'       => 'Acciones',
                        'edit'          => 'Editar',
                        'delete'        => 'Eliminar',
                    ],
                ],
            
                'create-success' => 'Tasa de Cambio creada exitosamente.',
                'update-success' => 'Tasa de Cambio actualizada exitosamente.',
                'delete-success' => 'Tasa de Cambio eliminada exitosamente.',
                'delete-failed'  => 'Error al eliminar la Tasa de Cambio',
            ],
            
            'channels' => [
                'index' => [
                    'title' => 'Canales',
            
                    'datagrid' => [
                        'id'       => 'ID',
                        'code'     => 'Código',
                        'name'     => 'Nombre',
                        'hostname' => 'Nombre del Host',
                        'actions'  => 'Acciones',
                        'edit'     => 'Editar',
                        'delete'   => 'Eliminar',
                    ],
                ],
            
                'edit' => [
                    'title'                  => 'Editar Canal',
                    'back-btn'               => 'Volver',
                    'save-btn'               => 'Guardar Canal',
                    'general'                => 'General',
                    'code'                   => 'Código',
                    'name'                   => 'Nombre',
                    'description'            => 'Descripción',
                    'hostname'               => 'Nombre del Host',
                    'hostname-placeholder'   => 'https://www.example.com (No agregar barra al final.)',
                    'design'                 => 'Diseño',
                    'theme'                  => 'Tema',
                    'logo'                   => 'Logotipo',
                    'logo-size'              => 'La resolución de la imagen debe ser de 192px X 50px',
                    'favicon'                => 'Favicon',
                    'favicon-size'           => 'La resolución de la imagen debe ser de 16px X 16px',
                    'seo'                    => 'SEO de la página de inicio',
                    'seo-title'              => 'Título Meta',
                    'seo-description'        => 'Descripción Meta',
                    'seo-keywords'           => 'Palabras clave Meta',
                    'currencies-and-locales' => 'Monedas y Idiomas',
                    'locales'                => 'Idiomas',
                    'default-locale'         => 'Idioma predeterminado',
                    'currencies'             => 'Monedas',
                    'default-currency'       => 'Moneda predeterminada',
                    'last-delete-error'      => 'Se requiere al menos un Canal.',
                    'settings'               => 'Configuraciones',
                    'status'                 => 'Estado',
                    'update-success'         => 'Canal actualizado exitosamente',
                ],
            
                'update-success' => 'Canal actualizado exitosamente.',
                'delete-success' => 'Canal eliminado exitosamente.',
                'delete-failed'  => 'Error al eliminar el Canal',
            ],
            
            'themes' => [
                'index' => [
                    'create-btn' => 'Crear Tema',
                    'title'      => 'Temas',

                    'datagrid' => [
                        'active'       => 'Activo',
                        'channel_name' => 'Nombre del Canal',
                        'delete'       => 'Eliminar',
                        'inactive'     => 'Inactivo',
                        'id'           => 'ID',
                        'name'         => 'Nombre',
                        'status'       => 'Estado',
                        'sort-order'   => 'Orden de Clasificación',
                        'type'         => 'Tipo',
                        'view'         => 'Ver',
                    ],
                ],

                'create' => [
                    'name'       => 'Nombre',
                    'save-btn'   => 'Guardar Tema',
                    'sort-order' => 'Orden de Clasificación',
                    'title'      => 'Crear Tema',

                    'type' => [
                        'footer-links'     => 'Enlaces del Pie de Página',
                        'image-carousel'   => 'Carrusel de Imágenes',
                        'product-carousel' => 'Carrusel de Productos',
                        'static-content'   => 'Contenido Estático',
                        'services-content' => 'Contenido de Servicios',
                        'title'            => 'Tipo',
                    ],
                ],

                'edit' => [
                    'add-image-btn'                 => 'Agregar Imagen',
                    'add-filter-btn'                => 'Agregar Filtro',
                    'add-footer-link-btn'           => 'Agregar Enlace de Pie de Página',
                    'add-link'                      => 'Agregar Enlace',
                    'asc'                           => 'Asc',
                    'back'                          => 'Atrás',
                    'category-carousel-description' => 'Muestra categorías dinámicas de forma atractiva utilizando un carrusel de categorías receptivo.',
                    'category-carousel'             => 'Carrusel de Categorías',
                    'create-filter'                 => 'Crear Filtro',
                    'css'                           => 'CSS',
                    'column'                        => 'Columna',
                    'channels'                      => 'Canales',
                    'desc'                          => 'Desc',
                    'delete'                        => 'Eliminar',
                    'edit'                          => 'Editar',
                    'footer-title'                  => 'Título',
                    'footer-link'                   => 'Enlaces de Pie de Página',
                    'footer-link-form-title'        => 'Enlace de Pie de Página',
                    'filter-title'                  => 'Título',
                    'filters'                       => 'Filtros',
                    'footer-link-description'       => 'Navega a través de enlaces de pie de página para una exploración e información del sitio web sin problemas.',
                    'general'                       => 'General',
                    'html'                          => 'HTML',
                    'image'                         => 'Imagen',
                    'image-size'                    => 'La resolución de la imagen debe ser (1920px X 700px)',
                    'image-title'                   => 'Título de la Imagen',
                    'image-upload-message'          => 'Solo se permiten imágenes (.jpeg, .jpg, .png, .webp, ..).',
                    'key'                           => 'Clave: :key',
                    'key-input'                     => 'Clave',
                    'link'                          => 'Enlace',
                    'limit'                         => 'Límite',
                    'name'                          => 'Nombre',
                    'product-carousel'              => 'Carrusel de Productos',
                    'product-carousel-description'  => 'Muestra productos de forma elegante con un carrusel de productos dinámico y receptivo.',
                    'path'                          => 'Ruta',
                    'preview'                       => 'Vista Previa',
                    'slider'                        => 'Slider',
                    'static-content-description'    => 'Mejora la participación con contenido estático conciso e informativo para tu audiencia.',
                    'static-content'                => 'Contenido Estático',
                    'slider-description'            => 'Personalización del tema relacionada con el slider.',
                    'slider-required'               => 'El campo del slider es obligatorio.',
                    'slider-add-btn'                => 'Agregar Slider',
                    'save-btn'                      => 'Guardar',
                    'sort'                          => 'Ordenar',
                    'sort-order'                    => 'Orden de Clasificación',
                    'status'                        => 'Estado',
                    'slider-image'                  => 'Imagen del Slider',
                    'select'                        => 'Seleccionar',
                    'title'                         => 'Editar Tema',
                    'update-slider'                 => 'Actualizar Slider',
                    'url'                           => 'URL',
                    'value-input'                   => 'Valor',
                    'value'                         => 'Valor: :value',

                    'services-content' => [
                        'add-btn'            => 'Agregar Servicios',
                        'channels'           => 'Canales',
                        'delete'             => 'Eliminar',
                        'description'        => 'Descripción',
                        'general'            => 'General',
                        'name'               => 'Nombre',
                        'save-btn'           => 'Guardar',
                        'service-icon'       => 'Ícono del Servicio',
                        'service-icon-class' => 'Clase del Ícono del Servicio',
                        'service-info'       => 'Personalización del tema relacionada con los servicios.',
                        'services'           => 'Servicios',
                        'sort-order'         => 'Orden de Clasificación',
                        'status'             => 'Estado',
                        'title'              => 'Título',
                        'update-service'     => 'Actualizar Servicios',
                    ],
                ],

                'create-success' => 'Tema creado exitosamente',
                'delete-success' => 'Tema eliminado exitosamente',
                'update-success' => 'Tema actualizado exitosamente',
                'delete-failed'  => 'Error al eliminar el contenido del tema.',
            ],

            'email' => [
                'create' => [
                    'send-btn'                  => 'Enviar correo electrónico',
                    'back-btn'                  => 'Atrás',
                    'title'                     => 'Enviar correo electrónico',
                    'general'                   => 'General',
                    'body'                      => 'Cuerpo',
                    'subject'                   => 'Asunto',
                    'dear'                      => 'Estimado :agent_name',
                    'agent-registration'        => 'Agente de Saas registrado con éxito',
                    'summary'                   => 'Se ha creado tu cuenta. Los detalles de tu cuenta son los siguientes: ',
                    'saas-url'                  => 'Dominio',
                    'email'                     => 'Correo electrónico',
                    'password'                  => 'Contraseña',
                    'sign-in'                   => 'Iniciar sesión',
                    'thanks'                    => '¡Gracias!',
                    'send-email-to-all-tenants' => 'Enviar correo electrónico a todos los inquilinos',
                ],
                
                'send-success' => 'Correo electrónico enviado exitosamente.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'Lista de Páginas de CMS',
                'create-btn' => 'Crear Página',
        
                'datagrid' => [
                    'id'                  => 'Id',
                    'page-title'          => 'Título de la Página',
                    'url-key'             => 'Clave URL',
                    'status'              => 'Estado',
                    'active'              => 'Activo',
                    'disable'             => 'Desactivar',
                    'edit'                => 'Modificar Página',
                    'delete'              => 'Eliminar Página',
                    'mass-delete'         => 'Eliminación Masiva',
                    'mass-delete-success' => 'Página(s) de CMS seleccionada(s) eliminada(s) con éxito',
                ],
            ],
        
            'create' => [
                'title'            => 'Crear Página de CMS',
                'first-name'       => 'Nombre',
                'general'          => 'General',
                'page-title'       => 'Título',
                'channels'         => 'Canales',
                'content'          => 'Contenido',
                'meta-keywords'    => 'Meta Palabras Clave',
                'meta-description' => 'Meta Descripción',
                'meta-title'       => 'Meta Título',
                'seo'              => 'SEO',
                'url-key'          => 'Clave URL',
                'description'      => 'Descripción',
                'save-btn'         => 'Guardar Página de CMS',
                'back-btn'         => 'Volver',
            ],
        
            'edit' => [
                'title'            => 'Editar Página',
                'preview-btn'      => 'Vista Previa de la Página',
                'save-btn'         => 'Guardar Página',
                'general'          => 'General',
                'page-title'       => 'Título de la Página',
                'back-btn'         => 'Volver',
                'channels'         => 'Canales',
                'content'          => 'Contenido',
                'seo'              => 'SEO',
                'meta-keywords'    => 'Meta Palabras Clave',
                'meta-description' => 'Meta Descripción',
                'meta-title'       => 'Meta Título',
                'url-key'          => 'Clave URL',
                'description'      => 'Descripción',
            ],
        
            'create-success' => 'CMS creado con éxito.',
            'delete-success' => 'CMS eliminado con éxito.',
            'update-success' => 'CMS actualizado con éxito.',
            'no-resource'    => 'El recurso no existe.',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => 'Eliminar',
                'enable-at-least-one-shipping' => 'Habilitar al menos un método de envío.',
                'enable-at-least-one-payment'  => 'Habilitar al menos un método de pago.',
                'save-btn'                     => 'Guardar Configuración',
                'save-message'                 => 'Configuración guardada con éxito',
                'title'                        => 'Configuración',
        
                'general' => [
                    'info'  => 'Administrar diseño y detalles de correo electrónico',
                    'title' => 'General',
        
                    'design' => [
                        'info'  => 'Configurar logotipo e icono favicon.',
                        'title' => 'Diseño',
        
                        'super' => [
                            'info'          => 'El logotipo del superadmin es la imagen distintiva que representa la interfaz de administración de un sistema o sitio web, a menudo personalizable.',
                            'admin-logo'    => 'Logotipo del Administrador',
                            'logo-image'    => 'Imagen del Logotipo',
                            'favicon-image' => 'Imagen del Favicon',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => 'Configurar la dirección de correo electrónico para el superadmin.',
                        'title' => 'Super Agente',
        
                        'super' => [
                            'info'          => 'Configurar la dirección de correo electrónico para que el superadmin reciba las notificaciones por correo electrónico',
                            'email-address' => 'Dirección de Correo Electrónico',
                        ],

                        'social-connect' => [
                            'title'    => 'Conexión Social',
                            'info'     => 'Las plataformas de redes sociales brindan oportunidades para la interacción directa con tu audiencia a través de comentarios, me gusta y compartidos, fomentando el compromiso y construyendo una comunidad en torno a tu marca.',
                            'facebook' => 'Facebook',
                            'twitter'  => 'Twitter',
                            'linkedin' => 'LinkedIn',
                        ],
                    ],
        
                    'content' => [
                        'info'   => 'Configurar información de encabezado y pie de página para el diseño de registro del inquilino.',
                        'title'  => 'Contenido',
        
                        'footer' => [
                            'info'           => 'Configurar el contenido del pie de página',
                            'title'          => 'Pie de Página',
                            'footer-content' => 'Texto del Pie de Página',
                            'footer-toggle'  => 'Alternar pie de página',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => 'Administrar detalles de ventas, envío y métodos de pago',
                    'title' => 'Ventas',
        
                    'shipping-methods' => [
                        'info'  => 'Configurar información de los métodos de envío',
                        'title' => 'Métodos de Envío',
                    ],
        
                    'payment-methods' => [
                        'info'  => 'Configurar información de los métodos de pago',
                        'title' => 'Métodos de Pago',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => 'Habilitar al menos un método de envío.',
            'enable-at-least-one-payment'  => 'Habilitar al menos un método de pago.',
            'save-message'                 => 'Éxito: Configuración del superadmin guardada con éxito.',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'Registrarse como inquilino',
            ],
    
            'footer' => [
                'footer-text'     => '© Derechos de autor 2010 - 2023, Webkul Software (Registrado en India). Todos los derechos reservados.',
                'connect-with-us' => 'Conéctese con nosotros',
                'text-locale'     => 'Idioma',
                'text-currency'   => 'Moneda',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => 'Registro de comerciante',
            'step-1'              => 'Paso 1',
            'auth-cred'           => 'Credenciales de autenticación',
            'email'               => 'Correo electrónico',
            'phone'               => 'Teléfono',
            'username'            => 'Nombre de usuario',
            'password'            => 'Contraseña',
            'cpassword'           => 'Confirmar contraseña',
            'continue'            => 'Continuar',
            'step-2'              => 'Paso 2',
            'personal'            => 'Detalles personales',
            'first-name'          => 'Nombre',
            'last-name'           => 'Apellido',
            'step-3'              => 'Paso 3',
            'org-details'         => 'Detalles de la organización',
            'org-name'            => 'Nombre de la organización',
            'company-activated'   => 'Éxito: Empresa activada correctamente.',
            'company-deactivated' => 'Éxito: Empresa desactivada correctamente.',
            'company-updated'     => 'Éxito: Empresa actualizada correctamente.',
            'something-wrong'     => 'Advertencia: Algo salió mal.',
            'store-created'       => 'Éxito: Tienda creada correctamente.',
            'something-wrong-1'   => 'Advertencia: Algo salió mal, por favor inténtelo de nuevo más tarde.',
            'content'             => 'Conviértase en un comerciante y cree su propia tienda sin preocuparse de instalar y administrar el servidor. Solo necesita registrarse, cargar datos de productos y obtener su tienda de comercio electrónico. El módulo SaaS multiempresa de Laravel ofrece fácilmente capacidades de personalización, lo que significa que el comerciante puede agregar fácilmente cualquier función adicional y mejorar fácilmente su tienda.',
    
            'right-panel' => [
                'heading'    => 'Cómo configurar una cuenta de comerciante',
                'para'       => 'Es fácil configurar el módulo en solo unos pocos pasos',
                'step-one'   => 'Ingrese credenciales de autenticación como correo electrónico, contraseña y confirmar contraseña',
                'step-two'   => 'Ingrese detalles personales como nombre, apellido y número de teléfono.',
                'step-three' => 'Ingrese detalles de la organización como nombre de usuario, nombre de la organización',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => 'Advertencia: No se permite crear más de un canal',
            'channel-hostname'                  => 'Advertencia: Por favor, póngase en contacto con el administrador para cambiar su nombre de host',
            'same-domain'                       => 'Advertencia: No se puede mantener el mismo subdominio que el dominio principal',
            'block-message'                     => 'Advertencia: Si desea desbloquear a este inquilino, no dude en contactarnos, estamos disponibles las 24 horas del día, los 7 días de la semana para resolver su problema.',
            'blocked'                           => 'ha sido bloqueado',
            'illegal-action'                    => 'Advertencia: Ha realizado una acción ilegal',
            'domain-message'                    => 'Advertencia: Oops! No pudimos ayudar en <b>:domain</b>',
            'domain-desc'                       => 'Si desea crear una cuenta con <b>:domain</b> como organización, siéntase libre de crear una cuenta y comenzar.',
            'illegal-message'                   => 'Advertencia: La acción que realizó está deshabilitada por el administrador del sitio, por favor envíe un correo electrónico a su administrador del sitio para obtener más detalles al respecto.',
            'locale-creation'                   => 'Advertencia: No se permite crear una configuración regional que no sea en inglés.',
            'locale-delete'                     => 'Advertencia: No se puede eliminar la configuración regional.',
            'cannot-delete-default'             => 'Advertencia: No se puede eliminar el canal predeterminado.',
            'tenant-blocked'                    => 'Inquilino bloqueado',
            'domain-not-found'                  => 'Advertencia: Dominio no encontrado.',
            'company-blocked-by-administrator'  => 'Esta empresa está bloqueada',
            'not-allowed-to-visit-this-section' => 'Advertencia: No tiene permitido usar esta sección.',
            'auth'                              => 'Advertencia: ¡Error de autenticación!',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'Nueva empresa registrada',
                'first-name' => 'Nombre',
                'last-name'  => 'Apellido',
                'email'      => 'Correo electrónico',
                'name'       => 'Nombre',
                'username'   => 'Nombre de usuario',
                'domain'     => 'Dominio',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => 'Nueva empresa registrada con éxito',
                'dear'       => 'Estimado :tenant_name',
                'greeting'   => '¡Bienvenido y gracias por registrarte con nosotros!',
                'summary'    => 'Su cuenta ha sido creada con éxito y puede iniciar sesión utilizando sus credenciales de dirección de correo electrónico y contraseña. Al iniciar sesión, podrá acceder a otros servicios, incluidos productos, ventas, clientes, reseñas y promociones.',
                'thanks'     => '¡Gracias!',
                'visit-shop' => 'Visitar la tienda',
            ],
        ],
    ],

    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'Editar Detalles de la Empresa',
            'first-name'     => 'Nombre',
            'last-name'      => 'Apellido',
            'email'          => 'Correo Electrónico',
            'skype'          => 'Skype',
            'cname'          => 'cNombre',
            'phone'          => 'Teléfono',
            'general'        => 'General',
            'back-btn'       => 'Volver',
            'save-btn'       => 'Guardar Detalle',
            'update-success' => 'Éxito: :resource actualizado exitosamente.',
            'update-failed'  => 'Advertencia: No se puede actualizar :resource debido a razones desconocidas.',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => 'Lista de Direcciones de la Empresa',
                'create-btn' => 'Agregar Dirección',
    
                'datagrid' => [
                    'id'          => 'ID',
                    'address1'    => 'Dirección 1',
                    'address2'    => 'Dirección 2',
                    'city'        => 'Ciudad',
                    'country'     => 'País',
                    'edit'        => 'Editar',
                    'delete'      => 'Eliminar',
                    'mass-delete' => 'Eliminar en masa',
                ],
            ],
    
            'create' => [
                'title'     => 'Crear Dirección de la Empresa',
                'general'   => 'General',
                'address1'  => 'Dirección 1',
                'address2'  => 'Dirección 2',
                'country'   => 'País',
                'state'     => 'Estado',
                'city'      => 'Ciudad',
                'post-code' => 'Código Postal',
                'phone'     => 'Teléfono',
                'back-btn'  => 'Volver',
                'save-btn'  => 'Guardar Dirección',
            ],
    
            'edit' => [
                'title'     => 'Editar Dirección de la Empresa',
                'general'   => 'General',
                'address1'  => 'Dirección 1',
                'address2'  => 'Dirección 2',
                'country'   => 'País',
                'state'     => 'Estado',
                'city'      => 'Ciudad',
                'post-code' => 'Código Postal',
                'phone'     => 'Teléfono',
                'back-btn'  => 'Volver',
                'save-btn'  => 'Guardar Dirección',
            ],
    
            'create-success'      => 'Éxito: La dirección de la empresa se ha creado exitosamente.',
            'update-success'      => 'Éxito: La dirección de la empresa se ha actualizado exitosamente.',
            'delete-success'      => 'Éxito: :resource eliminado exitosamente.',
            'delete-failed'       => 'Advertencia: No se puede eliminar :resource debido a razones desconocidas.',
            'mass-delete-success' => 'Éxito: La dirección seleccionada se eliminó correctamente.',
        ],
    
        'system' => [
            'social-login'           => 'Inicio de Sesión Social',
            'facebook'               => 'Configuración de Facebook',
            'facebook-client-id'     => 'ID de Cliente de Facebook',
            'facebook-client-secret' => 'Secreto de Cliente de Facebook',
            'facebook-callback-url'  => 'URL de Devolución de Llamada de Facebook',
            'twitter'                => 'Configuración de Twitter',
            'twitter-client-id'      => 'ID de Cliente de Twitter',
            'twitter-client-secret'  => 'Secreto de Cliente de Twitter',
            'twitter-callback-url'   => 'URL de Devolución de Llamada de Twitter',
            'google'                 => 'Configuración de Google',
            'google-client-id'       => 'ID de Cliente de Google',
            'google-client-secret'   => 'Secreto de Cliente de Google',
            'google-callback-url'    => 'URL de Devolución de Llamada de Google',
            'linkedin'               => 'Configuración de LinkedIn',
            'linkedin-client-id'     => 'ID de Cliente de LinkedIn',
            'linkedin-client-secret' => 'Secreto de Cliente de LinkedIn',
            'linkedin-callback-url'  => 'URL de Devolución de Llamada de LinkedIn',
            'github'                 => 'Configuración de GitHub',
            'github-client-id'       => 'ID de Cliente de GitHub',
            'github-client-secret'   => 'Secreto de Cliente de GitHub',
            'github-callback-url'    => 'URL de Devolución de Llamada de GitHub',
            'email-credentials'      => 'Credenciales de Correo Electrónico',
            'mail-driver'            => 'Controlador de Correo',
            'mail-host'              => 'Host de Correo',
            'mail-port'              => 'Puerto de Correo',
            'mail-username'          => 'Nombre de Usuario de Correo',
            'mail-password'          => 'Contraseña de Correo',
            'mail-encryption'        => 'Cifrado de Correo',
        ],
    
        'tenant' => [
            'id'              => 'ID',
            'first-name'      => 'Nombre',
            'last-name'       => 'Apellido',
            'email'           => 'Correo Electrónico',
            'skype'           => 'Skype',
            'c-name'          => 'CNombre',
            'add-address'     => 'Agregar Dirección',
            'country'         => 'País',
            'city'            => 'Ciudad',
            'address1'        => 'Dirección 1',
            'address2'        => 'Dirección 2',
            'address'         => 'Lista de Direcciones',
            'company'         => 'Empresa',
            'profile'         => 'Perfil',
            'update'          => 'Actualizar',
            'address-details' => 'Detalles de la Dirección',
            'create-failed'   => 'Advertencia: No se puede crear :attribute debido a razones desconocidas.',
            'update-success'  => 'Éxito: :resource actualizado exitosamente.',
            'update-failed'   => 'Advertencia: No se puede actualizar :resource debido a razones desconocidas.',
    
            'company-address' => [
                'add-address-title'    => 'Nueva Dirección',
                'update-address-title' => 'Actualizar Dirección',
                'save-btn-title'       => 'Guardar Dirección',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'Un pedido :order_id ha sido realizado por :placed_by el :created_at.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => '¡Ups! La página que estás buscando está de vacaciones. Parece que no podemos encontrar lo que estás buscando.',
            'title'       => '404 Página no encontrada',
        ],

        '401' => [
            'description' => '¡Ups! Parece que no tienes permiso para acceder a esta página. Parece que te faltan las credenciales necesarias.',
            'title'       => '401 No autorizado',
        ],

        '403' => [
            'description' => '¡Ups! Esta página está prohibida. Parece que no tienes los permisos necesarios para ver este contenido.',
            'title'       => '403 Prohibido',
        ],

        '500' => [
            'description' => '¡Ups! Algo salió mal. Parece que tenemos problemas para cargar la página que estás buscando.',
            'title'       => '500 Error interno del servidor',
        ],

        '503' => [
            'description' => '¡Ups! Parece que estamos temporalmente fuera de servicio por mantenimiento. Por favor, vuelve en un momento.',
            'title'       => '503 Servicio no disponible',
        ],
    ],
];
