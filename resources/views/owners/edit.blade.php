<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Editar Dono/Responsável</h1>
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-2xl mx-auto">
            <form action="{{ route('owners.update', $owner->id) }}" method="POST">
                @csrf
                @method('PUT')

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

                <!-- Campo Endereço -->
                <div class="mb-6">
                    <label for="endereco" class="block text-gray-700 font-medium mb-2">Endereço</label>
                    <textarea id="endereco" name="endereco"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                              required>{{ $owner->endereco }}</textarea>
                    @error('endereco')
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


</x-layout>
