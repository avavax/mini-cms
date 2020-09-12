<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    const MIN_USER_NAME_LENGTH = 5;
    const MAX_USER_NAME_LENGTH = 40;
    const MIN_USER_PASSWORD_LENGTH = 5;

    protected $table = 'users';

    public static function getCurrentUser(): ?object
    {
        $token = $_SESSION['token'] ?? $_COOKIE['token'] ?? null;
        if ($token !== null) {
            $session = Sessions::where('token', $token)->first();
            if ($session !== null) {
                $user = self::where('id', $session->user_id)->first();
                return $user;
            }
        }
        return null;
    }

    public static function checkUserData(array $request): array
    {
        $errors = [];
        if ($request['password'] != $request['passwordRepeat']) {
            $errors['passwordRepeat'] = 'Пароли должны совпадать';
        }
        if (mb_strlen($request['name']) < self::MIN_USER_NAME_LENGTH) {
            $errors['name'] = 'Имя должно быть не короче ' . self::MIN_USER_NAME_LENGTH . ' символов';
        }
        if (mb_strlen($request['name']) > self::MAX_USER_NAME_LENGTH) {
            $errors['name'] = 'Имя должно быть не длиннее ' . self::MAX_USER_NAME_LENGTH . ' символов';
        }
        if (mb_strlen($request['password']) < self::MIN_USER_PASSWORD_LENGTH) {
            $errors['password'] = 'Пароль должен быть не менее ' . self::MIN_USER_PASSWORD_LENGTH . ' символов';
        }
        if (!check_email($request['email'])) {
            $errors['email'] = 'Некорректная форма email';
        }
        if (self::where('email', $request['email'])->first()) {
            $errors['email'] = 'Пользователь с таким email уже существует';
        }

        return $errors;
    }
}
