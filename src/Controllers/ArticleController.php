<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Request,
    App\View\View,
    App\Models\Articles,
    App\Models\Users,
    App\Models\Comments,
    App\Exceptions\NotFoundException;

class ArticleController
{
    public function index($num = 1): View
    {
        if (!is_numeric($num)) {
            throw new NotFoundException('Запрашиваемая страница не найдена или удалена', 404);
        }

        $article = Articles::where('id', $num)->first();
        if (!$article) {
            throw new NotFoundException('Запрашиваемая страница не найдена или удалена', 404);
        }

        $user = Users::getCurrentUser();

        $params = [
            'title' => $article->title,
            'content' => $article->content,
            'date' => $article->created_at->format('Y-m-d'),
            'img' => $article->img,
            'id' => $article->id,
            //'userRole' => $user ? $user->status : null,
            'comments' => (new Comments())->getCommentForArticle((int)$num, $user),
        ];
        return new View('single', $params);
    }

    public function addComment(): string
    {
        $response = [
            'result' => false,
            'error' => '',
            'comment' => [],
        ];

        $request = Request::getPOSTParams(['id', 'method', 'comment']);

        if ($request['method'] != 'addComment') {
            return json_encode($response);
        }

        $user = Users::getCurrentUser();
        $response['error'] = (new Comments())->checkComment($request, $user);

        if (empty($response['error'])) {

            $response['result'] = true;
            $isModerate = $user->status == 'admin' || $user->status == 'manager';
            $comment = [
                'user_id' => $user->id,
                'article_id' => $request['id'],
                'content' => $request['comment'],
                'created_at'=> date('Y-m-d H:i'),
                'moderate' => (int) $isModerate,
            ];
            Comments::insert($comment);

            $response['comment'] = array_merge($comment, [
                'username' => $user->name,
                'img' => $user->img,
            ]);
        }

        return json_encode($response);
    }
}
