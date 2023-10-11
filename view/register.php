<?php 
include '../header/header.php';
include '../header/header_register.php';
include '../session_start.php';

if (isset($_SESSION['user'])) {
    header('location: index.php');
    exit(); 
}
?>

<div class="register-container">
    <div class="register-box container text-white mt-sm-2 p-2 p-sm-4">
        <div class="logo-container pb-5">
            <img src="../images/icon-inverted.png" alt="">
        </div>
        <h2 class="mb-3">Create your account</h2>
        <form id="register_form">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group mt-2">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Sign up</button>
            <div class="login-link mt-3">
                <p>Already a member? &nbsp;&nbsp;<a class="login" href="login.php">Log in</a></p>
            </div>
        </form>
    </div>
</div>
