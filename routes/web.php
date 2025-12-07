<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;

// Main website routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin authentication routes
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin panel routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/pos', [AdminController::class, 'pos'])->name('pos');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/inventory', [AdminController::class, 'inventory'])->name('inventory');
    Route::get('/sales', [AdminController::class, 'sales'])->name('sales');
    Route::get('/customers', [AdminController::class, 'customers'])->name('customers');
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    Route::get('/staff', [AdminController::class, 'staff'])->name('staff');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});