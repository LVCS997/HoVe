<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Adicionar Pet</h1>
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto">
            <form action="{{ route('pets.store') }}" method="POST">
                @csrf

                <!-- Grid com duas colunas -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Coluna 1 -->
                    <div>
                        <!-- Campo Nome -->
                        <div class="mb-6">
                            <label for="nome" class="block text-gray-700 font-medium mb-2">Nome</label>
                            <input type="text" id="nome" name="nome" value="{{ old('nome') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('nome')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Espécie -->
                        <div class="mb-6">
                            <label for="especie" class="block text-gray-700 font-medium mb-2">Espécie</label>
                            <select id="especie" name="especie"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                <option value="Canino">Canino</option>
                                <option value="Felino">Felino</option>
                            </select>
                            @error('especie')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Raça -->
                        <div class="mb-6">
                            <label for="raca" class="block text-gray-700 font-medium mb-2">Raça</label>
                            <input type="text" id="raca" name="raca" value="{{ old('raca') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('raca')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Idade -->
                        <div class="mb-6">
                            <label for="idade" class="block text-gray-700 font-medium mb-2">Idade</label>
                            <input type="number" id="idade" name="idade" value="{{ old('idade') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('idade')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Sexo -->
                        <div class="mb-6">
                            <label for="sexo" class="block text-gray-700 font-medium mb-2">Sexo</label>
                            <select id="sexo" name="sexo"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                <option value="Macho">Macho</option>
                                <option value="Femea">Fêmea</option>
                            </select>
                            @error('sexo')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Coluna 2 -->
                    <div>
                        <!-- Campo Porte -->
                        <div class="mb-6">
                            <label for="porte" class="block text-gray-700 font-medium mb-2">Porte</label>
                            <select id="porte" name="porte"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                <option value="Pequeno">Pequeno</option>
                                <option value="Médio">Médio</option>
                                <option value="Grande">Grande</option>
                            </select>
                            @error('porte')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Pelagem -->
                        <div class="mb-6">
                            <label for="pelagem" class="block text-gray-700 font-medium mb-2">Pelagem</label>
                            <input type="text" id="pelagem" name="pelagem" value="{{ old('pelagem') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('pelagem')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Castrado -->
                        <div class="mb-6">
                            <label for="castrado" class="block text-gray-700 font-medium mb-2">Castrado</label>
                            <select id="castrado" name="castrado"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                            @error('castrado')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Vacinas -->
                        <div class="mb-6">
                            <label for="vacinas" class="block text-gray-700 font-medium mb-2">Vacinas</label>
                            <select id="vacinas" name="vacinas"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                            @error('vacinas')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Onde foi vacinado -->
                        <div class="mb-6">
                            <label for="onde_vacinado" class="block text-gray-700 font-medium mb-2">Onde foi vacinado</label>
                            <input type="text" id="onde_vacinado" name="onde_vacinado" value="{{ old('onde_vacinado') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('onde_vacinado')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Seção de Campos do Médico -->
                @auth
                    @if(auth()->user()->role === 'medic')
                        <h2 class="text-2xl font-bold text-center my-6 text-gray-800">Campos do Médico</h2>
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Cidade de Nascimento -->
                                <div class="mb-6">
                                    <label for="cidade_nascimento" class="block text-gray-700 font-medium mb-2">Cidade de Nascimento</label>
                                    <input type="text" id="cidade_nascimento" name="cidade_nascimento" value="{{ old('cidade_nascimento') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @error('cidade_nascimento')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- UF de Nascimento -->
                                <div class="mb-6">
                                    <label for="uf_nascimento" class="block text-gray-700 font-medium mb-2">UF de Nascimento</label>
                                    <input type="text" id="uf_nascimento" name="uf_nascimento" value="{{ old('uf_nascimento') }}" maxlength="2"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @error('uf_nascimento')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- País de Nascimento -->
                                <div class="mb-6">
                                    <label for="pais_nascimento" class="block text-gray-700 font-medium mb-2">País de Nascimento</label>
                                    <input type="text" id="pais_nascimento" name="pais_nascimento" value="{{ old('pais_nascimento') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @error('pais_nascimento')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Temperatura -->
                                <div class="mb-6">
                                    <label for="temperatura" class="block text-gray-700 font-medium mb-2">Temperatura (°C)</label>
                                    <input type="number" step="0.1" id="temperatura" name="temperatura" value="{{ old('temperatura') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @error('temperatura')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Peso -->
                                <div class="mb-6">
                                    <label for="peso" class="block text-gray-700 font-medium mb-2">Peso (kg)</label>
                                    <input type="number" step="0.1" id="peso" name="peso" value="{{ old('peso') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @error('peso')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Hora de Nascimento -->
                                <div class="mb-6">
                                    <label for="hora_nascimento" class="block text-gray-700 font-medium mb-2">Hora de Nascimento</label>
                                    <input type="time" id="hora_nascimento" name="hora_nascimento" value="{{ old('hora_nascimento') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @error('hora_nascimento')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Data de Nascimento -->
                                <div class="mb-6">
                                    <label for="data_nascimento" class="block text-gray-700 font-medium mb-2">Data de Nascimento</label>
                                    <input type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @error('data_nascimento')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif
                @endauth

                <!-- Campo de Filtro por CPF -->
                <div class="mb-6">
                    <label for="filter-cpf" class="block text-gray-700 font-medium mb-2">Buscar Dono por CPF</label>
                    <div class="flex">
                        <input type="text" id="filter-cpf" name="filter-cpf" placeholder="Digite o CPF..."
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="button" id="buscar-dono" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                            Buscar
                        </button>
                    </div>
                </div>

                <!-- Informações do Dono (exibidas dinamicamente) -->
                <div id="dono-info" class="hidden bg-gray-50 p-6 rounded-lg mt-6">
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Informações do Dono</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Nome:</label>
                            <input type="text" id="dono-nome" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">CPF:</label>
                            <input type="text" id="dono-cpf" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">RG:</label>
                            <input type="text" id="dono-rg" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Telefone:</label>
                            <input type="text" id="dono-telefone" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">CEP:</label>
                            <input type="text" id="dono-cep" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Logradouro:</label>
                            <input type="text" id="dono-logradouro" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Número:</label>
                            <input type="text" id="dono-numero" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Complemento:</label>
                            <input type="text" id="dono-complemento" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Bairro:</label>
                            <input type="text" id="dono-bairro" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Cidade:</label>
                            <input type="text" id="dono-cidade" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Estado:</label>
                            <input type="text" id="dono-estado" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                        </div>
                    </div>
                    <input type="hidden" id="dono-id" name="owner_id">
                </div>

                <!-- Mensagem de erro caso o dono não seja encontrado -->
                <div id="dono-nao-encontrado" class="hidden bg-red-50 p-4 rounded-lg mt-6">
                    <p class="text-red-600">Dono não encontrado. Verifique o CPF e tente novamente.</p>
                </div>

                <!-- Botão Salvar -->
                <div class="mt-8 text-center">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i data-feather="save" class="w-5 h-5 mr-2"></i>
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para carregar ícones -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace(); // Inicializa os ícones

        // Script para buscar o dono
        document.getElementById('buscar-dono').addEventListener('click', function () {
            const cpf = document.getElementById('filter-cpf').value;

            // Envia uma requisição para buscar o dono
            fetch(`/owners/buscar-por-cpf?cpf=${cpf}`)
                .then(response => response.json())
                .then(data => {
                    if (data.cpf !== undefined) {
                        // Preenche os campos com as informações do dono
                        document.getElementById('dono-nome').value = data.nome;
                        document.getElementById('dono-cpf').value = data.cpf;
                        document.getElementById('dono-rg').value = data.rg;
                        document.getElementById('dono-telefone').value = data.telefone;
                        document.getElementById('dono-cep').value = data.cep;
                        document.getElementById('dono-logradouro').value = data.logradouro;
                        document.getElementById('dono-numero').value = data.numero;
                        document.getElementById('dono-complemento').value = data.complemento || 'N/A';
                        document.getElementById('dono-bairro').value = data.bairro;
                        document.getElementById('dono-cidade').value = data.cidade;
                        document.getElementById('dono-estado').value = data.estado;
                        document.getElementById('dono-id').value = data.id;

                        // Exibe o formulário de informações do dono
                        document.getElementById('dono-info').classList.remove('hidden');
                        document.getElementById('dono-nao-encontrado').classList.add('hidden');
                    } else {
                        // Oculta o formulário de informações do dono e exibe a mensagem de erro
                        document.getElementById('dono-info').classList.add('hidden');
                        document.getElementById('dono-nao-encontrado').classList.remove('hidden');
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar dono:', error);
                    document.getElementById('dono-info').classList.add('hidden');
                    document.getElementById('dono-nao-encontrado').classList.remove('hidden');
                });
        });
    </script>
</x-layout>
