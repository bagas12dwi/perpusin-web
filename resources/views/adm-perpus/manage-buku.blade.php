@extends('layout.adm-perpus-layout')

@section('konten')
    <a href="/tambah-buku" class="btn btn-custom mb-3">Tambah Buku</a>
    @if ($bookId == '')
        @include('components.widget.empty')
    @else
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <th style="vertical-align: middle; width: 5%" scope="row">
                            <form action="/delete-book" method="POST">
                                @csrf
                                <input type="hidden" name="bookId" value="{{ $item->id }}">
                                <button onclick="return confirm('Apakah anda yakin menghapus data ini?')"
                                    class="btn-close btn-danger" aria-label="Close"></button>
                            </form>
                        </th>
                        <td style="vertical-align: middle">
                            <img src="{{ URL::asset('storage/buku/' . $item->imgLocation) }}" width="100px" alt="" />
                        </td>
                        <td class="fw-bold text-uppercase" style="vertical-align: middle">{{ $item->title }}</td>
                        <td style="vertical-align: middle">{{ $item->author }}</td>
                        <td style="vertical-align: middle">{{ $item->publisher }}</td>
                        <td style="vertical-align: middle">{{ $item->description }}</td>
                        <td style="vertical-align: middle">{{ $item->stock }}</td>
                        <td style="vertical-align: middle; width: 10%">
                            <a href="/manage-buku/{{ $item->title }}/update" class="btn btn-custom">Update</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
