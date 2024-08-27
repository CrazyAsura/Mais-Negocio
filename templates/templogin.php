<main class="container md:w-3/4 mx-auto flex flex-col items-center gap-5 pt-20  max-sm:px-20 flex-grow">
  <div class="container mx-auto pt-20">
    <div class="flex flex-col items-center ">
      <div class="pb-4 mb-10">
        <h1 class="text-4xl  font-bold">Login</h1>
      </div>

      <div class="w-full max-w-md pb-20">
      <form class="space-y-4" id="registrationForm" action="<?php echo $BASE_URL ?>processing/processingPessoa.php" method="POST" onsubmit="return verificarErro()">
          <input type="hidden" name="type" value="login">
          <div class="mb-3">
            <label for="logincpfid" class="block text-lg font-medium text-gray-700">CPF</label>
            <input class="my-6 block p-3 w-full rounded-2xl border-2 border-gray-200 shadow-xl focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  type="text" <?php if(isset($_POST['logincpf'])) echo 'value="' . htmlspecialchars($_POST['logincpf']) . '"'; ?> name="logincpf" id="logincpfid" aria-label="default input example" placeholder="000.000.000-00" required>
          </div>
          <div>
            <label for="loginpasswordid" class="block text-lg font-medium text-gray-700">Senha</label>
            <input type="password" class="my-6 block p-3 w-full rounded-2xl border-2 border-gray-200 shadow-xl focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" <?php if(isset($_POST['loginpassword'])) echo 'value="' . htmlspecialchars($_POST['loginpassword']) . '"'; ?> name="loginpassword" id="loginpasswordid" >
            <a class="text-sm text-blue-600 hover:text-blue-800" href="#">Esqueceu a senha?</a>
          </div>
          
          <div class="flex justify-center pt-2">
            <button type="submit" class="container py-2 bg-[#78D331] hover:bg-[#63af29] text-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Entrar</button>
          </div>

          <div class="flex justify-center pt-10">
            <p class="text-sm">Não tem uma conta? <a class="text-blue-600 hover:text-blue-800" href="/register.html">Inscreva-se</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>