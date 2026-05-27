<?php
// calvin

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}); 

use App\Http\Controllers\RecommendationController;

Route::get('/recommendations', [RecommendationController::class, 'index']);
