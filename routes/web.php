<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login'])->name('login');


Route::middleware(['auth', 'cekLevel:superadmin,admin'])->group(function(){


    Route::get('/dashboard', [dashboardController::class, 'index']);

    Route::get('/logout', [AuthController::class, 'logout']);


});





