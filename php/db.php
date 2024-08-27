<?php
    /*---- Variáveois de conexão de banco de dados ----*/
    $db_name = "maisnegocio";// nome do banco de dados
    $db_host = "localhost"; // Servidor do banco de dados
    $db_user = "root"; // nome de usuário do banco de dados
    $db_password = "Laryssa1!";// senha do banco de dados 

    /*---- Tratamento de exceções (erros) de banco de dados ----*/
    try {
        /*---- Cria a conexão com o banco de dados ----*/
        $connection = new PDO("mysql:dbname=" . $db_name . ";host=" . $db_host, $db_user, $db_password);         
                            

        /*---- Tratamento de exceções (erros) de banco de dados ----*/
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        throw new PDOException('Erro na conexão: ' . $e->getMessage());
    }
?>
