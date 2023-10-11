<?php
include '../session_start.php';
class Model {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    function model_register($data) {
        // Extract email and hash the password for security.
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
    
        // Check if a user with the same email already exists in the database.
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // If a user with the same email exists, return 'already_have_an_account'.
        if ($user !== false && $email === $user['email']) {
            return 'email_registered';
        }
        
        if (strlen($data['password']) < 7) {
            return 'password_short';
        }
        
        // If no user with the same email exists, insert the new user into the database.
        $query_register = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($query_register);
        $result = $stmt->execute([$email, $password]);
    
        // Return true if the insertion was successful, or false if there was an error.
        if ($result === true) {
            return 'success';
        } 
        else {
            return 'failed';
        }
    }

}




?>
