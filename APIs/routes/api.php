<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::post('/posts', [PostController::class, 'create']);
Route::get('/posts', [PostController::class, 'list']);
Route::get('/posts/{id}', [PostController::class, 'view']);
Route::put('/posts/{id}', [PostController::class, 'update']); 
Route::delete('/posts/{id}', [PostController::class, 'delete']);