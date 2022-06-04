<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Perpustakaan;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OtentikasiController;
use App\Http\Controllers\PengembalianController;

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

//adm-perpus route
Route::get('/dashboard-perpustakaan', [Dashboard::class, 'indexAdminPerpus']);
Route::get('/manage-buku', [BukuController::class, 'indexAdminPerpus']);
Route::get('/tambah-buku', [BukuController::class, 'indexAddBook']);
Route::get('/manage-buku/{book:title}/update', [BukuController::class, 'indexUpdateBook']);
Route::post('/add-book', [BukuController::class, 'insertBook']);
Route::post('/delete-book', [BukuController::class, 'deleteBook']);
Route::post('/update-book', [BukuController::class, 'updateBook']);
Route::get('/konfirmasi-pinjam', [BookingController::class, 'indexKonfirmasiPeminjaman']);
Route::get('/konfirmasi-pinjam/{booking:trx_number}', [BookingController::class, 'konfirmasiPinjam']);
Route::post('/confirm-booking', [BookingController::class, 'konfirmasi']);
Route::get('/pengembalian', [PengembalianController::class, 'index']);
Route::get('/pengembalian/{booking:trx_number}', [PengembalianController::class, 'indexKonfirmasi']);
Route::post('/confirm-return', [PengembalianController::class, 'konfirmasi']);

//auth
Route::get('/login', [OtentikasiController::class, 'loginIndex']);
Route::get('/register', [OtentikasiController::class, 'registerIndex']);
Route::post('/register', [OtentikasiController::class, 'register']);
Route::post('/logout', [OtentikasiController::class, 'logout']);
Route::post('/login', [OtentikasiController::class, 'login']);
