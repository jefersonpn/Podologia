<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pe extends Model
{
    use HasFactory;

    protected $table = 'pes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'lado',
    ];

    public function Perfusoes()
    {
        return $this->belongsToMany(Perfusao::class);
    }
}