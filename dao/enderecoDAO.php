<?php
    //Include do model User
    require_once("../models/endereco.php");
    require_once("../models/Message.php");

    //Implementação da classe de Interfaces que será usadas para interações com objeto Person
    class EnderecoDAO implements EnderecoDAOInterface {

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
        public function BuildEndereco($data) {
            //Instanciando o objeto person a partir da classe User
            $endereco = new Endereco();

            //Atribuindo os atributos da entidade Pessoa ao objeto person
            $endereco->setEnd_cep($data['END_CEP'] ?? null);
            $endereco->setEnd_logradouro($data['END_LOGRADOURO'] ?? null);
            $endereco->setEnd_numero($data['END_NUMERO'] ?? null);
            $endereco->setEnd_complemento($data['END_COMPLEMENTO'] ?? null);
            $endereco->setEnd_bairro($data['END_BAIRRO'] ?? null);
            $endereco->setEnd_cidade($data['END_CIDADE'] ?? null);
            $endereco->setEnd_uf($data['END_UF'] ?? null);

            return $endereco;
        }

        public function InsertEndereco(Endereco $endereco, $authPerson = false){
            $stmt = $this->connection->prepare("INSERT INTO endereco 
            (END_CEP, END_LOGRADOURO, END_NUMERO, END_COMPLEMENTO, END_BAIRRO, END_CIDADE, END_UF)
            VALUES (:end_cep, :end_logradouro, :end_numero, :end_complemento, :end_bairro, :end_cidade, :end_uf)");

            $end_cep = $endereco-> getEnd_cep();
            $end_logradouro= $endereco-> getEnd_logradouro();
            $end_numero = $endereco-> getEnd_numero();
            $end_complemento = $endereco-> getEnd_complemento();
            $end_bairro = $endereco-> getEnd_bairro();
            $end_cidade = $endereco-> getEnd_cidade();
            $end_uf = $endereco-> getEnd_uf();
            //Dados para serem inserido na entidade Endereco

            //Vinculando parâmetros
            $stmt->bindParam(':end_cep', $end_cep, PDO::PARAM_STR);
            $stmt->bindParam(':end_logradouro', $end_logradouro, PDO::PARAM_STR);
            $stmt->bindParam(':end_numero', $end_numero, PDO::PARAM_STR); 
            $stmt->bindParam(':end_complemento', $end_complemento, PDO::PARAM_STR); 
            $stmt->bindParam(':end_bairro', $end_bairro, PDO::PARAM_STR); 
            $stmt->bindParam(':end_cidade', $end_cidade, PDO::PARAM_STR);
            $stmt->bindParam(':end_uf', $end_uf, PDO::PARAM_STR); 

            // Executar a inserção
            $stmt->execute();

        }
        public function UpdateEndereco(Endereco $endereco){
            
        }
        public function DeleteEndereco(Endereco $enderecoID){
            
        }
        public function SearchEndereco($searchData, $limit, $offset){
            if($searchData!= "")  {
                // Construa sua consulta SQL baseada nos parâmetros fornecidos
                $query = "SELECT * FROM Endereco WHERE END_CEP = :searchData";
                $query = "SELECT * FROM Endereco WHERE END_LOGRADOURO = :searchData";
                $query = "SELECT * FROM Endereco WHERE END_NUMERO = :searchData";
                $query = "SELECT * FROM Endereco WHERE END_COMPLEMENTO = :searchData";
                $query = "SELECT * FROM Endereco WHERE END_BAIRRO = :searchData";
                $query = "SELECT * FROM Endereco WHERE END_CIDADE = :searchData";
                $query = "SELECT * FROM Endereco WHERE END_UF = :searchData";

                // Prepare a consulta
                $stmt = $this->connection->prepare($query);

                // Bind dos parâmetros
                $stmt->bindParam(':end_cep', $end_cep, PDO::PARAM_STR);
                $stmt->bindParam(':end_logradouro', $end_logradouro, PDO::PARAM_STR);
                $stmt->bindParam(':end_numero', $end_numero, PDO::PARAM_STR); 
                $stmt->bindParam(':end_complemento', $end_complemento, PDO::PARAM_STR); 
                $stmt->bindParam(':end_bairro', $end_bairro, PDO::PARAM_STR); 
                $stmt->bindParam(':end_cidade', $end_cidade, PDO::PARAM_STR);
                $stmt->bindParam(':end_uf', $sp_end_uf, PDO::PARAM_STR); 

                // Execute a consulta
                $stmt->execute();

                if ($stmt->rowCount() > 0 ) {
                   $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
                   $endereco = $this->BuildEndereco($data);
                   // Retorna os resultados
                   return $endereco;
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

