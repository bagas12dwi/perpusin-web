<?php

namespace App\Http\Controllers;

use App\Models\Amercement;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    //
    public function index()
    {

        $booking = DB::table('bookings')
            ->join('books', 'bookings.book_id', '=', 'books.id')
            ->join('libraries', 'books.library_id', '=', 'libraries.id')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->select('bookings.id AS idBooking', 'bookings.trx_number', 'bookings.return_date', 'users.username', 'books.id AS idBuku', 'books.title', 'books.author', 'books.publisher', 'books.imgLocation')
            ->where('libraries.user_id', auth()->user()->id)
            ->where('bookings.full_name', '!=', NULL)
            ->where('bookings.isBooked', '=', true)
            ->where('bookings.isBack', '=', false)
            ->get();

        $dateNow = DB::select('SELECT current_date');

        $bookId = DB::table('bookings')
            ->join('books', 'books.id', '=', 'bookings.book_id')
            ->join('libraries', 'libraries.id', '=', 'books.library_id')
            ->where('libraries.user_id', '=', auth()->user()->id)
            ->where('bookings.full_name', '!=', NULL)
            ->where('bookings.isBooked', '=', true)
            ->where('bookings.isBack', '=', false)
            ->value('bookings.id');

        return view('adm-perpus.pengembalian', [
            'title' => 'Pengembalian'
        ], compact('booking'))->with('bookId', $bookId)->with('dateNow', $dateNow);
    }

    public function indexKonfirmasi(Booking $booking)
    {
        $data = DB::table('bookings')
            ->join('books', 'bookings.book_id', '=', 'books.id')
            ->join('libraries', 'books.library_id', '=', 'libraries.id')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->select('bookings.id AS idBooking', 'bookings.trx_number', 'bookings.created_at', 'users.username', 'users.id AS idUser', DB::raw("DATEDIFF(current_date,bookings.return_date)AS Days"), DB::raw("DATEDIFF(current_date,bookings.return_date) * books.amercement_price AS total"), 'books.id AS idBuku', 'books.title', 'books.author', 'books.publisher', 'books.imgLocation', 'books.amercement_price')
            ->where('bookings.trx_number', $booking->trx_number)
            ->get();

        return view('adm-perpus.confirm-return-form', [
            'title' => 'Konfirmasi Pengembalian',
            'booking' => $booking
        ], compact('data'));
    }

    public function konfirmasi(Request $request)
    {
        $idBooking = $request->input('idBooking');
        $idUser = $request->input('idUser');
        $nominal = $request->input('nominal');
        $idBuku = $request->input('idBuku');


        if ($nominal > 0) {
            $amercement = new Amercement();
            $amercement->user_id = $idUser;
            $amercement->booking_id = $idBooking;
            $amercement->nominal = $nominal;
            $amercement->save();
        }

        DB::table('bookings')
            ->where('id', $idBooking)
            ->update([
                'isBack' => true
            ]);

        $stock = DB::table('books')
            ->where('id', $idBuku)
            ->value('stock');

        DB::table('books')
            ->where('id', $idBuku)
            ->update([
                'stock' => $stock + 1
            ]);

        return redirect()->intended('/pengembalian');
    }
}
