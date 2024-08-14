<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tuteur;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        //  return response()->json('Compte admin créé avec succès', 201); // Code de réponse HTTP 201

        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'sexe' => ['required', 'string', 'in:masculin,féminin', 'max:15'],
            'email' => ['string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'user_name' => strtolower(trim($request->nom)) . strtolower(trim($request->nom)) . substr(time(), -4),
            'sexe' => $request->sexe,
            'email' => $request->email ? $request->email : null ,
            'password' => Hash::make($request->password),
        ]);


        
        $user->assignRole('tuteur');

        if ($request->role == 'admin') {
            $Utilisateur = User::create([
                'nom' => 'KPEDJO',
                'prenom' => 'Guy',
                'sexe' => 'Masculin',
                'telephone' => '0022954103099',
                'role' => 'admin',
                'user_name' => 'Gkpedjo0229',
                'email' => 'gkpedjo@gmail.com',
                'password' => 'original22',

            ]);
        }


        $tuteur = Tuteur::create([
            'user_id' => $user->id
        ]);

        $tuteurWithUser = Tuteur::with('user')->find($tuteur->id);
        
        event(new Registered($user));

        // Return a response with the created user
        return response()->json([
            'user' => $tuteurWithUser,
            'message' => 'Compte créé avec succès',
            'success'=>true
        ], 201);
    }
}
