<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;

    protected $table = 'pacients';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'dob',
        'civilState_id',
        'email',
        'sex_id',
        'estado_id',
        'cidade_id',
        'address',
        'number',
        'cap',
        'percent',
        'anamnese',
        'obsProf',
    ];

    public function cidades()
    {
        return $this->hasOne(Cidade::class);
    }

    public function estados()
    {
        return $this->hasOne(Estado::class);
    }
    
    public function sexes()
    {
        return $this->hasOne(Sex::class);
    }
    
    public function civilStates()
    {
        return $this->hasOne(CivilState::class);
    }

    public function anamnesis()
    {
        return $this->hasOne(Anamnesi::class);
    }

    public function obsProfs()
    {
        return $this->hasOne(Anamnesi::class);
    }
    
    public function pes_perfusoes()
    {
        return $this->hasMany(pe_perfusao::class);
    }
}