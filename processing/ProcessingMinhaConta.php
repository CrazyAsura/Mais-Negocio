<?php

    require_once("../php/base_url.php");
    require_once("../php/db.php");
    require_once("../models/pessoa.php");
    require_once("../dao/pessoaDAO.php");
    require_once("../models/Message.php");

    $message = new Message($BASE_URL);
    $pessoa = new Pessoa();
    $pessoaDAO = new pessoaDAO($connection, $BASE_URL);
    


    //Verificar o tipo do formulário para validá-lo
    $type = filter_input(INPUT_POST, "type");

    if ($type === "register") {
        $nome = filter_input(INPUT_POST, "nome_input");
        $cpf = filter_input(INPUT_POST, "cpf_input");
        $cnpj = filter_input(INPUT_POST, "cnpj_input");
        $email = filter_input(INPUT_POST, "email_input");
        $data_nascimento = filter_input(INPUT_POST, "data_input");
        $telefone = filter_input(INPUT_POST, "phone_input");
        $tipo = filter_input(INPUT_POST, "tipo_input");
        $senha = filter_input(INPUT_POST, "senha_input");
        $estado = filter_input(INPUT_POST, "estado_input");
        $confirmsenha = filter_input(INPUT_POST, "confirmsenha_input");

        if ($nome && $cpf && $email && $senha) {
            if ($senha === $confirmsenha) {
                if ($pessoaDAO-> Searchpessoa($cpf, "", "")!=false) {
                    
                    // Criar token e senha
                    $pessoaToken = $pessoa->generateToken();
                    $finalPassword = $pessoa->generatePassword($senha);

                    $pessoa->setNome($nome);
                    $pessoa->setCpf($cpf);
                    $pessoa->setEmail($email);
                    $pessoa->setSenha($finalPassword);
                    $pessoa->setUser_token($pessoaToken);
    
                    $auth = true;
    
                    $pessoaDAO->Insertpessoa($pessoa, $auth);
                    $message->setMessage("O usuário ".$email. " foi cadastrado com sucesso.", "success", "login.php");
                } else {
                    //Exibe um erro caso o email já esteja cadastrado. 
                    $message->setMessage("O usuário ".$email. " já se encontra cadastrado.", "error", "back");
                }
            } else {
                $message->setMessage("A senha e a confirmação de senha não coincidem.", "error", "back");
            }
        } else {
            $message->setMessage("Preencha todos os campos.", "error", "back");
        }
        
        if ( $type === "login" ){
                $cpf = filter_input( INPUT_POST, 'logincpf');
                $senha = filter_input( INPUT_POST, 'loginpassword');
            
                if ( $cpf && $senha ) {
                    if ( $pessoaDAO-> Searchpessoa($cpf, "", "") != false ) {
                        $senhadb = $pessoa->getSenha();
                        $pessoa_id = $pessoa->getPessoa_id();
                        $_SESSION['pessoa_id'] = $pessoa_id;

                        if ( $senha === $senhadb ){
                            $message->setMessage("O usuário ".$email. " foi logado com sucesso.", "success", "index.php");

                            }
                        else {
                            $message->setMessage("A senha não coincide.", "error", "back");

                        }
                    }
                }
            else {
                    $message->setMessage("Preencha todos os campos.", "error", "back");
            }
        }
        
?>
