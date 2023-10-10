<?php 

define('TAXA', 0.015);

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");


$method = $_SERVER['REQUEST_METHOD'];

if($method === 'POST'){
    //recebe o body em formato de string
    $body = file_get_contents("php://input");
    //converte para um array php
    $data = json_decode($body);

//faz um filtro em todos as variaveis impedindo de vir alguma informacao diderente do declarado
    $nome = filter_var($data -> nome, FILTER_SANITIZE_SPECIAL_CHARS);
    $idade = filter_var($data -> idade, FILTER_VALIDATE_INT);
    $curso = filter_var($data -> curso, FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = filter_var($data -> valor, FILTER_VALIDATE_FLOAT);
    $prazo = filter_var($data -> prazo, FILTER_VALIDATE_INT);
//depois dos dados tratados tera uma condicao pra saber se nenhum campo virá vazio
    if(!$nome || !$idade || !$curso || !$valor || !$prazo){
        echo json_encode(['error' => 'campo é obrigatorio']);
        exit;
    }

    if($idade < 18){
       http_response_code(403);
        echo json_encode(['message' => 'Não permitido emprestimo a um menor!']);
    }else if($idade < 25){
        $juros = $valor * (1/100) * $prazo;

    $montante = $valor + $juros;

    $parcela = $montante/$prazo;

    if(file_exists("$nome.txt")){
        http_response_code(409);
        echo json_encode(['error' => 'Ja existe um emprestimo em seu nome!']);
    }else{
    file_put_contents("$nome.txt", "Nome: $nome \n Idade: $idade \n Curso: $curso \n  ");

    
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
    }else{

    $juros = $valor * TAXA * $prazo;

    $montante = $valor + $juros;

    $parcela = $montante/$prazo;


    //inserindo um arquivo txt
    if(file_exists("$nome.txt")){
        http_response_code(409);
        echo json_encode(['error' => 'Ja existe um emprestimo em seu nome!']);
    }else{
    file_put_contents("$nome.txt", "Nome: $nome \n Idade: $idade \n Curso: $curso \n  ");

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
}
   
}else{
    http_response_code(404);
    echo ['message' => 'Essa operação náo é permitida!'];
}
