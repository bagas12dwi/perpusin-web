@extends('layout.main-layout')

@section('konten')
    <div class="container my-3" style="min-height: 466px;">
        <div class="card shadow mb-3">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ URL::asset('assets/perpustakaan1.jpg') }}" class="card-img-top m-3" alt="...">
                </div>
                <div class="col-md">
                    <div class="card-body">
                        <h4 class="fw-bold">
                            {{ $library->library_name }}
                        </h4>
                        <h6 class="fw-bold">{{ $library->location }}</h6>
                        <p>{{ $library->library_description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mb-3">
            @include('components.widget.widget-buku')
        </div>
    </div>
@endsection
