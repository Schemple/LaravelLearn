<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestController;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RentalExport;

Route::get('/test', [CustomerController::class, 'test']);

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::prefix('book')->group(function() {
    Route::get('/', [BookController::class, 'index'])->name('book.index');
    Route::get('/import', [BookController::class, 'viewImport'])->name('book.import');
    Route::post('/import', [BookController::class, 'import']);
    Route::get('/add', [BookController::class, 'viewAdd'])->name('book.add');
    Route::post('/add', [BookController::class, 'add']);
    Route::get('/{id}', [BookController::class, 'viewOne'])->name('book.show');
    Route::get('/{id}/edit', [BookController::class, 'viewEdit'])->name('book.edit');
    Route::put('/{id}/edit', [BookController::class, 'update'])->name('book.update');
    Route::delete('/{id}/delete', [BookController::class, 'delete'])->name('book.destroy');
});

Route::prefix('customer')->group(function() {
    Route::get('/all', [CustomerController::class, 'all']);
    Route::get('/{id}/rentals', [CustomerController::class, 'rentals']);
});

Route::prefix('rental')->group(function() {
    Route::get('/all', [RentalController::class, 'all']);
});

Route::get('/export', function () {
    return Excel::download(new RentalExport, 'orders.xlsx');
});

Route::get('/import', [RentalController::class, 'import'])->name('import');


Route::get('/404', function() {
    return view('404');
})->name('404');
