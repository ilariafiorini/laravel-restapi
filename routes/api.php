<?php

use App\Http\Controllers\DoNothingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//http://localhost:8000/api

//POST http://localhost:8000/api/users
Route::post('/users', [UserController::class, 'create']);
//DELETE http://localhost:8000/api/users/7 
Route::delete('/users/{id}', [UserController::class, 'delete']);
//GET http://localhost:8000/api/users/3
Route::get('/users/{id}', [UserController::class, 'read']);
//GET http://localhost:8000/api/users
Route::get('/users', [UserController::class, 'readAll']);
//PUT http://localhost:8000/api/users/22
Route::put('/users/{id}', [UserController::class, 'update']);

//GET http://localhost:8000/api/errore-di-prova
Route::get('/errore-di-prova', [DoNothingController::class, 'doNothing']);


//POST http://localhost:8000/api/reviews
Route::post('/reviews', [ReviewController::class, 'create']);
//DELETE http://localhost:8000/api/reviews/7 
Route::delete('/reviews/{id}', [ReviewController::class, 'delete']);
//GET http://localhost:8000/api/reviews/3
Route::get('/reviews/{id}', [ReviewController::class, 'read']);
//GET http://localhost:8000/api/reviews
Route::get('/reviews', [ReviewController::class, 'readAll']);
//PUT http://localhost:8000/api/reviews/22
Route::put('/reviews/{id}', [ReviewController::class, 'update']);


//POST http://localhost:8000/api/cars
Route::post('/cars', [CarController::class, 'create']);
//DELETE http://localhost:8000/api/cars/7 
Route::delete('/cars/{id}', [CarController::class, 'delete']);
//GET http://localhost:8000/api/cars/3
Route::get('/cars/{id}', [CarController::class, 'read']);
//GET http://localhost:8000/api/cars
Route::get('/cars', [CarController::class, 'readAll']);
//PUT http://localhost:8000/api/cars/22
Route::put('/cars/{id}', [CarController::class, 'update']);



//POST http://localhost:8000/api/verifications
Route::post('/verifications', [VerificationController::class, 'create']);
//DELETE http://localhost:8000/api/verifications/7 
Route::delete('/verifications/{id}', [VerificationController::class, 'delete']);
//GET http://localhost:8000/api/verifications/3
Route::get('/verifications/{id}', [VerificationController::class, 'read']);
//GET http://localhost:8000/api/verifications
Route::get('/verifications', [VerificationController::class, 'readAll']);
//PUT http://localhost:8000/api/verifications/22
Route::put('/verifications/{id}', [VerificationController::class, 'update']);