<?php
    //A classe funcionário é a classe principal, interligada ao banco de dados, 
    //Ela cadastra, faz consulta, verifica existência, edita dados

    class Funcionario {
        // atributos
        protected string $nome;
        protected string $email;
        protected string $telefone;
        protected float $salario;
        protected int $horas;
        protected int $nivel;
        protected bool $ativo;

        public function __construct(string $nome, string $email, string $telefone, float $salario, int $horas, int $nivel, bool $ativo){
            $this->__setNome($nome);
            $this->__setEmail($email);
            $this->__setTelefone($telefone);
            $this->__setSalario($salario);
            $this->__setHoras($horas);
            $this->__setNivel($nivel);
            $this->__setAtivo($ativo);
        }
        //Metodos de inserçao da função
        private function __setNome(string $nome){
            $this->nome = $nome;
        }
        private function __setEmail(string $email){
            $this->email = $email;
        }
        private function __setTelefone(string $telefone){
            $this->telefone = $telefone;
        }
        private function __setSalario(float $salario) {
            $this->salario = $salario;
        }
        private function __SetHoras(int $horas){
            $this->horas = $horas;
        }
        private function __setNivel(int $nivel){
            $this->nivel = $nivel;
        }
        private function __setAtivo(bool $ativo){
            $this->ativo = $ativo;
        }

        //metodos de captura da função
        public function __getNome(){
            return $this->nome;
        } 
        public function __getEmail(){
            return $this->email;
        }
        public function __getTelefone(){
            return $this->telefone;
        }
        public function __getSalario(){
            return $this->salario;
        }
        public function __getHoras(){
            return $this->horas;
        }
        public function __getNivel(){
            return $this->nivel;
        }
        public function __getAtvivo(){
            return $this->ativo;
        }
        };

    class FuncionarioRepository{
        
    }