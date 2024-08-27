<?php

class Pessoa{
    
    private $pessoa_id;
    private $nome;
    private $cpf;
    private $cnpj;
    private $data_nascimento;
    private $email;
    private $tipo;
    private $senha;
    private $estado;
    private $user_token;

    //methods
    //get

    public function getPessoa_id(){
        return $this -> pessoa_id;
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
    
    public function getData_nascimento(){
        return $this -> data_nascimento;
    }

    public function getEmail(){
        return $this -> email;
    }
    
    public function getTipo(){
        return $this -> tipo;
    }
    
    public function getSenha(){
        return $this -> senha;
    }
 
    public function getEstado(){
        return $this -> estado;
    }
 
    public function getUser_token(){
        return $this -> user_token;
    }
 
    //set

    public function setCad_id($pessoa_id){
        return $this -> pessoa_id = $pessoa_id;
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

    public function setData_nascimento($data_nascimento){
        $this -> data_nascimento = $data_nascimento;
        }

    public function setEmail($email){
        $this -> email = $email;
        }

    public function setTipo($tipo){
        $this -> tipo = $tipo;
        }

    public function setSenha($senha){
        $this -> senha = $senha;
        }
 
    public function setEstado($estado){
        $this -> estado = $estado;
        }
 
    public function setUser_token($user_token){
        $this -> user_token = $user_token;
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

interface pessoaDAOInterface {
    public function Buildpessoa($data);
    public function Insertpessoa(Pessoa $pessoa, $authPerson = false);
    public function Updatepessoa(Pessoa $pessoa);
    public function Deletepessoa(Pessoa $pessoaID);
    public function Searchpessoa($searchData, $limit, $offset);
    }

?>