<?php

require_once './model/ImagesManager.php';

class Images
{
    public static function index()
    {
        $selectImages = ImagesManager::getImages();

        require './view/searchForm.php';
        require './view/imageResults.php';

        return $selectImages;
    }

    public static function store()
    {
        if (isset($_FILES['file'])) {
            $tmpName = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $error = $_FILES['file']['error'];

            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));

            $extensions = ['jpg', 'jpeg', 'png', 'gif'];

            $maxSize = 1048576;

            if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
                $imagesManager = new ImagesManager();
                $imagesManager->insertImages($name, $_POST['keyword']);

                move_uploaded_file($tmpName, './public/upload/' . $name);

                header("Location: /gallery/index.php");
            } else {
                echo '<p class="alert alert-danger">Erreur : fichier trop volumieux ou extension non prise en charge</p>';
            }
        }
    }

    public static function search()
    {
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $searchImages = ImagesManager::searchImages($_POST['search']);

            require './view/searchForm.php';
            require './view/searchResults.php';

            return $searchImages;
        } else {
            self::index();
        }
    }

    public static function detail()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $imagesManager = new ImagesManager();
            $detailImage = $imagesManager->getImage($_GET['id']);

            require './view/imageDetail.php';

            return $detailImage;
        }
    }
}
