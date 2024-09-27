<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChessController;
use App\Http\Controllers\StringValueController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/problem-1', [ChessController::class, 'queensAttack']);
Route::get('/problem-2', [StringValueController::class, 'maxValue']);
