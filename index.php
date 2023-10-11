<!DOCTYPE html>
<html lang="en">
<?php 
include 'db_conn.php';
include 'session_start.php';

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('location: view/login.php');
    exit();
}

// Get the requested URL
$request_uri = $_SERVER['REQUEST_URI'];

// Define your routes (e.g., using an associative array)
$routes = [
    '/view' => 'controller/controller.php',  // Example: /view maps to controller.php
    // Define more routes as needed
];

// Default route for 404 errors
$missing_route = '/view/404.php';

// Check if the requested URL matches any defined route
if (isset($routes[$request_uri])) {
    // Include the controller file
    require_once($routes[$request_uri]);
} else {
    // Handle 404 error by redirecting to the error page
    header('Location: ' . $missing_route);
    exit();
}
?>
