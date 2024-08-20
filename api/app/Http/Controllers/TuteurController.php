<?php

namespace App\Http\Controllers;

use App\Models\Tuteur;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TuteurController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        // Récupérer tous les Tuteurs avec leurs utilisateurs associés
        $tuteurs = Tuteur::with('user')->get();
        
        return response()->json(['tuteurs' => $tuteurs], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        // Récupérer un seul Tuteur avec son utilisateur associé
        $tuteur = Tuteur::with('user')->find($id); 

        if ($tuteur === null) {
            return response()->json(['message' => 'Tuteur non trouvé'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['tuteur' => $tuteur], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        // Valider les données de la requête
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'sexe' => ['required', 'string', 'in:masculin,féminin', 'max:15'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255']
        ]);

        // Trouver le Tuteur et l'utilisateur associé
        $tuteur = Tuteur::find($id);

        if ($tuteur === null) {
            return response()->json(['message' => 'Tuteur non trouvé'], Response::HTTP_NOT_FOUND);
        }

        // Mettre à jour le modèle User associé
        $user = $tuteur->user; 

        if ($user === null) {
            return response()->json(['message' => 'Utilisateur associé au Tuteur non trouvé'], Response::HTTP_NOT_FOUND);
        }

        $user->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'sexe' => $request->sexe,
            'email' => $request->email
        ]);

        return response()->json(['message' => 'Utilisateur mis à jour avec succès.'], Response::HTTP_OK);
    }
}
