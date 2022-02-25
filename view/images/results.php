<?php

ob_start();

?>

<div class="container mt-3">
    <div class="row">
        <?php if (($selectImages->rowCount()) == 0) : ?>
            <p class="alert alert-danger">Il n'y a aucune image sur cette page</p>
            <a class="btn btn-primary col-2" href="index.php">Retourner à l'accueil</a>
        <?php endif; ?>

        <?php foreach ($selectImages as $selectImage) : ?>
            <?php if ($selectImage['active'] == 1) : ?>
                <div class="col-4 mt-4 d-flex align-items-center">
                    <a href="?action=detail&id=<?= $selectImage['id'] ?>">
                        <img class="img-fluid" src="../../gallery/public/upload/<?= $selectImage['url'] ?>">
                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach ?>
    </div>
</div>

<?php

require './view/pagination.php';

$content = ob_get_clean();
require './view/home.php';
