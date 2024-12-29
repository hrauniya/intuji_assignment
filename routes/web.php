<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/users/register', [UserController::class, 'register']);
Route::post('/api/users/login', [UserController::class, 'login']);

