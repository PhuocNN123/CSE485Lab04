<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;

Route::get('/', function () {
    return view('readers.App'); // Hoặc 'viewbooks.app' nếu bạn muốn hiển thị giao diện của viewbooks
});

Route::resource('books', BookController::class);
Route::resource('readers', ReaderController::class);
Route::resource('borrows', BorrowController::class);
