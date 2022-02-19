<?php

class Manager

{
    protected static function dbConnect()
    {
        $dsn = "mysql:dbname=gallery;host=localhost";
        $user = "root";
        $password = "root";

        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"
        );

        try {
            $pdo = new PDO($dsn, $user, $password, $options);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Connexion échouée' . $e->getMessage();
        }
    }
}