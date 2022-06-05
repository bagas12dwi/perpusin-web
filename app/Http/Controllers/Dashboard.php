<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    //
    public function indexAdminPerpus()
    {
        $jmlBuku = DB::table('books')
            ->join('libraries', 'libraries.id', '=', 'books.library_id')
            ->where('libraries.user_id', auth()->user()->id)
            ->count('books.id');

        $jmlBooking = DB::table('books')
            ->join('libraries', 'libraries.id', '=', 'books.library_id')
            ->join('bookings', 'bookings.book_id', '=', 'books.id')
            ->where('libraries.user_id', auth()->user()->id)
            ->count('bookings.id');

        $jmlBookingSelesai = DB::table('bookings')
            ->join('books', 'bookings.book_id', '=', 'books.id')
            ->join('libraries', 'books.library_id', '=', 'libraries.id')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->select('bookings.id AS idBooking', 'bookings.trx_number', 'bookings.created_at', 'bookings.return_date', 'users.username', 'books.id AS idBuku', 'books.title', 'books.author', 'books.publisher', 'books.imgLocation')
            ->where('libraries.user_id', auth()->user()->id)
            ->where('bookings.isBack', '=', true)
            ->count('bookings.id');

        $jmlBookingBelumDikonfirmasi = DB::table('bookings')
            ->join('books', 'bookings.book_id', '=', 'books.id')
            ->join('libraries', 'books.library_id', '=', 'libraries.id')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->select('bookings.id AS idBooking', 'bookings.trx_number', 'users.username', 'books.id AS idBuku', 'books.title', 'books.author', 'books.publisher', 'books.imgLocation')
            ->where('libraries.user_id', auth()->user()->id)
            ->where('bookings.full_name', '=', NULL)
            ->count('bookings.id');

        $amercements = DB::table('bookings')
            ->join('books', 'bookings.book_id', '=', 'books.id')
            ->join('libraries', 'books.library_id', '=', 'libraries.id')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->join('amercements', 'bookings.id', '=', 'amercements.booking_id')
            ->select('amercements.id AS idDenda', 'amercements.amercement_trx_no', 'amercements.nominal', 'amercements.updated_at', 'users.username', 'books.id AS idBuku', 'books.title', 'books.author', 'books.publisher', 'books.imgLocation')
            ->where('libraries.user_id', auth()->user()->id)
            ->where('bookings.isBack', '=', true)
            ->sum('amercements.nominal');

        return view('adm-perpus.dashboard', [
            'title' => 'Dashboard'
        ])->with('jmlBuku', $jmlBuku)
            ->with('jmlBooking', $jmlBooking)
            ->with('jmlBookingSelesai', $jmlBookingSelesai)
            ->with('jmlBookingBelumDiKonfirmasi', $jmlBookingBelumDikonfirmasi)
            ->with('denda', $amercements);
    }

    public function indexAdmin()
    {
        $jmlUser = DB::table('users')
            ->count('id');

        $jmlUserAktif = DB::table('users')
            ->where('status_user', true)
            ->count('id');

        $jmlAkunPerpus = DB::table('users')
            ->where('role', 2)
            ->count('id');

        $jmlAkunPerpusVerified = DB::table('libraries')
            ->where('user_id', '!=', NULL)
            ->count('id');


        return view('admin.dashboard', [
            'title' => 'Dashboard'
        ])->with('jmlUser', $jmlUser)
            ->with('jmlUserAktif', $jmlUserAktif)
            ->with('jmlAkunPerpus', $jmlAkunPerpus)
            ->with('jmlAkunPerpusVerified', $jmlAkunPerpusVerified);
    }
}
