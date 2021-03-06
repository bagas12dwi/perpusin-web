<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Perpustakaan;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CompleteDataController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\HistoryAmercementController;
use App\Http\Controllers\HistoryBookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OtentikasiController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\UserController;


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
//user Route
Route::get('/', [HomeController::class, 'index']);
Route::get('/perpustakaan', [Perpustakaan::class, 'index']);
Route::get('/perpustakaan/{library:library_name}', [Perpustakaan::class, 'browseLibrary']);
Route::get('/buku', [BukuController::class, 'index']);

Route::group(['middleware' => ['auth', 'cekRole:3']], function () {
    Route::post('/addToCart', [CartsController::class, 'addToCart']);
    Route::get('/keranjang/sukses', [CartsController::class, 'success']);
    Route::get('/keranjang', [CartsController::class, 'index']);
    Route::get('/peminjaman', [BookingController::class, 'index']);
    Route::get('/peminjaman/sukses', [BookingController::class, 'success']);
    Route::post('/addToBooking', [BookingController::class, 'addToBooking']);
});

//adm-perpus route

Route::group(['middleware' => ['auth', 'cekRole:2']], function () {
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
    Route::get('/riwayat-peminjaman', [HistoryBookingController::class, 'index']);
    Route::get('/riwayat-denda', [HistoryAmercementController::class, 'index']);
    Route::get('/complete-data', [CompleteDataController::class, 'index']);
    Route::post('/complete-data', [CompleteDataController::class, 'complete']);
});


//admin route
Route::group(['middleware' => ['auth', 'cekRole:1']], function () {
    Route::get('/admin', [Dashboard::class, 'indexAdmin']);
    Route::get('/list-user', [UserController::class, 'indexUser']);
    Route::get('/list-perpus', [UserController::class, 'indexPerpus']);
    Route::get('/add-admin', [UserController::class, 'indexAddAdmin']);
    Route::post('/add-admin', [UserController::class, 'addAdmin']);
    Route::post('/aktif', [UserController::class, 'aktif']);
    Route::post('/nonAktif', [UserController::class, 'suspend']);
    Route::get('/add-perpus', [UserController::class, 'indexAddPerpus']);
    Route::post('/add-perpus', [UserController::class, 'addPerpus']);
});


//auth
Route::get('/login', [OtentikasiController::class, 'loginIndex']);
Route::get('/register', [OtentikasiController::class, 'registerIndex']);
Route::post('/register', [OtentikasiController::class, 'register']);
Route::post('/logout', [OtentikasiController::class, 'logout']);
Route::post('/login', [OtentikasiController::class, 'login']);
