<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function index()
    {
        return view('buku', [
            'title' => 'Buku',
            'books' =>  Books::paginate(12)
        ]);
    }

    public function indexAdminPerpus()
    {
        $bookId = DB::table('books')
            ->value('id');

        return view('adm-perpus.manage-buku', [
            'title' => 'Buku',
            'books' => Books::all()
        ])->with('bookId', $bookId);
    }

    public function indexAddBook()
    {
        return view('adm-perpus.add-book', [
            'title' => 'Tambah Buku'
        ]);
    }
}
