<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ResearcherController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PoetryController;
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

    Route::get('/dashboard/products', [ProductController::class, 'index'])->name('dashboard.products');
    Route::post('/dashboard/products', [ProductController::class, 'store'])->name('dashboard.products.store');
    Route::post('/dashboard/products/update/{id}', [ProductController::class, 'update'])->name('dashboard.products.update');
    Route::delete('/dashboard/products/{id}', [ProductController::class, 'destroy'])->name('dashboard.products.delete');

    // Culture Management Routes
    Route::get('/dashboard/culture', [CultureController::class, 'index'])->name('dashboard.culture');
    Route::post('/dashboard/culture/store', [CultureController::class, 'store'])->name('dashboard.culture.store');
    Route::post('/dashboard/culture/update/{culture}', [CultureController::class, 'update'])->name('dashboard.culture.update');
    Route::delete('/dashboard/culture/{culture}', [CultureController::class, 'destroy'])->name('dashboard.culture.destroy');

    // Media Management Routes
    Route::get('/dashboard/media', [MediaController::class, 'index'])->name('dashboard.media');
    Route::post('/dashboard/media/video', [MediaController::class, 'storeVideo'])->name('dashboard.media.video.store');
    Route::post('/dashboard/media/video/update/{id}', [MediaController::class, 'updateVideo'])->name('dashboard.media.video.update');
    Route::delete('/dashboard/media/video/{id}', [MediaController::class, 'destroyVideo'])->name('dashboard.media.video.delete');
    Route::post('/dashboard/media/photo', [MediaController::class, 'storePhoto'])->name('dashboard.media.photo.store');
    Route::post('/dashboard/media/photo/update/{id}', [MediaController::class, 'updatePhoto'])->name('dashboard.media.photo.update');
    Route::delete('/dashboard/media/photo/{id}', [MediaController::class, 'destroyPhoto'])->name('dashboard.media.photo.delete');

    // Researchers Management Routes
    Route::get('/dashboard/researchers', [ResearcherController::class, 'index'])->name('dashboard.researchers');
    Route::post('/dashboard/researchers', [ResearcherController::class, 'store'])->name('dashboard.researchers.store');
    Route::post('/dashboard/researchers/update/{id}', [ResearcherController::class, 'update'])->name('dashboard.researchers.update');
    Route::delete('/dashboard/researchers/{id}', [ResearcherController::class, 'destroy'])->name('dashboard.researchers.delete');

    // Contact Management Routes
    Route::get('/dashboard/contact', [ContactController::class, 'index'])->name('dashboard.contact');
    Route::post('/dashboard/contact', [ContactController::class, 'update'])->name('dashboard.contact.update');

    // Poetry Management Routes
    Route::get('/dashboard/poetry', [PoetryController::class, 'index'])->name('admin.poetry.index');
    Route::post('/dashboard/poetry', [PoetryController::class, 'store'])->name('admin.poetry.store');
    Route::post('/dashboard/poetry/update/{id}', [PoetryController::class, 'update'])->name('admin.poetry.update');
    Route::delete('/dashboard/poetry/{id}', [PoetryController::class, 'destroy'])->name('admin.poetry.destroy');
    Route::post('/dashboard/poetry/update-order', [PoetryController::class, 'updateOrder'])->name('admin.poetry.updateOrder');

    // Admin Management Routes
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('dashboard.admin');
    Route::post('/dashboard/admin', [AdminController::class, 'store'])->name('dashboard.admin.store');
    Route::post('/dashboard/admin/update/{id}', [AdminController::class, 'update'])->name('dashboard.admin.update');
    Route::delete('/dashboard/admin/{id}', [AdminController::class, 'destroy'])->name('dashboard.admin.delete');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
