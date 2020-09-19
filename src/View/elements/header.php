<?php

$staticPages = (new App\Models\Pages())->getAllPagesLink();
$user = App\Models\Users::getCurrentUser();
$settings = (new App\Models\Settings())->getSettings();

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title><?= $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name=description content="<?= $settings['description'] ?? '' ?>">
    <meta name=keywords content="<?= $settings['keywords'] ?? '' ?>">
    <link rel="icon" href="<?= ASSETS_DIR ?>img/favicon.png" type="image/png">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700,900&display=swap" rel="stylesheet">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/meanmenu.css">
    <!-- Animation CSS -->
    <link href="<?= ASSETS_DIR ?>css/aos.min.css" rel="stylesheet">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/style.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/responsive.css">
    <?php if (isset($additionCSS)): ?>
        <style><?= $additionCSS ?></style>
    <?php endif; ?>
</head>

<body>
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


    <!--  Preloader Start
========================-->

    <div id='preloader'>
        <div id='status'>
            <img src='<?= ASSETS_DIR ?>img/loading.gif' alt='LOADING....!!!!!' />
        </div>
    </div>
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
                                    <!-- dropdown menu-area-->
                                    <li>
                                        <a class="current" href="#" onclick="return false">Пользователь <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown">
                                            <?php if ($user) : ?>
                                                <li><a href="/logout">Выход</a></li>
                                                <li><a href="/registration">Регистрация</a></li>
                                                <li><a href="/cabinet">Личный кабинет</a></li>
                                            <?php else: ?>
                                                <li><a href="/authorization">Авторизация</a></li>
                                                <li><a href="/registration">Регистрация</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </li>
                                    <?php if ($staticPages): ?>
                                        <!-- dropdown menu-area-->
                                        <li>
                                            <a class="current" href="#" onclick="return false">Страницы<i class="fas fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown">
                                                <?php foreach ($staticPages as $pageId => $pageTitle): ?>
                                                    <li><a href="/page/<?= $pageId ?>"><?= $pageTitle ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                        <!-- mobile menu-->
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
