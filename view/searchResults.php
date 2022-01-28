<?php 

ob_start();

?>

<div class="container">
    <h1>Résultats pour : <?= $_POST['search'] ?></h1>
    <div class="row mt-3">
        <?php foreach ($searchImages as $searchImage) : ?>
            <div class="col-4 d-flex align-items-center">
                <img class="img-fluid" src="./public/upload/<?= $searchImage['url'] ?>">
            </div>
        <?php endforeach ?>
    </div>
</div>

<?php

$content = ob_get_clean();
require 'home.php';