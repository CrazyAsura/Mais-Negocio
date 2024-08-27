<main>
  <div class="container mx-auto px-4  py-24 lg:py-40">
    <div class="flex flex-col lg:flex-row items-center">
      <div class="w-full lg:w-7/12 mb-8 lg:mb-0">
        <h1 class="text-4xl lg:text-5xl font-bold mb-4">Comece a investir <br> no seu sonho!</h1>
        <p class="text-xl"><b>Simule seu empréstimo</b> sem sair de casa.</p>
      </div>
      <div class="w-full lg:w-5/12">
        <form class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="amount">
              De quanto você precisa?
            </label>
            <select class="shadow appearance-none border rounded-xl w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="amount">
              <option>R$ 100,00</option>
              <option>R$ 200,00</option>
              <option>R$ 300,00</option>
              <option>R$ 400,00</option>
              <option>R$ 500,00</option>
              <option>R$ 600,00</option>
            </select>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
              Nome completo
            </label>
            <input class="shadow appearance-none border rounded-xl w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" required>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
              E-mail
            </label>
            <input class="shadow appearance-none border rounded-xl w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="seuemail@exemplo.com" required>
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
              Celular
            </label>
            <input class="shadow appearance-none border rounded-xl w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="text" placeholder="(DDD) 12345-6789" required>
          </div>
          <div class="flex items-center justify-center">
            <button class="container bg-[#78D331] hover:bg-[#63af29] text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline" type="submit">
              Simular empréstimo
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>