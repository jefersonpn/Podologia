<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    use HasFactory;

    protected $table = 'sexes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'desc',
    ];



    public function pacients()
    {
        return $this->belongsTo(Pacient::class);
    }
}