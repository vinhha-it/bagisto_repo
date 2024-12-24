<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => '版本：:version',
                'account-title' => '账户',
                'logout'        => '登出',
                'my-account'    => '我的账户',
                'visit-shop'    => '访问商店',
            ],
    
            'sidebar' => [
                'tenants'          => '租户',
                'tenant-customers' => '顾客',
                'tenant-products'  => '产品',
                'tenant-orders'    => '订单',
                'settings'         => '设置',
                'agents'           => '代理',
                'roles'            => '角色',
                'locales'          => '地区',
                'currencies'       => '货币',
                'channels'         => '渠道',
                'exchange-rates'   => '汇率',
                'themes'           => '主题',
                'cms'              => '内容管理系统',
                'configurations'   => '配置',
                'general'          => '通用',
                'send-email'       => '发送邮件',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => '租户',
            'create'         => '添加',
            'edit'           => '编辑',
            'delete'         => '删除',
            'cancel'         => '取消',
            'view'           => '查看',
            'mass-delete'    => '批量删除',
            'mass-update'    => '批量更新',
            'customers'      => '客户',
            'products'       => '产品',
            'orders'         => '订单',
            'settings'       => '设置',
            'agents'         => '代理商',
            'roles'          => '角色',
            'locales'        => '地区',
            'currencies'     => '货币',
            'exchange-rates' => '汇率',
            'channels'       => '渠道',
            'themes'         => '主题',
            'send-email'     => '发送电子邮件',
            'cms'            => '内容管理系统',
            'configuration'  => '配置',
            'download'       => '下载',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => '超级管理员登录',
                'email'                => '邮箱地址',
                'password'             => '密码',
                'btn-submit'           => '登录',
                'forget-password-link' => '忘记密码？',
                'submit-btn'           => '登录',
                'login-success'        => '成功：您已成功登录。',
                'login-error'          => '请检查您的凭据并重试。',
                'activate-warning'     => '您的帐户尚未激活，请联系管理员。',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => '忘记密码',
                    'title'           => '找回密码',
                    'email'           => '注册邮箱',
                    'reset-link-sent' => '重置密码链接已发送',
                    'sign-in-link'    => '返回登录？',
                    'email-not-exist' => '电子邮件不存在',
                    'submit-btn'      => '重置',
                ],
            ],
        
            'reset-password' => [
                'title'            => '重置密码',
                'back-link-title'  => '返回登录？',
                'confirm-password' => '确认密码',
                'email'            => '注册邮箱',
                'password'         => '密码',
                'submit-btn'       => '重置密码',
            ],
        ],

        'tenants' => [
            'index' => [
                'title'        => '租户列表',
                'register-btn' => '注册租户',
        
                'create' => [
                    'title'             => '创建租户',
                    'first-name'        => '名字',
                    'last-name'         => '姓氏',
                    'user-name'         => '用户名',
                    'organization-name' => '组织名称',
                    'phone'             => '电话',
                    'email'             => '邮箱',
                    'password'          => '密码',
                    'confirm-password'  => '确认密码',
                    'save-btn'          => '保存租户',
                    'back-btn'          => '返回',
                ],
        
                'datagrid' => [
                    'id'                  => '编号',
                    'user-name'           => '用户名',
                    'organization'        => '组织',
                    'domain'              => '域',
                    'cname'               => '别名记录',
                    'status'              => '状态',
                    'active'              => '激活',
                    'disable'             => '禁用',
                    'view'                => '查看洞察',
                    'edit'                => '修改租户',
                    'delete'              => '删除租户',
                    'mass-delete'         => '批量删除',
                    'mass-delete-success' => '选定的租户删除成功',
                ],
            ],
        
            'edit' => [
                'title'             => '编辑租户',
                'first-name'        => '名字',
                'last-name'         => '姓氏',
                'user-name'         => '用户名',
                'cname'             => '域名',
                'organization-name' => '组织名称',
                'phone'             => '电话',
                'status'            => '状态',
                'email'             => '邮箱',
                'password'          => '密码',
                'confirm-password'  => '确认密码',
                'save-btn'          => '保存租户',
                'back-btn'          => '返回',
                'general'           => '常规',
                'settings'          => '设置',
            ],
        
            'view' => [
                'title'                        => '租户洞察',
                'heading'                      => '租户 - :tenant_name',
                'email-address'                => '邮箱地址',
                'phone'                        => '电话',
                'domain-information'           => '域信息',
                'mapped-domain'                => '映射域',
                'cname-information'            => '别名记录 信息',
                'cname-entry'                  => '别名记录 记录',
                'attribute-information'        => '属性信息',
                'no-of-attributes'             => '属性数量',
                'attribute-family-information' => '属性族信息',
                'no-of-attribute-families'     => '属性族数量',
                'product-information'          => '产品信息',
                'no-of-products'               => '产品数量',
                'customer-information'         => '客户信息',
                'no-of-customers'              => '客户数量',
                'customer-group-information'   => '客户组信息',
                'no-of-customer-groups'        => '客户组数量',
                'category-information'         => '分类信息',
                'no-of-categories'             => '分类数量',
                'addresses'                    => '地址列表 (:count)',
                'empty-title'                  => '添加租户地址',
            ],
        
            'create-success' => '租户创建成功',
            'delete-success' => '租户删除成功',
            'delete-failed'  => '租户删除失败',
            'product-copied' => '租户复制成功',
            'update-success' => '租户更新成功',
        
            'customers' => [
                'index' => [
                    'title' => '客户列表',
        
                    'datagrid' => [
                        'id'             => '编号',
                        'domain'         => '域',
                        'customer-name'  => '客户名称',
                        'email'          => '邮箱',
                        'customer-group' => '客户组',
                        'phone'          => '电话',
                        'status'         => '状态',
                        'active'         => '激活',
                        'inactive'       => '不活躍',
                        'is-suspended'   => '暂停',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => '产品列表',
        
                    'datagrid' => [
                        'id'               => '编号',
                        'domain'           => '域',
                        'name'             => '名称',
                        'sku'              => 'SKU',
                        'attribute-family' => '属性族',
                        'image'            => '图片',
                        'price'            => '价格',
                        'qty'              => '数量',
                        'status'           => '状态',
                        'active'           => '激活',
                        'inactive'         => '不活躍',
                        'category'         => '分类',
                        'type'             => '类型',
                    ],
                ],
            ],
        
            'orders' => [
                'index' => [
                    'title' => '订单列表',
        
                    'datagrid' => [
                        'id'              => '编号',
                        'order-id'        => '订单编号',
                        'domain'          => '域',
                        'sub-total'       => '小计',
                        'grand-total'     => '总计',
                        'order-date'      => '订单日期',
                        'channel-name'    => '渠道名称',
                        'status'          => '状态',
                        'processing'      => '处理中',
                        'completed'       => '已完成',
                        'canceled'        => '已取消',
                        'closed'          => '已关闭',
                        'pending'         => '待处理',
                        'pending-payment' => '待付款',
                        'fraud'           => '欺诈',
                        'customer'        => '客户',
                        'email'           => '邮箱',
                        'location'        => '位置',
                        'images'          => '图片',
                        'pay-by'          => '支付方式 - ',
                        'pay-via'         => '支付途径',
                        'date'            => '日期',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => '代理商列表',
                    'register-btn' => '创建代理',
            
                    'create' => [
                        'title'             => '创建代理',
                        'first-name'        => '名字',
                        'last-name'         => '姓氏',
                        'email'             => '邮箱',
                        'current-password'  => '当前密码',
                        'password'          => '密码',
                        'confirm-password'  => '确认密码',
                        'role'              => '角色',
                        'select'            => '选择',
                        'status'            => '状态',
                        'save-btn'          => '保存代理',
                        'back-btn'          => '返回',
                        'upload-image-info' => '上传一个110px X 110px的PNG或JPG格式的头像',
                    ],
            
                    'edit' => [
                        'title' => '编辑代理',
                    ],
            
                    'datagrid' => [
                        'id'      => '标识',
                        'name'    => '名称',
                        'email'   => '邮箱',
                        'role'    => '角色',
                        'status'  => '状态',
                        'active'  => '激活',
                        'disable' => '禁用',
                        'actions' => '操作',
                        'edit'    => '编辑',
                        'delete'  => '删除',
                    ],
                ],
            
                'create-success'             => '成功：超级管理员代理创建成功',
                'delete-success'             => '代理删除成功',
                'delete-failed'              => '删除代理失败',
                'cannot-change'              => '无法更改代理的姓名：:name',
                'product-copied'             => '代理复制成功',
                'update-success'             => '代理更新成功',
                'invalid-password'           => '您输入的当前密码不正确',
                'last-delete-error'          => '警告：至少需要一个超级管理员代理',
                'login-delete-error'         => '警告：您不能删除自己的账户。',
                'administrator-delete-error' => '警告：至少需要一个具有管理员访问权限的超级管理员代理',
            ],
            
            'roles' => [
                'index' => [
                    'title'      => '角色列表',
                    'create-btn' => '创建角色',
            
                    'datagrid' => [
                        'id'              => '标识',
                        'name'            => '名称',
                        'permission-type' => '权限类型',
                        'actions'         => '操作',
                        'edit'            => '编辑',
                        'delete'          => '删除',
                    ],
                ],
            
                'create' => [
                    'access-control' => '访问控制',
                    'all'            => '全部',
                    'back-btn'       => '返回',
                    'custom'         => '自定义',
                    'description'    => '描述',
                    'general'        => '常规',
                    'name'           => '名称',
                    'permissions'    => '权限',
                    'save-btn'       => '保存角色',
                    'title'          => '创建角色',
                ],
            
                'edit' => [
                    'access-control' => '访问控制',
                    'all'            => '全部',
                    'back-btn'       => '返回',
                    'custom'         => '自定义',
                    'description'    => '描述',
                    'general'        => '常规',
                    'name'           => '名称',
                    'permissions'    => '权限',
                    'save-btn'       => '保存角色',
                    'title'          => '编辑角色',
                ],
            
                'being-used'        => '角色已被另一代理使用',
                'last-delete-error' => '最后一个角色无法被删除',
                'create-success'    => '角色创建成功',
                'delete-success'    => '角色删除成功',
                'delete-failed'     => '删除角色失败',
                'update-success'    => '角色更新成功',
            ],
            
            'locales' => [
                'index' => [
                    'title'      => '区域列表',
                    'create-btn' => '创建区域',
            
                    'create' => [
                        'title'            => '创建区域',
                        'code'             => '代码',
                        'name'             => '名称',
                        'direction'        => '方向',
                        'select-direction' => '选择方向',
                        'text-ltr'         => '从左到右',
                        'text-rtl'         => '从右到左',
                        'locale-logo'      => '区域标志',
                        'logo-size'        => '图像分辨率应为 24px X 16px',
                        'save-btn'         => '保存区域',
                    ],
            
                    'edit' => [
                        'title'     => '编辑区域',
                        'code'      => '代码',
                        'name'      => '名称',
                        'direction' => '方向',
                    ],
            
                    'datagrid' => [
                        'id'        => '标识',
                        'code'      => '代码',
                        'name'      => '名称',
                        'direction' => '方向',
                        'text-ltr'  => '从左到右',
                        'text-rtl'  => '从右到左',
                        'actions'   => '操作',
                        'edit'      => '编辑',
                        'delete'    => '删除',
                    ],
                ],
                
                'being-used'        => '区域 :locale_name 在频道中被用作默认区域',
                'create-success'    => '区域创建成功。',
                'update-success'    => '区域更新成功。',
                'delete-success'    => '区域删除成功。',
                'delete-failed'     => '删除区域失败',
                'last-delete-error' => '至少需要一个超级管理员区域。',
            ],

            'currencies' => [
                'index' => [
                    'title'      => '货币列表',
                    'create-btn' => '创建货币',
            
                    'create' => [
                        'title'    => '创建货币',
                        'code'     => '代码',
                        'name'     => '名称',
                        'symbol'   => '符号',
                        'decimal'  => '小数',
                        'save-btn' => '保存货币',
                    ],
            
                    'edit' => [
                        'title'    => '编辑货币',
                        'code'     => '代码',
                        'name'     => '名称',
                        'symbol'   => '符号',
                        'decimal'  => '小数',
                        'save-btn' => '保存货币',
                    ],
            
                    'datagrid' => [
                        'id'      => 'ID',
                        'code'    => '代码',
                        'name'    => '名称',
                        'actions' => '操作',
                        'edit'    => '编辑',
                        'delete'  => '删除',
                    ],
                ],
            
                'create-success'      => '货币创建成功。',
                'update-success'      => '货币更新成功。',
                'delete-success'      => '货币删除成功。',
                'delete-failed'       => '货币删除失败',
                'last-delete-error'   => '至少需要一个超级管理员货币。',
                'mass-delete-success' => '所选货币已成功删除',
            ],
            
            'exchange-rates' => [
                'index' => [
                    'title'        => '汇率',
                    'create-btn'   => '创建汇率',
                    'update-rates' => '更新汇率',
            
                    'create' => [
                        'title'                  => '创建汇率',
                        'source-currency'        => '源货币',
                        'target-currency'        => '目标货币',
                        'select-target-currency' => '选择目标货币',
                        'rate'                   => '汇率',
                        'save-btn'               => '保存汇率',
                    ],
            
                    'edit' => [
                        'title'           => '编辑汇率',
                        'source-currency' => '源货币',
                        'target-currency' => '目标货币',
                        'rate'            => '汇率',
                        'save-btn'        => '保存汇率',
                    ],
            
                    'datagrid' => [
                        'id'            => 'ID',
                        'currency-name' => '货币名称',
                        'exchange-rate' => '汇率',
                        'actions'       => '操作',
                        'edit'          => '编辑',
                        'delete'        => '删除',
                    ],
                ],
            
                'create-success' => '汇率创建成功。',
                'update-success' => '汇率更新成功。',
                'delete-success' => '汇率删除成功。',
                'delete-failed'  => '汇率删除失败',
            ],
            
            'channels' => [
                'index' => [
                    'title' => '频道',
            
                    'datagrid' => [
                        'id'       => 'ID',
                        'code'     => '代码',
                        'name'     => '名称',
                        'hostname' => '主机名',
                        'actions'  => '操作',
                        'edit'     => '编辑',
                        'delete'   => '删除',
                    ],
                ],
            
                'edit' => [
                    'title'                  => '编辑频道',
                    'back-btn'               => '返回',
                    'save-btn'               => '保存频道',
                    'general'                => '常规',
                    'code'                   => '代码',
                    'name'                   => '名称',
                    'description'            => '描述',
                    'hostname'               => '主机名',
                    'hostname-placeholder'   => 'https://www.example.com（末尾不要加斜杠。）',
                    'design'                 => '设计',
                    'theme'                  => '主题',
                    'logo'                   => '标志',
                    'logo-size'              => '图片分辨率应为192px x 50px',
                    'favicon'                => '网站图标',
                    'favicon-size'           => '图片分辨率应为16px x 16px',
                    'seo'                    => '首页 SEO',
                    'seo-title'              => '元标题',
                    'seo-description'        => '元描述',
                    'seo-keywords'           => '元关键词',
                    'currencies-and-locales' => '货币和区域设置',
                    'locales'                => '区域设置',
                    'default-locale'         => '默认区域设置',
                    'currencies'             => '货币',
                    'default-currency'       => '默认货币',
                    'last-delete-error'      => '至少需要一个频道。',
                    'settings'               => '设置',
                    'status'                 => '状态',
                    'update-success'         => '成功更新频道',
                ],
            
                'update-success' => '频道更新成功。',
                'delete-success' => '频道删除成功。',
                'delete-failed'  => '频道删除失败',
            ],

            'themes' => [
                'index' => [
                    'create-btn' => '创建主题',
                    'title' => '主题',
            
                    'datagrid' => [
                        'active' => '活动',
                        'channel_name' => '频道名称',
                        'delete' => '删除',
                        'inactive' => '不活动',
                        'id' => '标识',
                        'name' => '名称',
                        'status' => '状态',
                        'sort-order' => '排序顺序',
                        'type' => '类型',
                        'view' => '查看',
                    ],
                ],
            
                'create' => [
                    'name' => '名称',
                    'save-btn' => '保存主题',
                    'sort-order' => '排序顺序',
                    'title' => '创建主题',
            
                    'type' => [
                        'footer-links' => '页脚链接',
                        'image-carousel' => '图片轮播',
                        'product-carousel' => '产品轮播',
                        'static-content' => '静态内容',
                        'services-content' => '服务内容',
                        'title' => '类型',
                    ],
                ],
            
                'edit' => [
                    'add-image-btn' => '添加图片',
                    'add-filter-btn' => '添加过滤器',
                    'add-footer-link-btn' => '添加页脚链接',
                    'add-link' => '添加链接',
                    'asc' => '升序',
                    'back' => '返回',
                    'category-carousel-description' => '使用响应式类别轮播器动态显示吸引人的类别。',
                    'category-carousel' => '类别轮播',
                    'create-filter' => '创建过滤器',
                    'css' => 'CSS',
                    'column' => '列',
                    'channels' => '频道',
                    'desc' => '降序',
                    'delete' => '删除',
                    'edit' => '编辑',
                    'footer-title' => '标题',
                    'footer-link' => '页脚链接',
                    'footer-link-form-title' => '页脚链接',
                    'filter-title' => '标题',
                    'filters' => '过滤器',
                    'footer-link-description' => '通过页脚链接无缝浏览网站并获取信息。',
                    'general' => '一般',
                    'html' => 'HTML',
                    'image' => '图片',
                    'image-size' => '图片分辨率应为（1920px x 700px）',
                    'image-title' => '图片标题',
                    'image-upload-message' => '仅允许图片（.jpeg，.jpg，.png，.webp，..）。',
                    'key' => '键：:key',
                    'key-input' => '键',
                    'link' => '链接',
                    'limit' => '限制',
                    'name' => '名称',
                    'product-carousel' => '产品轮播',
                    'product-carousel-description' => '通过动态且响应式的产品轮播器优雅地展示产品。',
                    'path' => '路径',
                    'preview' => '预览',
                    'slider' => '滑块',
                    'static-content-description' => '通过简洁、信息丰富的静态内容提高与受众的互动。',
                    'static-content' => '静态内容',
                    'slider-description' => '滑块相关的主题定制。',
                    'slider-required' => '滑块字段是必需的。',
                    'slider-add-btn' => '添加滑块',
                    'save-btn' => '保存',
                    'sort' => '排序',
                    'sort-order' => '排序顺序',
                    'status' => '状态',
                    'slider-image' => '滑块图片',
                    'select' => '选择',
                    'title' => '编辑主题',
                    'update-slider' => '更新滑块',
                    'url' => '网址',
                    'value-input' => '值',
                    'value' => '值：:value',
            
                    'services-content' => [
                        'add-btn' => '添加服务',
                        'channels' => '频道',
                        'delete' => '删除',
                        'description' => '描述',
                        'general' => '一般',
                        'name' => '名称',
                        'save-btn' => '保存',
                        'service-icon' => '服务图标',
                        'service-icon-class' => '服务图标类',
                        'service-info' => '与服务相关的主题定制。',
                        'services' => '服务',
                        'sort-order' => '排序顺序',
                        'status' => '状态',
                        'title' => '标题',
                        'update-service' => '更新服务',
                    ],
                ],
            
                'create-success' => '主题创建成功',
                'delete-success' => '主题删除成功',
                'update-success' => '主题更新成功',
                'delete-failed'  => '删除主题内容时遇到错误。',
            ],
            
            'email' => [
                'create' => [
                    'send-btn' => '发送邮件',
                    'back-btn' => '返回',
                    'title' => '发送邮件',
                    'general' => '一般',
                    'body' => '正文',
                    'subject' => '主题',
                    'dear' => '亲爱的:agent_name',
                    'agent-registration' => 'Saas代理商注册成功',
                    'summary' => '您的帐户已创建。您的帐户详细信息如下：',
                    'saas-url' => '域',
                    'email' => '电子邮件',
                    'password' => '密码',
                    'sign-in' => '登录',
                    'thanks' => '谢谢！',
                    'send-email-to-all-tenants' => '发送电子邮件给所有租户',
                ],
            
                'send-success' => '电子邮件发送成功。',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'CMS页面列表',
                'create-btn' => '创建页面',
        
                'datagrid' => [
                    'id'                  => '编号',
                    'page-title'          => '页面标题',
                    'url-key'             => 'URL键',
                    'status'              => '状态',
                    'active'              => '激活',
                    'disable'             => '禁用',
                    'edit'                => '修改页面',
                    'delete'              => '删除页面',
                    'mass-delete'         => '批量删除',
                    'mass-delete-success' => '成功删除所选CMS页面',
                ],
            ],
        
            'create' => [
                'title'            => '创建CMS页面',
                'first-name'       => '名字',
                'general'          => '一般',
                'page-title'       => '标题',
                'channels'         => '渠道',
                'content'          => '内容',
                'meta-keywords'    => '元关键词',
                'meta-description' => '元描述',
                'meta-title'       => '元标题',
                'seo'              => '搜索引擎优化',
                'url-key'          => 'URL键',
                'description'      => '描述',
                'save-btn'         => '保存CMS页面',
                'back-btn'         => '返回',
            ],
        
            'edit' => [
                'title'            => '编辑页面',
                'preview-btn'      => '预览页面',
                'save-btn'         => '保存页面',
                'general'          => '一般',
                'page-title'       => '页面标题',
                'back-btn'         => '返回',
                'channels'         => '渠道',
                'content'          => '内容',
                'seo'              => '搜索引擎优化',
                'meta-keywords'    => '元关键词',
                'meta-description' => '元描述',
                'meta-title'       => '元标题',
                'url-key'          => 'URL键',
                'description'      => '描述',
            ],
        
            'create-success' => 'CMS创建成功。',
            'delete-success' => 'CMS删除成功。',
            'update-success' => 'CMS更新成功。',
            'no-resource'    => '资源不存在。',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => '删除',
                'enable-at-least-one-shipping' => '至少启用一种运输方式。',
                'enable-at-least-one-payment'  => '至少启用一种支付方式。',
                'save-btn'                     => '保存配置',
                'save-message'                 => '配置保存成功',
                'title'                        => '配置',
        
                'general' => [
                    'info'  => '管理布局和电子邮件详情',
                    'title' => '一般',
        
                    'design' => [
                        'info'  => '设置徽标和网站图标。',
                        'title' => '设计',
        
                        'super' => [
                            'info'          => '超级管理员徽标是表示系统或网站管理界面的独特图像或标志，通常可定制。',
                            'admin-logo'    => '管理员徽标',
                            'logo-image'    => '徽标图片',
                            'favicon-image' => '网站图标图片',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => '为超级管理员设置电子邮件地址。',
                        'title' => '超级代理',
        
                        'super' => [
                            'info'          => '为超级管理员设置电子邮件地址以接收电子邮件通知',
                            'email-address' => '电子邮件地址',
                        ],

                        'social-connect' => [
                            'title'    => '社交连接',
                            'info'     => '社交媒体平台通过评论、点赞和分享提供直接与您的受众互动的机会，促进参与，并围绕您的品牌建立社群。',
                            'facebook' => 'Facebook',
                            'twitter'  => 'Twitter',
                            'linkedin' => '领英',
                        ],
                    ],
        
                    'content' => [
                        'info'   => '为租户注册布局设置页眉和页脚信息。',
                        'title'  => '内容',
        
                        'footer' => [
                            'info'           => '设置页脚内容',
                            'title'          => '页脚',
                            'footer-content' => '页脚文本',
                            'footer-toggle'  => '切换页脚',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => '管理销售、运输和付款方式详情',
                    'title' => '销售',
        
                    'shipping-methods' => [
                        'info'  => '设置运输方式信息',
                        'title' => '运输方式',
                    ],
        
                    'payment-methods' => [
                        'info'  => '设置付款方式信息',
                        'title' => '付款方式',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => '至少启用一种运输方式。',
            'enable-at-least-one-payment'  => '至少启用一种支付方式。',
            'save-message'                 => '成功：超级管理员配置保存成功。',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => '注册成为租户',
            ],
    
            'footer' => [
                'footer-text'     => '© 版权所有 2010 - 2023，Webkul 软件（在印度注册）。保留所有权利。',
                'connect-with-us' => '与我们联系',
                'text-locale'     => '地区',
                'text-currency'   => '货币',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => '商户注册',
            'step-1'              => '第1步',
            'auth-cred'           => '认证凭据',
            'email'               => '电子邮件',
            'phone'               => '电话',
            'username'            => '用户名',
            'password'            => '密码',
            'cpassword'           => '确认密码',
            'continue'            => '继续',
            'step-2'              => '第2步',
            'personal'            => '个人详情',
            'first-name'          => '名字',
            'last-name'           => '姓氏',
            'step-3'              => '第3步',
            'org-details'         => '组织详情',
            'org-name'            => '组织名称',
            'company-activated'   => '成功：公司已成功激活。',
            'company-deactivated' => '成功：公司已成功停用。',
            'company-updated'     => '成功：公司更新成功。',
            'something-wrong'     => '警告：出现了一些问题。',
            'store-created'       => '成功：商店创建成功。',
            'something-wrong-1'   => '警告：出现了一些问题，请稍后重试。',
            'content'             => '成为商家，轻松创建您自己的商店，无需担心安装和管理服务器。您只需注册，上传产品数据，即可获得您的电子商务店铺。Laravel 多公司 SaaS 模块提供了易于定制的能力，这意味着商家可以轻松添加任何额外的功能和功能到他们的商店或轻松增强它。',
    
            'right-panel' => [
                'heading'    => '如何设置商家帐户',
                'para'       => '只需几个步骤即可轻松设置模块',
                'step-one'   => '输入认证凭据，如电子邮件、密码和确认密码',
                'step-two'   => '输入个人详细信息，如名字、姓氏和电话号码。',
                'step-three' => '输入组织详细信息，如用户名、组织名称',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => '警告：不允许创建多个频道',
            'channel-hostname'                  => '警告：请联系管理员更改您的主机名',
            'same-domain'                       => '警告：不能将相同的子域名保留为主域名',
            'block-message'                     => '警告：如果您要解除此租户的阻止，请随时联系我们，我们全天候为您解决问题。',
            'blocked'                           => '已被阻止',
            'illegal-action'                    => '警告：您执行了非法操作',
            'domain-message'                    => '警告：糟糕！我们无法在 <b>:domain</b> 上提供帮助',
            'domain-desc'                       => '如果您希望以 <b>:domain</b> 作为组织注册账户，请随时创建账户并开始使用。',
            'illegal-message'                   => '警告：您执行的操作已被网站管理员禁用，请向您的网站管理员发送电子邮件，以获取更多详细信息。',
            'locale-creation'                   => '警告：不允许创建除英语以外的区域设置。',
            'locale-delete'                     => '警告：无法删除地区设置。',
            'cannot-delete-default'             => '警告：无法删除默认频道。',
            'tenant-blocked'                    => '租户已被阻止',
            'domain-not-found'                  => '警告：域名未找到。',
            'company-blocked-by-administrator'  => '此租户已被管理员阻止',
            'not-allowed-to-visit-this-section' => '警告：您无权使用此部分。',
            'auth'                              => '警告：身份验证错误！',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => '新公司注册',
                'first-name' => '名字',
                'last-name'  => '姓氏',
                'email'      => '电子邮件',
                'name'       => '名称',
                'username'   => '用户名',
                'domain'     => '域名',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => '新公司注册成功',
                'dear'       => '亲爱的 :tenant_name',
                'greeting'   => '欢迎并感谢您注册我们！',
                'summary'    => '您的帐户已成功创建，您现在可以使用您的电子邮件地址和密码凭据登录。登录后，您将能够访问其他服务，包括产品、销售、客户、评论和促销。',
                'thanks'     => '谢谢！',
                'visit-shop' => '访问商店',
            ],
        ],
    ],

    'admin' => [
        'tenant-profile' => [
            'edit-title'     => '编辑公司详情',
            'first-name'     => '名字',
            'last-name'      => '姓氏',
            'email'          => '邮箱',
            'skype'          => 'Skype',
            'cname'          => '别名记录',
            'phone'          => '电话',
            'general'        => '一般',
            'back-btn'       => '返回',
            'save-btn'       => '保存详情',
            'update-success' => '成功：:resource 更新成功。',
            'update-failed'  => '警告：由于未知原因无法更新 :resource。',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => '公司地址列表',
                'create-btn' => '添加地址',
    
                'datagrid' => [
                    'id'          => '编号',
                    'address1'    => '地址1',
                    'address2'    => '地址2',
                    'city'        => '城市',
                    'country'     => '国家',
                    'edit'        => '编辑',
                    'delete'      => '删除',
                    'mass-delete' => '批量删除',
                ],
            ],
    
            'create' => [
                'title'     => '创建公司地址',
                'general'   => '一般',
                'address1'  => '地址1',
                'address2'  => '地址2',
                'country'   => '国家',
                'state'     => '州',
                'city'      => '城市',
                'post-code' => '邮编',
                'phone'     => '电话',
                'back-btn'  => '返回',
                'save-btn'  => '保存地址',
            ],
    
            'edit' => [
                'title'     => '编辑公司地址',
                'general'   => '一般',
                'address1'  => '地址1',
                'address2'  => '地址2',
                'country'   => '国家',
                'state'     => '州',
                'city'      => '城市',
                'post-code' => '邮编',
                'phone'     => '电话',
                'back-btn'  => '返回',
                'save-btn'  => '保存地址',
            ],
    
            'create-success'      => '成功：公司地址创建成功。',
            'update-success'      => '成功：公司地址更新成功。',
            'delete-success'      => '成功：:resource 删除成功。',
            'delete-failed'       => '警告：由于未知原因无法删除 :resource。',
            'mass-delete-success' => '成功：所选地址删除成功。',
        ],
    
        'system' => [
            'social-login'           => '社交登录',
            'facebook'               => 'Facebook 设置',
            'facebook-client-id'     => 'Facebook 客户端 ID',
            'facebook-client-secret' => 'Facebook 客户端密钥',
            'facebook-callback-url'  => 'Facebook 回调 URL',
            'twitter'                => 'Twitter 设置',
            'twitter-client-id'      => 'Twitter 客户端 ID',
            'twitter-client-secret'  => 'Twitter 客户端密钥',
            'twitter-callback-url'   => 'Twitter 回调 URL',
            'google'                 => 'Google 设置',
            'google-client-id'       => 'Google 客户端 ID',
            'google-client-secret'   => 'Google 客户端密钥',
            'google-callback-url'    => 'Google 回调 URL',
            'linkedin'               => 'LinkedIn 设置',
            'linkedin-client-id'     => 'LinkedIn 客户端 ID',
            'linkedin-client-secret' => 'LinkedIn 客户端密钥',
            'linkedin-callback-url'  => 'LinkedIn 回调 URL',
            'github'                 => 'GitHub 设置',
            'github-client-id'       => 'GitHub 客户端 ID',
            'github-client-secret'   => 'GitHub 客户端密钥',
            'github-callback-url'    => 'GitHub 回调 URL',
            'email-credentials'      => '邮箱凭据',
            'mail-driver'            => '邮件驱动程序',
            'mail-host'              => '邮件主机',
            'mail-port'              => '邮件端口',
            'mail-username'          => '邮件用户名',
            'mail-password'          => '邮件密码',
            'mail-encryption'        => '邮件加密',
        ],
    
        'tenant' => [
            'id'              => '编号',
            'first-name'      => '名字',
            'last-name'       => '姓氏',
            'email'           => '邮箱',
            'skype'           => 'Skype',
            'c-name'          => '公司名',
            'add-address'     => '添加地址',
            'country'         => '国家',
            'city'            => '城市',
            'address1'        => '地址1',
            'address2'        => '地址2',
            'address'         => '地址列表',
            'company'         => '租户',
            'profile'         => '简介',
            'update'          => '更新',
            'address-details' => '地址详情',
            'create-failed'   => '警告：由于未知原因无法创建 :attribute。',
            'update-success'  => '成功：:resource 更新成功。',
            'update-failed'   => '警告：由于未知原因无法更新 :resource。',
    
            'company-address' => [
                'add-address-title'    => '新地址',
                'update-address-title' => '更新地址',
                'save-btn-title'       => '保存地址',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => ':placed_by 在 :created_at 下单了订单 :order_id。',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => '哎呀！您要查找的页面正在度假。似乎我们找不到您要搜索的内容。',
            'title'       => '404 页面未找到',
        ],

        '401' => [
            'description' => '哎呀！看起来您无权访问此页面。似乎您缺少必要的凭据。',
            'title'       => '401 未经授权',
        ],

        '403' => [
            'description' => '哎呀！此页面是禁止访问的。您似乎没有足够的权限查看此内容。',
            'title'       => '403 禁止访问',
        ],

        '500' => [
            'description' => '哎呀！出了点问题。似乎我们无法加载您要查找的页面。',
            'title'       => '500 内部服务器错误',
        ],

        '503' => [
            'description' => '哎呀！看起来我们正在进行临时维护。请稍后再来。',
            'title'       => '503 服务不可用',
        ],
    ],
];
