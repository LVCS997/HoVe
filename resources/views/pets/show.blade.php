<x-layout>
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- Título da página -->
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Detalhes do Pet</h1>

            <!-- Seção de Informações do Pet -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Informações do Pet</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-600"><strong>Nome:</strong> {{ $pet->nome }}</p>
                        <p class="text-gray-600"><strong>Espécie:</strong> {{ $pet->especie }}</p>
                        <p class="text-gray-600"><strong>Raça:</strong> {{ $pet->raca }}</p>
                        <p class="text-gray-600"><strong>Idade:</strong> {{ $pet->idade }} anos</p>
                        <p class="text-gray-600"><strong>Sexo:</strong> {{ $pet->sexo }}</p>
                        <p class="text-gray-600"><strong>Pelagem:</strong> {{ $pet->pelagem }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-600"><strong>Castrado:</strong> {{ $pet->castrado ? 'Sim' : 'Não' }}</p>
                        <p class="text-gray-600"><strong>Vacinas:</strong> {{ $pet->vacinas ? 'Sim' : 'Não' }}</p>
                        <p class="text-gray-600"><strong>Local de Vacinação:</strong> {{ $pet->onde_vacinado ?? 'Não informado' }}</p>
                        <p class="text-gray-600"><strong>Anamnese:</strong> {{ $pet->anamnese ?? 'Não informado' }}</p>
                        <p class="text-gray-600"><strong>Porte:</strong> {{ $pet->porte }}</p>
                    </div>
                </div>
            </div>

            <!-- Seção de Informações de Nascimento do Pet -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Informações de Nascimento</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-600"><strong>Cidade de Nascimento:</strong> {{ $pet->cidade_nascimento ?? 'Não informado' }}</p>
                        <p class="text-gray-600"><strong>UF de Nascimento:</strong> {{ $pet->uf_nascimento ?? 'Não informado' }}</p>
                        <p class="text-gray-600"><strong>País de Nascimento:</strong> {{ $pet->pais_nascimento ?? 'Não informado' }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-600"><strong>Temperatura no Nascimento:</strong> {{ $pet->temperatura ?? 'Não informado' }} °C</p>
                        <p class="text-gray-600"><strong>Peso no Nascimento:</strong> {{ $pet->peso ?? 'Não informado' }} kg</p>
                        <p class="text-gray-600"><strong>Hora de Nascimento:</strong> {{ $pet->hora_nascimento ?? 'Não informado' }}</p>
                        <p class="text-gray-600"><strong>Data de Nascimento:</strong> {{ $pet->data_nascimento ?? 'Não informado' }}</p>
                    </div>
                </div>
            </div>

            <!-- Seção de Informações do Dono -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Informações do Tutor</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-600"><strong>Nome:</strong> {{ $pet->owner->nome ?? 'Não informado' }}</p>
                        <p class="text-gray-600"><strong>CPF:</strong> {{ $pet->owner->cpf ?? 'Não informado' }}</p>
                        <p class="text-gray-600"><strong>RG:</strong> {{ $pet->owner->rg ?? 'Não informado' }}</p>
                        <p class="text-gray-600"><strong>Telefone:</strong> {{ $pet->owner->telefone ?? 'Não informado' }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-600"><strong>Data de Nascimento:</strong> {{ $pet->owner->data_nascimento ?? 'Não informado' }}</p>
                        <p class="text-gray-600"><strong>CEP:</strong> {{ $pet->owner->cep ?? 'Não informado' }}</p>
                        <p class="text-gray-600"><strong>Endereço:</strong> {{ $pet->owner->logradouro ?? 'Não informado' }}, {{ $pet->owner->numero ?? 'Não informado' }}</p>
                        <p class="text-gray-600"><strong>Bairro:</strong> {{ $pet->owner->bairro ?? 'Não informado' }}</p>
                        <p class="text-gray-600"><strong>Cidade/UF:</strong> {{ $pet->owner->cidade ?? 'Não informado' }}/{{ $pet->owner->estado ?? 'Não informado' }}</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-6">
                <a href="{{ route('pets.historico-clinico', $pet->id) }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                    Ver Histórico Clínico
                </a>
            </div>

            <!-- Botão de Voltar -->
            <div class="text-center mt-6">
                <a href="{{ route('pets.index') }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                    Voltar para a Lista de Pets
                </a>
            </div>
        </div>
    </div>
</x-layout>
