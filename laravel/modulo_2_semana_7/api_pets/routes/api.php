<?php


use Illuminate\Support\Facades\Route;

Route::get('/pets', function(){
    return 'Olá Laravel';
});



/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
