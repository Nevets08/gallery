<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-12 my-4 d-flex justify-content-around">
            <?php if (Images::$currentPage > 1) : ?>
                <a class="btn btn-primary" href="?page=<?= Images::$currentPage - 1 ?>">Page précédente</a>
            <?php endif; ?>

            <?php if (($selectImages->rowCount()) >= Images::$imagesPerPage) : ?>
                <a class="btn btn-primary" href="?page=<?= Images::$currentPage + 1 ?>">Page suivante</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php

$content = ob_get_clean();
require 'home.php';

?>