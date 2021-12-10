<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


// Route::resource('/users', UserController::class);

//public routes
Route::post('/register', [AuthController::class, 'register'] );
Route::post('/login', [AuthController::class, 'login'] );

Route::get('/users', [UserController::class, 'index'] );
Route::get('/users/{$id}', [UserController::class, 'show'] );
Route::get('/users/search/{name}', [UserController::class, 'search'] );


//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::post('/users', [UserController::class, 'store'] );
    Route::put('/users/{$id}', [UserController::class, 'update'] );
    Route::delete('/users/{$id}', [UserController::class, 'destroy'] );
    Route::post('/logout', [AuthController::class, 'logout'] );

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
