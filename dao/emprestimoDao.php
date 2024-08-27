<?php
    //Include do model User
    require_once("../models/emprestimoDao.php");
    require_once("../models/Message.php");

    //Implementação da classe de Interfaces que será usadas para interações com objeto Person
    class EmprestimoDao implements EmprestimoDAOInterface {

        private $connection;
        private $path;
        private $message;

        //Cria(Constrói) a conexão com o banco de dados
        public function __construct(PDO $conn, $url) {
            $this->connection = $conn;
            $this->path = $url;
            $this->message = new Message($url);
        }

        //Instanciando o objeto Emprestimo a partir da classe Emprestimo
        public function BuildEmprestimo($data) {
            //Instanciando o objeto person a partir da classe Emprestimo
            $emprestimo = new Emprestimo();

            //Atribuindo os atributos da entidade Pessoa ao objeto person
            $emprestimo->setValor_valor_solicitado($data['VALOR_SOLICITADO'] ?? null);
            $emprestimo->setValor_aprovado($data['VALOR_APROVADO'] ?? null);
            $emprestimo->setParcelas($data['PARCELAS'] ?? null);
            $emprestimo->setEstado_pagamento($data['ESTADO_PAGAMENTO'] ?? null);
            $emprestimo->setTotal($data['TOTAL'] ?? null);
            $emprestimo->setJuros($data['JUROS'] ?? null);
            $emprestimo->setImposto_adicional($data['IMPOSTO_ADICIONAL'] ?? null);
            $emprestimo->setJuros_mensal_atraso($data['JUROS_MENSAL_ATRASO'] ?? null);
            $emprestimo->setJuros_diario_atraso($data['JUROS_DIARIO_ATRASO'] ?? null);

            return $emprestimo;
        }

        public function InsertEmprestimo(Emprestimo $emprestimo, $authPerson = false) {
            $stmt = $this->connection->prepare("INSERT INTO emprestimo 
            (VALOR_SOLICITADO, VALOR_APROVADO, PARCELAS, ESTADO_PAGAMENTO, TOTAL, JUROS, IMPOSTO_ADICIONAL
            JUROS_MENSAL_ATRASO, JUROS_DIARIO_ATRASO)
            VALUES ( :valor_solicitado, :valor_aprovado, :parcelas, :estado_pagamento, :total, :juros, 
            :imposto_adicional, :juros_mensal_atraso, :juros_diario_atraso)");

            //Atribuir os valores aos parâmetros da declaração preparada
            $valor_solicitado = $emprestimo->getvalor_solicitado();
            $valor_aprovado = $emprestimo->getvalor_aprovado();
            $parcelas = $emprestimo->getparcelas();
            $estado_pagamento = $emprestimo->getestado_pagamento();
            $total = $emprestimo->gettotal();
            $juros = $emprestimo->getjuros();
            $imposto_adicional = $emprestimo->getimposto_adicional();
            $juros_mensal_atraso = $emprestimo->getjuros_mensal_atraso();
            $juros_diario_atraso = $emprestimo->getjuros_diario_atraso();

            // Atribuir os valores aos parâmetros da declaração preparada
            $stmt->bindParam(':valor_solicitado', $valor_solicitado);
            $stmt->bindParam(':valor_aprovado', $valor_aprovado);
            $stmt->bindParam(':parcelas', $parcelas);
            $stmt->bindParam(':estado_pagamento', $estado_pagamento);
            $stmt->bindParam(':total', $total);
            $stmt->bindParam(':juros', $juros);
            $stmt->bindParam(':imposto_adicional', $imposto_adicional);
            $stmt->bindParam(':juros_mensal_atraso', $juros_mensal_atraso);
            $stmt->bindParam(':juros_diario_atraso', $juros_diario_atraso);

            // Executar a inserção
            $stmt->execute();

             }

        public function UpdateEmprestimo(Emprestimo $emprestimo) {
            $stmt = $this->connection->prepare("UPDATE emprestimo SET
            EMPRESTIMO_ID = VALOR_SOLICITADO = :valor_solicitado, VALOR_APROVADO = :valor_aprovado, PARCELAS = :parcelas, ESTADO_PAGAMENTO = :estado_pagamento, TOTAL = :total, JUROS = :juros, IMPOSTO_ADICIONAL = :imposto_adicional
            JUROS_MENSAL_ATRASO = :juros_mensal_atraso, JUROS_DIARIO_ATRASO = :juros_diario_atraso");

             //Atribuir os valores aos parâmetros da declaração preparada
             $stmt->bindParam(':valor_solicitado', $valor_solicitado);
             $stmt->bindParam(':valor_aprovado', $valor_aprovado);
             $stmt->bindParam(':parcelas', $parcelas);
             $stmt->bindParam(':estado_pagamento', $estado_pagamento);
             $stmt->bindParam(':total', $total);
             $stmt->bindParam(':juros', $juros);
             $stmt->bindParam(':imposto_adicional', $imposto_adicional);
             $stmt->bindParam(':juros_mensal_atraso', $juros_mensal_atraso);
             $stmt->bindParam(':juros_diario_atraso', $juros_diario_atraso);
 
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

        public function DeleteEmprestimo(Emprestimo $emprestimoID) {
            $stmt = $this->connection->prepare("DELETE FROM pessoa WHERE pessoa_id = :emprestimo_id");
            
            $emprestimo_id = $emprestimoID->getEmprestimo_id();

            $stmt->bindParam(':emprestimo_id', $emprestimo_id);
            
            $stmt->execute();
            
            return true;
        }

        public function SearchEmprestimo($searchData, $limit, $offset) {
            if($searchData!= "")  {
                // Construa sua consulta SQL baseada nos parâmetros fornecidos
                $query = "SELECT * FROM emprestimo WHERE emprestimo_id = :searchData LIMIT :li OFFSET :offset";
                //$query = "SELECT * FROM Pessoa WHERE VALOR_SOLICITADO = :searchData";
                //$query = "SELECT * FROM Pessoa WHERE VALOR_SOLICITADO = :searchData";
                //$query = "SELECT * FROM Pessoa WHERE VALOR_SOLICITADO = :searchData";
                //$query = "SELECT * FROM Pessoa WHERE VALOR_SOLICITADO = :searchData";
                //$query = "SELECT * FROM Pessoa WHERE VALOR_SOLICITADO = :searchData";
                //$query = "SELECT * FROM Pessoa WHERE VALOR_SOLICITADO = :searchData";
                //$query = "SELECT * FROM Pessoa WHERE VALOR_SOLICITADO = :searchData";
        
                // Prepare a consulta
                $stmt = $this->connection->prepare($query);

                // Bind dos parâmetros
                $stmt->bindParam(':searchData', $searchData);
                $stmt->bindParam(':emprestimo_id', $emprestimo_id);
                $stmt->bindParam(':valor_solicitado', $valor_solicitado);
                $stmt->bindParam(':parcelas', $parcelas);
                $stmt->bindParam(':estado_pagamento', $estado_pagamento);
                $stmt->bindParam(':total', $total);
                $stmt->bindParam(':juros', $juros);
                $stmt->bindParam(':imposto_adicional', $imposto_adicional);
                $stmt->bindParam(':juros_mensal_atraso', $juros_mensal_atraso);
                $stmt->bindParam(':juros_diario_atraso', $juros_diario_atraso);

                // Execute a consulta
                $stmt->execute();

                if ($stmt->rowCount() === 0 ) {
                   $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
                   $emprestimo = $this->BuildEmprestimo($data);
                   // Retorna os resultados
                   return $emprestimo;
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