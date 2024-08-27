<?php
    //Include do model User
    require_once("../models/conta.php");
    require_once("../models/Message.php");

    //Implementação da classe de Interfaces que será usadas para interações com objeto Person
    class ContaDAO implements ContaDAOInterface {

        private $connection;
        private $path;
        private $message;

        //Cria(Constrói) a conexão com o banco de dados
        public function __construct(PDO $conn, $url) {
            $this->connection = $conn;
            $this->path = $url;
            $this->message = new Message($url);
        }

        //Instanciando o objeto User a partir da classe User
        public function BuildConta($data) {
            //Instanciando o objeto person a partir da classe User
            $conta = new Conta();

            //Atribuindo os atributos da entidade Pessoa ao objeto person
            $conta->setNome($data['NOME'] ?? null);
            $conta->setCpf($data['Cpf'] ?? null);
            $conta->setCnpj($data['Cnpj'] ?? null);
            $conta->setTipo_de_conta($data['Tipo_de_conta'] ?? null);
            $conta->setData_de_criacao($data['Data_de_criacao'] ?? null);
            $conta->setGastos($data['Gastos'] ?? null);
            $conta->setValor($data['Valor'] ?? null);
            $conta->setSaldo($data['Saldo'] ?? null);
            $conta->setTotal($data['Total'] ?? null);
            $conta->setExtrato($data['Extrato'] ?? null);

            return $conta;
        }

        public function InsertConta(Conta $conta, $authPerson = false) {
            $stmt = $this->connection->prepare("INSERT INTO Usuarios 
            (NOME, CPF, DATA_DE_CRIACAO, GASTOS, VALOR, SALDO, TOTAL, EXTRATO)
            VALUES (:nome, :cpf, :data_de_criacao , :gastos , :valor, :saldo, :total, :extrato)");

            //Atribuir os valores aos parâmetros da declaração preparada
            
            $nome = $conta->getNome();
            $cpf = $conta->getCpf();
            //$cnpj = $conta->getCnpj();
            //$tipo_de_conta = $conta->getTipo_de_conta();
            $data_de_criacao = $conta->getData_de_criacao();
            $gastos = $conta->getGastos();
            $valor = $conta->getValor();
            $saldo = $conta->getSaldo();
            $total = $conta->getTotal();
            $extrato = $conta->getExtrato();

            //PAREI AQUI

            // Atribuir os valores aos parâmetros da declaração preparada
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':data_de_criacao', $data_de_criacao);
            $stmt->bindParam(':gastos', $gastos);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':saldo', $saldo);
            $stmt->bindParam(':total', $total);
            $stmt->bindParam(':extrato', $extrato);


            // Executar a inserção
            $stmt->execute();
        }

        public function UpdateConta(Conta $conta) {
            $stmt = $this->connection->prepare("UPDATE conta SET  
                NOME = :nome, 
                CPF = :cpf, 
                DATA_DE_CRIACAO = :data_de_criacao, 
                GASTOS = :gastos, 
                VALOR = :valor, 
                SALDO = :saldo,
                TOTAL = :total,
                EXTRATO = :extrato
            WHERE conta_id = :conta_id");
            
            //Atribuir os valores aos parâmetros da declaração preparada
            
            $nome = $conta->getNome();
            $cpf = $conta->getCpf();
            //$cnpj = $conta->getCnpj();
            //$tipo_de_conta = $conta->getTipo_de_conta();
            $data_de_criacao = $conta->getData_de_criacao();
            $gastos = $conta->getGastos();
            $valor = $conta->getValor();
            $saldo = $conta->getSaldo();
            $total = $conta->getTotal();
            $extrato = $conta->getExtrato();
           
            //PAREI AQUI
           
            // Atribuir os valores aos parâmetros da declaração preparada
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':data_de_criacao', $data_de_criacao);
            $stmt->bindParam(':gastos', $gastos);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':saldo', $saldo);
            $stmt->bindParam(':total', $total);
            $stmt->bindParam(':extrato', $extrato);
           
           
            // Executar a inserção
            $stmt->execute();
        
            return true;
        }
        
        public function DeleteConta(Conta $conta) {
            $stmt = $this->connection->prepare("DELETE FROM conta WHERE conta_id = :conta_id");
        
            $conta_id = $conta->getconta_id();

            $stmt->bindParam(':conta_id', $conta_id);
        
            $stmt->execute();
        
            return true;
        }
        
        public function SearchConta($searchData, $limit, $offset) {
            if($searchData!= "")  {
                $query = "SELECT * FROM conta WHERE conta_id = :conta_id";
        
                $stmt = $this->connection->prepare($query);
        
                $stmt->bindParam(':searchData', $searchData);
        
                $stmt->execute();
        
                if ($stmt->rowCount() === 0 ) {
                    $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $conta = $this->BuildConta($data);
                    return $conta;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
?>