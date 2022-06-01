@foreach ($books as $item)
    <div class="item col-md-3 mb-4">
        <div class="card" style="width: 15rem; padding: 10px">
            <img src="{{ URL::asset('assets/' . $item->imgLocation) }}" style="width: 8.389375rem"
                class="card-img-top mx-auto d-block" alt="...">
            <div class="card-body">
                <h6 class="card-title">Stock : {{ $item->stock }}</h6>
                <h5 class="card-title fw-bold"
                    style="text-overflow: ellipsis; width:150px; overflow: hidden; white-space:nowrap;">
                    {{ $item->title }}</h5>
                <p class="card-text"
                    style="text-overflow: ellipsis; width:150px; overflow: hidden; white-space: nowrap;">
                    {{ $item->description }}</p>
                <div class="row">
                    @auth
                        @if ($item->isOnline == true)
                            <div class="col">
                                <a href="#" class="btn btn-custom">Baca</a>
                            </div>
                            <div class="col">
                                <form method="POST" action="/addToCart" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="idUser" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn nav-link" name="upload"><i
                                            class="bi bi-cart2 icon-nav"></i></button>
                                </form>
                            </div>
                        @else
                            <form method="POST" action="/addToCart" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="idUser" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button type="submit" class="btn nav-link" name="upload"><i
                                        class="bi bi-cart2 icon-nav"></i></button>
                            </form>
                            {{-- @else
                            <div class="col">
                                <a href="/login" class="nav-link"><i class="bi bi-cart2 icon-nav"></i></a>
                            </div> --}}
                        @endif
                    @else
                        <div class="col">
                            <a href="/login" class="nav-link"><i class="bi bi-cart2 icon-nav"></i></a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endforeach
