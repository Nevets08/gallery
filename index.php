<?php

require './view/header.php';
// faire un switch ou autre
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'create') {
        Users::index();
    } else if ($_GET['action'] == 'search') {
        Images::search();
    } else if ($_GET['action'] == 'detail') {
        Images::detail();
    } else if ($_GET['action'] == 'create-image') {
        Images::store();
    } else if ($_GET['action'] == 'create-account') {
        Users::store();
    } else if ($_GET['action'] == 'login') {
        Users::login();
    } else if ($_GET['action'] == 'adminUsers') {
        Users::userAdmin();
    } else if ($_GET['action'] == 'editUserRole') {
        Users::edit();
    } else if ($_GET['action'] == 'adminImages') {
        Images::index();
    } else if ($_GET['action'] == 'imagesEditValidation') {
        Images::validateImageAdmin();
    }
} else {
    Images::indexPagination();
}