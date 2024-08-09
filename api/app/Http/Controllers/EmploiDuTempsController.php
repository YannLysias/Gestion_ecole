<?php

namespace App\Http\Controllers;

use App\Models\Emploi_du_temps;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmploiDuTempsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emplois = Emploi_du_temps::with(['classe', 'jour'])
        ->orderBy('classe_id')
        ->orderBy('heure_debut')
        ->get();
        
        $groupedEmplois = $emplois->groupBy(function($item) {
            return $item->classe->nom; 
        });
 
         return response()->json([
             'emplois_grouped_by_classe' => $groupedEmplois
         ], Response::HTTP_OK);
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut',
            'classe_id' => 'required|exists:classes,id',
            'jour_id' => 'required|exists:jours,id',
            'matiere_id' => 'required|exists:matiere,id',
        ]);

        $emploi = Emploi_du_temps::create([
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'classe_id' => $request->classe_id,
            'jour_id' => $request->jour_id,
            'matiere_id' => $request->matiere_id,
        ]);

        return response()->json([
            'emploi' => $emploi,
            'message' => 'Emploi du temps créé avec succès.',
            'success' => true
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $emploi_du_temps =  Emploi_du_temps::with(['classe', 'jour'])
        ->orderBy('classe_id')
        ->orderBy('heure_debut')
        ->find($id); 

        if ($emploi_du_temps === null) {
            return response()->json(['message' => 'Programme non trouvé'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['emploi_du_temps' => $emploi_du_temps], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emploi_du_temps = Emploi_du_temps::find($id);
        
        if (!$emploi_du_temps) {
            return response()->json(['message' => 'Programme introuvable'], Response::HTTP_NOT_FOUND);
        }

        $emploi_du_temps->delete();

        return response()->json([
            'message' => 'Programme supprimé avec succès',
        ], Response::HTTP_OK);
    }
}
