<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\BoardroomController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('boardrooms', [BoardroomController::class, 'index']);
Route::get('date', [BoardroomController::class, 'getDate']);
Route::get('reservation/all', [BoardroomController::class, 'getAllReservations']);
Route::get('reservation/{date}', [BoardroomController::class, 'getAllReservationsOfDate']);