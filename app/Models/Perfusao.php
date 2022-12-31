<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfusao extends Model
{
    use HasFactory;

    protected $table = 'perfusoes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'desc'
    ];

    public function Pes()
    {
        return $this->belongsToMany(Pe::class);
    }
}