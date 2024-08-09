<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Salle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SalleClasseController extends Controller
{
    public function linkSalleToClasse(Request $request): JsonResponse
    {
        $request->validate([
            'class_id' => ['numeric', 'required'],
            'salle_id' => ['numeric', 'required'],
        ]);

        // Retrieve the Classe and Salle models using `find`
        $classe = Classe::find($request->class_id);
        if (!$classe) {
            return response()->json(['message' => 'Classe introuvable'], Response::HTTP_NOT_FOUND);
        }

        $salle = Salle::find($request->salle_id);
        if (!$salle) {
            return response()->json(['message' => 'Salle introuvable'], Response::HTTP_NOT_FOUND);
        }

        // Ensure that attach method is defined in the Classe model
        $classe->salles()->attach($salle->id);

        return response()->json(['message' => 'Ajout effectué avec succès'], Response::HTTP_OK);
    }
}
