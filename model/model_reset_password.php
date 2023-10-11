<?php
include '../session_start.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Model {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    function generate_token() {
        $length = 64; // You can adjust the length as needed
        // Generate a cryptographically secure random string
        $bytes = random_bytes($length);
        // Encode the bytes in base64 to make it URL-safe
        $token = base64_encode($bytes);
        // Remove any non-alphanumeric characters
        $token = preg_replace('/[^a-zA-Z0-9]/', '', $token);
        return substr($token, 0, $length);
    }
    
    function model_reset_password($data) {
        $email = $data['email'];
        $token = $this->generate_token();

        $expiration_time = strtotime('+1 hour');
        $expiration_time_formatted = date('Y-m-d H:i:s', $expiration_time);

        $stmt = $this->pdo->prepare("UPDATE users SET token = :token, token_expiration = :expiration_time WHERE email = :email");
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':expiration_time', $expiration_time_formatted);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            try {
                include '../smtp_body.php';
                return 'success';
            } catch (Exception $e) {
                // Error occurred while sending email
                return 'email_error';
            }
        } else {
            try {
                include '../smtp_body.php';
                return 'no_email_db';
            } catch (Exception $e) {
                // Error occurred while sending email
                return 'email_error';
            }
        }

    }

}




?>
