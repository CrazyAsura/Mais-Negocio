    <?php
        require_once("templates/head.php");
    ?>
<body>

    <!-- Implementação do vlibras -->
    <div class="relative">
      <div class="absolute inset-0 bg-blue-600"></div>
      <div class="absolute inset-0"></div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
      new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    <!-- Fim da Implementação do vlibras -->

    <?php
        require_once("templates/header.php");
    ?>

    <?php
        require_once("templates/tempregister.php");
    ?>

    <?php
        require_once("templates/footer.php");
    ?>

</body>
</html>