<?php

require_once './model/UsersManager.php';

class Users
{
    public static function index()
    {
        if (isset($_SESSION['LOGGED_USER'])) {
            require './view/imagesForm.php';
        } else {
            require './view/createAccountForm.php';
        }
    }

    public static function store()
    {
        $findUser = UsersManager::findUser($_POST['email']);

        if ($findUser->rowCount() >= 1) {
            require './view/createAccountForm.php';
            echo '<div class="container"><p class="alert alert-danger" role="alert">Erreur : cette adresse email existe déjà !</p></div>';
            return;
        }

        if ($_POST['password'] === $_POST['passwordConfirm']) {
            if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordConfirm'])) {
                UsersManager::insertUser($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['password']);

                require './view/imagesForm.php';

                $_SESSION['LOGGED_USER'] = true;
                $_SESSION['name'] = $_POST['name'];
                $_SESSION['lastname'] = $_POST['lastname'];
                $_SESSION['email'] = $_POST['email'];
            }
        } else {
            require './view/createAccountForm.php';

            echo '<div class="container"><p class="alert alert-danger" role="alert">Erreur : les mots de passes ne correspondent pas.</p></div>';
        }
    }

    public static function isUserLoggedIn(): bool
    {
        return !empty($_SESSION['LOGGED_USER']);
    }

    public static function login()
    {
        require './view/loginForm.php';
        // A retravailler avec un switch?
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $findUser = UsersManager::findUser($_POST['email']);

            if ($findUser->rowCount() > 0) {

                $data = $findUser->fetchAll();

                if (password_verify($_POST['password'], $data[0]['password'])) {
                    header("Location: ./?action=create");

                    $_SESSION['LOGGED_USER'] = true;
                    $_SESSION['name'] = $data[0]['name'];
                    $_SESSION['lastname'] = $data[0]['lastname'];
                    $_SESSION['email'] = $data[0]['email'];
                } else {
                    echo '<p class="alert alert-danger">Les identifiants ne correspondent pas !</p>';
                }
            } else {
                echo '<p class="alert alert-danger">Les identifiants ne correspondent pas !</p>';
            }
        }
    }
}
