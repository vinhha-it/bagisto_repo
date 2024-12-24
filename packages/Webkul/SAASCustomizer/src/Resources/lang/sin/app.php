<?php

return [
    'components' => [
        'layouts' => [
            'header' => [
                'app-version'   => 'සංස්කරණය : :version',
                'account-title' => 'ගිණුම',
                'logout'        => 'ඉවත් වන්න',
                'my-account'    => 'මගේ ගිණුම',
                'visit-shop'    => 'ගොඩනැගිලි නිර්මාණය',
            ],
    
            'sidebar' => [
                'tenants'          => 'තොරතුරු',
                'tenant-customers' => 'පාරිභෝගිකරුවන්',
                'tenant-products'  => 'නිෂ්පාදන',
                'tenant-orders'    => 'ඇණවුම්',
                'settings'         => 'සැකසුම්',
                'agents'           => 'නිලධාරීන්',
                'roles'            => 'භූමිකා',
                'locales'          => 'ස්ථාන',
                'currencies'       => 'මුදල්',
                'channels'         => 'චැනල්',
                'exchange-rates'   => 'වෙළඳ අනුපාත',
                'themes'           => 'විශේෂිත',
                'cms'              => 'සියළු',
                'configurations'   => 'වින්යාස කරන්න',
                'general'          => 'සාමාන්‍ය',
                'send-email'       => 'ඊමේල් යවන්න',
            ],
        ],
    ],

    'super' => [
        'acl' => [
            'tenants'        => 'තැන්නෙන්',
            'create'         => 'එකතු කරන්න',
            'edit'           => 'සංස්කරණය කරන්න',
            'delete'         => 'මකන්න',
            'cancel'         => 'අවලංගු කරන්න',
            'view'           => 'දර්ශනය කරන්න',
            'mass-delete'    => 'සම්පූර්ණ මකා දමන්න',
            'mass-update'    => 'සම්පූර්ණ යාවත්කාලීන කරන්න',
            'customers'      => 'පාරිභෝගිකයෝ',
            'products'       => 'නිෂ්පාදන',
            'orders'         => 'ඇනවුම්',
            'settings'       => 'සැකසුම්',
            'agents'         => 'නියෝජිත',
            'roles'          => 'භූමිකාවන්',
            'locales'        => 'ස්ථාන',
            'currencies'     => 'වැතිප්ලවය',
            'exchange-rates' => 'වෙනස් අනුපාත',
            'channels'       => 'චැනල්',
            'themes'         => 'තේමාවෙහි',
            'send-email'     => 'ඊමේල් යැවීම',
            'cms'            => 'කොන්දේසි මෙහෙයුම',
            'configuration'  => 'වින්යාසය',
            'download'       => 'බාගත කරන්න',
        ],
        
        'agents' => [
            'sessions' => [
                'title'                => 'විස්තර ලියාපදිංචි පරිපාලක පිළිබඳ',
                'email'                => 'විද්යුත් තැපෑල',
                'password'             => 'මුරපදය',
                'btn-submit'           => 'පිළිතුරු ලබා ගන්න',
                'forget-password-link' => 'මුරපදය අමතකපාර වෙමින්?',
                'submit-btn'           => 'පිළිතුරු ලබා ගන්න',
                'login-success'        => 'සාරාංශය: ඔබ සාර්ථකව ඇතුලු වී ඇත.',
                'login-error'          => 'කරුණාකර ඔබේ සත්කාරක විස්තර පරිශීලකයා පරීක්ෂා කරන්න සහ නැවත උත්සහ කරන්න.',
                'activate-warning'     => 'ඔබගේ ගිණුම තවම සක්‍රීය කර ඇත්තා නැත, කරුණාකර කළමනාකරණයා සම්බන්ධ විය යුතුය.',
            ],
        
            'forget-password' => [
                'create' => [
                    'page-title'      => 'මුරපදය අමතකපාර වන්න',
                    'title'           => 'මුරපදය ලැබීම',
                    'email'           => 'ලියාපදිංචි ඊමේල්',
                    'reset-link-sent' => 'මුරපදය යළි සකස් කළ ලදි',
                    'sign-in-link'    => 'සම්බන්ධ වීමට ආපසු පියවර ?',
                    'email-not-exist' => 'ඊමේල් නොපවතී',
                    'submit-btn'      => 'අවශ්‍යයි',
                ],
            ],
        
            'reset-password' => [
                'title'            => 'මුරපදය නැවත සකස් කිරීම',
                'back-link-title'  => 'සම්බන්ධ වීමට ආපසු පියවර ?',
                'confirm-password' => 'මුරපදය තහවුරු කරන්න',
                'email'            => 'ලියාපදිංචි ඊමේල්',
                'password'         => 'මුරපදය',
                'submit-btn'       => 'මුරපදය නැවත සකස් කරන්න',
            ],
        ],
        
        'tenants' => [
            'index' => [
                'title'        => 'තැන්නෙන් ලැයිස්තුව',
                'register-btn' => 'තැන්න් ලියාපදිංචි කරන්න',
        
                'create' => [
                    'title'             => 'තැන්න් නිර්මාණය කරන්න',
                    'first-name'        => 'පළමු නම',
                    'last-name'         => 'අවසන් නම',
                    'user-name'         => 'පරිශීලක නම',
                    'organization-name' => 'සංවිධානයේ නම',
                    'phone'             => 'දුරකථන',
                    'email'             => 'ඊමේල්',
                    'password'          => 'මුරපදය',
                    'confirm-password'  => 'මුරපදය තහවුරු කරන්න',
                    'save-btn'          => 'තැන්න් රක්ෂණය කරන්න',
                    'back-btn'          => 'ආපසු',
                ],
        
                'datagrid' => [
                    'id'                  => 'අංකය',
                    'user-name'           => 'පරිශීලක නම',
                    'organization'        => 'සංවිධානය',
                    'domain'              => 'ඩොමේන්',
                    'cname'               => 'Cname',
                    'status'              => 'තත්ත්වය',
                    'active'              => 'සක්‍රිය',
                    'disable'             => 'අක්‍රීය',
                    'view'                => 'දර්ශනය කරන්න',
                    'edit'                => 'තැන්න් සංස්කරණය කරන්න',
                    'delete'              => 'තැන්න් ඉවත් කරන්න',
                    'mass-delete'         => 'සම්පූර්ණ ඉවත් කරන්න',
                    'mass-delete-success' => 'තෝරාගත් තැන්න් සාර්ථකයින් ඉවත් කරන ලදි',
                ],
            ],
        
            'edit' => [
                'title'             => 'තැන්න් සංස්කරණය කරන්න',
                'first-name'        => 'පළමු නම',
                'last-name'         => 'අවසන් නම',
                'user-name'         => 'පරිශීලක නම',
                'cname'             => 'Cname',
                'organization-name' => 'සංවිධානයේ නම',
                'phone'             => 'දුරකථන',
                'status'            => 'තත්ත්වය',
                'email'             => 'ඊමේල්',
                'password'          => 'මුරපදය',
                'confirm-password'  => 'මුරපදය තහවුරු කරන්න',
                'save-btn'          => 'තැන්න් රක්ෂණය කරන්න',
                'back-btn'          => 'ආපසු',
                'general'           => 'සාමාන්‍ය',
                'settings'          => 'සැකසුම්',
            ],
        
            'view' => [
                'title'                        => 'තැන්නේ විශ්ලේෂණය',
                'heading'                      => 'තැන්න - :tenant_name',
                'email-address'                => 'ඊමේල් ලිපිනය',
                'phone'                        => 'දුරකථන',
                'domain-information'           => 'ඩොමේන් තොරතුරු',
                'mapped-domain'                => 'අනුරූප කර ඇති ඩොමේන්',
                'cname-information'            => 'cName තොරතුරු',
                'cname-entry'                  => 'cName ඇතුළත්වීම',
                'attribute-information'        => 'වර්ග තොරතුරු',
                'no-of-attributes'             => 'වර්ග ගණන',
                'attribute-family-information' => 'වර්ග පවුල් තොරතුරු',
                'no-of-attribute-families'     => 'වර්ග පවුල් ගණන',
                'product-information'          => 'නිෂ්පාදන තොරතුරු',
                'no-of-products'               => 'නිෂ්පාදන ගණන',
                'customer-information'         => 'පාරිභෝගික තොරතුරු',
                'no-of-customers'              => 'පාරිභෝගික ගණන',
                'customer-group-information'   => 'පාරිභෝගික කණ්ඩායම් තොරතුරු',
                'no-of-customer-groups'        => 'පාරිභෝගික කණ්ඩායම් ගණන',
                'category-information'         => 'ප්‍රවේශ තොරතුරු',
                'no-of-categories'             => 'ප්‍රවේශ ගණන',
                'addresses'                    => 'ලිපිනයේ ලැයිස්තුව (:count)',
                'empty-title'                  => 'තැන්න් ලියාපදිංචි කිරීමට',
            ],
        
            'create-success' => 'තැන්න් සාර්ථකව නිර්මාණය කරන ලදි',
            'delete-success' => 'තැන්න් සාර්ථකව මකන ලදි',
            'delete-failed'  => 'තැන්න් ඉවත් කිරීම අසාර්ථකයි',
            'product-copied' => 'නිෂ්පාදන පිටපත් කිරීම සාර්ථකයි',
            'update-success' => 'තැන්න් සාර්ථකව යාවත්කාලීන කරන ලදි',
        
            'customers' => [
                'index' => [
                    'title' => 'පාරිභෝගිකයින් ලැයිස්තුව',
        
                    'datagrid' => [
                        'id'             => 'අංකය',
                        'domain'         => 'ඩොමේන්',
                        'customer-name'  => 'පාරිභෝගික නම',
                        'email'          => 'ඊමේල්',
                        'customer-group' => 'පාරිභෝගික කණ්ඩායම',
                        'phone'          => 'දුරකථන',
                        'status'         => 'තත්ත්වය',
                        'active'         => 'සක්‍රිය',
                        'inactive'       => 'අක්රියයි',
                        'is-suspended'   => 'අත්හිටුවා ඇත',
                    ],
                ],
            ],
        
            'products' => [
                'index' => [
                    'title' => 'නිෂ්පාදනයෙන් ලැයිස්තුව',
        
                    'datagrid' => [
                        'id'               => 'අංකය',
                        'domain'           => 'ඩොමේන්',
                        'name'             => 'නම',
                        'sku'              => 'SKU',
                        'attribute-family' => 'වර්ග පවුල්',
                        'image'            => 'රූපය',
                        'price'            => 'මිල',
                        'qty'              => 'ප්‍රමාණය',
                        'status'           => 'තත්ත්වය',
                        'active'           => 'සක්‍රිය',
                        'inactive'         => 'අක්රියයි',
                        'category'         => 'ප්‍රවේශය',
                        'type'             => 'වර්ගය',
                    ],
                ],
            ],
        
            'orders' => [
                'index' => [
                    'title' => 'ඇනවුම් ලැයිස්තුව',
        
                    'datagrid' => [
                        'id'              => '#:id',
                        'order-id'        => 'ඇනවුමේ අංකය',
                        'domain'          => 'ඩොමේන්',
                        'sub-total'       => 'උප එකතුව',
                        'grand-total'     => 'සම්පූර්ණ එකතුව',
                        'order-date'      => 'ඇනවුම් දිනය',
                        'channel-name'    => 'චැනල් නම',
                        'status'          => 'තත්ත්වය',
                        'processing'      => 'සක්‍රිය කිරීම',
                        'completed'       => 'අවසන්',
                        'canceled'        => 'අවලංගු',
                        'closed'          => 'සක්‍රිය විරෝධී',
                        'pending'         => 'අරමුදල්',
                        'pending-payment' => 'අරමුදල් ගෙවීමට අනුමත',
                        'fraud'           => 'වලංගු',
                        'customer'        => 'පාරිභෝගික',
                        'email'           => 'ඊමේල්',
                        'location'        => 'ස්ථානය',
                        'images'          => 'පින්තූර',
                        'pay-by'          => 'ගෙවීම් කිරීමේ වීඩියෝව - ',
                        'pay-via'         => 'ගෙවීම් වෙනස් කිරීමේ වීඩියෝව',
                        'date'            => 'දිනය',
                    ],
                ],
            ],
        ],

        'settings' => [
            'agents' => [
                'index' => [
                    'title'        => 'නාමාවලියේ ලැයිස්තුව',
                    'register-btn' => 'නව නාමාවලියක් සාදන්න',
            
                    'create' => [
                        'title'             => 'නව නාමාවලියක් සාදන්න',
                        'first-name'        => 'මුල් නම',
                        'last-name'         => 'අගමැති නම',
                        'email'             => 'ඊමේල්',
                        'current-password'  => 'වත්මන් මුරපදය',
                        'password'          => 'මුරපදය',
                        'confirm-password'  => 'මුරපදය තහවුරු කරන්න',
                        'role'              => 'භූමිකාව',
                        'select'            => 'තෝරන්න',
                        'status'            => 'තත්ත්වය',
                        'save-btn'          => 'තත්ත්වය ඇතුලත් කරන්න',
                        'back-btn'          => 'ආපසු',
                        'upload-image-info' => 'පැතිකඩ රූපයක් උඩුගත කරන්න (110px X 110px) PNG හෝ JPG ආකාරයෙන්',
                    ],
            
                    'edit' => [
                        'title' => 'නාමාවලිය සංස්කරණය',
                    ],
            
                    'datagrid' => [
                        'id'      => 'අංකය',
                        'name'    => 'නම',
                        'email'   => 'ඊමේල්',
                        'role'    => 'භූමිකාව',
                        'status'  => 'තත්ත්වය',
                        'active'  => 'ක්‍රියාකාරී',
                        'disable' => 'අක්‍රිය කරන්න',
                        'actions' => 'ක්‍රියාවලිය',
                        'edit'    => 'සංස්කරණය',
                        'delete'  => 'මකන්න',
                    ],
                ],
            
                'create-success'             => 'සාර්ථකයෙහි: සූප්පර් අඩවියේ නාමාවලිය සාදන ලදි',
                'delete-success'             => 'අඩුම සාර්ථකව අයිතමය මකා දමන ලදි',
                'delete-failed'              => 'අඩුම අසාර්ථක විය',
                'cannot-change'              => 'අගනාපන්නාගේ :name වෙනස් කළ නොහැක',
                'product-copied'             => 'අගනාපන්න උපරිම සාර්ථකව පිටුවට පිටවී',
                'update-success'             => 'අගනාපන්න යාවත්කාලීනව සාර්ථකව ලබා දී',
                'invalid-password'           => 'ඔබ ඇතුලත් කරන පැරණි මුරපදය වලංගු නොවේ',
                'last-delete-error'          => 'අන්තර්ගතය: අවසන් සූප්පර් අඩවිය එකතු කළ යුතු දෙයක් ලෙස',
                'login-delete-error'         => 'අවවාදය: ඔබට ඔබේ පුරන්නාගේ ගිණුම මකා දැමීමට අමතක වීමට නොහැක.',
                'administrator-delete-error' => 'අවවාදය: ප්‍රධාන පරිපාලන පුරන්නාගේ පුරපද්දක් සඳහා අවශ්‍ය අගනාපන්නක් එකතු කළ යුතුය',
            ],
            
            'roles' => [
                'index' => [
                    'title'      => 'භූමිකාවන් ලැයිස්තුව',
                    'create-btn' => 'භූමිකාව සාදන්න',
            
                    'datagrid' => [
                        'id'              => 'අංකය',
                        'name'            => 'නම',
                        'permission-type' => 'අවසර වර්ගය',
                        'actions'         => 'ක්‍රියාවලිය',
                        'edit'            => 'සංස්කරණය',
                        'delete'          => 'මකන්න',
                    ],
                ],
            
                'create' => [
                    'access-control' => 'ප්‍රවේශ පාලනය',
                    'all'            => 'සියලුම',
                    'back-btn'       => 'ආපසු',
                    'custom'         => 'සැකසීම් අභියෝගය',
                    'description'    => 'විස්තරය',
                    'general'        => 'සාමාන්‍ය',
                    'name'           => 'නම',
                    'permissions'    => 'වගකීම්',
                    'save-btn'       => 'භූමිකාව සුරකින්න',
                    'title'          => 'භූමිකාව සාදන්න',
                ],
            
                'edit' => [
                    'access-control' => 'ප්‍රවේශ පාලනය',
                    'all'            => 'සියලුම',
                    'back-btn'       => 'ආපසු',
                    'custom'         => 'සැකසීම් අභියෝගය',
                    'description'    => 'විස්තරය',
                    'general'        => 'සාමාන්‍ය',
                    'name'           => 'නම',
                    'permissions'    => 'වගකීම්',
                    'save-btn'       => 'භූමිකාව සුරකින්න',
                    'title'          => 'භූමිකාව සංස්කරණය',
                ],
            
                'being-used'        => 'භූමිකාව ස්වාධීනව භාවිත කර ඇත',
                'last-delete-error' => 'අවසන් භූමිකාව මකා දමා නොමැත',
                'create-success'    => 'භූමිකාව සාර්ථකව සාදන ලදි',
                'delete-success'    => 'භූමිකාව සාර්ථකව මකා දමන ලදි',
                'delete-failed'     => 'භූමිකාව අසාර්ථක විය',
                'update-success'    => 'භූමිකාව යාවත්කාලීනව සාර්ථකව ලබා දී',
            ],
            
            'locales' => [
                'index' => [
                    'title'      => 'ප්‍රාදේශීය ලැයිස්තුව',
                    'create-btn' => 'ප්‍රාදේශීය ස්වයංක්‍රීයය සාදන්න',
            
                    'create' => [
                        'title'            => 'ප්‍රාදේශීය ස්වයංක්‍රීයය සාදන්න',
                        'code'             => 'කේතය',
                        'name'             => 'නම',
                        'direction'        => 'දිශාව',
                        'select-direction' => 'දිශාව තෝරන්න',
                        'text-ltr'         => 'වමේ සිට දකුණු විය',
                        'text-rtl'         => 'දකුණු සිට වමේ විය',
                        'locale-logo'      => 'ප්‍රාදේශීය ලෝගෝ',
                        'logo-size'        => 'රූපයේ වර්ගය 24px X 16px සහිතව විස්තර පරික්ෂා කරන්න',
                        'save-btn'         => 'ප්‍රාදේශීය ස්වයංක්‍රීයය සුරකින්න',
                    ],
            
                    'edit' => [
                        'title'     => 'ප්‍රාදේශීය ස්වයංක්‍රීයය සංස්කරණය',
                        'code'      => 'කේතය',
                        'name'      => 'නම',
                        'direction' => 'දිශාව',
                    ],
            
                    'datagrid' => [
                        'id'        => 'අංකය',
                        'code'      => 'කේතය',
                        'name'      => 'නම',
                        'direction' => 'දිශාව',
                        'text-ltr'  => 'වමේ සිට දකුණු විය',
                        'text-rtl'  => 'දකුණු සිට වමේ විය',
                        'actions'   => 'ක්‍රියාවලිය',
                        'edit'      => 'සංස්කරණය',
                        'delete'    => 'මකන්න',
                    ],
                ],
                
                'being-used'        => ':locale_name ප්‍රාදේශීය භාවිතා කරන ලද ප්‍රධාන ප්‍රාදේශීයයේ යාමට භාවිතා කරයි',
                'create-success'    => 'ප්‍රාදේශීයය සාර්ථකව සාදන ලදි.',
                'update-success'    => 'ප්‍රාදේශීයය යාවත්කාලීනව සාර්ථකව ලබා දී.',
                'delete-success'    => 'ප්‍රාදේශීයය ඉවත් කරන ලදි.',
                'delete-failed'     => 'ප්‍රාදේශීයය ඉවත් කළ නොහැක',
                'last-delete-error' => 'අවසන් සූප්පර් ප්‍රාදේශීයයක් වෙත විස්තරය අවශ්‍ය ලෙස අවසන් කළ යුතු යුතුය.',
            ],

            'currencies' => [
                'index' => [
                    'title'      => 'ව්‍යාපාරික ලැයිස්තුව',
                    'create-btn' => 'තනන්න මුදල්',
                    
                    'create' => [
                        'title'    => 'තනන්න මුදල්',
                        'code'     => 'කේතය',
                        'name'     => 'නම',
                        'symbol'   => 'සංක්රියානු',
                        'decimal'  => 'තිබිය',
                        'save-btn' => 'මුදල් සුරකින්න',
                    ],
            
                    'edit' => [
                        'title'    => 'සංස්කරණය කිරීම මුදල්',
                        'code'     => 'කේතය',
                        'name'     => 'නම',
                        'symbol'   => 'සංක්රියානු',
                        'decimal'  => 'තිබිය',
                        'save-btn' => 'මුදල් සුරකින්න',
                    ],
            
                    'datagrid' => [
                        'id'      => 'අංකය',
                        'code'    => 'කේතය',
                        'name'    => 'නම',
                        'actions' => 'ක්‍රියා',
                        'edit'    => 'සංස්කරණය',
                        'delete'  => 'මකන්න',
                    ],
                ],
            
                'create-success'      => 'ව්‍යාපාරය සාර්ථකව තනන්න විය.',
                'update-success'      => 'ව්‍යාපාරය සාර්ථකව යාවත්කාලීන කර ඇත.',
                'delete-success'      => 'ව්‍යාපාරය සාර්ථකව මකා ඇත.',
                'delete-failed'       => 'ව්‍යාපාරය මකා දමා ඇත',
                'last-delete-error'   => 'කොහේද අපේක්ෂාත්මක අඩවියෙන් එකතු කළ ලදි.',
                'mass-delete-success' => 'තෝරා ගන්නා ව්‍යාපාර සාර්ථකව මකා ඇත.',
            ],
            
            'exchange-rates' => [
                'index' => [
                    'title'        => 'මුල් තැපැල් තාරාව',
                    'create-btn'   => 'මුල් තැපැල් තාරාව තනන්න',
                    'update-rates' => 'තාරාව යාවත්කාලීන කරන්න',
            
                    'create' => [
                        'title'                  => 'මුල් තැපැල් තාරාව තනන්න',
                        'source-currency'        => 'මූලික ව්‍යාපාරය',
                        'target-currency'        => 'ඉලක්ක ව්‍යාපාරය',
                        'select-target-currency' => 'ඉලක්ක ව්‍යාපාරය තෝරන්න',
                        'rate'                   => 'හිමිකම',
                        'save-btn'               => 'තාරාව සුරකින්න',
                    ],
            
                    'edit' => [
                        'title'           => 'තාරාව සංස්කරණය කිරීම',
                        'source-currency' => 'මූලික ව්‍යාපාරය',
                        'target-currency' => 'ඉලක්ක ව්‍යාපාරය',
                        'rate'            => 'හිමිකම',
                        'save-btn'        => 'තාරාව සුරකින්න',
                    ],
            
                    'datagrid' => [
                        'id'            => 'අංකය',
                        'currency-name' => 'ව්‍යාපාරයේ නම',
                        'exchange-rate' => 'සංවාද',
                        'actions'       => 'ක්‍රියා',
                        'edit'          => 'සංස්කරණය',
                        'delete'        => 'මකන්න',
                    ],
                ],
                
                'create-success' => 'මුල් තැපැල් තාරාව සාර්ථකව තනන්න.',
                'update-success' => 'මුල් තැපැල් තාරාව සාර්ථකව යාවත්කාලීන කර ඇත.',
                'delete-success' => 'මුල් තැපැල් තාරාව සාර්ථකව මකා ඇත.',
                'delete-failed'  => 'මුල් තැපැල් තාරාව මකා දමා ඇත',
            ],
            
            'channels' => [
                'index' => [
                    'title' => 'චැනල්',
            
                    'datagrid' => [
                        'id'       => 'අංකය',
                        'code'     => 'කේතය',
                        'name'     => 'නම',
                        'hostname' => 'හොස්ට් නාමය',
                        'actions'  => 'ක්‍රියා',
                        'edit'     => 'සංස්කරණය',
                        'delete'   => 'මකන්න',
                    ],
                ],
            
                'edit' => [
                    'title'                  => 'චැනල් සංස්කරණය',
                    'back-btn'               => 'ආපසු',
                    'save-btn'               => 'චැනල් සුරකින්න',
                    'general'                => 'සාමාන්‍ය',
                    'code'                   => 'කේතය',
                    'name'                   => 'නම',
                    'description'            => 'විස්තරය',
                    'hostname'               => 'හොස්ට් නාමය',
                    'hostname-placeholder'   => 'https://www.example.com (අවසන් තොරතුරුක් අමතන්න.)',
                    'design'                 => 'ආකෘතිය',
                    'theme'                  => 'තේමාව',
                    'logo'                   => 'ලෝගෝ',
                    'logo-size'              => 'රූපයේ නිර්දේශය 192px X 50px වේ',
                    'favicon'                => 'ෆැවිකන්',
                    'favicon-size'           => 'රූපයේ නිර්දේශය 16px X 16px වේ',
                    'seo'                    => 'මුල් පිටු SEO',
                    'seo-title'              => 'මෙටා මාතෘ',
                    'seo-description'        => 'මෙටා විස්තර',
                    'seo-keywords'           => 'මෙටා නිලධාරි',
                    'currencies-and-locales' => 'ව්‍යාපාර සහ දේශීය',
                    'locales'                => 'දේශීය',
                    'default-locale'         => 'පෙරනිමි දේශීය',
                    'currencies'             => 'ව්‍යාපාර',
                    'default-currency'       => 'පෙරනිමි ව්‍යාපාරය',
                    'last-delete-error'      => 'කොහේද අපේක්ෂාත්මක චැනලයක් අවශ්‍ය වේ.',
                    'settings'               => 'සැකසුම්',
                    'status'                 => 'තත්ත්වය',
                    'update-success'         => 'චැනල් සාර්ථකව යාවත්කාලීන කර ඇත.',
                ],
            
                'update-success' => 'චැනල් සාර්ථකව යාවත්කාලීන කර ඇත.',
                'delete-success' => 'චැනල් සාර්ථකව මකා ඇත.',
                'delete-failed'  => 'චැනල් මකා දමා ඇත',
            ],

            'themes' => [
                'index' => [
                    'create-btn' => 'තේමාව තනන්න',
                    'title' => 'තේමාවන්',
            
                    'datagrid' => [
                        'active' => 'සක්‍රිය',
                        'channel_name' => 'චැනල නම',
                        'delete' => 'මකන්න',
                        'inactive' => 'අක්‍රියම්',
                        'id' => 'අංකය',
                        'name' => 'නම',
                        'status' => 'තත්ත්වය',
                        'sort-order' => 'සුරැකුම් වලංගු පළල',
                        'type' => 'වර්ගය',
                        'view' => 'දැක්ක',
                    ],
                ],
            
                'create' => [
                    'name' => 'නම',
                    'save-btn' => 'තේමාව සුරකින්න',
                    'sort-order' => 'සුරැකුම් වලංගු පළල',
                    'title' => 'තේමාව නිර්දේශය',
            
                    'type' => [
                        'footer-links' => 'පහළ ලින්ක්‍රි',
                        'image-carousel' => 'සිල්ඩර් කැරූසල්',
                        'product-carousel' => 'නිෂ්පාදන කැරූසල්',
                        'static-content' => 'නිර්මාණ කැලීම',
                        'services-content' => 'සේවාවන් නිර්මාණ',
                        'title' => 'වර්ගය',
                    ],
                ],
            
                'edit' => [
                    'add-image-btn' => 'පින්තූරය එකතු කරන්න',
                    'add-filter-btn' => 'ළදරුවන්ට එක් කරන්න',
                    'add-footer-link-btn' => 'පහළ ලින්ක්‍රියක් එක් කරන්න',
                    'add-link' => 'සබැඳිය එක් කරන්න',
                    'asc' => 'ආරෝහන',
                    'back' => 'ආපසු',
                    'category-carousel-description' => 'උද්දරයේ දර්ශකයෙන් බලාපොරොත්තු භූමිකාරියේ අලුත්වැඩියාවන් දක්වන්න.',
                    'category-carousel' => 'ප්‍රවේශ කැරූසල්',
                    'create-filter' => 'ළදරුවන්ට එක් කරන්න',
                    'css' => 'CSS',
                    'column' => 'තීරු',
                    'channels' => 'චැනල්',
                    'desc' => 'අස්වනු',
                    'delete' => 'මකන්න',
                    'edit' => 'සංස්කරණය',
                    'footer-title' => 'සිරස්',
                    'footer-link' => 'පහළ ලින්ක්‍රි',
                    'footer-link-form-title' => 'පහළ ලින්ක්‍රි',
                    'filter-title' => 'ළදරුවන්',
                    'filters' => 'ළදරු',
                    'footer-link-description' => 'අඩුකරන්න සහ තොරතුරු සැලසුම් සපයන ලකුණු වලින් පිටු ගමනක් කරන්න.',
                    'general' => 'සාමාන්‍ය',
                    'html' => 'HTML',
                    'image' => 'පින්තූරය',
                    'image-size' => 'පින්තූරයේ ප්‍රමාණය (1920px X 700px) විශාල යුතුය',
                    'image-title' => 'පින්තූරයේ මාතෘකාව',
                    'image-upload-message' => 'පින්තුරයේ පටුබිමෙන් (.jpeg, .jpg, .png, .webp, ..) පමණක් වලංගු.',
                    'key' => 'යතුර: :key',
                    'key-input' => 'යතුර',
                    'link' => 'සබැඳිය',
                    'limit' => 'සීමා',
                    'name' => 'නම',
                    'product-carousel' => 'නිෂ්පාදන කැරූසල්',
                    'product-carousel-description' => 'නිෂ්පාදනයන් ස්ථාපනය කිරීමේදී අභිරහස් සහ ස්ථාපන කැරූසල් භූමිකාරියේ පෙරදසුන් දක්වන්න.',
                    'path' => 'මාර්ගය',
                    'preview' => 'පෙරදසුන',
                    'slider' => 'ස්ලයිඩර්',
                    'static-content-description' => 'ඔබේ පොදු පිළිබඳ සිසුන් සඳහා කෙටියෙන් කෙටියෙන් සංවර්ධනය කරන්න.',
                    'static-content' => 'නිර්මාණ කැලීම',
                    'slider-description' => 'ස්ලයිඩර් අයිතම සුළු කිරීමේ භූමිකාරිය.',
                    'slider-required' => 'ස්ලයිඩර් ක්‍රියා කිරීම අවශ්‍ය වේ.',
                    'slider-add-btn' => 'ස්ලයිඩර් එකතු කරන්න',
                    'save-btn' => 'සුරකින්න',
                    'sort' => 'සුරැකුම්',
                    'sort-order' => 'සුරැකුම් වලංගු පළල',
                    'status' => 'තත්ත්වය',
                    'slider-image' => 'ස්ලයිඩර් පින්තූරය',
                    'select' => 'තෝරන්න',
                    'title' => 'තේමාව සංස්කරණය',
                    'update-slider' => 'ස්ලයිඩර් යාවත්කාලීන කරන්න',
                    'url' => 'URL',
                    'value-input' => 'අගය',
                    'value' => 'අගය: :value',
            
                    'services-content' => [
                        'add-btn' => 'සේවාවන් එකතු කරන්න',
                        'channels' => 'චැනල්',
                        'delete' => 'මකන්න',
                        'description' => 'විස්තර',
                        'general' => 'සාමාන්‍ය',
                        'name' => 'නම',
                        'save-btn' => 'සුරකින්න',
                        'service-icon' => 'සේවා අයිකනය',
                        'service-icon-class' => 'සේවා අයිකන පටුල',
                        'service-info' => 'සේවා අයිකන භූමිකාවේ සංස්කරණය.',
                        'services' => 'සේවාවන්',
                        'sort-order' => 'සුරැකුම් වලංගු පළල',
                        'status' => 'තත්ත්වය',
                        'title' => 'සියලුම සේවා සංස්කරණයන්',
                        'update-service' => 'සේවාවන් යාවත්කාලීන කරන්න',
                    ],
                ],
            
                'create-success' => 'තේමාව සාර්ථකව නිර්මාණය වී ඇත',
                'delete-success' => 'තේමාව ඉවත් කරන ලදි',
                'update-success' => 'තේමාව සාර්ථකව යාවත්කාලීන කරන ලදි',
                'delete-failed'  => 'තේමා අන්තර්ගතය මකා දැමීමේදී දෝෂයක් ඇති විය.',
            ],

            'email' => [
                'create' => [
                    'send-btn'                  => 'ඊමේල් යවන්න',
                    'back-btn'                  => 'ආපසු',
                    'title'                     => 'ඊමේල් යවන්න',
                    'general'                   => 'සාමාන්‍ය',
                    'body'                      => 'බොඩිය',
                    'subject'                   => 'විෂය',
                    'dear'                      => 'ආයුබෝවන් :agent_name',
                    'agent-registration'        => 'සාස් අගෙන් ලියාපදිංචි විය යුතුය',
                    'summary'                   => 'ඔබගේ ගිණුම සාදන ලදි. ඔබගේ ගිණුම් විස්තරයන් පහත දැක්වෙයි:',
                    'saas-url'                  => 'ඩොමේන්',
                    'email'                     => 'ඊමේල්',
                    'password'                  => 'මුරපදය',
                    'sign-in'                   => 'ලියාපදිංචි වන්න',
                    'thanks'                    => 'ඔබට ස්තූතියි!',
                    'send-email-to-all-tenants' => 'සියලු තැන්පතුවන්ට ඊමේල් යවන්න',
                ],
                
                'send-success' => 'ඊමේල් සාර්ථකව යවන ලදි.',
            ],
        ],

        'cms' => [
            'index' => [
                'title'      => 'CMS පිටුව ලැයිස්තුව',
                'create-btn' => 'පිටුව නිර්මාණය',
        
                'datagrid' => [
                    'id'                  => 'හැඳුනුම්පත් අංකය',
                    'page-title'          => 'පිටුවේ මාතෘකාව',
                    'url-key'             => 'URL යතුර',
                    'status'              => 'තත්ත්වය',
                    'active'              => 'සක්‍රිය',
                    'disable'             => 'අක්‍රියයි',
                    'edit'                => 'පිටුව වෙනස් කිරීම',
                    'delete'              => 'පිටුව ඉවත් කිරීම',
                    'mass-delete'         => 'මාස් ඉවත් කිරීම',
                    'mass-delete-success' => 'තෝරාගත් ප්‍රමාණවත් Cms පිටු ඉවත් කරන ලදි',
                ],
            ],
        
            'create' => [
                'title'            => 'Cms පිටුව නිර්මාණය',
                'first-name'       => 'මුල් නම',
                'general'          => 'සාමාන්‍ය',
                'page-title'       => 'මාතෘකාව',
                'channels'         => 'චැනල්',
                'content'          => 'අන්තර්ගතය',
                'meta-keywords'    => 'මෙටා යතුරු',
                'meta-description' => 'මෙටා විස්තරය',
                'meta-title'       => 'මෙටා මාතෘකාව',
                'seo'              => 'සියළු',
                'url-key'          => 'URL යතුර',
                'description'      => 'විස්තර',
                'save-btn'         => 'Cms පිටු සුරකින්න',
                'back-btn'         => 'ආපසු',
            ],
        
            'edit' => [
                'title'            => 'පිටුව සංස්කරණය කිරීම',
                'preview-btn'      => 'පිටුව පෙරදසුන',
                'save-btn'         => 'පිටුව සුරකින්න',
                'general'          => 'සාමාන්‍ය',
                'page-title'       => 'පිටුවේ මාතෘකාව',
                'back-btn'         => 'ආපසු',
                'channels'         => 'චැනල්',
                'content'          => 'අන්තර්ගතය',
                'seo'              => 'සියළු',
                'meta-keywords'    => 'මෙටා යතුරු',
                'meta-description' => 'මෙටා විස්තරය',
                'meta-title'       => 'මෙටා මාතෘකාව',
                'url-key'          => 'URL යතුර',
                'description'      => 'විස්තර',
            ],
        
            'create-success' => 'CMS සාර්ථකයි.',
            'delete-success' => 'CMS මකා දමා ඇත.',
            'update-success' => 'CMS සාර්ථකයි.',
            'no-resource'    => 'සම්පූර්ණයි නැත.',
        ],
        
        'configuration' => [
            'index' => [
                'delete'                       => 'මකන්න',
                'enable-at-least-one-shipping' => 'අනුමත ලෙස එකක් නොමැති හැකිය.',
                'enable-at-least-one-payment'  => 'අනුමත ලෙස එකක් නොමැති හැකිය.',
                'save-btn'                     => 'වින්‍යාස සුරකින්න',
                'save-message'                 => 'සාර්ථකයි: සූප්පර් අඩවි පිටුවේ වින්‍යාසය සුරකින්න ලදි.',
                'title'                        => 'වින්‍යාසය',
        
                'general' => [
                    'info'  => 'පුවරු සහ ඊමේල් විස්තර කළ හැකිය',
                    'title' => 'සාමාන්‍ය',
        
                    'design' => [
                        'info'  => 'ලොගෝ සහ ෆැවිකන් අයිකනය සුදුසු දැක්මෙන් සකසන්න.',
                        'title' => 'ආකෘතිය',
        
                        'super' => [
                            'info'          => 'සූප්පර් පරිපාලක ලෙස බහු විහිදුන් හෝ උපකාරියා පද්ධති සහිත පිටුවක් හෝ ව්‍යාප්තියක් නම්, විස්තරාත්මක කිහිපයක් හෝ අභියාගයක් නම්.',
                            'admin-logo'    => 'පප්පාලක ලෝගෝ',
                            'logo-image'    => 'ලෝගෝ රූපය',
                            'favicon-image' => 'ෆැවිකන් රූපය',
                        ],
                    ],
        
                    'agent' => [
                        'info'  => 'සූප්පර් පරිපාලකයාගේ විද්‍යුත් ලිපිනය සැකසීමට ඊමේල් ලිපිනය සකසන්න.',
                        'title' => 'සූප්පර් නිර්දේශය',
        
                        'super' => [
                            'info'          => 'සූප්පර් පරිපාලකයාගේ ඊමේල් ලිපිනයට ඊමේල් දැනුම් ලබා ගැනීමට ඊමේල් සොයා ගැනීම',
                            'email-address' => 'ඊමේල් ලිපිනය',
                        ],

                        'social-connect' => [
                            'title'    => 'සමාජ සම්බන්ධය',
                            'info'     => 'සමාජ මාධ්‍ය ප්‍රවේශ රැසක්, කැමති ලෙස, සහාය හා ප්‍රසිද්ධ කරන්නේ ඔබේ ප්‍රසිද්ධය මත සංවාද, ක්‍රියාත්මක සහයත් සහිත සම්බන්ධ හා ප්‍රගතිය භාවිතයක් නොමැති අතර, ඔබේ සැලසුම් පරිශීලකයින් සම්බන්ධයෙන් නිර්දේශ සහ ප්‍රගතිය පත් කිරීමේ අවස්ථාවලදී සිදු වේ.',
                            'facebook' => 'ෆේස්බුක්',
                            'twitter'  => 'ට්විටර්',
                            'linkedin' => 'ලින්ක්ලීන්',
                        ],
                    ],
        
                    'content' => [
                        'info'   => 'සැපයුම් ලියාපදිංචි වීමේ හා පිළිතුරු සඳහා හෙද සහ පහළ තොරතුරු සකසන්න.',
                        'title'  => 'සංවර්ධනය',
        
                        'footer' => [
                            'info'           => 'සියලු පහළ පිළිතුරු සඳහා පහළ පිළිතුරු සකසන්න',
                            'title'          => 'පහළ පිළිතුරු',
                            'footer-content' => 'පහළ පිළිතුරු පාඨකය',
                            'footer-toggle'  => 'පහළ පිළිතුරු ප්‍රකාශකරන්න',
                        ],
                    ],
                ],
        
                'sales' => [
                    'info'  => 'විකුණුම්, නීති, සහ ගෙවීම් ක්‍රියාවලිය කළ හැකිය',
                    'title' => 'විකුණුම්',
        
                    'shipping-methods' => [
                        'info'  => 'වෙළෙන්ද විස්තර සකසන්න',
                        'title' => 'වෙළෙන්ද ක්‍රියා කීපයන්',
                    ],
        
                    'payment-methods' => [
                        'info'  => 'ගෙවීම් ක්‍රියාවලිය සඳහා ගෙවීම් ක්‍රියා කීපයන්',
                        'title' => 'ගෙවීම් ක්‍රියා කීපයන්',
                    ],
                ],
            ],
        
            'enable-at-least-one-shipping' => 'අනුමත ලෙස එකක් නොමැති හැකිය.',
            'enable-at-least-one-payment'  => 'අනුමත ලෙස එකක් නොමැති හැකිය.',
            'save-message'                 => 'සාර්ථකයි: සූප්පර් අඩවි වින්‍යාසය සුරකින්න ලදි.',
        ],
    ],

    'tenant' => [
        'layouts' => [
            'header' => [
                'register-btn' => 'ක්ෂණික ස්ථානය ලියාපදිංචි කරන්න',
            ],
    
            'footer' => [
                'footer-text'     => '© වර්කල් මෘදුකාංග 2010 - 2023, වෙබ්කල් ලේඛනාව (රාජ්‍ය වෙබ් ලේඛනාවකි). සියලුම අටක් රැකියා ඇත.',
                'connect-with-us' => 'අප සමඟ සම්බන්ධ වන්න',
                'text-locale'     => 'ප්‍රභුද්ධ පෙද්දිය',
                'text-currency'   => 'මුදල් දත්ත',
            ],
        ],
    
        'registration' => [
            'merchant-auth'       => 'ගැනුම්කරු ලියාපදිංචි කිරීම',
            'step-1'              => 'පියවර 1',
            'auth-cred'           => 'සත්කාරක හැඳුනුම් පහසුකම්',
            'email'               => 'ඊමේල්',
            'phone'               => 'දුරකථන',
            'username'            => 'පරිශීලක නාමය',
            'password'            => 'මුරපදය',
            'cpassword'           => 'මුරපදය තහවුරු කරන්න',
            'continue'            => 'පවතී',
            'step-2'              => 'පියවර 2',
            'personal'            => 'පෞද්ගලික විස්තර',
            'first-name'          => 'මුල් නම',
            'last-name'           => 'අග',
            'step-3'              => 'පියවර 3',
            'org-details'         => 'සංවිධාන විස්තර',
            'org-name'            => 'සංවිධාන නම',
            'company-activated'   => 'සාරාංශය: මෙම ව්‍යාපාරය සාර්ථකව සක්‍රීය කරන ලදි.',
            'company-deactivated' => 'සාර්ථකව: ව්‍යාපාරය අක්‍රිය කරන ලදි.',
            'company-updated'     => 'සාර්ථකව: ව්‍යාපාරය සාර්ථකව යාවත්කාලීන කරන ලදි.',
            'something-wrong'     => 'ඇඟේල්: දෝෂයක් සිදු විය.',
            'store-created'       => 'සාර්ථකයි: ස්තූතියින් සාදන ලදි.',
            'something-wrong-1'   => 'ඇඟේල්: දෝෂයක් සිදු විය, කරුණාකර පසුව නැවත උත්සාහ කරන්න.',
            'content'             => 'විකුණන්නේ නිර්දේශිතව ස්ථිර කිරීමෙන් සහාය විය හැකියි. ඔබට ලොකු ස්ථානයක් ලියාපදිංචි කර නොමැති වේවා ප්‍රමුඛතාවය මත ඇතිවිය හැකිය, සේවාදායක සහිත ආකාරය සම්බන්ධව සිටින්න. ඔබට නව උපාංගය ලියාපදිංචි වී හැකියාවක් හෝ විශ්වාස වීම ස්ථිර කිරීමක් පහසුකම් සහ ස්ථාපනය කිරීමක් සිදු විය හැකිය.',
            
            'right-panel' => [
                'heading'    => 'ගෙවීම් ගිණුම සැලසුම් කිරීම ක්‍රියාත්මක කිරීමක්',
                'para'       => 'වින්‍යාසයට සැකසුම් මත අමතක කිරීම පහසුකම්',
                'step-one'   => 'ඊමේල්, මුරපදය සහ මුරපදය තහවුරු කිරීම හායිහා සත්කාරක හැඳුනුම් ලබාගැනීමට ඇති සත්කාරක ලොගින් යුතු තැන්වල ඇති සත්කාරක හැඳුනුම් ඇතුළත් කිරීම',
                'step-two'   => 'මුල් නම, අග සහ දුරකථන අංකය විසින් පෞද්ගලික විස්තර ඇතුළත් කිරීම',
                'step-three' => 'පරිශීලක නම, සංවිධාන නම ඇතුළත් කිරීම',
            ]
        ],
    
        'custom-errors' => [
            'channel-creating'                  => 'ඇඟේල්: වැඩි සහිතව එක් කරන්න අනාගතයේ නොමැත',
            'channel-hostname'                  => 'ඇඟේල්: ඔබගේ තොරතුරුකම වෙනස් කිරීම සඳහා කරුණාකර ඇඩ්මින් සම්බන්ධ කරන්න',
            'same-domain'                       => 'ඇඟේල්: සමාන වසංගත වෙනස් පවතින අයිතියට බෙදා ගැනීමට නොහැක',
            'block-message'                     => 'ඇඟේල්: ඔබ මේ ක්ෂේත්‍රය නොපෙනෙනවාද, එය නිවේදනය කිරීම සඳහා අපට අමතන්න, අප ඔබගේ ගැටළුව සම්බන්ධ සුළං ලබාගැනීමට 24x7 සලකා දමන්න.',
            'blocked'                           => 'අසම්පාදනය කළ යුතුය',
            'illegal-action'                    => 'ඇඟේල්: ඔබ අන්තර්ජාලය වෙතින් අන්තර්ජාල ක්රියාත්මකයක් පැවැත්වීමකි',
            'domain-message'                    => 'ඇඟේල්: ඔබ වෙනත් <b>:domain</b> සහිත දුරකතනයක් ලැබේද?',
            'domain-desc'                       => '<b>:domain</b> සඳහා ගිනුමට ලියාපදිංචි වීම සදහා ඔබට අවශ්‍ය නව ගිනුමක් සාදන්නීය.',
            'illegal-message'                   => 'ඇඟේල්: ඔබ පාලනය කරන ක්රියාව අනුව අන්තර්ජාල පරිපාලක විසින් අක්‍රිය කරන ලදි, කරුණාකර ඔබේ අන්තර්ජාලයේ තැපැල් මෙහෙයුම පිවිසෙන්න.',
            'locale-creation'                   => 'ඇඟේල්: ඉංග්‍රීසියෙන් වර්ගයක් හෝ වෙනත් වර්ගයක් නිර්මාණය කිරීමට ඉඩ දෙන්නෙමු.',
            'locale-delete'                     => 'ඇඟේල්: වර්ගයක් ඉවත් කිරීමට නොහැක.',
            'cannot-delete-default'             => 'ඇඟේල්: පෙරනිමි චැනලය මකා දැමීමට නොහැක.',
            'tenant-blocked'                    => 'අයිතිය අසම්පාදනය කර ඇත',
            'domain-not-found'                  => 'ඇඟේල්: දුරකතනය හරහා නැත.',
            'company-blocked-by-administrator'  => 'මෙම සේවාදායකය අසම්පාදනය කර ඇත',
            'not-allowed-to-visit-this-section' => 'ඇඟේල්: ඔබට මෙම කොටස භාවිතා කිරීමට ඉඩ හිත නොහැක.',
            'auth'                              => 'ඇඟේල්: සත්කාරක දෝෂය!',
        ],
    
        'emails' => [
            'new-company-register-agent' => [
                'subject'    => 'නව ව්‍යාපාරය ලියාපදිංචි කර ඇත',
                'first-name' => 'මුල් නම',
                'last-name'  => 'අග',
                'email'      => 'ඊමේල්',
                'name'       => 'නම',
                'username'   => 'පරිශීලක නාමය',
                'domain'     => 'අංශය',
            ],
    
            'new-company-register-tenant' => [
                'subject'    => 'නව ව්‍යාපාරය සාර්ථකව ලියාපදිංචි වීම',
                'dear'       => 'ආයුබෝවන් :tenant_name',
                'greeting'   => 'ස්වයංක්‍රීයම සහ ඔබගේ ලියාපදිංචියට ස්තුතියි!',
                'summary'    => 'ඔබගේ ගිනුම දැනට සාදන ලද්දේ සාර්ථකවම ලබා ගත හැකිය යුතුයි සහ ඔබට ඔබේ ඊමේල් ලැයිස්තුවක් සහ මුරපදය හෝ නිල හයිපනය සහ වෙළඳ නාමයේම ඔබේ ගිනුමේ තෝන දෙනු ඇත. ප්‍රවේශ සඳහා ලොව වියදම්, විකුණන්න, මිලදී, පාරිභෝගි සහ දිනකට පැමිණිය හැකිය.',
                'thanks'     => 'ජය හමුවේ!',
                'visit-shop' => 'සාදන ලදි',
            ],
        ],
    ],

    'admin' => [
        'tenant-profile' => [
            'edit-title'     => 'වෙනස් කරන්න ව්‍යාපෘතියේ විස්තර',
            'first-name'     => 'මුල් නම',
            'last-name'      => 'අවසාන නම',
            'email'          => 'ඊමේල්',
            'skype'          => 'ස්කයිප්',
            'cname'          => 'සී නේම්',
            'phone'          => 'දුරකථන',
            'general'        => 'සාමාන්‍ය',
            'back-btn'       => 'ආපසු',
            'save-btn'       => 'සුරකින්න',
            'update-success' => 'සාර්ථකයි: :resource සාර්ථකව යාවත්කාලීන කරන ලදි.',
            'update-failed'  => 'අනුමත හේතුවක් හෝ අගයක් හුරුම් කිරීමක් හෝ ක්‍රියාත්මක නොවේ: :resource වර්තමානය සාර්ථකව යාවත්කාලීන කරන්න නොහැක.',
        ],
    
        'tenant-address' => [
            'index' => [
                'title'      => 'ව්‍යාපෘතියේ ලිපිනය ලැයිස්තුව',
                'create-btn' => 'ලිපිනය එකතු කරන්න',
    
                'datagrid' => [
                    'id'          => 'අංකය',
                    'address1'    => 'ලිපිනය 1',
                    'address2'    => 'ලිපිනය 2',
                    'city'        => 'නගරය',
                    'country'     => 'රාජ්‍යය',
                    'edit'        => 'සංස්කරණය',
                    'delete'      => 'මකා දමන්න',
                    'mass-delete' => 'බහු මකා දමන්න',
                ],
            ],
    
            'create' => [
                'title'     => 'ව්‍යාපෘතියේ ලිපිනය එකතු කරන්න',
                'general'   => 'සාමාන්‍ය',
                'address1'  => 'ලිපිනය 1',
                'address2'  => 'ලිපිනය 2',
                'country'   => 'රාජ්‍යය',
                'state'     => 'රාජ්‍ය රෝග',
                'city'      => 'නගරය',
                'post-code' => 'තැපැල් අංකය',
                'phone'     => 'දුරකථන',
                'back-btn'  => 'ආපසු',
                'save-btn'  => 'ලිපිනය සුරකින්න',
            ],
    
            'edit' => [
                'title'     => 'ව්‍යාපෘතියේ ලිපිනය සංස්කරණය කිරීම',
                'general'   => 'සාමාන්‍ය',
                'address1'  => 'ලිපිනය 1',
                'address2'  => 'ලිපිනය 2',
                'country'   => 'රාජ්‍යය',
                'state'     => 'රාජ්‍ය රෝග',
                'city'      => 'නගරය',
                'post-code' => 'තැපැල් අංකය',
                'phone'     => 'දුරකථන',
                'back-btn'  => 'ආපසු',
                'save-btn'  => 'ලිපිනය සුරකින්න',
            ],
    
            'create-success'      => 'සාර්ථකයි: ව්‍යාපෘතියේ ලිපිනය සාර්ථකව එකතු කරන ලදි.',
            'update-success'      => 'සාර්ථකයි: ව්‍යාපෘතියේ ලිපිනය සාර්ථකව යාවත්කාලීන කරන ලදි.',
            'delete-success'      => 'සාර්ථකයි: :resource සාර්ථකව මකා දමන ලදි.',
            'delete-failed'       => 'අනුමත හේතුවක් හෝ අගයක් හුරුම් කිරීමක් හෝ ක්‍රියාත්මක නොවේ: :resource වර්තමානය සාර්ථකව මකා දමන ලදි.',
            'mass-delete-success' => 'සාර්ථකයි: තෝරාගත් ලිපිනයන් සාර්ථකව මකා දමන ලදි.',
        ],
    
        'system' => [
            'social-login'           => 'සමාජ පිවිසුම',
            'facebook'               => 'ෆේස්බුක් සැකසුම්',
            'facebook-client-id'     => 'ෆේස්බුක් ජාල අංකය',
            'facebook-client-secret' => 'ෆේස්බුක් ජාල රහස් රහස්',
            'facebook-callback-url'  => 'ෆේස්බුක් ආපසු URL',
            'twitter'                => 'ට්විටර් සැකසුම්',
            'twitter-client-id'      => 'ට්විටර් ජාල අංකය',
            'twitter-client-secret'  => 'ට්විටර් ජාල රහස් රහස්',
            'twitter-callback-url'   => 'ට්විටර් ආපසු URL',
            'google'                 => 'ගූගල් සැකසුම්',
            'google-client-id'       => 'ගූගල් ජාල අංකය',
            'google-client-secret'   => 'ගූගල් ජාල රහස් රහස්',
            'google-callback-url'    => 'ගූගල් ආපසු URL',
            'linkedin'               => 'ලින්කයින් සැකසුම්',
            'linkedin-client-id'     => 'ලින්කයින් ජාල අංකය',
            'linkedin-client-secret' => 'ලින්කයින් ජාල රහස් රහස්',
            'linkedin-callback-url'  => 'ලින්කයින් ආපසු URL',
            'github'                 => 'ගිටුවාබ් සැකසුම්',
            'github-client-id'       => 'ගිටුවාබ් ජාල අංකය',
            'github-client-secret'   => 'ගිටුවාබ් ජාල රහස් රහස්',
            'github-callback-url'    => 'ගිටුවාබ් ආපසු URL',
            'email-credentials'      => 'සැපයුම් ලත් වත්කම්',
            'mail-driver'            => 'තැපැල් සැපයක්',
            'mail-host'              => 'තැපැල් ධාවකය',
            'mail-port'              => 'තැපැල් තොට',
            'mail-username'          => 'තැපැල් පරිශීලක නාමය',
            'mail-password'          => 'තැපැල් මුරපදය',
            'mail-encryption'        => 'තැපැල් සංක්‍රමණය',
        ],
        
        'tenant' => [
            'id'              => 'අංකය',
            'first-name'      => 'මුල් නම',
            'last-name'       => 'අවසාන නම',
            'email'           => 'ඊමේල්',
            'skype'           => 'ස්කයිප්',
            'c-name'          => 'සී නේම්',
            'add-address'     => 'ලිපිනය එක් කරන්න',
            'country'         => 'රාජ්‍යය',
            'city'            => 'නගරය',
            'address1'        => 'ලිපිනය 1',
            'address2'        => 'ලිපිනය 2',
            'address'         => 'ලිපිනය ලැයිස්තුව',
            'company'         => 'ව්‍යාපෘතිය',
            'profile'         => 'පැතිකඩ',
            'update'          => 'යාවත්කාලීන කරන්න',
            'address-details' => 'ලිපිනය විස්තර',
            'create-failed'   => 'අනුමත හේතුවක් හෝ අගයක් හුරුම් කිරීමක් හෝ ක්‍රියාත්මක නොවේ: :attribute හි නොවේ හෝ එබීමේ හෝ ප්‍රතිව්යාංගයේ නොවේ.',
            'update-success'  => 'සාර්ථකයි: :resource සාර්ථකව යාවත්කාලීන කරන ලදි.',
            'update-failed'   => 'අනුමත හේතුවක් හෝ අගයක් හුරුම් කිරීමක් හෝ ක්‍රියාත්මක නොවේ: :resource වර්තමානය සාර්ථකව යාවත්කාලීන කරන ලදි.',
            
            'company-address' => [
                'add-address-title'    => 'නව ලිපිනය',
                'update-address-title' => 'ලිපිනය යාවත්කාලීන කරන්න',
                'save-btn-title'       => 'ලිපිනය සුරකින්න',
            ],
        ],
    ],
    
    'mail' => [
        'order' => [
            'greeting-admin' => 'අනුමැතිය :order_id වෙනුවෙන් :placed_by වෙත දැනුම් දියුණු කරන ලදි :created_at.',
        ],
    ],

    'errors' => [
        '404' => [
            'description' => 'Oops! ඔබ සොයාගත් පිටුව නොමැත. ඔබගේ සෙවුම් ප්‍රමාණය හමුවුණේ නැති බව අපට දැනුම් දියුණු කළේ නැත.',
            'title'       => '404 පිටුව සොයාගත නොහැක',
        ],

        '401' => [
            'description' => 'Oops! ඔබට මෙම පිටුවට පිවිසුමක් නොලැබේ. ඔබට අවශ්‍ය හැකි හැකිත්වීම් නොමැති බව අපට දැනුම් දියුණු කළේ නැත.',
            'title'       => '401 අවසරයක් නොලබා දැමීම',
        ],

        '403' => [
            'description' => 'Oops! මෙම පිටුව අසම්පාදනය කර ඇත. ඔබට අවශ්‍ය අවසරයන්ට මෙම අන්තර්ජාලය බැලීමේ අවශ්‍යතාවය නොමැති බව අපට දැනුම් දියුණු කළේ නැත.',
            'title'       => '403 අසම්පාදනය කර ඇත',
        ],

        '500' => [
            'description' => 'Oops! දෝෂයක් සිදු විය. ඔබගේ සෙවුම් පිටුව පැවැත්මක් සිදු වී ඇති බව අපට දැනුම් දියුණු කළේ නැත.',
            'title'       => '500 අභියෝග සේවාදායකයේ දෝෂයක්',
        ],

        '503' => [
            'description' => 'Oops! අපට සේවාදායකයේ අවසානයක් සම්බන්ධව නොවේ. කරුණාකර කිසිදු කාලයක් පසුව පිටුවක් පරිවර්තනය කරන්න.',
            'title'       => '503 සේවා නොලබා දැමීමේ අපට සුදුසුකම් නොමැත',
        ],
    ],
];
