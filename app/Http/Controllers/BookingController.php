<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    //
    public function index()
    {
        $id_user = auth()->user()->id;
        $booking = DB::table('bookings')
            ->join('books', 'bookings.book_id', '=', 'books.id')
            ->join('libraries', 'libraries.id', '=', 'books.library_id')
            ->select('bookings.id AS bookingId', 'bookings.trx_number', 'bookings.created_at', 'books.id AS bookId', 'books.imgLocation', 'books.title', 'books.author', 'books.publisher', 'libraries.id AS libraryId', 'libraries.library_name', 'libraries.location')
            ->where('bookings.user_id', $id_user)
            ->get();

        return view('booking', [
            'title' => 'Peminjaman'
        ], compact('booking'));
    }

    public function addToBooking(Request $request)
    {
        $idUser = $request->input('idUser');
        $idBuku = $request->input('id');
        $cartId = $request->input('cartId');

        $booking = new Booking();
        $booking->user_id = $idUser;
        $booking->book_id = $idBuku;
        $booking->isBooked = true;
        $booking->isBack = false;
        $booking->save();

        if ($cartId != '') {
            DB::table('carts')
                ->where('id', '=', $cartId)
                ->delete();
        }


        return redirect()->intended('/peminjaman/sukses');
    }

    public function success()
    {
        return view('success-booking', [
            'title' => 'Berhasil'
        ]);
    }

    public function indexKonfirmasiPeminjaman()
    {
        $library_id = DB::table('libraries')
            ->where('user_id', '=', auth()->user()->id)
            ->value('id');

        $booking = DB::table('bookings')
            ->join('books', 'bookings.book_id', '=', 'books.id')
            ->join('libraries', 'books.library_id', '=', 'libraries.id')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->select('bookings.id AS idBooking', 'bookings.trx_number', 'users.username', 'books.id AS idBuku', 'books.title', 'books.author', 'books.publisher', 'books.imgLocation')
            ->where('libraries.user_id', auth()->user()->id)
            ->where('bookings.full_name', '=', NULL)
            ->get();

        $bookId = DB::table('bookings')
            ->join('books', 'books.id', '=', 'bookings.book_id')
            ->join('libraries', 'libraries.id', '=', 'books.library_id')
            ->where('libraries.user_id', '=', auth()->user()->id)
            ->where('bookings.full_name', '=', NULL)
            ->value('bookings.id');

        return view('adm-perpus.confirm-booking', [
            'title' => 'Konfirmasi Peminjaman',
        ], compact('booking'))->with('bookId', $bookId);
    }

    public function konfirmasiPinjam(Booking $booking)
    {
        return view('adm-perpus.confirm-form-booking', [
            'title' => 'Konfirmasi Peminjaman',
            'booking' => $booking
        ]);
    }

    public function konfirmasi(Request $request)
    {
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $noTelp = $request->input('noTelp');
        $inputTanggal = $request->input('inputTanggal');
        $jaminan = $request->jaminan;
        $noTransaksi = $request->input('noTransaksi');

        $tglKembali = strtotime($inputTanggal);
        DB::table('bookings')
            ->where('trx_number', $noTransaksi)
            ->update([
                'full_name' => $nama,
                'address' => $alamat,
                'phone_number' => $noTelp,
                'return_date' => date('Y-m-d', $tglKembali),
                'guarantee' => $jaminan
            ]);
        return redirect()->intended('/konfirmasi-pinjam');
    }
}
