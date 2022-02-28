<?php

require_once './model/ImagesManager.php';

class Images
{
    public static $currentPage;
    public static $imagesPerPage = 5;

    public static function indexPagination()
    {
        self::$currentPage = (int)($_GET['page'] ?? 1);

        if (self::$currentPage <= 0) {
            header("Location: index.php?page=1");
        }

        $minimumLimit = (self::$currentPage - 1) * self::$imagesPerPage;

        $selectImages = ImagesManager::getImagesPagination(self::$imagesPerPage, $minimumLimit);

        require './view/search/form.php';
        require './view/images/results.php';

        return $selectImages;
    }

    public static function index()
    {
        $allImages = ImagesManager::getImages();
        require './view/admin/images.php';
        
        return $allImages;
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
                ImagesManager::insertImages($name, $_POST['keyword'], $_SESSION['id']);

                move_uploaded_file($tmpName, './public/upload/' . $name);

                header("Location: /gallery/index.php");
            } else {
                require './view/imagesForm.php';

                echo '<p class="alert alert-danger">Erreur : fichier trop volumieux ou extension non prise en charge</p>';
            }
        }
    }

    public static function search()
    {
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $searchImages = ImagesManager::searchImages($_POST['search']);

            require './view/search/form.php';
            require './view/search/results.php';

            return $searchImages;
        } else {
            self::indexPagination();
        }
    }

    public static function detail()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $detailImage = ImagesManager::getImage($_GET['id']);
            $imageAuthor = ImagesManager::authorOfTheImage($_GET['id']);

            $details = [$detailImage, $imageAuthor];

            require './view/images/detail.php';

            return $details;
        }
    }

    public static function imagesAdmin()
    {
        if ($_SESSION["LOGGED_USER"] && $_SESSION['roles'] == 1) {
            $selectImages = ImagesManager::getImagesPagination(5, 2);
            require './view/admin/images.php';
            return $selectImages;
        } else {
            header("Location: ./index.php");
        }
    }

    public static function validateImageAdmin()
    {
        if ($_SESSION["LOGGED_USER"] && $_SESSION['roles'] == 1) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                ImagesManager::adminImagesValidation($_GET['id'], $_GET['validate']);
                header("Location: index.php?action=adminImages");
            }
        }
    }
}
