<?php

require_once 'Manager.php';

class ImagesManager extends Manager
{
    public static function getImages()
    {
        $pdo = self::dbConnect();

        $sql = 'SELECT * FROM images';
        $selectImages = $pdo->prepare($sql);
        $selectImages->execute();

        return $selectImages;
    }

    public static function getImage($id)
    {
        $pdo = self::dbConnect();

        $sql = 'SELECT * FROM images WHERE idImages = :id';
        $detailImage = $pdo->prepare($sql);
        $detailImage->execute([
            "id" => $id,
        ]);

        return $detailImage;
    }

    public static function insertImages($url, $keywords)
    {
        $pdo = self::dbConnect();

        $sql = 'INSERT INTO images (url, keywords) VALUES (:url, :keywords)';
        $insertImages = $pdo->prepare($sql);
        $insertImages->execute([
            "url" => $url,
            "keywords" => $keywords
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
}
