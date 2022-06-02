@extends('layout.main-layout')

@section('konten')
    <div class="container my-3" style="min-height: 466px;">
        <h4 class="my-3 fw-bold">Riwayat Peminjaman</h4>
        <hr class="mb-3">
        @if ($booking->count())
            @foreach ($booking as $item)
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <h4 class="fw-bold">
                            No. Transaksi : {{ $item->trx_number }}
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ URL::asset('assets/' . $item->imgLocation) }}" width="100px" alt="" />
                            </div>
                            <div class="col-md">
                                <h6 class="fw-bold">{{ $item->title }}</h6>
                                <p>{{ $item->created_at }}</p>
                                <h6 class="fw-bold">Alamat Pengambilan : {{ $item->library_name }} (
                                    {{ $item->location }}
                                    )</h6>
                                <div class="badge bg-success text-wrap">
                                    <h6>Silahkan ambil di perpustakaan yang tertera diatas !</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            @include('components.widget.empty')
        @endif
    </div>
@endsection
