<?php 
include '../header/header.php';
include '../header/header_main.php';
include '../session_start.php';


if (!isset($_SESSION['user'])) {
    header('location: login.php');
    exit();
} else {
    header('location: main.php');
}

?>