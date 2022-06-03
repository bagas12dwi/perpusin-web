<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Perpustakaan extends Controller
{
    public function index()
    {
        return view('perpustakaan', [
            'title' => 'Perpustakaan',
            'library' => Library::paginate(9)
        ]);
    }

    public function browseLibrary(Library $library)
    {
        $name = $library->library_name;
        $idLibrary = $library->id;
        $book = DB::table('books')
            ->select('books.id', 'books.title', 'books.imgLocation', 'books.description', 'books.stock', 'books.isOnline')
            ->where('books.library_id', $idLibrary)
            ->get();
        return view('library-book', [
            'title' => $name,
            'library' => $library,
            'books' => $book
        ]);
    }
}
