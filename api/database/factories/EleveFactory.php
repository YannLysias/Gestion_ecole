<?php

namespace Database\Factories;

use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Tuteur;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eleve>
 */
class EleveFactory extends Factory
{

    protected $model = Eleve::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => User::factory(), // Creates a new User record
            'matricule' => $this->faker->unique()->numerify('MAT-#####'),
            'edu_master' => $this->faker->numerify('#########'), // Generates a 9-digit number like 897414689
            'date_naissance' => $this->faker->date(),
            'lieu_naissance' => $this->faker->city(),
            'tuteur_id' => $this->faker->boolean(50) ? Tuteur::inRandomOrder()->first()->id : null, // Picks an existing Tuteur or null
            'classe_id' => $this->faker->boolean(50) ? Classe::inRandomOrder()->first()->id : null, // Picks an existing Classe or null
        ];
    }
}
