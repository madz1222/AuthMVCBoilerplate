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

    function model_token_checker($data) {
        $token = $data['token'];
        
        if (!isset($token) || empty($token)) {
            return 'invalid';
        }

        $query = "SELECT token, token_expiration FROM users WHERE token = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$token]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user === false) {
            return 'invalid'; // Token not found in the database
        }
        
        if ($token !== $user['token']) {
            return 'invalid'; // Token mismatch
        }

        if ($user && $token == $user['token']) {
            $token_expiration_time = strtotime($user['token_expiration']);
            $current_time = time();
        
            if ($current_time < $token_expiration_time) {
                return 'valid';
            } else {
                return 'expired';
            }
        } 
    }

    function model_new_password($data) {
        $result = $this->model_token_checker($data);

        if ($result == "valid") {
            $password = password_hash($data['password'], PASSWORD_DEFAULT);
            $token = $data['token'];

            if (strlen($data['password']) < 7) {
                return 'password_short';
            }
            // Update the password
            $query = "UPDATE users SET password = ? WHERE token = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$password, $token]);
            

            // Check if the password update was successful
            if ($stmt->rowCount() > 0) {
                // Generate a new token and set the expiration time
                $new_token = $this->generate_token();
                $expiration_time = strtotime('+1 hour');
                $expiration_time_formatted = date('Y-m-d H:i:s', $expiration_time);

                // Update the token and expiration time
                $update_query = "UPDATE users SET token = ?, token_expiration = ? WHERE token = ?";
                $update_stmt = $this->pdo->prepare($update_query);
                $update_stmt->execute([$new_token, $expiration_time_formatted, $token]);

                // Check if the token update was successful
                if ($update_stmt->rowCount() > 0) {
                    return 'success';
                }
            }
        } 
        // If any part of the process fails, return an appropriate error message
        return $result ;
    }

}




?>
