<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;


    protected $guarded = [];
    protected $table = 'absences';

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function eleve()
    {
        return $this->belongsTo(Ecole::class);
    }


}
