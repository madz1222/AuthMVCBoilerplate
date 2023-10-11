<?php
include '../session_start.php';
class Model {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    function model_login($data) {
        $email = $data['email'];
        $password = $data['password'];
    
        $query = "SELECT email, password FROM users WHERE email = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            // Verify the provided password against the hashed password from the database
            if (password_verify($password, $user['password'])) {
                // Password is correct
                unset($user['password']);
                $_SESSION['user'] = $user;
                return 'success';
            }
        }
    
        return 'failed'; // Invalid credentials
    }    

}




?>
