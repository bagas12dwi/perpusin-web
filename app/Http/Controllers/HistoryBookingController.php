<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryBookingController extends Controller
{
    //
    public function index()
    {
        $booking = DB::table('bookings')
            ->join('books', 'bookings.book_id', '=', 'books.id')
            ->join('libraries', 'books.library_id', '=', 'libraries.id')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->select('bookings.id AS idBooking', 'bookings.trx_number', 'bookings.created_at', 'bookings.return_date', 'users.username', 'books.id AS idBuku', 'books.title', 'books.author', 'books.publisher', 'books.imgLocation')
            ->where('libraries.user_id', auth()->user()->id)
            ->where('bookings.isBack', '=', true)
            ->get();

        $bookId = DB::table('bookings')
            ->join('books', 'books.id', '=', 'bookings.book_id')
            ->join('libraries', 'libraries.id', '=', 'books.library_id')
            ->where('libraries.user_id', '=', auth()->user()->id)
            ->where('bookings.isBack', '=', true)
            ->value('bookings.id');

        return view('adm-perpus.history-booking', [
            'title' => 'Riwayat Peminjaman'
        ], compact('booking'))->with('bookId', $bookId);
    }
}
