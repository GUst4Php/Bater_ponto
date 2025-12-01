<?php

require_once './funcoes_db.php';
//A classe funcionário é a classe principal, interligada ao banco de dados, 
//Ela cadastra, faz consulta, verifica existência, edita dados

class Funcionario
{
    // atributos
    protected string $nome;
    protected string $email;
    protected string $telefone;
    protected float $salario;
    protected int $horas;
    protected int $nivel;
    protected bool $ativo;

    public function __construct(string $nome, string $email, string $telefone, float $salario, int $horas, int $nivel, bool $ativo)
    {
        $this->__setNome($nome);
        $this->__setEmail($email);
        $this->__setTelefone($telefone);
        $this->__setSalario($salario);
        $this->__setHoras($horas);
        $this->__setNivel($nivel);
        $this->__setAtivo($ativo);
    }
    //Metodos de inserçao da função
    private function __setNome(string $nome)
    {
        $this->nome = $nome;
    }
    private function __setEmail(string $email)
    {
        $this->email = $email;
    }
    private function __setTelefone(string $telefone)
    {
        $this->telefone = $telefone;
    }
    private function __setSalario(float $salario)
    {
        $this->salario = $salario;
    }
    private function __setHoras(int $horas)
    {
        $this->horas = $horas;
    }
    private function __setNivel(int $nivel)
    {
        $this->nivel = $nivel;
    }
    private function __setAtivo(bool $ativo)
    {
        $this->ativo = $ativo;
    }

    //metodos de captura da função
    public function __getNome()
    {
        return $this->nome;
    }
    public function __getEmail()
    {
        return $this->email;
    }
    public function __getTelefone()
    {
        return $this->telefone;
    }
    public function __getSalario()
    {
        return $this->salario;
    }
    public function __getHoras()
    {
        return $this->horas;
    }
    public function __getNivel()
    {
        return $this->nivel;
    }
    public function __getAtivo()
    {
        return $this->ativo;
    }
};


//classe que faz a interligação com o banco de dados
//armazena funções de CRUD, Create, Read, Update, Delete
//recebe a conexão com o banco de dados via PDO
//e um objeto funcionário para manipular os dados
class FuncionarioRepository
{

    public function __construct(protected PDO $conexao) {}

    //função de cadastro de funcionário
    //retorna true se cadastrado com sucesso, false se falhar
    public function cadastrar(Funcionario $funcionario): bool
    {
        $sql = "INSERT INTO funcionarios (nome, email, telefone, salario, horas, nivel, ativo) VALUES (:nome, :email, :telefone, :salario, :horas, :nivel, :ativo)";
        if ($this->conexao) {
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute([
                ':nome' => $funcionario->__getNome(),
                ':email' => $funcionario->__getEmail(),
                ':telefone' => $funcionario->__getTelefone(),
                ':salario' => $funcionario->__getSalario(),
                ':horas' => $funcionario->__getHoras(),
                ':nivel' => $funcionario->__getNivel(),
                ':ativo' => $funcionario->__getAtivo()
            ]);
            return True;
        } else {
            return False;
        }
    }

    //função de inativar funcionário
    //retorna true se inativado com sucesso, false se falhar
    public function InativarFuncionario(Funcionario $funcionario): bool
    {
        $nome = $funcionario->__getNome();
        $query = "update funcionarios set ativo = 0 where nome = :nome";
        if ($this->conexao) {
            $stmt = $this->conexao->prepare($query);
            $stmt->execute([':nome' => $nome]);
            return True;
        } else {
            return False;
        }
    }

    //função de consulta de funcionário
    //retorna um objeto funcionário com os dados preenchidos

    public function __getDadosFuncionario(Funcionario $funcionario): Funcionario
    {

        $nome = $funcionario->__getNome();
        $query = "select * from funcionarios where nome = :nome";
        if ($this->conexao) {
            $stmt = $this->conexao->prepare($query);
            $stmt->execute([':nome' => $nome]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                throw new Exception("Funcionário não encontrado.");
            }
            $funcionario = new Funcionario(
                $result['nome'],
                $result['email'],
                $result['telefone'],
                $result['salario'],
                $result['horas'],
                $result['nivel'],
                $result['ativo']
            );
            return $funcionario;
        } else {
            throw new Exception("Conexão com o banco de dados falhou.");
        }
    }
    //função de edição de funcionário
    //retorna true se editado com sucesso, false se falhar
    public function editarFunc(Funcionario $funcionario): bool
    {
        $sql = "UPDATE funcionarios SET nome = :nome, email = :email, telefone = :telefone, salario = :salario, horas = :horas, nivel = :nivel, ativo = :ativo WHERE nome = :nome";
        if ($this->conexao) {
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute([
                ':nome' => $funcionario->__getNome(),
                ':email' => $funcionario->__getEmail(),
                ':telefone' => $funcionario->__getTelefone(),
                ':salario' => $funcionario->__getSalario(),
                ':horas' => $funcionario->__getHoras(),
                ':nivel' => $funcionario->__getNivel(),
                ':ativo' => $funcionario->__getAtivo()
            ]);
            return True;
        } else {
            return False;
        }
    }
}
