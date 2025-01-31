<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\pegawaiController;
use App\Http\Controllers\suplierController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login'])->name('login');


Route::middleware(['auth', 'cekLevel:superadmin,admin'])->group(function(){


    Route::get('/dashboard', [dashboardController::class, 'index']);

    Route::get('/logout', [AuthController::class, 'logout']);


    /**
     * Ini routing pegawai
     */

    Route::controller(pegawaiController::class)->group(function(){

        Route::get('/pegawai', 'index');

        Route::post('/pegawai/add', 'store')->name('addPegawai');

        Route::get('pegawai/edit/{id}', 'edit');
        Route::post('pegawai/edit/{id}', 'update'); 

        Route::get('/pegawai/delete/{id}', 'destroy'); //ketik baris ini

    });


    /**
     * Ini routing Stok
     */






    /**
     * Ini routing Barang Masuk
     */





    /**
     * Ini routing Barang Keluar
     */






    /**
     * Ini routing Pelanggan
     */




    /**
     * Ini routing Suplier
     */
    Route::controller(suplierController::class)->group(function(){
        
        Route::get('/suplier', 'index');
        
        Route::get('/suplier/add', 'create');
        Route::post('/suplier/add', 'store');
        
        Route::get('/suplier/edit/{id}', 'edit');
        Route::post('/suplier/edit/{id}', 'update');
        
        Route::get('/suplier/{id}', 'destroy');
        

    });


});





