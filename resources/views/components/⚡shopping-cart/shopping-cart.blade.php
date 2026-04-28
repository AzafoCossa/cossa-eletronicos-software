
<div>
    <livewire:front.navbar />
      <div class="container mx-auto rounded-xl bg-cream/51 p-7 my-10">
        <h1 class="text-dark text-3xl font-semibold">Carrinho de compras</h1>

        <div class="flex flex-col xl:flex-row w-full  items-start gap-0 xl:gap-8">
          <div class="flex flex-col gap-5 border grow w-full xl:w-fit  border-dark/24 mt-16 rounded-xl p-6 bg-white">
            @foreach($cart['items'] as $item)
            <div class="border border-dark/12 p-2.5 rounded-xl hover:bg-cream transition-all delay-100 ease-in">
                <div class="flex flex-col xl:flex-row gap-6 justify-between items-center">
                  <div class="flex flex-col xl:flex-row gap-2.5">
                    <img src="storage/{{ $item['image'] }}" alt="Laptop" class="rounded-xl w-auto h-25 aspect-3/2 object-cover">
                    <div class="max-w-64">
                      <h2 class="font-semibold text-base">{{ $item['name'] }}</h2>
                      <p class="mt-2.5">{{ $item['description'] }}</p>
                    </div>
                  </div>
                  <div class="bg-cream/56 rounded-xl flex gap-3 text-base text-black">
                    <button type="button" wire:click="removeItem({{$item['id']}})" class="p-2 flex justify-center items-center bg-gray-300 rounded-xl cursor-pointer">
                      <svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M10 1C10 1.55313 9.65625 2 9.23077 2H0.769231C0.34375 2 0 1.55313 0 1C0 0.446875 0.34375 0 0.769231 0H9.23077C9.65625 0 10 0.446875 10 1Z" fill="black" fill-opacity="0.64"/>
                      </svg>
                    </button>
                    <p>{{ $item['quantity'] }}</p>
                    <button type="button" wire:click="addItem({{$item['id']}})" class="p-2 flex justify-center items-center bg-gray-300 rounded-xl cursor-pointer">
                      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.76923 0.769231C5.76923 0.34375 5.42548 0 5 0C4.57452 0 4.23077 0.34375 4.23077 0.769231V4.23077H0.769231C0.34375 4.23077 0 4.57452 0 5C0 5.42548 0.34375 5.76923 0.769231 5.76923H4.23077V9.23077C4.23077 9.65625 4.57452 10 5 10C5.42548 10 5.76923 9.65625 5.76923 9.23077V5.76923H9.23077C9.65625 5.76923 10 5.42548 10 5C10 4.57452 9.65625 4.23077 9.23077 4.23077H5.76923V0.769231Z" fill="black" fill-opacity="0.64"/>
                      </svg>
                    </button>
                  </div>
                  <p class="font-bold text-base">{{ moneyFromCents($item['total_price']) }}</p>

                  <button type="button" wire:click="deleteItem({{$item['id']}})" class="cursor-pointer">
                    <svg width="28" height="32" viewBox="0 0 28 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.45 1.10625L8 2H2C0.89375 2 0 2.89375 0 4C0 5.10625 0.89375 6 2 6H26C27.1063 6 28 5.10625 28 4C28 2.89375 27.1063 2 26 2H20L19.55 1.10625C19.2125 0.425 18.5188 0 17.7625 0H10.2375C9.48125 0 8.7875 0.425 8.45 1.10625ZM26 8H2L3.325 29.1875C3.425 30.7687 4.7375 32 6.31875 32H21.6812C23.2625 32 24.575 30.7687 24.675 29.1875L26 8Z" fill="black" fill-opacity="0.69"/>
                    </svg>
                  </button>
                </div>
            </div>
            @endforeach
          </div>

          <div class="flex flex-col border border-dark/24 mt-16 rounded-xl p-6 bg-white w-full xl:w-lg">
            <h2 class="font-semibold text-2xl text-dark">Detalhes do pedido</h2>

            <div class="border-t border-dark/29 mt-10">
              <ul class="text-black/71 text-xl">
                <li class="flex justify-between items-center py-2"><p>Desconto</p><span class="text-black">00,00 MZN</span></li>
                <li class="flex justify-between items-center py-2"><p>Taxa de envio</p><span class="text-black">00,00 MZN</span></li>
                <li class="flex justify-between items-center py-2"><p>IVA</p><span class="text-black">{{ $cart['tax'] }}</span></li>
                <li class="flex justify-between items-center py-2"><p>Subtotal</p><span class="text-black">{{ $cart['subtotal']}}</span></li>
                <li class="flex justify-between items-center py-2"><p>Total</p><span class="text-black">{{ $cart['total'] }}</span></li>
              </ul>
            </div>
            <button class="bg-primary mt-10 rounded-xl uppercase text-white py-5 text-lg font-semibold cursor-pointer">Finalizar a compra</button>
          </div>
        </div>
      </div>
</div>