<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Solicitações de Exames</h1>
        <div class="bg-white shadow-lg rounded-lg p-6">
            @if ($solicitacoes->isEmpty())
                <p class="text-gray-600 text-center">Nenhuma solicitação de exame encontrada.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Pet</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Dono</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Médico</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Data</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Status</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Exames</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($solicitacoes as $solicitacao)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-300">{{ $solicitacao->pet->nome }}</td>
                                <td class="px-6 py-4 border-b border-gray-300">{{ $solicitacao->pet->owner->nome }}</td>
                                <td class="px-6 py-4 border-b border-gray-300">{{ $solicitacao->medico->nome }}</td>
                                <td class="px-6 py-4 border-b border-gray-300">{{ $solicitacao->data_solicitacao->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                        <span class="px-2 py-1 text-sm font-semibold rounded-full
                                            @if($solicitacao->status === 'Pendente') bg-yellow-100 text-yellow-800
                                            @elseif($solicitacao->status === 'Em andamento') bg-blue-100 text-blue-800
                                            @else bg-green-100 text-green-800
                                            @endif">
                                            {{ $solicitacao->status }}
                                        </span>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    <ul class="list-disc list-inside">
                                        @foreach ($solicitacao->itens as $item)
                                            <li>
                                                {{ $item->exame->nome }}:
                                                {{ $item->categoria->nome }}
                                                @if ($item->subcategoria)
                                                    - {{ $item->subcategoria->nome }}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-layout>
