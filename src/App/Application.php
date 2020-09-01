<?php

declare(strict_types = 1);

namespace App;

use App\Interfaces\IRenderable,
    App\View\View;

class Application
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run()
    {
        $callback = $this->router->dispatch();

        if ($callback === null) {
            header($_SERVER['SERVER_PROTOCOL']. '  404 Not Found');
            (new View('404', ['title' => 'Error 404']))->render();
            exit;
        }

        if (is_subclass_of($callback, IRenderable::class)) {
            $callback->render();
        } else {
            echo $callback;
        }
    }
}
