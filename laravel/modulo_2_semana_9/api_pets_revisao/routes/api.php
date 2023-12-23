<?php

use App\Http\Controllers\RaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('races', [RaceController::class, 'store']);
Route::get('races', [RaceController::class, 'index']);

Route::post('species', [RaceController::class, 'store']);
Route::get('species', [RaceController::class, 'index']);
