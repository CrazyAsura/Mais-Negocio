<?php
    //Include do model User
    require_once("../models/access.php");
    require_once("../models/Message.php");

    //Implementação da classe de Interfaces que será usadas para interações com objeto Person
    class AccessDAO implements AccessDAOInterface {

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
        public function BuildAccess($data) {
            //Instanciando o objeto person a partir da classe User
            $access = new Access();

            //Atribuindo os atributos da entidade Pessoa ao objeto person
            $access->setAcesso_id($data['ACESSO_ID'] ?? null);
            $access->setTipo($data['TIPO'] ?? null);
            $access->setAcesso_alterar($data['ACESSO_INSERIR'] ?? null);
            $access->setAcesso_apagar($data['ACESSO_ALTERAR'] ?? null);
            $access->setAcesso_visualizar($data['ACESSO_APAGAR'] ?? null);
            $access->setAcesso_imprimir($data['ACESSO_VISUALIZAR'] ?? null);
            $access->setAcesso_imprimir($data['ACESSO_IMPRIMIR'] ?? null);

            return $access;
        }

        public function InsertAccess(Access $access, $authPerson = false) {
            $stmt = $this->connection->prepare("INSERT INTO Usuarios 
            (TIPO, ACESSO_INSERIR, ACESSO_ALTERAR, ACESSO_APAGAR, ACESSO_VISUALIZAR, ACESSO_IMPRIMIR)
            VALUES (:tipo, :acesso_inserir, :acesso_alterar, :acesso_apagar , :acesso_visualizar , :acesso_imprimir)");

            //Atribuir os valores aos parâmetros da declaração preparada
            
            $tipo = $access->getTipo();
            $acesso_inserir = $access->getAcesso_inserir();
            $acesso_alterar = $access->getAcesso_alterar();
            $acesso_apagar = $access->getAcesso_apagar();
            $acesso_visualizar = $access->getAcesso_visualizar();
            $acesso_imprimir = $access->getAcesso_imprimir();

            //PAREI AQUI

            // Atribuir os valores aos parâmetros da declaração preparada
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':ACESSO_INSERIR', $acesso_inserir);
            $stmt->bindParam(':acesso_alterar', $acesso_alterar);
            $stmt->bindParam(':acesso_apagar', $acesso_apagar);
            $stmt->bindParam(':acesso_visualizar', $acesso_visualizar);
            $stmt->bindParam(':acesso_imprimir', $acesso_imprimir);

            // Executar a inserção
            $stmt->execute();
        }

        public function UpdateAccess(Access $access) {
            $stmt = $this->connection->prepare("UPDATE access SET  
                tipo = :tipo, 
                acesso_inserir = :acesso_inserir, 
                acesso_alterar = :acesso_alterar, 
                acesso_apagar = :acesso_apagar, 
                acesso_visualizar = :acesso_visualizar, 
                acesso_imprimir = :acesso_imprimir 
            WHERE acesso_id = :acesso_id");
            
            //Atribuir os valores aos parâmetros da declaração preparada
            
            $tipo = $access->getTipo();
            $acesso_inserir = $access->getAcesso_inserir();
            $acesso_alterar = $access->getAcesso_alterar();
            $acesso_apagar = $access->getAcesso_apagar();
            $acesso_visualizar = $access->getAcesso_visualizar();
            $acesso_imprimir = $access->getAcesso_imprimir();

            //PAREI AQUI

            // Atribuir os valores aos parâmetros da declaração preparada
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':ACESSO_INSERIR', $acesso_inserir);
            $stmt->bindParam(':acesso_alterar', $acesso_alterar);
            $stmt->bindParam(':acesso_apagar', $acesso_apagar);
            $stmt->bindParam(':acesso_visualizar', $acesso_visualizar);
            $stmt->bindParam(':acesso_imprimir', $acesso_imprimir);
        
            $stmt->execute();
        
            return true;
        }
        
        public function DeleteAccess(Access $access) {
            $stmt = $this->connection->prepare("DELETE FROM access WHERE acesso_id = :acesso_id");
        
            $acesso_id = $access->getAcesso_id();

            $stmt->bindParam(':acesso_id', $acesso_id);
        
            $stmt->execute();
        
            return true;
        }
        
        public function SearchAccess($searchData, $limit, $offset) {
            if($searchData!= "")  {
                $query = "SELECT * FROM access";
        
                $stmt = $this->connection->prepare($query);
        
                $stmt->bindParam(':searchData', $searchData);
        
                $stmt->execute();
        
                if ($stmt->rowCount() === 0 ) {
                    $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $access = $this->Buildaccess($data);
                    return $access;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
?>