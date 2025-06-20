<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuanganController;

Route::post('/ruangan', [RuanganController::class, 'store']);
