<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkApiToken;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;


Route::post('/users/register', [UserController::class, 'register']);
Route::post('/users/login', [UserController::class, 'login']);

Route::middleware('checkApiToken')->group(function () {
    Route::post('/posts',[PostController::class,'create']);
    Route::get('/posts',[PostController::class,'index']);
    Route::get('/posts/{id}',[PostController::class,'show']);
    Route::post('/posts/{id}/comments',[CommentController::class,'createComment']);
    Route::get('/posts/{id}/comments',[CommentController::class,'showComments']);
    Route::post('/posts/{id}/images', [PostController::class, 'uploadImage']);
});

