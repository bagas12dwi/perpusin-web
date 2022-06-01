<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    //

    public function index()
    {
        # code...
    }

    public function addToCart(Request $request)
    {
        $idUser = $request->input('idUser');
        $idBuku = $request->input('id');

        $cart = new Carts();
        $cart->user_id = $idUser;
        $cart->book_id = $idBuku;
        $cart->save();
        return redirect()->intended('/keranjang/sukses');
    }

    public function success()
    {
        return view('success-add-cart', [
            'title' => 'Berhasil'
        ]);
    }
}
