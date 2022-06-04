@extends('layout.adm-perpus-layout')

@section('konten')
    @foreach ($data as $item)
        <div class="card shadow mb-3">
            <div class="card-body">
                <h4 class="fw-bold">
                    Username Peminjam : {{ $item->username }}
                </h4>
                <hr>
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ URL::asset('assets/' . $item->imgLocation) }}" width="100px" alt="" />
                    </div>
                    <div class="col-md">
                        <h6 class="fw-bold">{{ $item->title }}</h6>
                        <h6>{{ $item->author }}</h6>
                        <h6>{{ $item->publisher }}</h6>
                        <p>{{ $item->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <hr>
    <form method="POST" action="/confirm-booking" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="noTransaksi" class="form-label">No. Transaksi</label>
            <input type="text" class="form-control" value="{{ $booking->trx_number }}" id="noTransaksi"
                name="noTransaksi" readonly>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat"></textarea>
        </div>
        <div class="mb-3">
            <label for="noTelp" class="form-label">No. Telepon</label>
            <input type="text" class="form-control" id="noTelp" name="noTelp">
        </div>
        <div class="mb-3">
            <label for="inputTanggal" class="form-label">Tanggal Pengembalian</label>
            <input type="text" class="form-control datepicker" id="inputTanggal" name="inputTanggal">
        </div>
        <div class="mb-3">
            <label for="jaminan" class="form-label">Jaminan</label>
            <select class="form-select" aria-label="Default select example" name="jaminan" required>
                <option selected>Pilih Jaminan</option>
                <option value="KTP">KTP</option>
                <option value="KTM">KTM</option>
                <option value="Lain-Lain">Lain-Lain</option>
            </select>
        </div>
        <button type="submit" class="btn btn-custom">Submit</button>
    </form>
@endsection
