<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/admin_header.php' ?>

<div class="blog-body admin-panel" style="margin-top: 150px;">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-xl-12 text-right">
                <h2><?= isset($data['id']) ? 'Редактирование' : 'Добавление' ?> статической страницы</h2>
            </div>
        </div>

        <form action="/admin/pages/add" method="POST" enctype="multipart/form-data" id="article-add">
            <input type="hidden" name="id" value="<?= $data['id'] ?? '' ?>">
            <div class="row">

                <div class="col-12 col-md-4">
                    <?php if (isset($data['img'])): ?>
                        <input type="hidden" name="oldImg" value="<?= $data['img'] ?? '' ?>">
                        <img src="<?= ASSETS_DIR ?>img/blog/<?= $data['img'] ?>" alt="<?= $data['img'] ?>">
                    <?php endif; ?>
                    <p>Вы можете загрузить картинку c расширением png, jpg, jpeg, bmp, gif, размером не более 2 Мб.</p><br>
                    <input type="file" name="image"><br><br>
                    <p class="message-error"><?= $errors['img'] ?? '' ?></p>

                    <p>Используемый шаблон</p>
                    <select name="template" id="template">
                        <?php foreach($data['templateList'] as $item): ?>
                            <option value="<?= $item ?>"
                                <?= isset($data['template']) && $item == $data['template'] ? 'selected' : '' ?>>
                                <?= $item ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <br><br><p>Дополнительные CSS-стили</p>
                    <textarea name="css"><?= $data['css'] ?? '' ?></textarea>
                </div>

                <div class="col-12 col-md-8">
                    <input type="text" name="title" value="<?= $data['title'] ?? '' ?>" placeholder="Заголовок">
                    <p class="message-error"><?= $errors['title'] ?? '' ?></p><br>
                    <input type="text" name="subtitle" value="<?= $data['subtitle'] ?? '' ?>" placeholder="Подзаголовок">
                    <p class="message-error"><?= $errors['subtitle'] ?? '' ?></p><br>

                    <p>Основной контент страницы</p>
                    <textarea class="wysiwyg" name="content"><?= $data['content'] ?? '' ?></textarea>
                    <p class="message-error"><?= $errors['content'] ?? '' ?></p>

                    <br><p>Дополнительный контент страницы (HTML) </p>
                    <textarea name="aside"><?= $data['aside'] ?? '' ?></textarea>
                    <p class="message-error"><?= $errors['aside'] ?? '' ?></p>
                </div>

            </div>
            <div class="row justify-end">
                <div class="col-12 text-right">
                    <br><p class="text-success"><?= $message ?? '' ?></p><br>
                    <input type="submit" value="Сохранить статью" name="changeUserdata">
                </div>

            </div>
        </form>

    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/admin_footer.php' ?>
