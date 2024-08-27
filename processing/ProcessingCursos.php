<?php

require_once("../php/base_url.php");
require_once("../php/db.php");
require_once("../models/curso.php");
require_once("../dao/cursoDAO.php");
require_once("../models/Message.php");

$message = new Message($BASE_URL);
$CursoDAO = new CursoDAO($connection, $BASE_URL);

function mostrarCursos() {
    global $CursoDAO, $connection; // Usar o objeto CursoDAO e a conexão globalmente

    // Definir o número de cursos por página
    $cursos_por_pagina = 5;

    // Descobrir a página atual
    $pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    if ($pagina_atual < 1) {
        $pagina_atual = 1;
    }

    // Calcular o offset
    $offset = ($pagina_atual - 1) * $cursos_por_pagina;

    // Buscar os cursos com limite e offset
    $cursos = $CursoDAO->SearchCurso("", $cursos_por_pagina, $offset);

    // Verifica se existem cursos no banco de dados
    if ($cursos) {
        foreach ($cursos as $curso) {
            echo '<div class="bg-white p-6 rounded-lg shadow-md">';
            echo '<h2 class="text-2xl font-semibold text-gray-800 mb-2">' . htmlspecialchars($curso->getNomecurso()) . '</h2>';
            echo '<p class="text-gray-600 mb-4">' . htmlspecialchars($curso->getDescricaocurso()) . '</p>';
            echo '<p class="text-gray-700 font-medium">Duração: ' . htmlspecialchars($curso->getDuracao()) . '</p>';
            echo '<p class="text-gray-700 font-medium">Preço: R$ ' . htmlspecialchars($curso->getPreco()) . '</p>';
            echo '<a href="#" class="text-[#78D331] mt-4 inline-block">Saiba mais</a>';
            echo '</div>';
        }
    } else {
        echo "<p class='text-gray-700'>Nenhum curso disponível no momento.</p>";
    }

    // Calcular o total de cursos
    $sql_total = "SELECT COUNT(*) AS total FROM curso";
    $stmt_total = $connection->query($sql_total);
    $total_cursos = $stmt_total->fetch(PDO::FETCH_ASSOC)['total'];
    $total_paginas = ceil($total_cursos / $cursos_por_pagina);

    // Exibir links de navegação
    if ($total_paginas > 1) {
        echo '<div class="pagination">';
        for ($i = 1; $i <= $total_paginas; $i++) {
            $active = ($i == $pagina_atual) ? ' active' : '';
            echo '<a href="?pagina=' . $i . '" class="pagination-link' . $active . '">' . $i . '</a>';
        }
        echo '</div>';
    }
}

// Chamar a função para mostrar os cursos
mostrarCursos();
?>
