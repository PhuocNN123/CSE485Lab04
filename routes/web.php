<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReaderController;
Route::get('/', function () {
    return view('readers.App');
});
Route::resource('books', BookController::class);
Route::resource('readers', ReaderController::class);
Route::resource('borrows', BorrowController::class);
