<?php

declare(strict_types = 1);

namespace App;

use App\Exceptions\NotFoundException;

class Config
{
    private static $configs;
    private static $instance;

    protected function __construct() {}
    protected function __clone() {}
    protected function __wakeup() {}

    public static function getInstance(): Config
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        $path = $_SERVER['DOCUMENT_ROOT'] . CONFIG_DIR;
        if (!is_dir($path)) {
            throw new NotFoundException('Config directory not exist');
        }

        $files = array_diff(scandir($path), ['..', '.']);
        if (empty($files)) {
            throw new NotFoundException('Config files not exist');
        }

        foreach ($files as $file) {
            $fullpath = $path . $file;
            self::$configs[pathinfo($fullpath)['filename']] = include $fullpath;
        }

        return self::$instance;
    }

    public function get(string $config, $default = null): ?string
    {
        return array_get(self::$configs, $config, $default);
    }
}
