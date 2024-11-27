<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\JobBoardController;
use App\Http\Controllers\JobController;

use Illuminate\Support\Facades\Route;

// Welcome routes
Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
Route::get('/about', [WelcomeController::class, 'about'])->name('welcome.about');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('welcome.contact');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Jobs
Route::get('/jobs', [JobController::class, 'index'])->middleware(['auth', 'verified'])->name('job.index');
Route::get('/jobs/v/{job}', [JobController::class, 'show'])->name('job.show');

Route::get('/jobs/v/{job}/edit', [JobController::class, 'edit'])->middleware(['auth', 'verified'])->name('job.edit');
Route::patch('/jobs/v/{job}/edit', [JobController::class, 'update'])->middleware(['auth', 'verified'])->name('job.update');

Route::get('/jobs/create', [JobController::class, 'create'])->middleware(['auth', 'verified'])->name('job.create');
Route::post('/jobs/create/store', [JobController::class, 'store'])->middleware(['auth', 'verified'])->name('job.store');

// Job Boards
Route::get('/boards', [JobBoardController::class, 'index'])->middleware(['auth', 'verified'])->name('job_board.index');
Route::get('/boards/v/{job_board}', [JobBoardController::class, 'show'])->name('job_board.show');
Route::get('/boards/{job_board}/edit', [JobBoardController::class, 'edit'])->middleware(['auth', 'verified'])->name('job_board.edit');

Route::get('/boards/create', [JobBoardController::class, 'create'])->middleware(['auth', 'verified'])->name('job_board.create');
Route::post('/boards/create/store', [JobBoardController::class, 'store'])->middleware(['auth', 'verified'])->name('job_board.store');

Route::delete('/boards/{job_board}', [JobBoardController::class, 'destroy'])->middleware(['auth', 'verified'])->name('job_board.destroy');

require __DIR__.'/auth.php';
