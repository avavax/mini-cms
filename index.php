<?php

namespace App;

session_start();

use App\View\View,
    App\Controllers\IndexController,
    App\Controllers\ArticleController,
    App\Controllers\AuthorizationController,
    App\Controllers\CabinetController,
    App\Controllers\RegistrationController;

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'bootstrap.php';

$router = new Router();

$router->get('/',       [new IndexController(), 'index']);
$router->post('/',       [new IndexController(), 'subscribe']);
$router->get('/blog/*/', [new IndexController(), 'index']);

$router->get('/article/*/', [new ArticleController(), 'index']);
$router->post('/article', [new ArticleController(), 'addComment']);

$router->get('/authorization', [new AuthorizationController(), 'index']);
$router->post('/authorization', [new AuthorizationController(), 'entrance']);
$router->get('/logout', [new AuthorizationController(), 'logout']);

$router->get('/registration', [new RegistrationController(), 'index']);
$router->post('/registration', [new RegistrationController(), 'register']);

$router->get('/cabinet', [new CabinetController(), 'index']);

$router->get('/test1/*/test2/*/', function($param1, $param2) {
    return sprintf('Тестовая функция с параметрами %s и %s', $param1, $param2);
});

$application = new Application($router);

$application->run();
