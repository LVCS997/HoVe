<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nome',
        'crmv',
        'especialidade',
    ];

    public function examesClinicos()
    {
        return $this->hasMany(ExameClinico::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relacionamento com a tabela solicitacoes_exames
    public function solicitacoes()
    {
        return $this->hasMany(SolicitacaoExame::class);
    }
}
