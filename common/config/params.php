<?php
$notification_entity = require 'notification_entity_type.php';
$config = parse_ini_file(__DIR__ . '/../../configuration.ini') ;
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
    'bsVersion' => '4.x', // this will set globally `bsVersion` to Bootstrap 4.x for all Krajee Extensions
    'mdm.admin.configs' => [
        'advanced' => [
            'app-backend' => [
                '@common/config/main.php',
                '@common/config/main-local.php',
                '@backend/config/main.php',
                '@backend/config/main-local.php',
            ],
            'app-frontend' => [
                '@common/config/main.php',
                '@common/config/main-local.php',
                '@frontend/config/main.php',
                '@frontend/config/main-local.php',
            ]
        ],
    ],
    'notification.entity' => $notification_entity,
    'pusher' => [
        'app_id' => $config['app_id'],
        'key' => $config['key'],
        'secret' => $config['secret'],
        'cluster' => $config['cluster'],
    ]
];
