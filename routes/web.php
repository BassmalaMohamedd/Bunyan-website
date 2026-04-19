<?php

use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    $settings = \App\Models\Setting::where('key', 'like', 'home_%')->pluck('value', 'key')->toArray();
    return view('home.index', compact('settings'));
})->name('home');

Route::get('/about', [\App\Http\Controllers\PageController::class, 'show'])->defaults('slug', 'about')->name('about');
Route::post('/contact', [\App\Http\Controllers\LeadController::class, 'store'])->name('contact.store');

Route::get('/services', [\App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [\App\Http\Controllers\ServiceController::class, 'show'])->name('services.show');

Route::get('/news', [\App\Http\Controllers\NewsPostController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [\App\Http\Controllers\NewsPostController::class, 'show'])->name('news.show');
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $stats = [
            'newsCount' => \App\Models\NewsPost::count(),
            'servicesCount' => \App\Models\Service::count(),
            'leadsCount' => \App\Models\Lead::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    })->name('dashboard');

    Route::get('/home', [\App\Http\Controllers\Admin\HomeController::class, 'edit'])->name('home.edit');
    Route::post('/home', [\App\Http\Controllers\Admin\HomeController::class, 'update'])->name('home.update');

    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('news', \App\Http\Controllers\Admin\NewsPostController::class);
    Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
    Route::resource('leads', \App\Http\Controllers\Admin\LeadController::class)->only(['index', 'show', 'update']);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
