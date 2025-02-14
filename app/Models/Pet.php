<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 */
class Pet extends Model
{
    use HasFactory;

    protected $fillable = [

        // recepcionista
        'nome',
        'especie',
        'raca',
        'idade',
        'sexo',
        'pelagem',
        'castrado',
        'vacinas',
        'onde_vacindo',
        'anamnese',

        // medico
        'cidade_nascimento',
        'uf_nascimento',
        'pais_nascimento',
        'temperatura',
        'hora_nascimento',
        'data_nascimento',
        'peso',

        'owner_id', // chave estrageira para o dono (owners)
    ];

    public function owner(){
        return $this->belongsTo(Owner::class);
    }
}
