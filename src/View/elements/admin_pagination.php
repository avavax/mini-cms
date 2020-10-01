<?php $paginationGreed = App\Models\Pagination::getPaginationGreed() ?>

<div class="row">
    <div class="col-6 text-left">
        <div class="next-previous-page">
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="/admin<?= $pagination['slug'] . $pagination['step'] ?>/<?= $pagination['current'] == 1 ? 1 : $pagination['current'] - 1 ?>" tabindex="-1"> &#60; </a>
                    </li>

                    <?php for ($i = 1; $i <= $pagination['max']; $i++): ?>

                        <li class="page-item <?= $pagination['current'] == $i ? 'active' : '' ?>">
                            <a class="page-link" href="/admin<?= $pagination['slug'] . $pagination['step'] . '/' . $i ?>">
                                <?= $i ?>
                            </a>
                        </li>

                    <?php endfor; ?>

                    <li class="page-item">
                        <a class="page-link" href="/admin<?= $pagination['slug'] . $pagination['step'] ?>/<?= $pagination['current'] == $pagination['max'] ? $pagination['max'] : $pagination['current'] + 1 ?>">&#62;</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="col-6 text-right">
        <form action="/admin<?= substr($pagination['slug'], 0, -1) ?>" method="POST">
            <p>Элементов на странице</p>
            <select name="pagination" id="">
                <?php foreach ($paginationGreed as $item): ?>
                    <option value="<?= $item ?>" <?= $pagination['step'] == $item ? 'selected' : '' ?>>
                        <?= $item ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" class="button-pagination" value="вывести">
            <!--<button> вывести</button>-->
        </form>
    </div>
</div>
