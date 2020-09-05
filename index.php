<?php

namespace App;

use App\View\View;

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'bootstrap.php';

$router = new Router();

$router->get('/',       [new Controller(), 'index']);
$router->get('/about',  [new Controller(), 'about']);

$application = new Application($router);

$application->run();
