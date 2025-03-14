<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;


Route::prefix('book')->group(function() {
    Route::get('/all', [BookController::class, 'all']);

});
Route::prefix('customer')->group(function() {
    Route::get('/all', [CustomerController::class, 'all']);
    Route::get('/{id}/rentals', [CustomerController::class, 'rentals']);
});
Route::prefix('rental')->group(function() {
    Route::get('/all', [RentalController::class, 'all']);

});


Route::get('/', function() {
    return 1;
});


Route::get('/home', function() {
    return "?";
//    return view('home');
});

Route::get('/products', [UserController::class, 'index']);

