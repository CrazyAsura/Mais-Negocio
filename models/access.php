<?php
    //Classe model da entidade Acesso
    class Access {
        //Variáveis privadas que são atributos da entidade Acesso
        private $acesso_id;
        private $tipo;
        private $acesso_inserir;
        private $acesso_alterar;
        private $acesso_apagar;
        private $acesso_visualizar;
        private $acesso_imprimir;

        //Métodos GET para buscar propriedades do objeto Access
        public function getAcesso_id() {
            return $this -> acesso_id;
        }
        
        public function getTipo() {
            return $this -> tipo;
        }


        public function getAcesso_inserir() {
            return $this -> acesso_inserir;
        }

        public function getAcesso_alterar() {
            return $this -> acesso_alterar;
        }
        
        public function getAcesso_apagar() {
            return $this -> acesso_apagar;
        }
        
        public function getAcesso_visualizar() {
            return $this -> acesso_visualizar;
        }

        public function getAcesso_imprimir() {
            return $this -> acesso_imprimir;
        }
        
        //Métodos SET para setar valores nos atributos do objeto Access
        public function setAcesso_id($acesso_id) {
            $this -> acesso_id = $acesso_id;
        }

        public function setTipo($tipo) {
            $this -> tipo = $tipo;
        }

        public function setAcesso_inserir($acesso_inserir) {
            $this -> acesso_inserir = $acesso_inserir;
        }

        public function setAcesso_alterar($acesso_alterar) {
            $this -> acesso_alterar = $acesso_alterar;
        }
        
        public function setAcesso_apagar($acesso_apagar) {
            $this -> acesso_apagar = $acesso_apagar;
        }
        
        public function setAcesso_visualizar($acesso_visualizar) {
            $this -> acesso_visualizar = $acesso_visualizar;
        }

        public function setAcesso_imprimir($acesso_imprimir) {
            $this -> acesso_imprimir = $acesso_imprimir;
        }
    }

    //Interfaces que serão usadas para interações com objeto Access
    interface AccessDAOInterface {
        public function BuildAccess($data);
        public function InsertAccess(Access $access, $authPerson = false);
        public function UpdateAccess(Access $acesso_id);
        public function DeleteAccess(Access $acesso_id);
        public function SearchAccess($searchData, $limit, $offset);
    }
?>