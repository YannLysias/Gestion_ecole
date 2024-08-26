<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Tuteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StatistiqueController extends Controller
{

    public function __invoke(){
       
        $eleveGarcon = Eleve::with('users')
        ->whereHas('users', function($query) {
            $query->where('sexe', 'masculin');
        })->count();

        $eleveFille = Eleve::with('users')
        ->whereHas('users', function($query) {
            $query->where('sexe', 'feminin');
        })
        ->count();

        $elevePassant = 0;

        $eleveRedoublant = 0;

        $eleve = [
        'eleveGarcon' => $eleveGarcon, 
        'eleveFille' => $eleveFille, 
        'elevePassant' => $elevePassant, 
        'eleveRedoublant' => $eleveRedoublant];

        $tuteur = Tuteur::with('users')->whereHas('users', function($query) {
            $query->where('sexe', 'masculin');
        })->count();

        $tuteurFille = Tuteur::with('users')->whereHas('users', function($query) {
            $query->where('sexe', 'feminin');
        })->count();

        $tuteur = [
        'tuteurGarcon' => $tuteur, 
        'tuteurFille' => $tuteurFille, 
        ];

        return response()->json(['statistiques' => ['eleves' => $eleve, 'tuteurs' => $tuteur]], Response::HTTP_OK);
    }
}
