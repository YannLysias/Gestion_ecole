<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
            'sexe' => ['required', 'string','in:masculin,féminin' ,'max:15'],
            'role' => ['required', 'string','in:admin,eleve,parent' ,'max:15'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
        ]);


        event(new Registered($user));

        Auth::login($user);

        return response(['user'=>$user]);

        return response()->noContent();
    }
}
