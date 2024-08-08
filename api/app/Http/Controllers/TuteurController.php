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
    public function index():JsonResponse
    {
        //TODO
        /**
         * request to get all parent with there childreen and there user info
         */

        $tuteurs = Tuteur::with('users')->get();
         
         return response()->json(["tuteurs"=>$tuteurs],200);
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
        $user = Tuteur::with('users')->find($id);

        return response()->json(["user"=>$user],200);
    }

 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):JsonResponse
    {
        //TODO
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'sexe' => ['required', 'string', 'in:masculin,féminin', 'max:15'],
            'email' => ['string', 'lowercase', 'email', 'max:255', ]
        ]);

        $affectedRow = User::where('id',$id)->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'sexe' => $request->sexe,
            'email' => $request->email ? $request->email : null,
        ]);

        if ($affectedRow === 0) {
            return response()->json(["message"=>"No user found with the specified ID"],Response::HTTP_NOT_FOUND);
        }

        return response()->json(['message' => 'User updated successfully.'], Response::HTTP_OK); 
    }

}
