@extends('layout.adm-perpus-layout')

@section('konten')
    @if ($idDenda == '')
        @include('components.widget.empty')
    @else
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Buku</th>
                    <th scope="col">No. Transaksi</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Username</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Denda</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($amercements as $item)
                    <tr>
                        <td style="vertical-align: middle">
                            <img src="{{ URL::asset('storage/buku/' . $item->imgLocation) }}" width="100px" alt="" />
                        </td>
                        <td style="vertical-align: middle">{{ $item->amercement_trx_no }}</td>
                        <td style="vertical-align: middle">{{ $item->updated_at }}</td>
                        <td style="vertical-align: middle">{{ $item->username }}</td>
                        <td class="fw-bold text-uppercase" style="vertical-align: middle">{{ $item->title }}</td>
                        <td style="vertical-align: middle">{{ $item->author }}</td>
                        <td style="vertical-align: middle">{{ $item->publisher }}</td>
                        <td style="vertical-align: middle">Rp. {{ $item->nominal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
