<?php
    //Include do model User
    require_once("../models/curso.php");
    require_once("../models/Message.php");

    //Implementação da classe de Interfaces que será usadas para interações com objeto Person
    class CursoDAO implements CursoDAOInterface {

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
        public function BuildCurso($data) {
            //Instanciando o objeto person a partir da classe User
            $curso = new Curso();

            //Atribuindo os atributos da entidade Pessoa ao objeto person
            $curso->setCurso_id($data['CURSO_ID'] ?? null);
            $curso->setNomecurso($data['NOMECURSO'] ?? null);
            $curso->setDescricaocurso($data['DESCRICAOCURSO'] ?? null);
            $curso->setProfessor($data['PROFESSOR'] ?? null);
            $curso->setDuracao($data['DURACAO'] ?? null);
            $curso->setProgresso($data['PROGRESSO'] ?? null);
            $curso->setPreco($data['PRECO'] ?? null);
            $curso->setSituacao($data['SITUACAO'] ?? null);
            $curso->setTipo($data['TIPO'] ?? null);

            return $curso;
        }

        public function InsertCurso(Curso $curso, $authPerson = false){
            $stmt = $this->connection->prepare("INSERT INTO curso 
            (NOMECURSO, DESCRICAOCURSO, PROFESSOR, DURACAO, PROGRESSO, PRECO, SITUACAO, TIPO)
            VALUES (:nomecurso, :descricaocurso, :professor, :duracao, :progresso, :preco, :situacao, :tipo)");

            $nomecurso = $curso-> getNomecurso();
            $descricaocurso= $curso-> getDescricaocurso();
            $professor = $curso-> getProfessor();
            $duracao = $curso-> getDuracao();
            $progresso = $curso-> getProgresso();
            $preco = $curso-> getPreco();
            $situacao = $curso-> getSituacao();
            $tipo = $curso-> getTipo();

            //Dados para serem inserido na entidade Endereco

            //Vinculando parâmetros
            $stmt->bindParam(':nomecurso', $nomecurso, PDO::PARAM_STR);
            $stmt->bindParam(':descricaocurso', $descricaocurso, PDO::PARAM_STR);
            $stmt->bindParam(':professor', $professor, PDO::PARAM_STR); 
            $stmt->bindParam(':duracao', $duracao, PDO::PARAM_STR); 
            $stmt->bindParam(':progresso', $progresso, PDO::PARAM_STR); 
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR); 
            $stmt->bindParam(':situacao', $situacao, PDO::PARAM_STR); 
            $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR); 
            // Executar a inserção
            $stmt->execute();

        }
        public function UpdateCurso(Curso $curso){
            
        }
        public function DeleteCurso(Curso $cursoID){
            
        }
        public function SearchCurso($searchData, $limit, $offset){
            if($searchData= "")  {
                $query = "SELECT * FROM curso LIMIT :limit OFFSET :offset";
            }
            else {
                // Construa sua consulta SQL baseada nos parâmetros fornecidos
                $query = "SELECT * FROM Curso WHERE CURSO_ID = :searchData LIMIT :limit OFFSET :offset";
                //$query = "SELECT * FROM Curso WHERE NOMECURSO = :searchData";
                //$query = "SELECT * FROM Curso WHERE DESCRICAOCURSO = :searchData";
                //$query = "SELECT * FROM Curso WHERE PROFESSOR = :searchData";
                //$query = "SELECT * FROM Curso WHERE DURACAO = :searchData";
                //$query = "SELECT * FROM Curso WHERE PROGRESSO = :searchData";
                //$query = "SELECT * FROM Curso WHERE PRECO = :searchData";
                //$query = "SELECT * FROM Curso WHERE SITUACAO = :searchData";
                //$query = "SELECT * FROM Curso WHERE TIPO = :searchData";
                // Prepare a consulta
            }
                $stmt = $this->connection->prepare($query);

                // Bind dos parâmetros
                $stmt->bindParam(':searchData', $searchData);
                $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
                $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
                // Execute a consulta
                $stmt->execute();

                if ($stmt->rowCount() > 0 ) {
                   $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
                   $curso = $this->BuildCurso($data);
                   // Retorna os resultados
                   return $curso;
                } else {
                    //Retorno caso não tenha encontrado o usuário
                    return false;
                }
        }
    }
?>

