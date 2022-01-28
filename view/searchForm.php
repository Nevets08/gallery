<?php ob_start() ?>

<div class="container">
    <form action="?action=search" method="POST" class="d-flex justify-content-center">
        <input class="form-control me-2" type="search" name="search" autofocus placeholder="Rechercher des photos gratuites" required>
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
    </form>
</div>

<?php

$content = ob_get_clean();
require 'home.php';