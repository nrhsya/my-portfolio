<?php

use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [PortfolioController::class, 'index']);

// display all experiences
// Route::get('/', [ExperienceController::class, 'index'])->name('experiences');

// display all projects
// Route::get('/', [ProjectController::class, 'index'])->name('projects');

// ****************************************************************
// ADMIN VIEW
// ****************************************************************
