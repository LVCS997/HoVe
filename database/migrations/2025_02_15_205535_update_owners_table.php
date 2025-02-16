<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('owners', function (Blueprint $table) {
            // Remover o campo 'endereco'
            $table->dropColumn('endereco');

            // Adicionar novos campos de endereço
            $table->string('cep')->after('cpf');
            $table->string('estado')->after('cep');
            $table->string('cidade')->after('estado');
            $table->string('logradouro')->after('cidade');
            $table->string('numero')->after('logradouro');
            $table->string('complemento')->nullable()->after('numero');
        });
    }

    public function down(): void
    {
        Schema::table('owners', function (Blueprint $table) {
            // Reverter as alterações (caso necessário)
            $table->text('endereco')->after('cpf');
            $table->dropColumn(['cep', 'estado', 'cidade', 'logradouro', 'numero', 'complemento']);
        });
    }
};
