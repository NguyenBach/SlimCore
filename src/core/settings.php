<?php
$defaultSettings = [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'lich_cat_nhat',
            'username' => 'admin',
            'password' => 'quangbach1',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]
    ],
];

$customSettings = require __DIR__ . '/../app/settings.php';

$settings = array_merge($defaultSettings['settings'], $customSettings['settings']);

return [
    'settings' => $settings
];