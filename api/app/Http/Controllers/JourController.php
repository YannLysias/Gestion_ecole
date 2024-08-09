<?php

namespace App\Http\Controllers;

use App\Models\Jour;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $jours = Jour::all();
        return response()->json(['jours' => $jours], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'libelle' => ['required', 'string', 'max:30'],
        ]);

        // Create a new Jour instance with the validated data
        $jour = Jour::create($validatedData);

        return response()->json([
            'jour' => $jour,
            'message' => 'Nouveau jour créé',
            'success' => true,
        ], Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'libelle' => ['required', 'string', 'max:30'],
        ]);

        // Find the Jour by ID and update it
        $jour = Jour::find($id);
        
        if (!$jour) {
            return response()->json(['message' => 'Jour introuvable'], Response::HTTP_NOT_FOUND);
        }

        $jour->update($validatedData);

        return response()->json([
            'jour' => $jour,
            'message' => 'Jour modifié avec succès.',
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        // Find the Jour by ID and delete it
        $jour = Jour::find($id);
        
        if (!$jour) {
            return response()->json(['message' => 'Jour introuvable'], Response::HTTP_NOT_FOUND);
        }

        $jour->delete();

        return response()->json([
            'message' => 'Jour supprimé avec succès',
        ], Response::HTTP_OK);
    }
}
