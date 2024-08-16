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

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('tuteurs', TuteurController::class)
    ->only(['index', 'show', 'update']);
    // ->middleware(['isauth']);

Route::apiResource('admins', AdminController::class) 
    ->only(['index', 'show', 'update'])
    ->middleware(['isauth']);


Route::apiResource('annee_scolaires', AnneeScolaireController::class)
    ->only(['index','store','show', 'update'])
    ->middleware(['isauth']);


Route::apiResource('classes', ClasseController::class)
    ->only(['index','store','show', 'update'])
    ->middleware(['isauth']);

Route::apiResource('salles', SalleController::class)
    ->only(['index','store','show', 'update'])
    ->middleware(['isauth']);

Route::post('users/{id}/toggleStatus', [ToggleStatus::class, 'toggleUserStatus'])
    ->middleware(['isauth','can.togglestatus']);

Route::post('salles/linksalletoclasse', [SalleClasseController::class, 'linkSalleToClasse'])
    ->middleware(['isauth','can.linksalletoclasse']);;

Route::apiResource('eleve', EleveController::class)
    ->middleware(['isauth']);

Route::apiResource('note', NoteController::class)
    ->middleware(['isauth']);

Route::apiResource('matiere', MatiereController::class)
    ->middleware(['isauth']);

Route::apiResource('absence', AbsenceController::class)
    ->middleware(['isauth']);

require __DIR__.'/auth.php';
