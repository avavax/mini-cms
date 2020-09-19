<?php

namespace App;

session_start();

use App\View\View,
    App\Controllers\IndexController,
    App\Controllers\ArticleController,
    App\Controllers\AuthorizationController,
    App\Controllers\CabinetController,
    App\Controllers\RegistrationController,
    App\Controllers\StaticPagesController,
    App\Controllers\SubscribeController,
    App\Controllers\Admin\AdminArticleController,
    App\Controllers\Admin\AdminPageController,
    App\Controllers\Admin\AdminCommentController,
    App\Controllers\Admin\AdminUserController,
    App\Controllers\Admin\AdminSettingsController;

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
$router->get('/cabinet/unsubscribe', [new CabinetController(), 'changeSubscribe']);
$router->post('/cabinet/changeimage', [new CabinetController(), 'changeImage']);
$router->post('/cabinet', [new CabinetController(), 'changeUserData']);

$router->get('/page/*/', [new StaticPagesController(), 'index']);

$router->get('/admin', [new AdminArticleController(), 'index']);
$router->post('/admin/articles/', [new AdminArticleController(), 'changePagination']);
$router->get('/admin/articles/add', [new AdminArticleController(), 'add']);
$router->post('/admin/articles/add', [new AdminArticleController(), 'save']);
$router->post('/admin/articles/edit/*/', [new AdminArticleController(), 'edit']);
$router->get('/admin/articles/delete/*/', [new AdminArticleController(), 'delete']);
$router->get('/admin/articles/edit/*/', [new AdminArticleController(), 'edit']);
$router->get('/admin/articles/*/*', [new AdminArticleController(), 'index']);

$router->get('/admin/pages/', [new AdminPageController(), 'index']);
$router->post('/admin/pages/', [new AdminPageController(), 'changePagination']);
$router->get('/admin/pages/add', [new AdminPageController(), 'add']);
$router->post('/admin/pages/add', [new AdminPageController(), 'save']);
$router->get('/admin/pages/edit/*/', [new AdminPageController(), 'edit']);
$router->post('/admin/pages/edit/*/', [new AdminPageController(), 'edit']);
$router->get('/admin/pages/delete/*/', [new AdminPageController(), 'delete']);
$router->get('/admin/pages/*/*', [new AdminPageController(), 'index']);

$router->get('/admin/comments/', [new AdminCommentController(), 'index']);
$router->post('/admin/comments/', [new AdminCommentController(), 'changePagination']);
$router->get('/admin/comments/aprove/*/', [new AdminCommentController(), 'aprove']);
$router->get('/admin/comments/delete/*/', [new AdminCommentController(), 'delete']);
$router->get('/admin/comments/*/*', [new AdminCommentController(), 'index']);

$router->get('/admin/users/', [new AdminUserController(), 'index']);
$router->post('/admin/users/', [new AdminUserController(), 'changePagination']);
$router->post('/admin/users/edit/*/', [new AdminUserController(), 'edit']);
$router->get('/admin/users/delete/*/', [new AdminUserController(), 'delete']);
$router->get('/admin/users/*/*', [new AdminUserController(), 'index']);

$router->get('/admin/settings/', [new AdminSettingsController(), 'index']);
$router->post('/admin/settings/', [new AdminSettingsController(), 'save']);

$router->get('/unsubscribe', [new SubscribeController(), 'unsubscribe']);

$application = new Application($router);

$application->run();
