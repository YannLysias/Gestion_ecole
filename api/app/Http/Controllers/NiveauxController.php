<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NiveauxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveaux = Niveau::all();
        return response()->json(['niveaux' => $niveaux], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /**
         * Afficher les classeS d'un niveau. Exemple: Afficher les classes du niveau sixieme.
         */

        $classes = Classe::with('niveaux')->where('niveau_id', '=', $id)->get();
        return response()->json(['classes' => $classes], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
