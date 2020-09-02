<?php

declare(strict_types = 1);

namespace App;

use App\Interfaces\RenderableInterface,
    App\Exception\NotFoundException,
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
                throw new NotFoundException('Страница удалена или отсуствует', 404);
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
            $params = [
                'title' => 'Error page',
                'message' => $e->getMessage(),
                'error' => $e->getCode() ?: 500,
            ];
            (new View('errors', $params))->render();
        }
    }
}
