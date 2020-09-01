<?php

define('APP_DIR', '/src/');
define('VIEW_DIR', '/src/App/View/');

spl_autoload_register(function(string $class) {

    $prefix = '';
    $baseDir = __DIR__ . APP_DIR;

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    if (file_exists($file)) {
        include $file;
    }
});
