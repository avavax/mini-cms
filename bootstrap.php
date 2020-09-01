<?php

define('APP_DIR', '/src/');
define('VIEW_DIR', '/src/App/View/');

spl_autoload_register(function(string $class) {

    $baseDir = __DIR__ . APP_DIR;

    $file = $baseDir . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        include $file;
    }
});
