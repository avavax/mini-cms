<?php

declare(strict_types = 1);

namespace App\Traits;

use App\Models\Users;

trait TIsAccess
{
    private function isAccess()
    {
        $user = Users::getCurrentUser();
        if ($user === null) {
            header('Location: /authorization');
            exit();
        }

        if ($user->status == 'admin') {
            return;
        }

        if ($user->status == 'manager' && !static::ADMIN_ONLY) {
            return;
        }

        header('Location: /authorization');
        exit();
    }
}
