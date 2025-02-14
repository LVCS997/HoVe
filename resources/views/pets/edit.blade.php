<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Editar Dados do Pet</h1>
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-2xl mx-auto">
            <form action="{{ route('pets.update', $pet->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nome -->
                <div class="mb-4">
                    <label for="nome" class="block text-gray-700">Nome</label>
                    <input type="text" id="nome" name="nome" value="{{ $pet->nome }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <!-- Espécie -->
                <div class="mb-4">
                    <label for="especie" class="block text-gray-700">Espécie</label>
                    <input type="text" id="especie" name="especie" value="{{ $pet->especie }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <!-- Raça -->
                <div class="mb-4">
                    <label for="raca" class="block text-gray-700">Raça</label>
                    <input type="text" id="raca" name="raca" value="{{ $pet->raca }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <!-- Idade -->
                <div class="mb-4">
                    <label for="idade" class="block text-gray-700">Idade</label>
                    <input type="number" id="idade" name="idade" value="{{ $pet->idade }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <!-- Peso -->
                <div class="mb-4">
                    <label for="peso" class="block text-gray-700">Peso (kg)</label>
                    <input type="number" step="0.1" id="peso" name="peso" value="{{ $pet->peso }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <!-- Sexo -->
                <div class="mb-4">
                    <label for="sexo" class="block text-gray-700">Sexo</label>
                    <select id="sexo" name="sexo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="Macho" {{ $pet->sexo == 'M' ? 'selected' : '' }}>Macho</option>
                        <option value="Femea" {{ $pet->sexo == 'F' ? 'selected' : '' }}>Fêmea</option>
                    </select>
                </div>

                <!-- Pelagem -->
                <div class="mb-4">
                    <label for="pelagem" class="block text-gray-700">Pelagem</label>
                    <input type="text" id="pelagem" name="pelagem" value="{{ $pet->pelagem }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <!-- Castrado -->
                <div class="mb-4">
                    <label for="castrado" class="block text-gray-700">Castrado</label>
                    <select id="castrado" name="castrado" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="1" {{ $pet->castrado ? 'selected' : '' }}>Sim</option>
                        <option value="0" {{ !$pet->castrado ? 'selected' : '' }}>Não</option>
                    </select>
                </div>

                <!-- Vacinas -->
                <div class="mb-4">
                    <label for="vacinas" class="block text-gray-700">Vacinado</label>
                    <select id="vacinas" name="vacinas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="1" {{ $pet->vacinas ? 'selected' : '' }}>Sim</option>
                        <option value="0" {{ !$pet->vacinas ? 'selected' : '' }}>Não</option>
                    </select>
                </div>

                <!-- Onde vacinado -->
                <div class="mb-4">
                    <label for="onde_vacinado" class="block text-gray-700">Onde foi vacinado?</label>
                    <input type="text" id="onde_vacinado" name="onde_vacinado" value="{{ $pet->onde_vacinado }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <!-- Anamnese -->
                <div class="mb-4">
                    <label for="anamnese" class="block text-gray-700">Anamnese</label>
                    <textarea id="anamnese" name="anamnese" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ $pet->anamnese }}</textarea>
                </div>

                <!-- Porte -->
                <div class="mb-4">
                    <label for="porte" class="block text-gray-700">Porte</label>
                    <select name="porte" id="porte" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="Pequeno" {{ $pet->porte ? 'selected' : '' }}>Pequeno</option>
                        <option value="Médio" {{ !$pet->porte ? 'selected' : '' }}>Médio</option>
                        <option value="Grande" {{ $pet->porte ? 'selected' : '' }}>Grande</option>
                        <option value="Não Especificado" {{ !$pet->porte ? 'selected' : '' }}>Não Especificado</option>
                    </select>
                </div>

                <!-- Cidade de Nascimento -->
                <div class="mb-4">
                    <label for="cidade_nascimento" class="block text-gray-700">Cidade de Nascimento</label>
                    <input type="text" id="cidade_nascimento" name="cidade_nascimento" value="{{ $pet->cidade_nascimento }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <!-- UF de Nascimento -->
                <div class="mb-4">
                    <label for="uf_nascimento" class="block text-gray-700">UF de Nascimento</label>
                    <input type="text" id="uf_nascimento" name="uf_nascimento" value="{{ $pet->uf_nascimento }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" maxlength="2">
                </div>

                <!-- País de Nascimento -->
                <div class="mb-4">
                    <label for="pais_nascimento" class="block text-gray-700">País de Nascimento</label>
                    <input type="text" id="pais_nascimento" name="pais_nascimento" value="{{ $pet->pais_nascimento }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <!-- Temperatura no Nascimento -->
                <div class="mb-4">
                    <label for="temperatura" class="block text-gray-700">Temperatura no Nascimento (°C)</label>
                    <input type="number" step="0.1" id="temperatura" name="temperatura" value="{{ $pet->temperatura }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <!-- Hora de Nascimento -->
                <div class="mb-4">
                    <label for="hora_nascimento" class="block text-gray-700">Hora de Nascimento</label>
                    <input type="time" id="hora_nascimento" name="hora_nascimento" value="{{ $pet->hora_nascimento }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <!-- Data de Nascimento -->
                <div class="mb-4">
                    <label for="data_nascimento" class="block text-gray-700">Data de Nascimento</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" value="{{ $pet->data_nascimento }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <!-- Botões -->
                <div class="flex items-center justify-between mt-8">
                    <a href="{{ route('pets.index') }}" class="text-gray-600 hover:text-gray-800">Cancelar</a>
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
