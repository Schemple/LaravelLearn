<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\DashboardController;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RentalExport;

Route::get('/test', [CustomerController::class, 'test']);

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::controller(BookController::class)->group(function () {
    Route::prefix('book')->group(function() {
        Route::get('/', 'index')->name('book.index');
        Route::get('/import', 'viewImport')->name('book.import');
        Route::post('/import', 'import');
        Route::get('/add', 'viewAdd')->name('book.add');
        Route::post('/add', 'add');
        Route::get('/{id}', 'viewOne')->name('book.show');
        Route::get('/{id}/edit', 'viewEdit')->name('book.edit');
        Route::put('/{id}/edit', 'update')->name('book.update');
        Route::delete('/{id}/delete', 'delete')->name('book.destroy');
    });
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


Route::view('/404', '404')->name('404');
