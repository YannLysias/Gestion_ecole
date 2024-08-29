<?php

namespace Database\Factories;

use App\Models\Annee_scolaire;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_name' => $this->faker->unique()->userName(),
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'sexe' => $this->faker->randomElement(['male', 'female']),
            'telephone' => $this->faker->phoneNumber(),
            'adresse' => $this->faker->address(),
            'statut' => $this->faker->boolean(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'annee_scolaire_id'=>Annee_scolaire::inRandomOrder()->first()->id,

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
