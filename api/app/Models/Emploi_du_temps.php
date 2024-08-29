<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi_du_temps extends Model
{
    use HasFactory;


    
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function jour()
    {
        return $this->belongsTo(Jour::class, 'jour_id');
    }
    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'matiere_id');
    }
}
