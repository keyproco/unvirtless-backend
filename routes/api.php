<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'name' => config('app.name'),
        'status' => 'ok',
    ]);
})->name('api.status');


// API v1
Route::prefix('v1')->group(function () {

    // Authentication
    Route::prefix('auth')->group(function () {
        // POST /api/v1/auth/register
        // POST /api/v1/auth/login
        // POST /api/v1/auth/logout
    });

    // Authenticated routes
    Route::middleware('auth:sanctum')->group(function () {

        // GET /api/v1/user
        Route::get('/user', function (Request $request) {
            return response()->json([
                'data' => $request->user(),
            ]);
        });

    });

});