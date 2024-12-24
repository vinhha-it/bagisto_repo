<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'Sürüm : :version',
                'account-title' => 'Hesap',
                'logout'        => 'Çıkış Yap',
                'my-account'    => 'Hesabım',
                'visit-shop'    => 'Mağazayı Ziyaret Et',
            ],
    
            'sidebar' => [
                'tenants'          => 'Kiracılar',
                'tenant-customers' => 'Müşteriler',
                'tenant-products'  => 'Ürünler',
                'tenant-orders'    => 'Siparişler',
                'settings'         => 'Ayarlar',
                'agents'           => 'Ajanlar',
                'roles'            => 'Roller',
                'locales'          => 'Yereller',
                'currencies'       => 'Para Birimleri',
                'channels'         => 'Kanallar',
                'exchange-rates'   => 'Döviz Kurları',
                'themes'           => 'Temalar',
                'cms'              => 'İYS',
                'configurations'   => 'Yapılandırmalar',
                'general'          => 'Genel',
                'send-email'       => 'E-posta Gönder',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'Kiracılar',
            'create'         => 'Ekle',
            'edit'           => 'Düzenle',
            'delete'         => 'Sil',
            'cancel'         => 'İptal',
            'view'           => 'Görüntüle',
            'mass-delete'    => 'Toplu Silme',
            'mass-update'    => 'Toplu Güncelleme',
            'customers'      => 'Müşteriler',
            'products'       => 'Ürünler',
            'orders'         => 'Siparişler',
            'settings'       => 'Ayarlar',
            'agents'         => 'Ajanlar',
            'roles'          => 'Roller',
            'locales'        => 'Yereller',
            'currencies'     => 'Para Birimleri',
            'exchange-rates' => 'Döviz Kurları',
            'channels'       => 'Kanallar',
            'themes'         => 'Temalar',
            'send-email'     => 'E-posta Gönder',
            'cms'            => 'İçerik Yönetim Sistemi',
            'configuration'  => 'Yapılandırma',
            'download'       => 'İndir',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => 'Süper Yönetici Girişi',
                'email'                => 'E-posta Adresi',
                'password'             => 'Şifre',
                'btn-submit'           => 'Giriş Yap',
                'forget-password-link' => 'Şifremi Unuttum?',
                'submit-btn'           => 'Giriş Yap',
                'login-success'        => 'Başarılı: Başarıyla giriş yaptınız.',
                'login-error'          => 'Lütfen kimlik bilgilerinizi kontrol edip tekrar deneyin.',
                'activate-warning'     => 'Hesabınız henüz etkinleştirilmemiş, lütfen yönetici ile iletişime geçin.',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'Şifremi Unuttum',
                    'title'           => 'Şifreyi Kurtar',
                    'email'           => 'Kayıtlı E-posta',
                    'reset-link-sent' => 'Şifre sıfırlama bağlantısı gönderildi',
                    'sign-in-link'    => 'Girişe Dön ?',
                    'email-not-exist' => 'E-posta Mevcut Değil',
                    'submit-btn'      => 'Sıfırla',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'Şifre Sıfırlama',
                'back-link-title'  => 'Girişe Dön ?',
                'confirm-password' => 'Şifreyi Onayla',
                'email'            => 'Kayıtlı E-posta',
                'password'         => 'Şifre',
                'submit-btn'       => 'Şifreyi Sıfırla',
            ],
        ],

        'tenants' => [
            'index' => [
                'title'        => 'Kiracı Listesi',
                'register-btn' => 'Kiracı Kaydı',
        
                'create' => [
                    'title'             => 'Kiracı Oluştur',
                    'first-name'        => 'Adı',
                    'last-name'         => 'Soyadı',
                    'user-name'         => 'Kullanıcı Adı',
                    'organization-name' => 'Kuruluş Adı',
                    'phone'             => 'Telefon',
                    'email'             => 'E-posta',
                    'password'          => 'Şifre',
                    'confirm-password'  => 'Şifreyi Onayla',
                    'save-btn'          => 'Kiracıyı Kaydet',
                    'back-btn'          => 'Geri',
                ],
        
                'datagrid' => [
                    'id'                  => 'Kimlik',
                    'user-name'           => 'Kullanıcı Adı',
                    'organization'        => 'Kuruluş',
                    'domain'              => 'Alan Adı',
                    'cname'               => 'Ad',
                    'status'              => 'Durum',
                    'active'              => 'Aktif',
                    'disable'             => 'Devre Dışı',
                    'view'                => 'Görüntüle',
                    'edit'                => 'Kiracıyı Düzenle',
                    'delete'              => 'Kiracıyı Kaldır',
                    'mass-delete'         => 'Toplu Sil',
                    'mass-delete-success' => 'Seçilen Kiracı Başarıyla Silindi',
                ],
            ],
        
            'edit' => [
                'title'             => 'Kiracıyı Düzenle',
                'first-name'        => 'Adı',
                'last-name'         => 'Soyadı',
                'user-name'         => 'Kullanıcı Adı',
                'cname'             => 'Ad',
                'organization-name' => 'Kuruluş Adı',
                'phone'             => 'Telefon',
                'status'            => 'Durum',
                'email'             => 'E-posta',
                'password'          => 'Şifre',
                'confirm-password'  => 'Şifreyi Onayla',
                'save-btn'          => 'Kiracıyı Kaydet',
                'back-btn'          => 'Geri',
                'general'           => 'Genel',
                'settings'          => 'Ayarlar',
            ],
        
            'view' => [
                'title'                        => 'Kiracının Görünümleri',
                'heading'                      => 'Kiracı - :tenant_name',
                'email-address'                => 'E-posta Adresi',
                'phone'                        => 'Telefon',
                'domain-information'           => 'Alan Adı Bilgisi',
                'mapped-domain'                => 'Eşleştirilmiş Alan Adı',
                'cname-information'            => 'Ad Bilgisi',
                'cname-entry'                  => 'Ad Girişi',
                'attribute-information'        => 'Öznitelik Bilgisi',
                'no-of-attributes'             => 'Öznitelik Sayısı',
                'attribute-family-information' => 'Öznitelik Ailesi Bilgisi',
                'no-of-attribute-families'     => 'Öznitelik Ailesi Sayısı',
                'product-information'          => 'Ürün Bilgisi',
                'no-of-products'               => 'Ürün Sayısı',
                'customer-information'         => 'Müşteri Bilgisi',
                'no-of-customers'              => 'Müşteri Sayısı',
                'customer-group-information'   => 'Müşteri Grubu Bilgisi',
                'no-of-customer-groups'        => 'Müşteri Grubu Sayısı',
                'category-information'         => 'Kategori Bilgisi',
                'no-of-categories'             => 'Kategori Sayısı',
                'addresses'                    => 'Adres Listesi (:count)',
                'empty-title'                  => 'Kiracı Adresi Ekle',
            ],
        
            'create-success' => 'Kiracı başarıyla oluşturuldu',
            'delete-success' => 'Kiracı başarıyla silindi',
            'delete-failed'  => 'Kiracı silme başarısız oldu',
            'product-copied' => 'Kiracı başarıyla kopyalandı',
            'update-success' => 'Kiracı başarıyla güncellendi',
        
            'customers' => [
                'index' => [
                    'title' => 'Müşteri Listesi',
        
                    'datagrid' => [
                        'id'             => 'Kimlik',
                        'domain'         => 'Alan Adı',
                        'customer-name'  => 'Müşteri Adı',
                        'email'          => 'E-posta',
                        'customer-group' => 'Müşteri Grubu',
                        'phone'          => 'Telefon',
                        'status'         => 'Durum',
                        'active'         => 'Aktif',
                        'inactive'       => 'Etkin değil',
                        'is-suspended'   => 'Askıya alınmış',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => 'Ürün Listesi',
        
                    'datagrid' => [
                        'id'               => 'Kimlik',
                        'domain'           => 'Alan Adı',
                        'name'             => 'Adı',
                        'sku'              => 'SKU',
                        'attribute-family' => 'Öznitelik Ailesi',
                        'image'            => 'Resim',
                        'price'            => 'Fiyat',
                        'qty'              => 'Miktar',
                        'status'           => 'Durum',
                        'active'           => 'Aktif',
                        'inactive'         => 'Etkin değil',
                        'category'         => 'Kategori',
                        'type'             => 'Tip',
                    ],
                ],
            ],
        
            'orders' => [
                'index' => [
                    'title' => 'Sipariş Listesi',
        
                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => 'Sipariş Kimliği',
                        'domain'          => 'Alan Adı',
                        'sub-total'       => 'Ara Toplam',
                        'grand-total'     => 'Toplam',
                        'order-date'      => 'Sipariş Tarihi',
                        'channel-name'    => 'Kanal Adı',
                        'status'          => 'Durum',
                        'processing'      => 'İşleniyor',
                        'completed'       => 'Tamamlandı',
                        'canceled'        => 'İptal Edildi',
                        'closed'          => 'Kapatıldı',
                        'pending'         => 'Beklemede',
                        'pending-payment' => 'Ödeme Bekliyor',
                        'fraud'           => 'Sahtekarlık',
                        'customer'        => 'Müşteri',
                        'email'           => 'E-posta',
                        'location'        => 'Konum',
                        'images'          => 'Resimler',
                        'pay-by'          => 'Ödeme - ',
                        'pay-via'         => 'Şu Yöntemle Öde',
                        'date'            => 'Tarih',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'Ajan Listesi',
                    'register-btn' => 'Ajan Oluştur',
            
                    'create' => [
                        'title'             => 'Ajan Oluştur',
                        'first-name'        => 'Ad',
                        'last-name'         => 'Soyad',
                        'email'             => 'E-posta',
                        'current-password'  => 'Mevcut Şifre',
                        'password'          => 'Şifre',
                        'confirm-password'  => 'Şifreyi Onayla',
                        'role'              => 'Rol',
                        'select'            => 'Seçiniz',
                        'status'            => 'Durum',
                        'save-btn'          => 'Ajanı Kaydet',
                        'back-btn'          => 'Geri',
                        'upload-image-info' => 'Profil Resmi Yükleyin (110px X 110px) PNG veya JPG Formatında',
                    ],
            
                    'edit' => [
                        'title' => 'Ajanı Düzenle',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Kimlik',
                        'name'    => 'Ad',
                        'email'   => 'E-posta',
                        'role'    => 'Rol',
                        'status'  => 'Durum',
                        'active'  => 'Aktif',
                        'disable' => 'Devre Dışı',
                        'actions' => 'Eylemler',
                        'edit'    => 'Düzenle',
                        'delete'  => 'Sil',
                    ],
                ],
            
                'create-success'             => 'Başarı: Süper yönetici ajan başarıyla oluşturuldu',
                'delete-success'             => 'Ajan başarıyla silindi',
                'delete-failed'              => 'Ajan silme başarısız oldu',
                'cannot-change'              => 'Ajanın :name adı değiştirilemez',
                'product-copied'             => 'Ajan başarıyla kopyalandı',
                'update-success'             => 'Ajan başarıyla güncellendi',
                'invalid-password'           => 'Girdiğiniz mevcut şifre geçersiz',
                'last-delete-error'          => 'Uyarı: En az bir süper yönetici ajan gereklidir',
                'login-delete-error'         => 'Uyarı: Kendi hesabınızı silemezsiniz.',
                'administrator-delete-error' => 'Uyarı: En az bir süper yönetici ajanı yönetici erişimi ile gereklidir',
            ],
            
            'roles' => [
                'index' => [
                    'title'      => 'Roller Listesi',
                    'create-btn' => 'Rol Oluştur',
            
                    'datagrid' => [
                        'id'              => 'Kimlik',
                        'name'            => 'Ad',
                        'permission-type' => 'İzin Türü',
                        'actions'         => 'Eylemler',
                        'edit'            => 'Düzenle',
                        'delete'          => 'Sil',
                    ],
                ],
            
                'create' => [
                    'access-control' => 'Erişim Kontrolü',
                    'all'            => 'Hepsi',
                    'back-btn'       => 'Geri',
                    'custom'         => 'Özel',
                    'description'    => 'Açıklama',
                    'general'        => 'Genel',
                    'name'           => 'Ad',
                    'permissions'    => 'İzinler',
                    'save-btn'       => 'Rolü Kaydet',
                    'title'          => 'Rol Oluştur',
                ],
            
                'edit' => [
                    'access-control' => 'Erişim Kontrolü',
                    'all'            => 'Hepsi',
                    'back-btn'       => 'Geri',
                    'custom'         => 'Özel',
                    'description'    => 'Açıklama',
                    'general'        => 'Genel',
                    'name'           => 'Ad',
                    'permissions'    => 'İzinler',
                    'save-btn'       => 'Rolü Kaydet',
                    'title'          => 'Rolü Düzenle',
                ],
            
                'being-used'        => 'Rol zaten başka bir Ajan tarafından kullanılıyor',
                'last-delete-error' => 'Son Rol silinemez',
                'create-success'    => 'Rol başarıyla oluşturuldu',
                'delete-success'    => 'Rol başarıyla silindi',
                'delete-failed'     => 'Rol silme başarısız oldu',
                'update-success'    => 'Rol başarıyla güncellendi',
            ],
            
            'locales' => [
                'index' => [
                    'title'      => 'Yerelleştirme Listesi',
                    'create-btn' => 'Yerelleştirme Oluştur',
            
                    'create' => [
                        'title'            => 'Yerelleştirme Oluştur',
                        'code'             => 'Kod',
                        'name'             => 'Ad',
                        'direction'        => 'Yön',
                        'select-direction' => 'Yönü Seç',
                        'text-ltr'         => 'Soldan Sağa',
                        'text-rtl'         => 'Sağdan Sola',
                        'locale-logo'      => 'Yerelleştirme Logosu',
                        'logo-size'        => 'Resim çözünürlüğü 24px X 16px gibi olmalıdır',
                        'save-btn'         => 'Yerelleştirmeyi Kaydet',
                    ],
            
                    'edit' => [
                        'title'     => 'Yerelleştirmeyi Düzenle',
                        'code'      => 'Kod',
                        'name'      => 'Ad',
                        'direction' => 'Yön',
                    ],
            
                    'datagrid' => [
                        'id'        => 'Kimlik',
                        'code'      => 'Kod',
                        'name'      => 'Ad',
                        'direction' => 'Yön',
                        'text-ltr'  => 'Soldan Sağa',
                        'text-rtl'  => 'Sağdan Sola',
                        'actions'   => 'Eylemler',
                        'edit'      => 'Düzenle',
                        'delete'    => 'Sil',
                    ],
                ],
            
                'being-used'        => ':locale_name yerelleştirme kanalında varsayılan yerelleştirme olarak kullanılıyor',
                'create-success'    => 'Yerelleştirme başarıyla oluşturuldu.',
                'update-success'    => 'Yerelleştirme başarıyla güncellendi.',
                'delete-success'    => 'Yerelleştirme başarıyla silindi.',
                'delete-failed'     => 'Yerelleştirme silme başarısız oldu',
                'last-delete-error' => 'En az bir süper yönetici yerelleştirme gereklidir.',
            ],

            'currencies' => [
                'index' => [
                    'title'      => 'Para Birimleri Listesi',
                    'create-btn' => 'Para Birimi Oluştur',
            
                    'create' => [
                        'title'    => 'Para Birimi Oluştur',
                        'code'     => 'Kod',
                        'name'     => 'Ad',
                        'symbol'   => 'Sembol',
                        'decimal'  => 'Ondalık',
                        'save-btn' => 'Para Birimini Kaydet',
                    ],
            
                    'edit' => [
                        'title'    => 'Para Birimini Düzenle',
                        'code'     => 'Kod',
                        'name'     => 'Ad',
                        'symbol'   => 'Sembol',
                        'decimal'  => 'Ondalık',
                        'save-btn' => 'Para Birimini Kaydet',
                    ],
            
                    'datagrid' => [
                        'id'      => 'Kimlik',
                        'code'    => 'Kod',
                        'name'    => 'Ad',
                        'actions' => 'Eylemler',
                        'edit'    => 'Düzenle',
                        'delete'  => 'Sil',
                    ],
                ],
            
                'create-success'      => 'Para birimi başarıyla oluşturuldu.',
                'update-success'      => 'Para birimi başarıyla güncellendi.',
                'delete-success'      => 'Para birimi başarıyla silindi.',
                'delete-failed'       => 'Para birimi silme başarısız oldu',
                'last-delete-error'   => 'En az bir süper yönetici para birimi gereklidir.',
                'mass-delete-success' => 'Seçilen Para Birimleri Başarıyla Silindi',
            ],
            
            'exchange-rates' => [
                'index' => [
                    'title'        => 'Döviz Kurları',
                    'create-btn'   => 'Döviz Kuru Oluştur',
                    'update-rates' => 'Kurları Güncelle',
            
                    'create' => [
                        'title'                  => 'Döviz Kuru Oluştur',
                        'source-currency'        => 'Kaynak Para Birimi',
                        'target-currency'        => 'Hedef Para Birimi',
                        'select-target-currency' => 'Hedef Para Birimini Seçin',
                        'rate'                   => 'Kur',
                        'save-btn'               => 'Döviz Kuru Kaydet',
                    ],
            
                    'edit' => [
                        'title'           => 'Döviz Kuru Düzenle',
                        'source-currency' => 'Kaynak Para Birimi',
                        'target-currency' => 'Hedef Para Birimi',
                        'rate'            => 'Kur',
                        'save-btn'        => 'Döviz Kuru Kaydet',
                    ],
            
                    'datagrid' => [
                        'id'            => 'Kimlik',
                        'currency-name' => 'Para Birimi Adı',
                        'exchange-rate' => 'Döviz Kuru',
                        'actions'       => 'Eylemler',
                        'edit'          => 'Düzenle',
                        'delete'        => 'Sil',
                    ],
                ],
            
                'create-success' => 'Döviz kuru başarıyla oluşturuldu.',
                'update-success' => 'Döviz kuru başarıyla güncellendi.',
                'delete-success' => 'Döviz kuru başarıyla silindi.',
                'delete-failed'  => 'Döviz kuru silme başarısız oldu',
            ],
            
            'channels' => [
                'index' => [
                    'title' => 'Kanallar',
            
                    'datagrid' => [
                        'id'       => 'Kimlik',
                        'code'     => 'Kod',
                        'name'     => 'Ad',
                        'hostname' => 'Ana Makine Adı',
                        'actions'  => 'Eylemler',
                        'edit'     => 'Düzenle',
                        'delete'   => 'Sil',
                    ],
                ],
            
                'edit' => [
                    'title'                  => 'Kanalı Düzenle',
                    'back-btn'               => 'Geri',
                    'save-btn'               => 'Kanalı Kaydet',
                    'general'                => 'Genel',
                    'code'                   => 'Kod',
                    'name'                   => 'Ad',
                    'description'            => 'Açıklama',
                    'hostname'               => 'Ana Makine Adı',
                    'hostname-placeholder'   => 'https://www.example.com (Sonuna kesinlikle eğik çizgi eklemeyin.)',
                    'design'                 => 'Tasarım',
                    'theme'                  => 'Tema',
                    'logo'                   => 'Logo',
                    'logo-size'              => 'Resim çözünürlüğü 192px X 50px gibi olmalıdır',
                    'favicon'                => 'Favicon',
                    'favicon-size'           => 'Resim çözünürlüğü 16px X 16px gibi olmalıdır',
                    'seo'                    => 'Ana sayfa SEO',
                    'seo-title'              => 'Meta başlık',
                    'seo-description'        => 'Meta açıklama',
                    'seo-keywords'           => 'Meta anahtar kelimeler',
                    'currencies-and-locales' => 'Para Birimleri ve Diller',
                    'locales'                => 'Diller',
                    'default-locale'         => 'Varsayılan Dil',
                    'currencies'             => 'Para Birimleri',
                    'default-currency'       => 'Varsayılan Para Birimi',
                    'last-delete-error'      => 'En az bir Kanal gereklidir.',
                    'settings'               => 'Ayarlar',
                    'status'                 => 'Durum',
                    'update-success'         => 'Kanal Başarıyla Güncellendi',
                ],
            
                'update-success' => 'Kanal başarıyla güncellendi.',
                'delete-success' => 'Kanal başarıyla silindi.',
                'delete-failed'  => 'Kanal silme başarısız oldu',
            ],

            'themes' => [
                'index' => [
                    'create-btn' => 'Tema Oluştur',
                    'title'      => 'Temalar',
            
                    'datagrid' => [
                        'active'       => 'Aktif',
                        'channel_name' => 'Kanal Adı',
                        'delete'       => 'Sil',
                        'inactive'     => 'Pasif',
                        'id'           => 'Kimlik',
                        'name'         => 'Ad',
                        'status'       => 'Durum',
                        'sort-order'   => 'Sıralama Sırası',
                        'type'         => 'Tür',
                        'view'         => 'Görünüm',
                    ],
                ],
            
                'create' => [
                    'name'       => 'Ad',
                    'save-btn'   => 'Tema Kaydet',
                    'sort-order' => 'Sıralama Sırası',
                    'title'      => 'Tema Oluştur',
            
                    'type' => [
                        'footer-links'     => 'Alt Bağlantılar',
                        'image-carousel'   => 'Görsel Karusel',
                        'product-carousel' => 'Ürün Karusel',
                        'static-content'   => 'Statik İçerik',
                        'services-content' => 'Hizmet İçeriği',
                        'title'            => 'Tür',
                    ],
                ],
            
                'edit' => [
                    'add-image-btn'                 => 'Resim Ekle',
                    'add-filter-btn'                => 'Filtre Ekle',
                    'add-footer-link-btn'           => 'Alt Bağlantı Ekle',
                    'add-link'                      => 'Bağlantı Ekle',
                    'asc'                           => 'Artan',
                    'back'                          => 'Geri',
                    'category-carousel-description' => 'Dinamik kategorileri duyarlı bir kategori karuselinde çekici bir şekilde görüntüleyin.',
                    'category-carousel'             => 'Kategori Karuseli',
                    'create-filter'                 => 'Filtre Oluştur',
                    'css'                           => 'CSS',
                    'column'                        => 'Sütun',
                    'channels'                      => 'Kanallar',
                    'desc'                          => 'Azalan',
                    'delete'                        => 'Sil',
                    'edit'                          => 'Düzenle',
                    'footer-title'                  => 'Başlık',
                    'footer-link'                   => 'Alt Bağlantılar',
                    'footer-link-form-title'        => 'Alt Bağlantı',
                    'filter-title'                  => 'Başlık',
                    'filters'                       => 'Filtreler',
                    'footer-link-description'       => 'Sorunsuz web sitesi gezinmesi ve bilgi için alt bağlantılar aracılığıyla gezinin.',
                    'general'                       => 'Genel',
                    'html'                          => 'HTML',
                    'image'                         => 'Resim',
                    'image-size'                    => 'Resim çözünürlüğü (1920 piksel X 700 piksel) olmalıdır',
                    'image-title'                   => 'Resim Başlığı',
                    'image-upload-message'          => 'Yalnızca resimler (.jpeg, .jpg, .png, .webp, ..) izinlidir.',
                    'key'                           => 'Anahtar: :key',
                    'key-input'                     => 'Anahtar',
                    'link'                          => 'Bağlantı',
                    'limit'                         => 'Limit',
                    'name'                          => 'Ad',
                    'product-carousel'              => 'Ürün Karuseli',
                    'product-carousel-description'  => 'Ürünleri dinamik ve duyarlı bir ürün karuseli ile zarif bir şekilde sergileyin.',
                    'path'                          => 'Yol',
                    'preview'                       => 'Önizleme',
                    'slider'                        => 'Sürgülü',
                    'static-content-description'    => 'İzleyiciniz için özlü, bilgilendirici statik içerikle etkileşimi artırın.',
                    'static-content'                => 'Statik İçerik',
                    'slider-description'            => 'Sürgüyle ilgili tema özelleştirmesi.',
                    'slider-required'               => 'Sürgü alanı gereklidir.',
                    'slider-add-btn'                => 'Sürgü Ekle',
                    'save-btn'                      => 'Kaydet',
                    'sort'                          => 'Sırala',
                    'sort-order'                    => 'Sıralama Sırası',
                    'status'                        => 'Durum',
                    'slider-image'                  => 'Sürgü Resmi',
                    'select'                        => 'Seç',
                    'title'                         => 'Tema Düzenle',
                    'update-slider'                 => 'Sürgüyü Güncelle',
                    'url'                           => 'URL',
                    'value-input'                   => 'Değer',
                    'value'                         => 'Değer: :value',
            
                    'services-content' => [
                        'add-btn'            => 'Hizmet Ekle',
                        'channels'           => 'Kanallar',
                        'delete'             => 'Sil',
                        'description'        => 'Açıklama',
                        'general'            => 'Genel',
                        'name'               => 'Ad',
                        'save-btn'           => 'Kaydet',
                        'service-icon'       => 'Hizmet İkonu',
                        'service-icon-class' => 'Hizmet İkon Sınıfı',
                        'service-info'       => 'Hizmetle ilgili tema özelleştirmesi.',
                        'services'           => 'Hizmetler',
                        'sort-order'         => 'Sıralama Sırası',
                        'status'             => 'Durum',
                        'title'              => 'Başlık',
                        'update-service'     => 'Hizmetleri Güncelle',
                    ],
                ],
            
                'create-success' => 'Tema başarıyla oluşturuldu',
                'delete-success' => 'Tema başarıyla silindi',
                'update-success' => 'Tema başarıyla güncellendi',
                'delete-failed'  => 'Tema içeriği silinirken hatayla karşılaşıldı.',
            ],
            
            'email' => [
                'create' => [
                    'send-btn'                  => 'E-posta Gönder',
                    'back-btn'                  => 'Geri',
                    'title'                     => 'E-posta Gönder',
                    'general'                   => 'Genel',
                    'body'                      => 'İçerik',
                    'subject'                   => 'Konu',
                    'dear'                      => 'Sayın :agent_name',
                    'agent-registration'        => 'Saas Ajan Başarıyla Kaydedildi',
                    'summary'                   => 'Hesabınız oluşturuldu. Hesap detaylarınız aşağıdadır: ',
                    'saas-url'                  => 'Alan Adı',
                    'email'                     => 'E-posta',
                    'password'                  => 'Şifre',
                    'sign-in'                   => 'Oturum Aç',
                    'thanks'                    => 'Teşekkürler!',
                    'send-email-to-all-tenants' => 'Tüm kiracılara e-posta gönder',
                ],
            
                'send-success' => 'E-posta başarıyla gönderildi.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'CMS Sayfa Listesi',
                'create-btn' => 'Sayfa Oluştur',
        
                'datagrid' => [
                    'id'                  => 'Kimlik',
                    'page-title'          => 'Sayfa Başlığı',
                    'url-key'             => 'URL Anahtarı',
                    'status'              => 'Durum',
                    'active'              => 'Aktif',
                    'disable'             => 'Devre Dışı Bırak',
                    'edit'                => 'Sayfayı Düzenle',
                    'delete'              => 'Sayfayı Kaldır',
                    'mass-delete'         => 'Toplu Sil',
                    'mass-delete-success' => 'Seçilen CMS Sayfa(lar)ı Başarıyla Silindi',
                ],
            ],
        
            'create' => [
                'title'            => 'CMS Sayfa Oluştur',
                'first-name'       => 'Ad',
                'general'          => 'Genel',
                'page-title'       => 'Başlık',
                'channels'         => 'Kanallar',
                'content'          => 'İçerik',
                'meta-keywords'    => 'Meta Anahtar Kelimeler',
                'meta-description' => 'Meta Açıklaması',
                'meta-title'       => 'Meta Başlığı',
                'seo'              => 'SEO',
                'url-key'          => 'URL Anahtarı',
                'description'      => 'Açıklama',
                'save-btn'         => 'CMS Sayfasını Kaydet',
                'back-btn'         => 'Geri',
            ],
        
            'edit' => [
                'title'            => 'Sayfayı Düzenle',
                'preview-btn'      => 'Sayfayı Önizle',
                'save-btn'         => 'Sayfayı Kaydet',
                'general'          => 'Genel',
                'page-title'       => 'Sayfa Başlığı',
                'back-btn'         => 'Geri',
                'channels'         => 'Kanallar',
                'content'          => 'İçerik',
                'seo'              => 'SEO',
                'meta-keywords'    => 'Meta Anahtar Kelimeler',
                'meta-description' => 'Meta Açıklaması',
                'meta-title'       => 'Meta Başlığı',
                'url-key'          => 'URL Anahtarı',
                'description'      => 'Açıklama',
            ],
        
            'create-success' => 'CMS başarıyla oluşturuldu.',
            'delete-success' => 'CMS başarıyla silindi.',
            'update-success' => 'CMS başarıyla güncellendi.',
            'no-resource'    => 'Kaynak bulunamadı.',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => 'Sil',
                'enable-at-least-one-shipping' => 'En az bir kargo yöntemi etkinleştirin.',
                'enable-at-least-one-payment'  => 'En az bir ödeme yöntemi etkinleştirin.',
                'save-btn'                     => 'Yapılandırmayı Kaydet',
                'save-message'                 => 'Yapılandırma başarıyla kaydedildi',
                'title'                        => 'Yapılandırma',
        
                'general' => [
                    'info'  => 'Düzen ve e-posta detaylarını yönetin',
                    'title' => 'Genel',
        
                    'design' => [
                        'info'  => 'Logo ve favicon ikonunu ayarlayın.',
                        'title' => 'Tasarım',
        
                        'super' => [
                            'info'          => 'Süper yönetici logosu, bir sistemin veya web sitesinin yönetim arayüzünü temsil eden ayırt edici bir resim veya simgedir, genellikle özelleştirilebilir.',
                            'admin-logo'    => 'Yönetici Logosu',
                            'logo-image'    => 'Logo Resmi',
                            'favicon-image' => 'Favicon Resmi',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => 'Süper yönetici için e-posta adresini ayarlayın.',
                        'title' => 'Süper Temsilci',
        
                        'super' => [
                            'info'          => 'Süper yönetici için e-posta adresini ayarlayın ve e-posta bildirimlerini alın',
                            'email-address' => 'E-posta Adresi',
                        ],

                        'social-connect' => [
                            'title'    => 'Sosyal Bağlantı',
                            'info'     => 'Sosyal medya platformları, yorumlar, beğeniler ve paylaşımlar aracılığıyla izleyiciyle doğrudan etkileşim imkanı sunar; bu da katılımı teşvik eder ve markanızın etrafında bir topluluk oluşturur.',
                            'facebook' => 'Facebook',
                            'twitter'  => 'Twitter',
                            'linkedin' => 'Linkedin',
                        ],
                    ],
        
                    'content' => [
                        'info'   => 'Kiracı kayıt düzeni için başlık ve altbilgi bilgilerini ayarlayın.',
                        'title'  => 'İçerik',
        
                        'footer' => [
                            'info'           => 'Altbilgi içeriğini ayarlayın',
                            'title'          => 'Altbilgi',
                            'footer-content' => 'Altbilgi Metni',
                            'footer-toggle'  => 'Altbilgiyi Aç/Kapat',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => 'Satış, kargo ve ödeme yöntemi detaylarını yönetin',
                    'title' => 'Satış',
        
                    'shipping-methods' => [
                        'info'  => 'Kargo yöntemleri bilgilerini ayarlayın',
                        'title' => 'Kargo Yöntemleri',
                    ],
        
                    'payment-methods' => [
                        'info'  => 'Ödeme yöntemleri bilgilerini ayarlayın',
                        'title' => 'Ödeme Yöntemleri',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => 'En az bir kargo yöntemini etkinleştirin.',
            'enable-at-least-one-payment'  => 'En az bir ödeme yöntemini etkinleştirin.',
            'save-message'                 => 'Başarılı: Süper yönetici yapılandırması başarıyla kaydedildi.',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'Kiralık Olarak Kaydol',
            ],
    
            'footer' => [
                'footer-text'     => '© Telif Hakkı 2010 - 2023, Webkul Yazılım (Hindistan\'da kayıtlı). Tüm hakları saklıdır.',
                'connect-with-us' => 'Bizimle İletişime Geçin',
                'text-locale'     => 'Yerel Ayarlar',
                'text-currency'   => 'Para Birimi',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => 'Tüccar Kaydı',
            'step-1'              => 'Adım 1',
            'auth-cred'           => 'Kimlik Doğrulama Bilgileri',
            'email'               => 'E-posta',
            'phone'               => 'Telefon',
            'username'            => 'Kullanıcı Adı',
            'password'            => 'Şifre',
            'cpassword'           => 'Şifreyi Onayla',
            'continue'            => 'Devam',
            'step-2'              => 'Adım 2',
            'personal'            => 'Kişisel Detaylar',
            'first-name'          => 'Ad',
            'last-name'           => 'Soyad',
            'step-3'              => 'Adım 3',
            'org-details'         => 'Organizasyon Detayları',
            'org-name'            => 'Organizasyon Adı',
            'company-activated'   => 'Başarılı: Şirket başarıyla etkinleştirildi.',
            'company-deactivated' => 'Başarılı: Şirket başarıyla devre dışı bırakıldı.',
            'company-updated'     => 'Başarılı: Şirket Başarıyla Güncellendi.',
            'something-wrong'     => 'Uyarı: Bir şeyler yanlış gitti.',
            'store-created'       => 'Başarılı: Mağaza Başarıyla Oluşturuldu.',
            'something-wrong-1'   => 'Uyarı: Bir şeyler yanlış gitti, lütfen daha sonra tekrar deneyin.',
            'content'             => 'Bir tüccar olun ve kendi mağazanızı kurmak için sunucuyu kurma ve yönetme konusunda endişelenmeden kolayca mağaza açın. Sadece kaydolmanız, ürün verilerinizi yüklemeniz ve e-ticaret mağazanıza sahip olmanız gerekiyor. Laravel çoklu şirket SaaS modülü, tüccarların mağazalarına kolayca ekstra özellikler ve işlevsellikler ekleyebilmelerini veya kolayca geliştirmelerini sağlar.',
    
            'right-panel' => [
                'heading'    => 'Tüccar Hesabı Nasıl Kurulur',
                'para'       => 'Modülü birkaç adımda kurmak çok kolaydır',
                'step-one'   => 'E-posta, şifre ve şifreyi onayla gibi kimlik doğrulama bilgilerini girin',
                'step-two'   => 'Ad, soyad ve telefon numarası gibi Kişisel Bilgileri Girin.',
                'step-three' => 'Kullanıcı adı, organizasyon adı gibi Organizasyon Detaylarını Girin.',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => 'Uyarı: Birden fazla kanal oluşturmak izin verilmez',
            'channel-hostname'                  => 'Uyarı: Ana bilgisayar adınızı değiştirmek için yöneticiyle iletişime geçiniz',
            'same-domain'                       => 'Uyarı: Ana etki alanı ile aynı alt etki alanını tutamazsınız',
            'block-message'                     => 'Uyarı: Bu kiracıyı engellemek istiyorsanız, bize 7/24 ulaşmaktan çekinmeyin. Sorununuzu çözmek için buradayız.',
            'blocked'                           => 'engellenmiştir',
            'illegal-action'                    => 'Uyarı: Yasadışı bir eylem gerçekleştirdiniz',
            'domain-message'                    => 'Uyarı: Hay aksi! <b>:domain</b>\'de yardımcı olamadık',
            'domain-desc'                       => 'Bir organizasyon olarak <b>:domain</b> ile bir hesap oluşturmak isterseniz, hesap oluşturabilir ve başlayabilirsiniz.',
            'illegal-message'                   => 'Uyarı: Gerçekleştirdiğiniz eylem site yöneticisi tarafından devre dışı bırakılmıştır, bu konuda daha fazla bilgi için lütfen site yöneticinize e-posta gönderin.',
            'locale-creation'                   => 'Uyarı: İngilizce dışında bir yerel ayar oluşturmak izin verilmez.',
            'locale-delete'                     => 'Uyarı: Yerel ayar silinemez.',
            'cannot-delete-default'             => 'Uyarı: Varsayılan kanal silinemez.',
            'tenant-blocked'                    => 'Kiracı Engellendi',
            'domain-not-found'                  => 'Uyarı: Alan adı bulunamadı.',
            'company-blocked-by-administrator'  => 'Bu kiracı engellendi',
            'not-allowed-to-visit-this-section' => 'Uyarı: Bu bölümü kullanmanıza izin verilmiyor.',
            'auth'                              => 'Uyarı: Kimlik doğrulama hatası!',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'Yeni Şirket Kaydedildi',
                'first-name' => 'Ad',
                'last-name'  => 'Soyad',
                'email'      => 'E-posta',
                'name'       => 'Ad',
                'username'   => 'Kullanıcı Adı',
                'domain'     => 'Alan Adı',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => 'Yeni Şirket Başarıyla Kaydedildi',
                'dear'       => 'Sayın :tenant_name',
                'greeting'   => 'Hoş geldiniz ve bize kaydolduğunuz için teşekkür ederiz!',
                'summary'    => 'Hesabınız başarıyla oluşturuldu ve e-posta adresi ve şifre bilgilerinizle giriş yapabilirsiniz. Giriş yaptıktan sonra, ürünler, satışlar, müşteriler, incelemeler ve promosyonlar dahil diğer hizmetlere erişebileceksiniz.',
                'thanks'     => 'Teşekkürler!',
                'visit-shop' => 'Mağazayı Ziyaret Et',
            ],
        ],
    ],
    
    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'Şirket Detayını Düzenle',
            'first-name'     => 'Ad',
            'last-name'      => 'Soyad',
            'email'          => 'E-posta',
            'skype'          => 'Skype',
            'cname'          => 'Ad',
            'phone'          => 'Telefon',
            'general'        => 'Genel',
            'back-btn'       => 'Geri',
            'save-btn'       => 'Detayı Kaydet',
            'update-success' => 'Başarılı: :resource başarıyla güncellendi.',
            'update-failed'  => 'Uyarı: :resource bilinmeyen nedenlerden dolayı güncellenemiyor.',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => 'Şirket Adres Listesi',
                'create-btn' => 'Adres Ekle',
    
                'datagrid' => [
                    'id'          => 'ID',
                    'address1'    => 'Adres 1',
                    'address2'    => 'Adres 2',
                    'city'        => 'Şehir',
                    'country'     => 'Ülke',
                    'edit'        => 'Düzenle',
                    'delete'      => 'Sil',
                    'mass-delete' => 'Toplu Sil',
                ],
            ],
    
            'create' => [
                'title'     => 'Şirket Adresi Oluştur',
                'general'   => 'Genel',
                'address1'  => 'Adres1',
                'address2'  => 'Adres2',
                'country'   => 'Ülke',
                'state'     => 'Durum',
                'city'      => 'Şehir',
                'post-code' => 'Posta Kodu',
                'phone'     => 'Telefon',
                'back-btn'  => 'Geri',
                'save-btn'  => 'Adresi Kaydet',
            ],
    
            'edit' => [
                'title'     => 'Şirket Adresini Düzenle',
                'general'   => 'Genel',
                'address1'  => 'Adres1',
                'address2'  => 'Adres2',
                'country'   => 'Ülke',
                'state'     => 'Durum',
                'city'      => 'Şehir',
                'post-code' => 'Posta Kodu',
                'phone'     => 'Telefon',
                'back-btn'  => 'Geri',
                'save-btn'  => 'Adresi Kaydet',
            ],
    
            'create-success'      => 'Başarılı: Şirket adresi başarıyla oluşturuldu.',
            'update-success'      => 'Başarılı: Şirket adresi başarıyla güncellendi.',
            'delete-success'      => 'Başarılı: :resource başarıyla silindi.',
            'delete-failed'       => 'Uyarı: :resource bilinmeyen nedenlerden dolayı silinemiyor.',
            'mass-delete-success' => 'Başarılı: Seçilen adres başarıyla silindi.',
        ],
    
        'system' => [
            'social-login'           => 'Sosyal Giriş',
            'facebook'               => 'Facebook Ayarları',
            'facebook-client-id'     => 'Facebook Müşteri Kimliği',
            'facebook-client-secret' => 'Facebook Müşteri Sırrı',
            'facebook-callback-url'  => 'Facebook Geri Çağrı URL\'si',
            'twitter'                => 'Twitter Ayarları',
            'twitter-client-id'      => 'Twitter Müşteri Kimliği',
            'twitter-client-secret'  => 'Twitter Müşteri Sırrı',
            'twitter-callback-url'   => 'Twitter Geri Çağrı URL\'si',
            'google'                 => 'Google Ayarları',
            'google-client-id'       => 'Google Müşteri Kimliği',
            'google-client-secret'   => 'Google Müşteri Sırrı',
            'google-callback-url'    => 'Google Geri Çağrı URL\'si',
            'linkedin'               => 'LinkedIn Ayarları',
            'linkedin-client-id'     => 'LinkedIn Müşteri Kimliği',
            'linkedin-client-secret' => 'LinkedIn Müşteri Sırrı',
            'linkedin-callback-url'  => 'LinkedIn Geri Çağrı URL\'si',
            'github'                 => 'GitHub Ayarları',
            'github-client-id'       => 'GitHub Müşteri Kimliği',
            'github-client-secret'   => 'GitHub Müşteri Sırrı',
            'github-callback-url'    => 'GitHub Geri Çağrı URL\'si',
            'email-credentials'      => 'E-posta Kimlik Bilgileri',
            'mail-driver'            => 'Posta sürücüsü',
            'mail-host'              => 'Posta sunucusu',
            'mail-port'              => 'Posta bağlantı noktası',
            'mail-username'          => 'Posta kullanıcı adı',
            'mail-password'          => 'Posta şifresi',
            'mail-encryption'        => 'Posta şifreleme',
        ],
    
        'tenant' => [
            'id'              => 'ID',
            'first-name'      => 'Ad',
            'last-name'       => 'Soyad',
            'email'           => 'E-posta',
            'skype'           => 'Skype',
            'c-name'          => 'Ad',
            'add-address'     => 'Adres Ekle',
            'country'         => 'Ülke',
            'city'            => 'Şehir',
            'address1'        => 'Adres 1',
            'address2'        => 'Adres 2',
            'address'         => 'Adres Listesi',
            'company'         => 'Kiracı',
            'profile'         => 'Profil',
            'update'          => 'Güncelle',
            'address-details' => 'Adres Detayları',
            'create-failed'   => 'Uyarı: :attribute bilinmeyen nedenlerden dolayı oluşturulamıyor.',
            'update-success'  => 'Başarılı: :resource başarıyla güncellendi.',
            'update-failed'   => 'Uyarı: :resource bilinmeyen nedenlerden dolayı güncellenemiyor.',
    
            'company-address' => [
                'add-address-title'    => 'Yeni Adres',
                'update-address-title' => 'Adresi Güncelle',
                'save-btn-title'       => 'Adresi Kaydet',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'Bir sipariş :order_id, :created_at tarihinde :placed_by tarafından yerleştirildi.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'Oops! Aradığınız sayfa tatilde gibi görünüyor. Aradığınızı bulamadık gibi görünüyor.',
            'title'       => '404 Sayfa Bulunamadı',
        ],

        '401' => [
            'description' => 'Oops! Bu sayfaya erişim izniniz yok gibi görünüyor. Görünüşe göre gerekli kimlik bilgileriniz eksik.',
            'title'       => '401 Yetkisiz',
        ],

        '403' => [
            'description' => 'Oops! Bu sayfa erişime kapalı. Görünüşe göre bu içeriği görüntülemek için gerekli izinlere sahip değilsiniz.',
            'title'       => '403 Yasak',
        ],

        '500' => [
            'description' => 'Oops! Bir şeyler yanlış gitti. Aradığınız sayfayı yüklemekte sorun yaşıyoruz gibi görünüyor.',
            'title'       => '500 İç Sunucu Hatası',
        ],

        '503' => [
            'description' => 'Oops! Geçici olarak bakım nedeniyle kapalıyız gibi görünüyor. Lütfen biraz sonra tekrar kontrol edin.',
            'title'       => '503 Hizmet Kullanılamıyor',
        ],
    ],
];
