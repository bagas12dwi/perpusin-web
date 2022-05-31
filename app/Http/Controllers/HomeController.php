<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home', [
            'title' => "Home",
            'books' => Books::orderBy('id', 'desc')->paginate(8)
        ]);
    }
}
