<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= VIEW_DIR . 'assets/css/bootstrap.style.css'?>">
    <link rel="stylesheet" href="<?= VIEW_DIR . 'assets/css/custom.css'?>">
    <title><?= $title ?></title>
</head>
<body>
<div class="wrapper">
    <header>
        <div class="bs-component">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                    <a class="navbar-brand" href="/">My MiniCMS</a>
                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item <?= $title == 'Index Page' ? 'active' : '' ?>">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item <?= $title == 'About Company' ? 'active' : '' ?>">
                                <a class="nav-link" href="/about">About</a>
                            </li>
                            <li class="nav-item <?= $title == 'Books' ? 'active' : '' ?>">
                                <a class="nav-link" href="/books">Books</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/test1/items/test2/100/">Test</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
