<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('niveaux')->insert([
            ['libelle' => '6ème'],
            ['libelle' => '5ème'],
            ['libelle' => '4ème'],
            ['libelle' => '3ème'],
            ['libelle' => '2nde'],
            ['libelle' => '1ère'],
            ['libelle' => 'Terminale'],
        ]);
    }
}
