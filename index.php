<?php

namespace App;

use App\View\View;

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'bootstrap.php';

$router = new Router();

$router->get('/', function() {
    return new View('index', ['title' => 'Index Page']);
});
$router->get('/about', function() {
    return new View('about', ['title' => 'About Company']);
});

$application = new Application($router);

$application->run();
