<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\MyTalentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailsController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

Route::get('/', function () {
    return to_route('login');
});

Route::get('img', function () {
    return view('components.mytalent-logo');
});

Route::get('/apply', [ApplicationsController::class, 'apply'])->name('apply');
Route::post('/submit_app', [ApplicationsController::class, 'submit_app'])->name('submit-app');
Route::get('/success', [ApplicationsController::class, 'applied'])->name('applied');
Route::get('/mt-success', [ApplicationsController::class, 'mt_applied'])->name('mt-applied');
Route::get('/bscholarz', function() {
    return redirect()->away('https://www.bscholarz.com');
})->name('bscholarz');

Route::get('/ksp', function() {
    return redirect()->away('https://ksp.rw/');
})->name('ksp');

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/agents', [AdminController::class, 'agents'])->middleware(['auth', 'verified'])->name('agents');
Route::get('/agent/{agt}', [AdminController::class, 'agent'])->middleware(['auth', 'verified'])->name('agent.info');
Route::get('/edu-apps', [AdminController::class, 'edu_apps'])->middleware(['auth', 'verified'])->name('edu-apps');
Route::get('/ksp-apps', [AdminController::class, 'ksp_apps'])->middleware(['auth', 'verified'])->name('admin.edu-apps');
Route::get('/mytalent', [AdminController::class, 'mytalent'])->middleware(['auth', 'verified'])->name('mytalent');

Route::get('/mytalent-apps', [AdminController::class, 'mytalent_apps'])->middleware(['auth', 'verified'])->name('admin.mytalent');
Route::get('/mytalent-apply', [MyTalentController::class, 'mytalent_apply'])->middleware(['auth', 'verified'])->name('mytalent-apply');
Route::get('/my-apps', [AdminController::class, 'my_apps'])->middleware(['auth', 'verified'])->name('my-apps');

Route::post('/mytalent-submit-app', [MyTalentController::class, 'mytalent_submit_app'])->name('mytalent-submit-app');
Route::get('/app/{app}', [MyTalentController::class, 'app_info'])->middleware(['auth', 'verified'])->name('app');
Route::put('/mytalent/{id}', [MyTalentController::class, 'update'])->middleware(['auth', 'verified'])->name('mytalent.update');
Route::get('/mytalent/approve/{app}', [MyTalentController::class, 'mytalent_approve_app'])->middleware(['auth', 'verified'])->name('mytalent.approve-app');
Route::get('/unreachable/{app}', [MyTalentController::class, 'unreachable'])->middleware(['auth', 'verified'])->name('unreachable');
Route::put('/mytalent/deny/{app}', [MyTalentController::class, 'deny'])->middleware(['auth', 'verified'])->name('mytalent.deny');
Route::delete('/mytalent/delete/{app}', [MyTalentController::class, 'delete'])->middleware(['auth', 'verified'])->name('mytalent.delete');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('mytalent')->group(function () {
    Route::get('apply', [MyTalentController::class, 'apply_form'])->name('mytalent.apply');
});

Route::post('/send-email', 'App\Http\Controllers\Dev\SendEmailController@sendEmail')->name('send.email');
Route::get('send-password-set/{email}/{promo_code}', [MailsController::class, 'set_password_mail'])->name('send-password-set');

require __DIR__.'/auth.php';
