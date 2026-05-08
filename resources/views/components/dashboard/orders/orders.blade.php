<x-layouts.dashboard>
    <div class="p-5">
    @if(auth()->user()->hasRole('Admin|Manager'))
        <div class="bg-white rounded-xl mt-2.5">
            <h2 class="text-2xl text-gray-700 pb-5 mt-2.5 ml-2.5 leading-10">
                Listagem de pedidos
            </h2>

            <!-- TABELA -->
            <div>
                <table class="w-full text-left py-2.5">
                    <thead>
                        <tr
                            class="text-base text-black font-bold border-y-2 border-gray-200"
                        >
                            <th class="p-2.5">#</th>
                            <th class="p-2.5">Estado do pedido</th>
                            <th class="p-2.5">Preco Total</th>
                            <th class="p-2.5">Numero de itens</th>
                            <th class="p-2.5">Valor Pago</th>
                            <th class="p-2.5">Valor em divida</th>
                            <th class="p-2.5">Estado de pagamento</th>
                            <th class="p-2.5">Data de criacao</th>
                        </tr>
                    </thead>
                    <tbody class="text-base text-gray-600">
                        @foreach($orders as $order)
                        <tr
                            class="border-b border-gray-200 hover:bg-gray-200 cursor-pointer"
                        >
                            <td class="p-2.5 flex items-center gap-2.5">
                                <p>{{ $loop->index+1 }}</p>
                            </td>
                            <td class="p-2.5">
                                {{ $order->status }}
                            </td>
                            <td class="p-2.5">
                                {{ moneyFromCents($order->total_price) }}
                            </td>
                            <td class="p-2.5">
                                {{ $order->items->count() }}
                            </td>
                            <td class="p-2.5">
                                {{ moneyFromCents($order->payments->sum('paid_amount')) }}
                            </td>
                            <td class="p-2.5">
                                {{ moneyFromCents($order->total_price - $order->payments->sum('paid_amount')) }}
                            </td>
                            <td class="p-2.5">
                                {{ $order->payment_status }}
                            </td>
                            <td class="p-2.5">
                                {{ $order->created_at }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($orders->isEmpty())
                    <div class="text-center text-lg py-5 text-gray-700">
                        <p>Nao encontamos nenhum registro</p>
                    </div>
                @endif
            </div>
            <!-- TABELA -->
        </div>
    @endif
    @if(auth()->user()->hasRole('Customer|Admin|Manager'))
        <div class="bg-white rounded-xl mt-2.5 p-5">
            <h2 class="text-2xl text-gray-700 pb-5 mt-2.5 ml-2.5 leading-10">
                Meus pedidos
            </h2>

            <!-- TABELA -->
            <div>
                <table class="w-full text-left py-2.5">
                    <thead>
                        <tr
                            class="text-base text-black font-bold border-y-2 border-gray-200"
                        >
                            <th class="p-2.5">#</th>
                            <th class="p-2.5">Estado do pedido</th>
                            <th class="p-2.5">Preco Total</th>
                            <th class="p-2.5">Numero de itens</th>
                            <th class="p-2.5">Valor Pago</th>
                            <th class="p-2.5">Valor em divida</th>
                            <th class="p-2.5">Estado de pagamento</th>
                            <th class="p-2.5">Data de criacao</th>
                        </tr>
                    </thead>
                    <tbody class="text-base text-gray-600">
                        @foreach($orders as $order)
                        <tr
                            class="border-b border-gray-200 hover:bg-gray-200 cursor-pointer"
                        >
                            <td class="p-2.5 flex items-center gap-2.5">
                                <p>{{ $loop->index+1 }}</p>
                            </td>
                            <td class="p-2.5">
                                {{ $order->status }}
                            </td>
                            <td class="p-2.5">
                                {{ moneyFromCents($order->total_price) }}
                            </td>
                            <td class="p-2.5">
                                {{ $order->items->count() }}
                            </td>
                            <td class="p-2.5">
                                {{ moneyFromCents($order->payments->sum('paid_amount')) }}
                            </td>
                            <td class="p-2.5">
                                {{ moneyFromCents($order->total_price - $order->payments->sum('paid_amount')) }}
                            </td>
                            <td class="p-2.5">
                                {{ $order->payment_status }}
                            </td>
                            <td class="p-2.5">
                                {{ $order->created_at }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($orders->isEmpty())
                    <div class="text-center text-lg py-5 text-gray-700">
                        <p>Nao encontamos nenhum registro</p>
                    </div>
                @endif
            </div>
            <!-- TABELA -->
        </div>
    @endif
    </div>
</x-layouts.dashboard>