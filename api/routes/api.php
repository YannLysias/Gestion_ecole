<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\SalleClasseController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\ToggleStatus;
use App\Http\Controllers\TuteurController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\MatiereController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('tuteurs', TuteurController::class)
    ->only(['index', 'show', 'update']);

Route::apiResource('admins', AdminController::class) 
    ->only(['index', 'show', 'update']);

Route::apiResource('annee_scolaires', AnneeScolaireController::class)
    ->only(['index','store','show', 'update']);

Route::apiResource('classes', ClasseController::class)
    ->only(['index','store','show', 'update']);

Route::apiResource('salles', SalleController::class)
    ->only(['index','store','show', 'update']);

Route::post('users/{id}/toggleStatus', [ToggleStatus::class, 'toggleUserStatus']);

Route::post('salles/linksalletoclasse', [SalleClasseController::class, 'linkSalleToClasse']);

Route::apiResource('eleve', EleveController::class);

Route::apiResource('note', NoteController::class);

Route::apiResource('matiere', MatiereController::class);

Route::apiResource('absence', AbsenceController::class);

require __DIR__.'/auth.php';
