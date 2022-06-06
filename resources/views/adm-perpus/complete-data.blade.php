@extends('layout.adm-perpus-layout')

@section('konten')
    <form method="POST" action="/complete-data" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Perpustakaan</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat"></textarea>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="inputGroupFile01">Foto Perpustakaan</label>
            <input type="file" class="form-control" name="gambar">
        </div>
        <button type="submit" class="btn btn-custom">Submit</button>
    </form>
@endsection
