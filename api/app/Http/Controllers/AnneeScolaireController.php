<?php

namespace App\Http\Controllers;

use App\Models\Annee_scolaire;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnneeScolaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        //TODO
        /**
         * request to get all parent with there childreen and there user info
         */

        $annee_scolaires = Annee_scolaire::all();
         
         return response()->json(["annee_scolaires"=>$annee_scolaires],200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'annee' => ['required', 'string', 'max:30'],
            'type' => ['required', 'string', 'in:semestriel,trimestriel', 'max:20'],
        ]);

        $annee_scolaire = Annee_scolaire::create([
            'annee' => $request->annee,
            'type' => $request->type,
        ]);

        return response()->json([
            'annee' => $annee_scolaire,
            'message' => 'Nouvelle annee scolaire',
            'success'=>true
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):JsonResponse
    {
        //TODO
         /**
         * request to get a single parent with his childreen and  user info
         */
        $annee_scolaire = Annee_scolaire::where('id',$id)->get();

        if ($annee_scolaire == null) {
            return response()->json(["message"=>"Annee scolaire introuvable"],Response::HTTP_NOT_FOUND);
        }

        return response()->json(["anne_scolaire"=>$annee_scolaire],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):JsonResponse
    {
        //TODO
        $request->validate([
            'annee' => ['required', 'string', 'max:30'],
            'type' => ['required', 'string', 'in:semestriel,trimestriel', 'max:20'],
        ]);


        $affectedRow = Annee_scolaire::where('id',$id)->update([
            'annee' => $request->annee,
            'type' => $request->type,
        ]);

        if ($affectedRow === 0) {
            return response()->json(["message"=>"Annee scolaire introuvable"],Response::HTTP_NOT_FOUND);
        }

        return response()->json(['message' => 'Annee scolaire mise a jour avec succes.'], Response::HTTP_OK); 
    }

}
