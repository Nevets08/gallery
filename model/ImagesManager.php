<?php

require_once 'Manager.php';

class ImagesManager extends Manager
{
    public static function getImages($imagesPerPage, $limitMin)
    {
        $pdo = self::dbConnect();

        $sql = 'SELECT * FROM images ORDER BY createdAt DESC LIMIT ' . $imagesPerPage . ' OFFSET ' . $limitMin . '';
        $selectImages = $pdo->prepare($sql);
        $selectImages->execute();

        return $selectImages;
    }

    public static function getImage($id)
    {
        $pdo = self::dbConnect();

        $sql = 'SELECT * FROM images WHERE id = :id';
        $detailImage = $pdo->prepare($sql);
        $detailImage->execute([
            "id" => $id,
        ]);

        return $detailImage;
    }

    public static function insertImages($url, $keywords)
    {
        $pdo = self::dbConnect();

        $sql = 'INSERT INTO images (url, keywords, idUser) VALUES (:url, :keywords, :idUser)';
        $insertImages = $pdo->prepare($sql);
        $insertImages->execute([
            "url" => $url,
            "keywords" => $keywords,
            "idUser" => $_SESSION['id']
        ]);

        return $insertImages;
    }

    public static function searchImages($keywords)
    {
        $pdo = self::dbConnect();

        $sql = 'SELECT * FROM images WHERE keywords LIKE :keywords';
        $searchImages = $pdo->prepare($sql);
        $searchImages->execute([
            "keywords" => '%' . $keywords . '%',
        ]);

        return $searchImages;
    }

    public static function authorOfTheImage($id)
    {
        $pdo = self::dbConnect();

        $sql = 'SELECT name, lastname FROM users INNER JOIN images ON images.idUser = users.id WHERE images.id = :id LIMIT 1';
        $imageAuthor = $pdo->prepare($sql);
        $imageAuthor->execute([
            "id" => $id
        ]);

        return $imageAuthor;
    }

    public static function adminImagesValidation($id, $active)
    {
        $pdo = self::dbConnect();

        $sql = 'UPDATE images SET active = :active WHERE images.id = :id';
        $imagesSuccess = $pdo->prepare($sql);
        $imagesSuccess->execute([
            "id" => $id,
            "active" => $active
        ]);

        return $imagesSuccess;
    }
}
