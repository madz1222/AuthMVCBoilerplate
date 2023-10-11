<?php
$model_dir = '../model/';

require_once $model_dir . 'model_new_password.php';
require_once '../db_conn.php'; 

class Controller {
    private $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function handle_request() {
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
    
            if (method_exists($this, $action)) {
                $this->$action(); 
            } else {
                echo "Unsupported action: $action";
            }
        }
    }

    function controller_token_checker() {
        $data = json_decode($_POST['data'], true);
        $response = array(); 
    
        $result = $this->model->model_token_checker($data);
        if ($result === 'valid') {
            // Registration successful
            $response['success'] = 'valid';
        }
        elseif ($result === 'invalid') {
            // User already has an account
            $response['error'] = 'invalid';
        } 
        elseif ($result === 'expired') {
            // User already has an account
            $response['error'] = 'expired';
        } 
        else {
            // Handle other errors or invalid input here
            $response['error'] = 'reset_password_error';
        }
    
        // Send the response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    function controller_new_password() {
        $data = json_decode($_POST['data'], true);
        $response = array(); 
    
        $result = $this->model->model_new_password($data);
        if ($result === 'success') {
            // Registration successful
            $response['success'] = 'success';
        }
        elseif ($result === 'invalid') {
            // User already has an account
            $response['error'] = 'invalid';
        } 
        elseif ($result === 'expired') {
            // User already has an account
            $response['error'] = 'expired';
        } 
        elseif ($result === 'password_short') {
            // User already has an account
            $response['error'] = 'password_short';
        } 
        else {
            // Handle other errors or invalid input here
            $response['error'] = 'reset_password_error';
        }
    
        // Send the response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }
    

}

// Create an instance of the Model and the Controller
$model = new Model($pdo); 
$controller = new Controller($model);

$controller->handle_request();
