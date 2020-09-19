<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Models\Users,
    App\Models\Articles,
    App\Models\Subscribes,
    App\View\View,
    App\Logger,
    App\Request;

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

    public function changeSubscribe(object $user): int
    {
        $newSubscribeStatus = 1 - $user->subscribe;
         Users::where('id', $user->id)
            ->update(['subscribe' => $newSubscribeStatus]);
        return $newSubscribeStatus;
    }

    public function sendAll(array $article)
    {
        $params = [
            'title' => $article['title'],
            'excerpt' => \article_excerpt($article['content'], 200),
            'link' => $_SERVER['HTTP_HOST'] . '/article/' . $article['id'],
        ];

        $subscribeUsers = Users::select('email')
            ->where('subscribe', 1)
            ->get();
        foreach ($subscribeUsers as $user) {
            $this->send($params, $user->email);
        }

        $subscribUnregisteredUsers = Subscribes::select('email')
            ->get();
        foreach ($subscribUnregisteredUsers as $user) {
            $this->send($params, $user->email);
        }
    }

    public function unsubscribe(): View
    {
        $email = Request::getGETParams(['email'])['email'];
        $result = false;
        if (Users::where('email', $email)->count() >= 1) {
            Users::where('email', $email)
            ->update(['subscribe' => 0]);
            $result = true;
        } elseif (Subscribes::where('email', $email)->count() >= 1) {
            Subscribes::where('email', $email)
            ->delete();
            $result = true;
        }

        $message = $result
            ? "Подписка для email: {$email} отменена :(<br> Но мы надеемся увидеть вас снова!"
            : "Подписка для email: {$email} уже была отменена или не оформлялась";

        $params = [
            'title' => 'Удаление подписки',
            'message' => $message,
        ];
        return new View('message', $params);
    }

    private function send(array $params, string $email)
    {
        // Вместо реальной отправки сообщения осуществляется запись в лог
        $msg = "На сайте добавлена новая запись: {$params['title']}"
            . PHP_EOL . "{$params['excerpt']}"
            . PHP_EOL . "Читать: {$params['link']}"
            . PHP_EOL . "_________________________"
            . PHP_EOL . "Отписаться от рассылки: " . $_SERVER['HTTP_HOST'] . "/unsubscribe?email={$email}"
            . PHP_EOL . "Отправлено подписчику: {$email}";

        $logger = Logger::getInstance();
        $logger->writeLog($msg);
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
