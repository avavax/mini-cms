<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/header.php' ?>

<div class="content">
    <div class="container mt-5 mb-5">
        <h1>Ошибка <?= $error ?></h1>
        <h2><?= $message ?></h2>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/footer.php' ?>
