<main>
    <div class="sm:container mx-auto max-sm:mx-8 mrg">
        <div class="flex flex-col lg:flex-row items-center justify-between py-20 lg:py-28">
          <div class="w-full lg:w-1/2 mb-8 lg:mb-0">
            <h1 class="text-4xl lg:text-5xl font-bold mb-6 text-[#78D331]">Cadastro</h1>
            <p class="text-xl lg:text-2xl text-[#78D331]"><b>Simule seu empréstimo</b> sem sair de casa.</p>
          </div>
          <div class="w-full lg:w-1/2 bg-white p-8 rounded-lg shadow-2xl">
            <form class="space-y-6" id="registrationForm" action="<?php echo $BASE_URL ?>processing/processingPessoa.php" method="POST" onsubmit="return verificarErro()">
              
              <input type="hidden" name="type" value="register">
              <div>
                  <label for="nome_input" class="text-lg font-semibold text-gray-700">Nome completo</label>
                  <input class="mt-2 block p-3 w-full rounded-lg border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300"  <?php if(isset($_POST['nome_input'])) echo 'value="' . htmlspecialchars($_POST['nome_input']) . '"'; ?> id="nome_input" name="nome_input" type="text" aria-label="default input example" required>
                </div>       

                <div>
                  <label for="cpf_input" class="text-lg font-semibold text-gray-700" >CPF</label>
                  <input class="mt-2 block p-3 w-full rounded-lg border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300" <?php if(isset($_POST['cpf_input'])) echo 'value="' . htmlspecialchars($_POST['cpf_input']) . '"'; ?> type="text" id="cpf_input" name="cpf_input" placeholder="000.000.000-00" type="text" aria-label="default input example" required>
                </div>     

                <div>
                  <label for="email_input" class="text-lg font-semibold text-gray-700" >E-mail</label>
                  <input type="email" placeholder="seuemail@exemplo.com" class="mt-2 block p-3 w-full rounded-lg border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300" <?php if(isset($_POST['email_input'])) echo 'value="' . htmlspecialchars($_POST['email_input']) . '"'; ?> type="text" id="email_input" name="email_input" aria-describedby="emailHelp" required>
                </div>

                <div>
                  <label for="InputPhone" class="text-lg font-semibold text-gray-700">Data de Nascimento</label>
                  <input class="mt-2 block p-3 w-full rounded-lg border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300" <?php if(isset($_POST['data_input'])) echo 'value="' . htmlspecialchars($_POST['data_input']) . '"'; ?> type="date" id="data_input" name="data_input" placeholder="(DDD) 12345-6789" aria-label="default input example" required>
                </div>  
                
                <?php
                // Lista de estados brasileiros e suas cidades
                $estados = [
                'AC' => ['Rio Branco', 'Cruzeiro do Sul', 'Senador Guiomard'],
                'AL' => ['Maceió', 'Arapiraca', 'Palmeira dos Índios'],
                'AM' => ['Manaus', 'Parintins', 'Itacoatiara'],
                'AP' => ['Macapá', 'Santana', 'Laranjal do Jari'],
                'BA' => ['Salvador', 'Feira de Santana', 'Vitória da Conquista'],
                'CE' => ['Fortaleza', 'Caucaia', 'Juazeiro do Norte'],
                'DF' => ['Brasília', 'Ceilândia', 'Taguatinga'],
                'ES' => ['Vitória', 'Vila Velha', 'Cariacica'],
                'GO' => ['Goiânia', 'Aparecida de Goiânia', 'Anápolis'],
                'MA' => ['São Luís', 'Imperatriz', 'Caxias'],
                'MG' => ['Belo Horizonte', 'Uberlândia', 'Contagem'],
                'MS' => ['Campo Grande', 'Dourados', 'Três Lagoas'],
                'MT' => ['Cuiabá', 'Várzea Grande', 'Rondonópolis'],
                'PA' => ['Belém', 'Ananindeua', 'Castanhal'],
                'PB' => ['João Pessoa', 'Campina Grande', 'Santa Rita'],
                'PE' => ['Recife', 'Jaboatão dos Guararapes', 'Olinda'],
                'PI' => ['Teresina', 'Parnaíba', 'Picos'],
                'PR' => ['Curitiba', 'Londrina', 'Maringá'],
                'RJ' => ['Rio de Janeiro', 'São Gonçalo', 'Duque de Caxias'],
                'RN' => ['Natal', 'Mossoró', 'Parnamirim'],
                'RO' => ['Porto Velho', 'Ji-Paraná', 'Ariquemes'],
                'RR' => ['Boa Vista', 'Alto Alegre', 'Mucajaí'],
                'RS' => ['Porto Alegre', 'Caxias do Sul', 'Pelotas'],
                'SC' => ['Florianópolis', 'Joinville', 'Lages'],
                'SE' => ['Aracaju', 'Nossa Senhora do Socorro', 'São Cristóvão'],
                'SP' => ['São Paulo', 'Guarulhos', 'Campinas'],
                'TO' => ['Palmas', 'Araguaína', 'Gurupi']
              ];

              // Função para gerar o select de estados
              function gerarSelectEstados($estados) {

                  $html = '<select id="estado" name="estado_input" class="mt-2 block p-3 w-full rounded-lg border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300">';
                  $html .= '<option value="">Selecione um estado</option>';
                  foreach ($estados as $sigla => $cidades) {
                      $html .= '<option value="' . $sigla . '">' . $sigla . '</option>';
                  }
                  $html .= '</select>';
                  return $html;
              }

              // Gerar o select de estados
              $selectEstados = gerarSelectEstados($estados);
              ?>

                  <style>
                      #boxcheckendereco {
                          font-family: 'Roboto', Arial, sans-serif;
                          margin: 0;
                          padding: 0;
                      }

                      #Checkendereco {
                          background-color: #f8f9fa;
                          padding: 20px;
                          border-radius: 8px;
                          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                          max-width: 100%;
                          margin: auto;
                      }

                      label {
                          display: block;
                          margin-bottom: 8px;
                          font-weight: 600;
                      }

                      select {
                          width: 100%;
                          padding: 10px;
                          margin-bottom: 16px;
                          border-radius: 6px;
                          border: 1px solid #ced4da;
                          font-size: 16px;
                          transition: border-color 0.3s ease;
                      }

                      select:focus {
                          border-color: #4a90e2;
                          outline: none;
                          box-shadow: 0 0 0 2px rgba(74, 144, 226, 0.2);
                      }

                      option {
                          padding: 8px;
                      }
                  </style>

                      <label for="estado" class="text-lg font-semibold text-gray-700">Estado:</label>
                      <?php echo $selectEstados; ?>
                      
                      <label for="cidade" class="text-lg font-semibold text-gray-700">Cidade:</label>
                      <select id="cidade" name="cidade_input" class="mt-2 block p-3 w-full rounded-lg border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300">
                          <option value="">Selecione uma cidade</option>
                      </select>

                    <script>

                      document.addEventListener('DOMContentLoaded', function() {
                          const estadosCidades = <?php echo json_encode($estados); ?>;
                          const estadoSelect = document.getElementById('estado');
                          const cidadeSelect = document.getElementById('cidade');

                          estadoSelect.addEventListener('change', function() {
                              const estadoSelecionado = this.value;
                              cidadeSelect.innerHTML = '<option value="">Selecione uma cidade</option>';

                              if (estadoSelecionado) {
                                  estadosCidades[estadoSelecionado].forEach(function(cidade) {
                                      const option = document.createElement('option');
                                      option.value = cidade;
                                      option.text = cidade;
                                      cidadeSelect.appendChild(option);
                                  });
                              }
                          });
                      });
                  </script>

