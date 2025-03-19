<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;


Route::prefix('book')->group(function() {
    Route::get('/all', [BookController::class, 'all']);
    Route::get('/add', function(){
        return view('book.add');
    })->name('book.add');
    Route::post('/add', [BookController::class, 'store'])->name('books.store');
});

Route::prefix('customer')->group(function() {
    Route::get('/all', [CustomerController::class, 'all']);
    Route::get('/{id}/rentals', [CustomerController::class, 'rentals']);
});

Route::prefix('rental')->group(function() {
    Route::get('/all', [RentalController::class, 'all']);
});

Route::get('/', function () {
    return view('listen');
})->name('home');

Route::get('/test', function() {
    event(new \App\Events\testingEvent("this is the message"));
    return 'done';
});


