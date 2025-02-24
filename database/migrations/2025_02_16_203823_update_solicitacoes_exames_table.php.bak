<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('solicitacoes_exames', function (Blueprint $table) {
            $table->dropForeign(['paciente_id']); // Remove a chave estrangeira antiga
            $table->dropColumn('paciente_id'); // Remove a coluna antiga

            $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade'); // Adiciona a coluna correta
        });
    }

    public function down()
    {
        Schema::table('solicitacoes_exames', function (Blueprint $table) {
            $table->dropForeign(['pet_id']); // Reverte a alteração
            $table->dropColumn('pet_id');

            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade'); // Reverte para a coluna antiga
        });
    }
};
