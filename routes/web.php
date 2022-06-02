<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Perpustakaan;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OtentikasiController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/perpustakaan', [Perpustakaan::class, 'index']);
Route::get('/perpustakaan/{library:library_name}', [Perpustakaan::class, 'browseLibrary']);
Route::get('/buku', [BukuController::class, 'index']);
Route::post('/addToCart', [CartsController::class, 'addToCart']);
Route::get('/keranjang/sukses', [CartsController::class, 'success']);
Route::get('/keranjang', [CartsController::class, 'index']);
Route::get('/peminjaman', [BookingController::class, 'index']);
Route::get('/peminjaman/sukses', [BookingController::class, 'success']);
Route::post('/addToBooking', [BookingController::class, 'addToBooking']);



//auth
Route::get('/login', [OtentikasiController::class, 'loginIndex']);
Route::get('/register', [OtentikasiController::class, 'registerIndex']);
Route::post('/register', [OtentikasiController::class, 'register']);
Route::post('/logout', [OtentikasiController::class, 'logout']);
Route::post('/login', [OtentikasiController::class, 'login']);
