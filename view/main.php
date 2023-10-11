<?php 
include '../header/header.php';
include '../header/header_main.php';
include '../session_start.php';


if (!isset($_SESSION['user'])) {
    header('location: login.php');
    exit();
}

?>


<a href="logout.php" class="btn btn-danger m-3">Log out</a>