<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Request,
    App\View\View,
    App\Models\Pages,
    App\Exceptions\NotFoundException;

class StaticPagesController
{
    public function index($id): View
    {
        if (!is_numeric($id)) {
            throw new NotFoundException('Запрашиваемая страница не найдена или удалена', 404);
        }

        $page = Pages::where('id', $id)->first();
        if ($page === null) {
            throw new NotFoundException('Запрашиваемая страница не найдена или удалена', 404);
        }

        $params = [
            'id' => $id,
            'staticPageTemplate' => (new Pages())->getTemplateName($page->template),
            'content' => $page->content,
            'aside' => $page->aside,
            'title' => $page->title,
            'subtitle' => $page->subtitle,
            'img' => $page->img,
            'additionCSS' => $page->css,
            'date' => $page->created_at->format('Y-m-d'),
        ];
        return new View('page', $params);
    }
}
