<?php

class Funcionario{

    private $id_funcionario;
    private $salario;
    private $status;
    private $cargo;

    //methods
    //get

    public function getId_funcionario(){
        return $this -> id_funcionario;
    }
    
    public function getSalario(){
        return $this -> salario;
    }
    
    public function getStatus(){
        return $this -> status;
    }
    
    public function getCargo(){
        return $this -> cargo;
    }

    //set

    public function setId_funcionario($id_funcionario){
        return $this -> id_funcionario = $id_funcionario;
    }

    public function setSalario($salario){
        return $this -> salario = $salario;
        }

    public function setStatus($status){
        return $this -> status = $status;
        }

    public function setCargo($cargo){
        return $this -> cargo = $cargo;
        }

}

interface funcionarioDAOInterface {
    public function BuildFuncionario($data);
    public function InsertFuncionario(Funcionario $funcionario, $authPerson = false);
    public function UpdateFuncionario(Funcionario $funcionario);
    public function DeleteFuncionario(funcionario $funcionarioID);
    public function SearchFuncionario($searchData, $limit, $offset);
    }

?>