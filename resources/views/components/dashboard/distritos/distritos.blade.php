<x-layouts.dashboard>
    <div class="p-5" x-data="{openDistrictModal: @entangle('openDistrictModal')}">
        <div class="flex w-full gap-2.5 my-5">
            <button @click="openDistrictModal = true" class="flex gap-2.5 px-8 py-2.5 text-white bg-gray-600 rounded-xl cursor-pointer text-lg items-center">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.5385 1.53846C11.5385 0.6875 10.851 0 10 0C9.14904 0 8.46154 0.6875 8.46154 1.53846V8.46154H1.53846C0.6875 8.46154 0 9.14904 0 10C0 10.851 0.6875 11.5385 1.53846 11.5385H8.46154V18.4615C8.46154 19.3125 9.14904 20 10 20C10.851 20 11.5385 19.3125 11.5385 18.4615V11.5385H18.4615C19.3125 11.5385 20 10.851 20 10C20 9.14904 19.3125 8.46154 18.4615 8.46154H11.5385V1.53846Z" fill="white"/>
                </svg>

                    Distrito/Cidade
            </button>
        </div>
        <!-- TABELA DE Districtos -->
        <div class="bg-white rounded-xl mt-2.5">
            <h2 class="text-base mt-2.5 ml-2.5 leading-10">
                Listagem de distritos
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
                            <th class="p-2.5">Provincia</th>
                            <th class="p-2.5">Coberto</th>
                        </tr>
                    </thead>
                    <tbody class="text-base text-gray-600">
                        @foreach($districts as $district)
                        <tr wire:click="editDistrict({{$district}})"
                            class="border-b border-gray-200 hover:bg-gray-200 cursor-pointer"
                        >
                            <td class="p-2.5 flex items-center gap-2.5">
                                <p>{{ $loop->index+1 }}</p>
                            </td>
                            <td class="p-2.5">
                                {{ $district->name }}
                            </td>
                            <td class="p-2.5">
                                {{ $district->province->name }}
                            </td>
                            <td class="p-2.5">
                                {{ $district->is_covared ? 'Sim' : 'Não' }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- TABELA -->
        </div>

                <!-- District MODAL -->
        <div
            class="absolute top-0 left-0 flex items-center justify-center w-full h-full"
            style="background-color: rgba(0, 0, 0, 0.5)"
            x-show="openDistrictModal"
        >
            <!-- A basic modal dialog with title, body and one button to close -->
            <div
                class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl w-full md:max-w-xl md:p-6 lg:p-8 md:mx-0"
                @click.away="openDistrictModal = false"
            >
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 border-b-2 border-dark/30 pb-2">
                        {{$editMode ? 'Atualizar' : 'Adicionar'}} distrito
                    </h3>

                    <div class="mt-10">
                        <form wire:submit.prevent="{{$editMode ? 'updateDistrict' : 'saveDistrict'}}">
                            <div class="flex flex-col">
                                <label for="provinceName">Selecione a provincia</label>
                                <select wire:model="districtForm.province" id="provinceName" class="bg-gray-200 px-5 py-4 @error('districtForm.province') border-2 border-danger @enderror">
                                    <option value="">Selecione uma provincia</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex flex-col mt-5">
                                <label for="districtName">Nome do distrito/cidade</label>
                                <x-forms.input wire:model="districtForm.name" id="districtName" placeholder="Digite o nome do distrito/cidade" class=""/>
                                <div>@error('districtForm.name') <span class="text-danger text-sm">{{ $message }}</span> @enderror</div>
                            </div>

                            <div class="mt-5">
                                <label class="inline-flex items-center cursor-pointer">
                                <input wire:model="districtForm.is_covered" type="checkbox" value="" class="sr-only peer" checked>
                                <div class="relative w-9 h-5 bg-gray-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:bg-gray-400 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-buffer after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-dark after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
                                <span class="ms-3 text-sm font-medium text-dark select-none">Esta coberto?</span>
                                </label>
                            </div>

                            <div class="flex w-full gap-2.5 mt-5 sm:mt-6">
                                <button type="button"
                                    @click="openDistrictModal = false"
                                    class="inline-flex justify-center px-8 py-2.5 text-black bg-gray-300 rounded hover:bg-gray-400 cursor-pointer"
                                >
                                    Fechar
                                </button>

                                <button type="submit"
                                    class="inline-flex justify-center px-8 py-2.5 text-white bg-primary rounded hover:bg-primary/90 cursor-pointer"
                                >
                                    {{$editMode ? 'Atualizar' : 'Salvar'}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- District Modal -->
    </div>
</x-layouts.dashboard>