<?php

declare(strict_types = 1);

namespace App\Exceptions;

use App\Interfaces\RenderableInterface,
    App\Traits\TRenderException;

class NotFoundException extends HttpException implements RenderableInterface
{
    use TRenderException;

    public function render()
    {
        $this->showException($this);
    }
}
