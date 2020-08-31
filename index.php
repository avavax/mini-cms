<?php

namespace App;

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'bootstrap.php';

$router = new Router();

$router->get('/', function() {
    return 'home';
});
$router->get('/about', function() {
    return 'about';
});

$application = new Application($router);

$application->run();
