<?php

namespace Database\Factories;

use App\Models\Administrateur;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tuteur>
 */
class AdministrateurFactory extends Factory
{
    protected $model = Administrateur::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
                'user_id' => User::factory(),
        ];
    }
}
