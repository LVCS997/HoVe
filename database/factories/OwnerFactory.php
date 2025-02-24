<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'rg' => $this->faker->unique()->numerify('########'), // RG com 8 dígitos
            'telefone' => $this->faker->phoneNumber,
            'data_nascimento' => $this->faker->date,
            'cpf' => $this->faker->unique()->numerify('###########'), // CPF com 11 dígitos
            'cep' => $this->faker->postcode,
            'estado' => $this->faker->stateAbbr,
            'cidade' => $this->faker->city,
            'logradouro' => $this->faker->streetName,
            'numero' => $this->faker->buildingNumber,
            'complemento' => $this->faker->secondaryAddress,
            'bairro' => $this->faker->citySuffix,
        ];
    }
}
