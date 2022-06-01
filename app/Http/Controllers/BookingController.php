<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function index()
    {
        # code...
    }

    public function addToBooking(Request $request)
    {
        $idUser = $request->input('idUser');
        $idBuku = $request->input('id');

        $booking = new Booking();
        $booking->user_id = $idUser;
        $booking->book_id = $idBuku;
        $booking->save();
        return redirect()->intended('/peminjaman/sukses');
    }

    public function success()
    {
        return view('success-booking', [
            'title' => 'Berhasil'
        ]);
    }
}
