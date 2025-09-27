<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/memo', [MemoController::class, 'index'])->name('memo.index')->middleware('auth');
// Route::get('/memo/create', [MemoController::class, 'create'])->name('memo.create')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () { return view('dashboard'); })->name('home');
    Route::get('/memo', [MemoController::class, 'index'])->name('memo.index');
    Route::get('/memo/create', [MemoController::class, 'create'])->name('memo.create');
    Route::post('/memo', [MemoController::class, 'store'])->name('memo.store');
});

require __DIR__.'/auth.php';
