<x-layouts.dashboard>
    <div class="p-5">
        <div>
            <div class="bg-white rounded-xl mt-2.5">
                <h2 class="text-base mt-2.5 ml-2.5 leading-10">
                    Listagem de clientes
                </h2>

                <!-- TABELA -->
                <div>
                    <table class="w-full text-left py-2.5">
                        <thead>
                            <tr
                                class="text-base text-black font-bold border-y-2 border-gray-200"
                            >
                                <th class="p-2.5">#</th>
                                <th class="p-2.5">Nome completo</th>
                                <th class="p-2.5">Identificador (Email/Celular)</th>
                            </tr>
                        </thead>
                        <tbody class="text-base text-gray-600">
                            @foreach($clients as $client)
                            <tr
                                class="border-b border-gray-200 hover:bg-gray-200 cursor-pointer"
                            >
                                <td class="p-2.5 flex items-center gap-2.5">
                                    <p>{{ $loop->index+1 }}</p>
                                </td>
                                <td class="p-2.5">
                                    {{ $client->full_name }}
                                </td>
                                <td class="p-2.5">
                                    {{ $client->identifiers->first()->value }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($clients->isEmpty())
                        <div class="text-center text-lg py-5 text-gray-700">
                            <p>Nao encontamos nenhum registro</p>
                        </div>
                    @endif
                </div>
                <!-- TABELA -->
            </div>
        </div>
    </div>
</x-layouts.dashboard>