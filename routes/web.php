<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/about', function () {
    return view('about.index');
})->name('about');

Route::post('/contact', [\App\Http\Controllers\LeadController::class, 'store'])->name('contact.store');

Route::get('/services', [\App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [\App\Http\Controllers\ServiceController::class, 'show'])->name('services.show');

Route::get('/news', [\App\Http\Controllers\NewsPostController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [\App\Http\Controllers\NewsPostController::class, 'show'])->name('news.show');
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('news', \App\Http\Controllers\Admin\NewsPostController::class);
    Route::resource('leads', \App\Http\Controllers\Admin\LeadController::class)->only(['index', 'show', 'update']);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
