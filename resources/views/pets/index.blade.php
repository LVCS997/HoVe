<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Lista de Pets</h1>
        <a href="{{ route('pets.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-600">
            Adicionar Pet
        </a>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Espécie</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Raça</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Idade</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Ações</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach ($pets as $pet)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $pet->id }}</td>
                        <td class="px-6 py-4">{{ $pet->nome }}</td>
                        <td class="px-6 py-4">{{ $pet->especie }}</td>
                        <td class="px-6 py-4">{{ $pet->raca }}</td>
                        <td class="px-6 py-4">{{ $pet->idade }} anos</td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{ route('pets.show', $pet->id) }}" class="text-blue-500 hover:text-blue-700">Ver</a>
                            <a href="{{ route('pets.edit', $pet->id) }}" class="text-yellow-500 hover:text-yellow-700">Editar</a>
                            <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-layout>
