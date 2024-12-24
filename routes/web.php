<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\HomeController;
// Route::get('/', [HomeController::class, 'index']);
Route::get('/', function () {
    return 'Hello World';
});
Route::resource('books', BookController::class);
Route::resource('readers', ReaderController::class);
Route::resource('borrows', BorrowController::class);
Route::get('/borrows/{reader_id}/history', [BorrowController::class, 'history'])->name('borrows.history');
Route::patch('borrows/{id}/return', [BorrowController::class, 'updateStatusToReturned'])->name('borrows.return');

Route::get('/api/readers/search-by-name', [ReaderController::class, 'searchByName']);
Route::get('/api/books/search-by-title', [BookController::class, 'searchByTitle']);