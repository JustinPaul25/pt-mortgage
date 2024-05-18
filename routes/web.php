<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DealStageController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'leads'], function () {
        Route::get('/', [LeadsController::class, 'index'])->name('leads');
        Route::get('/list', [LeadsController::class, 'list'])->name('leads.list');
    });

    Route::group(['prefix' => 'deal-stage'], function () {
        Route::get('/', [DealStageController::class, 'index'])->name('deal_stage');
        Route::get('/list', [DealStageController::class, 'list'])->name('deal_stage.list');
    });
});

require __DIR__.'/auth.php';
