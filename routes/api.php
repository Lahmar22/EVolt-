<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConnectorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\ReservationController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/user', [DashboardController::class, 'index']);
    Route::apiResource('connector', ConnectorController::class);
    Route::apiResource('station', StationController::class);
    Route::apiResource('reservation', ReservationController::class);
});

Route::apiResource('user', DashboardController::class);
