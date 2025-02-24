<x-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Detalhes do Prontuário</h1>

        <div class="bg-white p-6 rounded-lg shadow-sm">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Informações Gerais</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-600">Data do Exame:</p>
                    <p class="text-gray-800">{{ $exameClinico->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Médico Responsável:</p>
                    <p class="text-gray-800">{{ $exameClinico->medico->nome }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Pet:</p>
                    <p class="text-gray-800">{{ $exameClinico->pet->nome }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6 bg-white p-6 rounded-lg shadow-sm">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Detalhes do Exame</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-600">Escore Corporal:</p>
                    <p class="text-gray-800">{{ $exameClinico->escore_corporal }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Pelo e Pele:</p>
                    <p class="text-gray-800">{{ $exameClinico->pelo_pele }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Atividade Geral:</p>
                    <p class="text-gray-800">{{ $exameClinico->atividade_geral }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Desidratação:</p>
                    <p class="text-gray-800">{{ $exameClinico->desidratacao }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Ectoparasitas:</p>
                    <p class="text-gray-800">{{ $exameClinico->ectoparasitas }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Temperatura Corporal:</p>
                    <p class="text-gray-800">{{ $exameClinico->temperatura_corporal }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Frequência Respiratória:</p>
                    <p class="text-gray-800">{{ $exameClinico->frequencia_respiratoria }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Frequência Cardíaca:</p>
                    <p class="text-gray-800">{{ $exameClinico->frequencia_cardiaca }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Tempo de Preenchimento Capilar:</p>
                    <p class="text-gray-800">{{ $exameClinico->tempo_preenchimento_capilar }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Mucosas:</p>
                    <p class="text-gray-800">{{ $exameClinico->mucosas }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Perdas:</p>
                    <p class="text-gray-800">{{ $exameClinico->perdas }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Afundamento Ocular:</p>
                    <p class="text-gray-800">{{ $exameClinico->afundamento_ocular }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Elasticidade da Pele:</p>
                    <p class="text-gray-800">{{ $exameClinico->elasticidade_pele }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Observações:</p>
                    <p class="text-gray-800">{{ $exameClinico->observacoes }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Exames Realizados:</p>
                    <p class="text-gray-800">{{ $exameClinico->exames_realizados }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Diagnóstico Presuntivo:</p>
                    <p class="text-gray-800">{{ $exameClinico->diagnostico_presuntivo }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Prescrição Hospitalar:</p>
                    <p class="text-gray-800">{{ $exameClinico->prescricao_hospitalar }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Prescrição Domiciliar:</p>
                    <p class="text-gray-800">{{ $exameClinico->prescricao_domiciliar }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('exame-clinico.pdf', $exameClinico->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                Baixar PDF
            </a>
            <a href="{{ route('pets.historico-clinico', $exameClinico->pet->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                Voltar ao Histórico
            </a>
        </div>
    </div>
</x-layout>
