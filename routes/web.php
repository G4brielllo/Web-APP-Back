<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EstimationController;

Route::get('/clients', [ClientController::class, 'index']);

Route::get('/projects', [ProjectController::class, 'index']);
  
Route::get('/estimations', [EstimationController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
