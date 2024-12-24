
<?php

return [
    'superadmins' => [
        'provider' => 'superadmins',
        'table'    => 'super_admin_password_resets',
        'expire'   => 60,
        'throttle' => 60,
    ],
];