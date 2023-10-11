<?php 
include '../header/header.php';
include '../header/header_new_password.php';
include '../session_start.php';
require '../token_checker.php';

if (isset($_SESSION['user'])) {
    header('location: index.php');
    exit(); 
}
?>

<div class="new-password-container">
    <div class="new-password-box container text-white mt-sm-2 p-2 p-sm-4">
        <div class="logo-container pb-5">
            <img src="../images/icon-inverted.png" alt="">
        </div>
        <h2 class="mb-4">Reset Password</h2>
        <form id="new_password_form">
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" id="token" name="token" value="<?php echo $token; ?>" hidden>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Reset Password</button>
        </form>
    </div>
</div>
