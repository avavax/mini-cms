<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Comments extends Model
{
    protected $table = 'comments';

    public function getCommentForArticle(int $id, $user): array
    {
        $commentsFromBd = self::leftJoin('users', 'users.id', '=', 'comments.user_id')
            ->select('comments.*', 'users.img', 'users.name')
            ->where('article_id', $id)
            ->get();

        $comments = [];
        foreach ($commentsFromBd as $comment) {
            $comments[] = [
                'username' => $comment->name,
                'img' => $comment->img,
                'content' => $comment->content,
                'created_at' => $comment->created_at->format('Y-m-d H:i'),
                'moderate' => $comment->moderate == 0,
                'show' => $comment->moderate || $this->isModerateMsgShow($comment->user_id, $user),
            ];
        }
        return $comments;
    }

    private function isModerateMsgShow(int $commentUserId, $user): bool
    {
        if ($user === null) {
            return false;
        }
        if ($user->status == 'admin' || $user->status == 'manager') {
            return true;
        }
        if ($user->id == $commentUserId) {
            return true;
        }
        return false;
    }

    public function checkComment(array $request, $user): string
    {
        if ($user === null) {
            return 'Зарегистрируйтесь, чтобы оставлять комментарии!';
        }

        if ($request['comment'] == '') {
            return 'Вы не можете отправить пустой комментарий!';
        }
        return '';
    }
}
