<?php

namespace Database\Factories;

use App\Models\Annee_scolaire;
use App\Models\Classe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ClasseFactory extends Factory
{
    protected $model = Classe::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get a random niveau
        $niveauId = DB::table('niveaux')->inRandomOrder()->value('id');
        $niveauLibelle = DB::table('niveaux')->where('id', $niveauId)->value('libelle');

        // Determine the next letter
        $lastLetter = DB::table('classes')
            ->where('niveau_id', $niveauId)
            ->orderBy('nom', 'desc')
            ->value('nom');
        $lastLetter = preg_match('/[A-Z]$/', $lastLetter, $matches) ? $matches[0] : '';
        $nextLetter = $lastLetter === '' ? 'A' : chr(ord($lastLetter) + 1);

        return [
            'nom' => $niveauLibelle . $nextLetter,
            'effectif' => $this->faker->numberBetween(20, 40),
            'niveau_id' => $niveauId,
            'annee_scolaire_id'=>Annee_scolaire::inRandomOrder()->first()->id,
        ];
    }
}
