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
                    @if(auth()->user()->role === 'medic')
                        <h1 class="text-3xl font-bold text-center my-5">Campo dos Médicos</h1>
                        <div id="campos_medico" class="bg-red-300 p-1 mt-2 rounded">
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

                <!-- Campo de Filtro por CPF -->
                <div class="mb-4">
                    <label for="filter-cpf" class="block text-gray-700">Buscar Dono por CPF</label>
                    <div class="flex">
                        <input type="text" id="filter-cpf" name="filter-cpf" placeholder="Digite o CPF..."
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="button" id="buscar-dono" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                            Buscar
                        </button>
                    </div>
                </div>

                <!-- Informações do Dono (exibidas dinamicamente) -->
                <div id="dono-info" class="hidden bg-gray-50 p-4 rounded-lg mt-4">
                    <h3 class="text-xl font-bold mb-4">Informações do Dono</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700">Nome:</label>
                            <input type="text" id="dono-nome" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700">CPF:</label>
                            <input type="text" id="dono-cpf" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700">RG:</label>
                            <input type="text" id="dono-rg" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700">Telefone:</label>
                            <input type="text" id="dono-telefone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700">Endereço:</label>
                            <input type="text" id="dono-endereco" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700">Data de Nascimento:</label>
                            <input type="text" id="dono-data_nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100" readonly>
                        </div>
                    </div>
                    <input type="hidden" id="dono-id" name="owner_id">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Salvar</button>
            </form>
        </div>
    </div>

    <!-- Script para buscar o dono -->
    <script>
        document.getElementById('buscar-dono').addEventListener('click', function () {
            const cpf = document.getElementById('filter-cpf').value;

            // Envia uma requisição para buscar o dono
            fetch(`/owners/buscar-por-cpf?cpf=${cpf}`)
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        // Preenche os campos com as informações do dono
                        document.getElementById('dono-nome').value = data.nome;
                        document.getElementById('dono-cpf').value = data.cpf;
                        document.getElementById('dono-rg').value = data.rg;
                        document.getElementById('dono-telefone').value = data.telefone;
                        document.getElementById('dono-endereco').value = data.endereco;
                        document.getElementById('dono-data_nascimento').value = data.data_nascimento;
                        document.getElementById('dono-id').value = data.id;

                        // Exibe o formulário de informações do dono
                        document.getElementById('dono-info').classList.remove('hidden');
                    } else {
                        alert('Dono não encontrado!');
                    }
                })
                .catch(error => console.error('Erro ao buscar dono:', error));
        });
    </script>
</x-layout>
