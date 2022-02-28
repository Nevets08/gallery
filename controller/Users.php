<?php

require_once './model/UsersManager.php';

class Users
{
    public static function index()
    {
        if (isset($_SESSION['LOGGED_USER'])) {
            require './view/images/form.php';
        } else {
            require './view/account/createAccountForm.php';
        }
    }

    public static function store()
    {
        $findUser = UsersManager::findUser($_POST['email']);

        if ($findUser->rowCount() >= 1) {
            require './view/account/createAccountForm.php';
            echo '<div class="container"><p class="alert alert-danger" role="alert">Erreur : cette adresse email existe déjà !</p></div>';
            return;
        } else {
            if ($_POST['password'] === $_POST['passwordConfirm']) {
                if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordConfirm'])) {
                    UsersManager::insertUser($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['password']);

                    self::infosSessionUser();
                    $_SESSION['LOGGED_USER'] = true;

                    header("Location: ./?action=create");
                }
            } else {
                echo '<div class="container"><p class="alert alert-danger" role="alert">Erreur : les mots de passes ne correspondent pas.</p></div>';

                require './view/account/createAccountForm.php';
            }
        }
    }

    public static function edit()
    {
        if ($_SESSION["LOGGED_USER"] && $_SESSION['roles'] == 1) {
            if (isset($_POST['roles']) && isset($_POST['id']) && $_POST['roles'] != 'delete') {
                UsersManager::editRole($_POST['id'], $_POST['roles']);

                header("Location: ./index.php?action=adminUsers");
                return;
            } else {
                UsersManager::deleteUser($_POST['id']);
                header("Location: ./index.php?action=adminUsers");
                return;
            }
        }
    }

    public static function isUserLoggedIn(): bool
    {
        return !empty($_SESSION['LOGGED_USER']);
    }

    public static function login()
    {
        require './view/account/loginForm.php';

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $findUser = UsersManager::findUser($_POST['email']);

            if ($findUser->rowCount() > 0) {

                $data = $findUser->fetchAll();

                if (password_verify($_POST['password'], $data[0]['password'])) {
                    $_SESSION['LOGGED_USER'] = true;
                    $_SESSION['id'] = $data[0]['id'];
                    $_SESSION['name'] = $data[0]['name'];
                    $_SESSION['lastname'] = $data[0]['lastname'];
                    $_SESSION['email'] = $data[0]['email'];
                    $_SESSION['signin_date'] = $data[0]['signin_date'];
                    $_SESSION['roles'] = $data[0]['roles'];

                    header("Location: ./?action=create");
                } else {
                    echo '<p class="alert alert-danger">Les identifiants ne correspondent pas !</p>';
                }
            } else {
                echo '<p class="alert alert-danger">Utilisateur non trouvé !</p>';
            }
        }
    }

    public static function infosSessionUser()
    {
        $findUser = UsersManager::findUser($_POST['email']);

        if ($findUser->rowCount() > 0) {

            $data = $findUser->fetchAll();

            $_SESSION['id'] = $data[0]['id'];
            $_SESSION['name'] = $data[0]['name'];
            $_SESSION['lastname'] = $data[0]['lastname'];
            $_SESSION['email'] = $data[0]['email'];
            $_SESSION['signin_date'] = $data[0]['signin_date'];
            $_SESSION['roles'] = $data[0]['roles'];

            return $data;
        } else {
            echo '<p class="alert alert-danger">Les identifiants ne correspondent pas !</p>';
        }
    }

    public static function userAdmin()
    {
        if ($_SESSION["LOGGED_USER"] && $_SESSION['roles'] == 1) {
            $getUsers = UsersManager::getUsers();

            require './view/admin/users.php';

            return $getUsers;
        } else {
            header("Location: ./index.php");
        }
    }
}
