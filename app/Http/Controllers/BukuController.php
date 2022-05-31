<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        return view('buku', [
            'title' => 'Buku',
            'books' =>  Books::paginate(12)
        ]);
    }
}
