<?php

ob_start();

?>

<div class="container mt-3">
    <div class="row">
        <?php foreach ($selectImages as $selectImage) : ?>
            <div class="col-4 mt-4 d-flex align-items-center">
                <a href="?action=detail&id=<?= $selectImage['idImages'] ?>">
                    <img class="img-fluid" src="../../gallery/public/upload/<?= $selectImage['url'] ?>">
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?php

$content = ob_get_clean();
require 'home.php';
