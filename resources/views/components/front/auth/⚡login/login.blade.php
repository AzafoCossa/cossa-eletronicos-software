
<div>
    <main class="w-full grid grid-cols-1 xl:grid-cols-2 min-h-screen">
      <div class="flex justify-center items-center bg-white">
        <a href="{{ route('home')}}"  class="absolute top-10 left-40">
            <img src="{{ asset('assets/logoDark.svg')}}" alt="Logotipo Cossa Eletronicos">
        </a>
        <div class="max-w-2xl mx-auto px-5 py-5 w-full">
          <h1 class="text-center text-6xl text-dark font-black">Seja bem-vindo</h1>
          <p class="text-center text-2xl mt-2">Registe-se e comece as tuas compras, hoje.</p>

          <form wire:submit.prevent="login" class="w-full flex flex-col mt-20 text-2xl text-dark/70">
            <div class="text-center text-danger text-lg">@error('invalid_credentials') {{ $message }} @enderror</div>
            <div class="flex flex-col gap-2.5">
              <label for="full_name">Email / Celular</label>
              <input wire:model="email_or_phone" type="text" id="email_or_phone" placeholder="Digite o seu ou numero de celular" class="bg-gray-200 rounded-xl py-4 px-6 @error('email_or_phone') border-2 border-red-500 @enderror @error('invalid_credentials') border-2 border-red-500 @enderror">
            </div>

            <div class="flex flex-col gap-2.5 mt-10">
              <label for="full_name">Password</label>
              <input wire:model="password" type="password" id="password" placeholder="Digite uma password" class="bg-gray-200 rounded-xl py-4 px-6 @error('password') border-2 border-red-500 @enderror @error('invalid_credentials') border-2 border-red-500 @enderror">
            </div>

            <div class="flex justify-between mt-5">
              <div class="flex gap-2.5 items-center">
                <input wire:model="remember_me" type="checkbox" id="remember_me" class="bg-gray-300 rounded-xl py-4 px-6 h-6 w-6">
                <label for="remember_me">Manter sessao iniciada</label>
              </div>

              <a href="forgot-password.html" class="text-primary">Esqueceu a senha?</a>
            </div>

            <button type="submit" class="bg-primary rounded-xl py-4 text-white mt-10 cursor-pointer">Registar</button>

            <p class="text-center text-gray-500 mt-10">Não tem uma conta? <a href="{{ route('register') }}" class="text-primary">Registe-se aqui.</a></p>
          </form>
        </div>
      </div>
      <div id="auth-image-container" class="bg-no-repeat bg-bottom relative hidden xl:block">
        <div class="absolute bottom-14 left-14 w-xl text-white">
          <h2 class=" font-black text-6xl">Aqui compras <span class="text-primary">eletronicos & eletrodomesticos</span></h2>
          <p class="text-xl text-gray-300 mt-3">Produtos modernos que combinam inovação, desempenho e sofisticação. Entregamos qualidade diretamente até si, com uma experiência de compra simples, segura e eficiente.</p>
        </div>
      </div>
    </main>
</div>