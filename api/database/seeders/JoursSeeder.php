<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JoursSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Insert multiple records into the 'jours' table
        DB::table('jours')->insert([
            ['libelle' => 'Lundi'],
            ['libelle' => 'Mardi'],
            ['libelle' => 'Mercredi'],
            ['libelle' => 'Jeudi'],
            ['libelle' => 'Vendredi'],
            ['libelle' => 'Samedi'],
        ]);
    }
}
