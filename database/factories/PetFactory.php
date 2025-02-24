<?php

namespace Database\Factories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->firstName,
            'especie' => $this->faker->randomElement(['Felino', 'Canino']),
            'raca' => $this->faker->word,
            'idade' => $this->faker->numberBetween(1, 15),
            'sexo' => $this->faker->randomElement(['Macho', 'Femea']),
            'pelagem' => $this->faker->colorName,
            'castrado' => $this->faker->boolean,
            'vacinas' => $this->faker->boolean,
            'onde_vacinado' => $this->faker->company,
            'anamnese' => $this->faker->sentence,
            'cidade_nascimento' => $this->faker->city,
            'uf_nascimento' => $this->faker->stateAbbr,
            'pais_nascimento' => $this->faker->country,
            'temperatura' => $this->faker->randomFloat(1, 37, 40),
            'hora_nascimento' => $this->faker->time,
            'data_nascimento' => $this->faker->date,
            'peso' => $this->faker->randomFloat(1, 1, 50),
            'owner_id' => Owner::factory(), // Cria um Owner automaticamente
        ];
    }
}
