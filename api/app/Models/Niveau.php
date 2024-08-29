<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;
    
    protected $fillable = ['libelle'];

    public function classes(){
        return $this->hasMany(Classe::class,'niveau_id');
    }
}
