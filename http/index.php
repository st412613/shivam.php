<?php
header("Content-Type: application/json");
// header("Connection: keep-alive");
$server = $_SERVER['REQUEST_METHOD'];
if($server == 'GET'){
    $data = ['shivam' => 'raja'];
    echo json_encode($data);
    echo json_encode($_GET);
}
if($server == 'POST'){
    echo "WOW POST";
    echo json_encode($_SERVER);

echo json_encode(file_get_contents("php://input"));

}
// print $server;