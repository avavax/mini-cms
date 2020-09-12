<!-- Pagination -->
<div class="col-xl-12">
    <div class="next-previous-page">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="<?= $pagination['slug'] ?><?= $pagination['current'] == 1 ? 1 : $pagination['current'] - 1 ?>" tabindex="-1"> &#60; </a>
                </li>

                <?php for ($i = 1; $i <= $pagination['max']; $i++): ?>

                    <li class="page-item <?= $pagination['current'] == $i ? 'active' : '' ?>">
                        <a class="page-link" href="<?= $pagination['slug'] . $i ?>"><?= $i ?></a>
                    </li>

                <?php endfor; ?>

                <li class="page-item">
                    <a class="page-link" href="<?= $pagination['slug'] ?><?= $pagination['current'] == $pagination['max'] ? $pagination['max'] : $pagination['current'] + 1 ?>">&#62;</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
