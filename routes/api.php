<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StatsController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication routes
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // User management
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::put('/auth/profile', [AuthController::class, 'updateProfile']);
    
    // Phases
    Route::apiResource('phases', PhaseController::class);
    Route::apiResource('themes', ThemeController::class);
    
    // Themes
    Route::get('/phases/{phaseId}/themes', [ThemeController::class, 'index']);
    // Route::get('/themes/{id}', [ThemeController::class, 'show']);
    // Route::post('/themes', [ThemeController::class, 'store']);
    // Route::put('/themes/{id}', [ThemeController::class, 'update']);
    // Route::delete('/themes/{id}', [ThemeController::class, 'destroy']);
    
    // Questions
    Route::get('/themes/{themeId}/questions', [QuestionController::class, 'index']);
    Route::post('/questions', [QuestionController::class, 'store']);
    Route::put('/questions/{id}', [QuestionController::class, 'update']);
    Route::delete('/questions/{id}', [QuestionController::class, 'destroy']);
    
    // Quiz
    Route::post('/submit-answers', [QuizController::class, 'submitAnswers']);
    Route::get('/user/progress', [QuizController::class, 'getUserProgress']);
    Route::post('/reset-progress', [QuizController::class, 'resetUserProgress']);
    
    // Statistics
    Route::get('/user/stats', [StatsController::class, 'getUserStats']);
    Route::get('/leaderboard', [StatsController::class, 'getLeaderboard']);
});