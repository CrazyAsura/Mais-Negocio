<?php

class Emprestimo{

    //variaveis

    private $emprestimo_id;
    private $valor_solicitado;
    private $valor_aprovado;
    private $parcelas;
    private $estado_pagamento;
    private $total;
    private $juros;
    private $imposto_adicional;
    private $juros_mensal_atraso;
    private $juros_diario_atraso;

    //methods
    //get

    public function getEmprestimo_id(){
        return $this -> emprestimo_id;
    }
    public function getValor_solicitado(){
        return $this -> valor_solicitado;
    }
    public function getValor_aprovado(){
        return $this -> valor_aprovado;
    }
    public function getParcelas(){
        return $this -> parcelas;
    }
    public function getEstado_pagamento(){
        return $this -> estado_pagamento;
    }
    public function getTotal(){
        return $this -> total;
    }
    public function getJuros(){
        return $this -> juros;
    }
    public function getImposto_adicional(){
        return $this -> imposto_adicional;
    }
    public function getJuros_mensal_atraso(){
        return $this -> juros_mensal_atraso;
    }
    public function getJuros_diario_atraso(){
        return $this -> juros_diario_atraso;
        
    }
    
    //set

    public function setEmprestimo_id($emprestimo_id){
        return $this -> emprestimo_id = $emprestimo_id;
    }
    public function setValor_valor_solicitado($valor_valor_solicitado){
        return $this -> valor_solicitado = $valor_valor_solicitado;
    }
    public function setValor_aprovado($valor_aprovado){
        return $this -> valor_aprovado = $valor_aprovado;
    }
    public function setParcelas($parcelas){
        return $this -> parcelas = $parcelas;
    }
    public function setEstado_pagamento($estado_pagamento){
        return $this -> estado_pagamento = $estado_pagamento;
    }
    public function setTotal($total){
        return $this -> total = $total;
    }
    public function setJuros($juros){
        return $this -> juros = $juros;
    }
    public function setImposto_adicional($imposto_adicional){
        return $this -> imposto_adicional = $imposto_adicional;
    }
    public function setJuros_mensal_atraso($juros_mensal_atraso){
        return $this -> juros_mensal_atraso = $juros_mensal_atraso;
    }
    public function setJuros_diario_atraso($juros_diario_atraso){
        return $this -> juros_diario_atraso = $juros_diario_atraso;
    }
}
    interface EmprestimoDAOInterface {
    public function BuildEmprestimo($data);
    public function InsertEmprestimo(Emprestimo $emprestimo, $authPerson = false);
    public function UpdateEmprestimo(Emprestimo $emprestimo);
    public function DeleteEmprestimo(Emprestimo $emprestimoID);
    public function SearchEmprestimo($searchData, $limit, $offset);
    }
?>