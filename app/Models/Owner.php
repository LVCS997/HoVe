<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 */
class Owner extends Model
{
    protected $fillable = [
        'nome',
        'rg',
        'telefone',
        'data_nascimento',
        'cpf',
        'cep',
        'estado',
        'cidade',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
    ];


    use HasFactory;

    public function pets(){
        return $this->hasMany(Pet::class);
    }
}
