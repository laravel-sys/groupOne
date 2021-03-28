<?php

use App\Http\Controllers\ContactsController;

use App\Http\Controllers\BooksController;
use App\Http\Controllers\ReservationsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('contacts', ContactsController::class);
Route::get('/reservations/returnBook', [ReservationsController::class, 'returnBook'])->name('returnBook');
Route::get('/reservations/checkout', [ReservationsController::class, 'getUserCheckedOut'])->name('checkout');
Route::get('/reservations/history', [ReservationsController::class, 'getReturnedBooks'])->name('history');
// Route::get('/', [ReservationsController::class, 'temp'])->name('temp');
Route::get('/', [BooksController::class, 'index'])->name('index');
Route::resource('reservations', ReservationsController::class);
Route::resource('books', BooksController::class);


