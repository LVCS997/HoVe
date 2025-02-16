<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Lista de Exames</h1>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <table class="w-full">
                <thead>
                <tr>
                    <th class="text-left">Pet</th>
                    <th class="text-left">Tipo de Exame</th>
                    <th class="text-left">Data do Agendamento</th>
                    <th class="text-left">Veterinário</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($exames as $exame)
                    <tr>
                        <td>{{ $exame->pet->nome }}</td>
                        <td>
                            @if ($exame->radiografia_simples)
                                Radiografia Simples
                            @elseif ($exame->ultrassonografia)
                                Ultrassonografia
                            @elseif ($exame->tomografia)
                                Tomografia
                            @elseif ($exame->cardiologia)
                                Cardiologia
                            @endif
                        </td>
                        <td>{{ $exame->data_agendamento->format('d/m/Y H:i') }}</td>
                        <td>{{ $exame->veterinario_nome }} (CRMV: {{ $exame->veterinario_crmv }})</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
