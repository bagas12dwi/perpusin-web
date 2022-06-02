@extends('layout.main-layout')

@section('konten')
    <div class="container" style="min-height: 451px">
        <h4 class="my-3 fw-bold">Keranjang</h4>
        <hr class="mb-3">
        @if ($cartId == '')
            @include('components.widget.empty')
        @else
            <table class="table table-striped table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Buku</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Perpustakaan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr>
                            <th style="vertical-align: middle; width: 5%" scope="row">
                                <form action="/cart" method="POST">
                                    @csrf
                                    <input type="hidden" name="cartId" value="{{ $cartId }}">
                                    <button onclick="return confirm('Apakah anda yakin menghapus data ini?')"
                                        class="btn-close" aria-label="Close"></button>
                                </form>
                            </th>
                            <td style="vertical-align: middle">
                                <img src="{{ URL::asset('assets/' . $item->imgLocation) }}" width="100px" alt="" />
                            </td>
                            <td class="fw-bold text-uppercase" style="vertical-align: middle">{{ $item->title }}</td>
                            <td style="vertical-align: middle">{{ $item->author }}</td>
                            <td style="vertical-align: middle">{{ $item->publisher }}</td>
                            <td style="vertical-align: middle">{{ $item->library_name }}</td>
                            <td style="vertical-align: middle">{{ $item->location }}</td>
                            <td style="vertical-align: middle; width: 10%">
                                <form method="POST" action="/addToBooking" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="idUser" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="id" value="{{ $item->bookId }}">
                                    <input type="hidden" name="cartId" value="{{ $item->cartId }}">
                                    <button type="submit" class="btn btn-custom " name="upload">Pinjam</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
@endsection
