<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        
        $periodes = [
            ['code' => 'semestre1', 'libelle' => '1er Semestre'],
            ['code' => 'semestre2', 'libelle' => '2em Semestre'],
        ];

        
        foreach ($periodes as $periode) {
            DB::table('periodes')->updateOrInsert(
                ['code' => $periode['code']], 
                ['libelle' => $periode['libelle']] 
            );
        }
    }
}
