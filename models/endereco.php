<?php

class Endereco{

    private $endereco_id;
    private $end_cep;
    private $end_logradouro;
    private $end_numero;
    private $end_complemento;
    private $end_bairro;
    private $end_cidade;
    private $end_uf;

    //methods
    //get

    public function getEndereco_id(){
        return $this -> endereco_id;
    }
    
    public function getEnd_cep(){
        return $this -> end_cep;
    }
    
    public function getEnd_logradouro(){
        return $this -> end_logradouro;
    }
    
    public function getEnd_numero(){
        return $this -> end_numero;
    }
    
    public function getEnd_complemento(){
        return $this -> end_complemento;
    }

    public function getEnd_bairro(){
        return $this -> end_bairro;
    }

    public function getEnd_cidade(){
        return $this -> end_cidade;
    }

    public function getEnd_uf(){
        return $this -> end_uf;
    }

    //set

    public function setEndereco_id($endereco_id){
        return $this -> endereco_id;
    }

    public function setEnd_cep($end_cep){
        return $this -> end_cep;
        }
    public function setEnd_logradouro($end_logradouro){
        return $this -> end_logradouro;
        }
    public function setEnd_numero($end_numero){
        return $this -> end_numero;
        }
    public function setEnd_complemento($end_complemento){
        return $this -> end_complemento;
        }
    public function setEnd_bairro($end_bairro){
        return $this -> end_bairro;
        }
    public function setEnd_cidade($end_cidade){
        return $this -> end_cidade;
        }
    public function setEnd_uf($end_uf){
        return $this -> end_uf;
        }

}

interface EnderecoDAOInterface {
    public function BuildEndereco($data);
    public function InsertEndereco(Endereco $endereco, $authPerson = false);
    public function UpdateEndereco(Endereco $endereco);
    public function DeleteEndereco(Endereco $enderecoID);
    public function SearchEndereco($searchData, $limit, $offset);
    }

?>