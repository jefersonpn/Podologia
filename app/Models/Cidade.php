<?php

namespace App\Models;

use App\Models\Estado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cidade extends Model
{
    use HasFactory;

    protected $table = 'cidades';
    protected $primaryKey = 'id';

    protected $fillable =
    [
            'estado_id',
            'uf',
            'nome',
    ];

    public function estados()
    {
        return $this->belongsTo(Estado::class);
    }

    public function pacients()
    {
        return $this->belongsTo(Pacient::class);
    }
}