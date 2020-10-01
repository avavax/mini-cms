<?php

$staticPages = (new App\Models\Pages())->getAllPagesLink();
$user = App\Models\Users::getCurrentUser();

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title><?= $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name=description content="">
    <link rel="icon" href="<?= ASSETS_DIR ?>img/favicon.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/bootstrap.min.css">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/meanmenu.css">
    <!-- Animation CSS -->
    <link href="<?= ASSETS_DIR ?>css/aos.min.css" rel="stylesheet">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/style.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/responsive.css">
</head>

<body>
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


    <!--  Preloader Start
========================-->

    <!--<div id='preloader'>
        <div id='status'>
            <img src='<?= ASSETS_DIR ?>img/loading.gif' alt='LOADING....!!!!!' />
        </div>
    </div>-->
    <!--=========== Main Header Area ===============-->
    <header id="home">
        <div class="main-navigation-1">
            <div class="container">
                <div class="row">
                    <!-- logo-area-->
                    <div class="col-xl-2 col-lg-3 col-md-3">
                        <div class="logo-area">
                            <a href="/"><img src="<?= ASSETS_DIR ?>img/logo.png" alt="enventer"></a>
                        </div>
                    </div>
                    <!-- mainmenu-area-->
                    <div class="col-xl-10 col-lg-9 col-md-9">
                        <div class="main-menu f-right">
                            <nav id="mobile-menu">
                                <ul>
                                    <li>
                                        <a href="/">Главная </a>
                                    </li>
                                    <li>
                                        <a href="/admin">Статьи</a>
                                    </li>
                                    <li>
                                        <a href="/admin/comments">Комментарии</a>
                                    </li>
                                    <li>
                                        <a href="/admin/pages">Страницы</a>
                                    </li>
                                    <?php if ($user->status == 'admin'): ?>
                                        <li>
                                            <a href="/admin/users">Пользователи</a>
                                        </li>
                                        <li>
                                            <a href="/admin/settings">Настройки</a>
                                        </li>
                                    <?php endif; ?>
                                    <!-- dropdown menu-area-->
                                    <li>
                                        <a class="current" href="#" onclick="return false">Пользователь <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown">
                                            <li><a href="/logout">Выход</a></li>
                                            <li><a href="/registration">Регистрация</a></li>
                                            <li><a href="/cabinet">Личный кабинет</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                        <!-- mobile menu-->
                        <div class="mobile-menu"></div>
                        <!--Search-->
                    </div>
                </div>
            </div>
        </div>
    </header>
