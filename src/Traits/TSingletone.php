<?php

declare(strict_types = 1);

namespace App\Traits;

trait TSingletone
{
    private static $item;

    protected function __construct() {}
    protected function __clone() {}
    protected function __wakeup() {}

    public static function getInstance()
    {
        if (empty(static::$item)) {
            static::$item = new static();
        }
        return static::$item;
    }
}
