<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ServiceRequestController;

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

// News API Routes
Route::apiResource('news', NewsController::class);

// Services API Routes
Route::apiResource('services', ServiceController::class);

// Jobs API Routes
Route::apiResource('jobs', JobController::class);

// Contacts API Routes
Route::get('contacts', [ContactController::class, 'index']);
Route::post('contacts', [ContactController::class, 'store']);

// Service Requests API Routes
Route::prefix('service-requests')->group(function () {
    Route::get('/', [ServiceRequestController::class, 'index']);
    Route::post('/', [ServiceRequestController::class, 'store']);
    
    // لازم تيجي هنا قبل /{id}
    Route::get('/statistics', [ServiceRequestController::class, 'getStatistics']); 
    
    Route::get('/{id}', [ServiceRequestController::class, 'show']);
    Route::put('/{id}', [ServiceRequestController::class, 'update']);
    Route::delete('/{id}', [ServiceRequestController::class, 'destroy']);

    // Availability and options
    Route::post('/check-availability', [ServiceRequestController::class, 'checkAvailability']);
    Route::get('/available-time-slots', [ServiceRequestController::class, 'getAvailableTimeSlots']);
    Route::get('/options', [ServiceRequestController::class, 'getOptions']);
    
    // Status management
    Route::patch('/{id}/status', [ServiceRequestController::class, 'updateStatus']);
});
