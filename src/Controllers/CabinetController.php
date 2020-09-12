<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Request,
    App\View\View,
    App\Models\Users,
    App\Models\Sessions;

class CabinetController
{
    private $errors = [];
    private $data = [];
    private $message = '';

    public function index(): View
    {
        $user = Users::getCurrentUser();
        if ($user === null) {
            header('Location: /');
            exit;
        }

        $params = [
            'title' => 'Форма авторизации',
            'data' => [
                'img' => $user->img,
                'about' => $user->about,
                'email' => $user->email,
                'name' => $user->name,
                'subscribe' => $user->subscribe,
                'password' => '',
            ],
            'errors' => $this->errors,
            'message' => $this->message,
            'userRole' => $user->status,
        ];
        return new View('cabinet', $params);
    }

    public function entrance()
    {
        /*$request = Request::getPOSTParams(['email', 'password']);
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
        return $this->index();*/
    }
}
