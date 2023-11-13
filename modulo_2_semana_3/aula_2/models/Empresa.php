<?php 
require_once 'Funcionario.php';
//criar classes
//criar atributos
//metodos(funcoes)

class Empresa{

    private $nome;
    private $cnpj;
    private $endereco;

    public function __construct($nome, $cnpj) {
        $this->nome = $nome;
        $this->cnpj = $cnpj;
    }

    public function contratar(Funcionario $funcionario){

    }

    public function demitir($id){

    }

    public function listarFuncionarios(){

    }
}

?>