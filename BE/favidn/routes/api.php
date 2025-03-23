<?php
/*
 * Copyright (c) 2025.
 * Author : AlexistDev
 * Email : alexistdev@gmail.com
 * Github: https://github.com/alexistdev
 */

use App\Http\Controllers\AUTH\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
