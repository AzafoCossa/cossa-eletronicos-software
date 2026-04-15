
<div>
    <main class="w-full grid grid-cols-1 xl:grid-cols-2 min-h-screen">
      <div id="auth-image-container" class="bg-[url(/src/assets/auth_background.jpg)] bg-no-repeat bg-bottom relative hidden xl:block">
        <div class="absolute bottom-14 right-14 w-xl text-white text-right">
          <h2 class=" font-black text-6xl">Aqui compras <span class="text-primary">eletronicos & eletrodomesticos</span></h2>
          <p class="text-xl text-gray-300 mt-3">Produtos modernos que combinam inovação, desempenho e sofisticação. Entregamos qualidade diretamente até si, com uma experiência de compra simples, segura e eficiente.</p>
        </div>
      </div>
      <div class="flex justify-center items-center bg-white relative">
        <a href="{{ route('home')}}"  class="absolute top-5 left-5">
            <img src="{{ asset('assets/logoDark.svg')}}" alt="Logotipo Cossa Eletronicos">
        </a>
        <div class="max-w-2xl mx-auto px-5 py-5 w-full">
          <h1 class="text-center text-6xl text-dark font-black">Seja bem-vindo</h1>
          <p class="text-center text-2xl mt-2">Registe-se e comece as tuas compras, hoje.</p>

          <form action="#" class="w-full flex flex-col gap-10 mt-20 text-2xl text-dark/70">
            <div class="flex flex-col gap-2.5">
              <label for="full_name">Nome completo</label>
              <input type="text" id="full_name" placeholder="Digite o seu nome completo" class="bg-gray-200 rounded-xl py-4 px-6">
            </div>

            <div class="flex flex-col gap-2.5">
              <label for="full_name">Email / Celular</label>
              <input type="text" id="email_or_phone" placeholder="Digite o seu ou numero de celular" class="bg-gray-200 rounded-xl py-4 px-6">
            </div>

            <div class="flex flex-col gap-2.5">
              <label for="full_name">Password</label>
              <input type="text" id="password" placeholder="Digite uma password" class="bg-gray-200 rounded-xl py-4 px-6">
            </div>

            <div class="flex flex-col gap-2.5">
              <label for="full_name">Confirmacao de password</label>
              <input type="text" id="password_confirm" placeholder="Digite novamente a password" class="bg-gray-200 rounded-xl py-4 px-6">
            </div>

            <button class="bg-primary rounded-xl py-4 text-white">Registar</button>

            <p class="text-center text-gray-500">Já tem uma conta? <a href="./login.html" class="text-primary">Iniciar sessao.</a></p>
          </form>
        </div>
      </div>
    </main>
</div>