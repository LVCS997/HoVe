<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medico>
 */
class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Cria um User automaticamente
            'nome' => $this->faker->name, // Colocar o nome corretamente
            'crmv' => $this->faker->unique()->bothify('??-#####'), // Exemplo: SP-12345
            'especialidade' => $this->faker->randomElement(['Clínico Geral', 'Cirurgião', 'Dermatologista']),
        ];
    }
}
