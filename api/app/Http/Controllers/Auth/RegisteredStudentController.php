<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredStudentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'sexe' => ['required', 'string', 'in:masculin,féminin', 'max:15'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'date_naissance' => ['required', 'date'],  
            'lieu_naissance' => ['required', 'string', 'max:255'],  
            'adresse' => ['required', 'string', 'max:255'],  
            'telephone' => ['nullable', 'string', 'max:255'],  
            'email' => ['nullable', 'string','email', 'max:255', 'unique:' . User::class],
        ]);
        
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'user_name' => strtolower(trim($request->nom)) . strtolower(trim($request->nom)) . substr(time(), -4),
            'sexe' => $request->sexe,
            'password' => Hash::make($request->password),
            'email' => $request->email ? $request->email : null ,
            'telephone' => $request->telephone ? $request->telephone : null ,
        ]);

        $eleve = Eleve::create([
            'user_id' => $user->id,
            'date_naissance' => $request->date_naissance,
            'lieu_naissance' => $request->lieu_naissance,
            'adresse' => $request->adresse,
        ]);

        $eleveWithUser = Eleve::with('user')->find($eleve->id);
        
        // Return a response with the created user
        return response()->json([
            'user' => $eleveWithUser,
            'message' => 'Compte créé avec succès',
            'success'=>true
        ], 201);
    }
}
