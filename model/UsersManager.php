<?php

require_once 'Manager.php';

class UsersManager extends Manager
{
    public static function insertUser($name, $lastname, $email, $password)
    {
        $pdo = self::dbConnect();

        $sql = 'INSERT INTO users (name, lastname, email,password) VALUES (:name, :lastname, :email, :password)';
        $insertUser = $pdo->prepare($sql);
        $insertUser->execute([
            "name" => $name,
            "lastname" => $lastname,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }
}
