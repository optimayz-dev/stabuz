<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login_process');
Route::middleware('auth')->group(function (){
    Route::get('/', [DashboardController::class, 'show'])->name('dashboard');
});
