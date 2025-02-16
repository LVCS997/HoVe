<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcategoriaExame extends Model
{
    use HasFactory;

    protected $table = 'subcategorias_exames';

    protected $fillable = ['categoria_id', 'nome'];

    public function categoria()
    {
        return $this->belongsTo(CategoriaExame::class, 'categoria_id');
    }
}
