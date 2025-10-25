<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\CultureController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard Routes (Protected)
Route::middleware(['auth'])->group(function () {
    // Dashboard Overview
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Content Management Routes
    Route::get('/dashboard/hero', [DashboardController::class, 'hero'])->name('dashboard.hero');
    Route::post('/dashboard/hero', [DashboardController::class, 'updateHero'])->name('dashboard.hero.update');

    Route::get('/dashboard/about', [DashboardController::class, 'about'])->name('dashboard.about');
    Route::post('/dashboard/about', [DashboardController::class, 'updateAbout'])->name('dashboard.about.update');

    // Culture Management Routes
    Route::get('/dashboard/culture', [CultureController::class, 'index'])->name('dashboard.culture');
    Route::post('/dashboard/culture/store', [CultureController::class, 'store'])->name('dashboard.culture.store');
    Route::post('/dashboard/culture/update/{culture}', [CultureController::class, 'update'])->name('dashboard.culture.update');
    Route::delete('/dashboard/culture/{culture}', [CultureController::class, 'destroy'])->name('dashboard.culture.destroy');

    Route::get('/dashboard/products', [DashboardController::class, 'products'])->name('dashboard.products');
    Route::post('/dashboard/products', [DashboardController::class, 'updateProducts'])->name('dashboard.products.update');
    Route::delete('/dashboard/products/{id}', [DashboardController::class, 'deleteProduct'])->name('dashboard.products.delete');

    Route::get('/dashboard/contact', [DashboardController::class, 'contact'])->name('dashboard.contact');
    Route::post('/dashboard/contact', [DashboardController::class, 'updateContact'])->name('dashboard.contact.update');

    // Media Management Routes
    Route::get('/dashboard/media', [DashboardController::class, 'media'])->name('dashboard.media');
    Route::post('/dashboard/media/hero-video', [DashboardController::class, 'updateHeroVideo'])->name('dashboard.media.updateHeroVideo');
    Route::post('/dashboard/media/add-video', [DashboardController::class, 'addVideo'])->name('dashboard.media.addVideo');
    Route::post('/dashboard/media/add-photo', [DashboardController::class, 'addPhoto'])->name('dashboard.media.addPhoto');
    Route::delete('/dashboard/media/delete-video/{id}', [DashboardController::class, 'deleteVideo'])->name('dashboard.media.deleteVideo');
    Route::delete('/dashboard/media/delete-photo/{id}', [DashboardController::class, 'deletePhoto'])->name('dashboard.media.deletePhoto');

    // Additional Dashboard Routes
    Route::get('/dashboard/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
