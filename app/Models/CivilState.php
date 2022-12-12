<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CivilState extends Model
{
    use HasFactory;

    protected $table = 'estado_civil';
    protected $primaryKey = 'id';

    protected $fillable = 
    [
      'desc',
    ];
}