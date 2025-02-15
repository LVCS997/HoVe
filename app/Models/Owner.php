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
        'telefone',
        'data_nascimento',
        'rg',
        'cpf',
        'cep',
        'estado',
        'cidade',
        'logradouro',
        'numero',
        'complemento',
    ];


    use HasFactory;

    public function pets(){
        return $this->hasMany(Pet::class);
    }
}
