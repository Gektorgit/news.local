<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,

    'fileManager'                   => [
        'storagePath'         => dirname(dirname(__DIR__)).'/frontend/web/storage',
        'storageUrl'          => 'http://news.local/storage/',
        'baseValidationRules' => [
            'file',
            'maxFiles' => 1,
            'maxSize'  => 1024 * 1024,
        ],
        'attributeName'       => 'file',
    ],
];
