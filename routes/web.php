<?php

use App\Http\Controllers\website\WebsiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\AuthController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\ProjectController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\CertificateController;
use App\Http\Controllers\ContactController;

// Website
Route::get('/', [WebsiteController::class, 'index'])->name('website.home');
Route::get('/about', [WebsiteController::class, 'about'])->name('website.about');
Route::get('/resume', [WebsiteController::class, 'resume'])->name('website.resume');
Route::get('/project', [WebsiteController::class, 'project'])->name('website.project');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('website.contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Dashboard Authentication Routes
Route::prefix('dashboard')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('dashboard.login');
    Route::post('/login', [AuthController::class, 'login'])->name('dashboard.login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('dashboard.logout');
});

// Dashboard Protected Routes
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    // Dashboard Home
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    
    // Profile Routes
    Route::get('/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::post('/profile/update', [DashboardController::class, 'updateProfile'])->name('dashboard.profile.update');
    
    // Projects Routes
    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('dashboard.projects.index');
        Route::get('/create', [ProjectController::class, 'create'])->name('dashboard.projects.create');
        Route::post('/store', [ProjectController::class, 'store'])->name('dashboard.projects.store');
        Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('dashboard.projects.edit');
        Route::put('/update/{id}', [ProjectController::class, 'update'])->name('dashboard.projects.update');
        Route::delete('/delete/{id}', [ProjectController::class, 'destroy'])->name('dashboard.projects.destroy');
    });
    
    // Categories Routes
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('dashboard.categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('dashboard.categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('dashboard.categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('dashboard.categories.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('dashboard.categories.update');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('dashboard.categories.destroy');
    });
    
    // Certificates Routes
    Route::prefix('certificates')->group(function () {
        Route::get('/', [CertificateController::class, 'index'])->name('dashboard.certificates.index');
        Route::get('/create', [CertificateController::class, 'create'])->name('dashboard.certificates.create');
        Route::post('/store', [CertificateController::class, 'store'])->name('dashboard.certificates.store');
        Route::get('/edit/{id}', [CertificateController::class, 'edit'])->name('dashboard.certificates.edit');
        Route::put('/update/{id}', [CertificateController::class, 'update'])->name('dashboard.certificates.update');
        Route::delete('/delete/{id}', [CertificateController::class, 'destroy'])->name('dashboard.certificates.destroy');
    });
});

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

