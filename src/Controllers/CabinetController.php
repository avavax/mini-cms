<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Request,
    App\Controllers\SubscribeController,
    App\View\View,
    App\Models\Users,
    App\Models\Images,
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
            'title' => 'Профиль пользователя',
            'data' => [
                'id' => $user->id,
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

    public function changeUserData()
    {
        $request = Request::getPOSTParams(['id', 'email', 'name', 'about', 'password', 'passwordRepeat']);
        if (empty($request['password'])) {
            $this->errors = (new Users())
                ->checkData($request, true)
                ->buildErrorMsg();
        } else {
            $this->errors = (new Users())
                ->checkData($request, true)
                ->checkPassword($request)
                ->buildErrorMsg();
        }

        if (empty($this->errors)) {
            if (empty($request['password'])) {
                 Users::where('id', $request['id'])
                    ->update([
                        'email' => $request['email'],
                        'name' => $request['name'],
                        'about' => $request['about'],
                    ]);
            } else {
                 Users::where('id', $request['id'])
                    ->update([
                        'email' => $request['email'],
                        'name' => $request['name'],
                        'about' => $request['about'],
                        'password' => password_hash($request['password'], PASSWORD_BCRYPT),
                    ]);
            }
            $this->message = 'Изменения сохранены';
        }

        return $this->index();
    }

    public function changeSubscribe(): string
    {
        $response = [
            'result' => false,
            'status' => '',
        ];
        $user = Users::getCurrentUser();

        if ($user) {
            $response = [
                'result' => true,
                'status' => (new SubscribeController())->changeSubscribe($user),
            ];
        }

        return json_encode($response);
    }

    public function changeImage(): string
    {
        $response = [
            'result' => false,
            'errors' => '',
            'img' => '',
        ];

        $user = Users::getCurrentUser();
        if ($user === null) {
            return json_encode($response);
        }

        $path = $_SERVER['DOCUMENT_ROOT'] . ASSETS_DIR . '/img/avatars/';
        $saveResult = (new Images())->save($_FILES['avatar'], $path);
        $response['errors'] = $saveResult['errors'];

        if (empty($response['errors'])) {
             Users::where('id', $user->id)
                ->update(['img' => $saveResult['name']]);
            $response['result'] = true;
            $response['img'] = ASSETS_DIR . 'img/avatars/' . $saveResult['name'];
        }
        return json_encode($response);
    }
}
