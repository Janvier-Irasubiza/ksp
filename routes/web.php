<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\MyTalentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('login');
});

Route::get('/apply', [ApplicationsController::class, 'apply'])->name('apply');
Route::post('/submit_app', [ApplicationsController::class, 'submit_app'])->name('submit-app');
Route::get('/success', [ApplicationsController::class, 'applied'])->name('applied');
Route::get('/bscholarz', function() {
    return redirect()->away('https://www.bscholarz.com');
})->name('bscholarz');

Route::get('/ksp', function() {
    return redirect()->away('https://ksp.rw/');
})->name('ksp');

Route::prefix('admin')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/agents', [AdminController::class, 'agents'])->middleware(['auth', 'verified'])->name('agents');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('mytalent')->group(function () {
    Route::get('apply', [MyTalentController::class, 'apply_form'])->name('mytalent.apply');
});

require __DIR__.'/auth.php';
