<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/admin_header.php' ?>

<div class="blog-body admin-panel" style="margin-top: 150px;">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-xl-6 text-left">
                <h2>Управление пользователями</h2>
            </div>
            <div class="col-12">
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>Имя</th>
                        <th>Аватар</th>
                        <th>О себе</th>
                        <th>E-mail</th>
                        <th>Статус</th>
                        <th>Создание<br>обновление</th>
                        <th>Удалить</th>
                    </tr>

                    <?php foreach ($previews as $preview): ?>
                    <tr>
                        <td><?= $preview['id'] ?></td>
                        <td>
                            <?= $preview['name'] ?>
                            <?= $preview['id'] == $user->id ? ' <br>(это вы) ' : '' ?>
                        </td>
                        <td>
                            <img src="<?= ASSETS_DIR ?>img/avatars/<?= $preview['img'] ?? 'anonimus.jpg' ?>"
                                alt="<?= $preview['img'] ?>" class="article-img">
                        </td>
                        <td><?= $preview['about'] ?></td>
                        <td><?= $preview['email'] ?></td>
                        <td>
                            <form action="/admin/users/edit/<?= $preview['id'] ?>" method="POST" class="user-status-change">
                            <select name="status" class="user-status-selected">
                                <option class="option" value="user"
                                    <?= $preview['status'] == 'user' ? 'selected' : '' ?>>user</option>
                                <option class="option" value="manager"
                                    <?= $preview['status'] == 'manager' ? 'selected' : '' ?>>manager</option>
                                <option class="option" value="admin"
                                    <?= $preview['status'] == 'admin' ? 'selected' : '' ?>>admin</option>
                            </select>
                            <input type="submit" value="ок">
                            </form>
                        </td>
                        <td><?= $preview['create'] . '<br>' . $preview['update'] ?></td>
                        <td>
                            <img src="<?= ASSETS_DIR ?>img/delete.png" alt="delete" class="del"
                            data-toggle="modal" data-target="#modal<?= $preview['id'] ?>">

                            <div class="modal fade" id="modal<?= $preview['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Вы точно хотите удалить пользователя?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><?= $preview['name'] ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
                                            <a href="/admin/users/delete/<?= $preview['id'] ?>">
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
