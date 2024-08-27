<?php

class Conta{
    
    private $conta_id;
    private $nome;
    private $cpf;
    private $cnpj;
    private $tipo_de_conta;
    private $data_de_criacao;
    private $gastos;
    private $valor;
    private $saldo;
    private $total;
    private $extrato;

    //methods
    //get

    public function getconta_id(){
        return $this -> conta_id;
    }
    
    public function getNome(){
        return $this -> nome;
    }
    
    public function getCpf(){
        return $this -> cpf;
    }
    
    public function getCnpj(){
        return $this -> cnpj;
    }
    
    public function getTipo_de_conta(){
        return $this -> tipo_de_conta;
    }
    
    public function getData_de_criacao(){
        return $this -> data_de_criacao;
    }

    public function getGastos(){
        return $this -> gastos;
    }
    
    public function getValor(){
        return $this -> valor;
    }
    
    public function getSaldo(){
        return $this -> saldo;
    }
 
    public function getTotal(){
        return $this -> total;
    }
    
    public function getExtrato(){
        return $this -> extrato;
    }
 
    
 
    //set

    public function setConta_id($conta_id){
        return $this -> conta_id = $conta_id;
    }

    public function setNome($nome){
        $this -> nome = $nome;
    }
        
    public function setCpf($cpf){
        $this -> cpf = $cpf;
    }

    public function setCnpj($cnpj){
        $this -> cnpj = $cnpj;
    }

    public function setTipo_de_conta($tipo_de_conta){
            return $this -> tipo_de_conta = $tipo_de_conta;
    }

    public function setData_de_criacao($data_de_criacao){
        $this -> data_de_criacao = $data_de_criacao;
    }

    public function setGastos($gastos){
        $this -> gastos = $gastos;
    }

    public function setValor($valor){
        $this -> valor = $valor;
    }

    public function setSaldo($saldo){
        $this -> saldo = $saldo;
    }

    public function setTotal($total){
            return $this -> total = $total;
    }
 
    public function setExtrato($extrato){
        $this -> extrato = $extrato;
    }

        //Gera o token de transações do usuário
    public function generateToken()
    {
        //Converte dados binários em uma representação hexadecimal
        return bin2hex(random_bytes(80));
    }

    public function generatePassword($password)
    {
        /*Cria um hash de senha. o hash da senha é armazenado.
            Um hash é uma sequência de caracteres gerada por um algoritmo
            de hash que transforma os dados de entrada (a senha, nesse caso)
        em uma sequência de caracteres alfanuméricos.*/
        return password_hash($password, PASSWORD_DEFAULT);
    }
 
}

interface ContaDAOInterface {
    public function BuildConta($data);
    public function InsertConta(Conta $conta, $authPerson = false);
    public function UpdateConta(Conta $conta);
    public function DeleteConta(Conta $contaID);
    public function SearchConta($searchData, $limit, $offset);
    }

?>