<?php

namespace Database\Seeders;

use App\Models\Annee_scolaire;
use App\Models\User;
use Database\Factories\EnseignantFactory;
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
            ControleSeeder::class,
            NiveauSeeder::class,
            ClassSeeder::class,
            AnneeScolaireSeeder::class,
            TuteurSeeder::class,
            ClassSeeder::class,
            EleveSeeder::class,
            AministrateurSeeder::class,
            DocumentSeeder::class,
            JoursSeeder::class,
            PeriodeSeeder::class,
            PermissionSeeder::class,
            MatiereSeeder::class,
            NoteSeeder::class,
            SalleSeeder::class,
            EmploiDuTempsSeeder::class,
            EnseignantSeeder::class

        ]);
    }
}
