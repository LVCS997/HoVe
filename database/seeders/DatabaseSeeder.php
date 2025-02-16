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
        // User::factory(10)->create();

        $this->call([
            ExamesSeeder::class,
            MedicosSeeder::class,
        ]);

        $this->call([
            User::create([
                'name' => 'admin',
                'cpf' => '18396750718',
                'password' => Hash::make('naohasenha'),
                'role' => 'admin',
            ])
        ]);

    }
}
