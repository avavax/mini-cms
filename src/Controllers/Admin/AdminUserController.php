<?php

declare(strict_types = 1);

namespace App\Controllers\Admin;

use App\Request,
    App\View\View,
    App\Models\Users,
    App\Exceptions\NotFoundException,
    App\Interfaces\ListableInterface,
    App\Traits\TIsAccess,
    App\Traits\TChangePagination;

class AdminUserController implements ListableInterface
{
    use TIsAccess;
    use TChangePagination;

    protected const ADMIN_ONLY = true;
    private const SLUG = '/users/';
    private const TEMPLATES = ['all' => 'admin/users'];

    public function edit(int $id): View
    {
        $this->isAccess();
        $status = Request::getPOSTParams(['status'])['status'];
        Users::where('id', '=', $id)
            ->update(['status' => $status]);

        return $this->index();
    }

    public function delete($id): View
    {
        $this->isAccess();
        if (!is_numeric($id)) {
            throw new NotFoundException('Запрашиваемая страница не найдена или удалена', 404);
        }
        Users::where('id', '=', $id)->delete();
        return $this->index();
    }

    private function getContentPart(int $step, int $page): array
    {
         $users = Users::skip(($page - 1) * $step)
            ->take($step)
            ->latest('id')
            ->get();

        $previews = [];
        foreach ($users as $user) {
            $previews[] = [
                'id' => $user->id,
                'name' => $user->name,
                'about' => $user->about,
                'email' => $user->email,
                'status' => $user->status,
                'img' => $user->img,
                'create' => $user->created_at->format('Y-m-d'),
                'update' => $user->updated_at->format('Y-m-d'),
            ];
        }
        return $previews;
    }

    private function contentCount(): int
    {
        return Users::all()->count();
    }
}
