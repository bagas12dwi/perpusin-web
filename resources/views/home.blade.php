@extends('layout.main-layout')

@section('konten')
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="fw-bold text-truncate">Buku Terpopuler</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil assumenda corporis harum maiores nisi,
                    commodi veniam nemo possimus ipsam eligendi sit nesciunt ipsum ut, obcaecati dignissimos quae
                    recusandae. Molestias, alias.</p>
                <button type="button" class="btn btn-custom">Jelajahi Sekarang</button>
            </div>
            <div class="col">
                <img src="{{ URL::asset('assets/home.png') }}" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
    </div>

    {{-- buku terbaru --}}
    @include('components.home-screen.buku-baru')

    <div class="container">
        <hr>
    </div>

    {{-- sering dibaca --}}
    @include('components.home-screen.sering-dibaca')

    <div class="container">
        <hr>
    </div>


    {{-- Kategori
@include('components.home-screen.kategori')

<div class="container"><hr></div> --}}

    {{-- Statistik --}}
    @include('components.home-screen.statistik')

    <div class="container">
        <hr>
    </div>

    <div class="container py-2">
        <h3 class="fw-bold text-center mb-2 text-uppercase">Perpusin</h3>
        <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta possimus minima aliquam
            tempore vero fugiat suscipit nihil? Perferendis alias similique ipsum dolorem laborum ab qui dicta aliquid, fuga
            possimus veritatis!</p>
    </div>
@endsection
