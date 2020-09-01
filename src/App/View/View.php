<?php

declare(strict_types = 1);

namespace App\View;

use App\Interfaces\IRenderable;

class View implements IRenderable
{
    private const LAYOUT =  '/layouts/main';
    private $vars = [];

    public function __construct(string $path, array $params = [])
    {
        $fullPath = '/pages/' . str_replace('.', '/', $path);

        $this->vars = [
            'title' => $params['title'],
            'header' => $this->prepareTmpl('/elements/header', ['current' => $path]),
            'footer' => $this->prepareTmpl('/elements/footer'),
            'pageContent' => $this->prepareTmpl($fullPath, $params),
        ];
    }

    public function render()
    {
        echo $this->prepareTmpl(self::LAYOUT, $this->vars);
    }

    private function prepareTmpl(string $path, array $vars = []): string
    {
        $templatePath = $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . "{$path}.php";
        extract($vars);
        ob_start();
        include $templatePath;
        return ob_get_clean();
    }
}
