@extends('layout.main-layout')

@section('konten')

<div class="container">
  @if ($books->count())
    <h4 class="my-3 fw-bold">Daftar Buku</h4>
    @include('components.book-product')
    
    <div class="d-flex justify-content-center">
      {{ $books->links() }}
    </div>

    @else
    <h4 class="my-3 fw-bold text-center">Data Kosong</h4>

  @endif  
</div>

@endsection