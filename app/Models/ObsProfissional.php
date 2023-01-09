<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObsProfissional extends Model
{
    use HasFactory;
    
    protected $table = 'obs_profissionals';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pacient_id',
        'perfusoes_id',
        'pressaoPD',
        'pressaoPE',
        'monofilamentoPD',
        'monofilamentoPE',
        'dermatologicasPD',
        'dermatologicasPE',
        'ungueaisPD',
        'ungueaisPE',
        'procedimentoProf'
    ];

    public function pacients()
    {
        return $this->belongsTo(Pacient::class);
    }
}