<x-layouts.dashboard>
    <div class="p-5" x-data="{showVariantForm: @entangle('showVariantForm')}">
        <div class="flex">
            <a href="{{ route('dashboard.products') }}" class="btn bg-gray-300"><x-icons.back fill="#042940"/>Voltar</a>
        </div>

        <div class="mt-10">
            <div>
                <button x-show="!showVariantForm" @click="showVariantForm = !showVariantForm" class="btn text-white bg-primary"><x-icons.plus fill="#fff"/>Adicionar variante</button>
            </div>

            <div x-show="!showVariantForm">
                <div class="bg-white rounded-xl mt-2.5">
                    <h2 class="text-base mt-2.5 ml-2.5 leading-10">
                        Listagem de produtos
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
                                    <th class="p-2.5">Descrição</th>
                                    <th class="p-2.5">Categoria</th>
                                </tr>
                            </thead>
                            <tbody class="text-base text-gray-600">
                                @foreach($product->variants as $variant)
                                <tr
                                    class="border-b border-gray-200 hover:bg-gray-200 cursor-pointer"
                                >
                                    <td class="p-2.5 flex items-center gap-2.5">
                                        <p>{{ $loop->index+1 }}</p>
                                    </td>
                                    <td class="p-2.5">
                                        {{$product->name. ' '. $variant->name }}
                                    </td>
                                    <td class="p-2.5">
                                        {{$product->name. ' '. $variant->name }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- TABELA -->
                </div>
            </div>

            <form x-show="showVariantForm" wire:submit.prevent="saveVariant" class="mt-5 w-full max-w-2xl">
                <div>
                    <label for="name">Nome do produto</label>
                    <input type="text" class="form-control mt-2.5" value="{{$product->name}}" readonly>
                </div>
                <div class="mt-2.5">
                    <label for="name">Nome da variante</label>
                    <input wire:model="productVariantForm.name" type="text" class="form-control mt-2.5" placeholder="Digite o nome da variante">
                </div>

                <div class="mt-5">
                    <label for="name">Nome do fornecedor</label>
                    <div wire:ignore class="mt-2.5">
                        <select wire:model="productVariantForm.supplier" id="supplierSelect" class="form-control select2">
                            <option value=""></option>
                            @foreach($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-danger text-sm">@error('productVariant.supplier') {{ $message }} @enderror</div>
                </div>

                <div class="mt-10 flex gap-2.5">
                    <button @click="showVariantForm = false" type="button" class="btn">Cancelar</button>
                    <button type="submit" class="btn bg-primary text-white">Salvar variante</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>
@script
    <script>
        $(document).ready(function(){
        $('#supplierSelect').on('change', function (event) {
            const value = $(this).val();
            @this.productVariantForm.supplier = value;
        })
    });
    </script>
@endscript