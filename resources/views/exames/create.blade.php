<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Solicitação de Exame de Radiologia</h1>
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto">

            <!-- Exibição da Mensagem de Sucesso -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('exames.store') }}" method="POST">
                @csrf

                <!-- Busca do Pet por CPF do Dono -->
                <div class="mb-6">
                    <label for="filter-cpf" class="block text-gray-700 font-medium mb-2">Buscar Tutor por CPF</label>
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

                <!-- Radiografia Simples -->
                <div class="mb-6">
                    <div class="flex items-center justify-between cursor-pointer" onclick="toggleSection('radiografia-simples')">
                        <h2 class="text-xl font-bold text-gray-800">Radiografia Simples</h2>
                        <i id="radiografia-simples-icon" data-feather="chevron-down" class="w-5 h-5 text-gray-600"></i>
                    </div>
                    <div id="radiografia-simples" class="hidden mt-4 space-y-4">
                        <!-- Tórax -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Tórax</label>
                            <input type="checkbox" name="radiografia_simples[]" value="Tórax" class="mr-2">
                        </div>
                        <!-- Abdômen -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Abdômen</label>
                            <input type="checkbox" name="radiografia_simples[]" value="Abdômen" class="mr-2">
                        </div>
                        <!-- Pelve -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Pelve</label>
                            <input type="checkbox" name="radiografia_simples[]" value="Pelve" class="mr-2">
                        </div>
                        <!-- Pescoço -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Pescoço</label>
                            <input type="checkbox" name="radiografia_simples[]" value="Pescoço" class="mr-2">
                        </div>
                        <!-- Crânio -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Crânio</label>
                            <div class="ml-4">
                                <input type="checkbox" name="radiografia_simples[]" value="ATM" class="mr-2"> ATM<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Mandíbula" class="mr-2"> Mandíbula<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Maxilar" class="mr-2"> Maxilar<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Bulas Timpânicas" class="mr-2"> Bulas Timpânicas<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Seios Nasais" class="mr-2"> Seios Nasais<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Calota Craniana" class="mr-2"> Calota Craniana
                            </div>
                        </div>
                        <!-- Coluna -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Coluna</label>
                            <div class="ml-4">
                                <input type="checkbox" name="radiografia_simples[]" value="Cervical" class="mr-2"> Cervical<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Cervitorácica" class="mr-2"> Cervitorácica<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Toracolombar" class="mr-2"> Toracolombar<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Lombar" class="mr-2"> Lombar<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Lombossacra" class="mr-2"> Lombossacra<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Caudal" class="mr-2"> Caudal
                            </div>
                        </div>
                        <!-- Membro Torácico -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Membro Torácico</label>
                            <div class="ml-4">
                                <input type="checkbox" name="radiografia_simples[]" value="Esquerdo" class="mr-2"> Esquerdo<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Direito" class="mr-2"> Direito<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Escápula" class="mr-2"> Escápula<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Ombro" class="mr-2"> Ombro<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Úmero" class="mr-2"> Úmero<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Cotovelo" class="mr-2"> Cotovelo<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Rádio e Ulna" class="mr-2"> Rádio e Ulna<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Carpo" class="mr-2"> Carpo<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Dígitos" class="mr-2"> Dígitos
                            </div>
                        </div>
                        <!-- Membro Pélvico -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Membro Pélvico</label>
                            <div class="ml-4">
                                <input type="checkbox" name="radiografia_simples[]" value="Esquerdo" class="mr-2"> Esquerdo<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Direito" class="mr-2"> Direito<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Coxofemoral" class="mr-2"> Coxofemoral<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Fêmur" class="mr-2"> Fêmur<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Joelho" class="mr-2"> Joelho<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Tíbia e Fíbula" class="mr-2"> Tíbia e Fíbula<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Tarso" class="mr-2"> Tarso<br>
                                <input type="checkbox" name="radiografia_simples[]" value="Dígitos" class="mr-2"> Dígitos
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ultrassonografia -->
                <div class="mb-6">
                    <div class="flex items-center justify-between cursor-pointer" onclick="toggleSection('ultrassonografia')">
                        <h2 class="text-xl font-bold text-gray-800">Ultrassonografia</h2>
                        <i id="ultrassonografia-icon" data-feather="chevron-down" class="w-5 h-5 text-gray-600"></i>
                    </div>
                    <div id="ultrassonografia" class="hidden mt-4 space-y-4">
                        <!-- Abdominal -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Abdominal</label>
                            <input type="checkbox" name="ultrassonografia[]" value="Abdominal" class="mr-2">
                        </div>
                        <!-- Ocular -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Ocular</label>
                            <input type="checkbox" name="ultrassonografia[]" value="Ocular" class="mr-2">
                        </div>
                        <!-- Cervical -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Cervical</label>
                            <input type="checkbox" name="ultrassonografia[]" value="Cervical" class="mr-2">
                        </div>
                        <!-- Outros -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Outros</label>
                            <input type="text" name="ultrassonografia_outros" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Tomografia Computadorizada -->
                <div class="mb-6">
                    <div class="flex items-center justify-between cursor-pointer" onclick="toggleSection('tomografia')">
                        <h2 class="text-xl font-bold text-gray-800">Tomografia Computadorizada</h2>
                        <i id="tomografia-icon" data-feather="chevron-down" class="w-5 h-5 text-gray-600"></i>
                    </div>
                    <div id="tomografia" class="hidden mt-4 space-y-4">
                        <!-- Tórax -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Tórax</label>
                            <input type="checkbox" name="tomografia[]" value="Tórax" class="mr-2">
                        </div>
                        <!-- Abdômen -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Abdômen</label>
                            <input type="checkbox" name="tomografia[]" value="Abdômen" class="mr-2">
                        </div>
                        <!-- Pescoço -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Pescoço</label>
                            <input type="checkbox" name="tomografia[]" value="Pescoço" class="mr-2">
                        </div>
                        <!-- Crânio -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Crânio</label>
                            <div class="ml-4">
                                <input type="checkbox" name="tomografia[]" value="Bulas Timpânicas" class="mr-2"> Bulas Timpânicas<br>
                                <input type="checkbox" name="tomografia[]" value="Seios Nasais" class="mr-2"> Seios Nasais<br>
                                <input type="checkbox" name="tomografia[]" value="Encéfalo" class="mr-2"> Encéfalo
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cardiologia -->
                <div class="mb-6">
                    <div class="flex items-center justify-between cursor-pointer" onclick="toggleSection('cardiologia')">
                        <h2 class="text-xl font-bold text-gray-800">Cardiologia</h2>
                        <i id="cardiologia-icon" data-feather="chevron-down" class="w-5 h-5 text-gray-600"></i>
                    </div>
                    <div id="cardiologia" class="hidden mt-4 space-y-4">
                        <!-- Ecocardiograma -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Ecocardiograma</label>
                            <input type="checkbox" name="cardiologia[]" value="Ecocardiograma" class="mr-2">
                        </div>
                        <!-- Eletrocardiograma -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Eletrocardiograma</label>
                            <input type="checkbox" name="cardiologia[]" value="Eletrocardiograma" class="mr-2">
                        </div>
                        <!-- Avaliação Pré-Anestésica -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Avaliação Pré-Anestésica</label>
                            <input type="checkbox" name="cardiologia[]" value="Avaliação Pré-Anestésica" class="mr-2">
                        </div>
                    </div>
                </div>

                <!-- Agendamento -->
                <div class="mb-6">
                    <label for="data_agendamento" class="block text-gray-700 font-medium mb-2">Data e Horário do Exame</label>
                    <input type="datetime-local" id="data_agendamento" name="data_agendamento"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required>
                </div>

                <!-- Informações do Veterinário -->
                <div class="mb-6">
                    <label for="veterinario_nome" class="block text-gray-700 font-medium mb-2">Nome do Veterinário</label>
                    <input type="text" id="veterinario_nome" name="veterinario_nome"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required>
                </div>
                <div class="mb-6">
                    <label for="veterinario_crmv" class="block text-gray-700 font-medium mb-2">CRMV do Veterinário</label>
                    <input type="text" id="veterinario_crmv" name="veterinario_crmv"
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

    <!-- Script para carregar ícones -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace();

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
