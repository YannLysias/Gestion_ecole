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
        return $this->HasMany(Absence::class);
    }

    public function notes()
    {
        return $this->HasMany(note::class);
    }
}
