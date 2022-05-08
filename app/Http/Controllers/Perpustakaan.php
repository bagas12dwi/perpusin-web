<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Perpustakaan extends Controller
{
    public function index()
    {
        return view('perpustakaan');
    }
}
