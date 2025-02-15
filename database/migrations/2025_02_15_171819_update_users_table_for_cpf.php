<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Verifica se o banco de dados não é SQLite
            if (!Schema::getConnection() instanceof \Illuminate\Database\SQLiteConnection) {
                $table->dropColumn('email'); // Remove o campo email
            }

            $table->string('cpf')->unique(); // Adiciona o campo CPF
        });

        // Se for SQLite, faz o processo manual
        if (Schema::getConnection() instanceof \Illuminate\Database\SQLiteConnection) {
            // Passo 1: Criar uma nova tabela temporária
            Schema::create('users_temp', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('cpf')->unique();
                $table->string('password');
                $table->string('role')->default('user');
                $table->timestamps();
            });

            // Passo 2: Copiar os dados da tabela antiga para a nova
            $users = DB::table('users')->get();
            foreach ($users as $user) {
                DB::table('users_temp')->insert([
                    'id' => $user->id,
                    'name' => $user->name,
                    'cpf' => '', // Defina um valor padrão para o CPF
                    'password' => $user->password,
                    'role' => $user->role,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                ]);
            }

            // Passo 3: Excluir a tabela antiga
            Schema::drop('users');

            // Passo 4: Renomear a nova tabela para o nome original
            Schema::rename('users_temp', 'users');
        }
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Verifica se o banco de dados não é SQLite
            if (!Schema::getConnection() instanceof \Illuminate\Database\SQLiteConnection) {
                $table->dropColumn('cpf'); // Remove o campo CPF
            }

            $table->string('email')->unique(); // Adiciona o campo email
        });

        // Se for SQLite, faz o processo manual
        if (Schema::getConnection() instanceof \Illuminate\Database\SQLiteConnection) {
            // Passo 1: Criar uma nova tabela temporária
            Schema::create('users_temp', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('role')->default('user');
                $table->timestamps();
            });

            // Passo 2: Copiar os dados da tabela antiga para a nova
            $users = DB::table('users')->get();
            foreach ($users as $user) {
                DB::table('users_temp')->insert([
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => '', // Defina um valor padrão para o email
                    'password' => $user->password,
                    'role' => $user->role,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                ]);
            }

            // Passo 3: Excluir a tabela antiga
            Schema::drop('users');

            // Passo 4: Renomear a nova tabela para o nome original
            Schema::rename('users_temp', 'users');
        }
    }
};
