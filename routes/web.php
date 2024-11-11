<?php

use App\Livewire\Sale;

use App\Livewire\Report;
use App\Livewire\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

// use App\Http\Controllers\OrderProductController;

// Customers
// Route::middleware(['auth', 'role:admin'])->group(function () {
// });

// cek jika url / arahkan ke halaman login
Route::get('/', function () {
    if (!Auth::check()) {
        return redirect()->route('signIn');
    }
    return redirect()->route('dashboard');
});

Route::group(['prefix' => 'account'], function () {
    // Middlewre Guest
    Route::group(['middleware' => 'guest'], function () {
        // Login
        Route::get('sign-in', [SignInController::class, 'index'])->name('signIn');
        Route::post('login/auth', [SignInController::class, 'login'])->name('auth.login');
        // register
        Route::get('sign-up', [SignUpController::class, 'index'])->name('signUp');
        Route::post('store', [SignUpController::class, 'store'])->name('signUp.store');
    });
});

// Authenticated Middleware
Route::group(['middleware' => 'auth'], function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Customer
    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomersController::class, 'index'])->name('customers.index');
        Route::post('/store-customer', [CustomersController::class, 'store'])->name('customers.store');
        Route::get('/edit-customer/{id}', [CustomersController::class, 'edit'])->name('customers.edit');
        Route::put('/update-customer', [CustomersController::class, 'update'])->name('customers.update');
        Route::delete('/delete-customer/{id}', [CustomersController::class, 'destroy'])->name('customers.destroy');
    });


    // Products
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductsController::class, 'index'])->name('products.index');
        Route::post('/store-product', [ProductsController::class, 'store'])->name('products.store');
        Route::get('/edit-product/{id}', [ProductsController::class, 'edit'])->name('products.edit');
        Route::put('/update-product', [ProductsController::class, 'update'])->name('products.update');
        Route::delete('/delete-product/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
    });

    // POS System
    Route::prefix('posSystem')->group(function () {
        Route::get('/', sale::class)->name('pos.index');
    });

    // Reports
    Route::prefix('reports')->group(function () {
        Route::get('/', report::class)->name('reports.index');
    });

    // Print
    Route::get('/print', [DashboardController::class, 'print'])->name('reports.print');
    // Logout
    Route::get('logout', [SignInController::class, 'logout'])->name('signOut');
});



Route::get('/orders', Order::class)->name('orders.index');
