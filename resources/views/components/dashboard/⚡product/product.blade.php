<x-layouts.dashboard>
    <div class="p-5" x-data="{ openCategoryModal: false }">
        <button @click="openCategoryModal = true" class="btn bg-blue-600 text-white">
            <x-plus-icon/>Adicionar Categoria
        </button>

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
                            <th class="p-2.5">Sub-categorias</th>
                        </tr>
                    </thead>
                    <tbody class="text-base text-gray-600">
                        @foreach($categories as $category)
                        <tr
                            class="border-b border-gray-200 hover:bg-gray-200"
                        >
                            <td class="p-2.5 flex items-center gap-2.5">
                                <p>{{ $loop->index+1 }}</p>
                            </td>
                            <td class="p-2.5">
                                {{ $category->name }}
                            </td>
                            <td class="p-2.5">
                                {{ $category->children->count() }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- TABELA -->
        </div>

        
         <!-- Category MODAL -->
        <div
            class="absolute top-0 left-0 flex items-center justify-center w-full h-full"
            style="background-color: rgba(0, 0, 0, 0.5)"
            x-show="openCategoryModal"
        >
            <!-- A basic modal dialog with title, body and one button to close -->
            <div
                class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl w-full md:max-w-xl md:p-6 lg:p-8 md:mx-0"
                @click.away="openCategoryModal = false"
            >
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 border-b-2 border-dark/30 pb-2">
                        Adicionar categoria
                    </h3>

                    <div class="mt-10">
                        <form wire:submit.prevent="saveCategory">
                            <div class="flex flex-col">
                                <label for="name">Nome da categoria</label>
                                <input
                                    wire:model="categoryForm.name"
                                    type="text"
                                    id="name"
                                    placeholder="Digite o nome da categoria"
                                    class="bg-gray-200 rounded-xl py-4 px-6 mt-2.5 @error('categoryForm.name') border-2 border-red-500 @enderror"
                                />
                            </div>

                            <div class="flex w-full gap-2.5 mt-5 sm:mt-6">
                                <button type="button"
                                    @click="openCategoryModal = false"
                                    class="inline-flex justify-center px-8 py-2.5 text-black bg-gray-300 rounded hover:bg-gray-400 cursor-pointer"
                                >
                                    Fechar
                                </button>

                                <button type="submit"
                                    class="inline-flex justify-center px-8 py-2.5 text-white bg-primary rounded hover:bg-primary/90 cursor-pointer"
                                >
                                    Salvar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category Modal -->
    </div>
</x-layouts.dashboard>