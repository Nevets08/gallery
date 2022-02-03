<?php ob_start(); ?>

<div class="container">
    <h1>Rejoignez la communauté de Super Uploader</h1>
    <p>Vous avez déjà un compte ? <a href="?action=login">Se connecter</a></p>
    <form action="?action=create-account" method="POST">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Prénom</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" required>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="emailHelp" required>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="passwordConfirm" class="form-label">Confirmation du mot de passe</label>
                    <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
        <div id="emailHelp" class="form-text">Nous ne partagerons jamais vos informations avec qui que ce soit d'autre.</div>
</div>
</form>
</div>

<?php

$content = ob_get_clean();
require 'home.php';
