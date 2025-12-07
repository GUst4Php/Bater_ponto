<?php

require_once './funcoes_db.php';
require_once './class_obj.php';

// Captura os dados do formulário
$nome = $_POST['nome'];
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$telefone = $_POST['telefone'];
$salario = formatarSalario($_POST['salario']);
$horas = intval($_POST['Horas']);
$nivel = intval($_POST['Nivel']);
$ativo = ($_POST['Ativo']);

//Validando os dados recebidos
if (empty($nome) || empty($email) || empty($telefone) || empty($salario) || empty($horas) || empty($nivel)) {
    die("Erro: Todos os campos são obrigatórios.");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Erro: Email inválido.");
}
if (!is_numeric($salario) || $salario <= 0) {
    die("Erro: Salário inválido.");
}
if ($horas <= 0) {
    die("Erro: Horas inválidas.");
}
if ($nivel < 1 || $nivel > 5) {
    die("Erro: Nível inválido.");
}

// Cria uma instância do repositório de funcionários
$funcionarioRepo = new FuncionarioRepository(DB_funcionarios());
// Criando um novo funcionário
$novoFuncionario = new Funcionario($nome, $email, $telefone, $salario, $horas, $nivel, $ativo);
// Adiciona o funcionário ao banco de dados
if ($funcionarioRepo->cadastrarFuncionario($novoFuncionario)) {
    echo "Funcionário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar funcionário.";
}
header("Location: ../frontend/cadastros.html");
exit();
