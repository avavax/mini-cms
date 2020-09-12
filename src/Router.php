<?php

declare(strict_types = 1);

namespace App;

use App\Exceptions\NotFoundException;

class Router
{
    private $routes = [];

    public function get(string $path, $callback)
    {
        $this->routes[] = new Route($path, $callback);
    }

    public function post(string $path, $callback)
    {
        $this->routes[] = new Route($path, $callback, 'POST');
    }

    public function dispatch()
    {
        $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $currentMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route->getMatch($currentMethod, $currentUri)) {
                return $route->run($currentUri);
            }
        }

        throw new NotFoundException('Страница удалена или отсуствует', 404);
    }
}
