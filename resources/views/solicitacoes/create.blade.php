<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Solicitação de Exame</h1>
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto">

            <!-- Exibição da Mensagem de Sucesso -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('solicitacoes.store') }}" method="POST">
                @csrf

                <!-- Busca do Pet por CPF do Dono -->
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

                <!-- Informações do Pet (exibidas dinamicamente) -->
                <div id="pet-info" class="hidden bg-gray-50 p-6 rounded-lg mt-6">
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Selecione o Pet</h3>
                    <div class="space-y-4">
                        <select id="pet-id" name="pet_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Selecione um pet</option>
                        </select>
                    </div>
                </div>

                <!-- Seleção do Médico -->
                <div class="mb-6">
                    <label for="medico_id" class="block text-gray-700 font-medium mb-2">Médico</label>
                    <select name="medico_id" id="medico_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Selecione um médico</option>
                        @foreach ($medicos as $medico)
                            <option value="{{ $medico->id }}">{{ $medico->nome }} (CRMV: {{ $medico->crmv }})</option>
                        @endforeach
                    </select>
                </div>

                <!-- Exames, Categorias e Subcategorias -->
                @foreach ($exames as $exame)
                    <div class="mb-6">
                        <div class="flex items-center justify-between cursor-pointer" onclick="toggleSection('exame-{{ $exame->id }}')">
                            <h2 class="text-xl font-bold text-gray-800">{{ $exame->nome }}</h2>
                            <i id="exame-{{ $exame->id }}-icon" data-feather="chevron-down" class="w-5 h-5 text-gray-600"></i>
                        </div>
                        <div id="exame-{{ $exame->id }}" class="hidden mt-4 space-y-4">
                            @foreach ($exame->categorias as $categoria)
                                <div class="ml-4 mb-4">
                                    <h3 class="text-lg font-semibold mb-2">{{ $categoria->nome }}</h3>
                                    @if ($categoria->subcategorias->isEmpty())
                                        <!-- Se não houver subcategorias, exibe um checkbox para a categoria -->
                                        <div class="ml-6 mb-2">
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" name="exames[{{ $exame->id }}][categorias][{{ $categoria->id }}][categoria]" value="{{ $categoria->id }}">
                                                <span class="ml-2">{{ $categoria->nome }}</span>
                                            </label>
                                        </div>
                                    @else
                                        <!-- Se houver subcategorias, exibe checkboxes para cada subcategoria -->
                                        @foreach ($categoria->subcategorias as $subcategoria)
                                            <div class="ml-6 mb-2">
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" name="exames[{{ $exame->id }}][categorias][{{ $categoria->id }}][subcategorias][{{ $subcategoria->id }}]" value="{{ $subcategoria->id }}">
                                                    <span class="ml-2">{{ $subcategoria->nome }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <!-- Agendamento -->
                <div class="mb-6">
                    <label for="data_agendamento" class="block text-gray-700 font-medium mb-2">Data e Horário do Exame</label>
                    <input type="datetime-local" id="data_agendamento" name="data_agendamento"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required>
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

    <!-- Script para máscaras -->
    <script src="https://cdn.jsdelivr.net/npm/cleave.js/dist/cleave.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/cleave.js/dist/addons/cleave-phone.br.js"></script>

    <!-- Script para carregar ícones -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace();

        new Cleave('#filter-cpf', {
            blocks: [3, 3, 3, 2],
            delimiters: ['.', '.', '-'],
            numericOnly: true
        });

        function toggleSection(sectionId) {
            const section = document.getElementById(sectionId);
            const icon = document.getElementById(`${sectionId}-icon`);
            if (section.classList.contains('hidden')) {
                section.classList.remove('hidden');
                icon.setAttribute('data-feather', 'chevron-up');
            } else {
                section.classList.add('hidden');
                icon.setAttribute('data-feather', 'chevron-down');
            }
            feather.replace();
        }

        document.getElementById('buscar-dono').addEventListener('click', function() {
            const cpf = document.getElementById('filter-cpf').value;

            // Faz uma requisição AJAX para buscar os pets
            fetch(`/buscar-pets?cpf=${cpf}`)
                .then(response => response.json())
                .then(data => {
                    const petSelect = document.getElementById('pet-id');
                    petSelect.innerHTML = '<option value="">Selecione um pet</option>';
                    data.forEach(pet => {
                        const option = document.createElement('option');
                        option.value = pet.id;
                        option.textContent = pet.nome;
                        petSelect.appendChild(option);
                    });
                    document.getElementById('pet-info').classList.remove('hidden');
                })
                .catch(error => console.error('Erro ao buscar pets:', error));
        });
    </script>
</x-layout>
