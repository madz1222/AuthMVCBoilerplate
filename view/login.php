<?php 
include '../header/header.php';
include '../header/header_login.php';
include '../session_start.php';

if (isset($_SESSION['user'])) {
    header('location: index.php');
    exit(); 
}
?>

<div class="login-container">
    <div class="login-box container text-white mt-sm-2 p-2 p-sm-4">
        <div class="logo-container pb-5">
            <img src="../images/icon-inverted.png" alt="">
        </div>
        <h2 class="mb-4">Welcome</h2>
        <form id="login_form">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group mt-2">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Login</button>
            <div class="register-link mt-4">
                <p class="mt-2">Not a member yet? &nbsp;<a class="registration" href="register.php">Sign up</a></p>
                <p class="mt-2">Forgot <a class="registration" href="reset_password.php">Password</a>?</p>
            </div>
        </form>
    </div>
</div>
