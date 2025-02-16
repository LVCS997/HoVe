<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Editar Dono/Responsável</h1>
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto">
            <form action="{{ route('owners.update', $owner->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Grid com duas colunas -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Coluna 1 -->
                    <div>
                        <!-- Campo Nome -->
                        <div class="mb-6">
                            <label for="nome" class="block text-gray-700 font-medium mb-2">Nome</label>
                            <input type="text" id="nome" name="nome" value="{{ $owner->nome }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('nome')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo RG -->
                        <div class="mb-6">
                            <label for="rg" class="block text-gray-700 font-medium mb-2">RG</label>
                            <input type="text" id="rg" name="rg" value="{{ $owner->rg }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('rg')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Telefone -->
                        <div class="mb-6">
                            <label for="telefone" class="block text-gray-700 font-medium mb-2">Telefone</label>
                            <input type="text" id="telefone" name="telefone" value="{{ $owner->telefone }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('telefone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Data de Nascimento -->
                        <div class="mb-6">
                            <label for="data_nascimento" class="block text-gray-700 font-medium mb-2">Data de Nascimento</label>
                            <input type="date" id="data_nascimento" name="data_nascimento" value="{{ $owner->data_nascimento }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('data_nascimento')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Coluna 2 -->
                    <div>
                        <!-- Campo CPF -->
                        <div class="mb-6">
                            <label for="cpf" class="block text-gray-700 font-medium mb-2">CPF</label>
                            <input type="text" id="cpf" name="cpf" value="{{ $owner->cpf }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('cpf')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo CEP -->
                        <div class="mb-6">
                            <label for="cep" class="block text-gray-700 font-medium mb-2">CEP</label>
                            <input type="text" id="cep" name="cep" value="{{ $owner->cep }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required onblur="buscarEndereco(this.value)">
                            @error('cep')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Indicador de Carregamento -->
                        <div id="loading" class="mb-6" style="display: none;">
                            Buscando endereço...
                        </div>

                        <!-- Campo Logradouro -->
                        <div class="mb-6">
                            <label for="logradouro" class="block text-gray-700 font-medium mb-2">Logradouro</label>
                            <input type="text" id="logradouro" name="logradouro" value="{{ $owner->logradouro }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('logradouro')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Numero -->
                        <div class="mb-6">
                            <label for="numero" class="block text-gray-700 font-medium mb-2">Numero</label>
                            <input type="text" id="numero" name="numero" value="{{ old('numero') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('numero')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Bairro -->
                        <div class="mb-6">
                            <label for="bairro" class="block text-gray-700 font-medium mb-2">Bairro</label>
                            <input type="text" id="bairro" name="bairro" value="{{ $owner->bairro }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('bairro')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Cidade -->
                        <div class="mb-6">
                            <label for="cidade" class="block text-gray-700 font-medium mb-2">Cidade</label>
                            <input type="text" id="cidade" name="cidade" value="{{ $owner->cidade }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('cidade')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Estado -->
                        <div class="mb-6">
                            <label for="estado" class="block text-gray-700 font-medium mb-2">Estado</label>
                            <input type="text" id="estado" name="estado" value="{{ $owner->estado }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('estado')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campo Complemento -->
                        <div class="mb-6">
                            <label for="complemento" class="block text-gray-700 font-medium mb-2">Complemento</label>
                            <input type="text" id="complemento" name="complemento" value="{{ $owner->complemento }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('complemento')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Botões -->
                <div class="flex items-center justify-between mt-8">
                    <a href="{{ route('owners.index') }}"
                       class="flex items-center text-gray-600 hover:text-gray-800">
                        <i data-feather="arrow-left" class="w-5 h-5 mr-2"></i>
                        Cancelar
                    </a>
                    <button type="submit"
                            class="flex items-center bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i data-feather="save" class="w-5 h-5 mr-2"></i>
                        Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para carregar ícones -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <!-- Script para máscaras -->
    <script src="https://cdn.jsdelivr.net/npm/cleave.js/dist/cleave.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/cleave.js/dist/addons/cleave-phone.br.js"></script>
    <script>
        feather.replace(); // Inicializa os ícones

        // Aplicar máscaras aos campos
        new Cleave('#rg', {
            blocks: [2, 3, 3, 1],
            delimiter: '.',
            numericOnly: true
        });

        new Cleave('#cpf', {
            blocks: [3, 3, 3, 2],
            delimiters: ['.', '.', '-'],
            numericOnly: true
        });

        new Cleave('#telefone', {
            phone: true,
            phoneRegionCode: 'BR'
        });

        new Cleave('#cep', {
            blocks: [5, 3],
            delimiter: '-',
            numericOnly: true
        });

        // Função para buscar o endereço pelo CEP
        function buscarEndereco(cep) {
            if (!cep) return;

            // Remove caracteres não numéricos
            cep = cep.replace(/\D/g, '');

            // Verifica se o CEP tem 8 dígitos
            if (cep.length !== 8) {
                alert('CEP inválido. O CEP deve ter 8 dígitos.');
                return;
            }

            // Exibe o indicador de carregamento
            document.getElementById('loading').style.display = 'block';

            // Consulta a API ViaCEP
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na requisição.');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.erro) {
                        alert('CEP não encontrado.');
                        return;
                    }

                    // Preenche os campos de endereço
                    document.getElementById('logradouro').value = data.logradouro || '';
                    document.getElementById('bairro').value = data.bairro || '';
                    document.getElementById('cidade').value = data.localidade || '';
                    document.getElementById('estado').value = data.uf || '';
                    document.getElementById('complemento').value = data.complemento || '';
                })
                .catch(error => {
                    console.error('Erro ao buscar o CEP:', error);
                    alert('Erro ao buscar o CEP. Tente novamente.');
                })
                .finally(() => {
                    // Oculta o indicador de carregamento
                    document.getElementById('loading').style.display = 'none';
                });
        }
    </script>
</x-layout>
