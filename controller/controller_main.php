<?php
require_once '../model/model_main.php'; 
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
                $this->$action(); // Call the matching controller method
            } else {
                echo "Unsupported action: $action";
            }
        }
    }
    

}

// Create an instance of the Model and the Controller
$model = new Model($pdo); 
$controller = new Controller($model);

$controller->handle_request();

