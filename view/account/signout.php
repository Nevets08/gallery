<?php

session_start();
unset($_SESSION['LOGGED_USER'], $_SESSION);
$_SESSION['LOGGED_USER'] = false;
header("Location: ../../index.php");
