<?php

use App\Http\Controllers\Auth\AuthenticatedUserController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthenticatedUserController::class, 'store']);

Route::get('/logout', [AuthenticatedUserController::class, 'destroy'])
    ->middleware('auth:sanctum');

Route::get('/creer-admin', [UserController::class, 'creer_admin']);




require __DIR__.'/auth.php';
 