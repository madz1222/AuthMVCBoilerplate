<?php
$model_dir = '../model/';

require_once $model_dir . 'model_login.php';
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

    function controller_login() {
        $data = json_decode($_POST['data'], true);
        $response = array(); 
    
        $result = $this->model->model_login($data);
        if ($result === 'success') {
            // Registration successful
            $response['success'] = 'success';
        } 
        elseif ($result === 'failed') {
            // User already has an account
            $response['error'] = 'login_failed';
        } 
        else {
            // Handle other errors or invalid input here
            $response['error'] = 'login_error';
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
