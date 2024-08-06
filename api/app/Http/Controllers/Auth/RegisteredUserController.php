<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
            'role' => ['required', 'string', 'in:admin,tuteur', 'max:15'],
            'email' => ['string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'user_name' => strtolower(trim($request->nom)) . strtolower(trim($request->nom)) . substr(time(), -4),
            'sexe' => $request->sexe,
            'telephone' => $request->telephone,
            'sexe' => $request->sexe,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
        ]);

        if ($request->role == 'admin') {
            $Utilisateur = Utilisateur::create([
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


        event(new Registered($user));

        // Return a response with the created user
        return response()->json([
            'user' => $user,
            'message' => 'Compte créé avec succès'
        ], 201);
    }
}
