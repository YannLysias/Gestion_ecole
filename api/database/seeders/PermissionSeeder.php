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
    public function run(): void
    {
        Permission::firstOrCreate(
            ['name' => 'modifier_absence'],
            ['description' => 'Modifier les informations des absences']
        );
        Permission::firstOrCreate(
            ['name' => 'modifier_admin'],
            ['description' => 'Modifier les informations des utilisateurs administrateurs']
        );
        Permission::firstOrCreate(
            ['name' => 'modifier_annee_scolaire'],
            ['description' => 'Modifier les informations de l\'année scolaire']
        );
        Permission::firstOrCreate(
            ['name' => 'modifier_classe'],
            ['description' => 'Modifier les informations des classes']
        );
        Permission::firstOrCreate(
            ['name' => 'modifier_document'],
            ['description' => 'Modifier les informations des documents']
        );
        Permission::firstOrCreate(
            ['name' => 'modifier_eleve'],
            ['description' => 'Modifier les informations des élèves']
        );
        Permission::firstOrCreate(
            ['name' => 'modifier_emploi_du_temps'],
            ['description' => 'Modifier les informations de l\'emploi du temps']
        );
        Permission::firstOrCreate(
            ['name' => 'modifier_etablissement'],
            ['description' => 'Modifier les informations de l\'établissement']
        );
        Permission::firstOrCreate(
            ['name' => 'modifier_note'],
            ['description' => 'Modifier les informations des notes']
        );
        Permission::firstOrCreate(
            ['name' => 'modifier_tuteur'],
            ['description' => 'Modifier les informations des tuteurs']
        );
        Permission::firstOrCreate(
            ['name' => 'modifier_utilisateur'],
            ['description' => 'Modifier les informations des utilisateurs']
        );
        Permission::firstOrCreate(
            ['name' => 'voir_absence'],
            ['description' => 'Voir la liste de presence']
        );
        Permission::firstOrCreate(
            ['name' => 'voir_admin'],
            ['description' => 'Voir la liste des admins']
        );
        Permission::firstOrCreate(
            ['name' => 'voir_annee_scolaire'],
            ['description' => 'Voir les informations de l\'année scolaire']
        );
        Permission::firstOrCreate(
            ['name' => 'voir_classe'],
            ['description' => 'Voir les informations des classes']
        );
        Permission::firstOrCreate(
            ['name' => 'voir_document'],
            ['description' => 'Voir les informations des documents']
        );
        Permission::firstOrCreate(
            ['name' => 'voir_eleve'],
            ['description' => 'Voir les informations des élèves']
        );
        Permission::firstOrCreate(
            ['name' => 'voir_emploi_du_temps'],
            ['description' => 'Voir les informations de l\'emploi du temps']
        );
        Permission::firstOrCreate(
            ['name' => 'voir_etablissement'],
            ['description' => 'Voir les informations de l\'établissement']
        );
        Permission::firstOrCreate(
            ['name' => 'voir_note'],
            ['description' => 'Voir les notes']
        );
        Permission::firstOrCreate(
            ['name' => 'voir_tuteur'],
            ['description' => 'Voir les informations des tuteurs']
        );
        Permission::firstOrCreate(
            ['name' => 'voir_utilisateur'],
            ['description' => 'Voir les informations des utilisateurs']
        );
        
    }
}
