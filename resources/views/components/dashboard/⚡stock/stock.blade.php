<x-layouts.dashboard>
    <div class="p-5" x-data="{showStockForm: @entangle('showStockForm')}">
        <div>
            <button x-show="!showStockForm" @click="showStockForm = !showStockForm" class="btn bg-primary text-white"><x-icons.plus fill="#fff"/>Adicionar Stock</button>
        </div>

        <div x-show="!showStockForm" class="mt-10">
            <h2 class="text-base mt-2.5 ml-2.5 leading-10">
                Listagem de stocks
            </h2>
            <!-- TABELA -->
            <div>
                <table class="w-full text-left py-2.5">
                    <thead>
                        <tr
                            class="text-base text-black font-bold border-y-2 border-gray-200"
                        >
                            <th class="p-2.5">#</th>
                            <th class="p-2.5">Nome</th>
                            <th class="p-2.5">Preco de compra</th>
                            <th class="p-2.5">Quantidade Total</th>
                            <th class="p-2.5">Quantidade Remanescente</th>
                            <th class="p-2.5 w-xl">Descricao</th>
                            <th class="p-2.5">Categoria</th>
                        </tr>
                    </thead>
                    <tbody class="text-base text-gray-600">
                        @foreach($stockBatches as $stockBatch)
                        <tr
                            class="border-b border-gray-200 hover:bg-gray-200 cursor-pointer"
                        >
                            <td class="p-2.5 flex items-center gap-2.5">
                                <p>{{ $loop->index+1 }}</p>
                            </td>
                            <td class="p-2.5">
                                {{ $stockBatch->variant->product->name }} {{ $stockBatch->variant->name }}
                            </td>
                            <td class="p-2.5">
                                {{ moneyFromCents($stockBatch->cost_price) }}
                            </td>
                            <td class="p-2.5">
                                {{ $stockBatch->total_quantity }}
                            </td>
                            <td class="p-2.5">
                                {{ $stockBatch->quantity_remaining }}
                            </td>
                            <td class="p-2.5">
                                {{ transformString($stockBatch->variant->description) }}
                            </td>
                            <td class="p-2.5">
                                {{ $stockBatch->variant->product->category->name }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- TABELA -->
        </div>

        <form x-show="showStockForm" wire:submit.prevent="saveStock" class="flex flex-col w-full mt-10">
            <div>
                <label for="productVariant">Selecione o produto</label>
                <div wire:ignore class="mt-2.5">
                    <select wire:model="stockForm.variant" id="productVariant" class="select2 form-control">
                        <option value=""></option>
                        @foreach($productVariants as $variant)
                        <option value="{{$variant->id}}">{{$variant->product->name}} {{$variant->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-danger text-sm">@error('stockForm.variant') {{$message}} @enderror</div>
            </div>

            <div class="mt-5">
                <label for="quantity">Quantidade</label>
                <input wire:model="stockForm.quantity" id="quantity" type="text" class="form-control mt-2.5 @error('stockForm.quantity') input-error @enderror" placeholder="Quantidade de produtos">
                <div class="text-danger text-sm">@error('stockForm.quantity') {{$message}} @enderror</div>
            </div>

            <div class="mt-5">
                <label for="price">Preco de compra</label>
                <input wire:model="stockForm.price" id="price" type="text" class="form-control mt-2.5 @error('stockForm.price') input-error @enderror" placeholder="Preco de compra">
                <div class="text-danger text-sm">@error('stockForm.price') {{$message}} @enderror</div>
            </div>
            
            <div class="mt-5">
                <label for="price">Preco de venda</label>
                <input wire:model="stockForm.sale_price" id="price" type="text" class="form-control mt-2.5 @error('stockForm.sale_price') input-error @enderror" placeholder="Preco de compra">
                <div class="text-danger text-sm">@error('stockForm.sale_price') {{$message}} @enderror</div>
            </div>

            <div class="flex gap-2.5 mt-10">
                <button @click="showStockForm = false" type="button" class="btn">Cancelar</button>
                <button type="submit" class="btn bg-primary text-white">Salvar</button>
            </div>
        </form>
    </div>
</x-layouts.dashboard>
@script
<script>
    $(document).ready(function(){
        $('#productVariant').on('change', function(event){
            const value = $(this).val();
            @this.stockForm.variant = value;
        });
    });
</script>
@endscript