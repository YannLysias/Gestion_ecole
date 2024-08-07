<?php

use App\Http\Controllers\Auth\AuthenticatedUserController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

 

require __DIR__.'/auth.php';
 