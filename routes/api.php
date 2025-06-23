<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\UserController;

Route::post('/ruangan', [RuanganController::class, 'store']);
Route::post('/user/', [UserController::class, 'store']);
Route::get('/user/list', [UserController::class, 'show']);
