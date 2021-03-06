<?php

session_start();

require './controller/Users.php';
require './controller/Images.php';

?>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="/gallery/index.php">Super uploader</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?action=create">Importer</a>
          </li>
          <?php if (Users::isUserLoggedIn() && $_SESSION['roles'] == 1) : ?>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="./index.php?action=adminUsers"><i class="bi bi-gear"></i> Utilisateurs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="./index.php?action=adminImages"><i class="bi bi-gear"></i> Images</a>
            </li>
          <?php endif; ?>
        </ul>
        <?= Users::isUserLoggedIn() ? '<span class="navbar-text">' . $_SESSION['name'] . ' ' . $_SESSION['lastname'] . '</span>' .  '<a class="link-danger m-2" href="./view/account/signout.php">Se déconnecter</a>' : null; ?>
      </div>
    </div>
  </nav>
</header>