<div class="flex gap-2 max-sm:flex-wrap">
  <div>
    <label for="phone_input_ddd" class="text-lg font-semibold text-gray-700">DDD</label>
    <input class="mt-2 block py-3 px-3 w-full max-w-[100px] rounded-lg border-2 border-gray-300 shadow-sm focus:border-indigo-500 text-center focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300" 
           type="tel" 
           id="phone_input_ddd" 
           name="ddd_input" 
           placeholder="(DDD)" 
           aria-label="DDD input example" 
           <?php if (isset($_POST['ddd_input'])) echo 'value="' . htmlspecialchars($_POST['ddd_input']) . '"'; ?> 
           required>
  </div>
  <div>
    <label for="phone_input" class="text-lg font-semibold text-gray-700">Celular</label>
    <input class="mt-2 block py-3 sm:px-52 w-full rounded-lg border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300" 
           type="tel" 
           id="phone_input" 
           name="phone_input" 
           placeholder="(DDD) 12345-6789" 
           aria-label="phone input example" 
           <?php if (isset($_POST['phone_input'])) echo 'value="' . htmlspecialchars($_POST['phone_input']) . '"'; ?> 
           required>
  </div>
</div>


                  <div>
                    <label for="senha_input" class="text-lg font-semibold text-gray-700">Senha</label>
                    <input type="password" class="mt-2 block p-3 w-full rounded-lg border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300" <?php if(isset($_POST['senha_input'])) echo 'value="' . htmlspecialchars($_POST['senha_input']) . '"'; ?> type="password" id="senha_input" name="senha_input" required>
                  </div>

                  <div>
                    <label for="confirmsenha_input" class="text-lg font-semibold text-gray-700">Confirme sua senha</label>
                    <input type="password" class="mt-2 block p-3 w-full rounded-lg border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300" <?php if(isset($_POST['confirmsenha_input'])) echo 'value="' . htmlspecialchars($_POST['confirmsenha_input']) . '"'; ?> type="password" id="confirmsenha_input" name="confirmsenha_input" required>
                  </div>
                  
                  <div class="checkbox flex items-center">
                    <input type="checkbox" id="signupCheck" required class="mr-2">
                    <label for="signupCheck" class="text-sm text-gray-600">Eu li e concordo com os <a href="#" class="text-blue-600 hover:underline">Termos e Condições.</a></label>
                  </div>

                  <button type="submit" class="w-full py-3 px-4 border border-transparent rounded-lg shadow-sm text-lg font-medium text-white bg-[#78D331] hover:bg-[#63af29] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#78D331] transition duration-300">Cadastrar</button>

            </form>
          </div>
        </div>
      </div>
</main>