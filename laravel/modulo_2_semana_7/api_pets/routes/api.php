<?php

use App\Http\Controllers\PetController;
use App\Http\Controllers\RaceController;
use Illuminate\Support\Facades\Route;

Route::get('pets', [PetController::class, 'index']);
Route::post('pets', [PetController::class, 'store']);
Route::delete('pets/{id}', [PetController::class, 'destroy']);
Route::get('pets/{id}', [PetController::class, 'show']);
Route::put('pets/{id}', [PetController::class, 'update']);


Route::get('races', [RaceController::class, 'index']);
Route::post('races', [RaceController::class, 'store']);



