<?php ob_start(); ?>

<div class="container">
    <h1>Se connecter</h1>
    <p>Pas de compte ? <a href="?action=create">S'inscrire</a></p>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input name="password" type="password" class="form-control" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
</div>

<?php

$content = ob_get_clean();
require 'home.php';

?>