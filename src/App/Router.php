<?php

declare(strict_types = 1);

namespace App;

class Router
{
    private $routes = [];

    public function get(string $route, $callback)
    {
        $callback = $this->prepareCallback($callback);
        $this->routes[$route] = $callback;
    }

    public function dispatch()
    {
        $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route => $callback) {
            if ($currentUri == $route) {
                return call_user_func($callback);
            }
        }
    }

    private function prepareCallback($callback)
    {
        if (is_string($callback) && strpos($callback, '@')) {
            $callback = str_replace('@', '::', $callback);
        }
        return $callback;
    }
}
