<?php

class Curso{
    private $curso_id;
    private $nomecurso;
    private $descricaocurso;
    private $professor;
    private $duracao;
    private $progresso;
    private $preco;
    private $situacao;
    private $tipo;

    //methods
    //get

    public function getCurso_id(){
        return $this -> curso_id;
    }

    public function getNomecurso(){
        return $this -> nomecurso;
    }

    public function getDescricaocurso(){
        return $this -> descricaocurso;
    }

    public function getProfessor(){
        return $this -> professor;
    }

    public function getDuracao(){
        return $this -> duracao;
    }

    public function getProgresso(){
        return $this -> progresso;
    }

    public function getPreco(){
        return $this -> preco;
    }

    public function getSituacao(){
        return $this -> situacao;
    }

    public function getTipo(){
        return $this -> tipo;
    }

    //set

    public function  setCurso_id($curso_id){
        return $this -> curso_id = $curso_id;
    }

    public function  setNomecurso($nomecurso){
        return $this -> nomecurso = $nomecurso;
    }

    public function  setDescricaocurso($descricaocurso){
        return $this -> descricaocurso = $descricaocurso;
    }

    public function  setProfessor($professor){
        return $this -> professor = $professor;
    }

    public function  setDuracao($duracao){
        return $this -> duracao = $duracao;
    }

    public function  setProgresso($progresso){
        return $this -> progresso = $progresso;
    }

    public function  setPreco($preco){
        return $this -> preco = $preco;
    }

    public function  setSituacao($situacao){
        return $this -> situacao = $situacao;
    }

    public function  setTipo($tipo){
        return $this -> tipo = $tipo;
    }

}

interface CursoDAOInterface {
    public function BuildCurso($data);
    public function InsertCurso(Curso $curso, $authPerson = false);
    public function UpdateCurso(Curso $curso);
    public function DeleteCurso(Curso $cursoID);
    public function SearchCurso($searchData, $limit, $offset);
    } 
?>