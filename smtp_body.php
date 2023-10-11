<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Email content
$subject = 'Password Reset';
$resetLink = 'http://app/page.php?token=' . $token; // Update the URL accordingly
$message = 'Please click the following link to reset your password: <a href="' . $resetLink . '">' . $resetLink . '</a> Have a good day!';

// Send the password reset email using PHPMailer
$mail = new PHPMailer(true);
try {
    // Configure PHPMailer with your SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '_____@gmail.com';
    $mail->Password = '_________';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('______@gmail.com', 'MVC System');
    $mail->addAddress($email);

    // Set email content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send the email
    $mail->send();
    
} catch (Exception $e) {
}

?>
