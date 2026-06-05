<?php

// calvin & hans & yensen

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\HistoryController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('recommendations.index');
    }

    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::get('/recommendations', [RecommendationController::class, 'index'])->name('recommendations.index');
    Route::get('/recommendations/create', [RecommendationController::class, 'create'])->name('recommendations.create');
    Route::post('/recommendations', [RecommendationController::class, 'store'])->name('recommendations.store');
    Route::get('/premium', [PremiumController::class, 'index'])->name('premium.index');
    Route::get('/premium/create', [PremiumController::class, 'create'])->name('premium.create');
    Route::post('/premium', [PremiumController::class, 'store'])->name('premium.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
}); 

Route::middleware(['auth'])->group(function () {
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
});