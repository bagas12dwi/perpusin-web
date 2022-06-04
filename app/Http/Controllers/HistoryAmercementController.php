<?php

namespace App\Http\Controllers;

use App\Models\Amercement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryAmercementController extends Controller
{
    //
    public function index()
    {
        $amercements = DB::table('bookings')
            ->join('books', 'bookings.book_id', '=', 'books.id')
            ->join('libraries', 'books.library_id', '=', 'libraries.id')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->join('amercements', 'bookings.id', '=', 'amercements.booking_id')
            ->select('amercements.id AS idDenda', 'amercements.amercement_trx_no', 'amercements.nominal', 'amercements.updated_at', 'users.username', 'books.id AS idBuku', 'books.title', 'books.author', 'books.publisher', 'books.imgLocation')
            ->where('libraries.user_id', auth()->user()->id)
            ->where('bookings.isBack', '=', true)
            ->get();

        $amercementsId = DB::table('bookings')
            ->join('books', 'books.id', '=', 'bookings.book_id')
            ->join('libraries', 'libraries.id', '=', 'books.library_id')
            ->join('amercements', 'bookings.id', '=', 'amercements.booking_id')
            ->where('libraries.user_id', '=', auth()->user()->id)
            ->where('bookings.isBack', '=', true)
            ->value('amercements.id');

        return view('adm-perpus.history-amercement', [
            'title' => 'Riwayat Denda'
        ], compact('amercements'))->with('idDenda', $amercementsId);
    }
}
