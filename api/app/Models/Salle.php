<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    public function classes()
    {
        return $this->belongsToMany(Classe::class,'salle_classe','classe_id','salle_id');
    }
}
