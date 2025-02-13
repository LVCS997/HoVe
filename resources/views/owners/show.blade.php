<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Detalhes do Dono/Resposável</h1>
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-2xl mx-auto">
            <!-- Detalhes do Dono -->
            <div class="space-y-4">
                <div class="flex items-center">
                    <i data-feather="user" class="w-5 h-5 mr-2 text-gray-600"></i>
                    <p><strong class="text-gray-700">ID:</strong> <span class="text-gray-800">{{ $owner->id }}</span></p>
                </div>
                <div class="flex items-center">
                    <i data-feather="user" class="w-5 h-5 mr-2 text-gray-600"></i>
                    <p><strong class="text-gray-700">Nome:</strong> <span class="text-gray-800">{{ $owner->nome }}</span></p>
                </div>
                <div class="flex items-center">
                    <i data-feather="credit-card" class="w-5 h-5 mr-2 text-gray-600"></i>
                    <p><strong class="text-gray-700">RG:</strong> <span class="text-gray-800">{{ $owner->rg }}</span></p>
                </div>
                <div class="flex items-center">
                    <i data-feather="home" class="w-5 h-5 mr-2 text-gray-600"></i>
                    <p><strong class="text-gray-700">Endereço:</strong> <span class="text-gray-800">{{ $owner->endereco }}</span></p>
                </div>
                <div class="flex items-center">
                    <i data-feather="phone" class="w-5 h-5 mr-2 text-gray-600"></i>
                    <p><strong class="text-gray-700">Telefone:</strong> <span class="text-gray-800">{{ $owner->telefone }}</span></p>
                </div>
                <div class="flex items-center">
                    <i data-feather="calendar" class="w-5 h-5 mr-2 text-gray-600"></i>
                    <p><strong class="text-gray-700">Data de Nascimento:</strong> <span class="text-gray-800">{{ $owner->data_nascimento }}</span></p>
                </div>
                <div class="flex items-center">
                    <i data-feather="credit-card" class="w-5 h-5 mr-2 text-gray-600"></i>
                    <p><strong class="text-gray-700">CPF:</strong> <span class="text-gray-800">{{ $owner->cpf }}</span></p>
                </div>
            </div>

            <!-- Botão Voltar -->
            <div class="mt-8">
                <a href="{{ route('owners.index') }}" class="flex items-center justify-center bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    <i data-feather="arrow-left" class="w-5 h-5 mr-2"></i>
                    Voltar
                </a>
            </div>
        </div>
    </div>

    <!-- Script para carregar ícones -->
    <script>
        feather.replace(); // Inicializa os ícones
    </script>
</x-layout>
