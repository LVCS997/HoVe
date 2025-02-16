<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function categorias()
    {
        return $this->hasMany(CategoriaExame::class);
    }
}
