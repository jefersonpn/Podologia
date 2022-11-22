<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estado extends Model
{

    protected $table = 'estados';
    protected $primaryKey = 'id';
    
    protected $fillable = [
      'nome',
      'uf'  
    ];

    use HasFactory;
    
}