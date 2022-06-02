@extends('layout.adm-perpus-layout')

@section('konten')
    <form>
        <div class="mb-3">
            <label for="judulBuku" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="judulBuku">
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="penulis">
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock">
        </div>
        <div class="mb-3">
            <label class="form-label" for="inputGroupFile01">Upload</label>
            <input type="file" class="form-control" name="gambar">
        </div>
        <button type="submit" class="btn btn-custom">Submit</button>
    </form>
@endsection
