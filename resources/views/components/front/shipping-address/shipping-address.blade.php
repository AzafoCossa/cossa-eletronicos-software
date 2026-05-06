<div>
    <livewire:front.navbar />
    <main class="px-5 my-10">
      <div class="container mx-auto rounded-xl bg-cream/51 p-7">
        <h1 class="text-dark text-3xl font-semibold">Carrinho de compras</h1>

        <form wire:submit.prevent="finalizePurchase" class="flex flex-col xl:flex-row w-full  items-start gap-0 xl:gap-8">
          <div class="flex flex-col gap-5 border grow w-full xl:w-fit  border-dark/24 mt-16 rounded-xl p-6 bg-white">
            <h2 class="font-semibold text-2xl text-dark">Preencher informacoes de entrega</h2>

            <div class="mt-20">
              <div class="flex flex-col gap-5 text-xl">
                <div class="flex flex-col gap-2.5">
                  <label for="full_name">Nome completo</label>
                  <input id="full_name" wire:model="shippingForm.full_name" type="text" class="form-control @error('shippingForm.full_name') input-error @enderror" placeholder="Nome completo">
                </div>

                <div class="flex flex-col gap-2.5">
                  <label for="email">Email (Opcional)</label>
                  <input id="email" wire:model="shippingForm.email" type="text" class="form-control @error('shippingForm.email') input-error @enderror" placeholder="Digite o seu email">
                </div>

                <div class="flex flex-col gap-2.5">
                  <label for="phone_number">Numero de celular</label>
                  <input id="phone_number" wire:model="shippingForm.phone_number" type="text" class="form-control @error('shippingForm.phone_number') input-error @enderror" placeholder="Digite o seu numero de celular">
                </div>

                <div>
                  <div wire:ignore class="flex flex-col gap-2.5">
                    <label for="districtSelect">Distrito/Cidade de entrega</label>
                    <select wire:model="shippingForm.district" id="districtSelect" class="form-control select2">
                      <option value="">Selecione o bairo</option>
                      @foreach($districts as $district)
                      <option value="{{$district->id}}">{{$district->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  @error('shippingForm.district') <div class="text-sm text-danger">{{$message}}</div> @enderror
                </div>

                <div class="flex flex-col gap-2.5">
                  <label for="address">Endereco de entrega</label>
                  <input id="address" wire:model="shippingForm.address" type="text" class="form-control @error('shippingForm.address') input-error @enderror" placeholder="Digite o seu endereco de entrega">
                </div>
            </div>
            </div>
          </div>
          <div class="flex flex-col border border-dark/24 mt-16 rounded-xl p-6 bg-white w-full xl:w-xl">
            <h2 class="font-semibold text-2xl text-dark">Detalhes do pedido</h2>

            <div class="flex flex-col">
              <h3 class="font-semibold text-sm text-dark mt-4 place-self-end">Total de items: {{$cart['total_items']}}</h3>
              @foreach($cart['items'] as $item)
              <div class="border-t border-dark/21 flex gap-2.5 p-2">
                <img src="storage/{{$item['image']}}" alt="Laptop" class="w-16 h-16 aspect-square object-cover rounded-xl">
                <h2 class="text-base font-semibold text-dark/78 place-self-center">{{$item['name']}}</h2>
                <div class="flex flex-col justify-between w-56">
                  <span class="place-self-end p-2 bg-cream rounded-xl w-14 h-6 flex justify-center items-center">{{$item['quantity']}}</span>
                  <p class="text-black font-semibold text-base place-self-end">{{ moneyFromCents($item['price'])}}</p>
                </div>
              </div>
              @endforeach
            </div>

            <div class="border-t border-dark/29 mt-10">
              <ul class="text-black/71 text-xl">
                <li class="flex justify-between items-center py-2"><p>Desconto</p><span class="text-black">00,00 MZN</span></li>
                <li class="flex justify-between items-center py-2"><p>Taxa de envio</p><span class="text-black">00,00 MZN</span></li>
                <li class="flex justify-between items-center py-2"><p>IVA</p><span class="text-black">{{$cart['tax']}}</span></li>
                <li class="flex justify-between items-center py-2"><p>Subtotal</p><span class="text-black">{{$cart['subtotal']}}</span></li>
                <li class="flex justify-between items-center py-2"><p>Total</p><span class="text-black">{{ moneyFromCents($cart['total'])}}</span></li>
              </ul>
            </div>
            <button type="submit" class="bg-primary mt-10 rounded-xl uppercase text-white py-5 text-lg font-semibold cursor-pointer">Finalizar a compra</button>
          </div>
        </form>
      </div>
    </main>
</div>
@script
  <script>
    $(document).ready(function(){
      $('#districtSelect').on('change', function (event) {
          const value = $(this).val();
          @this.shippingForm.district = value;
      })
    })
  </script>
@endscript