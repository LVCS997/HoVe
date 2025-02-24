<x-layout>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Créditos - Hospital Municipal Veterinário</title>
        <!-- Tailwind CSS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body class="bg-gray-100">
    <!-- Container Principal -->
    <div class="min-h-screen flex flex-col items-center justify-center p-8">
        <!-- Logo da Prefeitura -->
        <div class="text-center mb-8">
            <img src="https://hmv.duquedecaxias.rj.gov.br/build/assets/LogoPMDC.a9ec58f9.png" alt="Logo Prefeitura de Duque de Caxias" class="mx-auto w-48 h-auto">
            <h1 class="text-2xl font-bold text-gray-800 mt-4">Prefeitura Municipal de Duque de Caxias</h1>
        </div>

        <!-- Informações da Equipe de TI -->
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Equipe de TI da Subsecretaria de Tecnologia</h2>

            <!-- Desenvolvimento -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Desenvolvimento</h3>
                <p class="text-gray-600">Lucas Sousa da Silva - Técnico de TI</p>
            </div>

            <!-- Projeto -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Projeto</h3>
                <p class="text-gray-600">Felipe Ramos - Gerente de TI</p>

            </div>

            <!-- Aprovação -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Aprovação</h3>
                <p class="text-gray-600">Valternei Ribeiro - Subsecretário de Tecnologia</p>
            </div>

            <!-- Licença -->
            <div class="mt-8">
                <p class="text-gray-600 text-sm">Licença de uso livre e vitalício à <strong>Prefeitura Municipal de Duque de Caxias</strong>.</p>
            </div>
        </div>

        <!-- Redes Sociais da Prefeitura -->
        <div class="mt-8 text-center mb-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Redes Sociais da Prefeitura</h3>
            <div class="flex space-x-6 justify-center">
                <a href="https://www.youtube.com/@prefeituramunicipaldeduque4780" class="text-blue-500 hover:text-blue-700">
                    <i class="bi bi-website"></i> Site da Prefeitura
                </a>
            </div>
        </div>

        <div class="space-x-6">
            <p>Prefeitura Municipal de Duque de Caxias © 2025 - Todos os direitos reservados.</p>
            <p>Alameda Esmeralda 206, Jd. Primavera, Duque de Caxias / RJ</p>
            <p>CEP: 25215-260 - TEL: (21) 2773-6200 CNPJ: 29.138.328/0001-50</p>
        </div>
    </div>


    <!-- Script para ícones do Bootstrap -->
    <script>
        // Inicializa os ícones
        feather.replace();
    </script>
    </body>
    </html>
</x-layout>
