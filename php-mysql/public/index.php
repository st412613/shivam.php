<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Config\Database;
use App\Models\User;
use \Exception;
try{
    $db = Database::getInstance()->getConnection();
    $user = new User($db);
    echo "Database connection succesful";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $data = file_get_contents('php://input'); 
    $parsed = json_decode($data, true);
    $name = $parsed['name'];
    $email= $parsed['email'];
    $password = $parsed['password'];
    $user->create($name, $email, $password);
    echo "created success full";
    // var_dump($parsed['name']);
}
if($_SERVER['REQUEST_METHOD'] === 'GET'){
   $users = $user->getAll();

echo json_encode($users);
    
}
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $input = file_get_contents("php://input");
    $data = json_decode($input, true);

    if (isset($data['id'])) {
        $id = (int)$data['id'];

        $success = $user->delete($id);

        if ($success) {
            http_response_code(200);
            echo json_encode(["message" => "User deleted successfully."]);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "User not found or failed to delete."]);
        }
    } else {
        http_response_code(400);
        echo json_encode(["message" => "User ID is required."]);
    }
}

}catch(Exception $e){
  echo $e->getMessage();
}


// Use the model

