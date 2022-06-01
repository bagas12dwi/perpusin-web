@extends('layout.main-layout')

@section('konten')
    <div class="container" style="min-height: 451px">
        @if ($library->count())
            <h4 class="my-3 fw-bold">Daftar Perpustakaan</h4>
            @include('components.library-list')
        @else
        @endif
    </div>
@endsection
