<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnboardingController;

Route::get('/', function () {
    return view('welcome');
});

// Rotas de ONBOARDING (acessíveis com login mas sem onboarding completo)
Route::middleware(['auth'])->group(function () {
    Route::get('/onboarding', [OnboardingController::class, 'show'])->name('onboarding.show');
    Route::post('/onboarding', [OnboardingController::class, 'store'])->name('onboarding.store');
});

// Rotas PROTEGIDAS (exigem login + email verificado + onboarding completo)
Route::middleware(['auth', 'verified', 'onboarding'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Adicione aqui TODAS as outras rotas protegidas do sistema
});

// Rotas de autenticação (importadas do auth.php)
require __DIR__.'/auth.php';
