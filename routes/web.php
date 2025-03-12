<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;
use App\Models\Job;

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
    return view('welcome');
});

Route::get('/jobs', function() {
    return view('jobs', [
        'jobs' => Job::all()
    ]);
});

Route::get('/jobs/{id}', function($id) {
    $job = Job::find($id);

    return view('job', [
        'job' => $job
    ]);
});

Route::get('/home', function() {
    return view('welcome');
});

Route::get('/products', [UserController::class, 'index']);
Route::get('/test', [NoteController::class, 'index']);

