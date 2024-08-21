<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;


    protected $guarded = [];
    protected $table = 'matieres';

    public function absences()
    {
        return $this->HasMany(Absence::class,'matiere_id');
    }

    public function notes()
    {
        return $this->hasMany(note::class,'matiere_id');
    }

    public function emploi_du_temps()
    {
        return $this->hasMany(Emploi_du_temps::class, 'matiere_id');
    }

}
