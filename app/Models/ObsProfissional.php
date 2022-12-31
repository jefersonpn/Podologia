<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObsProfissional extends Model
{
    use HasFactory;
    
    protected $table = 'obs_profissionals';
    protected $primaryKey = 'id';

    protected $fillables = [
        'user_id',
        'perfusoes_id',
        'pressaoPD',
        'pressaoPE',
        'monofilamentoPD',
        'monofilamentoPE',
        'dermatologicasPD',
        'dermatologicasPE',
        'ungueaisPD',
        'ungueaisPE',
    ];
}