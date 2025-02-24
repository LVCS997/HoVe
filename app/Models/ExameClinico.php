<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExameClinico extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'medico_id',
        'escore_corporal',
        'pelo_pele',
        'atividade_geral',
        'desidratacao',
        'ectoparasitas',
        'temperatura_corporal',
        'frequencia_respiratoria',
        'frequencia_cardiaca',
        'tempo_preenchimento_capilar',
        'mucosas',
        'perdas',
        'afundamento_ocular',
        'elasticidade_pele',
        'observacoes',
        'exames_realizados',
        'diagnostico_presuntivo',
        'prescricao_hospitalar',
        'prescricao_domiciliar'
    ];

    // Relacionamento com o Pet
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    // Relacionamento com o Médico
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
}
