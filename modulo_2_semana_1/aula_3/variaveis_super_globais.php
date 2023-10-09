<?php 

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];

if($method === 'GET') {
    $text = file_get_contents('database.txt');

    $data = json_decode($text);

    echo json_encode(['products' => $data]);


    
}else if($method === 'POST') {
    $body = file_get_contents("php://input");
    $data = json_decode($body);
    var_dump($data);

    //ler arquivo para jogar dentro do database.txt

    $text = file_get_contents('database.txt');
    $arrayItens = json_decode($text);

    
    echo json_encode(['mensagem'=> 'recebi um POST' ]);
}




?>