<?php

namespace Database\Seeders;

use App\Models\Periode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Periode::firstOrCreate([
            'code'=>'semestre1',
            'libelle'=>'1er Semestre'
        ]);
        Periode::firstOrCreate([
            'code'=>'semestre2',
            'libelle'=>'2em Semestre'
        ]);
    }
}
