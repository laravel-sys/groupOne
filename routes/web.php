<?php

use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\WishlistsController;

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

Route::get('/reservations/returnBook', [ReservationsController::class, 'returnBook'])->name('returnBook');
Route::get('/', [ReservationsController::class, 'temp'])->name('temp');
Route::resource('reservations', ReservationsController::class);

Route::resource('wishlists', WishlistsController::class);

