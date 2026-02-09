<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\InsuranceController;
use App\Http\Controllers\Admin\PlanController;

Route::middleware('auth')->name('admin.')->group(function () {

    //start painel de controlo (dashboard) routes
  Route::get('/painel-controlo', [DashboardController::class, 'index'])->name('dashboard');


    //end painel de controlo (dashborad) routes

    //start Utilizador (user) Routes
    Route::prefix('utilizador')->group(function () {
        Route::get('listar', [UserController::class, 'index'])->name('users.index');
        Route::get('criar', [UserController::class, 'create'])->name('users.create');
        Route::post('guardar', [UserController::class, 'store'])->name('users.store');
        Route::get('mostrar/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('editar/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('atualizar/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('eliminar/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    });
    //end Utilizador (user) Routes


    //start Seguradora (insurance) Routes
    Route::prefix('seguro')->group(function () {
        Route::get('listar', [InsuranceController::class, 'index'])->name('insurance.index');
        Route::get('criar', [InsuranceController::class, 'create'])->name('insurance.create');
        Route::post('guardar', [InsuranceController::class, 'store'])->name('insurance.store');
        Route::get('mostrar/{id}', [InsuranceController::class, 'show'])->name('insurance.show');
        Route::get('editar/{id}', [InsuranceController::class, 'edit'])->name('insurance.edit');
        Route::put('atualizar/{id}', [InsuranceController::class, 'update'])->name('insurance.update');
        Route::get('eliminar/{id}', [InsuranceController::class, 'destroy'])->name('insurance.destroy');

    });

    //end Seguradora (insurance) Routes

    //start Plano (plan) Routes
    Route::prefix('planos')->group(function () {
    Route::get('/listar', [PlanController::class, 'index'])->name('plans.index');
    Route::get('/planos/criar', [PlanController::class, 'create'])->name('plans.create');
    Route::post('/guardar', [PlanController::class, 'store'])->name('plans.store');
    Route::get('/mostrar/{id}', [PlanController::class, 'show'])->name('plans.show');
    Route::get('/editar/{plan}/editar', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('/atualizar/{id}', [PlanController::class, 'update'])->name('plans.update');
    Route::get('/eliminar/{id}', [PlanController::class, 'destroy'])->name('plans.destroy');
    });
    //end Plano (plan) Routes
});
