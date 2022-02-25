<?php ob_start(); ?>

<div class="container">
    <h1>Images à valider</h1>
    <p>Filtres : afficher images supprimer ou en attente</p>
    <div class="row">
        <?php foreach ($selectImages as $selectImage) : ?>
            <?php if ($selectImage['active'] == 0) : ?>
                <div class="col-3 mt-3">
                    <img class="img-fluid" src="../../gallery/public/upload/<?= $selectImage['url'] ?>">

                    <a class="btn btn-success mt-2" href="?action=imagesEditValidation&validate=1&id=<?= $selectImage['id'] ?>">Valider</a>
                    <a class="btn btn-danger mt-2" href="?action=imagesEditValidation&validate=2&id=<?= $selectImage['id'] ?>">Supprimer</a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require './view/home.php';
?>