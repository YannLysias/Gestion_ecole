<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClasseController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        //TODO

        $classes = Classe::all();
         
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
            'effectif' => ['required', 'numeric', 'min:1', 'max:255'],
        ]);

        $classe = Classe::create([
            'nom' => $request->nom,
            'effectif' => $request->effectif,
        ]);

        return response()->json([
            'classe' => $classe,
            'message' => 'Nouvelle classe',
            'success'=>true
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):JsonResponse
    {
        //TODO

        $classe = Classe::with('salles')->find($id);

        if ($classe == null) {
            return response()->json(["message"=>"classe introuvable"],Response::HTTP_NOT_FOUND);
        }

        return response()->json(["classe"=>$classe],200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):JSONResponse
    {
        //TODO
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'effectif' => ['required', 'numeric','min:1','max:255']
        ]);

        $affectedRow = Classe::where('id',$id)->update([
            'nom' => $request->nom,
            'effectif' => $request->effectif,
        ]);

        if ($affectedRow === 0) {
            return response()->json(["message"=>"No classe found with the specified ID"],Response::HTTP_NOT_FOUND);
        }

        return response()->json(['message' => 'Classe info updated successfully.'], Response::HTTP_OK); 
    }


}
