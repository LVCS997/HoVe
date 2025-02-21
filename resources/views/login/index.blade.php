<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hospital Municipal Veterinário</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <!-- Logo e Título -->
    <div class="text-center mb-6">
        <img src="https://hmv.duquedecaxias.rj.gov.br/build/assets/LogoPMDC.a9ec58f9.png" alt="Logo Hospital Municipal Veterinário" class="mx-auto w-72 h-auto">
        <h1 class="text-2xl font-bold text-gray-800 mt-4">Login</h1>
    </div>

    <!-- Formulário de Login -->
    <form method="post" action="/login/">


        @csrf
        @error('cpf')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

        <!-- Campo de CPF -->
        <div class="mb-4">
            <input type="text" name="cpf" placeholder="CPF" id="cpf" value="{{ old('cpf') }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Campo de Senha -->
        <div class="mb-6">
            <input type="password" name="password" placeholder="Senha"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Botão de Envio -->
        <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Entrar
        </button>
    </form>
</div>

<!-- Script para máscaras -->
<script src="https://cdn.jsdelivr.net/npm/cleave.js/dist/cleave.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cleave.js/dist/addons/cleave-phone.br.js"></script>
<script>
    new Cleave('#cpf', {
        blocks: [3, 3, 3, 2],
        delimiters: ['.', '.', '-'],
        numericOnly: true
    });
</script>
</body>
</html>
