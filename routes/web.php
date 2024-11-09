<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\ReturnsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'checkuser'])->group(function () {
Route::get('/loans', [LoansController::class, 'index']);
Route::post('/loans', [LoansController::class, 'store']);
Route::get('/returns', [ReturnsController::class, 'index']);
Route::post('/returns', [ReturnsController::class, 'store']);

Route::resource('categories', CategoriesController::class);
Route::resource('locations', LocationsController::class);
Route::resource('loans', LoansController::class);
Route::resource('returns', ReturnsController::class);
});
