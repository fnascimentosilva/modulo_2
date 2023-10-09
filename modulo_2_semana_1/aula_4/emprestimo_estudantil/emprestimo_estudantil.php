<?php 


header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");


$method = $_SERVER['REQUEST_METHOD'];

if($method === 'POST'){
    $body = file_get_contents("php://input");
    $data = json_decode($body);

    echo json_encode($data);
}


?>