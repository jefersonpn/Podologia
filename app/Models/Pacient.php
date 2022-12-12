<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;

    protected $table = 'pacient';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'sobrenome',
        'telefone',
        'dataNascimento',
        'email',
        'password',
        'sexo',
        'id_estado',
        'id_cidade',
        'endereco',
        'numero',
        'cep',
    ];
}