<?php

namespace Database\Seeders;

use App\Models\Controle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ControleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Controle::firstOrCreate(
            ['code' => 'devoir1'],
            ['libelle' => '1er devoir'],
        );
        Controle::firstOrCreate(
            ['code' => 'devoir2'],
            ['libelle' => '2em devoir'],
        );
        Controle::firstOrCreate(
            ['code' => 'intero'],
            ['libelle' => 'Interogation'],
        );
    }
}
