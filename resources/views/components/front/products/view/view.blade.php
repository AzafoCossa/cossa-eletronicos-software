
<div>
    <livewire:front.navbar />
    <main class="px-5">
      <div class="container mx-auto rounded-xl p-7">
        <a href="{{ route('home') }}" class="btn mb-5 inline-block">Voltar</a>
        <div class="grid grid-cols-2 gap-5">
          <div class="flex flex-col gap-2.5">
            <img src="/storage/{{$product->images->first()->path}}" alt="Laptop" class="w-full h-auto aspect-square rounded-xl">
            <!-- <div class="flex justify-between bg-cream/70 gap-2.5 py-2.5 px-5 rounded-xl">
              <img src="./public/products/product_1.jpg" alt="Laptop" class="w-30 rounded-xl h-auto aspect-square">
              <img src="./public/products/product_1.jpg" alt="Laptop" class="w-30 rounded-xl h-auto aspect-square">
              <img src="./public/products/product_1.jpg" alt="Laptop" class="w-30 rounded-xl h-auto aspect-square">
              <img src="./public/products/product_1.jpg" alt="Laptop" class="w-30 rounded-xl h-auto aspect-square">
              <img src="./public/products/product_1.jpg" alt="Laptop" class="w-30 rounded-xl h-auto aspect-square">
            </div> -->
          </div>
          <div class="flex flex-col gap-10">
            <div>
              <h1 class="font-semibold text-5xl text-dark">{{$variant_index ? $product->variants[$variant_index]->full_name : $product->variant->full_name}}</h1>
              <p class="text-primary font-semibold text-2xl mt-2.5"> {{ moneyFromCents($variant_index ? $product->variants[$variant_index]->price : $product->variant->price)}}</p>
            </div>
            <div class="text-2xl text-dark/80 leading-9">
              <p>{{$variant_index ? $product->variants[$variant_index]->description : $product->variant->description}}</p>
            </div>
            <div>
              <button wire:click="addToCart({{$variant_index ? $product->variants[$variant_index] : $product->variant}})" type="button" class="btn bg-primary text-white">Adicionar ao carrinho</button>
            </div>
          </div>
        </div>
      </div>
    </main>
</div>