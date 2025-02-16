<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacaoExameItem extends Model
{
    use HasFactory;

    protected $table = 'solicitacoes_exames_itens';

    protected $fillable = ['solicitacao_id', 'exame_id', 'categoria_id', 'subcategoria_id'];

    public function solicitacao()
    {
        return $this->belongsTo(SolicitacaoExame::class);
    }

    public function exame()
    {
        return $this->belongsTo(Exame::class);
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaExame::class);
    }

    public function subcategoria()
    {
        return $this->belongsTo(SubcategoriaExame::class);
    }
}
