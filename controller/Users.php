<?php

require_once './model/UsersManager.php';
class Users
{
    public static function index()
    {
        if (isset($_SESSION)) {
            require './view/imagesForm.php';
        } else {
            require './view/createAccountForm.php';
        }
    }

    public static function store()
    {
        if ($_POST['password'] === $_POST['passwordConfirm']) {
            UsersManager::insertUser($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['password']);

            require './view/imagesForm.php';
        } else {
            require './view/createAccountForm.php';

            echo '<div class="container"><div class="alert alert-danger" role="alert">Erreur : les mots de passes ne correspondent pas.</div></div>';
        }
    }
}
