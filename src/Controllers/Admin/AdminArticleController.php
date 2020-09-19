<?php

declare(strict_types = 1);

namespace App\Controllers\Admin;

use App\Models\Articles,
    App\Controllers\SubscribeController,
    App\Request;

class AdminArticleController extends ContentController
{
    protected const ADMIN_ONLY = false;
    protected const SLUG = '/articles/';
    protected const TEMPLATES = [
        'all' => 'admin/articles',
        'add' => 'admin/articles_add',
    ];

    protected function getContentPart(int $step, int $page): array
    {
         $articles = Articles::skip(($page - 1) * $step)
            ->take($step)
            ->leftJoin('comments', 'comments.article_id', '=', 'articles.id')
            ->selectRaw('articles.*, count(comments.id) as comments_count')
            ->groupBy('id')
            ->latest('id')
            ->get();

        $previews = [];
        foreach ($articles as $article) {
            $previews[] = [
                'id' => $article->id,
                'excerpt' => article_excerpt($article->content),
                'img' => $article->img,
                'title' => $article->title,
                'create' => $article->created_at->format('Y-m-d'),
                'update' => $article->updated_at->format('Y-m-d'),
                'comments' => $article->comments_count,
            ];
        }
        return $previews;
    }

    protected function contentCount(): int
    {
        return Articles::all()->count();
    }

    protected function contentDelete($id)
    {
        Articles::where('id', '=', $id)->delete();
    }

    protected function getContentById(int $id): array
    {
        $article = Articles::where('id', $id)->first();
        if (!$article) {
            return [];
        }
        return [
            'id' => $id,
            'title' => $article->title,
            'content' => $article->content,
            'img' => $article->img,
        ];
    }

    protected function contentSave($id = null): int
    {
        $params = [
            'title' => $this->data['title'],
            'content' => htmlspecialchars_decode($this->data['content']),
        ];
        if (!empty($this->data['img'])) {
            $params['img'] = $this->data['img'];
        }

        if ($id === null) {
            $id = Articles::insertGetId($params);
            (new SubscribeController())->sendAll(array_merge($params, ['id' => $id]));
        } else {
            Articles::where('id', $id)
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
            $errors['content'] = 'Поле текста не может быть пустым';
        }
        return $errors;
    }

    protected function contentDataPrepare($request, $imgName): array
    {
        return [
            'img' => $imgName,
            'title' => $request['title'],
            'content' => htmlspecialchars($request['content']),
            'id' => $request['id'],
        ];
    }

    protected function getPOSTRequest(): array
    {
        $result = Request::getPOSTParams(['id', 'title', 'oldImg']);
        return array_merge($result, ['content' => $_POST['content']]);
    }

}
