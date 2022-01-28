<?php

require 'Manager.php';

class Users extends Manager
{
    public static function insertUser($name, $lastname, $password)
    {
        $pdo = self::dbConnect();

        $sql = 'INSERT INTO users (name, lastname, password) VALUES (:name, :lastname, :password)';
        $insertUser = $pdo->prepare($sql);
        $insertUser->execute([
            "name" => $name,
            "lastname" => $lastname,
            "password" => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }
}
