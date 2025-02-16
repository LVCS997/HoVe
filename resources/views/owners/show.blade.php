<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Detalhes do Dono/Responsável</h1>
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto">
            <!-- Detalhes do Dono -->
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
                    <div class="flex items-center">
                        <i data-feather="credit-card" class="w-5 h-5 mr-2 text-gray-600"></i>
                        <p><strong class="text-gray-700">RG:</strong> <span class="text-gray-800">{{ $owner->rg }}</span></p>
                    </div>

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

            <!-- Botão Voltar -->
            <div class="mt-8 text-center">
                <a href="{{ route('owners.index') }}" class="inline-flex items-center bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    <i data-feather="arrow-left" class="w-5 h-5 mr-2"></i>
                    Voltar
                </a>
            </div>
        </div>
    </div>

    <!-- Script para carregar ícones -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace(); // Inicializa os ícones
    </script>
</x-layout>
