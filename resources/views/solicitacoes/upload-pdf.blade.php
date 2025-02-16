<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Enviar Arquivo PDF</h1>
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto">
            <form action="{{ route('solicitacoes.uploadPdf', $solicitacao->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="arquivo_pdf" class="block text-gray-700 font-medium mb-2">Selecione o arquivo PDF</label>
                    <input type="file" id="arquivo_pdf" name="arquivo_pdf" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Enviar PDF
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
