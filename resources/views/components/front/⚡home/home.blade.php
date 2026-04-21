
<div>
    <x-front.navbar/>

    <main class="px-5 mt-10">
      <div class="container mx-auto flex flex-col justify-center items-center">
        <div class="search-bar w-full max-w-5xl">
          <form action="#" class="flex w-full gap-5">
            <input type="text" placeholder="Pesquisar por qualquer eletrônico ou eletrodoméstico" class="bg-gray-200 border-2 border-dark-green rounded-xl sm:flex-1 text-xl px-5 py-4">
            <button type="submit" class="bg-primary py-4 px-8 rounded-lg">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M26.0013 12.9981C26.0013 15.8664 25.07 18.516 23.5011 20.6657L31.414 28.5833C32.1953 29.3644 32.1953 30.633 31.414 31.4141C30.6327 32.1953 29.3639 32.1953 28.5826 31.4141L20.6698 23.4966C18.5197 25.0713 15.8695 25.9962 13.0006 25.9962C5.81903 25.9962 0 20.1783 0 12.9981C0 5.8179 5.81903 0 13.0006 0C20.1822 0 26.0013 5.8179 26.0013 12.9981ZM13.0006 21.9968C14.1826 21.9968 15.353 21.764 16.445 21.3118C17.5369 20.8596 18.5291 20.1967 19.3649 19.3611C20.2007 18.5255 20.8636 17.5335 21.316 16.4417C21.7683 15.35 22.0011 14.1798 22.0011 12.9981C22.0011 11.8164 21.7683 10.6462 21.316 9.55445C20.8636 8.46268 20.2007 7.47067 19.3649 6.63507C18.5291 5.79946 17.5369 5.13662 16.445 4.6844C15.353 4.23217 14.1826 3.99941 13.0006 3.99941C11.8187 3.99941 10.6483 4.23217 9.55632 4.6844C8.46433 5.13662 7.47213 5.79946 6.63636 6.63507C5.8006 7.47067 5.13763 8.46268 4.68531 9.55445C4.233 10.6462 4.0002 11.8164 4.0002 12.9981C4.0002 14.1798 4.233 15.35 4.68531 16.4417C5.13763 17.5335 5.8006 18.5255 6.63636 19.3611C7.47213 20.1967 8.46433 20.8596 9.55632 21.3118C10.6483 21.764 11.8187 21.9968 13.0006 21.9968Z" fill="white"/>
              </svg>
            </button>
          </form>
        </div>

        <div class="w-full flex flex-wrap justify-center gap-5 mt-10">
          @foreach($products as $product)
          <div class="p-5 flex flex-col rounded-xl border-2 border-dark w-full max-w-92 place-content-between">
            <div class="w-full relative">
              <img src="{{ asset('/products/product_1.jpg') }}" alt="Produto" class="w-full h-auto rounded-xl">
              <div class="@if($product->is_used) bg-dark-green @else bg-primary @endif px-5 py-1 rounded-xl absolute top-5 left-5">
                <p class="uppercase text-xs text-white">{{ $product->is_used ? 'Usado' : 'Novo' }}</p>
              </div>
            </div>

            <div class="mt-2.5 flex flex-col gap-2.5">
              <h1 class="text-2xl font-bold text-dark">{{ $product->name }}</h1>
              <p class="text-xl">
                {{ $product->description }}
              </p>
              <h2 class="text-2xl text-primary font-semibold">{{ $product->price }} MZN</h2>
            </div>

            <button class="bg-primary text-white font-semibold text-xl uppercase py-5 rounded-xl mt-5">Adicionar ao carrinho</button>
          </div>
          @endforeach
        </div>

        <div class="my-16 flex justify-center">
          <a href="#" class="underline text-xl text-dark">Ver mais produtos</a>
        </div>
      </div>
    </main>

    <x-footer/>
</div>