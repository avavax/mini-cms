<?php

declare(strict_types = 1);

namespace App;

class Route
{
    private $method;
    private $path;
    private $callback;

    public function __construct(string $path, $callback, $method = 'GET')
    {
        $path = '/' . trim($path, '/');
        $this->path = str_replace(['*', '/'], ['(\w+)', '\/'], $path);
        $this->callback = $this->prepareCallback($callback);
        $this->method = $method;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getMatch(string $method, string $uri): bool
    {
        return $this->method == $method && preg_match('/^' . $this->path . '$/', $uri);
    }

    public function run(string $uri)
    {
        $params = [];
        preg_match('/^' . $this->path . '$/', $uri, $matches);
        for ($i = 1; $i < sizeof($matches); $i++) {
            $params[] = $matches[$i];
        }
        return call_user_func_array($this->callback, $params);
    }

    private function prepareCallback($callback)
    {
        if (is_string($callback) && strpos($callback, '@')) {
            $callback = str_replace('@', '::', $callback);
        }
        return $callback;
    }
}
