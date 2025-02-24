<?php

namespace Database\Factories;

use App\Models\Medico;
use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExameClinico>
 */
class ExameClinicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pet_id' => Pet::factory(), // Cria um Pet automaticamente
            'medico_id' => Medico::factory(), // Cria um Médico automaticamente
            'escore_corporal' => $this->faker->numberBetween(1, 5),
            'pelo_pele' => $this->faker->word,
            'atividade_geral' => $this->faker->randomElement(['Normal', 'Apático', 'Hiperativo']),
            'desidratacao' => $this->faker->randomElement(['Normohidratado', 'Leve', 'Moderada', 'Grave']),
            'ectoparasitas' => $this->faker->randomElement(['Sim', 'Não']),
            'temperatura_corporal' => $this->faker->randomFloat(1, 37, 40),
            'frequencia_respiratoria' => $this->faker->numberBetween(10, 30),
            'frequencia_cardiaca' => $this->faker->numberBetween(60, 120),
            'tempo_preenchimento_capilar' => $this->faker->numberBetween(1, 3),
            'mucosas' => $this->faker->randomElement(['Normocorada', 'Hipocorada', 'Hiperêmica']),
            'perdas' => $this->faker->randomElement(['Nenhuma', 'Vômito', 'Diarréia']),
            'afundamento_ocular' => $this->faker->randomElement(['Leve', 'Moderado', 'Grave']),
            'elasticidade_pele' => $this->faker->numberBetween(1, 4),
            'observacoes' => $this->faker->paragraph,
            'exames_realizados' => $this->faker->sentence,
            'diagnostico_presuntivo' => $this->faker->sentence,
            'prescricao_hospitalar' => $this->faker->sentence,
            'prescricao_domiciliar' => $this->faker->sentence,
        ];
    }
}
