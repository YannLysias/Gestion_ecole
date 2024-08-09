<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        // Get all salles with their associated classes
        $salles = Salle::with('classes')->get();
         
        return response()->json(['salles' => $salles], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:30'],
        ]);

        $salle = Salle::create([
            'nom' => $request->nom,
        ]);

        return response()->json([
            'salle' => $salle,
            'message' => 'Nouvelle salle créée',
            'success' => true
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $salle = Salle::with('classes')->find($id);

        if ($salle === null) {
            return response()->json(['message' => 'Salle introuvable'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['salle' => $salle], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:30'],
        ]);

        $salle = Salle::find($id);

        if ($salle === null) {
            return response()->json(['message' => 'Salle introuvable'], Response::HTTP_NOT_FOUND);
        }

        $salle->update([
            'nom' => $request->nom,
        ]);

        return response()->json(['message' => 'Salle mise à jour avec succès.'], Response::HTTP_OK);
    }
}
