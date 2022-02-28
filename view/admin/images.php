<?php ob_start(); ?>

<div class="container">
    <h1>Images à valider</h1>
    <p>Filtres : afficher images supprimer ou en attente</p>
    <div class="row">
        <?php foreach ($allImages as $allImage) : ?>
            <?php if ($allImage['active'] == 0) : ?>
                <div class="col-3 mt-3">
                    <a href="?action=detail&id=<?= $allImage['id'] ?>">
                        <img class="img-fluid" src="../../gallery/public/upload/<?= $allImage['url'] ?>">
                    </a>

                    <a class="btn btn-success mt-2" href="?action=imagesEditValidation&validate=1&id=<?= $allImage['id'] ?>">Valider</a>
                    <a class="btn btn-danger mt-2" href="?action=imagesEditValidation&validate=2&id=<?= $allImage['id'] ?>">Supprimer</a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require './view/home.php';
?>