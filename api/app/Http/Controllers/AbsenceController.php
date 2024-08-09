<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absences = Absence::with(['matiere', 'classe'])->get();

        return view('absences.index', compact('absences'));
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
            'matiere_id' => 'required|exists:matieres,id',
            'classe_id' => 'required|exists:classes,id',
            'date' => 'required|date',
        ]);

        $absence = Absence::create([
            'matiere_id' => $request->matiere_id,
            'classe_id' => $request->classe_id,
            'date' => $request->date,
        ]);

        return response()->json("Un absence a été ajouté avec succès");
    }

    /**
     * Display the specified resource.
     */
    
    public function show(string $id)
    {
        $absence = Absence::with(['matiere', 'classe'])->findOrFail($id);

        return view('absences.show', compact('absence'));
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
            'matiere_id' => 'required|exists:matieres,id',
            'classe_id' => 'required|exists:classes,id',
            'date' => 'required|date',
        ]);

        $absence = Absence::create([
            'matiere_id' => $request->matiere_id,
            'classe_id' => $request->classe_id,
            'date' => $request->date,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
