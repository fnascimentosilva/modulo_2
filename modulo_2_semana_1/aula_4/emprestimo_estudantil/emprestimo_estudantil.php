<?php 

define('TAXA', 0.015);

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");


$method = $_SERVER['REQUEST_METHOD'];

if($method === 'POST'){
    $body = file_get_contents("php://input");
    $data = json_decode($body);


    $nome = filter_var($data -> nome, FILTER_SANITIZE_SPECIAL_CHARS);
    $idade = filter_var($data -> idade, FILTER_VALIDATE_INT);
    $curso = filter_var($data -> curso, FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = filter_var($data -> valor, FILTER_VALIDATE_FLOAT);
    $prazo = filter_var($data -> prazo, FILTER_VALIDATE_INT);

    if(!$nome || !$idade || !$curso || !$valor || !$prazo){
        echo json_encode(['error' => 'campo é obrigatorio']);
    }

    $juros = $valor * TAXA * $prazo;

    $montante = $valor + $juros;

    $parcela = $montante/$prazo;

    echo json_encode([
        'nome' => $nome,
        'curso' => $curso,
        'valor_curso' => $valor,
        'prazo_pagamento' => $prazo,
        'juros' => $juros,
        'parcela' => number_format($parcela,2),
        'valor_total' => $montante
    ]);

   
}


?>