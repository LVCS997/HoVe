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
        Schema::create('solicitacoes_exames_itens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitacao_id')->constrained('solicitacoes_exames')->onDelete('cascade');
            $table->foreignId('exame_id')->constrained('exames')->onDelete('cascade');
            $table->foreignId('categoria_id')->nullable()->constrained('categorias_exames')->onDelete('set null');
            $table->foreignId('subcategoria_id')->nullable()->constrained('subcategorias_exames')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacoes_exames_itens');
    }
};
