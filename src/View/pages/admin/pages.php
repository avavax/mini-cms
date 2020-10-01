<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/admin_header.php' ?>

<div class="blog-body admin-panel" style="margin-top: 150px;">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-xl-6 text-left">
                <h2>Управление статическими страницами</h2>
            </div>
            <div class="col-xl-6 text-right">
                <a href="/admin/pages/add"><button>Добавить страницу</button></a>
            </div>
            <div class="col-12">
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>Название</th>
                        <th>Картинка</th>
                        <th>Шаблон</th>
                        <th>Создание<br>обновление</th>
                        <th>Удалить</th>
                    </tr>
                    <?php foreach ($previews as $preview): ?>
                    <tr>
                        <td><?= $preview['id'] ?></td>
                        <td>
                            <a href="/admin/pages/edit/<?= $preview['id'] ?>">
                                <?= $preview['title'] ?>
                            </a>
                        </td>
                        <td>
                            <?php if ($preview['img'] ): ?>
                                <img src="<?= ASSETS_DIR . 'img/blog/'. $preview['img'] ?>"
                                alt="<?= $preview['img'] ?>" class="article-img">
                            <?php else: ?>
                                <p>Нет картинки</p>
                            <?php endif ?>
                        </td>
                        <td><?= $preview['template'] ?></td>

                        <td><?= $preview['create'] . '<br>' . $preview['update'] ?></td>
                        <td>
                            <img src="<?= ASSETS_DIR ?>img/delete.png" alt="delete" class="del"
                            data-toggle="modal" data-target="#modal<?= $preview['id'] ?>">

                            <div class="modal fade" id="modal<?= $preview['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Вы точно хотите удалить страницу?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><?= $preview['title'] ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
                                            <a href="/admin/pages/delete/<?= $preview['id'] ?>">
                                                <button type="button" class="btn btn-danger">Удалить</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

         <?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/admin_pagination.php' ?>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/admin_footer.php' ?>
