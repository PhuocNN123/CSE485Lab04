<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;

Route::get('/', function () {
    return view('viewbooks.App'); // Ensure this points to the correct Blade file
});

Route::resource('books', BookController::class);
Route::resource('readers', ReaderController::class);
Route::resource('borrows', BorrowController::class);

// Custom routes for updating borrow status
Route::get('/borrows/{borrow}/editStatus', [BorrowController::class, 'editStatus'])->name('borrows.editStatus');
Route::put('/borrows/{borrow}/updateStatus', [BorrowController::class, 'updateStatus'])->name('borrows.updateStatus');

// Route to show borrow history for a specific reader
Route::get('/borrows/reader/{reader}', [BorrowController::class, 'show'])->name('borrows.show');
