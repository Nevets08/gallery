<?php

require_once 'Manager.php';

class UsersManager extends Manager
{
    public static function insertUser($name, $lastname, $email, $password)
    {
        $pdo = self::dbConnect();

        $sql = 'INSERT INTO users (name, lastname, email, password) VALUES (:name, :lastname, :email, :password)';
        $insertUser = $pdo->prepare($sql);
        $insertUser->execute([
            "name" => $name,
            "lastname" => $lastname,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }

    public static function editRole($id, $roles)
    {
        $pdo = self::dbConnect();

        $sql = 'UPDATE users SET roles = :roles WHERE users.id = :id';
        $editUser = $pdo->prepare($sql);
        $editUser->execute([
            "id" => $id,
            "roles" => $roles
        ]);

        return $editUser;
    }

    public static function getUsers()
    {
        $pdo = self::dbConnect();

        $sql = 'SELECT * FROM users ORDER BY signin_date DESC';
        $getUsers = $pdo->prepare($sql);
        $getUsers->execute();

        return $getUsers;
    }

    public static function findUser($email)
    {
        $pdo = self::dbConnect();

        $sql = 'SELECT * FROM users WHERE email = :email';
        $findUser = $pdo->prepare($sql);
        $findUser->execute([
            "email" => $email
        ]);

        return $findUser;
    }
}
