<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'バージョン : :version',
                'account-title' => 'アカウント',
                'logout'        => 'ログアウト',
                'my-account'    => 'マイアカウント',
                'visit-shop'    => 'ショップを訪れる',
            ],
    
            'sidebar' => [
                'tenants'          => 'テナント',
                'tenant-customers' => '顧客',
                'tenant-products'  => '製品',
                'tenant-orders'    => '注文',
                'settings'         => '設定',
                'agents'           => 'エージェント',
                'roles'            => '役割',
                'locales'          => 'ロケール',
                'currencies'       => '通貨',
                'channels'         => 'チャネル',
                'exchange-rates'   => '為替レート',
                'themes'           => 'テーマ',
                'cms'              => 'CMS',
                'configurations'   => '構成',
                'general'          => '一般',
                'send-email'       => 'メール送信',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'テナント',
            'create'         => '追加',
            'edit'           => '編集',
            'delete'         => '削除',
            'cancel'         => 'キャンセル',
            'view'           => '表示',
            'mass-delete'    => '一括削除',
            'mass-update'    => '一括更新',
            'customers'      => '顧客',
            'products'       => '製品',
            'orders'         => '注文',
            'settings'       => '設定',
            'agents'         => 'エージェント',
            'roles'          => '役割',
            'locales'        => 'ロケール',
            'currencies'     => '通貨',
            'exchange-rates' => '為替レート',
            'channels'       => 'チャネル',
            'themes'         => 'テーマ',
            'send-email'     => 'メール送信',
            'cms'            => 'CMS',
            'configuration'  => '構成',
            'download'       => 'ダウンロード',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => 'スーパー管理者ログイン',
                'email'                => 'メールアドレス',
                'password'             => 'パスワード',
                'btn-submit'           => 'ログイン',
                'forget-password-link' => 'パスワードをお忘れですか？',
                'submit-btn'           => 'ログイン',
                'login-success'        => '成功：ログインに成功しました。',
                'login-error'          => '資格情報を確認して再試行してください。',
                'activate-warning'     => 'アカウントはまだアクティブ化されていません。管理者に連絡してください。',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'パスワードをお忘れの方',
                    'title'           => 'パスワードの回復',
                    'email'           => '登録済みメールアドレス',
                    'reset-link-sent' => 'パスワードリセットリンクが送信されました',
                    'sign-in-link'    => 'サインインに戻る？',
                    'email-not-exist' => 'メールが存在しません',
                    'submit-btn'      => 'リセット',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'パスワードのリセット',
                'back-link-title'  => 'サインインに戻る？',
                'confirm-password' => 'パスワードの確認',
                'email'            => '登録済みメールアドレス',
                'password'         => 'パスワード',
                'submit-btn'       => 'パスワードをリセット',
            ],
        ],

        'tenants' => [
            'index' => [
                'title'        => 'テナントリスト',
                'register-btn' => 'テナント登録',
        
                'create' => [
                    'title'             => 'テナントの作成',
                    'first-name'        => '名',
                    'last-name'         => '姓',
                    'user-name'         => 'ユーザー名',
                    'organization-name' => '組織名',
                    'phone'             => '電話',
                    'email'             => 'メール',
                    'password'          => 'パスワード',
                    'confirm-password'  => 'パスワードの確認',
                    'save-btn'          => 'テナントの保存',
                    'back-btn'          => '戻る',
                ],
        
                'datagrid' => [
                    'id'                  => 'ID',
                    'user-name'           => 'ユーザー名',
                    'organization'        => '組織',
                    'domain'              => 'ドメイン',
                    'cname'               => 'Cname',
                    'status'              => 'ステータス',
                    'active'              => 'アクティブ',
                    'disable'             => '無効',
                    'view'                => '洞察を表示',
                    'edit'                => 'テナントの修正',
                    'delete'              => 'テナントの削除',
                    'mass-delete'         => '一括削除',
                    'mass-delete-success' => '選択したテナントが正常に削除されました',
                ],
            ],
        
            'edit' => [
                'title'             => 'テナントの編集',
                'first-name'        => '名',
                'last-name'         => '姓',
                'user-name'         => 'ユーザー名',
                'cname'             => 'Cname',
                'organization-name' => '組織名',
                'phone'             => '電話',
                'status'            => 'ステータス',
                'email'             => 'メール',
                'password'          => 'パスワード',
                'confirm-password'  => 'パスワードの確認',
                'save-btn'          => 'テナントの保存',
                'back-btn'          => '戻る',
                'general'           => '一般',
                'settings'          => '設定',
            ],
        
            'view' => [
                'title'                        => 'テナントの洞察',
                'heading'                      => 'テナント - :tenant_name',
                'email-address'                => 'メールアドレス',
                'phone'                        => '電話',
                'domain-information'           => 'ドメイン情報',
                'mapped-domain'                => 'マップされたドメイン',
                'cname-information'            => 'cName情報',
                'cname-entry'                  => 'cNameエントリー',
                'attribute-information'        => '属性情報',
                'no-of-attributes'             => '属性の数',
                'attribute-family-information' => '属性ファミリー情報',
                'no-of-attribute-families'     => '属性ファミリーの数',
                'product-information'          => '製品情報',
                'no-of-products'               => '製品の数',
                'customer-information'         => '顧客情報',
                'no-of-customers'              => '顧客の数',
                'customer-group-information'   => '顧客グループ情報',
                'no-of-customer-groups'        => '顧客グループの数',
                'category-information'         => 'カテゴリ情報',
                'no-of-categories'             => 'カテゴリの数',
                'addresses'                    => 'アドレスリスト (:count)',
                'empty-title'                  => 'テナントのアドレスを追加',
            ],
        
            'create-success' => 'テナントが正常に作成されました',
            'delete-success' => 'テナントが正常に削除されました',
            'delete-failed'  => 'テナントの削除に失敗しました',
            'product-copied' => 'テナントが正常にコピーされました',
            'update-success' => 'テナントが正常に更新されました',
        
            'customers' => [
                'index' => [
                    'title' => '顧客リスト',
        
                    'datagrid' => [
                        'id'             => 'ID',
                        'domain'         => 'ドメイン',
                        'customer-name'  => '顧客名',
                        'email'          => 'メール',
                        'customer-group' => '顧客グループ',
                        'phone'          => '電話',
                        'status'         => 'ステータス',
                        'active'         => 'アクティブ',
                        'inactive'       => '非活性',
                        'is-suspended'   => '一時停止中',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => '製品リスト',
        
                    'datagrid' => [
                        'id'               => 'ID',
                        'domain'           => 'ドメイン',
                        'name'             => '名前',
                        'sku'              => 'SKU',
                        'attribute-family' => '属性ファミリー',
                        'image'            => '画像',
                        'price'            => '価格',
                        'qty'              => '数量',
                        'status'           => 'ステータス',
                        'active'           => 'アクティブ',
                        'inactive'         => '非活性',
                        'category'         => 'カテゴリ',
                        'type'             => 'タイプ',
                    ],
                ],
            ],
        
            'orders' => [
                'index' => [
                    'title' => '注文リスト',
        
                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => '注文ID',
                        'domain'          => 'ドメイン',
                        'sub-total'       => '小計',
                        'grand-total'     => '総計',
                        'order-date'      => '注文日',
                        'channel-name'    => 'チャネル名',
                        'status'          => 'ステータス',
                        'processing'      => '処理中',
                        'completed'       => '完了',
                        'canceled'        => 'キャンセル済み',
                        'closed'          => 'クローズ',
                        'pending'         => '保留中',
                        'pending-payment' => '支払い保留中',
                        'fraud'           => '詐欺',
                        'customer'        => '顧客',
                        'email'           => 'メール',
                        'location'        => '場所',
                        'images'          => '画像',
                        'pay-by'          => '支払い方法 - ',
                        'pay-via'         => '支払い経由',
                        'date'            => '日付',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'エージェント一覧',
                    'register-btn' => 'エージェント作成',
        
                    'create' => [
                        'title'             => 'エージェント作成',
                        'first-name'        => '名',
                        'last-name'         => '姓',
                        'email'             => 'メール',
                        'current-password'  => '現在のパスワード',
                        'password'          => 'パスワード',
                        'confirm-password'  => 'パスワード確認',
                        'role'              => 'ロール',
                        'select'            => '選択',
                        'status'            => 'ステータス',
                        'save-btn'          => 'テナント保存',
                        'back-btn'          => '戻る',
                        'upload-image-info' => 'プロフィール画像をアップロードしてください（110px X 110px）PNGまたはJPG形式で',
                    ],
        
                    'edit' => [
                        'title' => 'エージェント編集',
                    ],
        
                    'datagrid' => [
                        'id'      => 'ID',
                        'name'    => '名前',
                        'email'   => 'メール',
                        'role'    => 'ロール',
                        'status'  => 'ステータス',
                        'active'  => 'アクティブ',
                        'disable' => '無効',
                        'actions' => 'アクション',
                        'edit'    => '編集',
                        'delete'  => '削除',
                    ],
                ],
        
                'create-success'             => '成功: 超管理者エージェントが正常に作成されました',
                'delete-success'             => 'テナントは正常に削除されました',
                'delete-failed'              => 'テナントの削除に失敗しました',
                'cannot-change'              => 'エージェントの:name は変更できません',
                'product-copied'             => 'テナントが正常にコピーされました',
                'update-success'             => 'テナントは正常に更新されました',
                'invalid-password'           => '入力した現在のパスワードが正しくありません',
                'last-delete-error'          => '警告: 少なくとも1つの超管理者エージェントが必要です',
                'login-delete-error'         => '警告: 自分のアカウントを削除することはできません。',
                'administrator-delete-error' => '警告: 管理者アクセス権を持つ少なくとも1人の超管理者エージェントが必要です',
            ],

            'roles' => [
                'index' => [
                    'title'      => 'ロール一覧',
                    'create-btn' => 'ロール作成',
        
                    'datagrid' => [
                        'id'              => 'ID',
                        'name'            => '名前',
                        'permission-type' => '権限タイプ',
                        'actions'         => 'アクション',
                        'edit'            => '編集',
                        'delete'          => '削除',
                    ],
                ],
        
                'create' => [
                    'access-control' => 'アクセス制御',
                    'all'            => 'すべて',
                    'back-btn'       => '戻る',
                    'custom'         => 'カスタム',
                    'description'    => '説明',
                    'general'        => '一般',
                    'name'           => '名前',
                    'permissions'    => '権限',
                    'save-btn'       => 'ロール保存',
                    'title'          => 'ロール作成',
                ],
        
                'edit' => [
                    'access-control' => 'アクセス制御',
                    'all'            => 'すべて',
                    'back-btn'       => '戻る',
                    'custom'         => 'カスタム',
                    'description'    => '説明',
                    'general'        => '一般',
                    'name'           => '名前',
                    'permissions'    => '権限',
                    'save-btn'       => 'ロール保存',
                    'title'          => 'ロール編集',
                ],
        
                'being-used'        => 'ロールは既に他のエージェントで使用されています',
                'last-delete-error' => '最後のロールは削除できません',
                'create-success'    => 'ロールが正常に作成されました',
                'delete-success'    => 'ロールは正常に削除されました',
                'delete-failed'     => 'ロールの削除に失敗しました',
                'update-success'    => 'ロールは正常に更新されました',
            ],

            'locales' => [
                'index' => [
                    'title'      => 'ロケール一覧',
                    'create-btn' => 'ロケール作成',
        
                    'create' => [
                        'title'            => 'ロケール作成',
                        'code'             => 'コード',
                        'name'             => '名前',
                        'direction'        => '方向',
                        'select-direction' => '方向を選択',
                        'text-ltr'         => '左から右へ',
                        'text-rtl'         => '右から左へ',
                        'locale-logo'      => 'ロケールロゴ',
                        'logo-size'        => '画像の解像度は 24px X 16px のようにする必要があります',
                        'save-btn'         => 'ロケール保存',
                    ],
        
                    'edit' => [
                        'title'     => 'ロケール編集',
                        'code'      => 'コード',
                        'name'      => '名前',
                        'direction' => '方向',
                    ],
        
                    'datagrid' => [
                        'id'        => 'ID',
                        'code'      => 'コード',
                        'name'      => '名前',
                        'direction' => '方向',
                        'text-ltr'  => '左から右へ',
                        'text-rtl'  => '右から左へ',
                        'actions'   => 'アクション',
                        'edit'      => '編集',
                        'delete'    => '削除',
                    ],
                ],
        
                'being-used'        => ':locale_name ロケールはチャネルでデフォルトロケールとして使用されています',
                'create-success'    => 'ロケールが正常に作成されました',
                'update-success'    => 'ロケールが正常に更新されました',
                'delete-success'    => 'ロケールは正常に削除されました',
                'delete-failed'     => 'ロケールの削除に失敗しました',
                'last-delete-error' => '少なくとも1つの超管理者ロケールが必要です',
            ],
        
            'currencies' => [
                'index' => [
                    'title'      => '通貨一覧',
                    'create-btn' => '通貨作成',
        
                    'create' => [
                        'title'    => '通貨作成',
                        'code'     => 'コード',
                        'name'     => '名前',
                        'symbol'   => 'シンボル',
                        'decimal'  => '小数',
                        'save-btn' => '通貨保存',
                    ],
        
                    'edit' => [
                        'title'    => '通貨編集',
                        'code'     => 'コード',
                        'name'     => '名前',
                        'symbol'   => 'シンボル',
                        'decimal'  => '小数',
                        'save-btn' => '通貨保存',
                    ],
        
                    'datagrid' => [
                        'id'      => 'ID',
                        'code'    => 'コード',
                        'name'    => '名前',
                        'actions' => 'アクション',
                        'edit'    => '編集',
                        'delete'  => '削除',
                    ],
                ],
        
                'create-success'      => '通貨が正常に作成されました',
                'update-success'      => '通貨が正常に更新されました',
                'delete-success'      => '通貨は正常に削除されました',
                'delete-failed'       => '通貨の削除に失敗しました',
                'last-delete-error'   => '少なくとも1つの超管理者通貨が必要です',
                'mass-delete-success' => '選択した通貨が正常に削除されました',
            ],
        
            'exchange-rates' => [
                'index' => [
                    'title'        => '為替レート',
                    'create-btn'   => '為替レート作成',
                    'update-rates' => 'レート更新',
        
                    'create' => [
                        'title'                  => '為替レート作成',
                        'source-currency'        => '基準通貨',
                        'target-currency'        => '対象通貨',
                        'select-target-currency' => '対象通貨を選択',
                        'rate'                   => 'レート',
                        'save-btn'               => '為替レート保存',
                    ],
        
                    'edit' => [
                        'title'           => '為替レート編集',
                        'source-currency' => '基準通貨',
                        'target-currency' => '対象通貨',
                        'rate'            => 'レート',
                        'save-btn'        => '為替レート保存',
                    ],
        
                    'datagrid' => [
                        'id'            => 'ID',
                        'currency-name' => '通貨名',
                        'exchange-rate' => '為替レート',
                        'actions'       => 'アクション',
                        'edit'          => '編集',
                        'delete'        => '削除',
                    ],
                ],
        
                'create-success' => '為替レートが正常に作成されました',
                'update-success' => '為替レートが正常に更新されました',
                'delete-success' => '為替レートは正常に削除されました',
                'delete-failed'  => '為替レートの削除に失敗しました',
            ],
            
            'channels' => [
                'index' => [
                    'title' => 'チャネル',
        
                    'datagrid' => [
                        'id'       => 'ID',
                        'code'     => 'コード',
                        'name'     => '名前',
                        'hostname' => 'ホスト名',
                        'actions'  => 'アクション',
                        'edit'     => '編集',
                        'delete'   => '削除',
                    ],
                ],
        
                'edit' => [
                    'title'                  => 'チャネル編集',
                    'back-btn'               => '戻る',
                    'save-btn'               => 'チャネル保存',
                    'general'                => '一般',
                    'code'                   => 'コード',
                    'name'                   => '名前',
                    'description'            => '説明',
                    'hostname'               => 'ホスト名',
                    'hostname-placeholder'   => 'https://www.example.com (末尾にスラッシュを追加しないでください。)',
                    'design'                 => 'デザイン',
                    'theme'                  => 'テーマ',
                    'logo'                   => 'ロゴ',
                    'logo-size'              => '画像の解像度は 192px X 50px のようにする必要があります',
                    'favicon'                => 'Favicon',
                    'favicon-size'           => '画像の解像度は 16px X 16px のようにする必要があります',
                    'seo'                    => 'ホームページ SEO',
                    'seo-title'              => 'メタタイトル',
                    'seo-description'        => 'メタディスクリプション',
                    'seo-keywords'           => 'メタキーワード',
                    'currencies-and-locales' => '通貨とロケール',
                    'locales'                => 'ロケール',
                    'default-locale'         => 'デフォルトロケール',
                    'currencies'             => '通貨',
                    'default-currency'       => 'デフォルト通貨',
                    'last-delete-error'      => '少なくとも1つのチャネルが必要です。',
                    'settings'               => '設定',
                    'status'                 => 'ステータス',
                    'update-success'         => 'チャネル更新成功',
                ],
        
                'update-success' => 'チャネルが正常に更新されました',
                'delete-success' => 'チャネルは正常に削除されました',
                'delete-failed'  => 'チャネルの削除に失敗しました',
            ],
        
            'themes' => [
                'index' => [
                    'create-btn' => 'テーマ作成',
                    'title'      => 'テーマ',
        
                    'datagrid' => [
                        'active'       => 'アクティブ',
                        'channel_name' => 'チャネル名',
                        'delete'       => '削除',
                        'inactive'     => '非アクティブ',
                        'id'           => 'ID',
                        'name'         => '名前',
                        'status'       => 'ステータス',
                        'sort-order'   => '並べ替え順',
                        'type'         => 'タイプ',
                        'view'         => 'ビュー',
                    ],
                ],
        
                'create' => [
                    'name'       => '名前',
                    'save-btn'   => 'テーマ保存',
                    'sort-order' => '並べ替え順',
                    'title'      => 'テーマ作成',
        
                    'type' => [
                        'footer-links'     => 'フッターリンク',
                        'image-carousel'   => '画像カルーセル',
                        'product-carousel' => '商品カルーセル',
                        'static-content'   => '静的コンテンツ',
                        'services-content' => 'サービスコンテンツ',
                        'title'            => 'タイプ',
                    ],
                ],
        
                'edit' => [
                    'add-image-btn'                 => '画像追加',
                    'add-filter-btn'                => 'フィルタ追加',
                    'add-footer-link-btn'           => 'フッターリンク追加',
                    'add-link'                      => 'リンク追加',
                    'asc'                           => '昇順',
                    'back'                          => '戻る',
                    'category-carousel-description' => 'レスポンシブなカテゴリーカルーセルを使用して、ダイナミックなカテゴリーを魅力的に表示します。',
                    'category-carousel'             => 'カテゴリーカルーセル',
                    'create-filter'                 => 'フィルタ作成',
                    'css'                           => 'CSS',
                    'column'                        => 'カラム',
                    'channels'                      => 'チャネル',
                    'desc'                          => '降順',
                    'delete'                        => '削除',
                    'edit'                          => '編集',
                    'footer-title'                  => 'タイトル',
                    'footer-link'                   => 'フッターリンク',
                    'footer-link-form-title'        => 'フッターリンク',
                    'filter-title'                  => 'タイトル',
                    'filters'                       => 'フィルタ',
                    'footer-link-description'       => 'シームレスなウェブサイトの探索と情報取得のために、フッターリンクを介してナビゲートします。',
                    'general'                       => '一般',
                    'html'                          => 'HTML',
                    'image'                         => '画像',
                    'image-size'                    => '画像の解像度は (1920px X 700px) である必要があります',
                    'image-title'                   => '画像タイトル',
                    'image-upload-message'          => '画像のみ (.jpeg, .jpg, .png, .webp, ..) が許可されています。',
                    'key'                           => 'キー: :key',
                    'key-input'                     => 'キー',
                    'link'                          => 'リンク',
                    'limit'                         => '制限',
                    'name'                          => '名前',
                    'product-carousel'              => '商品カルーセル',
                    'product-carousel-description'  => '動的でレスポンシブな商品カルーセルで商品を見事に紹介します。',
                    'path'                          => 'パス',
                    'preview'                       => 'プレビュー',
                    'slider'                        => 'スライダー',
                    'static-content-description'    => '簡潔で情報豊かな静的コンテンツで観客との関係を向上させます。',
                    'static-content'                => '静的コンテンツ',
                    'slider-description'            => 'スライダー関連のテーマのカスタマイズ。',
                    'slider-required'               => 'スライダーフィールドは必須です。',
                    'slider-add-btn'                => 'スライダー追加',
                    'save-btn'                      => '保存',
                    'sort'                          => 'ソート',
                    'sort-order'                    => '並べ替え順',
                    'status'                        => 'ステータス',
                    'slider-image'                  => 'スライダー画像',
                    'select'                        => '選択',
                    'title'                         => 'テーマ編集',
                    'update-slider'                 => 'スライダー更新',
                    'url'                           => 'URL',
                    'value-input'                   => '値',
                    'value'                         => '値: :value',
        
                    'services-content' => [
                        'add-btn'            => 'サービス追加',
                        'channels'           => 'チャネル',
                        'delete'             => '削除',
                        'description'        => '説明',
                        'general'            => '一般',
                        'name'               => '名前',
                        'save-btn'           => '保存',
                        'service-icon'       => 'サービスアイコン',
                        'service-icon-class' => 'サービスアイコンクラス',
                        'service-info'       => 'サービス関連のテーマのカスタマイズ。',
                        'services'           => 'サービス',
                        'sort-order'         => '並べ替え順',
                        'status'             => 'ステータス',
                        'title'              => 'タイトル',
                        'update-service'     => 'サービス更新',
                    ],
                ],
        
                'create-success' => 'テーマが正常に作成されました',
                'delete-success' => 'テーマは正常に削除されました',
                'update-success' => 'テーマが正常に更新されました',
                'delete-failed'  => 'テーマのコンテンツを削除中にエラーが発生しました。',
            ],

            'email' => [
                'create' => [
                    'send-btn'                  => 'メールを送信する',
                    'back-btn'                  => '戻る',
                    'title'                     => 'メールを送信する',
                    'general'                   => '一般',
                    'body'                      => '本文',
                    'subject'                   => '件名',
                    'dear'                      => ':agent_name 様へ',
                    'agent-registration'        => 'Saasエージェントが正常に登録されました',
                    'summary'                   => 'アカウントが作成されました。以下はアカウントの詳細です：',
                    'saas-url'                  => 'ドメイン',
                    'email'                     => 'メール',
                    'password'                  => 'パスワード',
                    'sign-in'                   => 'サインイン',
                    'thanks'                    => 'ありがとうございます！',
                    'send-email-to-all-tenants' => '全テナントにメールを送信する',
                ],
                
                'send-success' => 'メールが正常に送信されました。',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'CMS ページリスト',
                'create-btn' => 'ページを作成',
        
                'datagrid' => [
                    'id'                  => 'ID',
                    'page-title'          => 'ページタイトル',
                    'url-key'             => 'URL キー',
                    'status'              => 'ステータス',
                    'active'              => '有効',
                    'disable'             => '無効',
                    'edit'                => 'ページを編集',
                    'delete'              => 'ページを削除',
                    'mass-delete'         => '一括削除',
                    'mass-delete-success' => '選択した CMS ページが正常に削除されました',
                ],
            ],
        
            'create' => [
                'title'            => 'CMS ページを作成',
                'first-name'       => '名前',
                'general'          => '一般',
                'page-title'       => 'タイトル',
                'channels'         => 'チャネル',
                'content'          => 'コンテンツ',
                'meta-keywords'    => 'メタキーワード',
                'meta-description' => 'メタ説明',
                'meta-title'       => 'メタタイトル',
                'seo'              => 'SEO',
                'url-key'          => 'URL キー',
                'description'      => '説明',
                'save-btn'         => 'CMS ページを保存',
                'back-btn'         => '戻る',
            ],
        
            'edit' => [
                'title'            => 'ページを編集',
                'preview-btn'      => 'ページをプレビュー',
                'save-btn'         => 'ページを保存',
                'general'          => '一般',
                'page-title'       => 'ページタイトル',
                'back-btn'         => '戻る',
                'channels'         => 'チャネル',
                'content'          => 'コンテンツ',
                'seo'              => 'SEO',
                'meta-keywords'    => 'メタキーワード',
                'meta-description' => 'メタ説明',
                'meta-title'       => 'メタタイトル',
                'url-key'          => 'URL キー',
                'description'      => '説明',
            ],
        
            'create-success' => 'CMS が正常に作成されました。',
            'delete-success' => 'CMS が正常に削除されました。',
            'update-success' => 'CMS が正常に更新されました。',
            'no-resource'    => 'リソースが存在しません。',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => '削除',
                'enable-at-least-one-shipping' => '少なくとも1つの配送方法を有効にしてください。',
                'enable-at-least-one-payment'  => '少なくとも1つの支払い方法を有効にしてください。',
                'save-btn'                     => '設定を保存',
                'save-message'                 => '設定が正常に保存されました',
                'title'                        => '設定',
        
                'general' => [
                    'info'  => 'レイアウトとメールの詳細を管理する',
                    'title' => '一般',
        
                    'design' => [
                        'info'  => 'ロゴとファビコンのアイコンを設定します。',
                        'title' => 'デザイン',
        
                        'super' => [
                            'info'          => 'スーパーアドミンロゴは、システムやウェブサイトの管理インターフェースを表す独自のイメージまたはエンブレムであり、しばしばカスタマイズ可能です。',
                            'admin-logo'    => '管理者のロゴ',
                            'logo-image'    => 'ロゴ画像',
                            'favicon-image' => 'Favicon 画像',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => 'スーパーアドミンのメールアドレスを設定します。',
                        'title' => 'スーパーエージェント',
        
                        'super' => [
                            'info'          => 'スーパーアドミンのメールアドレスを設定して、メール通知を受け取るためのメールアドレスを設定します。',
                            'email-address' => 'メールアドレス',
                        ],

                        'social-connect' => [
                            'title'    => 'ソーシャルコネクト',
                            'info'     => 'ソーシャルメディアプラットフォームは、コメント、いいね、共有を通じて、直接観客とのやり取りの機会を提供し、関与を促進し、ブランドを中心にコミュニティを形成します。',
                            'facebook' => 'Facebook',
                            'twitter'  => 'Twitter',
                            'linkedin' => 'LinkedIn',
                        ],
                    ],
        
                    'content' => [
                        'info'   => 'テナント登録のレイアウトのヘッダーとフッター情報を設定します。',
                        'title'  => 'コンテンツ',
        
                        'footer' => [
                            'info'           => 'フッターコンテンツを設定します。',
                            'title'          => 'フッター',
                            'footer-content' => 'フッターテキスト',
                            'footer-toggle'  => 'フッターの切り替え',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => '売上、配送、および支払い方法の詳細を管理する',
                    'title' => 'セールス',
        
                    'shipping-methods' => [
                        'info'  => '配送方法の情報を設定します。',
                        'title' => '配送方法',
                    ],
        
                    'payment-methods' => [
                        'info'  => '支払い方法の情報を設定します。',
                        'title' => '支払い方法',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => '少なくとも1つの配送方法を有効にしてください。',
            'enable-at-least-one-payment'  => '少なくとも1つの支払い方法を有効にしてください。',
            'save-message'                 => '成功: スーパーアドミンの設定が正常に保存されました。',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'テナントとして登録',
            ],
    
            'footer' => [
                'footer-text'     => '© 著作権 2010年 - 2023年、Webkul Software（インドで登録）。全著作権所有。',
                'connect-with-us' => '私たちとつながる',
                'text-locale'     => 'ロケール',
                'text-currency'   => '通貨',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => '店舗登録',
            'step-1'              => 'ステップ 1',
            'auth-cred'           => '認証資格情報',
            'email'               => 'メール',
            'phone'               => '電話',
            'username'            => 'ユーザー名',
            'password'            => 'パスワード',
            'cpassword'           => 'パスワードの確認',
            'continue'            => '続行',
            'step-2'              => 'ステップ 2',
            'personal'            => '個人情報',
            'first-name'          => '名',
            'last-name'           => '姓',
            'step-3'              => 'ステップ 3',
            'org-details'         => '組織の詳細',
            'org-name'            => '組織名',
            'company-activated'   => '成功：企業が正常にアクティブ化されました。',
            'company-deactivated' => '成功：企業が正常に非アクティブ化されました。',
            'company-updated'     => '成功：企業が正常に更新されました。',
            'something-wrong'     => '警告：何かがうまくいかなかったようです。',
            'store-created'       => '成功：ストアが正常に作成されました。',
            'something-wrong-1'   => '警告：何かがうまくいかなかったようです。後で再試行してください。',
            'content'             => '商人になり、サーバーのインストールや管理の心配なしに、手間なく自分のストアを作成できます。サインアップし、製品データをアップロードし、ECストアを取得するだけです。Laravel Multi Company SaaSモジュールは簡単なカスタマイズ機能を提供し、商人は簡単にストアに追加の機能や機能を追加したり、簡単に向上させることができます。',
    
            'right-panel' => [
                'heading'    => '商人アカウントのセットアップ方法',
                'para'       => 'わずかなステップでモジュールをセットアップするのは簡単です',
                'step-one'   => 'メール、パスワード、確認パスワードなどの認証資格情報を入力します',
                'step-two'   => '名前、姓、電話番号などの個人情報を入力します。',
                'step-three' => 'ユーザー名、組織名などの組織の詳細を入力します',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => '警告：1つ以上のチャネルを作成することは許可されていません',
            'channel-hostname'                  => '警告：ホスト名を変更するには管理者に連絡してください',
            'same-domain'                       => '警告：メインドメインと同じサブドメインを保持できません',
            'block-message'                     => '警告：テナントをアンブロックしたい場合は、いつでもお問い合わせください。24時間対応で問題を解決します。',
            'blocked'                           => 'がブロックされました',
            'illegal-action'                    => '警告：不正なアクションを実行しました',
            'domain-message'                    => '警告：おっと！<b>:domain</b>で助けることはできません',
            'domain-desc'                       => '組織として<b>:domain</b>でアカウントを作成したい場合は、アカウントを作成して開始してください。',
            'illegal-message'                   => '警告：実行したアクションはサイト管理者によって無効にされています。詳細についてはサイト管理者にメールしてください。',
            'locale-creation'                   => '警告：英語以外のロケールの作成は許可されていません。',
            'locale-delete'                     => '警告：ロケールを削除できません。',
            'cannot-delete-default'             => '警告：デフォルトのチャネルを削除することはできません。',
            'tenant-blocked'                    => 'テナントがブロックされました',
            'domain-not-found'                  => '警告：ドメインが見つかりません。',
            'company-blocked-by-administrator'  => 'このテナントは管理者によってブロックされています',
            'not-allowed-to-visit-this-section' => '警告：このセクションを使用することは許可されていません。',
            'auth'                              => '警告：認証エラー！',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => '新しい会社が登録されました',
                'first-name' => '名',
                'last-name'  => '姓',
                'email'      => 'メール',
                'name'       => '名前',
                'username'   => 'ユーザー名',
                'domain'     => 'ドメイン',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => '新しい会社が正常に登録されました',
                'dear'       => ':tenant_name 様',
                'greeting'   => 'ようこそ、そして登録いただきありがとうございます！',
                'summary'    => 'アカウントは正常に作成されましたので、メールアドレスとパスワードの資格情報を使用してログインできます。ログインすると、製品、販売、顧客、レビュー、プロモーションなどの他のサービスにアクセスできるようになります。',
                'thanks'     => 'ありがとう！',
                'visit-shop' => 'ショップを訪れる',
            ],
        ],
    ],

    'admin' => [
        'tenant-profile' => [
            'edit-title'     => '企業の詳細を編集',
            'first-name'     => '名',
            'last-name'      => '姓',
            'email'          => 'メール',
            'skype'          => 'Skype',
            'cname'          => 'cName',
            'phone'          => '電話',
            'general'        => '一般',
            'back-btn'       => '戻る',
            'save-btn'       => '詳細を保存',
            'update-success' => '成功：:resource が正常に更新されました。',
            'update-failed'  => '警告：不明な理由で :resource を更新できません。',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => '企業住所リスト',
                'create-btn' => '住所を追加',
    
                'datagrid' => [
                    'id'          => 'ID',
                    'address1'    => '住所1',
                    'address2'    => '住所2',
                    'city'        => '市',
                    'country'     => '国',
                    'edit'        => '編集',
                    'delete'      => '削除',
                    'mass-delete' => '一括削除',
                ],
            ],
    
            'create' => [
                'title'     => '企業住所を作成',
                'general'   => '一般',
                'address1'  => '住所1',
                'address2'  => '住所2',
                'country'   => '国',
                'state'     => '州',
                'city'      => '市',
                'post-code' => '郵便番号',
                'phone'     => '電話',
                'back-btn'  => '戻る',
                'save-btn'  => '住所を保存',
            ],
    
            'edit' => [
                'title'     => '企業住所を編集',
                'general'   => '一般',
                'address1'  => '住所1',
                'address2'  => '住所2',
                'country'   => '国',
                'state'     => '州',
                'city'      => '市',
                'post-code' => '郵便番号',
                'phone'     => '電話',
                'back-btn'  => '戻る',
                'save-btn'  => '住所を保存',
            ],
    
            'create-success'      => '成功：企業住所が正常に作成されました。',
            'update-success'      => '成功：企業住所が正常に更新されました。',
            'delete-success'      => '成功：:resource が正常に削除されました。',
            'delete-failed'       => '警告：不明な理由で :resource を削除できません。',
            'mass-delete-success' => '成功：選択した住所が正常に削除されました。',
        ],
    
        'system' => [
            'social-login'           => 'ソーシャルログイン',
            'facebook'               => 'Facebook 設定',
            'facebook-client-id'     => 'Facebook クライアントID',
            'facebook-client-secret' => 'Facebook クライアントシークレット',
            'facebook-callback-url'  => 'Facebook コールバックURL',
            'twitter'                => 'Twitter 設定',
            'twitter-client-id'      => 'Twitter クライアントID',
            'twitter-client-secret'  => 'Twitter クライアントシークレット',
            'twitter-callback-url'   => 'Twitter コールバックURL',
            'google'                 => 'Google 設定',
            'google-client-id'       => 'Google クライアントID',
            'google-client-secret'   => 'Google クライアントシークレット',
            'google-callback-url'    => 'Google コールバックURL',
            'linkedin'               => 'LinkedIn 設定',
            'linkedin-client-id'     => 'LinkedIn クライアントID',
            'linkedin-client-secret' => 'LinkedIn クライアントシークレット',
            'linkedin-callback-url'  => 'LinkedIn コールバックURL',
            'github'                 => 'GitHub 設定',
            'github-client-id'       => 'GitHub クライアントID',
            'github-client-secret'   => 'GitHub クライアントシークレット',
            'github-callback-url'    => 'GitHub コールバックURL',
            'email-credentials'      => 'メールの資格情報',
            'mail-driver'            => 'メールドライバー',
            'mail-host'              => 'メールホスト',
            'mail-port'              => 'メールポート',
            'mail-username'          => 'メールユーザー名',
            'mail-password'          => 'メールパスワード',
            'mail-encryption'        => 'メール暗号化',
        ],
        
        'tenant' => [
            'id'              => 'ID',
            'first-name'      => '名',
            'last-name'       => '姓',
            'email'           => 'メール',
            'skype'           => 'Skype',
            'c-name'          => 'CName',
            'add-address'     => '住所を追加',
            'country'         => '国',
            'city'            => '市',
            'address1'        => '住所1',
            'address2'        => '住所2',
            'address'         => '住所リスト',
            'company'         => 'テナント',
            'profile'         => 'プロフィール',
            'update'          => '更新',
            'address-details' => '住所詳細',
            'create-failed'   => '警告：不明な理由で :attribute を作成できません。',
            'update-success'  => '成功：:resource が正常に更新されました。',
            'update-failed'   => '警告：不明な理由で :resource を更新できません。',
    
            'company-address' => [
                'add-address-title'    => '新しい住所',
                'update-address-title' => '住所を更新',
                'save-btn-title'       => '住所を保存',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => '注文 :order_id が :placed_by さんによって :created_at に受け付けられました。',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'おっと！お探しのページは休暇中です。お探しのものが見つかりませんでした。',
            'title'       => '404 ページが見つかりません',
        ],

        '401' => [
            'description' => 'おっと！このページにアクセスする権限がありません。必要な資格情報が不足しているようです。',
            'title'       => '401 認証されていません',
        ],

        '403' => [
            'description' => 'おっと！このページはアクセスできません。このコンテンツを表示するための必要な権限がありません。',
            'title'       => '403 アクセス禁止',
        ],

        '500' => [
            'description' => 'おっと！何かがうまくいきませんでした。お探しのページを読み込むのに問題が発生しているようです。',
            'title'       => '500 サーバーエラー',
        ],

        '503' => [
            'description' => 'おっと！一時的にメンテナンス中です。しばらくしてからもう一度お試しください。',
            'title'       => '503 サービス利用不可',
        ],
    ],
];
