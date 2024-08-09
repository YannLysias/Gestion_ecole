<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'notes';

    public function matieres()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function eleves()
    {
        return $this->belongsTo(Eleve::class); 
    }
}
