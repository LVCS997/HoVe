<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.p
     */
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('especie', ['Canino', 'Felino']);
            $table->string('raca')->nullable();
            $table->integer('idade')->nullable();
            $table->enum('sexo', ['Macho', 'Femea'])->nullable();
            $table->decimal('peso', 5, 2)->default(0)->nullable();
            $table->enum('porte', ['Pequeno', 'Médio', 'Grande', 'Não Definido'])->default('Não Definido')->nullable();
            $table->boolean('castrado')->default(false)->nullable();
            $table->boolean('vacinas')->default(false)->nullable();
            $table->string('onde_vacinado')->default('Não Definido')->nullable();
            $table->text('anamnese')->default('Não Definido')->nullable();
            $table->foreignId('owner_id')->constrained()->onDelete('cascade');

            // Novos campos
            $table->string('cidade_nascimento')->nullable(); // Cidade de nascimento
            $table->string('uf_nascimento', 2)->nullable(); // UF de nascimento (2 caracteres)
            $table->string('pais_nascimento')->nullable(); // País de nascimento
            $table->decimal('temperatura', 4, 2)->nullable(); // Temperatura no nascimento
            $table->time('hora_nascimento')->nullable(); // Hora de nascimento
            $table->date('data_nascimento')->nullable(); // Data de nascimento

            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
