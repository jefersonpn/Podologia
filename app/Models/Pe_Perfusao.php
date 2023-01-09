<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pe_Perfusao extends Model
{
    use HasFactory;

    protected $table = 'pe_perfusao';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pacient_id',
        'pe_id',
        'perfusao_id',
        
    ];

    public function pacients()
    {
        return $this->hasMany(Pacient::class);
    }
}