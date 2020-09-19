<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/admin_header.php' ?>

<div class="blog-body admin-panel" style="margin-top: 150px;">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-xl-12 text-right">
                <h2><?= isset($data['id']) ? 'Редактирование' : 'Добавление' ?> статьи</h2>
            </div>
        </div>

        <form action="/admin/articles/add" method="POST" enctype="multipart/form-data" id="article-add">
            <input type="hidden" name="id" value="<?= $data['id'] ?? '' ?>">
            <div class="row">
                <div class="col-12 col-md-4">
                    <?php if (!empty($data['img'])): ?>
                        <input type="hidden" name="oldImg" value="<?= $data['img'] ?? '' ?>">
                        <img src="<?= ASSETS_DIR ?>img/blog/<?= $data['img'] ?>" alt="<?= $data['img'] ?>">
                    <?php endif; ?>
                    <p>Вы можете загрузить картинку c расширением png, jpg, jpeg, bmp, gif, размером не более 2 Мб.</p><br>
                    <input type="file" name="image"><br><br>
                    <p class="message-error"><?= $errors['img'] ?? '' ?></p>
                </div>
                <div class="col-12 col-md-8">
                    <input type="text" name="title" value="<?= $data['title'] ?? '' ?>" placeholder="Заголовок">
                    <p class="message-error"><?= $errors['title'] ?? '' ?></p><br>
                    <textarea class="wysiwyg" name="content"><?= $data['content'] ?? '' ?></textarea>
                    <p class="message-error"><?= $errors['content'] ?? '' ?></p>
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

                    <!--<<ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#text-tab" role="tab" aria-controls="home" aria-selected="true">Текст</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#ht-tab" role="tab" aria-controls="profile" aria-selected="false">HTML</a>
                        </li>
                    </ul>
                    div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="text-tab" role="tabpanel" aria-labelledby="home-tab">
                            <textarea name="content"><?= $data['clearText'] ?? '' ?></textarea>
                        </div>
                        <div class="tab-pane fade" id="ht-tab" role="tabpanel" aria-labelledby="profile-tab">
                            <textarea name="content"><?= $data['content'] ?? '' ?></textarea>
                        </div>
                    </div>
                    <p class="message-error"><?= $errors['content'] ?? '' ?></p>-->







