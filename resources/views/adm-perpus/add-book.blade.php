@extends('layout.adm-perpus-layout')

@section('konten')
    <form method="POST" action="/add-book" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judulBuku" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" name="judulBuku" id="judulBuku">
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis">
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" name="deskripsi"></textarea>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock">
        </div>
        <div class="mb-3">
            <label for="denda" class="form-label">Biaya Denda</label>
            <input type="number" class="form-control" id="denda" name="denda">
        </div>
        <div class="mb-3">
            <label class="form-label" for="inputGroupFile01">Upload</label>
            <input type="file" class="form-control" name="gambar">
        </div>
        <button type="submit" class="btn btn-custom">Submit</button>
    </form>
@endsection
