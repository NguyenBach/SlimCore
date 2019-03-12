<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/core/settings.php';
$app = new \Slim\App($settings);

//Set up Error Handler
require __DIR__ . '/../src/core/error_handler.php';

// Set up dependencies
require __DIR__ . '/../src/core/dependencies.php';

// Register middleware
require __DIR__ . '/../src/core/middleware.php';

// Register routes
require __DIR__ . '/../src/core/routes.php';

//Register databases
require __DIR__ . '/../src/core/database.php';

// Run app
$app->run();
