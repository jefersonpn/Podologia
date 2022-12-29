<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anamnesi extends Model
{
    use HasFactory;

    public function pacients()
    {
        return $this->belongsTo(Pacient::class);
    }
}