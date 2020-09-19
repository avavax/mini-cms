<?php

declare(strict_types = 1);

namespace App\Controllers\Admin;

use App\Request,
    App\View\View,
    App\Models\Users,
    App\Models\Articles,
    App\Models\Comments,
    App\Exceptions\NotFoundException,
    App\Interfaces\ListableInterface,
    App\Traits\TIsAccess,
    App\Traits\TChangePagination;

class AdminCommentController implements ListableInterface
{
    use TIsAccess;
    use TChangePagination;

    protected const ADMIN_ONLY = false;
    private const SLUG = '/comments/';
    private const TEMPLATES = ['all' => 'admin/comments'];

    public function aprove($id): string
    {
        $this->isAccess();

        $moderate = Comments::where('id', $id)
            ->select('moderate')
            ->first()
            ->moderate;

        $response = [
            'result' => true,
            'moderate' => 1 - $moderate,
        ];

        Comments::where('id', $id)
            ->update(['moderate' => $response['moderate']]);

        return json_encode($response);
    }

    public function delete($id): View
    {
        $this->isAccess();
        if (!is_numeric($id)) {
            throw new NotFoundException('Запрашиваемая страница не найдена или удалена', 404);
        }
        Comments::where('id', '=', $id)->delete();
        return $this->index();
    }

    private function getContentPart(int $step, int $page): array
    {
         $comments = Comments::skip(($page - 1) * $step)
            ->take($step)
            ->leftJoin('users', 'users.id', '=', 'comments.user_id')
            ->leftJoin('articles', 'articles.id', '=', 'comments.article_id')
            ->select('comments.*', 'articles.id as article_id', 'articles.title', 'users.name')
            ->latest('id')
            ->get();

        $previews = [];
        foreach ($comments as $comment) {
            $previews[] = [
                'id' => $comment->id,
                'content' => $comment->content,
                'moderate' => $comment->moderate,
                'articleId' => $comment->article_id,
                'article' => $comment->title,
                'user' => $comment->name,
                'create' => $comment->created_at->format('Y-m-d'),
                'update' => $comment->updated_at->format('Y-m-d'),
            ];
        }
        return $previews;
    }

    private function contentCount(): int
    {
        return Comments::all()->count();
    }
}
