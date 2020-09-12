<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Request,
    App\View\View,
    App\Models\Users,
    App\Models\Sessions;

class AuthorizationController
{
    private $email = '';
    private $password = '';
    private $error = false;

    public function index(): View
    {
        $params = [
            'title' => 'Форма авторизации',
            'email' => $this->email,
            'password' => $this->password,
            'error' => $this->error,
        ];
        return new View('authorization', $params);
    }

    public function entrance()
    {
        $request = Request::getPOSTParams(['email', 'password']);
        $this->email = $request['email'];
        $this->password = $request['password'];

        if ($this->email != '' && $this->password != '') {
            $user = Users::where('email', $this->email)->first();

            if ($user !== null && password_verify($this->password, $user->password)) {

                $this->autorize((int) $user->id);

                $params = [
                    'title' => 'Сообщение сайта',
                    'message' => 'Вы вошли как ' . $user->name,
                ];
                return new View('message', $params);
            }
        }

        $this->error = true;
        return $this->index();
    }

    public function logout(): View
    {
        unset($_SESSION['token']);
        setcookie('token', '', time() - 1, '/');
        $params = [
            'title' => 'Сообщение сайта',
            'message' => 'Вы вышли из своего профиля',
        ];
        return new View('message', $params);
    }

    public function autorize(int $user_id)
    {
        $token = substr(bin2hex(random_bytes(128)), 0, 128);
        Sessions::insert(['user_id' => $user_id, 'token' => $token]);

        $_SESSION['token'] = $token;
        setcookie('token', $token, time() + 3600 * 24 * 30, '/');
    }
}
