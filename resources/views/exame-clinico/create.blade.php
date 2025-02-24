<x-layout>

    <div class="text-center mt-6">
        <a href="{{ route('pets.historico-clinico', $pet->id) }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
            Ver Histórico Clínico
        </a>
    </div>

    <form method="POST" action="{{ route('exame-clinico.store', $pet->id) }}" class="space-y-6">
        @csrf

        <!-- Grid para organizar os campos -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Coluna 1 -->
            <div class="space-y-4">
                <!-- Escore Corporal -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Escore Corporal</label>
                    <select name="escore_corporal" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <!-- Pelo e Pele -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Pelo e Pele</label>
                    <input type="text" name="pelo_pele" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Atividade Geral -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Atividade Geral</label>
                    <select name="atividade_geral" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="normal">Normal</option>
                        <option value="apatico">Apático</option>
                        <option value="cambaleante">Cambaleante</option>
                        <option value="hiperestesico_excitado">Hiperestésico/Excitado</option>
                        <option value="imovel">Imóvel</option>
                        <option value="decubito_lateral">Decúbito Lateral</option>
                        <option value="outros">Outros</option>
                    </select>
                </div>

                <!-- Desidratação -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Desidratação</label>
                    <select name="desidratacao" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="normohidratado">Normohidratado</option>
                        <option value="leve">Leve</option>
                        <option value="moderada">Moderada</option>
                        <option value="grave">Grave</option>
                    </select>
                </div>

                <!-- Ectoparasitas -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Ectoparasitas</label>
                    <select name="ectoparasitas" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="sim">Sim</option>
                        <option value="nao">Não</option>
                    </select>
                </div>
            </div>

            <!-- Coluna 2 -->
            <div class="space-y-4">
                <!-- Temperatura Corporal (T.C. [GC]) -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Temperatura Corporal (T.C. [GC])</label>
                    <input type="text" name="temperatura_corporal" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Frequência Respiratória (FR) -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Frequência Respiratória (FR)</label>
                    <input type="text" name="frequencia_respiratoria" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Frequência Cardíaca (FC) -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Frequência Cardíaca (FC)</label>
                    <input type="text" name="frequencia_cardiaca" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Tempo de Preenchimento Capilar (TPC) -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Tempo de Preenchimento Capilar (TPC)</label>
                    <input type="text" name="tempo_preenchimento_capilar" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Mucosas -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Mucosas</label>
                    <select name="mucosas" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="hipocorada_severa">Hipocorada Severa</option>
                        <option value="hipocorada_moderada">Hipocorada Moderada</option>
                        <option value="hipocorada_leve">Hipocorada Leve</option>
                        <option value="normocorada">Normocorada</option>
                        <option value="hiperemica">Hiperêmica</option>
                        <option value="terica">Tetérica</option>
                        <option value="cianotica">Cianótica</option>
                        <option value="sangramento">Sangramento</option>
                        <option value="ressecadas">Ressecadas</option>
                        <option value="umidas">Úmidas</option>
                        <option value="frias">Frias</option>
                        <option value="outros">Outros</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Campos que ocupam a largura total -->
        <div class="space-y-4">
            <!-- Perdas -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Perdas</label>
                <select name="perdas" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="vomito">Vômito</option>
                    <option value="diarreia">Diarréia</option>
                    <option value="siaboreia">Siaboreia</option>
                    <option value="secrecao">Secreção</option>
                    <option value="sangramento_ativo">Sangramento Ativo</option>
                    <option value="outros">Outros</option>
                </select>
            </div>

            <!-- Afundamento Ocular -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Afundamento Ocular</label>
                <select name="afundamento_ocular" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="leve">Leve</option>
                    <option value="moderado">Moderado</option>
                    <option value="grave">Grave</option>
                </select>
            </div>

            <!-- Elasticidade da Pele -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Elasticidade da Pele</label>
                <select name="elasticidade_pele" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <!-- Observações -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Observações</label>
                <textarea name="observacoes" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <!-- Exames Realizados -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Exames Realizados</label>
                <textarea name="exames_realizados" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <!-- Diagnóstico Presuntivo -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Diagnóstico Presuntivo</label>
                <textarea name="diagnostico_presuntivo" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <!-- Prescrição Hospitalar -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Prescrição Hospitalar</label>
                <textarea name="prescricao_hospitalar" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <!-- Prescrição Domiciliar -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Prescrição Domiciliar</label>
                <textarea name="prescricao_domiciliar" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
        </div>

        <!-- Botão de Envio -->
        <div class="text-center">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Salvar Exame Clínico
            </button>
        </div>
    </form>
</x-layout>
