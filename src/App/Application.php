<?php

declare(strict_types = 1);

namespace App;

class Application
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run()
    {
        echo $this->router->dispatch();
    }
}
