<?php

require './view/header.php';
require './controller/Users.php';
require './controller/Images.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'create') {
        Users::index();
    } else if ($_GET['action'] == 'search') {
        Images::search();
    } else if ($_GET['action'] == 'detail') {
        Images::detail();
    } else if ($_GET['action'] == 'create-account') {
        Users::store();
    }
} else {
    Images::index();
}
