<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\Matiere;
use App\Models\Periode; 
use App\Models\Controle; 
use App\Models\Eleve;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'note' => $this->faker->randomFloat(2, 0, 20), 
            'matiere_id' => Matiere::inRandomOrder()->first()->id, 
            'periode_id' => Periode::inRandomOrder()->first()->id, 
            'controle_id' => Controle::inRandomOrder()->first()->id, 
            'eleve_id' => Eleve::inRandomOrder()->first()->id,
        ];
    }
}
