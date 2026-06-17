<?php

// James,Calvin,Hans,Andreas & yensen

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\LyricsController;
use App\Http\Controllers\DiscoveryController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\FavoriteController;

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
    Route::get('/lyrics', [LyricsController::class, 'index'])->name('lyrics.index');
    Route::get('/lyrics/{song}', [LyricsController::class, 'show'])->name('lyrics.show');
    Route::get('/discovery', [DiscoveryController::class, 'index'])->name('discovery.index');
    Route::get('/premiums', [PremiumController::class, 'index'])->name('premium.index');
    Route::get('/premiums/create', [PremiumController::class, 'create'])->name('premium.create');
    Route::post('/premiums', [PremiumController::class, 'store'])->name('premium.store');
    Route::put('/premiums/{premium}', [PremiumController::class, 'update'])->name('premium.update');
    Route::delete('/premiums/{premium}', [PremiumController::class, 'destroy'])->name('premium.destroy');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorite.index');
    Route::get('/search', [RecommendationController::class, 'search'])->name('search.index');
    Route::post('/favorite/toggle', [FavoriteController::class, 'toggle'])->name('favorite.toggle');
    Route::get('/profile', function () {
        return view('auth.profile');
    })->name('profile');
    Route::post('/profile', [AuthController::class, 'profile'])->name('profile.update');
}); 

Route::middleware(['auth'])->group(function () {
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
});