<?php ob_start(); ?>

<div class="container">
    <button class="btn btn-primary mb-3"><i class="bi bi-download"></i> Télécharger (0.5 mo)</button>
    <div class="d-flex d-flex justify-content-center">
        <?php foreach ($detailImage as $image) : ?>
            <img class="img-fluid" src="./public/upload/<?= $image['url'] ?>">
        <?php endforeach; ?>
    </div>
</div>

<?php

$content = ob_get_clean();
require 'home.php';
