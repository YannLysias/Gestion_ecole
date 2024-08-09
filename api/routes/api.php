<?php

use App\Http\Controllers\Auth\AuthenticatedUserController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\MatiereController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('eleve', EleveController::class);
Route::apiResource('note', NoteController::class);
Route::apiResource('matiere', MatiereController::class);
Route::apiResource('absence', AbsenceController::class);


require __DIR__.'/auth.php';
