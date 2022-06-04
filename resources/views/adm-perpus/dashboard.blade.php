@extends('layout.adm-perpus-layout')

@section('konten')
    <div class="card shadow p-4">
        <h5>Monitoring Data</h5>
        <hr>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Buku
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jmlBuku }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Jumlah Peminjaman
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jmlBooking }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-fw fa-box-open fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Jumlah Peminjaman Selesai
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jmlBookingSelesai }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="/konfirmasi-pembayaran" class="nav-link">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Jumlah Peminjaman Belum Dikonfirmasi
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $jmlBookingBelumDiKonfirmasi }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-fw fa-shipping-fast fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                                @if ($jmlBookingBelumDiKonfirmasi > 0)
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                @else
                                    <span
                                        class="d-none position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <h5>Monitoring Keuangan</h5>
            <hr>
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Jumlah Pendapatan Denda
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ $denda }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-wallet fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
