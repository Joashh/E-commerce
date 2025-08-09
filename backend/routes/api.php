<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CartController;

Route::post('/cart', [CartController::class, 'store']);
Route::post('/post', [PostController::class, 'store']);
Route::get('/products', [PostController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/display/{id}', [UserController::class, 'display']);

Route::get('/topitems', [PostController::class, 'productOrder']);
Route::get('/cart', [CartController::class, 'index']);
