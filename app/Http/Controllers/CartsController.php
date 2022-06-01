<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{
    //

    public function index()
    {

        $id_user = auth()->user()->id;
        $cart = DB::table('carts')
            ->join('books', 'carts.book_id', '=', 'books.id')
            ->join('libraries', 'libraries.id', '=', 'books.library_id')
            ->select('carts.id', 'books.id', 'books.imgLocation', 'books.title', 'books.author', 'books.publisher', 'libraries.id', 'libraries.library_name', 'libraries.location')
            ->where('carts.user_id', $id_user)
            ->get();

        $cart_id = DB::table('carts')
            ->where('user_id', '=', $id_user)
            ->value('id');

        return view('cart', [
            'title' => 'Keranjang'
        ], compact('cart'))->with('cartId', $cart_id);
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
