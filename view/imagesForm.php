<?php ob_start(); ?>

<div class="container">
    <h1>Importer une image</h1>
    
    <form action="?action=create" method="POST" enctype="multipart/form-data">
        <label class="form-label" for="file">Images</label>
        <input class="form-control me-2" type="file" name="file" id="file">
        <div id="emailHelp" class="form-text">Taille maximale : 1 mo</div>

        <label class="form-label" for="keyword">Mots-clés</label>
        <input class="form-control me-2" type="text" name="keyword" id="keywords" placeholder="Maison, voiture, Paris...">
        
        <input class="btn btn-primary mt-3" type="submit" value="Publier">
    </form>
</div>

<?php

$content = ob_get_clean();
require 'home.php';