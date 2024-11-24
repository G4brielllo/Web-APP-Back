<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EstimationController;
use App\Http\Controllers\UserController;


Route::post('/register',[AuthenticationController::class, 'register']);
Route::post('/login',[AuthenticationController::class, 'login']);
Route::post('/logout',[AuthenticationController::class, 'logout']);

Route::get('/clients', [ClientController::class, 'index']);
Route::get('/clients/{id}', [ClientController::class, 'show']);
Route::post('/clients', [ClientController::class, 'store']);
Route::put('/clients/{id}', [ClientController::class, 'update']);
Route::delete('/clients/{id}', [ClientController::class, 'delete']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::put('/projects/{id}', [ProjectController::class, 'update']);
Route::delete('/projects/{id}', [ProjectController::class, 'delete']);

Route::get('/estimations', [EstimationController::class, 'index']);
Route::get('/estimations/{id}', [EstimationController::class, 'show']);
Route::post('/estimations', [EstimationController::class, 'store']);
Route::put('/estimations/{id}', [EstimationController::class, 'update']);
Route::delete('/estimations/{id}', [EstimationController::class, 'delete']);

Route::get('/users', [UserController::class,'index']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);




Route::get('/', function () {
    return view('welcome');
});
