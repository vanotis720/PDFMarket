<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderPdfController;
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
    Route::get('/files/{file}/download', [OrderPdfController::class, 'generate'])->name('files.download');
    Route::get('/files/{file}/order', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/files/{file}/order', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/order/{orderId}/verify', [OrderController::class, 'verifyPaiement'])->name('orders.verify');
    Route::get('/files/{file}/download', [FileController::class, 'show'])->name('files.download');
});
