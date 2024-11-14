<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\ReturnsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LocationsController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::middleware(['auth'])->group(function () {

// Rute utama untuk menampilkan buku yang tersedia
Route::get('/', [BooksController::class, 'index'])->name('books.index');

// CRUD untuk kategori
Route::resource('/categories', CategoriesController::class);

// CRUD untuk lokasi
Route::resource('/locations', LocationsController::class);

// Rute untuk buku (menampilkan, meminjam, dll.)
Route::resource('/books', BooksController::class);

// Rute untuk transaksi peminjaman
Route::get('/books/loan', [LoansController::class, 'create'])->name('books.loan');
Route::post('/books/loan', [LoansController::class, 'store'])->name('books.loan.store');

// Rute untuk transaksi pengembalian
Route::get('/loans/return', [ReturnsController::class, 'create'])->name('books.return');
Route::post('/loans/return', [ReturnsController::class, 'store'])->name('books.return.store');

// Rute untuk mengelola transaksi peminjaman dan pengembalian
Route::resource('/loans', LoansController::class);
Route::resource('/returns', ReturnsController::class);
//});
