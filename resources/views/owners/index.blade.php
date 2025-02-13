<x-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Lista de Donos/Responsáveis</h1>

        <!-- Botão para adicionar novo dono -->
        <a href="{{ route('owners.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Adicionar Novo Dono
        </a>

        <!-- Tabela de Donos -->
        <div class="mt-6 overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-700">ID</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-700">Nome</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-700">CPF</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-700">Telefone</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-700">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($owners as $owner)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-700">{{ $owner->id }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-700">{{ $owner->nome }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-700">{{ $owner->cpf }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm text-gray-700">{{ $owner->telefone }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">
                            <a href="{{ route('owners.show', $owner->id) }}" class="text-blue-500 hover:underline">Ver</a>
                            <a href="{{ route('owners.edit', $owner->id) }}" class="ml-2 text-green-500 hover:underline">Editar</a>
                            <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>


