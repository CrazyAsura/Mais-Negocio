<?php
    require_once("php/base_url.php");
    require_once("php/db.php");
    require_once("models/Message.php");

    // Obtém a mensagem, se houver
    $message = new Message($BASE_URL);
    $messageReturn = $message->getMessage();

    if(!empty($messageReturn["msg"])) {
        //Limpar mensagem
        $message->clearMessage(true);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mais Negócio</title>
    <link rel="icon" type="image/x-icon" href="./public/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
