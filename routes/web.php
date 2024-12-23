<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;

Route::get('/', function () {
    return view('viewbooks.App'); 
});

Route::resource('books', BookController::class);
Route::resource('readers', ReaderController::class);
Route::resource('borrows', BorrowController::class);

// Thêm các route cập nhật trạng thái mượn sách
Route::get('/borrows/{borrow}/editStatus', [BorrowController::class, 'editStatus'])->name('borrows.editStatus');
Route::put('/borrows/{borrow}/updateStatus', [BorrowController::class, 'updateStatus'])->name('borrows.updateStatus');