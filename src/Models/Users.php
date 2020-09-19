<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    const MIN_USER_NAME_LENGTH = 5;
    const MAX_USER_NAME_LENGTH = 40;
    const MIN_USER_PASSWORD_LENGTH = 5;

    protected $table = 'users';

    private $errors = [];

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

    public function checkData(array $request, $update = false): Users
    {
        if (mb_strlen($request['name']) < self::MIN_USER_NAME_LENGTH) {
            $this->errors['name'] = 'Имя должно быть не короче ' . self::MIN_USER_NAME_LENGTH . ' символов';
        }
        if (mb_strlen($request['name']) > self::MAX_USER_NAME_LENGTH) {
            $this->errors['name'] = 'Имя должно быть не длиннее ' . self::MAX_USER_NAME_LENGTH . ' символов';
        }
        if (!check_email($request['email'])) {
            $this->errors['email'] = 'Некорректная форма email';
        }
        if (!$update) {
            if (self::where('email', $request['email'])->first()) {
                $this->errors['email'] = 'Пользователь с таким email уже существует';
            }
        }
        return $this;
    }

    public function checkPassword(array $request): Users
    {
        if ($request['password'] != $request['passwordRepeat']) {
            $this->errors['passwordRepeat'] = 'Пароли должны совпадать';
        }
        if ($request['password'] < self::MIN_USER_PASSWORD_LENGTH) {
            $this->errors['password'] = 'Пароль должен быть не менее ' . self::MIN_USER_PASSWORD_LENGTH . ' символов';
        }
        return $this;
    }

    public function checkAccept(array $request): Users
    {
        if (empty($request['agreement'])) {
            $this->errors['agreement'] = 'Вы должны дать согласие';
        }
        return $this;
    }

    public function buildErrorMsg(): array
    {
        return $this->errors;
    }
}
