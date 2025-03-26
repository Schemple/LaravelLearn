<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RentalExport;


Route::get('/', function () {
    $totalBooks = BookController::totalBooks();
    return view('dashboard.index', [
        'totalBooks' => $totalBooks,
    ]);
})->name('home');

Route::prefix('book')->group(function() {
    Route::get('/', [BookController::class, 'index'])->name('book.index');
    Route::get('/import', [BookController::class, 'viewImport'])->name('book.import');
    Route::post('/import', [BookController::class, 'importExcel']);
    Route::get('/add', [BookController::class, 'add'])->name('book.add');
    Route::post('/add', [BookController::class, 'store']);
    Route::get('/{id}', [BookController::class, 'viewOne'])->name('book.show');
    Route::get('/{id}/edit', [BookController::class, 'viewEdit'])->name('book.edit');
    Route::post('/{id}/edit', [BookController::class, 'update'])->name('book.update');

    Route::get('/{id}/delete', [BookController::class, 'viewDelete'])->name('book.destroy');
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
