<main class=" grid justify-center items-center row-auto gap-8 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-32 mb-8">
        <!-- Início da section do carrossel -->
        <style>
          @import "https://unpkg.com/open-props" layer(design.system);
      
      @layer demo {
        fieldset {
          grid-template-columns: 
            var(--col-1, 1fr) 
            var(--col-2, 1fr) 
            var(--col-3, 1fr)
          ;
          
          @media (prefers-reduced-motion: no-preference) {
            transition: grid-template-columns 2s var(--ease-spring-5);
          }
          
          &:has(label:nth-child(1) > input:checked) {
            --col-1: 5fr;
            --col-2: 1fr;
          }
          &:has(label:nth-child(2) > input:checked) {
            --col-1: 1fr;
            --col-2: 5fr;
            --col-3: 1fr;
          }
          &:has(label:nth-child(3) > input:checked) {
            --col-2: 1fr;
            --col-3: 5fr;
            --col-4: 1fr;
          }
          
          > label {
            background-image: var(--_img);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
          }
        }
      }
      
      @layer demo.support {
        fieldset {
          width: 100%;
          max-width: 1200px;
          margin: 0 auto;
          
          display: grid;
          grid-auto-flow: column;
          grid-template-rows: 25vh;
          gap: var(--size-3);
          border: none;
          
          > label {
            cursor: pointer;
            border-radius: var(--radius-4);
            
            &:focus-within {
              outline: 1px solid green;
              outline-offset: 8px;
            }
            
            > input {
              opacity: 0;
            }
          }
        }
      }

      @media only screen and (max-width: 1050px) {
        fieldset {
          grid-template-rows: 20vh;
          gap: var(--size-2);
          
          > label {
            &:focus-within {
              outline: 1px solid transparent;
              outline-offset: 1px;
            }
          }
        }
      }

      @media only screen and (max-width: 768px) {
        fieldset {
          grid-template-rows: 15vh;
          gap: var(--size-1);
        }
      }

      .carousel-focus:hover {
        transition: all 0.8s;
        transform: scale(1.1);
      }
      </style>

        <fieldset class="px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
          <label class="carousel-focus" style="--_img: url(/public/banner/banner1.webp)">
            <input type="radio" name="images" value="Fiddle Leaf">
          </label>
          <label class="carousel-focus" style="--_img: url(/public/banner/banner2.webp)">
            <input type="radio" name="images" value="Pink Princess">
          </label>
          <label class="carousel-focus" style="--_img: url(/public/banner/banner3.webp)">
            <input type="radio" name="images" value="Monstera" checked>
          </label>
      </fieldset>

      <section class="flex gap-4 text-center max-sm:flex-col" id="cards">
          <!-- Início dos cards de serviços -->
          <a href="/" class="no-underline text-black">
              <article class="border p-5 w-full h-full rounded-[20px]">
                  <img class="mx-auto" src="/public/Icones/money.svg" alt="">
                  <h1 class="text-xl font-bold">Empréstimo acessível</h1>
                  <p>Capacitamos pessoas para criar e gerir o seu próprio negócio e incentivamos suas iniciativas através do microcrédito com juros baixos.</p>
              </article>
          </a>
          <a href="/" class="no-underline text-black">
              <article class="border p-5 w-full h-full rounded-[20px]">
                  <img class="mx-auto" src="/public/Icones/education.svg" alt="">
                  <h1 class="text-xl font-bold">Educação financeira</h1>
                  <p>Acesse o nosso curso preparatório e entenda os desafios do empreendedorismo e como você pode solucioná-los e dar vida ao seu negócio!</p>
              </article>
          </a>
          <a href="/" class="no-underline text-black">
              <article class="border p-5 w-full h-full rounded-[20px]">
                  <img class="mx-auto" src="/public/Icones/des.svg" alt="">
                  <h1 class="text-xl font-bold">Desenvolvimento humano</h1>
                  <p>Investimos no desenvolvimento humano! Acreditamos em pessoas. Nosso objetivo é capacitá-las para tornarem os seus sonhos realidade!</p>
              </article>
          </a>
          <!-- Fim dos cards de serviços -->
      </section>
      <!-- Fim da section dos cards de serviços -->

        
      <!-- Início da section do Quem Somos -->
      <section class="flex flex-grow max-sm:flex-wrap gap-5 mx-4 max-sm:text-sm" id="">
          <article class="" id="">
              <h1 class="text-[#78D331] text-3xl font-bold my-2">Quem somos</h1>
              <p class=" max-sm:text-xs mb-4 text-wrap">Bem-vindo ao Mais Negócio, sua fonte confiável de soluções financeiras e educação financeira. Somos uma equipe comprometida em ajudar você a alcançar estabilidade financeira e tomar decisões informadas sobre seu dinheiro.</p>
              <p class=" max-sm:text-xs mb-4">Nossa missão é capacitar indivíduos e famílias a gerenciar suas finanças de forma inteligente e responsável. Acreditamos que a educação financeira é a chave para alcançar objetivos financeiros de longo prazo e construir um futuro sólido.</p>
              <p class=" max-sm:text-xs mb-4">Oferecemos uma ampla gama de serviços e recursos para atender às suas necessidades financeiras:</p>
              <p class=" max-sm:text-xs mb-4">
                  <b>Empréstimos Responsáveis:</b> Entendemos que empréstimos podem ser uma ferramenta útil para alcançar metas financeiras, mas é crucial escolher opções que sejam adequadas e sustentáveis. Oferecemos orientação especializada para ajudá-lo a encontrar o empréstimo certo para suas necessidades, com taxas justas e condições transparentes.
              </p>
              <p class=" max-sm:text-xs mb-4"><b>Educação Financeira Personalizada:</b> Acreditamos que cada pessoa tem uma jornada financeira única. Oferecemos recursos educacionais personalizados, incluindo artigos, guias e ferramentas interativas, para ajudá-lo a entender conceitos financeiros complexos e tomar decisões informadas sobre economia, investimentos, crédito e muito mais.</p>
              <p class=" max-sm:text-xs "><b>Suporte Contínuo:</b> Nosso compromisso não termina quando você obtém um empréstimo ou conclui um curso. Estamos aqui para fornecer suporte contínuo ao longo de sua jornada financeira. Nossa equipe dedicada está disponível para responder às suas perguntas, fornecer orientação e ajudá-lo a enfrentar desafios financeiros com confiança.</p>
          </article>
          <div class="w-[200%] max-sm:w-full grow p-0"><img src="/public/card-layout.jpg" class="w-full h-full" alt="" id="img-card-layout"></div>
      </section>
      <!-- Fim da section do Quem Somos -->


      <!-- Início da section do carrosel de Casos de Sucesso -->
        <section class="my-[60px] mb-[50px]">
            <h1 class="text-[#78D331] text-3xl font-bold my-6">Casos de sucesso</h1>

            <div class="container mx-auto w-full overflow-hidden relative">
                <div class="w-full h-full absolute">
                    <div class="w-1/4 h-full absolute z-10 left-0" style="background: linear-gradient(to right, #edf2f7 0%, rgba(255, 255, 255, 0) 30%);"></div>
                    <div class="w-1/4 h-full absolute z-10 right-0" style="background: linear-gradient(to left, #edf2f7 0%, rgba(255, 255, 255, 0) 30%);"></div>
                </div>


                <div class="carousel-items flex items-center justify-center" style="width: fit-content;">
                    <div class="carousel-focus flex items-center flex-col relative mx-2 sm:mx-5 my-5 sm:my-10 rounded-lg shadow-2xl" style="width: 200px;">
                        <img src="/public/cards/card1.png" alt="" class="w-full h-auto">
                    </div>

                    <div class="carousel-focus flex items-center flex-col relative mx-2 sm:mx-5 my-5 sm:my-10 rounded-lg shadow-2xl" style="width: 200px;">
                        <img src="/public/cards/card2.png" alt="" class="w-full h-auto">
                    </div>

                    <div class="carousel-focus flex items-center flex-col relative mx-2 sm:mx-5 my-5 sm:my-10 rounded-lg shadow-2xl" style="width: 200px;">
                        <img src="/public/cards/card3.png" alt="" class="w-full h-auto">
                    </div>

                    <div class="carousel-focus flex items-center flex-col relative mx-2 sm:mx-5 my-5 sm:my-10 rounded-lg shadow-2xl" style="width: 200px;">
                        <img src="/public/cards/card1.png" alt="" class="w-full h-auto">
                    </div>

                    <div class="carousel-focus flex items-center flex-col relative mx-2 sm:mx-5 my-5 sm:my-10 rounded-lg shadow-2xl" style="width: 200px;">
                        <img src="/public/cards/card2.png" alt="" class="w-full h-auto">
                    </div>

                    <div class="carousel-focus flex items-center flex-col relative mx-2 sm:mx-5 my-5 sm:my-10 rounded-lg shadow-2xl" style="width: 200px;">
                        <img src="/public/cards/card3.png" alt="" class="w-full h-auto">
                    </div>

                    <div class="carousel-focus flex items-center flex-col relative mx-2 sm:mx-5 my-5 sm:my-10 rounded-lg shadow-2xl" style="width: 200px;">
                        <img src="/public/cards/card1.png" alt="" class="w-full h-auto">
                    </div>

                    <div class="carousel-focus flex items-center flex-col relative mx-2 sm:mx-5 my-5 sm:my-10 rounded-lg shadow-2xl" style="width: 200px;">
                        <img src="/public/cards/card2.png" alt="" class="w-full h-auto">
                    </div>

                    <div class="carousel-focus flex items-center flex-col relative mx-2 sm:mx-5 my-5 sm:my-10 rounded-lg shadow-2xl" style="width: 200px;">
                        <img src="/public/cards/card3.png" alt="" class="w-full h-auto">
                    </div>
                </div>
            </div>
        </section>

        <style>
            @keyframes carouselAnim {
                0% { transform: translateX(0); }


                100% { transform: translateX(calc(-100% + 100vw)); }
            }





            .carousel-items {
                animation: carouselAnim 60s infinite alternate linear;
            }

            .scrollbar-hide {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>
    </main>