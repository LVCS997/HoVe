<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Detalhes da Solicitação de Exame</h1>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Informações do Pet</h2>
                <p class="text-gray-600">{{ $solicitacao->pet->nome }}</p>
                <p class="text-gray-600">Dono: {{ $solicitacao->pet->owner->nome }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Informações do Médico</h2>
                <p class="text-gray-600">{{ $solicitacao->medico->nome }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Data da Solicitação</h2>
                <p class="text-gray-600">{{ $solicitacao->data_solicitacao->format('d/m/Y H:i') }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Status</h2>
                <p class="text-gray-600">
                    <span class="px-2 py-1 text-sm font-semibold rounded-full
                        @if($solicitacao->status === 'Pendente') bg-yellow-100 text-yellow-800
                        @elseif($solicitacao->status === 'Em andamento') bg-blue-100 text-blue-800
                        @else bg-green-100 text-green-800
                        @endif">
                        {{ $solicitacao->status }}
                    </span>
                </p>
            </div>

            <div class="mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Exames Solicitados</h2>
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
            </div>

            <div class="mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Arquivo PDF</h2>
                @if ($solicitacao->arquivo_pdf)
                    <a href="{{ route('solicitacoes.viewPdf', $solicitacao->id) }}" target="_blank" class="text-blue-500 hover:underline">Ver PDF</a>
                @else
                    <span class="text-gray-500">Nenhum PDF enviado</span>
                @endif
            </div>

            @if (auth()->user()->CheckRole('laboratorio'))
                <div class="mb-4">
                    <h2 class="text-xl font-semibold text-gray-700">Enviar PDF</h2>
                    <form action="{{ route('solicitacoes.uploadPdf', $solicitacao->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="arquivo_pdf" required class="border rounded px-2 py-1">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar PDF</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-layout>
