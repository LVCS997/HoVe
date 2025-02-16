<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacaoExame extends Model
{
    use HasFactory;

    protected $table = 'solicitacoes_exames';

    protected $fillable = [
        'pet_id',
        'medico_id',
        'data_solicitacao',
        'status',
        'arquivo_pdf',
    ];

    protected $casts = [
        'data_solicitacao' => 'datetime',
    ];

    // Relacionamento com a tabela medicos
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    // Relacionamento com a tabela pacientes
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    // Relacionamento com a tabela solicitacoes_exames_itens
    public function itens()
    {
        return $this->hasMany(SolicitacaoExameItem::class, 'solicitacao_id');
    }
}
