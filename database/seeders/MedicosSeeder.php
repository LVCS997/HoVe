<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medico;

class MedicosSeeder extends Seeder
{
    public function run()
    {
        Medico::create([
            'nome' => 'Dr. João Silva',
            'crmv' => '12345-SP',
            'especialidade' => 'Radiologia',
        ]);

        Medico::create([
            'nome' => 'Dra. Maria Oliveira',
            'crmv' => '54321-RJ',
            'especialidade' => 'Cardiologia',
        ]);

        Medico::create([
            'nome' => 'Dr. Carlos Souza',
            'crmv' => '67890-MG',
            'especialidade' => 'Ultrassonografia',
        ]);
    }
}
