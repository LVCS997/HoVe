<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Detalhes do Tutor/Responsável</h1>

        <!-- Card de Detalhes do Dono -->
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto mb-8">
            <!-- Título da Seção -->
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Informações do Dono</h2>

            <!-- Grid para Detalhes do Dono -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Coluna 1 -->
                <div class="space-y-4">
                    <!-- ID -->
                    <div class="flex items-center">
                        <i data-feather="hash" class="w-5 h-5 mr-2 text-gray-600"></i>
                        <p><strong class="text-gray-700">ID:</strong> <span class="text-gray-800">{{ $owner->id }}</span></p>
                    </div>

                    <!-- Nome -->
                    <div class="flex items-center">
                        <i data-feather="user" class="w-5 h-5 mr-2 text-gray-600"></i>
                        <p><strong class="text-gray-700">Nome:</strong> <span class="text-gray-800">{{ $owner->nome }}</span></p>
                    </div>

                    <!-- RG -->
{{--                    <div class="flex items-center">--}}
{{--                        <i data-feather="credit-card" class="w-5 h-5 mr-2 text-gray-600"></i>--}}
{{--                        <p><strong class="text-gray-700">RG:</strong> <span--}}
{{--                                class="text-gray-800">{{ $owner->rg }}</span></p>--}}
{{--                    </div>--}}

                    <!-- CPF -->
                    <div class="flex items-center">
                        <i data-feather="credit-card" class="w-5 h-5 mr-2 text-gray-600"></i>
                        <p><strong class="text-gray-700">CPF:</strong> <span class="text-gray-800">{{ $owner->cpf }}</span></p>
                    </div>

                    <!-- Telefone -->
                    <div class="flex items-center">
                        <i data-feather="phone" class="w-5 h-5 mr-2 text-gray-600"></i>
                        <p><strong class="text-gray-700">Telefone:</strong> <span class="text-gray-800">{{ $owner->telefone }}</span></p>
                    </div>

                    <!-- Data de Nascimento -->
                    <div class="flex items-center">
                        <i data-feather="calendar" class="w-5 h-5 mr-2 text-gray-600"></i>
                        <p><strong class="text-gray-700">Data de Nascimento:</strong> <span class="text-gray-800">{{ $owner->data_nascimento }}</span></p>
                    </div>
                </div>

                <!-- Coluna 2 -->
                <div class="space-y-4">
                    <!-- CEP -->
                    <div class="flex items-center">
                        <i data-feather="map-pin" class="w-5 h-5 mr-2 text-gray-600"></i>
                        <p><strong class="text-gray-700">CEP:</strong> <span class="text-gray-800">{{ $owner->cep }}</span></p>
                    </div>

                    <!-- Logradouro -->
                    <div class="flex items-center">
                        <i data-feather="map" class="w-5 h-5 mr-2 text-gray-600"></i>
                        <p><strong class="text-gray-700">Logradouro:</strong> <span class="text-gray-800">{{ $owner->logradouro }}</span></p>
                    </div>

                    <!-- Número -->
                    <div class="flex items-center">
                        <i data-feather="home" class="w-5 h-5 mr-2 text-gray-600"></i>
                        <p><strong class="text-gray-700">Número:</strong> <span class="text-gray-800">{{ $owner->numero }}</span></p>
                    </div>

                    <!-- Complemento -->
                    <div class="flex items-center">
                        <i data-feather="plus" class="w-5 h-5 mr-2 text-gray-600"></i>
                        <p><strong class="text-gray-700">Complemento:</strong> <span class="text-gray-800">{{ $owner->complemento ?? 'N/A' }}</span></p>
                    </div>

                    <!-- Bairro -->
                    <div class="flex items-center">
                        <i data-feather="map-pin" class="w-5 h-5 mr-2 text-gray-600"></i>
                        <p><strong class="text-gray-700">Bairro:</strong> <span class="text-gray-800">{{ $owner->bairro }}</span></p>
                    </div>

                    <!-- Cidade -->
                    <div class="flex items-center">
                        <i data-feather="map" class="w-5 h-5 mr-2 text-gray-600"></i>
                        <p><strong class="text-gray-700">Cidade:</strong> <span class="text-gray-800">{{ $owner->cidade }}</span></p>
                    </div>

                    <!-- Estado -->
                    <div class="flex items-center">
                        <i data-feather="flag" class="w-5 h-5 mr-2 text-gray-600"></i>
                        <p><strong class="text-gray-700">Estado:</strong> <span class="text-gray-800">{{ $owner->estado }}</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card de Lista de Pets -->
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto">
            <!-- Título da Seção -->
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Pets Associados</h2>

            <!-- Verifica se há pets -->
            @if ($owner->pets->isEmpty())
                <p class="text-gray-600 text-center">Nenhum pet associado a este dono.</p>
            @else
                <!-- Tabela de Pets -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nome</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Espécie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Raça</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Idade</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Ações</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        @foreach ($owner->pets as $pet)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $pet->id }}</td>
                                <td class="px-6 py-4">{{ $pet->nome }}</td>
                                <td class="px-6 py-4">{{ $pet->especie }}</td>
                                <td class="px-6 py-4">{{ $pet->raca }}</td>
                                <td class="px-6 py-4">{{ $pet->idade }} anos</td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('pets.show', $pet->id) }}" class="text-blue-500 hover:text-blue-700">Ver</a>
                                    <a href="{{ route('pets.edit', $pet->id) }}" class="text-yellow-500 hover:text-yellow-700">Editar</a>
                                    <a href="{{ route('exame-clinico.create', $pet->id) }}" class="text-green-500 hover:text-green-700">Exame Clínico</a>
                                    <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Botão Voltar -->
        <div class="mt-8 text-center">
            <a href="{{ route('owners.index') }}" class="inline-flex items-center bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                <i data-feather="arrow-left" class="w-5 h-5 mr-2"></i>
                Voltar
            </a>
        </div>
    </div>

    <!-- Script para carregar ícones -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace(); // Inicializa os ícones
    </script>
</x-layout>
