<?php

require './controller/Images.php';
require './view/header.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'create') {
        Images::store();
    } else if ($_GET['action'] == 'search') {
        Images::search();
    } else if ($_GET['action'] == 'detail') {
        Images::detail();
    }
} else {
    Images::index();
}
