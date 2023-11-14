<?php 
require_once 'Funcionario.php';
//criar classes
//criar atributos
//metodos(funcoes)

class Empresa{
    private $nome;
    private $cnpj; // implementar o get e set
    private $endereco; // implementar o get e set

    public function __construct($nome, $cnpj)
    {
        $this->nome = $nome;
        $this->cnpj = $cnpj;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function contratar(Funcionario $funcionario)
    {
        $data = [
            'id' => $funcionario->getId(),
            'nome' => $funcionario->getNome(),
            'idade' => $funcionario->getIdade(),
            'cpf' => $funcionario->getCpf(),
            'salario' => $funcionario->getSalario()
        ];

        $allData = readFileContent('files/funcionarios.txt');
        array_push($allData, $data);
        saveFileContent('files/funcionarios.txt', $allData);
    }

    public function demitir(string $id)
    {
        $allData = readFileContent('files/funcionarios.txt');

        $filteredData =  array_values(array_filter($allData, function ($item) use ($id) {
            return $item->id !== $id;
        }));

        saveFileContent('files/funcionarios.txt', $filteredData);
    }

    public function listarFuncionarios()
    {
        $data = readFileContent('files/funcionarios.txt');
        return $data;
    }

    public function aumentarSalario(Funcionario $funcionario, $novaSalario)
    {
        // ........ IMPLEMENTACAO DO ALUNO..........
    }
}

?>