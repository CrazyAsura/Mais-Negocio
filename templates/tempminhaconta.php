<?php
require_once('./php/base_url.php');
require_once('./php/db.php');
require_once('./models/conta.php');
require_once('./dao/contaDAO.php');


// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
else{
    // Função para conectar ao banco de dados
    $conta = new Conta();
    $contaDAO = new ContaDAO($connection, $BASE_URL);
    $contaDAO->SearchConta($_SESSION['usuario_id'], "", "");

    $nome = $conta->getNome();
    $cpf = $conta->getNome();
    $cnpj = $conta->getCpf();
    $tipo_de_conta = $conta->getTipo_de_conta();
    $data_de_criacao = $conta->getData_de_criacao();
    $gastos = $conta->getGastos();
    $valor = $conta->getValor();
    $saldo = $conta->getSaldo();
    $total = $conta->getTotal();
    $extrato = $conta->getExtrato();
}

?>


<main class="dashboard-container">

        <h1>Bem-vindo, <?php echo htmlspecialchars($nome); ?>!</h1>

        <div class="account-details">
            <h2>Detalhes da Conta</h2>
            <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Data de Criação:</strong> <?php echo htmlspecialchars(date('d/m/Y', strtotime($data_criacao))); ?></p>
            <p><strong>Gastos:</strong> <?php echo htmlspecialchars($gastos); ?></p>
            <p><strong>Valor:</strong> <?php echo htmlspecialchars($valor); ?></p>
            <p><strong>Saldo:</strong> <?php echo htmlspecialchars($saldo); ?></p>
            <p><strong>Total:</strong> <?php echo htmlspecialchars($total); ?></p>
            <p><strong>Extrato:</strong> <?php echo htmlspecialchars($extrato); ?></p>
        </div>

        <div class="account-actions">
            <a href="editar_conta.php" class="btn">Editar Conta</a>
            <a href="logout.php" class="btn">Sair</a>
        </div>

</main>