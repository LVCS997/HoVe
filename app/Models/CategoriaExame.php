<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaExame extends Model
{
    use HasFactory;

    protected $table = 'categorias_exames';

    protected $fillable = ['exame_id', 'nome'];

    public function exame()
    {
        return $this->belongsTo(Exame::class);
    }

    public function subcategorias()
    {
        return $this->hasMany(SubcategoriaExame::class, 'categoria_id');
    }
}
