<x-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Histórico Clínico de {{ $pet->nome }}</h1>

        @if ($examesClinicos->isEmpty())
            <p class="text-gray-600">Nenhum exame clínico registrado para este pet.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Médico</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Diagnóstico Presuntivo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Observações</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach ($examesClinicos as $exame)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $exame->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $exame->medico->nome }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $exame->diagnostico_presuntivo }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $exame->observacoes }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <a href="{{ route('exame-clinico.show', $exame->id) }}" class="text-indigo-600 hover:text-indigo-900">Ver Detalhes</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ route('pets.show', $pet->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                Voltar
            </a>
        </div>
        <!-- Links de Paginação -->
        <div class="mt-6">
            {{ $examesClinicos->links() }}
        </div>
    </div>
</x-layout>
