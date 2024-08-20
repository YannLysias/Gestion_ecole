<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matieres = Matiere::all();

        return view('matiere', [
            'matieres' => $matieres,
        ]);
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
            'libelle'=> 'required'
        ]);

        $matiere = Matiere::create([
            'libelle' => $request->libelle,
        ]);

        return response()->json(['success', 'Matiere créé avec succès'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            'libelle'=> 'required'
        ]);

        $matiere = Matiere::where('id', (int) $id)->first();

        $matiere -> libelle = $request -> libelle;

        $matiere->save();

        return response()->json(['success', 'Mofication effectué avec succès'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matiere = Matiere::findOrFail($id);
        $matiere->delete();

        return redirect()->back()->with('success', 'Matière supprimé avec succès.');
    }
}
