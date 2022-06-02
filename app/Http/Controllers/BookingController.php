<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    //
    public function index()
    {
        # code...
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
        $booking->save();

        DB::table('carts')
            ->where('id', '=', $cartId)
            ->delete();

        return redirect()->intended('/peminjaman/sukses');
    }

    public function success()
    {
        return view('success-booking', [
            'title' => 'Berhasil'
        ]);
    }
}
