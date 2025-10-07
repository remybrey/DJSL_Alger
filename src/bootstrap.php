<?php

declare(strict_types=1);

$baseDir = dirname(__DIR__);

// Simple PSR-4 like autoloader for the src directory
spl_autoload_register(static function (string $class) use ($baseDir): void {
    $prefix = 'App\\';
    $basePath = $baseDir . '/src/';

    if (str_starts_with($class, $prefix)) {
        $relativeClass = substr($class, strlen($prefix));
        $file = $basePath . str_replace('\\', '/', $relativeClass) . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
});

if (!defined('APP_PATH')) {
    define('APP_PATH', $baseDir);
}

if (!defined('VIEW_PATH')) {
    define('VIEW_PATH', $baseDir . '/pages');
}

if (!defined('TEMPLATE_PATH')) {
    define('TEMPLATE_PATH', $baseDir . '/templates');
}

if (!defined('PUBLIC_PATH')) {
    define('PUBLIC_PATH', $baseDir . '/public');
}

// Load configuration
define('CONFIG_PATH', $baseDir . '/config');
$configFile = CONFIG_PATH . '/database.php';

if (file_exists($configFile)) {
    $databaseConfig = require $configFile;
} else {
    $databaseConfig = require CONFIG_PATH . '/database.example.php';
}

App\Support\Config::set('database', $databaseConfig);
