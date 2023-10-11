<?php
session_start(); // Start the session, if not already started

// Destroy the session
session_destroy();

// Redirect or perform any other actions after destroying the session
header('Location: login.php'); // Redirect to another page, if needed
exit();
?>
