<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class Perpustakaan extends Controller
{
    public function index()
    {
        return view('perpustakaan',[
            'title' => 'Perpustakaan',
            'library' => Library::paginate(9)
        ]);
    }
}
