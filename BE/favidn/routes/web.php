<?php
/*
 * Copyright (c) 2025.
 * Author : AlexistDev
 * Email : alexistdev@gmail.com
 * Github: https://github.com/alexistdev
 */

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
