<?php

use Illuminate\Support\Facades\Route;

// for admin
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminDashboardController;

Route::prefix('admin')->name('admin.')->group(function(){
    Route::group(['middleware'=> 'admin.guest'], function(){
        Route::get('/index', [AdminAuthController::class,'index'])->name('index');
        Route::post('/index', [AdminAuthController::class,'authenticate'])->name('index.auth');
    });

    Route::group(['middleware'=> 'admin.auth'], function(){
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', [AdminAuthController::class,'logout'])->name('logout');
    });
});
