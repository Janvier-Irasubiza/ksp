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

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/agents', [AdminController::class, 'agents'])->middleware(['auth', 'verified'])->name('agents');
Route::get('/edu-apps', [AdminController::class, 'edu_apps'])->middleware(['auth', 'verified'])->name('edu-apps');
Route::get('/ksp-apps', [AdminController::class, 'ksp_apps'])->middleware(['auth', 'verified'])->name('admin.edu-apps');
Route::get('/mytalent', [AdminController::class, 'mytalent'])->middleware(['auth', 'verified'])->name('mytalent');
Route::get('/mytalent-apps', [AdminController::class, 'mytalent_apps'])->middleware(['auth', 'verified'])->name('admin.mytalent');
Route::get('/mytalent-apply', [MyTalentController::class, 'mytalent_apply'])->middleware(['auth', 'verified'])->name('mytalent-apply');
Route::get('/my-apps', [AdminController::class, 'my_apps'])->middleware(['auth', 'verified'])->name('my-apps');
Route::post('/mytalent-submit-app', [MyTalentController::class, 'mytalent_submit_app'])->middleware(['auth', 'verified'])->name('mytalent-submit-app');
Route::get('/app/{app}', [MyTalentController::class, 'app_info'])->middleware(['auth', 'verified'])->name('app');
Route::put('/mytalent/{id}', [MyTalentController::class, 'update'])->middleware(['auth', 'verified'])->name('mytalent.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('mytalent')->group(function () {
    Route::get('apply', [MyTalentController::class, 'apply_form'])->name('mytalent.apply');
});

Route::post('/send-email', 'App\Http\Controllers\Dev\SendEmailController@sendEmail')->name('send.email');

require __DIR__.'/auth.php';
