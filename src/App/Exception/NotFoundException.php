<?php

declare(strict_types = 1);

namespace App\Exception;

use App\Interfaces\RenderableInterface,
    App\View\View;

class NotFoundException extends HttpException implements RenderableInterface
{
    public function render()
    {
        header($_SERVER['SERVER_PROTOCOL']. '  404 Not Found');
        (new View('404', ['title' => 'Error 404']))->render();
    }
}
