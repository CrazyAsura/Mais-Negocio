<!-- Início do header -->
 <header class="fixed w-full top-0 z-50">
  <nav class="bg-white border border-gray-200 px-4 lg:px-6 py-2.5 shadow">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
        <a href="/index.php" class="flex items-center">
          <img src="/public/Logo..svg" alt="Mais Negócios" class="max-h-20 w-auto">
        </a>
  
        <div class="flex items-center lg:order-2">
            <a href="/register.php" class="text-gray-800 bg-gray-100  hover:bg-gray-200 focus:ring-2 focus:ring-[#78D331] font-medium rounded-lg text-sm text-center w-24 sm:w-28 px-2 sm:px-4 py-2 lg:py-2.5 mr-2 sm:mr-4 focus:outline-none">Registrar</a>
            <a href="/login.php" class="text-white bg-[#78D331] hover:bg-[#63af29] focus:ring-2 focus:ring-[#78D331] font-medium rounded-lg text-sm text-center w-24 sm:w-28 px-2 sm:px-4 py-2 lg:py-2.5 mr-2 sm:mr-4 focus:outline-none">Login</a>
            <button
            id="menu-toggle"
            type="button"
            class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="mobile-menu"
            aria-expanded="false"
            >
            <span class="sr-only">Abrir menu principal</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
  
        <div class="hidden justify-around items-center w-full lg:flex lg:w-auto lg:order-1 transition-all duration-300 ease-in-out" id="mobile-menu">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-4 xl:space-x-8 lg:mt-0">
            <li>
                <a class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-[#78D331] lg:p-0 transition-colors duration-200" aria-current="page" href="/index.php">Início</a>
            </li>
            <li>
                <a class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-[#78D331] lg:p-0 transition-colors duration-200" href="/servicos.php">Simular empréstimo</a>
            </li>
            <li style="display: none;">
                <a class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-[#78D331] lg:p-0 transition-colors duration-200" href="/index.php">Renegociar dívidas</a>
            </li>  
            <li>
                <a class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-[#78D331] lg:p-0 transition-colors duration-200" aria-current="page" href="/quemSomos.php">Quem somos</a>
            </li>
            <li>
                <a class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-[#78D331] lg:p-0 transition-colors duration-200" aria-current="page" href="/educacao.php">Educação</a>
            </li>
            <li>
                <a class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-[#78D331] lg:p-0 transition-colors duration-200" aria-current="page" href="/faq.php">FAQ</a>
            </li>  
            </ul>
        </div>
    </div>
  </nav>
</header>
<!-- Fim do header -->

<script>
  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');

  menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    menuToggle.setAttribute('aria-expanded', mobileMenu.classList.contains('hidden') ? 'false' : 'true');
    menuToggle.querySelector('svg:nth-child(1)').classList.toggle('hidden');
    menuToggle.querySelector('svg:nth-child(2)').classList.toggle('hidden');
  });

  function adjustMenu() {
    if (window.innerWidth >= 1024) {
      mobileMenu.classList.remove('hidden');
    } else {
      mobileMenu.classList.add('hidden');
    }
  }

  window.addEventListener('resize', adjustMenu);
  window.addEventListener('load', adjustMenu);
</script>function toggleMenu() {
  const mobileMenu = document.getElementById('mobile-menu');
  mobileMenu.classList.toggle('hidden');
}
</script>
