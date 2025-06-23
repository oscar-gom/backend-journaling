<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DailyTaskController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\HabitEntryController;
use App\Http\Controllers\MoodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Journal
Route::get('/journal', [JournalController::class, 'index'])->middleware('auth:sanctum');
Route::post('/journal/store', [JournalController::class, 'store'])->middleware('auth:sanctum');
Route::get('/journal/{id}', [JournalController::class, 'show'])->middleware('auth:sanctum');
Route::put('/journal/update/{journal}', [JournalController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/journal/destroy/{journal}', [JournalController::class, 'destroy'])->middleware('auth:sanctum');

// DailyTaskController
Route::get('/daily-task', [DailyTaskController::class, 'index'])->middleware('auth:sanctum');
Route::post('/daily-task/store', [DailyTaskController::class, 'store'])->middleware('auth:sanctum');
Route::get('/daily-task/{id}', [DailyTaskController::class, 'show'])->middleware('auth:sanctum');
Route::put('/daily-task/update/{daily_task}', [DailyTaskController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/daily-task/destroy/{daily_task}', [DailyTaskController::class, 'destroy'])->middleware('auth:sanctum');

// HabitController
Route::get('/habit', [HabitController::class, 'index'])->middleware('auth:sanctum');
Route::post('/habit/store', [HabitController::class, 'store'])->middleware('auth:sanctum');
Route::get('/habit/{id}', [HabitController::class, 'show'])->middleware('auth:sanctum');
Route::put('/habit/update/{habit}', [HabitController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/habit/destroy/{habit}', [HabitController::class, 'destroy'])->middleware('auth:sanctum');

// HabitEntryController
Route::get('/habit-entry', [HabitEntryController::class, 'index'])->middleware('auth:sanctum');
Route::post('/habit-entry/store', [HabitEntryController::class, 'store'])->middleware('auth:sanctum');
Route::get('/habit-entry/{id}', [HabitEntryController::class, 'show'])->middleware('auth:sanctum');
Route::put('/habit-entry/update/{habit_entry}', [HabitEntryController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/habit-entry/destroy/{habit_entry}', [HabitEntryController::class, 'destroy'])->middleware('auth:sanctum');

// MoodController
Route::get('/mood', [MoodController::class, 'index'])->middleware('auth:sanctum');
Route::post('/mood/store', [MoodController::class, 'store'])->middleware('auth:sanctum');
Route::get('/mood/{id}', [MoodController::class, 'show'])->middleware('auth:sanctum');
Route::put('/mood/update/{mood}', [MoodController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/mood/destroy/{mood}', [MoodController::class, 'destroy'])->middleware('auth:sanctum');
