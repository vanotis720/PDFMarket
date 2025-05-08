<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [FileController::class, 'index'])->name('home');

// Auth routes
Auth::routes();

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/files/{file}', [FileController::class, 'show'])->name('files.show');
    Route::get('/files/{file}/order', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/files/{file}/order', [OrderController::class, 'store'])->name('orders.store');
});
