<div>
    <livewire:front.navbar/>
    <div class="container mx-auto rounded-xl p-7">
        <a href="{{route('orders')}}" class="underline text-blue-800 mb-5">Ver todos pedidos</a>
        <div class="w-full py-10">
        @if (session('order-placed'))
          <div class="alert alert-success rounded-xl">
            <p>Os seus produtos foram reservados com sucesso</p>
          </div>
        @endif

          <div class="flex mt-5 p-7.5">
            <div class="grow w-full max-w-4xl">
              <p class="text-xl text-gray-500">Estas no ultimo passo</p>
              <h2 class="font-bold text-4xl text-dark">Falta apenas a transferência.</h2>
              <div class="mt-10">
                <h3 class="text-2xl text-primary font-bold">Detalhes bancários (BIM)</h3>
                <div class="mt-7.5 max-w-xl text-xl text-gray-600">
                  <div class="flex justify-between">
                    <div>
                      <p>Número de conta</p>
                      <span class="font-semibold">375438889</span>
                    </div>
                    <div>
                      <p>Titular</p>
                      <span class="font-semibold">Azafo Alexandre Cossa</span>
                    </div>
                  </div>
                  <div class="mt-7.5">
                    <p>IBAN</p>
                    <span class="font-semibold">MZ59 0001 0000 0037 5438 8895 7</span>
                  </div>
                  <div class="mt-7.5">
                    <p>SWIFT</p>
                    <span class="font-semibold">BIMOMZXXXX</span>
                  </div>
                </div>
                <form x-data="{}" wire:submit.prevent="addPayment" class="mt-10">
                    <label for="payment_confimation" class="text-xl">Comprovativo de pagamento</label>
                    <div class="grid grid-cols-3 gap-5 mt-2.5">
                      <button type="button" @click="$refs.paymentConfirmation.click()" class="btn col-span-2">Carregar comprovativo de pagamento</button>
                      <button type="submit" class="btn bg-primary flex items-center justify-center text-white">Confirmar pagamento</button>
                      <input wire:model="payment_confirmation" x-ref="paymentConfirmation" type="file" accept="image/jpg,image/png,.pdf" hidden>
                    </div>
                    
                    <div class="text-sm text-danger">
                      @error('payment_confirmation')
                      {{$message}}
                      @enderror
                    </div>
                  </form>
              </div>
            </div>
            <div class="">
              <div class="flex justify-between py-2">
                <p>Pedido: CE20260001 ({{moneyFromCents($order->total_price)}})</p>
                <span>Total de items: {{$order->items->count()}}</span>
              </div>
              <div>
                @foreach($order->items as $item)
                <div class="border-t border-dark/21 flex gap-2.5 p-2">
                  <!-- <img src="/public/products/laptop_sm.jpg" alt="Laptop" class="w-16 h-16 aspect-square object-cover rounded-xl"> -->
                  <h2 class="text-base font-semibold text-dark/78 place-self-center">{{$item->variant->full_name}}</h2>
                  <div class="flex flex-col justify-between w-56">
                    <span class="place-self-end p-2 bg-cream rounded-xl w-14 h-6 flex justify-center items-center">{{$item->quantity}}</span>
                    <p class="text-black font-semibold text-base place-self-end">{{moneyFromCents($item->sale_price)}}</p>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>
</div>