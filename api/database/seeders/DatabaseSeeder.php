<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AnneeScolaireSeeder::class,
            ClassSeeder::class,
            ControleSeeder::class,
            DocumentSeeder::class,
            EleveSeeder::class,
            JoursSeeder::class,
            NiveauSeeder::class,
            PeriodeSeeder::class,
            PermissionSeeder::class,
            TuteurSeeder::class,
            ClassSeeder::class,
            MatiereSeeder::class,
            NoteSeeder::class,
            SalleSeeder::class,
            EmploiDuTempsSeeder::class,
        ]);
    }
}
