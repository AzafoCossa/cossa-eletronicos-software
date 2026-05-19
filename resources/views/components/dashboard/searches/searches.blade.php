<x-layouts.dashboard>
@section('title')
Pesquisas de produtos
@endsection
    <div class="p-5">
        <div>
            <div class="bg-white rounded-xl mt-2.5">
                <h2 class="text-base mt-2.5 ml-2.5 leading-10">
                    Listagem de produtos pesquisados
                </h2>

                <!-- TABELA -->
                <div>
                    <table class="w-full text-left py-2.5">
                        <thead>
                            <tr
                                class="text-base text-black font-bold border-y-2 border-gray-200"
                            >
                                <th class="p-2.5">#</th>
                                <th class="p-2.5">Termo de pesquisa</th>
                                <th class="p-2.5 text-center">Numero de esquisas</th>
                                <th class="p-2.5 text-center">Produtos retornados</th>
                                <th class="p-2.5">Data de ultima pesquisa</th>
                            </tr>
                        </thead>
                        <tbody class="text-base text-gray-600">
                            @foreach($searches as $search)
                            <tr
                                class="border-b border-gray-200 hover:bg-gray-200 cursor-pointer"
                            >
                                <td class="p-2.5 flex items-center gap-2.5">
                                    <p>{{ $loop->index+1 }}</p>
                                </td>
                                <td class="p-2.5">
                                    {{ $search->term }}
                                </td>
                                <td class="p-2.5 text-center">
                                    {{ $search->search_count }}
                                </td>
                                <td class="p-2.5 text-center">
                                    {{ $search->results_count }}
                                </td>
                                <td class="p-2.5">
                                    {{ $search->last_searched_at }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($searches->isEmpty())
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