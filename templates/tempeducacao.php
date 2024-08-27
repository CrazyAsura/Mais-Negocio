<main class="container mx-auto mt-28 p-4">
              <h1 class="text-4xl font-bold text-gray-800 mb-8">Cursos Disponíveis</h1>
          
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                  <?php
                  mostrarCursos();
                  ?>
              </div>
          
              <!-- Paginação -->
              <div class="mt-8 flex justify-center space-x-2">
                  <?php
                  // Mostrar links de paginação
                  for ($i = 1; $i <= min(10, $total_paginas); $i++) {
                      if ($i == $pagina_atual) {
                          echo "<span class='px-4 py-2 bg-[#78D331] text-white rounded'>$i</span>";
                      } else {
                          echo "<a href='cursos.php?pagina=$i' class='px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded hover:bg-[#78D331] hover:text-white'>$i</a>";
                      }
                  }
                  ?>
              </div>
            </main>