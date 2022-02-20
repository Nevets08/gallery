<?php ob_start(); ?>

<div class="container">
    <?php foreach($imageAuthor as $author) : ?>
        <p>Crée par <strong><?= $author['name'] . ' ' . $author['lastname'] ?></strong></p>
    <?php endforeach; ?>

    <?php foreach ($detailImage as $image) : ?>
        <a href="./public/upload/<?= $image['url'] ?>" class="btn btn-primary mb-3" download><i class="bi bi-download"></i> Télécharger</a>
        <p>Mot clés : <?= $image['keywords'] ?></p>
        <img class="img-fluid" src="./public/upload/<?= $image['url'] ?>">
    <?php endforeach; ?>
</div>

<?php

$content = ob_get_clean();
require './view/home.php';
