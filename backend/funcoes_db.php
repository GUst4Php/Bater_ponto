<?php
require './class_obj.php';
//Esta função faz conexão direta e apenas com o banco de dados de funcionários
//ela retorna a conexão, que vai ser utilizada pela classe FuncionarioRepository
function DB_funcionarios()
{
    $host = '127.0.0.1';
    $db = 'Nexu';
    $user = 'root';
    $password = '';

    try {
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (Exception $e) {
        echo "Erro na conexão com banco de dados Nexu!!, Favor, fazer chamado!" . $e->getMessage();

        return Null;
    }
}

function salarioHora(float $salario, int $horas): float
{
    $salariohora = $salario / $horas;
    return $salariohora;
}

function salarioFuncionario(FuncionarioRepository $funcionarioRepo, $nome): float
{
    $funcionario = $funcionarioRepo->__getDadosFuncionario($nome);
    $salarioHora = salarioHora($funcionario->__getSalario(), $funcionario->__getHoras());
    $salario = $salarioHora * $funcionario->__getHoras();

    return $salario;
}

//Função para formatar o salário no padrão brasileiro
function formatarSalario(string $salario): float
{
    // Substitui a vírgula decimal por ponto decimal
    $salario = str_replace(',', '.', $salario);

    // Converte para float
    return floatval($salario);
}
