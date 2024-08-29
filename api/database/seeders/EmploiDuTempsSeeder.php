<?php

namespace Database\Seeders;

use App\Models\Emploi_du_temps;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmploiDuTempsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Emploi_du_temps::factory()->count(30)->create();
    }
}
