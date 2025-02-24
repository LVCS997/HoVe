<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        // Cria 10 usuários
//        \App\Models\User::factory(10)->create();
//
//        // Cria 5 médicos
//        \App\Models\Medico::factory(5)->create();
//
//        // Cria 15 donos (owners)
//        \App\Models\Owner::factory(15)->create();
//
//        // Cria 30 pets
//        \App\Models\Pet::factory(30)->create();
//
//        // Cria 50 exames clínicos
//        \App\Models\ExameClinico::factory(50)->create();

        $this->call([
            ExamesSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
