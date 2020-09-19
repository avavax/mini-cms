<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Request,
    App\View\View,
    App\Controllers\SubscribeController,
    App\Models\Articles,
    App\Models\Users,
    App\Exceptions\NotFoundException;

class IndexController
{
    private const ARTICLES_ON_PAGE = 6;

    public function index($num = 1): View
    {
        if (!is_numeric($num)) {
            throw new NotFoundException('Запрашиваемая страница не найдена или удалена', 404);
        }

        $articles = Articles::skip(($num - 1) * self::ARTICLES_ON_PAGE)
            ->take(self::ARTICLES_ON_PAGE)
            ->latest('id')
            ->get();

        if ($articles && $articles->isEmpty()) {
            throw new NotFoundException('Запрашиваемая страница не найдена или удалена', 404);
        }

        foreach ($articles as $article) {
            $previews[] = [
                'id' => $article->id,
                'excerpt' => article_excerpt($article->content),
                'img' => $article->img,
                'title' => $article->title,
                'date' => $article->created_at->format('Y-m-d'),
            ];
        }

        $user = Users::getCurrentUser();

        $params = [
            'title' => 'Главная',
            'previews' => $previews,
            'pagination' => [
                'current' => $num,
                'max' => (int) ceil($this->getArticlesCount() / self::ARTICLES_ON_PAGE),
                'slug' => '/blog/',
            ],
            'subscribeForm' => $this->isShowSubscribeForm($user),
        ];
        return new View('index', $params);
    }

    public function subscribe(): string
    {
        $response = [
            'result' => false,
            'errors' => '',
        ];

        $request = Request::getPOSTParams(['subscribe', 'email']);
        if (empty($request['subscribe'])) {
            return json_encode($response);
        }

        $user = Users::getCurrentUser();
         if ($user) {
            $response['result'] = true;
        } else {
            if (check_email($request['email'])) {
                $response['result'] = true;
            } else {
                $response['errors'] = 'Некорректный формат email';
            }
        }

        if ($response['result']) {
            $subscriber = new SubscribeController;

            if (!$subscriber->addSubscribe($user, $request['email'])) {
                $response['result'] = false;
                $response['errors'] = 'Не удалось оформить подписку. Возможно, адрес уже в базе';
            }
        }

        return json_encode($response);
    }

    private function getArticlesCount(): int
    {
        return Articles::all()->count();
    }

    private function isShowSubscribeForm($user): array
    {
        $result = [
            'showForm' => true,
            'showEmailField' => true,
        ];

        if ($user === null) {
            return $result;
        }

        if ($user->subscribe == 1) {
            $result['showForm'] = false;
        } else {
            $result['showEmailField'] = false;
        }
        return $result;
    }
}
