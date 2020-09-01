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
    <?= $header ?>
    <?= $pageContent ?>
    <?= $footer ?>
</div>
</body>
</html>