<?php

declare(strict_types = 1);

namespace App;

use App\Interfaces\RenderableInterface,
    App\Traits\TRenderException,
    App\View\View,
    Illuminate\Database\Capsule\Manager as Capsule;

class Application
{
    use TRenderException;

    private $router;

    public function __construct(Router $router)
    {
        $this->initialize();
        $this->router = $router;
    }

    public function run()
    {
        try {
            $callback = $this->router->dispatch();

            if ($callback instanceof RenderableInterface) {
                $callback->render();
            } else {
                echo $callback;
            }

        } catch (\Exception $e) {
            $this->renderException($e);
        }
    }

    private function initialize()
    {
        try {
            $config = Config::getInstance();
        } catch (\Exception $e) {
            $this->renderException($e);
        }

        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => $config->get('db.mysql.host'),
            'database'  => $config->get('db.mysql.database'),
            'username'  => $config->get('db.mysql.username'),
            'password'  => $config->get('db.mysql.password'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    private function renderException(\Exception $e)
    {
        if ($e instanceof RenderableInterface) {
            $e->render();
        } else {
            $this->showException($e);
        }
    }
}
