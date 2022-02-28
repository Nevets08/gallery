<?php ob_start(); ?>

<div class="container">
    
    <?php foreach ($detailImage as $image) : ?>
        <?php foreach ($imageAuthor as $author) : ?>
            <p>Crée par <strong><?= $author['name'] . ' ' . $author['lastname'] ?></strong> le <?= $image['createdAt'] ?></p>
        <?php endforeach; ?>

        <a href="./public/upload/<?= $image['url'] ?>" class="btn btn-primary" download><i class="bi bi-download"></i> Télécharger</a>

        <?php if (Users::isUserLoggedIn() && $_SESSION['roles'] == 1) : ?>
            <a class="btn btn-danger" href="?action=imagesEditValidation&validate=2&id=<?= $image['id'] ?>">Supprimer</a>
        <?php endif; ?>

        <p class="mt-2">Mot clés : <?= $image['keywords'] ?></p>
        <img class="img-fluid" src="./public/upload/<?= $image['url'] ?>">
    <?php endforeach; ?>
</div>

<?php

$content = ob_get_clean();
require './view/home.php';
