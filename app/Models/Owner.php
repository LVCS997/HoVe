<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 */
class Owner extends Model
{
    use HasFactory;


    protected $fillable = [
        'nome',
        'rg',
        'endereco',
        'telefone',
        'data_nascimento',
        'cpf'
    ];

    public function pets(){
        return $this->hasMany(Pet::class);
    }
}
