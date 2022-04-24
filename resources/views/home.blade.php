@extends('layout.main-layout')

@section('konten')

<div class="container">
    <div class="row align-items-center">
        <div class="col">
          <h1 class="fw-bold">Buku Terpopuler</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil assumenda corporis harum maiores nisi, commodi veniam nemo possimus ipsam eligendi sit nesciunt ipsum ut, obcaecati dignissimos quae recusandae. Molestias, alias.</p>
          <button type="button" class="btn btn-custom">Jelajahi Sekarang</button>
        </div>
        <div class="col">
            <img src="{{ URL::asset('assets/home.png')}}" class="img-fluid">
        </div>
      </div>
</div>
<div class="container"><hr></div>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light shadow-5-strong">
        <div class="container">
          <a class="navbar-brand" href="#">
            <h3 class="fw-bold">Buku Terbaru</h3>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
                <li class="nav-item">
                    <a class="nav-link" href="#">Novel</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Artikel</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Jurnal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Ensiklopedia</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Kamus</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Cergam</a>
                  </li>
            </ul>
          </div>
        </div>
      </nav>
</div>


@endsection