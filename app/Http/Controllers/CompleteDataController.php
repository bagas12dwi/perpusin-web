<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class CompleteDataController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('adm-perpus.complete-data', [
            'title' => 'Lengkapi Data'
        ]);
    }

    public function complete(Request $request)
    {
        $gambar = $request->file('gambar')->getClientOriginalName();
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $deskripsi = $request->input('deskripsi');

        $request->file('gambar')->storeAs('public/foto-perpus', $gambar);

        $perpus = new Library();
        $perpus->library_name = $nama;
        $perpus->library_desc = $deskripsi;
        $perpus->location = $alamat;
        $perpus->imgLocation = $gambar;
        $perpus->user_id = auth()->user()->id;
        $perpus->is_active = true;
        $perpus->save();
        return redirect()->intended('dashboard-perpustakaan');
    }
}
