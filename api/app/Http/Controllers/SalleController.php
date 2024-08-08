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
    public function index():JsonResponse
    {
        //TODO

        $classes = Salle::with('classes')->get();
         
         return response()->json(["classes"=>$classes],200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):JsonResponse
    {
        //TODO
        $request->validate([
            'nom' => ['required', 'string', 'max:30'],
        ]);

        $salle = Salle::create([
            'nom' => $request->nom,
        ]);

        return response()->json([
            'salle' => $salle,
            'message' => 'Nouvelle salle creer',
            'success'=>true
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //TODO
        
        $salle = Salle::with('classes')->find($id);

        if ($salle == null) {
            return response()->json(["message"=>"Salle introuvable"],Response::HTTP_NOT_FOUND);
        }

        return response()->json(["salle"=>$salle],200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):JSONResponse
    {
        //TODO
        $request->validate([
            'nom' => ['required', 'string', 'max:30'],
        ]);

        $affectedRow = Salle::where('id',$id)->update([
            'nom' => $request->nom,
        ]);

        if ($affectedRow === 0) {
            return response()->json(["message"=>"Salle introuvable"],Response::HTTP_NOT_FOUND);
        }

        return response()->json(['message' => 'Salle mise a jour avec succes.'], Response::HTTP_OK); 
    }




}
