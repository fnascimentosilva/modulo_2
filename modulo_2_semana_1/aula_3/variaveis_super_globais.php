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
    $data = json_decode($body); //acesso ao body da requisiçao


    //condicao pra validar se o corpo da requisicao esta vindo vazio se sim vai dar o status de erro
    if(isset($data -> nome) === false || empty($data -> nome)){
        http_response_code(400);
        echo json_encode(['error' => 'O nome e obigatorio']);
        exit;
    }
    

    //ler arquivo para jogar dentro do database.txt

    $text = file_get_contents('database.txt');
    $arrayItens = json_decode($text);

    $arrayItens[] = $data;
    file_put_contents('database.txt', json_encode($arrayItens));

    http_response_code(201);
    echo json_encode(['mensagem'=> 'recebi um POST' ]);
}




?>