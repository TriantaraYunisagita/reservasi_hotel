<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerPembayaranController;
use App\Http\Controllers\CustomerReservasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HargahariiniController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'adminAccess'])->name('admin.')->group(function() {
    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/customers', CustomerController::class);
    Route::resource('/admin/hargahariini', HargahariiniController::class);
    Route::resource('/admin/invoice', InvoiceController::class);
    Route::resource('/admin/pembayaran', PembayaranController::class);
    Route::resource('/admin/reservasi', ReservasiController::class);
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'customerAccess'])->name('customer.')->group(function() {
    Route::resource('/customer/pembayaran', CustomerPembayaranController::class);
    Route::resource('/customer/reservasi', CustomerReservasiController::class);
    Route::get('/customer/dashboard', [DashboardController::class, 'customerDashboard'])->name('customer.dashboard');
});