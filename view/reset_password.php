<?php 
include '../header/header.php';
include '../header/header_reset_password.php';
include '../session_start.php';

if (isset($_SESSION['user'])) {
    header('location: index.php');
    exit(); 
}
?>

<div class="reset-password-container">
    <div class="reset-password-box container text-white mt-sm-2 p-2 p-sm-4">
        <div class="logo-container pb-5">
            <img src="../images/icon-inverted.png" alt="">
        </div>
        <h2 class="mb-4">Reset your password</h2>
        <form id="reset_password_form">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Reset Password</button>
            <div class="login-link mt-3">
                <p>Remembered your account? &nbsp;&nbsp;<a class="login" href="login.php">Log in</a></p>
            </div>
        </form>
    </div>
</div>
