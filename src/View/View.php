<?php

declare(strict_types = 1);

namespace App\View;

use App\Interfaces\RenderableInterface;

class View implements RenderableInterface
{
    private $templatePath;
    private $params = [];

    public function __construct(string $path, array $params = [])
    {
        $this->templatePath = $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR
            . '/pages/' . str_replace('.', '/', $path) . '.php';
        $this->params = $params;
    }

    public function render()
    {
        extract($this->params);
        ob_start();
        include $this->templatePath;
        echo ob_get_clean();
    }
}
