<div class="row mb-3">
    @foreach ($library as $item)
        <div class="col-md-4">
            <div class="card p-2" style="width: 18rem;">
                <img src="{{ URL::asset('assets/perpustakaan1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"
                        style="text-overflow: ellipsis; width:250px; overflow: hidden; white-space:nowrap;">
                        {{ $item->library_name }}</h5>
                    <p class="card-text"
                        style="text-overflow: ellipsis; width:150px; overflow: hidden; white-space:nowrap;">
                        {{ $item->location }}</p>
                    <a href="/perpustakaan/{{ $item->library_name }}" class="btn btn-custom">Telusuri</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
