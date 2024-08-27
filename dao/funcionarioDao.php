<?php
    //Include do model User
    require_once("../models/funcionario.php");
    require_once("../models/Message.php");

    //Implementação da classe de Interfaces que será usadas para interações com objeto Person
    class FuncionarioDAO implements funcionarioDAOInterface {

        private $id_funcionario;
        private $salario;
        private $status;
        private $cargo;

        //Cria(Constrói) a conexão com o banco de dados
        public function __construct(PDO $conn, $url) {
            $this->connection = $conn;
            $this->path = $url;
            $this->message = new Message($url);
        }

        //Instanciando o objeto User a partir da classe User
        public function BuildFuncionario($data) {
            //Instanciando o objeto person a partir da classe User
            $funcionario = new pessoa();

            //Atribuindo os atributos da entidade Pessoa ao objeto person
            $funcionario->setId_funcionario($data['ID_FUNCIONARIO'] ?? null);
            $funcionario->setSalario($data['SALARIO'] ?? null);
            $funcionario->setStatus($data['STATUS'] ?? null);
            $funcionario->setCargo($data['CARGO'] ?? null);

            return $funcionario;
        }

        public function InsertFuncionario(Funcionario $funcionario, $authPerson = false) {
            $stmt = $this->connection->prepare("INSERT INTO Usuarios 
            (ID_FUNCIONARIO, SALARIO, STATUS, CARGO)
            VALUES (:id_funcionario, :salario, :status, :cargo)");

            //Atribuir os valores aos parâmetros da declaração preparada
            $id_funcionario = $funcionario->getId_funcionario();
            $salario = $funcionario->getSalario();
            $status = $funcionario->getStatus();
            $cargo = $funcionario->getCargo();

            //PAREI AQUI

            // Atribuir os valores aos parâmetros da declaração preparada
            $stmt->bindParam(':id_funcionario', $id_funcionario);
            $stmt->bindParam(':salario', $salario);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':cargo', $cargo);

            // Executar a inserção
            $stmt->execute();
        }

        public function UpdateFuncionario(Funcionario $id_funcionario) {

        }

        public function DeleteFuncionario(Funcionario $id_funcionario) {

        }

        public function SearchFuncionario($searchData, $limit, $offset) {
            if($searchData!= "")  {
                // Construa sua consulta SQL baseada nos parâmetros fornecidos
                $query = "SELECT * FROM funcionario WHERE id_funcionario = :searchData";
        
                // Prepare a consulta
                $stmt = $this->connection->prepare($query);

                // Bind dos parâmetros
                $stmt->bindParam(':searchData', $searchData);

                // Execute a consulta
                $stmt->execute();

                if ($stmt->rowCount() === 0 ) {
                   $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
                   $funcionario = $this->BuildFuncionario($data);
                   // Retorna os resultados
                   return $funcionario;
                } else {
                    //Retorno caso não tenha encontrado o usuário
                    return false;
                }
            } else {
                //Retorno caso o e-mail venha vazio 
                return false;
            }
        }
    }
?>