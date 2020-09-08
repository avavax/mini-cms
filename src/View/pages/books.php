<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/header.php' ?>

<div class="content">
    <div class="container mt-5 mb-5">
        <h1 class="display-4">Список книг</h1>
        <table class="table">
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= $book->id ?></td>
                    <td><?= $book->title ?></td>
                    <td><?= $book->author ?></td>
                    <td><?= $book->year ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . VIEW_DIR . 'elements/footer.php' ?>
