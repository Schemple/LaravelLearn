<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;


Route::get('/', function () {
    return view('dashboard.index');
})->name('home');
Route::prefix('book')->group(function() {
    Route::get('/all', [BookController::class, 'index'])->name('book.all');
    Route::get('/add', [BookController::class, 'viewAdd'])->name('book');
    Route::post('/add', [BookController::class, 'store'])->name('book.store');
    Route::get('/{id}', [BookController::class, 'viewOne'])->name('book.show');
});

Route::prefix('customer')->group(function() {
    Route::get('/all', [CustomerController::class, 'all']);
    Route::get('/{id}/rentals', [CustomerController::class, 'rentals']);
});

Route::prefix('rental')->group(function() {
    Route::get('/all', [RentalController::class, 'all']);
});


Route::get('/404', function() {
    return view('404');
})->name('404');
