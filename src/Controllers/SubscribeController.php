<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Models\Users,
    App\Models\Subscribes;

class SubscribeController
{
    public function addSubscribe($user, $email = ''): bool
    {
        if ($user) {
            return $this->subscribeRegisteredUser($user);
        } else {
            return $this->subscribeUnregisteredUser($email);
        }
    }

    private function subscribeUnregisteredUser(string $email): bool
    {
        try {
           Subscribes::insert(['email' => $email]);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    private function subscribeRegisteredUser(object $user)
    {
        Users::where('id', $user->id)
            ->update(['subscribe' => 1]);
        return true;
    }
}
