<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'eleves';

    public function notes()
    {
        return $this->HasMany(Note::class); 
    }

    public function absences()
    {
        return $this->HasMany(Absence::class); 
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
