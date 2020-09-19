<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/admin_header.php' ?>

<div class="blog-body admin-panel" style="margin-top: 150px;">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-xl-12 text-left">
                <h2>Основные настройки сайта</h2>
            </div>
        </div>

        <form action="/admin/settings" method="POST" enctype="multipart/form-data" id="settings">
            <div class="row">
                <div class="col-12">
                    <h5>СЕО-теги</h5>
                    <input type="text" name="keywords"
                        value="<?= $data['keywords'] ?? '' ?>" placeholder="Ключевые слова">
                    <input type="text" name="description"
                        value="<?= $data['description'] ?? '' ?>" placeholder="Description">

                    <h5>Header</h5>
                    <input type="text" name="title"
                        value="<?= $data['title'] ?? '' ?>" placeholder="Заголовок основной страницы">
                    <input type="text" name="subtitle"
                        value="<?= $data['subtitle'] ?? '' ?>" placeholder="Подзаголовок основной страницы">
                </div>
                <div class="col-12">
                    <h5>Footer</h5>
                </div>
                <div class="col-12 col-md-6">
                    <p>Левая колонка (HTML)</p>
                    <textarea name="footerLeft" cols="30" rows="10"><?= $data['footerLeft'] ?? '' ?></textarea>
                </div>
                <div class="col-12 col-md-3">
                    <p>Средняя колонка (HTML)</p>
                    <textarea name="footerCenter" cols="30" rows="10"><?= $data['footerCenter'] ?? '' ?></textarea>
                </div>
                <div class="col-12 col-md-3">
                    <p>Правая колонка (HTML)</p>
                    <textarea name="footerRight" cols="30" rows="10"><?= $data['footerRight'] ?? '' ?></textarea>
                </div>
            </div>
            <div class="row justify-end">
                <div class="col-12 text-right">
                    <p><?= $message ?? '' ?></p>
                    <input type="submit" value="Сохранить изменения" name="changeUserdata">
                </div>
            </div>
        </form>
        <br><hr><br>
        <div class="row">
            <div class="col-12">
                <h5>Информация о системе</h5>
            </div>
            <div class="col-12">
                <?php phpinfo(INFO_GENERAL); ?>
            </div>
        </div>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/admin_footer.php' ?>
