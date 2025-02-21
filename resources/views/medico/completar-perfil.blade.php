<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Completar Perfil</h1>

    <form method="POST" action="{{ route('medico.salvar-perfil', $user->id) }}">
        @csrf

        <!-- Campo CRMV -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">CRMV</label>
            <input type="text" name="crmv" placeholder="Digite seu CRMV"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('crmv')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Campo Especialidade -->
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Especialidade</label>
            <input type="text" name="especialidade" placeholder="Digite sua especialidade"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('especialidade')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>


        <!-- Botão de Envio -->
        <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Salvar
        </button>
    </form>
</div>
</body>
</html>
