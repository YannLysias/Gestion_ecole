<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function (Request $request) {
    return "bonjour";
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::apiResource('utilisateurs',UtilisateurController::class);
Route::get('/creer_admin',[UserController::class, 'creer_admin']);
