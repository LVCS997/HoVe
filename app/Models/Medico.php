<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'crmv',
        'especialidade',
    ];

    // Relacionamento com a tabela solicitacoes_exames
    public function solicitacoes()
    {
        return $this->hasMany(SolicitacaoExame::class);
    }
}
