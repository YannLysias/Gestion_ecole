<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SalleClasseController extends Controller
{
    public function linkSalleToClasse(Request $request){
        $request->validate([
            'class_id'=>["numeric","required"],
            'salle_id'=>["numeric","required"]
        ]);

        $classe = Classe::where('id',$request->class_id)->get();
        if ($classe == null) {
            return response()->json(["message"=>"classe introuvable"],Response::HTTP_NOT_FOUND);
        }

        $salle = Salle::where('id',$request->salle_id)->get();
        if ($salle == null) {
            return response()->json(["message"=>"Salle introuvable"],Response::HTTP_NOT_FOUND);
        }

        return response()->json(['message' => 'Ajout effectue avec success'], Response::HTTP_OK);

    }
}
