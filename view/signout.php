<?php

session_start();
unset($_SESSION['LOGGED_USER']);
header("Location: /gallery/index.php");