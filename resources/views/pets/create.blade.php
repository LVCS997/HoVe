<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Adicionar Pet</h1>
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('pets.store') }}" method="POST">
                @csrf
                <div class="flex flex-row justify-between align-middle">
                    <div class="w-1/2">
                        <div class="mb-4">
                            <label for="nome" class="block text-gray-700">Nome</label>
                            <input type="text" id="nome" name="nome" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="especie" class="block text-gray-700">Espécie</label>
                            <input type="text" id="especie" name="especie" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="raca" class="block text-gray-700">Raça</label>
                            <input type="text" id="raca" name="raca" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="idade" class="block text-gray-700">Idade</label>
                            <input type="number" id="idade" name="idade" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="sexo" class="block text-gray-700">Sexo</label>
                            <select id="sexo" name="sexo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="Macho">Macho</option>
                                <option value="Fêmea">Fêmea</option>
                            </select>
                        </div>
                    </div>

                    <div class="w-1/2">
                        <div class="mb-4">
                            <label for="porte" class="block text-gray-700">Porte</label>
                            <select id="porte" name="porte" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="Pequeno">Pequeno</option>
                                <option value="Médio">Médio</option>
                                <option value="Grande">Grande</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="pelagem" class="block text-gray-700">Pelagem</label>
                            <input type="text" id="pelagem" name="pelagem" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="castrado" class="block text-gray-700">Castrado</label>
                            <select id="castrado" name="castrado" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="vacinas" class="block text-gray-700">Vacinas</label>
                            <select id="vacinas" name="vacinas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="onde_vacinado" class="block text-gray-700">Onde foi vacinado</label>
                            <input type="text" id="onde_vacinado" name="onde_vacinado" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                    </div>
                </div>

                @auth
                    @if(auth()->user()->role === 'medico')
                        <div id="campos_medico" class="">
                            <div class="mb-4">
                                <label for="cidade_nascimento" class="block text-gray-700">Cidade de Nascimento</label>
                                <input type="text" id="cidade_nascimento" name="cidade_nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div class="mb-4">
                                <label for="uf_nascimento" class="block text-gray-700">UF de Nascimento</label>
                                <input type="text" id="uf_nascimento" name="uf_nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" maxlength="2">
                            </div>
                            <div class="mb-4">
                                <label for="pais_nascimento" class="block text-gray-700">País de Nascimento</label>
                                <input type="text" id="pais_nascimento" name="pais_nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div class="mb-4">
                                <label for="temperatura" class="block text-gray-700">Temperatura (°C)</label>
                                <input type="number" step="0.1" id="temperatura" name="temperatura" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div class="mb-4">
                                <label for="peso" class="block text-gray-700">Peso (kg)</label>
                                <input type="number" step="0.1" id="peso" name="peso" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div class="mb-4">
                                <label for="hora_nascimento" class="block text-gray-700">Hora de Nascimento</label>
                                <input type="time" id="hora_nascimento" name="hora_nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div class="mb-4">
                                <label for="data_nascimento" class="block text-gray-700">Data de Nascimento</label>
                                <input type="date" id="data_nascimento" name="data_nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                        </div>
                    @endif

                @endauth
                <!-- TODO: FAZER COM QUE ESTE SELECT SEJA UMA FORMA DE FILTRAR OS DONOS POR CPF OU RG -->



                <div class="mb-4">
                    <label for="owner_id" class="block text-gray-700">Dono</label>
                    <select id="owner_id" name="owner_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->id }}">{{ $owner->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Salvar</button>
            </form>
        </div>
    </div>
</x-layout>
