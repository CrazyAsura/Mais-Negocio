<?php
    //Include do model User
    require_once("../models/endereco.php");
    require_once("../models/Message.php");

    //Implementação da classe de Interfaces que será usadas para interações com objeto Person
    class ContatosDAO implements ContatosDAOInterface {

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
        public function BuildContatos($data) {
            //Instanciando o objeto person a partir da classe User
            $contatos = new Contatos();

            //Atribuindo os atributos da entidade Pessoa ao objeto person
            $contatos->setPrefixo_celular($data['PREFIXO_CELULAR'] ?? null);
            $contatos->setCelular($data['CELULAR'] ?? null);
            $contatos->setPrefixo_telefone($data['PREFIXO_TELEFONE'] ?? null);
            $contatos->setTelefone($data['TELEFONE'] ?? null);

            return $contatos;
        }

        public function InsertContatos(Contatos $contatos, $authPerson = false){
            $stmt = $this->connection->prepare("INSERT INTO contatos 
            (PREFIXO_CELULAR, CELULAR, PREFIXO_TELEFONE, TELEFONE)
            VALUES (:prefixo_celular, :celular, :prefixo_telefone, :telefone)");

            $prefixo_celular = $contatos-> getPrefixo_celular();
            $celular= $contatos-> getCelular();
            $prefixo_telefone = $contatos-> getPrefixo_telefone();
            $telefone = $contatos-> getTelefone();

            //Dados para serem inserido na entidade Endereco

            //Vinculando parâmetros
            $stmt->bindParam(':prefixo_celular', $prefixo_celular, PDO::PARAM_STR);
            $stmt->bindParam(':celular', $celular, PDO::PARAM_STR);
            $stmt->bindParam(':prefixo_telefone', $prefixo_telefone, PDO::PARAM_STR); 
            $stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR); 
            // Executar a inserção
            $stmt->execute();

        }
        public function UpdateContatos(Contatos $contatos){
            
        }
        public function DeleteContatos(Contatos $contatosID){
            
        }
        public function SearchContatos($searchData, $limit, $offset){
            if($searchData!= "")  {
                // Construa sua consulta SQL baseada nos parâmetros fornecidos
                $query = "SELECT * FROM Contatos WHERE CELULAR = :searchData";
                //$query = "SELECT * FROM Contatos WHERE TELEFONE = :searchData";
                // Prepare a consulta
                $stmt = $this->connection->prepare($query);

                // Bind dos parâmetros
                $stmt->bindParam(':searchData', $searchData);
                $stmt->bindParam(':prefixo_celular', $prefixo_celular, PDO::PARAM_STR);
                $stmt->bindParam(':celular', $celular, PDO::PARAM_STR);
                $stmt->bindParam(':prefixo_telefone', $prefixo_telefone, PDO::PARAM_STR); 
                $stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR); 

                // Execute a consulta
                $stmt->execute();

                if ($stmt->rowCount() > 0 ) {
                   $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
                   $contatos = $this->BuildContatos($data);
                   // Retorna os resultados
                   return $contatos;
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

