<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\SalleClasseController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\ToggleStatus;
use App\Http\Controllers\TuteurController;
use App\Http\Controllers\UserController;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('tuteurs', TuteurController::class)
    ->only(['index', 'show', 'update']);

Route::apiResource('admin', AdminController::class) 
    ->only(['index', 'show', 'update']);

Route::apiResource('annee_scolaire', AnneeScolaireController::class)
    ->only(['index','store','show', 'update']);

Route::apiResource('classe', ClasseController::class)
    ->only(['index','store','show', 'update']);

Route::apiResource('classe', SalleController::class)
    ->only(['index','store','show', 'update']);

Route::post('users/toggleStatus/{id}', [ToggleStatus::class, 'toggleUserStatus']);

Route::post('salle/linksalletoclasse', [SalleClasseController::class, 'linkSalleToClasse']);

require __DIR__ . '/auth.php';
