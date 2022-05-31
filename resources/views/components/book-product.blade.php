<div class="row mb-3">
    @foreach ($books as $item)
        <div class="col-md-3">
            <div class="card" style="width: 15rem; padding: 10px">
                <img src="{{ URL::asset('assets/' . $item->imgLocation) }}" style="width: 8.389375rem" class="card-img-top mx-auto d-block" alt="...">
                <div class="card-body">
                <h6 class="card-title">Stock : {{ $item->stock }}</h6>
                <h5 class="card-title fw-bold" style="text-overflow: ellipsis; width:150px; overflow: hidden; white-space:nowrap;">{{ $item->title }}</h5>
                <p class="card-text" style="text-overflow: ellipsis; width:150px; overflow: hidden; white-space: nowrap;">{{ $item->description }}</p>
                <div class="row justify-content-between">
                    <div class="col-6">
                    <a href="#" class="btn btn-custom">Baca</a>
                    </div>
                    <div class="col-6">
                    <a href="#" class="nav-link"><i class="bi bi-heart icon-nav"></i></a>
                    </div>
                </div>
                </div>
            </div>
        </div>    
    @endforeach
    
</div>