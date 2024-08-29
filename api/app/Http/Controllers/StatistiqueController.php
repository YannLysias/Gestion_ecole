<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Enseignant;
use App\Models\Tuteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StatistiqueController extends Controller
{

    public function __invoke()
    {

        $eleveGarcon = Eleve::with('users')
            ->whereHas('users', function ($query) {
                $query->where('sexe', 'male');
            })->count();

        $eleveFille = Eleve::with('users')
            ->whereHas('users', function ($query) {
                $query->where('sexe', 'female');
            })
            ->count();

        $elevePassant = 0;

        $eleveRedoublant = 0;

        $eleve = [
            'gacons' => $eleveGarcon,
            'filles' => $eleveFille,
            'passants' => $elevePassant,
            'redoublants' => $eleveRedoublant
        ];

        $tuteurHomme = Tuteur::with('users')->whereHas('users', function ($query) {
            $query->where('sexe', 'male');
        })->count();

        $tuteurFemme = Tuteur::with('users')->whereHas('users', function ($query) {
            $query->where('sexe', 'female');
        })->count();

        $tuteur = [
            'hommes' => $tuteurHomme,
            'femmes' => $tuteurFemme,
        ];

        $enseignantHomme = Enseignant::with('users')->whereHas('users', function ($query) {
            $query->where('sexe', 'male');
        })->count();

        $enseignantFemme = Enseignant::with('users')->whereHas('users', function ($query) {
            $query->where('sexe', 'female');
        })->count();

        $enseignant = [
            'hommes' => $enseignantHomme,
            'femmes' => $enseignantFemme,
        ];

        return response()->json(
            ['statistiques' => [
                'eleves' => $eleve,
                'tuteurs' => $tuteur,
                'enseignant' => $enseignant
            ]],
            Response::HTTP_OK
        );
    }
}
