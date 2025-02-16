<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Hospital Municipal Veterinário</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/cleave.js/dist/cleave.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/cleave.js/dist/addons/cleave-phone.br.js"></script>
</head>
<body class="bg-gray-100 flex">
<!-- Sidebar -->
<aside class="bg-white w-64 min-h-screen shadow-lg flex flex-col justify-between">
    <div class="p-6">
        <!-- Logo e Título -->
        <div class="text-center mb-6">
            <img src="https://hmv.duquedecaxias.rj.gov.br/build/assets/LogoPMDC.a9ec58f9.png" alt="Logo Hospital Municipal Veterinário" class="mx-auto w-48 h-auto">
            <h1 class="text-xl font-bold text-gray-800 mt-2">Hospital Veterinário</h1>
        </div>

        <!-- Menu -->
        <nav class="flex flex-col justify-between">
            <div>
                @auth
                    @if(auth()->user()->role === 'veterinario')

                        <x-menu-medic></x-menu-medic>

                    @elseif(auth()->user()->role === 'atendente')
                        <x-menu-receptionist></x-menu-receptionist>

                    @elseif(auth()->user()->role === 'admin')
                        <x-menu-admin></x-menu-admin>

                    @else
                        <x-menu-lab></x-menu-lab>
                    @endif

                @endauth
            </div>
        </nav>
    </div>

    <!-- Nome do Usuário e Botão de Deslogar -->
    <div class="p-6">
        <div class="mb-4">
            <p class="text-gray-800 font-semibold">Nome: {{ auth()->user()->name }}</p>
        </div>
        <div>
            <a href="/logout">
                <button class="bg-red-500 text-white rounded py-2 px-4 w-full">Deslogar</button>
            </a>
        </div>
    </div>
</aside>

<!-- Conteúdo Principal -->
<main class="flex-1 p-8">
    <!-- Cabeçalho -->
    <header class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800" id="content-title"></h2>
    </header>

    <!-- Conteúdo Dinâmico -->
    {{ $slot }}
</main>

<!-- Script para carregar ícones -->
<script>
    feather.replace(); // Inicializa os ícones
</script>

</body>
</html>
