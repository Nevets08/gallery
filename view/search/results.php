<?php

ob_start();

?>

<div class="container">
    <h1><?= $searchImages->rowCount() ?> résultat<?= $searchImages->rowCount() > 1 ? 's' : ''; ?> pour : <?= $_POST['search'] ?></h1>
    <div class="row mt-3">
        <?php foreach ($searchImages as $searchImage) : ?>
            <div class="col-4 d-flex align-items-center">
                <a href="?action=detail&id=<?= $searchImage['id'] ?>">
                    <img class="img-fluid" src="./public/upload/<?= $searchImage['url'] ?>">
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?php

$content = ob_get_clean();
require './view/home.php';
