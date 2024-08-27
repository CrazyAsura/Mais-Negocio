<main class="py-16">
    <section class="mx-auto p-4  container">
        <h1 class="text-[#78D331] text-3xl font-bold my-4">Ouvidoria</h1>
        <form class="space-y-4">
            <div>
                <label for="InputEmail" class=" text-xl block font-medium text-gray-700">E-mail</label>
                <input type="email" id="InputEmail" placeholder="seuemail@exemplo.com" class="my-6 block p-4 w-full rounded-2xl border-2 border-gray-200 shadow-xl focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            </div>
            <div>

            <div>
                <label for="InputPasswordConfirm" class=" text-xl block font-medium text-gray-700">Informe o problema</label>
                <textarea maxlength="3000" id="InputPasswordConfirm" class="h-80 my-6 block p-4 w-full rounded-2xl border-2 border-gray-200 shadow-xl focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
            </div>
            <div class="flex items-center">
                <input type="checkbox" id="signupCheck" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <label for="signupCheck" class="ml-2 block text-gray-900 my-4">
                    Eu li e concordo com os <a href="#" class="text-indigo-600 hover:text-indigo-500">Termos e Condições.</a>
                </label>
            </div>
            <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#78D331] hover:bg-[#63af29] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Enviar
            </button>
        </form>
    </section>
   </main>