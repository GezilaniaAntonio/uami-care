<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

Route::middleware('auth')->name('admin.')->group(function () {

    //start painel de controlo (dashborad) routes  
    Route::get('/painel-controlo', [DashboardController::class, 'index'])->name('dasboard');
    //end painel de controlo (dashborad) routes 

    //start Utilizador (user) Routes
    Route::prefix('utilizador')->group(function () {
        Route::get('listar', [UserController::class, 'index'])->name('users.index');
        Route::get('criar', [UserController::class, 'create'])->name('users.create');
    });
    //end Utilizador (user) Routes

});
