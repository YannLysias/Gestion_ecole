<?php

namespace Database\Factories;

use App\Models\Annee_scolaire;
use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{

    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->word(),
            'user_id' => User::inRandomOrder()->first()->id, // Assign a random existing user
            'annee_scolaire_id'=>Annee_scolaire::inRandomOrder()->first()->id,

        ];
    }
}
