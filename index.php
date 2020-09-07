<?php

namespace App;

use App\View\View;

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'bootstrap.php';

$router = new Router();

$router->get('/',       [new Controller(), 'index']);
$router->get('/about',  [new Controller(), 'about']);
$router->get('/books',  [new Controller(), 'books']);

$router->get('/test1/*/test2/*/', function($param1, $param2) {
    return sprintf('Тестовая функция с параметрами %s и %s', $param1, $param2);
});

$application = new Application($router);

$application->run();
