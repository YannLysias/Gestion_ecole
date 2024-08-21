<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnneeScolaireSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Insert multiple records into the 'annee_scolaires' table
        DB::table('annee_scolaires')->insert([
            ['annee' => '2024-2025', 'type' => 'semestriel', 'statut' => true],
            ['annee' => '2023-2024', 'type' => 'semestriel', 'statut' => false],
            ['annee' => '2022-2023', 'type' => 'trimestriel', 'statut' => false],
            ['annee' => '2021-2022', 'type' => 'trimestriel', 'statut' => false],
        ]);
    }
}
