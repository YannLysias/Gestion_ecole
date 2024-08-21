<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    public function salles()
    {
        return $this->belongsToMany(Salle::class, 'salle_classe', 'classe_id', 'salle_id');
    }

    public function emplois()
    {
        return $this->hasMany(Emploi_du_temps::class, 'classe_id');
    }

    public function niveaux(){

        return $this->belongsTo(Niveau::class,'niveau_id');
    }
}
