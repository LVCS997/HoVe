<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::create([
            'name' => 'Lucas Sousa da Silva',
            'cpf' => '18396750718',
            'password' => Hash::make('naohasenha'),
            'role' => 'admin'
        ]);
    }
}
