@extends('layout.adm-perpus-layout')

@section('konten')
    <div class="row">
        <div class="col-md">
            <form method="POST" action="/confirm-booking" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="noTransaksi" class="form-label">No. Transaksi</label>
                    <input type="text" class="form-control" value="{{ $booking->trx_number }}" id="noTransaksi"
                        name="noTransaksi" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" value="{{ $booking->full_name }}" id="nama" name="nama"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" readonly>{{ $booking->address }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="noTelp" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" value="{{ $booking->phone_number }}" id="noTelp"
                        name="noTelp" readonly>
                </div>
                <div class="mb-3">
                    <label for="inputTanggal" class="form-label">Tanggal Pengembalian</label>
                    <input type="text" class="form-control" value="{{ $booking->return_date }}" id="inputTanggal"
                        name="inputTanggal" readonly>
                </div>
                <div class="mb-3">
                    <label for="jaminan" class="form-label">Jaminan</label>
                    <input type="text" class="form-control" value="{{ $booking->guarantee }}" id="jaminan"
                        name="jaminan" readonly>
                </div>
            </form>
        </div>
        <div class="col-md">
            @foreach ($data as $item)
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <h4 class="fw-bold">
                            Username Peminjam : {{ $item->username }}
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md">
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
                @if ($item->Days > 0)
                    <div class="card bg-danger text-light">
                        <div class="card-body">
                            Waktu Pengembalian Buku telat {{ $item->Days }} Hari
                        </div>
                    </div>
                    <hr>
                    <div class="card shadow mb-3">
                        <div class="card-body">
                            <h4 class="fw-bold">
                                Denda
                            </h4>
                            <hr>
                            <div class="row">
                                <div class="col-md">
                                    <h6>Harga Denda Buku</h6>
                                    <h6>Telat Pengembalian</h6>
                                    <hr>
                                    <h6 class="fw-bold">Total</h6>
                                </div>
                                <div class="col-md">
                                    <h6>Rp. {{ $item->amercement_price }}</h6>
                                    <h6>{{ $item->Days }} Hari</h6>
                                    <hr>
                                    <h6 class="fw-bold">Rp. {{ $item->total }}</h6>
                                </div>
                            </div>
                            <form method="POST" action="/confirm-return" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" value="{{ $item->idBooking }}"
                                        id="idBooking" name="idBooking" readonly>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" value="{{ $item->idBuku }}" id="idBuku"
                                        name="idBuku" readonly>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" value="{{ $item->idUser }}" id="idUser"
                                        name="idUser">
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" value="{{ $item->total }}" id="nominal"
                                        name="nominal">
                                </div>
                                <button type="submit" class="btn btn-custom">Submit</button>
                            </form>
                        </div>
                    </div>
                @else
                    <form method="POST" action="/confirm-return" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" class="form-control" value="{{ $item->idBooking }}" id="idBooking"
                                name="idBooking" readonly>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" value="{{ $item->idBuku }}" id="idBuku"
                                name="idBuku" readonly>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" value="{{ $item->idUser }}" id="idUser"
                                name="idUser">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" value="{{ $item->total }}" id="nominal"
                                name="nominal">
                        </div>
                        <button type="submit" class="btn btn-custom">Submit</button>
                    </form>
        </div>
    </div>
    @endif
    @endforeach
    </div>
    </div>
@endsection
