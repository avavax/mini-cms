<?php

declare(strict_types = 1);

namespace App\Exception;

use App\Interfaces\RenderableInterface,
    App\View\View;

class NotFoundException extends HttpException implements RenderableInterface
{

    public function render()
    {
        http_response_code(404);
        $params = [
            'title' => 'Error 404',
            'message' => $this->getMessage(),
            'error' => $this->getCode() ?: 500,
        ];
        (new View('errors', $params))->render();
    }
}
