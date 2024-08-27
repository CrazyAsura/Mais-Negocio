<?php
    //Include do model User
    require_once("../models/pessoa.php");
    require_once("../models/Message.php");

    //Implementação da classe de Interfaces que será usadas para interações com objeto Person
    class PessoaDAO implements pessoaDAOInterface {

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
        public function Buildpessoa($data) {
            //Instanciando o objeto person a partir da classe User
            $pessoa = new Pessoa();

            //Atribuindo os atributos da entidade Pessoa ao objeto person
            $pessoa->setNome($data['NOME'] ?? null);
            $pessoa->setCpf($data['CPF'] ?? null);
            $pessoa->setCnpj($data['CNPJ'] ?? null);
            $pessoa->setData_nascimento($data['DATA_NASCIMENTO'] ?? null);
            $pessoa->setEmail($data['EMAIL'] ?? null);
            $pessoa->setTipo($data['TIPO'] ?? null);
            $pessoa->setSenha($data['SENHA'] ?? null);
            $pessoa->setEstado($data['ESTADO'] ?? null);
            $pessoa->setUser_token($data['USER_TOKEN'] ?? null);

            return $pessoa;
        }

        public function Insertpessoa(Pessoa $pessoa, $authPerson = false) {
            $stmt = $this->connection->prepare("INSERT INTO pessoa 
            ( NOME, CPF,  EMAIL, data_nascimento, SENHA, USER_TOKEN )
            VALUES ( :nome, :cpf,  :email, :data_nascimento :senha, :user_token )");

            //Atribuir os valores aos parâmetros da declaração preparada
            $nome = $pessoa->getNome();
            $cpf = $pessoa->getCpf();
            //$cnpj = $pessoa->getCnpj();
            $data_nascimento = $pessoa->getData_nascimento();
            $email = $pessoa->getEmail();
            //$tipo = $pessoa->getTipo();
            $senha = $pessoa->getSenha();
            //$estado = $pessoa->getEstado();
            $user_token = $pessoa->getUser_token();

            // Atribuir os valores aos parâmetros da declaração preparada
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            //$stmt->bindParam(':cnpj', $cnpj);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':email', $email);
            //$stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':senha', $senha);
            //$stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':user_token', $user_token);

            // Executar a inserção
            $stmt->execute();

            if ($authPerson) {
                $this->SetTokenUser($user_token->user_token);
            }
        }

        public function Updatepessoa(Pessoa $pessoa) {
            $stmt = $this->connection->prepare("UPDATE pessoa SET
            NOME = :nome, 
            CPF = :cpf,  
            EMAIL = :email, 
            SENHA = :senha");

             //Atribuir os valores aos parâmetros da declaração preparada
             $nome = $pessoa->getNome();
             $cpf = $pessoa->getCpf();
             //$cnpj = $pessoa->getCnpj();
             $email = $pessoa->getEmail();
             //$tipo = $pessoa->getTipo();
             $senha = $pessoa->getSenha();
             //$estado = $pessoa->getEstado();
             $user_token = $pessoa->getUser_token();
 
             // Atribuir os valores aos parâmetros da declaração preparada
             
             $stmt->bindParam(':nome', $nome);
             $stmt->bindParam(':cpf', $cpf);
             //$stmt->bindParam(':cnpj', $cnpj);
             $stmt->bindParam(':email', $email);
             //$stmt->bindParam(':tipo', $tipo);
             $stmt->bindParam(':senha', $senha);
             //$stmt->bindParam(':estado', $estado);
             $stmt->bindParam(':user_token', $user_token);
             // Executar a inserção
             $stmt->execute();
        }

        public function Deletepessoa(Pessoa $pessoaID) {
            $stmt = $this->connection->prepare("DELETE FROM pessoa WHERE pessoa_id = :pessoa_id");
        
            $pessoa_id = $pessoaID->getPessoa_id();

            $stmt->bindParam(':pessoa_id', $pessoa_id);
        
            $stmt->execute();
        
            return true;
        }

        public function VerifyTokenUser($protected = false){
            
        }

        public function SetTokenUser($user_token, $redirect = true){
            //Salvar o token
            $_SESSION["token"] = $user_token;

            if ($redirect) {
                $this->message->setMessage("Seja bem-vindo!", "success", "index.php");
            }
        }

        public function AuthenticationUser($cpf, $senha){
            
        }

        public function ChangeUserPassword(Pessoa $pessoa) {
        }

        public function Searchpessoa($searchData, $limit, $offset) {
            if($searchData!= "")  {

                $query = "SELECT * FROM pessoa WHERE CPF = :searchData";
        
                // Prepare a consulta
                $stmt = $this->connection->prepare($query);

                // Bind dos parâmetros
                $stmt->bindParam(':searchData', $searchData);

                // Execute a consulta
                $stmt->execute();



                if ($stmt->rowCount() === 0 ) {
                   $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
                   $pessoa = $this->Buildpessoa($data);
                   // Retorna os resultados
                   return $pessoa;
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
