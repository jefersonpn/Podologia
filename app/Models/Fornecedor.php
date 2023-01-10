<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedores';
    protected $primaryKey = 'id';

    protected $fillable = [
        'razaoSocial',
        'nomeFantasia',
        'cnpj',
        'email', 
        'matrizFilial',
        'dataFundacao',
        'mei',
        'porte',
        'simplesNacional',
        'situacao',
        'dataSituacao',
        'inscricaoEstadual',
        'inscricaoMunicipal',
        'telefone',
        'estado_id',
        'cidade_id',
        'endereco',
        'numero',
        'complemento',
        'cep',
          
    ];

}