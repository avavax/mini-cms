<?php

declare(strict_types = 1);

namespace App\Controllers\Admin;

use App\Models\Pages,
    App\Request,
    App\View\View;

class AdminPageController extends ContentController
{
    protected const ADMIN_ONLY = false;
    protected const SLUG = '/pages/';
    protected const TEMPLATES = [
        'all' => 'admin/pages',
        'add' => 'admin/pages_add',
    ];

    public function add(): View
    {
        $this->data['templateList'] = (new Pages())->getTemplateList();
        return parent::add();
    }

    protected function getContentPart(int $step, int $list): array
    {
         $pages = Pages::skip(($list - 1) * $step)
            ->take($step)
            ->latest('id')
            ->get();

        $previews = [];
        foreach ($pages as $page) {
            $previews[] = [
                'id' => $page->id,
                'img' => $page->img,
                'title' => $page->title,
                'create' => $page->created_at->format('Y-m-d'),
                'update' => $page->updated_at->format('Y-m-d'),
                'template' => $page->template,
            ];
        }
        return $previews;
    }

    protected function contentCount(): int
    {
        return Pages::all()->count();
    }

    protected function contentDelete($id)
    {
        Pages::where('id', '=', $id)->delete();
    }

    protected function getContentById(int $id): array
    {
        $page = Pages::where('id', $id)->first();
        if (!$page) {
            return [];
        }
        return [
            'id' => $id,
            'template' => (new Pages())->getTemplateName($page->template),
            'content' => $page->content,
            'aside' => $page->aside,
            'title' => $page->title,
            'subtitle' => $page->subtitle,
            'img' => $page->img,
            'css' => $page->css,
            'templateList' => (new Pages())->getTemplateList(),
        ];
    }

    protected function contentSave($id = null): int
    {
        $params = [
            'title' => $this->data['title'],
            'subtitle' => $this->data['subtitle'],
            'content' => htmlspecialchars_decode($this->data['content']),
            'aside' => htmlspecialchars_decode($this->data['aside']),
            'template' => $this->data['template'],
            'css' => $this->data['css'],
        ];
        if (!empty($this->data['img'])) {
            $params['img'] = $this->data['img'];
        }

        if ($id === null) {
            $id = Pages::insertGetId($params);
        } else {
            Pages::where('id', $id)
                ->update($params);
        }
        return $id;
    }

    protected function contentCheck($request): array
    {
        $errors = [];
        if ($request['title'] == '') {
            $errors['title'] = 'Заголовок не может быть пустым';
        }
        if ($request['content'] == '') {
            $errors['content'] = 'Поле основного контента не может быть пустым';
        }
        return $errors;
    }

    protected function contentDataPrepare($request, $imgName): array
    {
        return [
            'img' => $imgName,
            'title' => $request['title'],
            'subtitle' => $request['subtitle'],
            'content' => htmlspecialchars($request['content']),
            'aside' => htmlspecialchars($request['aside']),
            'id' => $request['id'],
            'template' => $request['template'],
            'css' => $request['css'],
        ];
    }

    protected function getPOSTRequest(): array
    {
        $result = Request::getPOSTParams(['id', 'title', 'oldImg', 'template', 'subtitle', 'css']);
        return array_merge($result, [
            'content' => $_POST['content'],
            'aside' => removeJs($_POST['aside'])
        ]);
    }
}
