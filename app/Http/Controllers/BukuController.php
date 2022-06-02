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
        $library_id = DB::table('libraries')
            ->where('user_id', '=', auth()->user()->id)
            ->value('id');

        $bookId = DB::table('books')
            ->where('library_id', '=', $library_id)
            ->value('id');

        $book = DB::table('books')
            ->where('library_id', '=', $library_id)
            ->get();

        return view('adm-perpus.manage-buku', [
            'title' => 'Buku'
        ])->with('bookId', $bookId)->with('books', $book);
    }

    public function indexAddBook()
    {
        return view('adm-perpus.add-book', [
            'title' => 'Tambah Buku'
        ]);
    }

    public function indexUpdateBook(Books $book)
    {
        return view('adm-perpus.update-book', [
            'title' => 'Ubah Buku',
            'books' => $book
        ]);
    }

    public function insertBook(Request $request)
    {
        $gambar = $request->file('gambar')->getClientOriginalName();
        $judul = $request->input('judulBuku');
        $penulis = $request->input('penulis');
        $penerbit = $request->input('penerbit');
        $deskripsi = $request->input('deskripsi');
        $stock = $request->input('stock');
        $denda = $request->input('denda');

        $request->file('gambar')->storeAs('public/buku', $gambar);

        $library_id = DB::table('libraries')
            ->where('user_id', '=', auth()->user()->id)
            ->value('id');

        $book = new Books();
        $book->library_id = $library_id;
        $book->title = $judul;
        $book->author = $penulis;
        $book->publisher = $penerbit;
        $book->description = $deskripsi;
        $book->stock = $stock;
        $book->isOnline = false;
        $book->imgLocation = $gambar;
        $book->amercement_price = $denda;
        $book->save();
        return redirect()->intended('/manage-buku');
    }

    public function updateBook(Request $request)
    {
        $id = $request->input('idBuku');
        $gambar = $request->file('gambar')->getClientOriginalName();
        $judul = $request->input('judulBuku');
        $penulis = $request->input('penulis');
        $penerbit = $request->input('penerbit');
        $deskripsi = $request->input('deskripsi');
        $stock = $request->input('stock');
        $denda = $request->input('denda');

        $request->file('gambar')->storeAs('public/buku', $gambar);

        $library_id = DB::table('libraries')
            ->where('user_id', '=', auth()->user()->id)
            ->value('id');

        DB::table('books')
            ->where('id', $id)
            ->update([
                'library_id' => $library_id,
                'title' => $judul,
                'author' => $penulis,
                'publisher' => $penerbit,
                'description' => $deskripsi,
                'stock' => $stock,
                'isOnline' => false,
                'imgLocation' => $gambar,
                'amercement_price' => $denda
            ]);
        return redirect()->intended('/manage-buku');
    }

    public function deleteBook(Request $request)
    {
        $bookId = $request->input('bookId');
        DB::table('books')
            ->where('id', '=', $bookId)
            ->delete();
        return redirect('/manage-buku');
    }
}
