<?php

namespace Database\Factories;

use App\Models\Emploi_du_temps;
use App\Models\Classe;
use App\Models\Annee_Scolaire;
use App\Models\Jour;
use App\Models\Matiere;
use Illuminate\Database\Eloquent\Factories\Factory;

class Emploi_du_tempsFactory extends Factory
{
    protected $model = Emploi_du_temps::class;

    public function definition(): array
    {
        $heure_debut = $this->faker->time('H:i:s', '18:00:00');
        $heure_debut_timestamp = strtotime($heure_debut);
        $max_heure_fin_timestamp = min($heure_debut_timestamp + rand(3600, 10800), strtotime('16:00:00'));
        $heure_fin = date('H:i:s', $max_heure_fin_timestamp);

        return [
            'heure_debut' => $heure_debut,
            'heure_fin' => $heure_fin,
            'classe_id' => Classe::inRandomOrder()->first()->id,
            'annee_scolaire_id' => Annee_Scolaire::inRandomOrder()->first()->id,
            'jour_id' => Jour::inRandomOrder()->first()->id,
            'matiere_id' => Matiere::inRandomOrder()->first()->id,
        ];
    }
}
