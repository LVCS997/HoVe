<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('solicitacoes_exames', function (Blueprint $table) {
            $table->string('arquivo_pdf')->nullable(); // Armazena o caminho do arquivo PDF
        });
    }

    public function down()
    {
        Schema::table('solicitacoes_exames', function (Blueprint $table) {
            $table->dropColumn('arquivo_pdf');
        });
    }
};
