<?php

class Contatos{

    private $id_contato;
    private $prefixo_celular;
    private $celular;
    private $prefixo_telefone;
    private $telefone;

    //methods
    //get

    public function getId_contatos(){
        return $this -> id_contato;
    }
    
    public function getPrefixo_celular(){
        return $this -> prefixo_celular;
    }
    
    public function getCelular(){
        return $this -> celular;
    }
    
    public function getPrefixo_telefone(){
        return $this -> prefixo_telefone;
    }
    
    public function getTelefone(){
        return $this -> telefone;
    }

    //set

    public function setId_contatos($id_contato){
        return $this -> id_contato = $id_contato;
    }
    
    public function setPrefixo_celular($prefixo_celular){
        return $this -> prefixo_celular = $prefixo_celular;
    }

    public function setCelular($celular){
        return $this -> celular = $celular;
        }
    public function setPrefixo_telefone($prefixo_telefone){
        return $this -> prefixo_telefone = $prefixo_telefone;
        }
    public function setTelefone($telefone){
        return $this -> telefone = $telefone;
        }

}

interface ContatosDAOInterface {
    public function BuildContatos($data);
    public function InsertContatos(Contatos $contatos, $authPerson = false);
    public function UpdateContatos(Contatos $contatos);
    public function DeleteContatos(Contatos $contatosID);
    public function SearchContatos($searchData, $limit, $offset);
    }

?>