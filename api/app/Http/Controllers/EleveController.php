<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required',
            'edumaster' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required',
            'adresse' => 'required',
            'statut' => 'required',
            'classe_id' => 'required|exists:classes,id',
            'tuteur_id' => 'required|exists:tuteurs,id',
            'photo' => 'nullable|image',
        ]);

        $path_photo = Storage::putFile('public/photos', $request->photo);
        $path_photo_convert_to_table = explode('/', $path_photo);
        if($request->has('photo'))
        {
            $path_photo = Storage::putFile('public/photos', $request->photo);
            $path_photo_convert_to_table = explode('/', $path_photo);
        }

        $eleve = Eleve::create([
            'matricule' => $request->matricule,
            'edumaster' => $request->edumaster,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'date_naissance' => $request->date_naissance,
            'lieu_naissance' => $request->lieu_naissance,
            'adresse' => $request->adresse,
            'statut' => $request->statut,
            'photo' => $path_photo_convert_to_table ? $path_photo_convert_to_table[2] : null,
            'classe_id' => $request->classe_id,
            'tuteur_id' => $request->tuteur_id,
        ]);

        return response()->json('Compte éleve créé avec succès', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Eleve::findOrFail($id);

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'matricule' => 'required',
            'edumaster' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required',
            'adresse' => 'required',
            'statut' => 'required',
            'classe_id' => 'required|exists:classes,id',
            'tuteur_id' => 'required|exists:tuteurs,id',
            'photo' => 'nullable|image',
        ]);

        $path_photo = Storage::putFile('public/photos', $request->photo);
        $path_photo_convert_to_table = explode('/', $path_photo);
        if($request->has('photo'))
        {
            $path_photo = Storage::putFile('public/photos', $request->photo);
            $path_photo_convert_to_table = explode('/', $path_photo);
        }

        $eleve = Eleve::where('id', (int) $id)->first();

            $eleve ->matricule = $request->nom;
            $eleve ->edumaster= $request->edumaster;
            $eleve ->nom= $request->nom;
            $eleve ->prenom= $request->prenom;
            $eleve ->sexe= $request->sexe;
            $eleve ->date_naissance= $request->date_naissance;
            $eleve ->lieu_naissance= $request->lieu_naissance;
            $eleve ->adresse= $request->adresse;
            $eleve ->statut= $request->statut;
            $eleve ->classe_id= $request->classe_id;
            $eleve ->tuteur_id= $request->tuteur_id;
            $eleve->photo = $request->photo ? $request->photo : null;

            $eleve->save();

            return response()->json('Modification effectué avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
