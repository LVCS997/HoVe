<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('exame_clinicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade');
            $table->foreignId('medico_id')->constrained('medicos')->onDelete('cascade');

            // Campos do exame clínico
            $table->integer('escore_corporal')->nullable(); // Escore Corporal (1 a 5)
            $table->string('pelo_pele')->nullable(); // Pelo e Pele
            $table->string('atividade_geral')->nullable(); // Atividade Geral
            $table->string('desidratacao')->nullable(); // Desidratação
            $table->string('ectoparasitas')->nullable(); // Ectoparasitas (sim/não)
            $table->string('temperatura_corporal')->nullable(); // Temperatura Corporal (T.C. [GC])
            $table->string('frequencia_respiratoria')->nullable(); // Frequência Respiratória (FR)
            $table->string('frequencia_cardiaca')->nullable(); // Frequência Cardíaca (FC)
            $table->string('tempo_preenchimento_capilar')->nullable(); // Tempo de Preenchimento Capilar (TPC)
            $table->string('mucosas')->nullable(); // Mucosas
            $table->string('perdas')->nullable(); // Perdas
            $table->string('afundamento_ocular')->nullable(); // Afundamento Ocular
            $table->integer('elasticidade_pele')->nullable(); // Elasticidade da Pele (1 a 4)
            $table->text('observacoes')->nullable(); // Observações
            $table->text('exames_realizados')->nullable(); // Exames Realizados
            $table->text('diagnostico_presuntivo')->nullable(); // Diagnóstico Presuntivo
            $table->text('prescricao_hospitalar')->nullable(); // Prescrição Hospitalar
            $table->text('prescricao_domiciliar')->nullable(); // Prescrição Domiciliar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exame_clinicos');
    }
};
