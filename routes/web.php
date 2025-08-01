<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [NoticeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// Live Display Page
Route::get('/display', [NoticeController::class, 'display'])
    ->name('notices.display');

// Store new notice
Route::post('/notices', [NoticeController::class, 'store'])
    ->middleware(['auth'])
    ->name('notices.store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/notices', [NoticeController::class, 'store'])->name('notices.store');
});

require __DIR__.'/auth.php';
