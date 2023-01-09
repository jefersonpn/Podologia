<?php

namespace App\Models;

use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'uf'
    ];

    public function cidades()
    {
        return $this->hasMany(Cidade::class);
    }
    
    public function pacients()
    {
        return $this->belongsTo(Pacient::class);
    }
}