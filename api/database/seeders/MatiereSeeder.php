<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matiere;

class MatiereSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Define unique codes and their corresponding libelle
        $subjects = [
            ['code' => 'MATH101', 'libelle' => 'Mathématiques'],
            ['code' => 'FRAN102', 'libelle' => 'Français'],
            ['code' => 'SVT103', 'libelle' => 'Sciences de la Vie et de la Terre'],
            ['code' => 'HIST104', 'libelle' => 'Histoire-Géographie'],
            ['code' => 'LV105', 'libelle' => 'Langues Vivantes'],
            ['code' => 'EPS106', 'libelle' => 'Éducation Physique et Sportive'],
            ['code' => 'TECH107', 'libelle' => 'Technologie'],
            ['code' => 'ART108', 'libelle' => 'Arts Plastiques'],
            ['code' => 'MUS109', 'libelle' => 'Musique'],
            ['code' => 'INFO110', 'libelle' => 'Informatique'],
            ['code' => 'ECO111', 'libelle' => 'Économie'],
            ['code' => 'PHIL112', 'libelle' => 'Philosophie'],
            ['code' => 'PHCH113', 'libelle' => 'Physique-Chimie'],
            ['code' => 'BIO114', 'libelle' => 'Biologie'],
            ['code' => 'SES115', 'libelle' => 'Sciences Économiques et Sociales'],
        ];

        // Insert each subject into the 'matieres' table
        foreach ($subjects as $subject) {
            Matiere::create($subject);
        }
    }
}
