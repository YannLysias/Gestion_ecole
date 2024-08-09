<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jour extends Model
{
    use HasFactory;

    public function emplois()
    {
        return $this->hasMany(Emploi_du_temps::class, 'jour_id');
    }
}
