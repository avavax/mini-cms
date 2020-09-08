<?php

declare(strict_types = 1);

namespace App;

use App\Exceptions\NotFoundException;

class Router
{
    private $routes = [];

    public function get(string $path, $callback)
    {
        $route = new Route($path, $callback);
        $this->routes[] = $route;
    }

    public function post(string $route, $callback)
    {
        $route = new Route($path, $callback, 'POST');
        $this->routes[] = $route;
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
