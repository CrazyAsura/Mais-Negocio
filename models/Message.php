<?php

  class Message {

    private $url;

    public function __construct($url) {
        $this->url = $url;
        if (session_status() == PHP_SESSION_NONE) {
          session_start(); // Inicie a sessão apenas se não estiver ativa
        }
    }

    public function setMessage($msg, $type, $redirect = "") {
      $_SESSION["msg"] = $msg;
      $_SESSION["type"] = $type;
      
      $redirectUrl = $this->url;

      // Se $redirect não for "back", adicione ao caminho
      if($redirect != "back") {
         // Remove a última barra (se existir) do $redirectUrl
        $redirectUrl = rtrim($redirectUrl, '/');

        // Retrocede um diretório
        $redirectUrl = dirname($redirectUrl);

        // Adiciona o diretório $redirect ao caminho
        $redirectUrl .= '/' . $redirect;

        header("Location: $redirectUrl");
        //header("Location: $this->url" . $redirect);
      } else {
        header("Location:" . $_SERVER['HTTP_REFERER']);
      }
      exit(); // Encerre o script após o redirecionamento
    } 

    public function getMessage() {
      if(!empty($_SESSION["msg"])) {
        return [
          "msg" => $_SESSION["msg"],
          "type" => $_SESSION["type"]
        ];
      } else {
        return false;
      }
    }

    public function clearMessage($clear) {
        if($clear == true) {
            $_SESSION["msg"] = "";
            $_SESSION["type"] = "";
        }
    }

  }
  ?>