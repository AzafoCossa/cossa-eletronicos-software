<x-layouts.dashboard>
    <div class="p-5" x-data="{ showCategoryForm: @entangle('showCategoryForm'), showProductForm: @entangle('showProductForm') }">
        <div class="flex gap-2.5">
            <button x-show="!showCategoryForm && !showProductForm" @click="showProductForm = true" class="btn text-white bg-primary"><x-plus-icon/>Adicionar produto</button>
            <button x-show="!showCategoryForm && !showProductForm" @click="showCategoryForm = true" class="btn text-white bg-blue-500"><x-plus-icon/>Adicionar categoria</button>
        </div>

        <div x-show="!showCategoryForm && !showProductForm">
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
                                <th class="p-2.5">Numero de variantes</th>
                                <th class="p-2.5">Categoria</th>
                            </tr>
                        </thead>
                        <tbody class="text-base text-gray-600">
                            @foreach($products as $product)
                            <tr wire:click="viewProduct({{$product}})"
                                class="border-b border-gray-200 hover:bg-gray-200 cursor-pointer"
                            >
                                <td class="p-2.5 flex items-center gap-2.5">
                                    <p>{{ $loop->index+1 }}</p>
                                </td>
                                <td class="p-2.5">
                                    {{ $product->name }}
                                </td>
                                <td class="p-2.5 text-center">
                                    {{ $product->variants->count() }}
                                </td>
                                <td class="p-2.5">
                                    {{ $product->category->name }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- TABELA -->
            </div>
        </div>

        <!-- FORMULÁRIO DE ADIÇÃO DE Productos -->
        <div x-show="showProductForm" class="w-2xl mt-5">
            <form wire:submit.prevent="saveProduct">
                <div class="text-sm text-danger mb-5">
                    @error('product_error') {{$message}} @enderror
                </div>
                <div class="flex flex-col">
                    <div wire:ignore>
                        <label for="productCategory">Categoria do produto</label>
                        <select id="productCategory" wire:model="productForm.category_id" class="select2 mt-2.5 form-control">
                            <option value="">Selecione uma categoria</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-danger text-sm">@error('productForm.category'){{ $message }}@enderror</div>
                </div>
                <div class="flex flex-col mt-5">
                    <label for="productName">Nome do produto</label>
                    <input wire:model="productForm.name" type="text" class="mt-2.5 form-control @error('productForm.name') input-error @enderror" placeholder="Digite o nome do produto">
                </div>

                <div>
                    <div class="flex flex-col gap-2.5 mt-5">
                        <input wire:model="productForm.imageFile" type="file" placeholder="Selecione uma imagem" class="form-control grow @error('productForm.imageFile') input-error @enderror" accept="image/jpeg,image/png">
                        <div class="text-danger text-sm">@error('productForm.imageFile'){{ $message }}@enderror</div>
                    </div>
                </div>

                <div class="flex mt-10 gap-2.5">
                    <button @click="showProductForm = false" type="button" class="btn">Cancelar</button>
                    <button type="submit" class="btn bg-blue-600 text-white">Salvar produto</button>
                </div>
            </form>
        </div>

        <!-- FORMULÁRIO DE ADIÇÃO DE CATEGORIA -->
        <div x-show="showCategoryForm" class="w-2xl mt-5">
            <form wire:submit.prevent="saveCategory">
                <div class="flex flex-col">
                    <label for="categoryName">Nome da categoria</label>
                    <input wire:model="categoryForm.name" type="text" class="mt-2.5 form-control @error('categoryForm.name') input-error @enderror" placeholder="Digite o nome da categoria">
                </div>

                <div class="flex mt-10 gap-2.5">
                    <button @click="showCategoryForm = false" type="button" class="btn">Cancelar</button>
                    <button type="submit" class="btn bg-blue-600 text-white">Salvar categoria</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>
@script
<script>
    $(document).ready(function(){
        $('#productCategory').on('change', function (event) {
            const value = $(this).val();
            @this.productForm.category = value;
        })
    });
</script>
@endscript