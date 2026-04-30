<x-layouts.dashboard>
    <div class="p-5" x-data="{ showCategoryForm: @entangle('showCategoryForm') }">
        <div class="flex gap-2.5">
            <button x-show="!showCategoryForm" @click="showCategoryForm = true" class="btn text-white bg-blue-500"><x-plus-icon/>Adicionar categoria</button>
        </div>

        <div x-show="!showCategoryForm">

            <div class="bg-white rounded-xl mt-2.5">
                <h2 class="text-base mt-2.5 ml-2.5 leading-10">
                    Listagem de Categorias
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
                                <th class="p-2.5">Subcategorias</th>
                            </tr>
                        </thead>
                        <tbody class="text-base text-gray-600">
                            @foreach($category->children as $children)
                            <tr wire:click="viewCategory({{$children}})"
                                class="border-b border-gray-200 hover:bg-gray-200 cursor-pointer"
                            >
                                <td class="p-2.5 flex items-center gap-2.5">
                                    <p>{{ $loop->index+1 }}</p>
                                </td>
                                <td class="p-2.5">
                                    {{ $children->name }}
                                </td>
                                <td class="p-2.5">
                                    {{ $children->children->count() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- TABELA -->
            </div>
        </div>

        <!-- FORMULÁRIO DE ADIÇÃO DE CATEGORIA -->
        <div x-show="showCategoryForm" class="w-2xl mt-5">
            <form wire:submit.prevent="saveCategory">
                <input type="text" class="form-control" value="{{$category->name}}" disabled>

                <div class="flex flex-col mt-5">
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