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
    Route::apiResource('user', DashboardController::class);
    Route::get('/stations', [StationController::class, 'index']);
    
    Route::apiResource('reservation', ReservationController::class);
});

Route::middleware('auth:sanctum', 'admin')->group(function () {
    Route::apiResource('connector', ConnectorController::class);
    Route::apiResource('station', StationController::class);
});


