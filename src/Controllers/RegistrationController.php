<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Request,
    App\View\View,
    App\Models\Users,
    App\Models\Sessions;

class RegistrationController
{
    private $data =[];
    private $errors = [];

    public function index(): View
    {
        $user = Users::getCurrentUser();
        $params = [
            'title' => 'Форма регистрации',
            'data' => $this->data,
            'errors' => $this->errors,
            'userRole' => $user ? $user->status : null,
        ];
        return new View('registration', $params);
    }

    public function register()
    {
        $request = Request::getPOSTParams(['email', 'name', 'password', 'passwordRepeat']);

        $this->data = [
            'email' => $request['email'],
            'name' => $request['name'],
            'password' => $request['password'],
            'passwordRepeat' => $request['passwordRepeat'],
        ];

        $this->errors = Users::checkUserData($request);

        if (empty($this->errors)) {

            $user_id = Users::insertGetId([
                'email' => $request['email'],
                'name' => $request['name'],
                'password' => password_hash($request['password'], PASSWORD_BCRYPT),
                'status' => 'user',
            ]);

            unset($_SESSION['token']);
            setcookie('token', '', time() - 1, '/');
            (new AuthorizationController())->autorize((int) $user_id);

            $params = [
                'title' => 'Сообщение сайта',
                'message' => 'Вы вошли как ' . $request['name'],
                'userRole' => 'user',
            ];
            return new View('message', $params);
        }
        return $this->index();
    }
}
