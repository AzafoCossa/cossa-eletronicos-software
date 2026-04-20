<x-layouts.dashboard>
    <div class="p-5" x-data="{openSupplierModal: false}">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Fornecedores</h1>
        <p class="text-gray-600">
            Gerencie os fornecedores da sua empresa aqui.
        </p>

        <div class="mt-5">
            <button
                @click="openSupplierModal = true"
                class="flex gap-2.5 px-5 py-2.5 text-lg items-center cursor-pointer bg-primary text-white rounded hover:bg-primary-dark transition"
            >
                <x-plus-icon />
                Adicionar Fornecedor
            </button>

            <div class="bg-white rounded-xl mt-2.5">
                    <h2 class="text-base mt-2.5 ml-2.5 leading-10">
                        Listagem de fornecedores
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
                                    <th class="p-2.5">Bairro</th>
                                    <th class="p-2.5">Endereço</th>
                                    <th class="p-2.5">Descrição</th>
                                </tr>
                            </thead>
                            <tbody class="text-base text-gray-600">
                                @foreach($suppliers as $supplier)
                                <tr
                                    class="border-b border-gray-200 hover:bg-gray-200"
                                >
                                    <td class="p-2.5 flex items-center gap-2.5">
                                        <p>{{ $loop->index+1 }}</p>
                                    </td>
                                    <td class="p-2.5">
                                        {{ $supplier->name }}
                                    </td>
                                    <td class="p-2.5">
                                        {{ $supplier->block->name }}
                                    </td>
                                    <td class="p-2.5">
                                        {{ $supplier->address }}
                                    </td>
                                    <td class="p-2.5">
                                        {{ $supplier->description }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- TABELA -->
                </div>
        </div>

        <!-- Supplier MODAL -->
            <div
                class="absolute top-0 left-0 flex items-center justify-center w-full h-full"
                style="background-color: rgba(0, 0, 0, 0.5)"
                x-show="openSupplierModal"
            >
                <!-- A basic modal dialog with title, body and one button to close -->
                <div
                    class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl w-full md:max-w-xl md:p-6 lg:p-8 md:mx-0"
                    @click.away="openSupplierModal = false"
                >
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 border-b-2 border-dark/30 pb-2">
                            Adicionar fornecedor
                        </h3>

                        <div class="mt-10">
                            <form wire:submit.prevent="saveSupplier">
                                <div class="flex flex-col">
                                    <label for="name">Nome do fornecedor</label>
                                    <input
                                        wire:model="supplierForm.name"
                                        type="text"
                                        id="name"
                                        placeholder="Digite o nome do fornecedor"
                                        class="bg-gray-200 rounded-xl py-4 px-6 mt-2.5 @error('supplierForm.name') border-2 border-red-500 @enderror"
                                    />
                                </div>

                                <div class="flex flex-col mt-4">
                                    <label for="blockName">Bairro</label>
                                    <select wire:model="supplierForm.block" id="blockName" class="bg-gray-200 px-5 py-4 @error('supplierForm.block') border-2 border-danger @enderror">
                                        <option value="">Selecione um bairro</option>
                                        @foreach($blocks as $block)
                                            <option value="{{ $block->id }}">{{ $block->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="flex flex-col mt-4">
                                    <label for="address">Endereço</label>
                                    <input
                                        wire:model="supplierForm.address"
                                        type="text"
                                        id="address"
                                        placeholder="Digite o endereço do fornecedor"
                                        class="bg-gray-200 rounded-xl py-4 px-6 mt-2.5 @error('supplierForm.address') border-2 border-red-500 @enderror"
                                    />
                                </div>

                                <div class="flex flex-col mt-4">
                                    <label for="description">Descrição</label>
                                    <input
                                        wire:model="supplierForm.description"
                                        type="text"
                                        id="description"
                                        placeholder="Digite a descrição do fornecedor"
                                        class="bg-gray-200 rounded-xl py-4 px-6 mt-2.5 @error('supplierForm.description') border-2 border-red-500 @enderror"
                                    />
                                </div>

                                <div class="flex w-full gap-2.5 mt-5 sm:mt-6">
                                    <button type="button"
                                        @click="openSupplierModal = false"
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
            <!-- Supplier Modal -->
    </div>
</x-layouts.dashboard>
@script
    <script>
    </script>
@endscript