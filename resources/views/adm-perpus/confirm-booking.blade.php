@extends('layout.adm-perpus-layout')

@section('konten')
    @if ($bookId == '')
        @include('components.widget.empty')
    @else
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">No. Transaksi</th>
                    <th scope="col">Username</th>
                    <th scope="col">Buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($booking as $item)
                    <tr>
                        <td style="vertical-align: middle">{{ $item->trx_number }}</td>
                        <td style="vertical-align: middle">{{ $item->username }}</td>
                        <td style="vertical-align: middle">
                            <img src="{{ URL::asset('storage/buku/' . $item->imgLocation) }}" width="100px" alt="" />
                        </td>
                        <td class="fw-bold text-uppercase" style="vertical-align: middle">{{ $item->title }}</td>
                        <td style="vertical-align: middle">{{ $item->author }}</td>
                        <td style="vertical-align: middle">{{ $item->publisher }}</td>
                        <td style="vertical-align: middle; width: 10%">
                            <a href="/konfirmasi-pinjam/{{ $item->trx_number }}" class="btn btn-custom">Konfirmasi</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
