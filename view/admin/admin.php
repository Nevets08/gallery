<?php ob_start(); ?>

<div class="container">
    <h1>Utilisateurs</h1>

    <?php foreach ($getUsers as $getUser) : ?>
        <div class="border border-dark p-4 mb-3">
            <div class="row">
                <p><strong>Crée le : </strong><?= $getUser['signin_date'] ?>
                    <strong>ID : </strong><?= $getUser['id'] ?>
                    <strong>Nom : </strong><?= $getUser['lastname'] ?>
                    <strong>Prénom : </strong><?= $getUser['name'] ?>
                </p>
            </div>

            <div class="d-inline d-flex justify-center">
                <form action="?action=editUserRole" method="POST">
                    <label for="Rôles">Modifier</label>

                    <select name="roles" class="form-select" id="Rôles" onchange="submit();">
                        <option value="<?= $getUser['roles'] == 1 ? 1 : 0 ?>"><?= $getUser['roles'] == 1 ? 'Administrateur' : 'Utilisateur' ?></option>
                        <option value="<?= $getUser['roles'] == 1 ? 0 : 1 ?>"><?= $getUser['roles'] == 1 ? 'Utilisateur' : 'Administrateur' ?></option>
                        <option value="delete">Supprimer</option>
                    </select>

                    <input type="hidden" name="id" value="<?= $getUser['id'] ?>"/>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php

$content = ob_get_clean();
require './view/home.php';
