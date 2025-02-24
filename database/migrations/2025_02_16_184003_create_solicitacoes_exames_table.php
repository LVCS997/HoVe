<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('solicitacoes_exames', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained('pets', 'id')->onDelete('cascade');
            $table->foreignId('medico_id')->constrained('medicos')->onDelete('cascade');
            $table->timestamp('data_solicitacao')->useCurrent();
            $table->enum('status', ['Pendente', 'Em andamento', 'Concluído'])->default('Pendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacoes_exames');
    }
};
