<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     protected $permission =  [
        [
            'name' => 'modifier_absence',
            'description' => 'Modifier les informations des absences'
        ],


        [
            'name' => 'modifier_admin',
            'description' => 'Modifier les informations des utilisateurs administrateurs'
        ],


        [
            'name' => 'modifier_annee_scolaire',
            'description' => 'Modifier les informations de l\'année scolaire'
        ],


        [
            'name' => 'modifier_classe',
            'description' => 'Modifier les informations des classes'
        ],


        [
            'name' => 'modifier_document',
            'description' => 'Modifier les informations des documents'
        ],


        [
            'name' => 'modifier_eleve',
            'description' => 'Modifier les informations des élèves'
        ],


        [
            'name' => 'modifier_emploi_du_temps',
            'description' => 'Modifier les informations de l\'emploi du temps'
        ],


        [
            'name' => 'modifier_etablissement',
            'description' => 'Modifier les informations de l\'établissement'
        ],


        [
            'name' => 'modifier_note',
            'description' => 'Modifier les informations des notes'
        ],


        [
            'name' => 'modifier_tuteur',
            'description' => 'Modifier les informations des tuteurs'
        ],


        [
            'name' => 'modifier_utilisateur',
            'description' => 'Modifier les informations des utilisateurs'
        ],


        [
            'name' => 'voir_absence',
            'description' => 'Voir la liste de presence'
        ],


        [
            'name' => 'voir_admin',
            'description' => 'Voir la liste des admins'
        ],


        [
            'name' => 'voir_annee_scolaire',
            'description' => 'Voir les informations de l\'année scolaire'
        ],


        [
            'name' => 'voir_classe',
            'description' => 'Voir les informations des classes'
        ],


        [
            'name' => 'voir_document',
            'description' => 'Voir les informations des documents'
        ],


        [
            'name' => 'voir_eleve',
            'description' => 'Voir les informations des élèves'
        ],


        [
            'name' => 'voir_emploi_du_temps',
            'description' => 'Voir les informations de l\'emploi du temps'
        ],


        [
            'name' => 'voir_etablissement',
            'description' => 'Voir les informations de l\'établissement'
        ],


        [
            'name' => 'voir_note',
            'description' => 'Voir les notes'
        ],


        [
            'name' => 'voir_tuteur',
            'description' => 'Voir les informations des tuteurs'
        ],


        [
            'name' => 'voir_utilisateur',
            'description' => 'Voir les informations des utilisateurs'
        ]
    ];

    public function run(): void
    {
        Permission::upsert($this->permission);
    }
}
