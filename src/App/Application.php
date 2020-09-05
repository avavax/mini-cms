<?php

declare(strict_types = 1);

namespace App;

use App\Interfaces\RenderableInterface,
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
        try {
            $callback = $this->router->dispatch();

            if ($callback instanceof RenderableInterface) {
                $callback->render();
            } else {
                echo $callback;
            }

        } catch (\Exception $e) {
            $this->renderException($e);
        }
    }

    private function renderException(\Exception $e)
    {
        if ($e instanceof RenderableInterface) {
            $e->render();
        } else {
            $errorCode = $e->getCode() ?: 500;
            http_response_code($errorCode);

            $params = [
                'title' => 'Error page',
                'message' => $e->getMessage(),
                'error' => $errorCode,
            ];
            (new View('errors', $params))->render();
        }
    }
}
